<?php 
include("config.php");
session_start();

$type;
if(isset($_GET["type"])){
	$type = $_GET["type"];
}else{
	$type= $_POST["type"];
	
}
//echo $projectName;
if($type == "1"){
	$projectName = $_POST['name'];
	
$stmt= "DELETE from project WHERE projectName = '$projectName';";
$result= $conn->query($stmt);

if($result){
	echo "Successfully deleted!";
	echo "<script>setTimeout(\"location.href = 'adminProject.php';\",1200);</script>";	
}else{
	echo "There is a problem in deleting!";
	echo "<script>setTimeout(\"location.href = 'adminProject.php';\",1200);</script>";	
	
}
}

if($type == "2"){
	
	$projectName = $_POST['name'];
$sql = $conn->prepare('DELETE FROM content WHERE contentTitle=?');
$sql->bind_param('s',$projectName);
$sql->execute();

if($sql){
	echo "<h1> Successfully deleted! </h1> <br><p> <b>Please wait as we redirect you to edit page..... <b> </p><br>";
	echo "<script>setTimeout(\"location.href = 'adminNews.php';\",1200);</script>";
	
}else{
	error_log("Operation unsuccessful!",0);
	echo "<script>setTimeout(\"location.href = 'adminNews.php';\",1200);</script>";
}
}

if($type == "3"){
$commentTitle = $_GET['comment'];
$stmt= "DELETE from comments WHERE commentText = '$commentTitle';";
$result= $conn->query($stmt);
if($result){
	echo "<script>setTimeout(\"location.href = 'news.php';\",400);</script>";	
}else{
	echo "There is a problem in deleting!";
	echo "<script>setTimeout(\"location.href = 'news.php';\",600);</script>";	
	
}
}

if($type == "4"){
	//echo "masuk";
	$cause =$_POST['reportCause'];
	$commentText = $_POST['comment'];
	$userName;
	
//	echo "<br>".$cause;
//	echo "<br>".$commentText;
	
	//amik commentID sat
	//yang I noticed is that if the comment ada '' or  "", mysql wont take it well. They will say ada syntax error so be careful for the comments
	$sql= "SELECT userName,commentID FROM comments WHERE commentText = '$commentText'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$userName = $row['userName'];
	$commentID = $row['commentID'];
	if($userName){
		echo "Success #1";
	}else{
		echo "Problem #1";
	}
//	echo "<br>".$userName;
	//echo "<br>".$commentID;
	
	//update strike tally
	$sql = "UPDATE user SET strikeTally=strikeTally+1 WHERE userName='$userName'";
	$result=$conn->query($sql);
	if($result){
		echo "<br>Strike updated";
	}else{
		echo "<br>Something wrong in striking comment";	
		echo "<script>setTimeout(\"location.href = 'news.php';\",1000);</script>";	
	}
	
	//get userID
	$sql= "SELECT userID FROM user WHERE userName = '$userName'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$userID = $row['userID'];
	
	//then insert into report table
	$sql = $conn->prepare("INSERT INTO report(reportCause, commentID, userID) VALUES(?,?,?) ");
	$sql->bind_param("sii", $cause, $commentID, $userID);
	if($sql->execute()){
		$_SESSION["type"] = "";
		echo "<h2> Report will be reviewed! Thank you for your cooperation. </h2>";
		echo "<script>setTimeout(\"location.href = 'news.php';\",1000);</script>";	
	
}else{
	echo "There is a problem in reporting!";
	echo "<script>setTimeout(\"location.href = 'news.php';\",600);</script>";	
	
}
}
?>