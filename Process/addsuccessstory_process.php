<?php
include("..\server.php");

$username = $_SESSION['username'];
$Success_Title = strtoupper($_POST["success_title"]);
$Success_Body = $_POST["success_story"];
$Success_Image = $_FILES["image_data"];
$Date_Uploaded = date("Y-m-d");
$Date_Updated = "0000-00-00";
$Updated_By ="N/A";

try{
	$PDO_Query_Insert_Success_Story = "INSERT INTO `success_story` (`story_title`,`story_body`,`img_name`,`img_data`,`author`,`upload_date`,`updated_by`,`date_updated`) 
	                          VALUES (:title, :body , :img_name , :img_data , :writer , :upload_date ,:updated_by ,:date_updated)";
	$conn = $conn-> prepare ($PDO_Query_Insert_Success_Story);
	$pdoExec = $conn -> execute (array( 
										
				   ":title" => $Success_Title,
				   ":body" => $Success_Body,
				   ":img_name" => $Success_Image['name'],
				   ":img_data" => file_get_contents($Success_Image['tmp_name']),
				   ":writer" => $username ,
				   ":upload_date" => $Date_Uploaded,
				   ":updated_by" => $Updated_By,
				   ":date_updated" => $Date_Updated,
				   ));
				   
	if($pdoExec){
		$_SESSION['SUCCESS_SSTORY_UPLOAD_STATUS'] = "Success story uploaded successfully!";
		header("Location: ../profile.php");
	}else{
		echo "Upload failed";
	}
	
}catch(Exception $ex){
	echo $ex->getMessage();
}


?>