
<?php 

$MERCHANT_ID = 'TESTJAYVEE';
$MERCHANT_PASSWORD = 'HnJhcHWyuzN7AKJ';
$servername = "localhost";
$username = "id21203603_jayveedemo";
$password = "-Jh4bi19";
$db = 'id21203603_jayveedemo';

$conn = new mysqli($servername, $username, $password,$db);
try  {
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
}
catch(Exception $e) {
	echo ' Message: ' .$e->getMessage() ;
	exit;
}


?>