<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("location: http://localhost/Blood_Donation/authentication/login.php");
}
//for search
?>
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
  <a class="active" href="http://localhost/Blood_Donation/view/logout.php">Logout</a>
  <div  class="search-container">
    <form method="post" action="http://localhost/Blood_Donation/view/search_result.php">
      <input type="text" placeholder="Search Blood Group" name="bgroup">
      <button type="submit" name="search">Search</button>
    </form>
  </div>
</div>

</head>
</body>
</html>
<img src="../database/ret_img.php?d_id=<?=$_SESSION['d_id']?>" style="width:200px;height:auto"><br><br>
<?php
echo "NAME : ",$_SESSION['username'],"<br><br>";
//Get the current UNIX timestamp.
$now = time();
 
//Get the timestamp of the person's date of birth.
$date = $_SESSION['age'];
$dateOfBirth = "$date";
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
echo 'AGE : '.$diff->format('%y')."<br><br>";
echo "BLOOD GROUP : ",$_SESSION['blood_group'],"<br><br>";
echo "GENDER : ",$_SESSION['gender'],"<br><br>";
echo "PHONE : ",$_SESSION['phone'],"<br><br>";
echo "ADDRESS : ",$_SESSION['address'],"<br><br>";
echo "Last Blood Donated: ",$_SESSION['date'],"<br><br>";
echo "Update Last Blood Donation Date : "
 ?>
 <!-- For update last blood donation date -->
 <!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
     <link rel = "stylesheet"
   type = "text/css"
   href = "../view/mystyle.css"/>
</head>
 <form method="post" action="../database/update_db.php">
   <input type="date" name="d1"><br><br>
   <input type="submit" name="update" value="Update"><br>
  </form><!-- close form -->
 </div><!-- close aa -->
</body>
</html>
