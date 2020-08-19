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
<h2> ABOUT ME :) </h2>
<article>
<center><img class="img selfie" src="IMG-5043.jpg" alt="Me" > </center>
<p class="p p2" >INTRODUCTION</p>
<p>Currently in the Software Engineering degree. Aims to help in executing ideas or solutions towards a problem. </p> 
</article>

<article>
<p class="p p2" > NAME </p>
<p > Wan Norazlin Bt Abdullah </p>
</article>

<article>
<p class="p p2"   > ORIGIN </p>
<p  > I'm from Malacca but is currently studying in UMS, Sabah.
<br>Hoping I could study (maybe live?) abroad next to decorate my passport with more stamps~</p>
</article>

<article>
<p class="p p2" >INTERESTS / PREFERENCES</p>
<p> Prefer to keep matters detailed, precise and simple with a clear consensus.
<br>Cute and adorable items are also preferred! Enjoy listening to variety of music but majority in my playlists consist of korean music. Korean culture and language are very interesting to me.<br>
I love animals as well! Who doesn't?.... Wait you dont?! 0_0</br> </p>
</article>
<article>
<p class="p p2" >SKILLS</p>
<p style="font-size: 10px; "> <mark style="color: white; background-color: #CEB951 "> *Hover over the colors! </mark></p>

<p><div class="container"> 
<div class="skills c"> <span class="skills hovertext"> C </span></div>
<div class="skills cpp"> <span class="skills hovertext"> C++ </span></div>
<div class="skills java"> <span class="skills hovertext"> Java </span></div>
<div class="skills html"> <span class="skills hovertext"> HTML </span></div>
<div class="skills php"> <span class="skills hovertext"> PHP </span></div>
<div class="skills javascript"> <span class="skills hovertext"> Javascript </span></div>
</div></p>
</article>

<article>
<p class="p p2" >GOALS</p>
<p> Being able to travel abroad with my parents and own a luxury condominium (including a BodyFriend chair massager) in South Korea one day.
<br>Also being able to create or be involved in a project that makes people happy and contempt. </br></p>
</article>

<br><br>
</section>
</main>
</body>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>
</html>