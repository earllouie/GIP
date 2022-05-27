<?php
include("server.php");
$_SESSION['username'];
$_SESSION['region'];
$_SESSION['userlevel'];


if($_SESSION['userlevel']=="Encoder"){
	$sql = "SELECT * FROM beneficiary
		WHERE Region = '".$_SESSION['region']. "' 
		AND 
		(First_Name LIKE '%".$_POST['search']."%'
		OR Last_Name LIKE '%".$_POST['search']."%'
		OR BReN LIKE '%".$_POST['search']."%'
		OR GIP_ID LIKE '%".$_POST['search']."%'
		OR Contract_End_Date LIKE '%".$_POST['search']."%')";
		
}else if($_SESSION['userlevel']=="Admin"){
	$sql = "SELECT * FROM beneficiary 
			WHERE First_Name LIKE '%".$_POST['search']."%' OR 
				  Last_Name LIKE '%".$_POST['search']."%' OR 
				  BReN LIKE '%".$_POST['search']."%' OR 
				  GIP_ID LIKE '%".$_POST['search']."%'
				  OR Contract_End_Date LIKE '%".$_POST['search']."%'";
												 
}
		
$stmt =$conn->prepare($sql);
$stmt->execute();
$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
if(isset($data['0'])){
	echo '<table class="table table-hover">
			<thead>
				<tr>
					<td>ACTION</td>
					<td>REGION</td>
					<td>GIP ID NO.</td>
					<td>FULL NAME</td>
					<td>GENDER</td>
					<td>INSTITUTION</td>
					<td>CONTRACT END DATE</td>
				</tr>
			</thead>';
			
			foreach($data as $list){
				$html='<tr>
					<td class="text-center">
						<form method="POST" action="view.php">
						<input type="hidden" name="ID" value="'.$list["GIP_ID"].'">
						<input type="submit" type="submit" value="VIEW" class="button"></input>
						</form>
						</td>
						<td class="text-center">
						<form method="POST" action="EditProfile.php">
						<input type="hidden" name="ID" value="'.$list['GIP_ID'].'">
						<input type="submit" type="submit" value="UPDATE" class="button"></input>
						</td>
						</form>
					<td>'.$list['Region'].'</td>
					<td>'.$list['GIP_ID'].'</td>
					<td>'.$list['First_Name'] . " " .$list['Middle_Name']."." . " ". $list['Last_Name'].'</td>
					<td>'.$list['Gender'].'</td>
					<td>'.$list['Institution'].'</td>
					<td>'.$list['Contract_End_Date'].'</td>
				</tr>';
			}
			$html.='</table>';
			echo $html;
}else{
	echo "No matching result!";
}
?>

