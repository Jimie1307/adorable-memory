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
<div class="poster">
<h2> <center> This page is only for admins </h2>
</div>
<br>
<h3 style="margin-left: 4%; text-decoration: overline underline;"> REPORTED COMMENTS:</h3>

	
	<table for="report" style="margin-bottom: 4%; margin-left: 4%; width: 70%;">
		<tr>
			<th class="title" style="width: 4%;">  </th>
			<th class="title" style="width: 4%;"> ID </th>
			<th class="title"> REPORTS </th>
			<th class="title" style="width: 8%;"> USER ID </th>
		</tr>
		
	<?php 
	$commentID = "";
	//amik info from report
	$sql = "SELECT * from report order by commentID ASC";
			$result = $conn->query($sql);
			if($result-> num_rows >0){
				while($row = $result->fetch_assoc()){
				?> 
			<form action="deleteUser.php" method="POST" enctype="multipart/form-data">
			<tr>
			<td class="content"> <input type="checkbox" name="checklist[]" value="<?php echo $row['commentID']; ?>"></input></td>
			<td class="content"> <?php echo $row['commentID']?></td>
			<td class="content"> <?php echo $row['reportCause']?></td>
			<td class="content"><?php echo $row['userID'];?></td>
					<?php
				}
			  
			
		}else{
		echo "<p> No reports submitted for now </p>";
}?>
	</tr>
	</table>
	<input style="margin-left: 1%;  width: 2%;" class="noclick" type="text" name="type" value="1"></input>
		<input class="button" style="padding: 10px; cursor: pointer;" type="submit" value="Delete"> &nbsp <input style="padding: 10px; cursor: pointer;" class="button" type="reset" value="Reset"></input>
		</form>
		
	<br><br>
	<table style="width: 70%; margin-left: 4%;">
		<tr>
			<th class="title"> ID</th>
			<th class="title"> COMMENT </th>
		
		</tr>
		
		<tr>
	<?php 
			$sql = "SELECT commentID,commentText from comments order by commentID";
			$result = $conn->query($sql);
			if($result->num_rows >0){
				while($row = $result->fetch_assoc()){
			?>
			<td class="content"><?php echo $row['commentID'];?></td>
			<td class="content"><?php echo $row['commentText'];?></td>
			</tr>
			<?php
				}
			}
			?>	
		
	</table>
	
	<h3 style="margin-left: 4%; text-decoration: overline underline;"> USERS WITH STRIKES </h3>
	<table style="width: 70%; margin-left: 4%;">
		<tr>
			<th class="title" style="width: 4%;"> </th>
			<th class="title" style="width: 8%;"> USER ID</th>
			<th class="title" style="width: 10%;"> ACCUMULATED STRIKES </th>
		</tr>
		
		<tr>
		<?php 
			$sql = "SELECT userID,strikeTally from user WHERE strikeTally > 0 order by strikeTally DESC";
			$result = $conn->query($sql);
			if($result->num_rows >0){
				while($row = $result->fetch_assoc()){
			?>
		<form action="deleteUser.php" method="POST" enctype="multipart/form-data">
			<td class="content"> <input type="checkbox" name="checklist[]" value="<?php echo $row['userID']; ?>"></input></td>
			<td class="content"><?php echo $row['userID'];?></td>
			<td class="content"><?php echo $row['strikeTally'];?></td>
			</tr>
			<?php
				}
			}
			?>	
		</table>
		<br><br>
		<input class="button" style="margin-left: 5%; padding: 10px; cursor: pointer;" type="submit" value="Remove User"> &nbsp <input style="padding: 10px; cursor: pointer;" class="button" type="reset" value="Reset"></input>
		</form>
		
<br><br>
</main>
</body>
<footer class="p attribute">Icons made by <a class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik</a> from <a class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>
</html>