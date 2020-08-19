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
<body>
<br>
<main>
<br>

<article>
<h3 style="font-size: 18px; "> CHANGE YOUR PASSWORD </h3>
<form action="changePwd_action.php" method="POST" >
<label for="curPass"> Current Password: </label>&nbsp 
<input name="currPwd" type="password" placeholder="********" required></input><br>
<label> New Password: </label>&nbsp <input type= "password" name="newPwd" placeholder="********" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{0,12}" title= "Must contain at least: one number, one uppercase, one lowercase. Not more than 12 characters!" required>
<br><br>
	<input style=" border-radius: 0; text-align: center; width: 12%; padding: 8px;" type="submit" class="normalButton" value="Change"> &nbsp <input style="  border-radius: 0; text-align: center; width: 12%; padding: 8px;" type="reset" class="normalButton" value="Reset"> </input>
</form>

</article> 
</center>
</main>
</body>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>
</html>



