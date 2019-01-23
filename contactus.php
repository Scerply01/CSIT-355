<?php
require 'header-Log.php';

if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['Departments'])) {
        $value =$_POST['Departments'];
        $query = "INSERT INTO assistance(fk_user_id, fk_department)"."VALUES('$user_id', '$value')";
        $runquery = mysqli_query($mysqli, $query);
        echo "<div class='msg'>";
        echo "A cusomter service representative should be reaching out to you shortly";
        echo "</div>";
    } else {
        echo "Something went wrong...";
    }
}
?>
 <ul>
   <li><a href="Home.php"> Home </a></li> &nbsp;
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

    <li><a  class="active" href="contactus.php">Contact Us </a></li> &nbsp;
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
 <form action="contactus.php" method="POST">
   <div class="topbox">
    <p><b>Which department would you like to contact you?</b></p>
   </div>
   <div class="select-dropdown">
     <select name="Departments">
       <option value="Customer Service">Customer Service</option>
       <option value="Human Resources">Human Resources</option>
       <option value="Sales">Sales</option>
       <option value="Technical Support">Technical Support</option>
     </select>
     <input type="submit" value="Submit">
   </div>
</form>


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
 function myFunction4() {
   document.getElementById("myDropdown4").classList.toggle("showD");
 }
</script>
</body>
</html>
