<?php
include("config.php"); 

$userEmail = $_POST['userEmail'];
$userName = $_POST['userName'];
$userPwd = $_POST['userPwd'];
$userType = $_POST['userType'];
$sql = "SELECT * FROM user WHERE userEmail='$userEmail' AND userPwd='$userPwd' LIMIT 1";

$userExist = $conn->query($sql);
if($userExist->num_rows == 1){
	echo "<p><b>Error: </b> User Exist, cannot register </p>";
}else 
{// User does not exist, insert new user record
$pwdHash = trim(password_hash($userPwd, PASSWORD_DEFAULT)); 
$sql = $conn->prepare("INSERT INTO user (userName, userEmail, userPwd, userType, pwdEncrypt) VALUES (?,?,?,?,?);");
	$sql->bind_param("sssis",$userName, $userEmail, $userPwd, $userType, $pwdHash);
	$sql->execute();
	if($sql){
		echo "<h1>New User record created successfully</h1><br>";
			echo "<h3>Thank you for registering, $userName ! <br> Taking you to the homepage....</h3>";
			if($userType==="1"){
			echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
			}
			else{
				echo "<script>setTimeout(\"location.href = 'adminHome.php';\",1500);</script>";
			}
	}else{
		echo "</br> Error: " .$sql. "</br>" . mysqli_error($conn);
	}
}

$conn->close();

?>

