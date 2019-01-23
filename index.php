<?php
require 'db_connection.php';
session_start();
//If form is post, it'll call itself and run the php code at top w/ method POST.
if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['login'])) {
        require 'login.php';
    } elseif (isset($_POST['register'])) {
        require 'register.php';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"  href="indexstyle.css" />
  <title>Welcome</title>
</head>
<body>
  <!--Create Tabs -->
 <div class="tab">
  <button class="tablinks" onclick="openTab(event, 'Login')">Login</button>
  <button class="tablinks" onclick="openTab(event, 'Signup')">Sign Up</button>
 </div>

 <!--________________________Login_________________________-->
 <form action="index.php" method="post" autocomplete="off">
  <div id="Login" class="tabcontent">
   <!--1st-->
   <div class="topbox">
    <p><b>Sign In</b></p>
   </div>
   <!--2nd-->
   <div class="email">
    <label for="email">E-mail:</label>
    <input type="email" placeholder="Enter E-mail" name="email" required>
   </div>
   <!--3rd-->
   <div class="pw">
    <label for="psw">Password:</label>
    <input type="password" placeholder="Enter Password" name="password" required>
   </div>
   <!--4th-->
   <div class="bottombox">
    <button name='login' type='submit' >Login</button>
   </div>
  </div>
 </form>

 <!--________________________SignUp________________________-->
 <form action="index.php" method="post" autocomplete="off">
  <div id="Signup" class="tabcontent">
   <!--1st-->
   <div class="topbox">
    <p><b>Register</b></p>
   </div>
   <!--2nd-->
   <div class="info">
    <label for="Fname">First Name:</label>
    <input type="text" placeholder="First" name="firstname" required>
    <br />
    <label for="Lname">Last Name:</label>
    <input type="text" placeholder="Last" name="lastname" required>
   </div>
   <!--3rd-->
   <div class="email">
    <label for="email">E-mail:</label>
    <input type="email" placeholder="email@mail.com" name="email" required>
   </div>
   <!--4th-->
   <div class="pw">
    <label for="psw">Password:</label>
    <input type="password" placeholder="Set A Password" name="password" required>
   </div>
   <!--5th-->
   <div class="bottombox">
    <button name='register' type='submit'>Register</button>
   </div>
  </div>
 </form>

 <!--________________________Script________________________-->
 <script>
  function openTab(evt, cityName) {
   var i, tabcontent, tablinks;
   tabcontent = document.getElementsByClassName("tabcontent");
   for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
   }
   tablinks = document.getElementsByClassName("tablinks");
   for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
   }
   document.getElementById(cityName).style.display = "block";
   evt.currentTarget.className += " active";
  }
 </script>

</body>
</html>
<!--https://www.w3schools.com/php/php_sessions.asp , sessions - how to use-->
<!--https://www.w3schools.com/howto/howto_js_tabs.asp , creating tabs-->
<!--https://www.w3schools.com/howto/howto_css_login_form.asp , log in expample-->
<!-- syntax <form action="URL">-->
<!--https://responsivedesign.is/develop/responsive-html/viewport-meta-element-->
<!--https://www.virendrachandak.com/techtalk/php-isset-vs-empty-vs-is_null/-->
