<?php
include("server.php");

$region = $_POST["Region"];
$security = $_POST["Security_Level"];
$firstname = $_POST["First_Name"];
$middlename = $_POST["Middle_Name"];
$lastname = $_POST["Last_Name"];
$username = $_POST["Username"];
$password = $_POST["password"];
$datecreated = date("m/d/Y");
$logoutdate = "";
$status ="Offline";


try{
	$pdoQuery = 'INSERT INTO `users` (`FirstName`, `MiddleName` , `LastName`, `UserName`, `Password`, `DateCreated` , `LogOutDate`, `Status`, `AccessLevel` , `	`)
				 VALUES (:firstname, :middlename , :lastname , :username , :password , :datecreated , :logoutdate , :status , :accesslevel , :region)';
				 
	$conn = $conn-> prepare ($pdoQuery);
	$pdoExec = $conn -> execute (array(":firstname" => $firstname, 
										":middlename"=> $middlename, 
										":lastname" => $lastname , 
										":username" => $username , 
										":password" => $password,
										":datecreated" => $datecreated,
										":logoutdate" => $logoutdate,
										":status" => $status,
										":accesslevel" => $security,
										":region" => $region));
	if($pdoExec){
		
		echo"New record created successfully";
		$_SESSION['STATUS_A'] = "Data inserted successfully!";
		header("Location: profile.php");
		
	}else{
		echo"Error inserting data";
	}
}catch(PDOException $e){
	echo $e ."<br>" . $e->getMessage();
	}

$conn = null;
?>