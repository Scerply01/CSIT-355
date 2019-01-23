<?php
require 'header-Log.php';
/*
QUERY EMPLOYEE TABLE
USE EMAIL AS WHERE CLAUSE
IF POSITION = 'MANAGER'
SHOW BUTTON

note: employee's have to be registered manually....1 by 1
*/
?>
 <ul>
   <li><a class="active"  href="Home.php"> Home </a></li> &nbsp;
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
    <!--<div class="dropdown2">
      <button class="dropbtn2" onclick="myFunction2()">Contact us</button>
      <div class="dropdown-content2" id="myDropdown2">
        <a href="employeeView.php">Employee</a>
        <a href="#">Request Help</a>
      </div>
    </div>-->

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
      <form action='search.php' method="POST">
          <input type="text" name="search" placeholder="Search here">
          <button type="submit" name="submit-search"><i class="fas fa-search"></i></button>
      </form>
    </div>

    <li style = "float:right"><a href="cart.php"> Cart</a></li>&nbsp;
  </ul>
<div class="title-container"><h1> Welcome to Kitchen Quality Items</h1></div>
<?php
//check if logged in user is manager level
$query = "SELECT employee.fk_department FROM employee WHERE email = '$email' AND position = 'Manager' ";
$result = mysqli_query($mysqli, $query);
$checkquery = mysqli_num_rows($result);

if ($checkquery > 0) {
    //1st button gives Managers access to privileges below manager position (employee)
    echo "<form action = 'employeeView.php' method='POST'>";
    echo "<button type='submit' name='employeeView'>Sales Product Entry View</button>";
    echo "</form>";

    echo "<form action = 'managerView.php' method='POST'>";
    echo "<button type='submit' name='managerView'>Manager View</button>";
    echo "</form>";

    echo "<form action = 'csView.php' method='POST'>";
    echo "<button type='submit' name='csView'>Customer Service View</button>";
    echo "</form>";
} else {
    //check if logged in user is an employee but NOT manager level
    $query2 = "SELECT employee.fk_department FROM employee WHERE email='$email' AND position != 'Manager' ";
    $result2 = mysqli_query($mysqli, $query2);
    $checkquery2 = mysqli_num_rows($result2);

    if ($checkquery2 > 0) {
        $dept = mysqli_fetch_array($result2);
        switch ($dept[0]) {
        case "Sales":
        echo "<form action = 'employeeView.php' method='POST'>";
        echo "<button type='submit' name='employeeView'>Sales Product Entry</button>";
        echo "</form>";
        break;

        case "Customer Service":
        echo "<form action = 'csView.php' method='POST'>";
        echo "<button type='submit' name='csView'>Customer Service View</button>";
        echo "</form>";
        break;

        case "Human Resources":
        echo "<form action = 'HR.php' method='POST'>";
        echo "<button type='submit' name='HRView'>HR View</button>";
        echo "</form>";
        break;

        case "Technical Support":
        echo "<form action = 'IT.php' method='POST'>";
        echo "<button type='submit' name='ITView'>IT View</button>";
        echo "</form>";
        break;
      }
    }
}
 ?>

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
