<?php 
include("config.php");
session_start();

$type= $_POST['type'];
$adminID = $_SESSION["UID"];
$projectName = $_POST['projectName'];
$projectDesc = $_POST['projectDesc'];
$projectLink = $_POST['projectLink'];
$showContent = $_POST['show'];

$check = 0;
//buat there are 2 parts.. 
//if type 1 then insert into project table, if type 2 then update the table

if($type === "1"){


	$stmt = "INSERT INTO project (projectName, projectDesc, projectLink, showContent, adminID) VALUES(?,?,?,?,?)";
	$sql = $conn->prepare($stmt);
	$sql->bind_param("ssssi", $projectName, $projectDesc,  $projectLink, $showContent, $adminID);
    $sql->execute();
	
	$sql = "UPDATE project SET dateCreated = now() WHERE projectName = '$projectName'";
    $result=$conn->query($sql);
	
	if($sql){
		
		echo "<h2> Inserted. Checking image...";
		$check= checkImage($projectName,$conn );
		if($check === 1 ){
			echo "<h1> No image was uploaded. Successfully updated! </h1> <br><p> <b>Please wait as we redirect you to homepage..... <b> </p><br>";
			echo "<script>setTimeout(\"location.href = 'adminProject.php';\",1500);</script>";	
			
		}else{
			echo "<h1> An image was uploaded. Successfully updated! </h1> <br><p> <b>Please wait as we redirect you to homepage..... <b> </p><br>";
			echo "<script>setTimeout(\"location.href = 'adminProject.php';\",1500);</script>";		
		}
	}else{
			echo "<h1> There is an error</h2>";
	}
}

if($type === "2"){
	$projectID = $_POST['projectID'];
	
	$stmt = "UPDATE project SET projectName=?, projectDesc=?, projectLink=?, showContent=?, updatedBy=?, dateUpdated = now() WHERE projectID= '$projectID'";
	$sql = $conn->prepare($stmt);
	$sql->bind_param("ssssi", $projectName, $projectDesc, $projectLink, $showContent, $adminID, );
	$sql->execute();
	
	if($sql){
		echo "<h2> Updated. Checking image...";
		$check= checkImage($projectName,$conn );
		if($check === 1 ){
			echo "<h1> No image was uploaded. Successfully updated! </h1> <br><p> <b>Please wait as we redirect you to homepage..... <b> </p><br>";
			echo "<script>setTimeout(\"location.href = 'adminProject.php';\",1500);</script>";	
			
		}else{
			echo "<h1> An image was uploaded. Successfully updated! </h1> <br><p> <b>Please wait as we redirect you to homepage..... <b> </p><br>";
			echo "<script>setTimeout(\"location.href = 'adminProject.php';\",1500);</script>";		
		}
		
	}else{
			echo "<h1> There is an error</h2>";
	}
	
}

function checkImage($projectName,$conn){
	$target_dir = "projectImg/";
	if(empty($_FILES["imgUpload"]["name"])){
		$target_file = "";
		return 1;
	}else{
		
		$target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);
		clearstatcache();		
		
if(filesize($target_file)){
	//fetch the project ID
	$sql = "SELECT projectID from project WHERE projectName = '$projectName';";
	$result= $conn->query($sql);
	$row= $result->fetch_assoc();
	$projectID = $row['projectID'];
	
	//dan bwh nie sume copy paste from previous ones I alrdy edited and did from dr suraya punya 
	$uploadOk = 1;
	$sql=$conn->prepare("UPDATE project SET projectImg = '$target_file' WHERE projectID='$projectID'; ");
			
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["imgUpload"]["tmp_name"], $target_file)) {
		
		$imgUp = $sql->execute();
		if ($imgUp) {
			return 2;	
		}
		else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}		
		$conn->close();
        echo "The file ". basename( $_FILES["imgUpload"]["name"]). " has been uploaded.";		
	} else {
        echo "There was an error uploading your file.<br>";
		echo "<script>setTimeout(\"location.href = 'org_index.php';\",1500);</script>";	
    }	
}
}else{
		echo "There was a problem";
		
	}
	
}
}

$conn->close();
?>