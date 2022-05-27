<?php
include("server.php");

if(!empty($_POST["Applicant_BReN"])){
	
	
	$sql = "SELECT * FROM `beneficiary` WHERE `BReN` = :username"; 
	$result = $conn->prepare($sql); 
	$result->execute(array('username' => $_POST["Applicant_BReN"]));
	$row_count =$result->fetchColumn();
	
	if($row_count>0){
		echo "<span style='color:red'>ALREADY ENROLLED!</span>";
		echo  "<script>$('submit').prop('disabled', true);</script>";
	}else{
		echo "<span style='color:green'>USER IS AVAILABLE FOR REGISTRATION!</span>";
		echo  "<script>$('submit').prop('disabled', false);</script>";
	}
}

?>