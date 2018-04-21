<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "rebeyxtb";
$password = "nmzNOJ9CKzm6";
$dbname = "rebeyxtb_Grip_DB";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
require_once 'config.php';
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>

<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" /></html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><script src="grips_script.js"></script>

<div class="container-fluid center">


<label for="selShow">What would you like to do?</label><br>
<input type="radio" name="selShow" id="calculateSel"  value="calculate" /> Calculate Order Price
<input type="radio" name="selShow" id="addSel"  value="add" /> Add Inventory Item
<input type="radio" name="selShow" id="showSel"  value="show" /> Show Inventory
<input type="radio" name="selShow" id="updateSel"  value="update" /> Update Inventory Quantity


<form method="post"  id="calculateForm" name="calculateform" action="gripUpdateInventory.php" />
<header>
<br>
Calulate Total Sales Price
</header>
<br>

Style:
 <?php

 $sql = "SELECT Style, Price FROM MyGuests ORDER BY Style";
$result = $conn->query($sql);

echo "<select id='calcPriceStyle' name='Style'>";
while($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['Style'] . "'>" . $row['Style'] . " $" . $row['Price'] . "</option>";
}
echo "</select>";

?>
  <br>
Price Each:
<input type="textbox" name="totalPriceOutput" />
Quantity:
<input type="number" name="calculateQuantity" />


<input type="button"name="calcTotalPrice" value="Calculate Total Price"/>

<input type="textbox" name="totalPriceOutput"/>
<br>
<input type="submit" name="Submit" value="Sell & Update" />

</form>



<form method="post"  style="display:none" id="updateForm" name="updateform" action="gripUpdateInventory.php" />
<header>
<br>
Update Quantity
</header>
<br>
Style:

 <?php
 $sql = "SELECT Style FROM MyGuests ORDER BY Style";
$result = $conn->query($sql);

echo "<select name='Style'>";
while($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['Style'] . "'>" . $row['Style'] . "</option>";
}
echo "</select>";
?>


Quantity:

<input type="number" name="newQuantity" />
<input type="submit" name="Submit" value="update" />
</form>

<form method="post" style="display:none" id="addForm" name="update" action="gripAddInventory.php"/>
<header>
<br>
Add New Inventory
</header>
<br>
<ul>
<li>Brand:<input type="text" name="brand" /></li>

<li>Style:<input type="text" name="newStyle" /></li>

<li>Size:<input type="text" name="size" /></li>


<li>Quantity:<input type="number" name="newQuantity" /></li>
<input type="submit" name="Submit" value="Add" />
</ul>
 </form>


 <form method="post" id="showForm" style="display:none" name="update" action="gripPrintInventory.php"/>
 <header>
 <br>
 View Inventory List
 </header>
 <br>
 Style to View:

 <?php
 $sql = "SELECT Style FROM MyGuests ORDER BY Style";
$result = $conn->query($sql);

echo "<select name='styleSearch'>";
while($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['Style'] . "'>" . $row['Style'] . "</option>";
}
echo "</select>";

$conn->close();
?>
 <input type="submit" name="Submit" value="View" />


</div>
<p><a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a></p>
