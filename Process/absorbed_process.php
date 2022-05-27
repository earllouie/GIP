<?php
include("..\server.php");


$data1 = $_POST["GIPID"];
$data2 = $_POST["Region"];
$data3 = $_POST["AbsorbedDate"];
$data4 = strtoupper($_POST["PositionTitle"]);
$data5 = strtoupper($_POST["NatureOfWork"]);
$data6 = strtoupper($_POST["PlaceOfAssignment"]);
$data7 = strtoupper($_POST["NameofthePlaceofAssignment"]);
$data8 = strtoupper($_POST["EncoderName"]);
$data9 = $_POST["DateEncoded"];


try{
	
	$stmt = "INSERT INTO absorbed (`GIP_ID`,`Region`,`AbsorbedDate`,`PositionTitle`,`NatureOfWork`,`PlaceOfAssignment`,`NPlaceOfAssignment`,`EncodedBy`,`DateEncoded`)
			 VALUES (:1,:2,:3,:4,:5,:6,:7,:8,:9)";
	$conn = $conn->prepare($stmt);
	$pdoExec = $conn-> execute(array(
									":1" => $data1,
									":2" => $data2,
									":3" => $data3,
									":4" => $data4,
									":5" => $data5,
									":6" => $data6,
									":7" => $data7,
									":8" => $data8,
									":9" => $data9
									));
	if($pdoExec){
		
		echo"New record created successfully";
	}else{
		echo"Error inserting data";
	}
}catch(PDOException $e){
	echo $e. "</br>". $e->getMessage();	
}

?>