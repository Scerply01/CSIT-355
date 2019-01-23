<?php
require 'db_connection.php';
session_start();

//_______________Verify User is logged in________________
if ($_SESSION['logged_in'] != 1) {
    $_SESSION['message'] = "You must be logged in to view our home page!";
    header("location: error.php");
}
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$email = $_SESSION['email'];

$queryimg = "SELECT user_id FROM users WHERE email='$email' ";
$result = mysqli_query($mysqli, $queryimg);
$loginrow = mysqli_fetch_assoc($result);
$_SESSION['user_id'] = $loginrow['user_id'];
$user_id = $_SESSION['user_id'];
?>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet"  href="stylef.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
</head>
<body>
