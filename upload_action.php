<?php
session_start();
include("config.php");

$showContent= $_POST["showContent"];
$type= $_POST["type"];
$title= $_POST["title"];
$desc= $_POST["desc"];
$adminID = $_SESSION["UID"];
$error= "Title or description (or both) is empty!";
$target_dir = "newsImg/";
$target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);

if($type=="1"){
if($title != " " && $desc != " "){
$sql = $conn->prepare("INSERT INTO content( contentTitle, contentText, adminID, showContent) VALUES (?,?,?,?) ");
$sql->bind_param("ssis", $title, $desc, $adminID, $showContent);
$sql->execute();

}else{
	$_SESSION['error']=$error;
	header("location: updatenews.php");}
}

if($type=="2"){
	
	$contentID = $_POST["contentID"];
	$sql = $conn->prepare("UPDATE content SET contentTitle = ?, contentText=?, showContent=? WHERE contentID='".$contentID."';");
	$sql->bind_param("sss", $title, $desc, $showContent);
	$sql->execute();
	if($sql){
		echo "True";	
	}else{
		echo "False";
	}
}


//upload image
clearstatcache();
if($_FILES["imgUpload"]["name"]){
	
	if(filesize($target_file)){
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	$sql=$conn->prepare("UPDATE content SET contentImg = '$target_file' WHERE contentTitle='$title'; ");
			
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
			echo "<h1> An image was uploaded. Successfully updated! </h1> <br><p> <b>Please wait as we redirect you to homepage..... <b> </p><br>";
			echo "<script>setTimeout(\"location.href = 'adminHome.php';\",1500);</script>";			
		}
		else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}		
		$conn->close();
        echo "The file ". basename( $_FILES["imgUpload"]["name"]). " has been uploaded.";		
	} else {
        echo "There was an error uploading your file.<br>";
		echo "<script>setTimeout(\"location.href = 'adminHome.php';\",1500);</script>";	
    }	
}
}
}else{
	echo "<h1> No image was uploaded. Successfully updated! </h1> <br><p> <b>Please wait as we redirect you to homepage..... <b> </p><br>";
	echo "<script>setTimeout(\"location.href = 'adminHome.php';\",1500);</script>";	
	
}
?>