<?php
require 'header-Log.php';
?>
<ul>
  <li><a href="Home.php"> Home</a></li> &nbsp;
 <!--__________________Drop down button in navbar_____________-->
  <div class="dropdown">
    <button class="dropbtn" onclick="myFunction()">Product Category</button>
    <div class="dropdown-content" id="myDropdown">
      <a href="bakeware.php">Bakeware</a>
      <a href="cookut.php">Cooking Utensils</a>
      <a href="cutlery.php">Cutlery</a>
      <a href="pnp.php">Pots & Pans</a>
      <a href="smallapp.php">Small Appliances</a>
    </div>
  </div>

    <li><a  href="contactus.php">Contact Us </a></li> &nbsp;

  <div class="dropdown3">
    <button class="dropbtn3"onclick="myFunction3()" >
    <?php echo "<div class='shrink1'>Hello! " .$first_name.',</div>';?>
    <div class='shrink2'>My Account </div></button>
    <div class="dropdown-content3" id="myDropdown3">
      <a href="orders.php">Orders</a>
      <a href="logout.php">Logout</a>
    </div>
  </div>
  <!--_______________________Search Bar____________________-->
  <div class="searchBar">
    <form action="search.php" method="POST">
        <input type="text" name="search" placeholder="Search here">
        <button type="submit" name="submit-search"><i class="fas fa-search"></i></button>
    </form>
  </div>

  <li style = "float:right"><a href="cart.php"> Cart</a></li>&nbsp;
</ul>
<h1 style = "position: absolute; top:60; left:100">Cooking Utensils</h1>
<!-- ___________This section will change per link selection__________-->
<div id ="my_table" class="left">
  <table>
    <thead></thead>
    <tbody>
      <td>
        <?php
        $queryimg = "SELECT image_file FROM product WHERE product_id=7";
        $result = mysqli_query($mysqli, $queryimg);
        if ($row = $result->fetch_assoc()) {
            echo $row["image_file"];
        } else {
            header("location: error.php");
        }
        ?>
        </td>
        <td rowspan=12 width="34"></td>
        <td>
        <?php
        $queryimg = "SELECT image_file FROM product WHERE product_id=8";
        $result = mysqli_query($mysqli, $queryimg);
        if ($row = $result->fetch_assoc()) {
            echo $row["image_file"];
        } else {
            header("location: error.php");
        }
        ?>
        </td>
        <td rowspan=12 width="20"></td>
        <td>
        <?php
        $queryimg = "SELECT image_file FROM product WHERE product_id=9";
        $result = mysqli_query($mysqli, $queryimg);
        if ($row = $result->fetch_assoc()) {
            echo $row["image_file"];
        } else {
            header("location: error.php");
        }
        ?>
        </td>
        <tr>
        <tr>
        <td><?php
        $querybrand = "SELECT brand FROM product WHERE product_id=7";
        $result = mysqli_query($mysqli, $querybrand);
        if ($row = $result->fetch_assoc()) {
            echo $row["brand"];
        } else {
            header("location: error.php");
        }
        ?>
        </td>
        <td>
        <?php
        $querybrand = "SELECT brand FROM product WHERE product_id=8";
        $result = mysqli_query($mysqli, $querybrand);
        if ($row = $result->fetch_assoc()) {
            echo $row["brand"];
        } else {
            header("location: error.php");
        }
        ?>
        </td>
        <td>
        <?php
        $querybrand = "SELECT brand FROM product WHERE product_id=9";
        $result = mysqli_query($mysqli, $querybrand);
        if ($row = $result->fetch_assoc()) {
            echo $row["brand"];
        } else {
            header("location: error.php");
        }
        ?>
        </td>
        </tr>
        <tr>
        <td><a href="Products.php?id=7">
        <?php
        $queryname = "SELECT name FROM product WHERE product_id=7";
        $result = mysqli_query($mysqli, $queryname);
        if ($row = $result->fetch_assoc()) {
            echo $row["name"];
        } else {
            header("location: error.php");
        }
        ?>
        </a></td>
        <td><a href="Products.php?id=8">
        <?php
        $queryname = "SELECT name FROM product WHERE product_id=8";
        $result = mysqli_query($mysqli, $queryname);
        if ($row = $result->fetch_assoc()) {
            echo $row["name"];
        } else {
            header("location: error.php");
        }
        ?>
        </a></td>
        <td><a href="Products.php?id=9">
        <?php
        $queryname = "SELECT name FROM product WHERE product_id=9";
        $result = mysqli_query($mysqli, $queryname);
        if ($row = $result->fetch_assoc()) {
            echo $row["name"];
        } else {
            header("location: error.php");
        }
        ?>
        </a></td>
        </tr>
        <tr>
        <td>
        <?php
        $querycost = "SELECT cost FROM product WHERE product_id=7";
        $result = mysqli_query($mysqli, $querycost);
        if ($row = $result->fetch_assoc()) {
            echo $row["cost"];
        } else {
            header("location: error.php");
        }
        ?></td>
        <td>
        <?php
        $querycost = "SELECT cost FROM product WHERE product_id=8";
        $result = mysqli_query($mysqli, $querycost);
        if ($row = $result->fetch_assoc()) {
            echo $row["cost"];
        } else {
            header("location: error.php");
        }
        ?></td>
        <td>
        <?php
        $querycost = "SELECT cost FROM product WHERE product_id=9";
        $result = mysqli_query($mysqli, $querycost);
        if ($row = $result->fetch_assoc()) {
            echo $row["cost"];
        } else {
            header("location: error.php");
        }
        ?></td>
        </tr>
        <tr>
        <td colspan=10 height="30"></td>
        </tr>
        <td>
        <?php
        $queryimg = "SELECT image_file FROM product WHERE product_id=10";
        $result = mysqli_query($mysqli, $queryimg);
        if ($row = $result->fetch_assoc()) {
            echo $row["image_file"];
        } else {
            header("location: error.php");
        }
        ?>
        </td>
        <td>
        <?php
        $queryimg = "SELECT image_file FROM product WHERE product_id=11";
        $result = mysqli_query($mysqli, $queryimg);
        if ($row = $result->fetch_assoc()) {
            echo $row["image_file"];
        } else {
            header("location: error.php");
        }
        ?>
        </td>
        <td>
        <?php
        $queryimg = "SELECT image_file FROM product WHERE product_id=12";
        $result = mysqli_query($mysqli, $queryimg);
        if ($row = $result->fetch_assoc()) {
            echo $row["image_file"];
        } else {
            header("location: error.php");
        }
        ?>
        </td>
        <tr>
        <tr>
        <td><?php
        $querybrand = "SELECT brand FROM product WHERE product_id=10";
        $result = mysqli_query($mysqli, $querybrand);
        if ($row = $result->fetch_assoc()) {
            echo $row["brand"];
        } else {
            header("location: error.php");
        }
        ?>
        </td>
        <td>
        <?php
        $querybrand = "SELECT brand FROM product WHERE product_id=11";
        $result = mysqli_query($mysqli, $querybrand);
        if ($row = $result->fetch_assoc()) {
            echo $row["brand"];
        } else {
            header("location: error.php");
        }
        ?>
        </td>
        <td>
        <?php
        $querybrand = "SELECT brand FROM product WHERE product_id=12";
        $result = mysqli_query($mysqli, $querybrand);
        if ($row = $result->fetch_assoc()) {
            echo $row["brand"];
        } else {
            header("location: error.php");
        }
        ?>
        </td>
        </tr>
        <tr>
        <td><a href="Products.php?id=10">
        <?php
        $queryname = "SELECT name FROM product WHERE product_id=10";
        $result = mysqli_query($mysqli, $queryname);
        if ($row = $result->fetch_assoc()) {
            echo $row["name"];
        } else {
            header("location: error.php");
        }
        ?>
        </a></td>
        <td><a href="Products.php?id=11">
        <?php
        $queryname = "SELECT name FROM product WHERE product_id=11";
        $result = mysqli_query($mysqli, $queryname);
        if ($row = $result->fetch_assoc()) {
            echo $row["name"];
        } else {
            header("location: error.php");
        }
        ?>
        </a></td>
        <td><a href="Products.php?id=12">
        <?php
        $queryname = "SELECT name FROM product WHERE product_id=12";
        $result = mysqli_query($mysqli, $queryname);
        if ($row = $result->fetch_assoc()) {
            echo $row["name"];
        } else {
            header("location: error.php");
        }
        ?>
        </a></td>
        </tr>
        <tr>
        <td>
        <?php
        $querycost = "SELECT cost FROM product WHERE product_id=10";
        $result = mysqli_query($mysqli, $querycost);
        if ($row = $result->fetch_assoc()) {
            echo $row["cost"];
        } else {
            header("location: error.php");
        }
        ?>
        </td>
        <td>
        <?php
        $querycost = "SELECT cost FROM product WHERE product_id=11";
        $result = mysqli_query($mysqli, $querycost);
        if ($row = $result->fetch_assoc()) {
            echo $row["cost"];
        } else {
            header("location: error.php");
        }
        ?>
        </td>
        <td>
        <?php
        $querycost = "SELECT cost FROM product WHERE product_id=12";
        $result = mysqli_query($mysqli, $querycost);
        if ($row = $result->fetch_assoc()) {
            echo $row["cost"];
        } else {
            header("location: error.php");
        }
        ?>
       </td>
     </tr>
   </tbody>
 </table>
</div>
<script>
 /* When the user clicks on the button, toggle between hiding and showing the dropdown content */
 function myFunction() {
   document.getElementById("myDropdown").classList.toggle("showA");
 }
 function myFunction2() {
   document.getElementById("myDropdown2").classList.toggle("showB");
 }
 function myFunction3() {
   document.getElementById("myDropdown3").classList.toggle("showC");
 }
</script>
</body>
</html>
