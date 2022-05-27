 <?php
session_start();

$servername = "localhost";
$username = "gip";
$password = "A(6pvXJVIZ1TlJ[u";

try {
  $conn = new PDO("mysql:host=$servername;dbname=gip_online_monitoring_system", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	throw new PDOException($e-> getMessage(), (int)$e->getCode());
}
?> 