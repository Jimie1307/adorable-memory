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
<main style="padding: 6px;">
<br>
<article style="padding: 4%;" >
<center>
<div class= "intro">
	<img class="prof" src="user.png"></img><br>
	<label for="image"><b>Extraordinary User</b></label></div>

	<?php 
		$sql = "SELECT * from user WHERE userID='".$_SESSION["UID"]."'";
		$result=$conn->query($sql);
		if($result-> num_rows>0){
			if($row=$result->fetch_assoc()){
		
	?>
	<div class="userdetails">
			<p style=" margin-bottom: 6%; padding: 15px; font-size: 22px; background-color: rosybrown; color: whitesmoke;" class="userP"> <b> <?php echo strtoupper($row['userName']); ?> </b> <br>
			<p class="userP"> <?php echo $row['userEmail']; ?> <br><br>
			<p class="userP"> ************ </p>

		</div>
		
		<?php
			}
		}
?>
<br>
	<a class="normalButton" style=" margin-left: -7.5%;" href="changeUserDetails.php"> CHANGE DETAILS </a> &nbsp <a class="normalButton"  href="changeUserPassword.php"> CHANGE PASSWORD </a>
	&nbsp <a onclick="return confirm('Are you sure you want to delete your account?')" class="normalButton"  href="deleteUser.php"> DELETE ACCOUNT </a>
</article> 
</center>
</main>
</body>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>
<div style="font-size: 10px;"><i>Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></i></div>
</html>