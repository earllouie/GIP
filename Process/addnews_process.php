<?php
include("..\server.php");

$username = $_SESSION['username'];
$NewsTitle = $_POST["NewsTitle"];
$imagedescription = $_POST["image_description"];
$NewsBody = ($NewsBody = $_POST["NewsBody"]);
$ImageToUpload = $_FILES["image_data"];
$Date_Uploaded = date("Y-m-d");
$Date_Updated = "N/A";
$Updated_By ="N/A";

		try{
	$PDO_Query_Insert_News = "INSERT INTO `news` (`news_title`,`news_content`,`news_author`,
												  `news_date_uploaded`,`image_name`,`image_data`,`image_description`,
												  `updated_by`,`date_updated`) 
	                          VALUES (:NewsTitle , :NewsContent , :NewsAuthor ,
									  :NewsDateUploaded ,:ImageName ,:ImageData ,
									  :ImageDescription , :UpdateBy,:DateUpdated)";
									  
	$conn = $conn-> prepare ($PDO_Query_Insert_News);
	$pdoExec = $conn -> execute (array( 
										
				   ":NewsTitle" => $NewsTitle,
				   ":NewsContent" => $NewsBody,
				   ":NewsAuthor" => $username,
				   ":NewsDateUploaded" => $Date_Uploaded,
				   ":ImageName" => $ImageToUpload['name'],
				   ":ImageData" => file_get_contents($ImageToUpload['tmp_name']),
				   ":ImageDescription" => $imagedescription,
				   ":DateUpdated" => $Date_Updated,
				   ":UpdateBy" => $Updated_By,));
				   
	if($pdoExec){
		$_SESSION['NEWS_UPLOAD_STATUS'] = "News uploaded successfully!";
		header("Location: ../profile.php");
	}else{
		echo "Upload failed";
	}
	
}catch(Exception $ex){
	echo $ex->getMessage();
}


?>