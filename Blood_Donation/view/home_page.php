<!DOCTYPE html>
<html>
<head>
     <link rel = "stylesheet"
   type = "text/css"
   href = "style.css" />
   <link rel = "stylesheet" href = "bootstrap.css">
</head>
<body class="hbody">
<div class="topnav">
  <a class="active" href="http://localhost/Blood_Donation/view/home_page.php">Home</a>
  <a href="http://localhost/Blood_Donation/authentication/register.php">Register</a>
  <a href="http://localhost/Blood_Donation/authentication/login.php">Login</a>
  <a href="http://localhost/Blood_Donation/view/blood_bank.php">Blood Bank</a>
        <div  class="search-container">
        <form method="post" action="http://localhost/Blood_Donation/view/search_result.php">
          <input type="text" placeholder="Search Blood Group" name="bgroup">
          <button type="submit" name="search">Search</button>
        </form>
      </div>
</div>
    <header>
  <h1>Blood Donation System </h1>
    </header>
    <div class="card" id="ca" style="width: 18rem;">
  <img class="card-img-top" src="image/add-user.png" alt="Card image cap">
  <div class="card-body">
    <p class="card-text">Name : </p>
    <p class="card-text">Blood group : </p>
    <p class="card-text">Gender : </p>
    <p class="card-text">Address : </p>
    <center><a href="http://localhost/Blood_Donation/authentication/register.php" class="btn btn-primary">Add Donor</a></center>
  </div>
</div>
</body>
</html>