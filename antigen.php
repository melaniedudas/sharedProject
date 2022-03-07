<?php 
	session_start();
	include_once 'connect.php'; 
    
	if (isset($_POST['submit']))
	{
		$photo = $_FILES["covidtest"]["tmp_name"];
		$img = file_get_contents($photo);
		
		$username = $_SESSION['username'];
		
		$key = 'thebestsecretkey';
		
		//ENCRYPT FUNCTION
		function encrypt($data, $key) 
		{
			$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
			$encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
			return base64_encode($encrypted . '::' . $iv);
		}
		
		$cImg = encrypt($img, $key);
		
		$sql = "UPDATE userInfo SET test = '".$cImg."'  WHERE username = '".$username."'";
		if (mysqli_query($conn, $sql)) 
		{
			echo "Upload successful! You can return to main menu. <br><br>";
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