<?php
include("server.php");

$_username = $_SESSION['username'];
$_status = "Offline";
$_inactivedate = date("Y-m-d");

echo $_username ."<br>";
echo $_status ."<br>";
echo $_inactivedate . "<br>";

try{
	
	$data = [
	'form_username' => $_username,
	'account_status' => $_status,
	'inactive_date' => $_inactivedate
	
	];
	
	
	
	$sql = "UPDATE users SET Status=:account_status, LogOutDate =:inactive_date WHERE UserName =:form_username";
	$stmt= $conn->prepare($sql);
	$stmt->execute($data);
	
	unset ($_SESSION['username']);
	unset ($_SESSION['region']);
	unset ($_SESSION['userlevel']);
	header("Location: index.php");
}catch(PDOException $e){
	echo $sql . "<br>" . $e->getMessage();
}


?>