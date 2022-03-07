<?php 
    // include our connect script
	include_once 'connect.php'; 
	session_start();
		
	if (isset($_POST['submit']))
	{
		$firstName = $_POST['firstName']; 
		$lastName = $_POST['lastName']; 
		$phone = $_POST['phone'];
		
		$id = "";
		
		$key = 'thebestsecretkey';
		
		//ENCRYPT FUNCTION
		function encrypt($data, $key) {
		$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
		$encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
		return base64_encode($encrypted . '::' . $iv);
		}
		
		$cFname = encrypt($firstName, $key);
		$cLname = encrypt($lastName, $key);
		$cPhone = encrypt($phone, $key);
		
		$sql = "INSERT INTO closecontacts (contactID,firstName,lastName,phone) VALUES ('$id','$cFname','$cLname','$cPhone')";
		if (mysqli_query($conn, $sql)) 
		{
			echo "Close contact added! <br><br>";
		} else 
		{
			echo "Error: " . $sql . ":-" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}
	else
	{
		$msg = 'nes krivo';
	}
?>

<a href="frontPage2.html">Main Menu</a>