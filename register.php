<?php
//___________ Storing POSTED vars into session vars.____________
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];
$_SESSION['email'] = $_POST['email'];

//___Protect against SQL injections, adds '\' to special characters_____
$first_name = mysqli_real_escape_string($mysqli, $_POST['firstname']);
$last_name = mysqli_real_escape_string($mysqli, $_POST['lastname']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$password = mysqli_real_escape_string($mysqli, password_hash($_POST['password'], PASSWORD_BCRYPT));

/* _________________Duplicate check point____________________
 * Check if duplicate by querying db if stored e-mail in users table == to posted $email value being registered
 * $duplicatecheck will store the results of the row where the email is found
 * if (rows in duplicate check is > 0, it found a result. Meaning email is alrdy registered)
 */
$duplicatecheck = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());
if ($duplicatecheck->num_rows > 0) {
    $_SESSION['message'] = 'E-mail already exists!';
    header("location: error.php");
}
//_________________Store session vars into db__________________
else {
    $store_session_vars = "INSERT INTO  users (first_name, last_name, email, password) "
  ."VALUES('$first_name','$last_name','$email','$password')";
    if ($mysqli->query($store_session_vars)) {
        $_SESSION['logged_in'] = true;
        header("location: Home.php");
    } else {
        $_SESSION['message'] = 'Something went wrong storing sessions vars...';
        header("location: error.php");
    }
}
//https://www.w3schools.com/php/php_sessions.asp , sessions - how to use-
//https://stackoverflow.com/questions/30279321/how-to-use-password-hash , all about hashing
  //https://stackoverflow.com/questions/22393143/password-default-vs-password-bcrypt
//https://www.w3schools.com/php/php_mysql_insert.asp , inserting into sql
//https://stackoverflow.com/questions/60174/how-can-i-prevent-sql-injection-in-php
//https://www.w3schools.com/php/func_mysqli_num_rows.asp
//http://php.net/manual/en/function.mysql-query.php , test if query is successful
