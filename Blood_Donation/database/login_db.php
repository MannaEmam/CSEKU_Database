<?php
session_start();
// variable declaration
$username = "";
$bgroup    = "";
$gender    = "";
$pass	= "";
$age = "";
$phone = "";
$d_id = "";
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'blood_donation');

// LOGIN USER
if (isset($_POST['login_donor'])) {
	$username = $_POST['username'];
	$pass = $_POST['password'];
		$query1 = "SELECT * FROM donor WHERE name='$username' AND password='$pass'";
		$results = mysqli_query($db, $query1);
		if (mysqli_num_rows($results) == 1) {
			$row = mysqli_fetch_assoc($results);
			$d_id = $row['donor_id'];
			$_SESSION['d_id'] = $d_id;
			$_SESSION['username'] = $row['name'];
			$_SESSION['blood_group'] = $row['blood_group'];
			$_SESSION['gender'] = $row['gender'];
			$_SESSION['address'] = $row['address'];
			$query2 = "SELECT * FROM contact_number WHERE d_id = '$d_id'";
			$results = mysqli_query($db, $query2);
			if (mysqli_num_rows($results) == 1) {
			$row = mysqli_fetch_assoc($results);
			$_SESSION['phone'] = $row['phone_number'];
		}
			$query3 = "SELECT * FROM age WHERE d_id = '$d_id'";
			$results = mysqli_query($db, $query3);
			if (mysqli_num_rows($results) == 1) {
			$row = mysqli_fetch_assoc($results);
			$_SESSION['age'] = $row['date_of_birth'];
		}
			$query4 = "SELECT * FROM availability WHERE d_id = '$d_id'";
			$results = mysqli_query($db, $query4);
			if (mysqli_num_rows($results) == 1) {
			$row = mysqli_fetch_assoc($results);
			$_SESSION['date'] = $row['b_donate_date'];
		}		
			header('location: ../view/profile.php');
		}
	}
?>		