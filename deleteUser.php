<?php
session_start();
include("config.php");

if(isset($_POST['type'])){
	
	if(isset($_POST['checklist'])){
			//echo "masuk";
			foreach($_POST['checklist'] as $check){
				//echo $check;
				$ID = (int)$check;
				//echo $ID;
				$sql = "DELETE from comments WHERE commentID = '$ID' ";
				$result = $conn->query($sql);
				
				if($result){
					echo "<h3> Comment deleted successfully </h3>";
					echo "<script>setTimeout(\"location.href = 'adminHome.php';\",900);</script>";	
				}else{
					echo "<h3> Comment is not deleted. Try again later </h3>";
					echo "<script>setTimeout(\"location.href = 'adminHome.php';\",900);</script>";	
				}
			}
		}
	
}

else if(isset($_POST['checklist'])){
			//echo "masuk";
			foreach($_POST['checklist'] as $check){
				//echo $check;
				$ID = (int)$check;
				//echo $ID;
				$sql = "DELETE from user WHERE userID = '$ID' ";
				$result = $conn->query($sql);
				if($result){
					echo "<h3> User deleted successfully </h3>";
					echo "<script>setTimeout(\"location.href = 'adminHome.php';\",900);</script>";	
				}else{
					echo "<h3> User is not deleted. Try again later </h3>";
					echo "<script>setTimeout(\"location.href = 'adminHome.php';\",900);</script>";	
				}
				
			}
}

else if(!isset($_POST['checklist']) && !isset($_POST['type'])){
				$userID = $_SESSION["UID"];
			//prepare statement
				$sql = $conn->prepare("DELETE from user WHERE userID = '$userID'");
				if($sql->execute()){
				echo "<center><h1> Thank you for being a part of our cult,, I mean family! <3 <br> Goodbye.";
				echo "<script>setTimeout(\"location.href = 'logout.php';\",1200);</script>";
			
				}else{
					echo "<h3> User is not deleted. Try again later </h3>";
					echo "<script>setTimeout(\"location.href = 'adminHome.php';\",900);</script>";	
			}
}
	
	
	$conn->close();
?>