<!DOCTYPE html>
<?php
session_start();
$username="";
$username=$_SESSION['username'];
$dispUser="";
if(!isset($username)){
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
?>
<html>
<head>
	<link rel="shortcut icon" href="image/logo.ico" />
	<title>Main Screen</title>
<style>
body{
background-color:#d9d9d9;
margin:0;
font-family:monospace;
}

li{
display: inline;
padding:20px;
font-size:14px;
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
height:100%;
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

</style>
</head>
<body>
	<div class="middle">
		<img src="image/logotrans.png" id="logo" alt="logoHere">
		<?php echo $dispUser?>
	<!--Main screen details here--->
		<ul>
		  <li><a href="activity.php">Activity</a></li>
		  <li><a href="attendance.php">Attendance</a></li>
		  <li><a href="logout.php" style="color:red">Logout</a></li>
		</ul>
	</div>
</body>
</html>