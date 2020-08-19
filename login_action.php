<?php
session_start();
include("config.php");//OOP
?>
<html>
<body>
<?php
//login values from login form
$username = $_POST['userEmail'];
$password = $_POST['userPwd'];

$bool= validatePassword($password, $username, $conn);
if($bool == 1){
$sql = "SELECT userID,userType, userName from user WHERE userEmail='$username'";
$login_data = $conn->query($sql);
if ($login_data->num_rows == 1) {
$row = $login_data->fetch_assoc();
$_SESSION["UID"] = $row["userID"];//set session userID
$_SESSION["userType"] = $row["userType"];
$_SESSION["userName"] = $row["userName"];
//echo $_SESSION["UID"];
//echo $_SESSION["userName"];
if($row["userType"] == 2){
	echo "<script>setTimeout(\"location.href = 'adminHome.php';\",1000);</script>";
		}else{
	echo "<script>setTimeout(\"location.href = 'index.php';\",1000);</script>";	
		}
}
 else {
echo "Login error, username or password is incorrect.";
echo "<script>setTimeout(\"location.href = 'loginUser.php';\",1000);</script>";
	}
}
function validatePassword($password,$username,$conn){
	 $sql = "SELECT pwdEncrypt FROM user WHERE userEmail='$username'";
	//echo $userName;
	//echo "<br>".$password;
	$login_data = $conn->query($sql);
if ($login_data->num_rows > 0) {
	$row = $login_data->fetch_assoc();
	if (password_verify($password,$row['pwdEncrypt'])){
		return 1;
	}else{
		echo "<h2> Password does not match </h2> <br>";
		echo "<script>setTimeout(\"location.href = 'loginUser.php';\",1200);</script>";
		//echo $row['userPwd'];
		//echo $row['pwdEncrypt'];
	}
 }else{
	echo "<br> Cannot find row.";	
}
 }
 
$conn->close();

?>