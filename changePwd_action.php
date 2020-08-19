<?php
session_start();
include("config.php");

$currPwd = $_POST['currPwd'];
$newPwd = $_POST['newPwd'];
$userName= $_SESSION["userName"];
//check currPwd tu betul x
$sql= "SELECT pwdEncrypt from user WHERE userName='".$_SESSION["userName"]."';";
$result=$conn->query($sql);
$row= $result->fetch_assoc();

if(password_verify($currPwd,$row['pwdEncrypt'])){
	echo "Match<br>";
	echo $userName;

	$pwdHash = trim(password_hash($newPwd, PASSWORD_DEFAULT)); 
	$updatePwd= $conn->prepare("UPDATE user SET userPwd= ?, pwdEncrypt=? WHERE userName= '$userName' ;");
	$updatePwd->bind_param("ss", $newPwd, $pwdHash);
	$updatePwd->execute();
		if($updatePwd){
			echo "<br><h2> Successfully changed password!<br> Please login back!...<h2>";
			echo "<script>setTimeout(\"location.href = 'logout.php';\",1000);</script>";
			
		}else{
			echo "<br><h2> There was a problem in changing password. Please login back and try again later.<h2><br>";
			echo "<script>setTimeout(\"location.href = 'logout.php';\",1000);</script>";
		}
}else{
	echo "Password does not match";
	
}

?>