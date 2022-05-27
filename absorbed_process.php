<?php
include("server.php");

if(!isset($_SESSION['username'])){
	echo "You don't have access to this page. Please contact the system administrator.";
}
else{


$ID = $_SESSION['$WhatToSearch'];
$DateAbsorbed = $_POST["Date_Absorbed"];
$PositionTitle = $_POST["Position_Title"];
$NatureOfAssignment = $_POST["Nature_Of_Assignment"];
$PlaceOfAssignment = $_POST["Place_Of_Assignment"];
$NamePlaceOfTheAssignemnt = $_POST["Name_Of_Place_Of_Assignment"];
$UpdatedBy = $_SESSION['username'];
$DateUpdated = date("Y-m-d");

echo "GIP ID: " .$ID. "<br>";
echo "DateAbsorbed: " .$DateAbsorbed ."</br>";
echo "Position Title: " .$PositionTitle."</br>";
echo "Nature of Assignment: " . $NatureOfAssignment. "</br>";
echo "Place of Assignment: " .$NamePlaceOfTheAssignemnt . "</br>";
echo "Name Place of the Assignment: ". $NamePlaceOfTheAssignemnt  ."</br>";
echo "Updated By: " . $UpdatedBy . "</br>";
echo "Date Updated: " .$DateUpdated . "</br>";


$GetEncoderFullName = $conn->prepare("SELECT * FROM `users` WHERE `UserName` =  :x");
$GetEncoderFullName -> execute(array (':x'=> $_SESSION['username']));
if($GetEncoderFullName){
	$user = $GetEncoderFullName->fetch();
	$User = $user[1] . " " . $user[3];
	
	$pdoQuery = 'INSERT INTO `reabsorbed` (`ID`,`Date_Absorbed`,`Position_Title`,`Nature_Of_Work`,`Place_Of_Assignment`,`A_UpdatedBy`,`A_DateUpdated`)
				 VALUES (:1, :2 , :3 , :4, :5 , :6 ,:7)';
	
				$conn = $conn->prepare ($pdoQuery);
				$pdoExec = $conn->execute(array(":1" => $ID,
												":2" => $DateAbsorbed ,
												":3" => $PositionTitle,
												":4"=> $NatureOfAssignment,
												":5" => $PlaceOfAssignment,
												":6" => $User,
												":7" => $DateUpdated));					
				if($pdoExec){
					echo"New record created successfully";
					header("Location: AbsorbedForm.php");
					 
				}else{
					echo"Error inserting data";
				}
}
$conn = null;
}
?>