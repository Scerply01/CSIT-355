<?php
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
//__________________Check if e-mail is in db______________________
//FIX THIS SHIT WHEN YOU HAVE TIME
if ($result->mysqli_num_rows > 0) {
    $_SESSION['message'] = "Email doesn't exist!";
    header("location: error.php");
}
//__________________User found, check pw_______________________
else {
    $user_email = mysqli_fetch_assoc($result);
    if (password_verify($_POST['password'], $user_email['password'])) {
        $_SESSION['first_name'] = $user_email['first_name'];
        $_SESSION['last_name'] = $user_email['last_name'];
        $_SESSION['email'] = $user_email['email'];
        $_SESSION['logged_in'] = true;
        header('location: Home.php');
    }
    //________________Passwords DO NOT match__________________
    else {
        $_SESSION['message'] = "Wrong password, try again!";
        header("location: error.php");
    }
}
//https://www.w3schools.com/php/php_mysql_select.asp
//https://www.w3schools.com/php/func_mysqli_num_rows.asp
//https://stackoverflow.com/questions/3737139/reference-what-does-this-symbol-mean-in-php , operators
    //"->" https://stackoverflow.com/questions/4502587/what-does-mean-refer-to-in-php
//https://www.w3schools.com/php/func_mysqli_fetch_assoc.asp
//http://php.net/manual/en/function.password-verify.php
