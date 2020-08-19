<?php
session_start();
include("config.php");

$commentText = $_GET['comment'];
?>
<!-- asalnya nak guna jquery tapi....x geti lagi so :')-->
 <html>
	<style>
	body{
		background-color: gray;
	}
	h2{
		margin-top: 7%;
		margin-bottom: 4%;
	}
	.prompt{
		margin-top: 10%;
		border: 1px solid lightgray;
		border-radius: 6px;
		background-color: #F8F8F8 ;
		max-width: 60%;
		max-height: 50%;
		line-height: 3em;
		padding-bottom: 5%;
		box-shadow: 1px 1px lightgray;
	}
	a,input{
		border: 1px solid lightgray;
		border-radius: 6px;
		text-decoration: none;
		background-color: whitesmoke;
		color:black;
		font-size: 16px;
		padding: 2%;
		box-shadow: 1px 1px lightgray;
		margin-left: 5%;
		
	}
	a:hover{
		background-color: white;
	}
	input:hover{
		background-color: white;
	}
	.noclick{
		border: 2px solid gray;
		text-align: center;
		width: 90%;
		padding: 6px;
		margin-left: 1%;
		margin-bottom: 5%;
		opacity: 0.75;
		pointer-events: none;
	}
	</style>
	<body>
	<center>
	<form action="deletepost_action.php" method="POST">
		<div class="prompt">
			<h2> Select reason of reporting comment: </h2> 
			<input class="noclick" style="margin-top: -14%; padding: 1px; opacity: 0.0" name="type" type="text" value="4"> </label>
			<input class="noclick" name="comment" type="text" value="<?php echo $commentText ?>"> </label>
			<select for="report" name="reportCause" id="reportCause">
				<option value="Inapproriate remark (Nudity/pornography/ degradation)">Inapproriate remark (Nudity/pornography/ degradation)</option>
				<option value="Dangerous organization or individuals">Dangerous organization or individuals</option>
				<option value="Inapproriate remark">Inapproriate remark</option>
				<option value="Harassment/Bullying">Harassment/Bullying</option>
				<option value="Hate speech">Hate speech</option>
				<option value="Spam">Spam</option>
				<option value="Intellectual Property Infringement">Intellectual Property Infringement</option>
				<option value="Other">Others</option>
			</select><br><br>
			<input style=" cursor: pointer;" type="submit" name="submit" value=" Send report " ></input>&nbsp <a href="news.php">Cancel</a>
	</form>
		</div>
	</center>
	</body>
 </html>