<?php
include("server.php");

if(!isset($_SESSION['username'])){
	echo "You don't have access to this page. Please contact the system administrator.";
}
else{
$ID = $_SESSION['$WhatToSearch'];
$StartDate = $_POST["start_date"];
$EndDate = $_POST["end_date"];
$NatureofWork = $_POST["nature_of_work"];
$PlaceofAssignment = $_POST["place_of_assignment"];
$NPlaceofAssignment = $_POST["name_place_of_assignment"];
$Requirements = $_POST["readmitted_requirements"];
$UpdatedBy = $_SESSION['username'];
$DateUpdated = date("Y-m-d");

$GetEncoderFullName = $conn->prepare("SELECT * FROM `users` WHERE `UserName` =  :x");
$GetEncoderFullName -> execute(array (':x'=> $_SESSION['username']));
if($GetEncoderFullName){
	$user = $GetEncoderFullName->fetch();
	$User = $user[1] . " " . $user[3];
	
	try
	{
		$pdoQuery = 'INSERT INTO `readmitted` (`ID`,`ContractStartDate`,`ContractEndDate`,`NatureOfWork`,`PlaceOfAssignment`,`NameOfEtablishment`,`RequirementSubmitted`,`UpdatedBy`,`DateUploaded`)
					 VALUES (:1, :2 , :3 , :4, :5 , :6 , :7 ,:8 , :9)';
		
		$conn = $conn->prepare ($pdoQuery);
		$pdoExec = $conn->execute(array(":1" => $ID,
										":2" => $StartDate ,
										":3" => $EndDate,
										":4"=> $NatureofWork,
										":5" => $PlaceofAssignment,
										":6" => $NPlaceofAssignment,
										":7" => $Requirements,
										":8" => $User,
										":9" => $DateUpdated));
									
									
		if($pdoExec)
			{
				echo"New record created successfully";
				header("Location: profile.php");
			}else
				{
					echo"Error inserting data";
				}
	}catch(PDOException $e)
		{
			echo $e."</br>" . $e->getMessage();
		}
		$conn = null;
}else{
	
}


}

?>