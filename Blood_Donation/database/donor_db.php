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
$b_donate_date = "";
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'blood_donation');

// REGISTER USER
if (isset($_POST['reg_donor'])) {
	// receive all input values from the form
	$username = $_POST['username'];
	$bgroup = $_POST['bgroup'];
	$gender = $_POST['gender'];
	$address= $_POST['address'];
	$pass = $_POST['pass'];
	$phone = $_POST['phone'];
	$age = $_POST['age'];
	$b_donate_date = $_POST['b_date'];
	$check = getimagesize($_FILES["image"]["tmp_name"]);
	$image = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));
	// form validation: ensure that the form is correctly filled
	/*if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($bgroup)) { array_push($errors, "Blood group is required"); }
	if (empty($gender)) { array_push($errors, "gender is required"); }
	if (empty($address)) { array_push($errors, "address is required"); }
	// register user if there are no errors in the form
	if (count($errors) == 0) {*/
		$query1 = "INSERT INTO donor (name, blood_group, gender, address, password) 
				  VALUES('$username', '$bgroup', '$gender', '$address', '$pass')";
		mysqli_query($db, $query1);
		//query for getting users id
		$queryx = "SELECT donor_id FROM donor WHERE password= $pass";
				$results = mysqli_query($db, $queryx);
		if (mysqli_num_rows($results) == 1) {
			$row = mysqli_fetch_assoc($results);
			$d_id = $row['donor_id'];
		}
		$query2= "INSERT INTO age (d_id, date_of_birth) VALUES ('$d_id','$age')";
		mysqli_query($db, $query2);
		$query3 = "INSERT INTO contact_number (phone_number, d_id) VALUES ('$phone','$d_id')";
		mysqli_query($db, $query3);
		//Insert image content into database
		$query4 = "INSERT INTO image (d_id, image) VALUES ('$d_id','$imgContent')";
        mysqli_query($db, $query4);
		header('location: ../view/home_page.php');
		$query4 = "INSERT INTO availability (d_id, b_donate_date) VALUES ('$d_id','$b_donate_date')";
        mysqli_query($db, $query4);
		$query5 = "INSERT INTO image (d_id, image) VALUES ('$d_id','$imgContent')";
        mysqli_query($db, $query5);
		header('location: ../view/home_page.php');
	//}
}
?>