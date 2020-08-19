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
</center>
</nav>
<div class="w3-container">
<body>
<main>

<?php 
$contentTitle = $_GET['title'];

$sql = "SELECT * from content WHERE contentTitle= '$contentTitle';";
$result=$conn->query($sql);
if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$showContent = $row['showContent'];
			$opp;
		 ?>
		<form action="upload_action.php" method="POST" enctype="multipart/form-data">
	<input class="unclickable" style="opacity: 0;"  type="text" name="type" value="2" ></input><br>
	<label for="contentID"> Content ID: <input class="unclickable" type="text" name="contentID" value=<?php echo $row['contentID'] ?> ></input> </label>
		<br>
		
	<label for="title">Title:</label>
	<input  type="type" name="title" value= "<?php echo $row['contentTitle'];?>"></input><br>
	<label> Current image used: </label>
		<br>
		
	<img style="margin-left: 40%; width: 12%; height: 12%;" src="<?php echo $row['contentImg'];?>"></img>
		<br>
		
	<label for="img">Update image (if needed):</label>
	<input  type="file" name="imgUpload" ></input>
		<br>
		<?php 
		if($showContent == "Y"){
			$opp = "N";
		}else{
		 $opp = "Y"; } ?>
	<label> Show content : </label><input type="radio" name="showContent" value="<?php echo $showContent; ?>" checked> <?php echo $showContent; ?></input>
	
		</input>&nbsp <input type="radio" name="showContent" value="<?php echo $opp; ?>"><?php echo $opp; ?></input>
		<br>
		
	<label for="text">Description: </label><br>
	<textarea  class="desc" type="textarea" name="desc" ><?php echo $row['contentText'];?></textarea>
		<br><br>
		
	<center>
	<input class="button" type="submit" value="Submit" >&nbsp <input  class="button" type="reset" value="Reset" ></input> <br>
	<br>
</form>

<?php
		}
}else{
	
	echo "There is error in showing content. Try again later";
}
?>
<br><br>
</center>
</main>
<br><br>
</body>

<footer class="p attribute">Icons made by <a class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik</a> from <a class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>
</html>