<?php 
    // include our connect script 
	session_start();
	
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
	{
		header("location: Welcome.php");
		exit;
	}
	
	require_once "connect.php";
	
	$username = $_POST['username'];  
    $pass = $_POST['pswd'];
	
	$sql = "SELECT * FROM userInfo WHERE username = '$username'";
    $result = mysqli_query($conn,$sql);
	
	if(mysqli_num_rows($result) > 0)  
	{  
		while($row = mysqli_fetch_array($result))  
        {  
			$userID = $row["userID"];
			if(password_verify($pass, $row["password"]))  
            {
				session_start();
				$_SESSION["loggedin"] = true;
				$_SESSION['username'] = $username;
				header("location: frontPage2.html");
            }  
            else
			{  
				echo "Wrong User Details";
            }  
        }  
    }
	else
	{
		echo "Wrong username Details";
	}
?>


