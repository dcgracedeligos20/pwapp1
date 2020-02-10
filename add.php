<!DOCTYPE html>
<?php
session_start();
$username="";
$username=$_SESSION['username'];
if(!isset($_SESSION['username'])){
	$msg="You are not permitted to access! Please log in first!";
	echo "<script type='text/javascript'>alert('$msg');</script>";
	exit;
}else{
	$dispUser="Your account: ".$username;
}

$host='localhost';
$user='root';
$pass='';
$db='dbWS';
//connection here
$conn = new mysqli($host, $user, $pass, $db);
if(isset($_POST['submit'])){
	$actCode = $_POST['actCode'];
	$actName = $_POST['actName'];
	$actDate = strtotime($_POST['actDate']);
	$actDate=date("Y-m-d",$actDate);
	
	$sel="SELECT * FROM activity WHERE actCode='$actCode'";
	$result = $conn->query($sel);
	if(empty(($_POST['actCode'])&&($_POST['actName'])&&($_POST['actDate']))){
		$msg="Please fill up the form";
		echo"<script type='text/javascript'>alert('$msg');</script>";
	}else if($result->num_rows > 0){
		$msg="Activity Code already exists!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}else{
		$query = ("INSERT INTO activity(actCode,actName,date)
		VALUES ('$actCode','$actName','$actDate')");
		if($conn->query($query)===TRUE){
			$msg="Activity successfully added!";
			echo "<script type='text/javascript'>alert('$msg');</script>";
		}
	}
	/*if($conn->query($query)===TRUE)
	{
		$msg="Activity successfully added!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
				
	}else if(empty($_POST['submit'])){
		$msg="Please fill up the form";
		echo"<script type='text/javascript'>alert('$msg');</script>";
	}else if($actCode=='actCode'){
		$msg="Activity already exist!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}else{
		$msg="Something is wrong!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}
	*/
}
?>
<html lang="en">
<head>
	<link rel="shortcut icon" href="image/logo.ico" />
	<meta charset="utf-8">
	<title>Activity Details</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
body{
background-color:#d9d9d9;
margin:0;
font-family:monospace;
}

li{
display: inline;
padding:25px;
font-size:16px;
font-family:monospace;
}

ul{
list-style-type: none;
margin: 0;
padding: 0;
}

a:link{
text-decoration:none;
}

a:hover{
color:green;
}

a:visited{
color:blue;
}

.middle{
width:330px;
height:400px;
display:block;
margin-top:70px;
margin-left:auto;
margin-right:auto;
text-align:center;
}

#logo{
display:block;
margin-left:auto;
margin-right:auto;
width:150px;
height:110px;
margin-bottom:20px;
}

#text,#datepicker{
width:95%;
padding:3px;
font-size:14px;
text-align:center;
margin-bottom:2%;
clear:both;
}

#buttons{
margin-top:15px;
width:45%;
clear:both;
background-color: #4CAF50;
border: none;
color: white;
padding: 15px 32px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
}

#buttons:hover{
cursor:pointer;
background-color:#588c7e;
}

#parag{
	background-color:#588c7e;
	color:white;
	padding:5px;
	font-size:16px;
}

#parag:hover{
	cursor:default;
}
</style>
</head>
<body>
	<div class="middle">
		<img src="image/logotrans.png" id="logo" alt="logoHere">
		<?php echo $dispUser?>
	<!--Navigation here-->
		<ul>
		  <li><a href="mainscreen.php">Home</a></li>
		  <li><a href="activity.php">View</a></li>
		  <li><a href="logout.php" style="color:red">Logout</a></li>
		</ul>

	<!--Table details here PHP HERE I GUESS??-->
	<div class="tableView">
		<p id="parag">Activity Details</p>
		<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<input type="text" id="text" name="actCode" placeholder="Activity Code" ><br>
		<input type="text" id="text" name="actName" placeholder="Activity Name" ><br>
		<input type="text" id="datepicker" name="actDate" placeholder="Activity Date" >
		<input type="submit" id="buttons" name="submit" style="float:left;" value="Create">
		</form>
	</div>
	
	</div>
	<script type="text/javascript" src="jquery-ui.js"></script>
	<script type="text/javascript" src="ui.js"></script>
</body>
</html>