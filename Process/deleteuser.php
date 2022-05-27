<?php
include("..\server.php");

$sql = "DELETE FROM users WHERE UserID=?";
$stmt= $conn->prepare($sql);
$stmt->execute([$_POST['DeleteUser']]);
if($stmt){
	
		$_SESSION['STATUS'] = "Data inserted successfully!";
		header("Location: ../profile.php");
}else{
	echo "Error inserting data!";
}

?>