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
<?php 

$projectTitle = $_GET['name'];
$sql="SELECT * from project WHERE projectName='$projectTitle'";
$result=$conn->query($sql);
 if($result-> num_rows > 0){
	 while($row=$result->fetch_assoc()){
		 
		 ?>
<h3 style="font-size: 24px; text-align: center; text-decoration: underline;"> EDIT PROJECT </h3>

	<form style="margin-left: 4%;" action="post_action.php" method="POST" enctype="multipart/form-data">
	 
		<label for="ID"> PROJECT NUMBER: </label>
			<input style="margin-left: 2%; opacity: 0.5; width: 2%;" type="text" class="noclick" name="projectID"  value="<?php echo $row['projectID'];?>"></input><br><br>
		<label for="title"> *Title: </label>
			<input style="margin-left: 2%;" type="text" maxlength="150" name="projectName" value="<?php echo $row['projectName'];?>" required ></input><br><br>
		<label for="desc"> *Description: </label><br>
			<textarea class="desc" style="margin-left: 21%; " maxlength="1000" name="projectDesc" required ><?php echo $row['projectDesc'];?></textarea><br><br>
		<label for="website"> Website Link: </label>
			<input style="margin-left: 2%;" type="text" maxlength="40" name="projectLink" value="<?php echo $row['projectLink'];?>" ></input><br><br>
		<label for="image"> Image (Currently used): </label><img class="project" src="<?php echo $row['projectImg'];?>"></img><br><br>
		<label for="image"> Image (If needed): </label>
			<input style="margin-left: 2%;" type="file"  id="imgUpload" name="imgUpload" ></input><br><br>
		<label for="title"> *Show Project: </label>
		<?php if($row['showContent']==="Y"){
			echo '<input style="margin-left: 2%;" type="radio" name="show" value="Y" checked>Y<input type="radio" name="show" value="N" >N</input><br>';
		}else{
			echo '<input style="margin-left: 2%;" type="radio" name="show" value="Y">Y<input type="radio" name="show" value="N" checked>N</input><br>';
		}
		?>
	
	<input class="noclick" name="type" value="2"></input>
	
	<center>
			<input style="margin-right: 2%;" class="button" type="submit" value="Submit">&nbsp <input class="button" type="reset" value="Reset"></input><br>
	</form>
	<?php
	 }
 }
 
	$conn->close();
	?>
	<br><br>
</center>
</main>
</body>
</html>
<footer class="p attribute">Icons made by <a class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik</a> from <a class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>