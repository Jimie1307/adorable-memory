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
<div class="notice">
<p class="p note"> TAKE NOTE! </p>
	<p class="p notice2" > 1. Title should not exceed 50 characters<br>
	2. Appropriate images only (aesthetic ones are favoured)<br>
	3. Text should not exceed 2000 characters
	</p>
</div>
<br>
<form action="upload_action.php" method="POST" enctype="multipart/form-data">
	<input class="unclickable" style="opacity: 0;" type="text" name="type" value="1" ></input>
	<label for="title" style="margin-left: 14%;"> Title: </label>
	<input  class="title" type="text" name="title" ></input><br><br>
	<label for="img">Image (if needed):</label>
	<input  type="file" name="imgUpload" ></input><br><br>
	<label> Show content : </label><input type="radio" name="showContent" value="Y" checked>Yes</input>&nbsp <input type="radio" name="showContent" value="N">No</input>
	<br><br>
	<label for="text">Description: </label><br><br>
	<textarea  class="desc" type="textarea" name="desc" ></textarea><br><br>
	<center>
	<input class="button" type="submit" value="Submit" > &nbsp <input class="button" type="reset" value="Reset" ></input> <br>
	<br>
</form>
</main>
</body>

<footer class="p attribute">Icons made by <a class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik</a> from <a class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>
</html>