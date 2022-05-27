<?php
include("..\server.php");


$_POST["USERID"];
$_POST["UpdatedRegion"];
$_POST["Updated_Security_Level"];
$_POST["Updated_First_Name"];
$_POST["Updated_Middle_Name"];
$_POST["Updated_Last_Name"];
$_POST["Update_Username"];
$_POST["Update_Password"];

echo $_POST["UpdatedRegion"]."<br>";
echo $_POST["Updated_Security_Level"]."<br>";
echo $_POST["Updated_First_Name"]."<br>";
echo $_POST["Updated_Middle_Name"]."<br>";
echo $_POST["Updated_Last_Name"]."<br>";
echo $_POST["Update_Username"]."<br>";
echo $_POST["Update_Password"]."<br>";

$sql = "UPDATE users SET FirstName=?, MiddleName=?, LastName=? , UserName=?, Password=?, AccessLevel=?, Region=? WHERE UserID=?";
$stmt= $conn->prepare($sql);
$stmt->execute([$_POST["Updated_First_Name"],
				$_POST["Updated_Middle_Name"], 
				$_POST["Updated_Last_Name"], 
				$_POST["Update_Username"],
				$_POST["Update_Password"],
				$_POST["Updated_Security_Level"],
				$_POST["UpdatedRegion"],
				$_POST["USERID"]]);
				
if($stmt){
	$_SESSION["STATUS_B"] = "User data updated successfully!";
	header("Location: ../profile.php");
}

?>