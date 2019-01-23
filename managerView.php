<?php
require 'db_connection.php';
session_start();
//_______________Verify User is logged in________________
if ($_SESSION['logged_in'] != 1) {
    $_SESSION['message'] = "You must be logged in to view our home page!";
    header("location: error.php");
}

if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['Add'])) {
        $SSN = mysqli_real_escape_string($mysqli, $_POST['SSN']);
        $Fname = mysqli_real_escape_string($mysqli, $_POST['Fname']);
        $Lname = mysqli_real_escape_string($mysqli, $_POST['Lname']);
        $Haddress = mysqli_real_escape_string($mysqli, $_POST['Haddress']);
        $DOB = mysqli_real_escape_string($mysqli, $_POST['DOB']);
        $Email = mysqli_real_escape_string($mysqli, $_POST['E-mail']);
        $Salary = mysqli_real_escape_string($mysqli, $_POST['Salary']);
        $Position = mysqli_real_escape_string($mysqli, $_POST['Position']);
        $Department = mysqli_real_escape_string($mysqli, $_POST['Department']);

        $queryADD = "INSERT INTO employee(employee_ssn, e_first_name, e_last_name, home_address, date_of_birth, email, salary, position, fk_department)"
      ."Values('$SSN', '$Fname', '$Lname', '$Haddress', '$DOB', '$Email', '$Salary', '$Position', '$Department')";
        mysqli_query($mysqli, $queryADD);
    } elseif (isset($_POST['delete'])) {
        $Email = mysqli_real_escape_string($mysqli, $_POST['E-mail']);

        $queryDEL = "DELETE FROM employee WHERE email = '$Email' ";
        mysqli_query($mysqli, $queryDEL);
    }
}
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="indexstyle.css" />
  <title>Insert data into DB</title>
</head>
<body>
<!--Create Tabs -->
<div class="tab">
 <button class="tablinks" onclick="openTab(event, 'Add')">Add Employee</button>
 <button class="tablinks" onclick="openTab(event, 'Delete')">Delete Employee</button>
 </div>
 <!--Add Employee-->
<form action="managerView.php" method="POST">
  <div id="Add" class="tabcontent">
    <?php
    //Display Table
    $query = "SELECT * FROM employee";
    $result = mysqli_query($mysqli, $query);
    $checkrow = mysqli_num_rows($result);
    $count = 1;
    echo "Employee_SSN | First Name | Last Name | Home Address | DOB | E-mail | Salary | Position | Department<br />";
    if ($checkrow > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $count.". ".$row['employee_ssn']." ".$row['e_first_name']." ".$row['e_last_name']." "
            .$row['home_address']." ".$row['date_of_birth']." "
            .$row['email']." ".$row['salary']." ".$row['position']." ".$row['fk_department']."<br />";
            $count++;
        }
    } else {
        echo "Query has no results";
    }
 ?>
   <p><b>Fill out all fields below to enter employee</b></p>

   <label for="SSN">SSN:</label> <input type="number" placeholder="#########" name="SSN" required><br />
   <label for="Fname">First Name:</label> <input type="text" placeholder="Name" name="Fname" required><br />
   <label for="Lname">Last Name:</label> <input type="text" placeholder="Name" name="Lname" required><br />
   <label for="Haddress">Home Address:</label> <input type="address" placeholder="Street address, City, State" name="Haddress" required><br />
   <label for="DOB">Date of birth:</label> <input type="number" placeholder="YYYYMMDD" name="DOB" required><br />
   <label for="E-mail">E-mail:</label> <input type="email" placeholder="username@domain.com" name="E-mail" required><br />
   <label for="Salary">Salary:</label> <input type="number" placeholder="$" name="Salary" required><br />
   <label for="Position">Position:</label> <input type="text" placeholder="Manager/Rep" name="Position" required><br />
   <label for="Department">Department:</label> <input type="text" placeholder="Dept. Name" name="Department" required><br />
   <button name='Add' type='submit' >Add</button>
 </div>
 </form>

 <!--Delete Employee-->
<form action="managerView.php" method="POST">
  <div id="Delete" class="tabcontent">
    <?php
    //Display Table
    $query = "SELECT * FROM employee";
    $result = mysqli_query($mysqli, $query);
    $checkrow = mysqli_num_rows($result);
    $count = 1;
    echo "Employee_SSN | First Name | Last Name | Home Address | DOB | E-mail | Salary | Position | Department<br />";
    if ($checkrow > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $count.". ".$row['employee_ssn']." ".$row['e_first_name']." ".$row['e_last_name']." "
            .$row['home_address']." ".$row['date_of_birth']." "
            .$row['email']." ".$row['salary']." ".$row['position']." ".$row['fk_department']."<br />";
            $count++;
        }
    } else {
        echo "Query has no results";
    }
 ?>
   <p><b>Enter email address of employee you wish to delete.</b></p>

   <label for="E-mail">E-mail:</label> <input type="email" placeholder="user@domain.com" name="E-mail" required><br />
   <button name='delete' type='submit' >Delete</button>
 </div>
 </form>

<a href="Home.php"><button class="button button-block" name="home"/>Home</button></a>
<a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

<script>
 function openTab(evt, logfunction) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
   tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
   tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(logfunction).style.display = "block";
  evt.currentTarget.className += " active";
 }
</script>
</body>
</html>
