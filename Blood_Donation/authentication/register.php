<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
     <link rel = "stylesheet"
   type = "text/css"
   href = "../view/style.css"/>
</head>
<body class="rbody">
 <div class="aa">
 <h2>Register</h2>
  <form method="post" action="http://localhost/Blood_Donation/database/donor_db.php" enctype="multipart/form-data">
   <input type="text" name="username" placeholder="Enter Your Username"><br><br>
   <input type="text" name="bgroup" placeholder="Enter Your Blood Group"><br><br>
   <input type="password" name="pass" placeholder="Enter Password"><br><br>
   <input type="text" name="gender" placeholder="Enter Your Gender"><br><br>
   <input type="text" name="address" placeholder="Enter Your Address"><br><br>
   <input type="text" name="phone" placeholder="Enter Your Phone Number"><br><br>
   <input placeholder="Date Of Birth" name = "age" class="textbox-n" type="text" onfocus="(this.type='date')"  id="date"> <br><br>
              <input type="file" name="image"/>
   <input placeholder="Last Blood Donated" name = "b_date" class="textbox-n" type="text" onfocus="(this.type='date')"  id="date"> <br><br>          
   <input type="submit" name="reg_donor" value="Submit"><br>
  </form><!-- close form -->
 </div><!-- close aa -->
</body>
</html>