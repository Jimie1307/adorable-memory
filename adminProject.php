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
<!-- admin  edit, delete or make new posts on projects-->
<a style="float:right; margin-right: 15%; margin-bottom: 2%;" class="news" href="newProject.php" > NEW PROJECT </a> <br><br>
<!-- tunjuk projects yg ada -->
<table style="font-weight: normal; margin-left: 5%; width:80%;">
	<tr> 
		<th> NO.  </th>
		<th> TITLE  </th>
		<th> AVAILABLE?   </th>
		<th>        </th>
	</tr>
	
	<tr>
	<?php 
		$count = 0;
		$sql="SELECT * from project";
		$result=$conn->query($sql);
			if($result-> num_rows > 0){
				while($row=$result->fetch_assoc()){
					++$count;
					
	?>

		<td > <?php echo $count ?>  </th>
		<td > <?php echo $row['projectName']; $name=$row['projectName']; ?>  </th>
		<td style="text-align: center;" > <?php echo $row['showContent'] ?>  </th>
		<td >  <a class="button" href="editProject.php?name=<?php echo $name; ?>" > EDIT </a> &nbsp <a class="button" href="deleteProject_prompt.php?name=<?php echo $name; ?>" > DELETE </a>  </th>
	</tr>

	<?php
				}
			}else{
				echo '</table><p style=" text-align: center;"> No results :( </p>';
				
			}
	?>
</table>
<br><br>

</main>
</body>
</html>
<footer class="p attribute">Icons made by <a class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik</a> from <a class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>