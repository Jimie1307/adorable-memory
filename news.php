<?php
session_start();
include("config.php");
error_reporting(E_ERROR | E_WARNING | E_PARSE);
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

<!-- if showContent tu Y then it will appear, if not then tak appear-->
<?php 
	$sql= "SELECT * from content WHERE showContent='Y' ORDER BY contentID ASC";
	$result= $conn->query($sql);
	if($result->num_rows >0){
		while($row=$result->fetch_assoc()){
?>
		<article>
		<p class="date" > <?php echo $row['contentDate']?></p>
		<p class="title"> <?php echo $row['contentTitle']?></p>
		<img class="newsImg" src="<?php echo $row['contentImg']?>"></img>
		<p class="newsText"> <?php echo $row['contentText']?></p>
		</article>
		
		<?php 
		}
	}
?>
<br><br>
<section class="commentSec">
<h3 style=" font-size: 20px; margin-left: 2%; margin-bottom: -5px; text-decoration: overline underline;"> Comment Section </h3>

<br><br> 

	<form action="addComment.php" method="POST">
		<input class="comment" type="text" id="comment" name="comment" placeholder=" Post a comment here!"></input>
		<input type="submit" style="border-radius: 3px; padding: 7px; border: 1px solid lightgray;" class="a1" value="Comment"></input>
	</div>
	</form><br><br>
		<div class="comments"> 
		<?php
		echo postComment($conn) ;
		
			function postComment($conn){
		$sql="SELECT * from comments ";
		$result=$conn->query($sql);
		if($result-> num_rows > 0){
			while($row=$result->fetch_assoc()){
				/// tunjuk bila dia comment sebab nk tunjuk tempoh sejak dia comment (tgk dh berapa minit ke saat ke hours ke), x jadi2 T^T 
			
				echo '<div class="userComment">
				<p class="userName">'.$row['userName'].'&nbsp <a class="lastPosted">'.$row['datePosted'].'</a></p><br>
				<p style="width:80%;  display: inline-block; margin-top: -2%;">'.$row['commentText']; 
				
				if($row['userName'] === $_SESSION["userName"]){
				
				$sentence = "'Delete comment for real?'";
				echo '<a onclick="return confirm('.$sentence.')" href="deletepost_action.php?comment='.urlencode($row['commentText']).'&type=3" style=" text-decoration: underline; font-size: 11px; float: right; margin-right: -20%;"> Delete </a></p>
			
				</div><br>';}else{
					
				
				echo '<a href="reportComment.php?comment='.urlencode($row['commentText']).'" style=" text-decoration: underline; font-size: 11px; float: right; margin-right: -20%;"> Report </a></p></div><br>';
				}
				
			}
		}else{
				echo '<p> There are no comments yet </p><br> ';
			}
	}
	
	$conn->close();
		
?>
	</div><br>
</section>
<br><br>
</main>
</body>
<html>