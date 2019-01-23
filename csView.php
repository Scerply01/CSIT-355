<?php
require 'db_connection.php';
session_start();
//_______________Verify User is logged in________________
if ($_SESSION['logged_in'] != 1) {
    $_SESSION['message'] = "You must be logged in to view our home page!";
    header("location: error.php");
}

if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['delete'])) {
        $remove_user = mysqli_real_escape_string($mysqli, $_POST['userID']);
        $dept = mysqli_real_escape_string($mysqli, $_POST['Dept']);
        $query = "DELETE FROM assistance WHERE fk_user_id='$remove_user' AND fk_department = '$dept' ";
        mysqli_query($mysqli, $query);
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
 <button class="tablinks" onclick="openTab(event, 'Cust_assis')">Customer Assistance</button>
 </div>
 <!--________________________ProdSub_________________________-->

<form action="csView.php" method="POST">
  <div id="Cust_assis" class="tabcontent">
    <?php
    //Display Table
    $query = "SELECT * FROM assistance";
    $result = mysqli_query($mysqli, $query);
    $checkrow = mysqli_num_rows($result);
    $count = 1;

    if ($checkrow > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $count.". Customer user id: ".$row['fk_user_id']." requested Department: ".$row['fk_department']."<br />";
            $count++;
        }
    } else {
        echo "Query has no results";
    }
 ?>
   <p><b>If user has been assisted remove their ID and department inquiry.</b></p>

   <label for="userID">User ID:</label> <input type="text" placeholder="#" name="userID" required><br />
   <label for="Dept">Department:</label> <input type="text" placeholder="Name" name="Dept" required><br />
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
