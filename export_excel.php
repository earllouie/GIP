<?php

include("server.php");

	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=DOLE GIP Form F.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");
 
	require_once 'server.php';
 
	$output = "";
	
	$output .="
	
		<style>
		.breaklines
{
    width: auto;
}
		</style>
		<table border='1' >
			<thead>
				<tr>
					<th colspan='10'>DOLE REGIONAL OFFICE</th>
				</tr>
				<tr>
					<th colspan='10'>LIST OF GOVERNMENT INTERNSHIP PROGRAM (GIP) BENEFICIARIES</th>
				</tr>
				<tr>
					<th rowspan='2'>NAME</th>
					<th rowspan='2'>AGE</th>
					<th rowspan='2'>GENDER</th>
					<th rowspan='2'>EDUCATIONAL ATTAINMENT</th>
					<th rowspan='2'>DOCUMENTS SUBMITTED</th>
					<th rowspan='2'>PLACE OF ASSIGNMENT</th>
					<th rowspan='2'>NATURE OF ASSIGNMENT</th>
					<th colspan='2'>DURATION OF CONTRACT</th>
					<th rowspan='2'>REMARKS</th>
				</tr>
				<tr>
					<th>START DATE</th>
					<th>END DATE</th>
				</tr>
		
				
				
			<tbody>
	";
	
	$one = 'SELECT * FROM beneficiary';
				foreach ($conn->query($one) as $row) {
					$output .="
						<tr>
								<td class='breaklines'>".$row['Last_Name'].",".$row['First_Name']." " . $row['Middle_Name']."</td>
								<td class='breaklines'>".$row['Age']."</td>
								<td class='breaklines'>".$row['Gender']."</td>
								<td class='breaklines'>".$row['Attainment']."</td>
								<td class='breaklines'>".$row['Submitted_Document']."</td>
								<td class='breaklines'>".$row['Place_of_Assignment']."</td>
								<td class='breaklines'>".$row['Nature_of_Work']. "</td>
								<td class='breaklines'>".$row['Contract_Start_Date']. "</td>
								<td class='breaklines'>".$row['Contract_End_Date']. "</td>
								<td class='breaklines'>".$row['Status_of_Contract']. "</td>
						</tr>
					
				";}
							
 
	$output .="
			</tbody>
 
		</table>
	";
 
	echo $output;
 
 
?>