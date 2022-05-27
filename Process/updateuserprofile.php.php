<?php
include("..\server.php");

$Updated_BReN = $_POST["Update_BReN"];




$sql = "UPDATE beneficiary
		SET ID=?, 
			ID_No=?, 
			First_Name=? ,
			Middle_Name =?,
			Last_Name=?,
			Suffix=?,
			Gender=?,
			Civil_Status=?,
			Street_No=?,
			Barangay=?,
			City=?,
			Province=?,
			Postal_Code=?,
			Telephone_No=?,
			Mobile_No=?,
			Birth_Place=?,
			Birth_Date=?,
			Age=?,
			Attainment=?,
			School =?,
			Date_Graduated=?,
			Submitted_Document=?,
			Contract_Start_Date=?,
			Contract_End_Date =?,
			Disability=?,
			Nature_of_Work=?,
			Place_of_Assignment=?,
			Institution=?,
			Status_of_Contract=?,
			Details_of_Termination=?,
			Salary=?,		
			Email=?,
			UpdatedBy=?,
			DateUpdated=?
		WHERE BReN =?";
		$conn->prepare($sql)->execute([
				$Updated_ID, 
				$Updated_IDNo, 
				$Updated_FirstName, 
				$Updated_MiddleName, 
				$Updated_LastName, 
				$Updated_Suffix,
				$Updated_Gender,
				$Updated_CivilStatus,
				$Updated_StreetNo,
				$Updated_Barangay,
				$Updated_City,
				$Updated_Province,
				$Updated_PostalCode,
				$Updated_TelephoneNo,
				$Updated_ApplicantNo,
				$Updated_PlaceOfBirth,
				$Updated_BirthDate,
				$Updated_Age,
				$Updated_Attainment,
				$Updated_School,
				$Updated_GraduationDate,
				$Updated_SubmittedDocument,
				$Updated_StartDate,
				$Updated_EndDate,
				$Updated_Disability,
				$Updated_NatureOfWork,
				$Updated_PlaceOfAssignment,
				$Updated_Institution,
				$Updated_StatusOfContract,
				$Updated_TerminationDetails,
				$Updated_Salary,
				$Updated_EmailAddress,
				$Updated,
				$UpdatedDate,
				$Updated_BReN]);

if($sql){
	
		echo"Record updated successfully.";
		header("Location: ../beneficiaries.php");
}else{
	echo "Error inserting data!";
}
?>