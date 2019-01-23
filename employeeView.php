<?php
require 'db_connection.php';
session_start();
//_______________Verify User is logged in________________
if ($_SESSION['logged_in'] != 1) {
    $_SESSION['message'] = "You must be logged in to view our home page!";
    header("location: error.php");
}

if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['product'])) {
        //___________ Storing POSTED vars into session vars.___________
        $_SESSION['costt'] = $_POST['cost'];
        $_SESSION['descriptionn'] = $_POST['description'];
        $_SESSION['brandd'] = $_POST['brand'];
        $_SESSION['namee'] = $_POST['name'];
        $_SESSION['inventoryy'] = $_POST['inventory'];
        $_SESSION['image_filee'] = $_POST['image_file'];

        //___Protect against SQL injections, adds '\' to special characters_____
        $costt = mysqli_real_escape_string($mysqli, $_POST['cost']);
        $descriptionn = mysqli_real_escape_string($mysqli, $_POST['description']);
        $brandd = mysqli_real_escape_string($mysqli, $_POST['brand']);
        $namee = mysqli_real_escape_string($mysqli, $_POST['name']);
        $inventoryy = mysqli_real_escape_string($mysqli, $_POST['inventory']);
        $image_filee = mysqli_real_escape_string($mysqli, $_POST['image_file']);

        $duplicatecheck = $mysqli->query("SELECT * FROM product WHERE name='$namee' ");
        if ($duplicatecheck->num_rows > 0) {
            $_SESSION['message'] = 'item name already exists!';
            header("location: error.php");
        } else {
            $store_session_vars = "INSERT INTO product (cost, description, brand, name, inventory, image_file)"
          ."VALUES('$costt', '$descriptionn', '$brandd', '$namee', '$inventoryy', '$image_filee')";
            if ($mysqli->query($store_session_vars)) {
                header("location: employeeView.php");
            } else {
                $_SESSION['message'] = 'OOPS, something broke.';
                header("location: error.php");
            }
        }
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
 <button class="tablinks" onclick="openTab(event, 'Prod_Tab_Ins')">Product Table Insert</button>
 </div>
 <!--________________________ProdSub_________________________-->
 <form action="employeeView.php" method="post" autocomplete="off" id="prodsub">
 <div id="Prod_Tab_Ins" class="tabcontent">
  <!--1st-->
  <div class="topbox">
   <p><b>Fill out the boxes below and click submit</b></p>
  </div>

  <!--2nd-->
  <div class="cost">
   <label for="cost">Cost:</label>
   <input type="number" placeholder="$0.00" name="cost" required min="0" value="0" step = ".01">
  </div>

  <!--3rd-->
  <div class="description">
   <label for="description">Description:</label>
   <input type="text" placeholder="Item Description" name="description" required>
   <!--<textarea rows="4" cols="50" name="description" form="prodsub"></textarea>-->
  </div>

  <!--4th-->
  <div class="brand">
   <label for="brand">Brand:</label>
   <input type="text" placeholder="Brand Name" name="brand" required>
  </div>

  <!--5th-->
  <div class="name">
   <label for="name">Name:</label>
   <input type="text" placeholder="Item Name" name="name" required>
  </div>

  <!--6th-->
  <div class="inventory">
   <label for="inventory">Inventory Qty:</label>
   <input type="number" placeholder="inventory qty" name="inventory" required>
  </div>

  <!--7th-->
  <div class="image_file">
   <label for="image_file">Image file:</label>
   <input type="text" placeholder="image file" name="image_file" required>
  </div>

  <!--8th-->
  <div class="bottombox">
   <button name='product' type='submit' >Submit</button>
  </div>
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
