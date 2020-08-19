<?php
session_start();
include("config.php");

$newName = $_POST['newName'];
$newEmail = $_POST['newEmail'];
$userName = $_SESSION["userName"];
$currPwd = $_POST['userPwd'];
$ending= '.com';

//check if email tu ada .com tak
//kalau x de, tmbhkn la
if(strpos($newEmail, $ending) == false){
	$newEmail = $_POST['newEmail'].$ending;
	//echo $newEmail;
}
//check password betul x
$sql= "SELECT pwdEncrypt from user WHERE userName='".$_SESSION["userName"]."';";
$result=$conn->query($sql);
$row= $result->fetch_assoc();

if(password_verify($currPwd,$row['pwdEncrypt'])){
	$sql = $conn->prepare("UPDATE user SET userName = ?, userEmail = ? WHERE userName='$userName';");
$sql->bind_param("ss", $newName, $newEmail);
$sql->execute();

	if($sql){
		echo "<br> Your details are successfully updated!<br>Please login back...";
		echo "<script>setTimeout(\"location.href = 'logout.php';\",1000);</script>";
	}else{
		echo "<br> There was a problem in updating details! Try again later";
		echo "<script>setTimeout(\"location.href = 'AdminProfile.php';\",1000);</script>";
	}
	
}
	


?>