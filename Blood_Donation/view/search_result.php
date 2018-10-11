<?php
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'blood_donation');

// REGISTER USER
if (isset($_POST['search'])) {
	// receive all input values from the form
	$bgroup = $_POST['bgroup'];
	//query for getting users id
	$query1 = "SELECT * FROM donor WHERE blood_group= '$bgroup'";
	$results = mysqli_query($db, $query1);
	$array = [];
    while($a = mysqli_fetch_assoc($results))
		{
		    $array[]=$a;    
		}
	foreach ($array as $a)
	{
		?>
		<div style="width: 250px; height: auto; float: left; padding-top: 10px;">
			
		<img src="../database/ret_img.php?d_id=<?=$a['donor_id']?>" style="width:200px;height:auto"> <br>
		Name: <?php echo $a['name'];?><br>
		Blood Group: <?php echo $a['blood_group'];?><br>
		<?php
		//Get the timestamp of the person's date of birth.
		$x = $a['donor_id'];
		$query2 = "SELECT * FROM age WHERE d_id = '$x'";
		$results = mysqli_query($db, $query2);
		if (mysqli_num_rows($results) == 1) {
			$row = mysqli_fetch_assoc($results);
			$date = $row['date_of_birth'];
		}
		$dateOfBirth = "$date";
		$today = date("Y-m-d");
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		$query3 = "SELECT * FROM contact_number WHERE d_id = '$x'";
		$results = mysqli_query($db, $query3);
		if (mysqli_num_rows($results) == 1) {
			$row = mysqli_fetch_assoc($results);
			$number = $row['phone_number'];
		}
		//getting last blood donation date 
		$query4 = "SELECT * FROM availability WHERE d_id = '$x'";
		$results = mysqli_query($db, $query4);
		if (mysqli_num_rows($results) == 1) {
			$row = mysqli_fetch_assoc($results);
			$date2 = $row['b_donate_date'];
			$ts1 = strtotime($date2);
			$ts2 = strtotime($today);

			$year1 = date('Y', $ts1);
			$year2 = date('Y', $ts2);

			$month1 = date('m', $ts1);
			$month2 = date('m', $ts2);

			$answer = (($year2 - $year1) * 12) + ($month2 - $month1);
		}
		?>
		Age: <?php echo $diff->format('%y');?><br>
		Gender: <?php echo $a['gender'];?><br>
		Phone: <?php echo $number;?> <br>
		Address: <?php echo $a['address'];?><br>
		<?php
		if($answer >= 4)
		{?>

			Availability: Available <br>
		<?php
		}
		else
		{
		?>
			Availability: Not Available <br>
		<?php
		}
		?>
		</div>
		
		<?php
	} 
}
?>