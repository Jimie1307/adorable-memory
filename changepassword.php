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
		<a class="a" href="adminProfile.php"> PROFILE </a> 
		<a class="a" href="logout.php"> LOGOUT </a><br>
</nav></center>
<div class="w3-container">
<body>
<main>
<br>

<form action="changePwd_action.php" method="POST" style="margin-left: 20%;">
<h3 style="margin-left: 28%; text-decoration: underline;"> CHANGE PASSWORD </h3>
<label for="curPass"> Current Password: </label>&nbsp 
<input name="currPwd" type="password" placeholder="********" required></input><br><br>
<label> New Password: </label>&nbsp <input type= "password" name="newPwd" placeholder="********" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{0,12}" title= "Must contain at least: one number, one uppercase, one lowercase. Not more than 12 characters!" required>
<br><br>
<input style="margin-left: 30%;" class="a button" type="submit" value="Submit"> &nbsp <a class="button" href="AdminProfile.php"> Cancel </a>
</form>
<br><br>
</main>
</body>

<footer class="p attribute">Icons made by <a class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik</a> from <a class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>
</html>