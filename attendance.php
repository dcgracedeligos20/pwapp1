<!DOCTYPE html>
<?php
session_start();
$username="";
$username=$_SESSION['username'];
$actID="";
$actCode="";

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
$sql="SELECT * FROM activity ORDER BY date";
$result = $conn->query($sql);
?>
<html>
<head>
	<link rel="shortcut icon" href="image/logo.ico" />
	<title>Attendance</title>
<style>
body{
background-color:#d9d9d9;
margin:0;
font-family:monospace;
}

li{
display: inline;
padding:25px;

}

ul{
list-style-type: none;
margin: 0;
padding: 0;
font-size:16px;
}

a:link{
text-decoration:none;
}

a:hover{
color:green;
cursor:pointer;
}

a:visited{
color:blue;
cursor:pointer;
}

a:visited:hover{
color:green;
cursor:pointer;
}

table{
	margin-top:20px;
	width:100%;
}

th{
	background-color:#588c7e;
	color:white;
	padding:10px;
}

tr:nth-child(even){
	background-color:#f2f2f2;
}

td{
	padding:7px;
}

tr:hover{
	background-color:#b1cec6;
	cursor:pointer;
}

th:hover{
	cursor:default;
}
.middle{
width:480px;
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
	<!--Navigation here-->
		<ul>
		  <li><a href="mainscreen.php">Home</a></li>
		  <li><a href="logout.php" style="color:red">Logout</a></li>
		</ul>

	<!--Table details here-->
	<table>
		<tr>
			<th>Activity Code</th>
			<th>Activity Name</th>
			<th>Date</th>
			<th>Action</th>
		</tr>

		<?php 
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>". $row["actCode"]. "<td>". $row["actName"]. "<td>" . $row["date"] . "<td>".
					'<a href="view.php">View</a>'."<tr>";
					//ang gina save niya kay ang pinaka last na nainput
					$actCode=$row["actCode"];
					$_SESSION['actCode']=$actCode;
					$actID=$row["actID"];
					$_SESSION['actID']=$actID;
					echo $actID.$actCode.'<br>';
				}
			} else {
				echo "No Activities at the moment. You can add activities now!";
		}
		?>
	</table>
	
	</div>
</body>
</html>