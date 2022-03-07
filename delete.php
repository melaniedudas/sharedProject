
<?php
session_start();
include_once 'connect.php';

$username = $_SESSION['username'];
$sql = "DELETE FROM userinfo WHERE username='$username'";

if (mysqli_query($conn, $sql)) 
{
    echo "Deleted";
		
	$_SESSION = array();
 
	session_destroy();
 
	header("location: frontPage.html");
}
else
{
	echo "Wrong.";
}
?>
