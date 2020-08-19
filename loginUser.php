<!DOCTYPE html>
<meta charset='UTP-8'>
<html>
<title> LOGIN </title>
 <head>
 <link rel="stylesheet" href="AlynnStyle.css">
<link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
 </head>
<center>
<br>
<h1 style="padding: 20px;" >LOGIN PAGE</h1>
 <body>
 <main class="login">

<img class="img icon" src="user.png" alt="A cool icon" >
&nbsp
<img class = "img icon" src="Avatars Set Flat Style-38.png" alt="A cool icon" >
<br>
<p style="width: 100%; margin-left: 2%; margin-right: 3%; text-align: center;"> "You will be one of us."<br>"Login/Register to find out which group are you!" </p>
<form action="login_action.php" method="POST">
	<label for="email"> Email:</label><br>
	  <input type= "email" name="userEmail" placeholder="Enter your email" required>
	  <br>
	  <label for="email"> Password:</label><br>
	  <input type= "password" name="userPwd" placeholder="Enter your password" required>
	  <br> <br>
	  <input class="normalButton" style="border-radius: 0; border: 2px solid rosybrown; "  type= "submit" value="Submit">&nbsp
	  <input class="normalButton" style="border-radius: 0; border: 2px solid rosybrown; "  type= "reset" value="Reset" >
	</form>
	<br>
	<a style=" text-decoration: underline; color: navy;" href="Register.html"> Don't have an account? </a><br>
	<a style=" text-decoration: underline; color: maroon;" href="index.php"> Scared? Wanna go back home? </a>
</main>
<div class="randomFacts">
<p style=" margin-left: 30%; text-align: center;" > INTERESTING FACT! </p>
<!-- nanti buat this part ada bling bling to highlight-->
<p style="padding-bottom: 8px; width: 80%; margin-left: 10%; text-align: left;"> 1) This is not a cult <br> 2)These icons are designed by Speckyboy! You can get it and the collection at <a style="text-decoration: underline; color: rosybrown;" href="https://speckyboy.com/free-cute-user-avatar-icon-set/" >here</a> </p>

	</center>
 </body>
</html>