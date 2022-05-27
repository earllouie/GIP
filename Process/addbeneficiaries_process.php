<?php
include("..\server.php");




$Applicant_Region = $_POST["Applicant_Region"];
$Applicant_BReN = strtoupper($_POST["Applicant_BReN"]);
$Presented_ID =  $_POST["IDPresented"];
$ID_No = $_POST["IDNumber"];
$Regional_ID = strtoupper($_POST["Regional_ID"]);
$First_Name = strtoupper($_POST["Applicant_First_Name"]);
$Middle_Name = strtoupper($_POST["Applicant_Middle_Name"]);
$Last_Name = strtoupper($_POST["Applicant_Last_Name"]);
$Suffix = strtoupper($_POST["Applicant_Suffix_Name"]);
$Gender = $_POST["Applicant_Gender"];
$Civil_Status = $_POST["Applicant_Civil_Status"];
$Street_No = strtoupper($_POST["Applicant_Street_No"]);
$Barangay = strtoupper($_POST["Applicant_Barangay"]);
$City = strtoupper($_POST["Applicant_City"]);
$Province = strtoupper($_POST["Applicant_Province"]);
$Postal_Code = $_POST["Applicant_Postal_Code"];
$Telephone_No = $_POST["Applicant_Telephone_No"];
$Mobile_No = $_POST["Applicant_Mobile_No"];
$Place_of_Birth = strtoupper($_POST["Applicant_Place_Of_Birth"]);
$Birth_Date = $_POST["Applicant_Birth_Date"];
$Age = $_POST["Applicant_Age"];
$Attainment = $_POST["Attainment"];
$School = strtoupper($_POST["Applicant_School"]);
$Date_Graduated = $_POST["Applicant_Graduation_Date"];
$Document_Submitted = $_POST["Applicant_Submitted_Document"];
$Start_Date = $_POST["Contract_Start_Date"];
$End_Date = $_POST["Contract_End_Date"];
$Disability = $_POST["Type_of_Disability"];
$Nature_of_Work = strtoupper($_POST["Applicant_Nature_Of_Work"]);
$Place_of_Assignment = $_POST["Applicant_Place_Of_Assignment"];
$Institution = strtoupper($_POST["Applicant_Institution"]);
$Status_of_Contract = $_POST["Applicant_Status_Of_Contract"];
$Reason_for_Termination = strtoupper($_POST["Applicant_Reason_For_Termination"]);
$Salary = $_POST["Applicant_Salary"];
$Certification = $_POST["Self_Certification"];
$Encoder_Name = strtoupper($_POST["Encoded_By"]);
$Date_Encoded = $_POST["Encoded_Date"];
$Email_Address = $_POST["Applicant_Email_Address"];
$UpdatedBy ="N//A";
$DateUpdated ="000-00-00";


$stmt = $conn->query("SELECT * FROM `beneficiary`  WHERE `BReN`  = '".$Applicant_BReN."'");
					
					while($row = $stmt->fetch())
					{
						$Region = $row[0];
						$BReN = $row[1];
						$IDo = $row[2];
						$IDNo = $row[3];
						$GIPID = $row[4];
						$FirstName = $row[5];
						$MiddleName = $row[6];
						$LastName = $row[7];
						$Suffix = $row[8];
						$Gender = $row[9];
						$CivilStatus = $row[10];
						$StreetNo = $row[11];
						$Barangay = $row[12];
						$City = $row[13];
						$Province = $row[14];
						$PostalCode = $row[15];
						$Telephone =$row[16];
						$Mobile = $row[17];
						$Email = $row[18];
						$BirthPlace = $row[19];
						$BirthDate = $row[20];
						$Age = $row[21];
						$Attainment = $row[22];
						$School = $row[23];
						$DateGraduated = $row[24];
						$SubmittedDocument = $row[25];
						$StartDate = $row[26];
						$EndDate = $row[27];
						$Disability = $row[28];
						$NatureOfWork = $row[29];
						$PlaceOfAssignment = $row[30];
						$Institution = $row[31];
						$StatusOfContract = $row[32];
						$Termination = $row[33];
						$Salary = $row[34];
						$Certification = $row[35];
						
					}
	
	$PDOQuery = "INSERT INTO `beneficiary` ( `Region`, `BReN`, `ID`, `ID_No`, `GIP_ID`, 
											`First_Name`, `Middle_Name`, `Last_Name`, `Suffix`, `Gender`, 
											`Civil_Status`, `Street_No`, `Barangay`, `City`, `Province`, 
											`Postal_Code`, `Telephone_No`, `Mobile_No`, `Email`, `Birth_Place`, 
											`Birth_Date`, `Age`, `Attainment`, `School`, `Date_Graduated`, 
											`Submitted_Document`, `Contract_Start_Date`, `Contract_End_Date`, `Disability`, `Nature_of_Work`, 
											`Place_of_Assignment`, `Institution`, `Status_of_Contract`, `Details_of_Termination`, `Salary`, 
											`Self_Certification`, `Encoded_By`, `Date_Encoded`, `UpdatedBy`, `DateUpdated`)
				VALUES ( :1,:2,:3,:4,:5,:6,:7,:8,:9,:10,:11,:12,:13,:14,:15,:16,:17,:18,:19,:20,:21,:22,:23,:24,:25,:26,:27,:28,:29,:30,:31,:32,:33,:34, :35,:36, :37, :38 ,:39 ,:40)";
											   						   
	$conn = $conn-> prepare ($PDOQuery);
	$pdoExec = $conn -> execute (array( 
											":1" => $Applicant_Region,
											":2" => $Applicant_BReN,
											":3" => $Presented_ID,
											":4" => $ID_No,
											":5" => $Regional_ID,
											":6" => $First_Name,
											":7" => $Middle_Name,
											":8" => $Last_Name,
											":9" => $Suffix,
											":10" =>$Gender,
											":11" =>$Civil_Status,
											":12" =>$Street_No,
											":13" =>$Barangay,
											":14" =>$City,
											":15" =>$Province,
											":16" =>$Postal_Code,
											":17" =>$Telephone_No,
											":18" =>$Mobile_No,
											":19" => $Email_Address,
											":20" =>$Place_of_Birth,
											":21" =>$Birth_Date,
											":22" =>$Age,
											":23" =>$Attainment,
											":24" =>$School,
											":25" =>$Date_Graduated,
											":26" =>$Document_Submitted,
											":27" =>$Start_Date,
											":28" =>$End_Date,
											":29" =>$Disability,
											":30" =>$Nature_of_Work,
											":31" =>$Place_of_Assignment,
											":32" =>$Institution,
											":33" =>$Status_of_Contract,
											":34" =>$Reason_for_Termination,
											":35" =>$Salary,
											":36" =>$Certification,
											":37" =>$Encoder_Name,
											":38" => $Date_Encoded,
											":39" => $UpdatedBy,
											":40" => $DateUpdated));
										
	if($pdoExec){
		
		echo"New record created successfully";
		$_SESSION['STATUS'] = "New user created successfully!";
		
		header("Location: ../registration.php");
		
	}else{
		echo"Error inserting data";
	}


?>
