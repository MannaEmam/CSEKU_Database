<?php
session_start();
// connect to database
$d_id = $_SESSION['d_id'];
$db = mysqli_connect('localhost', 'root', '', 'blood_donation');
	if(isset($_POST['update']))
	{
			$date = $_POST['d1'];
			$update_query = "UPDATE availability SET b_donate_date = '$date' WHERE d_id = '$d_id'";
			mysqli_query($db, $update_query);
			$get_query = "SELECT * FROM availability WHERE d_id = '$d_id'";
			$results = mysqli_query($db, $get_query);
			if (mysqli_num_rows($results) == 1) {
			$row = mysqli_fetch_assoc($results);
			$_SESSION['date'] = $row['b_donate_date'];
		}
		header('location: ../view/profile.php');
	}
?>