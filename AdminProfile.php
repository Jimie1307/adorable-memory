<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html>
<title> HOME </title>
<meta charset="UTF-8"
name="viewport" content="width=device-width, initial-scale=1.0">
<head>
<link rel="stylesheet" href="AdminStyle.css?v=<?php echo time(); ?>">
<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
</head>

<h1 class="h1 hi" ><center> HELLO, <?php echo $_SESSION["userName"]; ?> <img src="Avatars Set Flat Style-38.png" ></center></h1></div>
<br></br>

<nav>
<center>
		<a class="a" href="adminHome.php"> HOME </a> 
		<a class="a" href="adminNews.php"> NEWS </a>
		<a class="a" href="adminProject.php"> PROJECT </a> 
		<a class="a" href="adminProfile.php"> PROFILE </a> 
		<a class="a" href="logout.php"> LOGOUT </a><br>
</center>
</nav>
<div class="w3-container">
<body>
<main>
<br>
<?php 
$sql = "SELECT * from user where userName='".$_SESSION["userName"]."';";
$result = $conn->query($sql);
if($result->num_rows == 1){
	while($row= $result->fetch_assoc()){
?>
<center><br>
<table style="width: 80%;">
<tr>
	<th> Name </th>
	<th> <?php echo $row['userName'];?> </th>
</tr>
<tr>
	<th> Email </th>
	<th > <?php echo $row['userEmail'];?> </th>
</tr>
<tr>
	<th> Password </th>
	<th> <a class="button" href="changepassword.php">Change Password</a> </th>
</tr>

<?php 
	}
}
?>
</table><br>
<a class="button" href="editDetails.php">Edit Details</a> &nbsp <a class="button" href="register_Admin.html"> Add an Admin</a>
<br><br>
</main>
</body>

<footer class="p attribute">Icons made by <a class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik</a> from <a class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>
</html>