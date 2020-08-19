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
<body>
<br></br>
<center>
<nav >
		<a class="a a1" href="index.php">HOME</a> 
        <a class="a a1" href="moreMePage.php" >ABOUT ME</a> 
        <a class="a a1" href="projects.php" >PROJECTS</a> 
		<a class="a a1" href="news.php" >NEWS</a>
        <a class="a a1" href="contacts.php" >CONTACT</a>
		<div class= "userBar">
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

<article class="projectPost">
<?php

	$stmt=" SELECT * from project WHERE showContent= 'Y' ORDER BY projectID ASC ";
	$result=$conn->query($stmt);
		if($result-> num_rows > 0){
			while($row=$result->fetch_assoc()){
?>
	<h3 class="projName"> <?php echo $row['projectName'];?> </h3>
	<?php if(!empty($row['dateUpdated'])){ 
		echo '<p class="last">Last updated:'.$row['dateUpdated'].'</p><br> ' ;}
	else{
		echo '<p class="last"> Last updated: '.$row['dateCreated'].'</p><br> ';
	}?>

	<?php if(!empty($row['projectImg'] && ( strpos($row['projectImg'], ".png")||strpos($row['projectImg'], ".jpg")||strpos($row['projectImg'], ".gif") ))){ 
		echo '<img class="project" src="'.$row['projectImg'].'"></img><br>';}
	else {
		if(!empty($row['projectImg'])){
		echo '<a style=" margin-left: 40%;" class="projectFile" href="'.$row['projectImg'].'"> Project file. </a>';}
	}?>
	<?php if(!empty($row['projectLink'])){ 
		echo '<a style="margin-left: 40%;" class="projectFile" href="'.$row['projectLink'].'">Click here to see project</a><br>';}
	else{
		echo "";
	}?>
	<p class="projDesc" >  <?php echo $row['projectDesc'];?> </p><br>
<?php 
			}
		}else{
			echo '';
		}
		
		?>
 </article>
</section>
</main>
</body>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>
</html>