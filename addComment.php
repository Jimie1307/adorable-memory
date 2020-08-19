<?php 

include("config.php");
session_start();


	if(!isset($_SESSION["userName"])){
			echo '<script> alert("Please login.") </script>';
			echo "<script>setTimeout(\"location.href = 'loginUser.php';\",1000);</script>";
		}else{
			$comment = $_POST['comment'];
			$sql=$conn->prepare("INSERT INTO comments (commentText, userName) VALUES(?,?);");
			$sql->bind_param("ss", $comment, $_SESSION["userName"]);
			$sql->execute();
			
			if(!$sql){
				echo '<script> alert("Comment not posted. There was an error.") </script>';
				echo "<script>setTimeout(\"location.href = 'news.php';\",1000);</script>";
			}else{
				echo "<script>setTimeout(\"location.href = 'news.php';\",1000);</script>";
			}
		}
	
		
?>