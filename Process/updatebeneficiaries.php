<?php
include("..\server.php");

//VARIABLES FOR BENEFICIARY PROFILE 

$ProfileToUpdate = $_POST["Regional_ID"];
$New_Region = $_POST["Region"];
$New_GIPID = strtoupper($_POST["Regional_ID"]);
$New_BReN =  $_POST["BReN"];
$New_ID = $_POST["ValidID"];
$New_IDNo = $_POST["ValidIDNo"];
$New_FirstName = strtoupper($_POST["FirstName"]);
$New_MiddleName = strtoupper($_POST["MiddleName"]);
$New_LastName = strtoupper($_POST["LastName"]);
$New_Suffix = strtoupper($_POST["Suffix"]) ;           
$New_Gender = $_POST["Gender"];
$New_CivilStatus = $_POST["CivilStatus"];

$New_BirthPlace = strtoupper($_POST["BirthPlace"]);
$New_BirthDate = $_POST["BirthDate"];
$New_ValidID = $_POST["ValidID"];
$New_ValidIDNo = $_POST["ValidIDNo"];
$New_StreetNo = $_POST["StreetNo"];
$New_Barangay = strtoupper($_POST["Barangay"]);
$New_City = strtoupper($_POST["City"]);
$New_Province = strtoupper($_POST["Province"]);
$New_PostalCode= $_POST["PostalCode"];
$New_Age = $_POST["Age"];

$New_TelephoneNo = $_POST["TelephoneNo"];
$New_MobileNo= $_POST["MobileNo"];
$New_Email = $_POST["Email"];

$New_Attainment = $_POST["Attainment"];
$New_School = strtoupper($_POST["School"]);
$New_DateGraduated = $_POST["DateGraduated"];
$New_DocumentSubmitted = $_POST["DocumentSubmitted"] ;

$New_PlaceofAssignment = $_POST["PlaceofAssignment"];
$New_StartDate = $_POST["StartDate"];
$New_EndDate = $_POST["EndDate"];
$New_StatusofContract = $_POST["StatusofContract"];
$New_NatureofWork = strtoupper($_POST["NatureofWork"]);
$New_NameofInstitution = strtoupper($_POST["NameofInstitution"]);
$New_Salary = $_POST["Salary"];
$New_Group = $_POST["Group"];
$New_Terminated = strtoupper($_POST["TerminationDetails"]);
$New_UpdatedBy = $_POST["UpdatedBy"];
$New_DateUpdated = $_POST["DateUpdated"];
//CHECKBOX FOR UPDATING WHICH FORM TO UPDATE


//VARIABLES FOR RE ADMITTED
$RA_StartDate = $_POST["RA_StartDate"];
$RA_EndDate = $_POST["RA_EndDate"];
$RA_NatureofWork = $_POST["RA_NatureofWork"];
$RA_PlaceofAssignment = $_POST["RA_PlaceofAssignment"];
$RA_NameofPlaceofAssignment = $_POST["RA_NameofPlaceofAssignment"];


$A_DateAbsorb = $_POST["A_DateAbsorb"];
$A_PositionTitle = strtoupper($_POST["A_PositionTitle"]);
$A_NatureofWork = strtoupper($_POST["A_NatureofWork"]);
$A_PlaceofAssignment = $_POST["A_PlaceofAssignment"];
$A_NamePlaceofAssignment = $_POST["A_NamePlaceofAssignment"];



//CONDITION IF READMITTED CHECKBOX IS CHECKED
if(isset($_POST["chbReAdmitted"]) ){
	$search1 = $conn->prepare("SELECT * FROM readmitted WHERE RA_GIP_ID= :ID");
	$search1->execute(array(':ID' => $New_GIPID));
	$A_user = $search1->fetch();
	
	// CHECK IF THERE IS AN EXISTING DATA ON TABLE RE ADMITTED
	if($A_user){
		if($A_user ["RA_GIP_ID"] == $New_GIPID){
			// IF YES
			//INSERT UPDATE QUERY FOR READMITTED FORM 
			if(isset($_POST["D1"])){$RA_D1 = $_POST["D1"];}else{$RA_D1 = "N/A";}
			if(isset($_POST["D2"])){$RA_D2 = $_POST["D2"];}else{$RA_D2 = "N/A";}
			if(isset($_POST["D3"])){$RA_D3 = $_POST["D3"];}else{$RA_D3 = "N/A";}
		
			$sql = "UPDATE readmitted SET RA_ContactStartDate=? , RA_ContractEndDate=?, RA_NatureOfWork=?, RA_PlaceOfAssignment=?, RA_D1=? ,RA_D2=? ,RA_D3=? ,RA_EncodedBy=?, RA_DateEncoded=? WHERE RA_GIP_ID=?";
			$stmt= $conn->prepare($sql);
			$stmt->execute([$RA_StartDate,
							$RA_EndDate, 
							$RA_NatureofWork, 
							$RA_PlaceofAssignment,
							$RA_D1,
							$RA_D2,
							$RA_D3,
							$New_UpdatedBy,
							$New_DateUpdated,
							$New_GIPID]);
							
			if($stmt){echo "Updated successfuly!"; header("Location: ../beneficiaries.php");}else{echo "Error updating the record!";}
			
		}
		
	}else{
		//IF NO
		// INSERT QUERY FOR READMITTED FORM
		if(isset($_POST["D1"])){$RA_D1 = $_POST["D1"];}else{$RA_D1 = "N/A";}
		if(isset($_POST["D2"])){$RA_D2 = $_POST["D2"];}else{$RA_D2 = "N/A";}
		if(isset($_POST["D3"])){$RA_D3 = $_POST["D3"];}else{$RA_D3 = "N/A";}
	
		$sql = "INSERT INTO readmitted (RA_GIP_ID,RA_Region,RA_ContactStartDate, RA_ContractEndDate, RA_NatureOfWork, RA_PlaceOfAssignment, RA_D1, RA_D2, RA_D3, RA_EncodedBy, RA_DateEncoded)
		VALUES (?,?,?,?,?,?,?,?,?,?,?)";
		$conn->prepare($sql)->execute([$New_GIPID,$New_Region,$RA_StartDate,$RA_EndDate,$RA_NatureofWork,$RA_PlaceofAssignment,$RA_D1,$RA_D2,$RA_D3,$New_UpdatedBy,$New_DateUpdated]);			
				
		if($sql){echo "Data inserted successfully!"; header("Location: ../beneficiaries.php");}else{echo "Error inserting data";}
	}// END OF QUERY FOR ABSORB FORM
			
	
}

//CONDITION IF ABSORB CHECKBOX IS CHECKED
else if(isset($_POST["chbAbsorb"])){
	$search1 = $conn->prepare("SELECT * FROM absorbed WHERE GIP_ID= :ID");
	$search1->execute(array(':ID' => $New_GIPID));
	$A_user = $search1->fetch();
	
	// CHECK IF THERE IS AN EXISTING DATA ON TABLE ABSORBED
	if($A_user["GIP_ID"] == $New_GIPID){
		// IF YES
		//INSERT UPDATE QUERY FOR ABSORB FORM 
		$sql = "UPDATE absorbed SET AbsorbedDate=? , PositionTitle=?, NatureOfWork=?, PlaceOfAssignment=?, NPlaceOfAssignment=? ,EncodedBy=?, DateEncoded=? WHERE GIP_ID=?";
		$stmt= $conn->prepare($sql);
		$stmt->execute([$A_DateAbsorb,
						$A_PositionTitle, 
						$A_NatureofWork, 
						$A_PlaceofAssignment,
						$A_NamePlaceofAssignment,
						$New_UpdatedBy,
						$New_DateUpdated,
						$New_GIPID]);
	}else{
		//IF NO
		// INSERT QUERY FOR ABSORB FORM
			$sql = "INSERT INTO absorbed (GIP_ID,Region,AbsorbedDate, PositionTitle, NatureOfWork, PlaceOfAssignment, NPlaceOfAssignment, EncodedBy, DateEncoded)
			VALUES (?,?,?,?,?,?,?,?,?)";
			$conn->prepare($sql)->execute([$New_GIPID,$New_Region,$A_DateAbsorb,$A_PositionTitle,$A_NatureofWork,$A_PlaceofAssignment,$A_NamePlaceofAssignment,$New_UpdatedBy,$New_DateUpdated]);			
			
			if($sql){
				echo "Data inserted successfully!";
			}else {
				echo "Error inserting data";
			}
	}
}

		//UPDATING OF  BENEFICIARY DETAILS 
			$sql = " UPDATE beneficiary SET 
								Region=?,BReN=?,ID=?,ID_No=?,GIP_ID=?,
								First_Name=?,Middle_Name=?,Last_Name=?,Suffix=?,Gender=?,
								Civil_Status=?,Street_No=?,Barangay=?,City=?,Province=?,Postal_Code=?,
								Telephone_No=?,Mobile_No=?,Email=?,Birth_Place=?,Age=?,
								Attainment=?,School=?,Date_Graduated=?,Submitted_Document=?,Contract_Start_Date =?,
								Contract_End_Date=?,Disability=?,Nature_of_Work=?,Place_of_Assignment=?,Status_of_Contract=?,
								Details_of_Termination=?,Salary=?,UpdatedBy=?,DateUpdated=?
							WHERE GIP_ID=?";
			$stmt= $conn->prepare($sql);
			$stmt->execute([$New_Region,$New_BReN,$New_ID,$New_IDNo,$New_GIPID,
							$New_FirstName,$New_MiddleName,$New_LastName,$New_Suffix,$New_Gender,
							$New_CivilStatus,$New_StreetNo,$New_Barangay,$New_City,$New_Province,$New_PostalCode,
							$New_TelephoneNo,$New_MobileNo,$New_Email,$New_BirthPlace,$New_Age,
							$New_Attainment,$New_School,$New_DateGraduated,$New_DocumentSubmitted,$New_StartDate,
							$New_EndDate,$New_Group,$New_NatureofWork,$New_PlaceofAssignment,$New_StatusofContract,
							$New_Terminated,$New_Salary, $New_UpdatedBy, $New_DateUpdated,$ProfileToUpdate]);
			//IF UPDATING IF SUCCESSFULL			
			if($stmt)
				{
				$_SESSION["STATUS_B"] = "User data updated successfully!";
				
				header("Location: ../beneficiaries.php");
				}
?>