<?php
include("..\server.php");

$username = $_POST["username"];
$password = $_POST["password"];

try{
	
//SELECT DATA OF USER FROM DATABASE
$statement  = $conn->prepare("SELECT * FROM users WHERE UserName = ? AND Password = ?");
$statement	 -> execute ([$username,$password]);
$user = $statement->fetch();
	
if($user[9]=="Encoder"){

			$_SESSION['username'] = $_POST['username'];
			$_SESSION['region'] = $user[10];
			$_SESSION['userlevel'] = $user[9];
			try{
					$updateQuery = 'UPDATE users SET status="Online" WHERE UserName = :username ';
					
					$conn = $conn->prepare($updateQuery);
					$pdoExec = $conn -> execute (array(":username" => $username));
		
					if($pdoExec){
						
						echo"Status updated";
						
					}else{
						echo"Error updating status data";
					}
			}catch(PDOException $e){
				echo $e ."<br>" . $e->getMessage();
			}

header("Location: ../encoder.php");}
else if($user[9]=="Admin"){
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['region'] = $user[10];
			$_SESSION['userlevel'] = $user[9];
			try{
					$updateQuery = 'UPDATE users SET status="Online" WHERE UserName = :username ';
					
					$conn = $conn->prepare($updateQuery);
					$pdoExec = $conn -> execute (array(":username" => $username));
		
					if($pdoExec){
						
						echo"Status updated";
						header("Location: index.html");
						
					}else{
						echo"Error updating status data";
					}
			}catch(PDOException $e){
				echo $e ."<br>" . $e->getMessage();
			}
header("Location: ../profile.php");
}

}catch(PDOException $e){ // END OF TRY CATCH
	echo $e;
}

?>




