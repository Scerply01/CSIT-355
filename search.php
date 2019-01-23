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
<div class = "search-container">
  <?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['submit-search'])) {
        //injection protection
        $search = mysqli_real_escape_string($mysqli, $_POST['search']);

        //search in name and brand, description will generate unrelated results.
        $sql ="SELECT * FROM product WHERE name LIKE '%$search%' OR brand LIKE '%$search%' ";

        //run sql code and store in $result
        $result = mysqli_query($mysqli, $sql);

        //Store the # of rows in set
        $queryResult = mysqli_num_rows($result);

        echo "<h1>Result: ".$queryResult." items found</h1>";

        //must at lease have 1 row of result
        if ($queryResult > 0) {

          //fetch associative array and store in $row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class = 'results-box'>";
                echo "<h3>Name: ".$row['name']."</h3>";
                echo "<p>Brand: ".$row['brand']."</p>";
                echo "<p>Description: ".$row['description']."</p>";
                echo "<p>Price: ".$row['cost']."</p>";
                echo "</div>";
            }
        } else { //empty result
            echo "Query was not successful";
        }
    }
} else {
    //If page is reloaded with no POST request
    $_SESSION['message'] = 'No input in search';
    header("location: error_loggedin.php");
}
?>
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
