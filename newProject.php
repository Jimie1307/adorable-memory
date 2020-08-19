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

<h3 style="font-size: 24px; text-align: center; text-decoration: underline;"> POST NEW PROJECT </h3>

	<form style="margin-left: 4%;" action="post_action.php" method="POST" enctype="multipart/form-data">
	
		<label for="title"> *Title: </label>
			<input style="margin-left: 2%;" type="text" maxlength="150" name="projectName" required ></input><br><br>
		<label for="desc"> *Description: </label><br>
			<textarea style="margin-left: 21%; " maxlength="1000" name="projectDesc" required ></textarea><br><br>
		<label for="website"> Website Link (if needed) : </label>
			<input style="margin-left: 2%;" type="text" maxlength="40" name="projectLink"></input><br><br>
		<label for="image"> Image (If needed): </label>
			<input style="margin-left: 2%;" type="file"  id="imgUpload" name="imgUpload" ></input><br><br>
		<label for="title"> *Show Project: </label>
			<input style="margin-left: 2%;" type="radio" name="show" value="Y">Y<input type="radio" name="show" value="N" checked>N</input><br>
	
	<input class="noclick" name="type" value="1"></input>
	
	<center>
			<input style="margin-right: 2%;" class="button" type="submit" value="Submit">&nbsp <input class="button" type="reset" value="Reset"></input><br>
	</form>
	<br><br>
</center>
</main>
</body>
</html>
<footer class="p attribute">Icons made by <a class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik</a> from <a class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>