<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['username']) &&
isset($_POST['password']) &&
isset($_POST['full_name']) &&
isset($_POST['email']) &&
isset($_POST['phone']) &&
isset($_POST['address']) &&
isset($_POST['REpassword'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$password = validate($_POST['password']);
	$re_passsword = validate($_POST['REpassword']);
	$full_name = validate($_POST['full_name']);
	$email = validate($_POST['email']);
	$phone = validate($_POST['phone']);
	$address = validate($_POST['address']);

	$user_data = 'username='. $username;


	if (empty($username)) {
		header("Location: RegisterPage.php?error=Username is required& $user_data");
	    exit();
	}
	else if(empty($full_name)){
        header("Location: RegisterPage.php?error=Fullname is required& $user_data");
	    exit();
	}
	else if(empty($email)){
        header("Location: RegisterPage.php?error=Email is required& $user_data");
	    exit();
	}
	else if(empty($phone)){
        header("Location: RegisterPage.php?error=Phone is required& $user_data");
	    exit();
	}
	else if(empty($address)){
        header("Location: RegisterPage.php?error=Address is required& $user_data");
	    exit();
	}
	else if(empty($password)){
        header("Location: RegisterPage.php?error=Password is required& $user_data");
	    exit();
	}
	else if(empty($re_passsword)){
        header("Location: RegisterPage.php?error=Re Password is required& $user_data");
	    exit();
	}

	else if($password !== $re_passsword){
        header("Location: RegisterPage.php?error=The confirmation password does not match& $user_data");
	    exit();
	}

	else{
		
		// hashing the password
        $password = md5($password);

	    $sql = "SELECT * FROM users WHERE username='$username' ";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: RegisterPage.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(username, password, full_name, email, phone, address) VALUES ('$username', '$password', '$full_name', '$email', '$phone', '$address')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: RegisterPage.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: RegisterPage.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: RegisterPage.php");
	exit();
}