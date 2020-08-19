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
<p> <center> "Displayed meaning public can see or not. Sorry my vocab is too smol" <br>-Wan- <br></p>
<br>
<a style="float:right; margin-right: 12.5%; margin-bottom: 1%;" class="news" href="updatenews.php"> POST NEWS </a> 
<table class="content" style="width: 80%">
	<tr>
		<th>No. </th>
		<th>Title </th>
		<th>Displayed?  </th>
		<th>  </th>
	</tr>
<?php
$sql = "SELECT * FROM content order by contentID ASC";
$result= $conn->query($sql);
$count = 0;
if ($result->num_rows > 0) {
	
while($row = $result->fetch_assoc()) {
	$count += 1;
?>
	<tr>
		<td > <?php echo $count; ?> </th>
		<td > <?php echo $row["contentTitle"]; ?> </th>
		<td style="text-align:center; width:20%;"> <?php echo $row["showContent"]; ?> </th>
		<td style="text-align:center;"> <a class="button" style="padding: 7px;" href="viewNews.php?title=<?php echo $row['contentTitle'];?>"> Edit </a>&nbsp &nbsp <a class="button" href="deleteNews_prompt.php?name=<?php echo $row['contentTitle'];?>"> Delete </a></td>
	</tr>
	<?php 
	}
}else{
	echo "0 results";
}
$conn->close();
?>
</table>
<br><br>
</center>
</main>
<br><br>
</body>

<footer class="p attribute">Icons made by <a class="p attribute" href="https://www.flaticon.com/authors/bqlqn" title="bqlqn">bqlqn,Freepik</a> from <a class="p attribute" href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a></footer>
<footer style="font-size: 10px"><i>Copyright&copy 2020 Wan Norazlin Binti Abdullah</i></footer>
</html>