<?php
include("server.php");

$_username = $_SESSION['username'];
$success_title =$_POST["success_title"];
$success_story = $_POST["success_story"];
$image_data = $_POST["image_data"];


// get the full name of username
// insert title, body, and image
// insert updated by as -
// insert news_author 	to user full name
// insert news date uploaded

try{
			//get encoder name
			$getEncoderName = $conn->prepare("SELECT * FROM users WHERE UserName = :username");
			$getEncoderName->execute(array(':username'=>$_SESSION['username']));
			if($getEncoderName){
				$EncoderName = $getEncoderName->fetch();
				echo $EncoderName[3].",". $EncoderName[1]." ".$EncoderName[2];
			}
			
			
}catch(Exception $e){
	echo $e->getMessage();
}

 
echo $_username."<br>"; 
echo $success_title."<br>"; 
echo $success_story."<br>"; 
echo $image_data;

?>