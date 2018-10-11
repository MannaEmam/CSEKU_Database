<?php
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'blood_donation');

// REGISTER USER
if (isset($_POST['search'])) {
	// receive all input values from the form
	$bgroup = $_POST['city'];
	//query for getting users id
	$query1 = "SELECT * FROM blood_bank WHERE blood_group= '$bgroup'";
	$results = mysqli_query($db, $query1);
	$array = [];
    while($a = mysqli_fetch_assoc($results))
		{
		    $array[]=$a;    
		}
		?>
<!DOCTYPE html>
<html>
<head>
     <link rel = "stylesheet"
   type = "text/css"
   href = "style.css" />
   <link rel = "stylesheet" href = "bootstrap.css">
   <!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet"
type = "text/css"
href = "style.css" />
<link rel = "stylesheet" href = "bootstrap.css">
<div class="topnav">
  <a class="active" href="http://localhost/Blood_Donation/view/home_page.php">Home</a>
  <a href="http://localhost/Blood_Donation/view/blood_bank.php">Blood Bank</a>
  <a class="active" href="http://localhost/Blood_Donation/authentication/register.php">Register</a>
  <div  class="search-container">
    <form method="post" action="http://localhost/Blood_Donation/view/blood_bank_search.php">
      <input type="text" placeholder="Search Blood Bank By City Name" name="city">
      <button type="submit" name="search">Search</button>
    </form>
  </div>
</div>

</head>
</body>
</html>
</head>
<html>
<body>
<table>
  <tr>
    <th>Blood Bank Name</th>
    <th>Contact Number</th>
    <th>City</th>
    <th>Address</th>    
  </tr>
    <?php
    foreach ($array as $a) {?>
    <tr>
    <td> <?php echo $a['blood_bank_name']?> </td>
    <td> <?php echo $a['phone']?> </td>
    <td> <?php echo $a['city']?> </td>
    <td> <?php echo $a['address']?> </td>
    <tr>
    <?php
  }?>
</table>

</body>
</html>