<?php
		session_start();
		session_destroy();
		header("location: http://localhost/Blood_Donation/view/home_page.php");
?>