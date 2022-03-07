<?php 
    // include our connect script 
	include_once 'connect.php'; 
    
	if (isset($_POST['submit']))
	{
		$username = $_POST['username']; 
		$password = $_POST['pswd']; 
		$firstName = $_POST['firstName']; 
		$lastName = $_POST['lastName']; 
		$address = $_POST['address'];
		$birthday = $_POST['birthday']; 
		$phone = $_POST['phone']; 
		$photo = $_FILES["covidtest"]["tmp_name"];
		$img = file_get_contents($photo);
		
		$id = "";
		
		$hash_pass = password_hash($password, PASSWORD_DEFAULT);
		
		$key = 'thebestsecretkey';
		
		//ENCRYPT FUNCTION
		function encrypt($data, $key) {
		$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
		$encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
		return base64_encode($encrypted . '::' . $iv);
		}
		
		$cFname = encrypt($firstName, $key);
		$cLname = encrypt($lastName, $key);
		$cAddress = encrypt($address, $key);
		$cBirth = encrypt($birthday, $key);
		$cPhone = encrypt($phone, $key);
		$cImg = encrypt($img, $key);
		
		$sql = "INSERT INTO userInfo (userID,username,password,firstName,lastName,address,dob,phone,test) VALUES ('$id','$username','$hash_pass', '$cFname','$cLname','$cAddress','$cBirth','$cPhone','$cImg')";
		if (mysqli_query($conn, $sql)) 
		{
			echo "Registration successful! <br> To see your details or upload a new antigen photo please Login <br><br>";
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

<a href="login.html">Log in</a>