<link rel="stylesheet" href="task1.css" type="text/css" />
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.html");
    exit;
}

require('connect.php');

$user = $_SESSION['username'];
$sql = "SELECT * from userInfo where username = '$user'";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result))
{
	$firstName = $row['firstName'];
	$lastName = $row['lastName'];
	$address = $row['address'];
	$birthday = $row['dob'];
	$phone = $row['phone'];
	$test = $row['test'];
}

$key = 'thebestsecretkey';

//DECRYPT FUNCTION
function decrypt($data, $key) {
list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
}

$dFname = decrypt($firstName, $key);
$dLname = decrypt($lastName, $key);
$dAddress = decrypt($address, $key);
$dBirth = decrypt($birthday, $key);
$dPhone = decrypt($phone, $key);
$dtest = decrypt($test, $key);
		

echo "<p><b>Information on record: </b><br><br><br></p>";
echo "First Name:.....................", $dFname, "<br><br>";
echo "Last Name:......................", $dLname, "<br><br>";
echo "Address:..........................",$dAddress, "<br><br>";
echo "Birthday:.........................",$dBirth, "<br><br>";
echo "Phone:..............................",$dPhone, "<br><br>";


echo '<img src=".$test." >', "<br><br>";
?>

<html>
<head>
<link rel="stylesheet" href="task1.css" type="text/css" />
</head>
<body>
<a href="frontPage2.html">Main menu</a><br>
<a href="logout.php">Sign out</a>
</html>