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
<br>
<?php 
$sql="SELECT userName,userEmail from user WHERE userName='".$_SESSION["userName"]."';";
$result=$conn->query($sql);
if($result-> num_rows > 0){
	while($row= $result->fetch_assoc()){
?>

<div style="margin-left: 30%; margin-right: 30%;" class="notice">
<p class="p note">  </p>
	<p style="text-align: center;" class="p notice2" > Simply change details if needed. Do not submit it with any fields empty!
	</p>
</div>
<br><br>
<form action="editProfile_action.php" method="POST" style="margin-left: 20%;">
	<label for="name"> Username: </label>
	<input type="text" name="newName" value="<?php echo $row['userName']; ?>" required ><br><br>
	<label for="name"> Email: </label>
	<input type="email" name="newEmail" value="<?php echo $row['userEmail']; ?>" required><br><Br>
	<label> Your Password: </label><input type="password" name="userPwd" required></input><br><br>

	<input class="noclick" type="text" name="type" value="2"></input><br>
	<input class="button" style="margin-left: 30%;" type="submit" value="Submit"> &nbsp <input  class="button" type="reset" value="Reset"></input>
	
</form>
<?php
	}
}
?>
<br><br>
</main>
</body>

<footer class="p attribute">Icons made by <a class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik</a> from <a class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>
</html>