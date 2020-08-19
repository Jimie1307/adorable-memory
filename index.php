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
<link rel="stylesheet" href="AlynnStyle.css?v=<?php echo time(); ?>">
<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">

</head>
<br>
<div class="typewriter">
<h1>ALYNN'S PORTFOLIO</h1></div>
<br></br>
<center>
<!--target=_blank tu buat that dia bukak at new tab-->
<nav >
		<a class="a a1" href="index.php">HOME</a> 
        <a class="a a1" href="moreMePage.php" >ABOUT ME</a> 
        <a class="a a1" href="projects.php" >PROJECTS</a> 
		<a class="a a1" href="news.php" >NEWS</a>
        <a class="a a1" href="contacts.php" >CONTACT</a>
		<div class= "userBar">
		<!-- if userType empty then tunjuk login, if 1 then logout-->
<?php if(isset($_SESSION["userType"])){
		echo '<button class="dropbtn"> '.strtoupper($_SESSION["userName"]).'</button> 
		<div class="userBar-content">
			<a href="userProfile.php"> Profile </a>
			<a href="logout.php"> Logout </a>
		</div>';
		}else{
			echo '<a class="a a1" href="loginUser.php" >LOGIN</a>';
		}?>
</div>
</nav>
</center>
<body>
<br>
<main>

<br>
<center>
<article> 
<?php if(isset($_SESSION["userType"])){
	echo "<h2> HELLO,".$_SESSION["userName"]."!</h2>";
}else{
	echo "<h2> HELLO!</h2>";
}
?>
<p > Welcome to my cute and simple website! It may seem quite empty now since my experience in this field is still very small and am still a student. 
<br> I have so much more to learn and I believe I will keep learning until time comes to an end. <br> Will do keep updating this website in the near future! </article>

</p>
</article>
</center>
</section>
</main>
</body>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>
</html>