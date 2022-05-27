<?php
include("server.php");

if(!empty($_POST["Regional_ID"])){
	
	
	$sql = "SELECT * FROM `beneficiary` WHERE `GIP_ID` = :id"; 
	$result = $conn->prepare($sql); 
	$result->execute(array('id' => $_POST["Regional_ID"]));
	$row_count1 =$result->fetchColumn();
	
	if($row_count1>0){
		echo "<span style='color:red'>ALREADY ENROLLED!</span>";
		echo  "<script>$('submit').prop('disabled', true);</script>";
	}else{
		echo "<span style='color:green'>USER IS AVAILABLE FOR REGISTRATION!</span>";
		echo  "<script>$('submit').prop('disabled', false);</script>";
	}
}

?>