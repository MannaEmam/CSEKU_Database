<?php
if(!empty($_GET['d_id'])){
$db = mysqli_connect('localhost', 'root', '', 'blood_donation');
 $d_id  = $_GET['d_id'] ;
    //Check connection
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
    
    //Get image data from database
    $result = $db->query("SELECT image FROM image where d_id = '$d_id'");
    
    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        //Render image
        header("Content-type: image/jpg"); 
        echo $imgData['image']; 
    }else{
        echo 'Image not found...';
    }
}
?>