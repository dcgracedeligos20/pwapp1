<!DOCTYPE html>
<?php
session_start();
$username="";
$actID="";
$actCode="";

$username=$_SESSION['username'];
$actID=$_SESSION['actID'];
$actCode=$_SESSION['actCode'];
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

//connection here username='$username' AND password='$password'";
$conn = new mysqli($host, $user, $pass, $db);
$sql2="SELECT * FROM activity
WHERE actCode='$actCode' AND actID='$actID'"; //WHERE ID=ID; LOLOLOLOL
$result2 = $conn->query($sql2);

$sql="SELECT * FROM attendance
WHERE actCode='$actCode'"; //WHERE ID=ID; LOLOLOLOL
$result = $conn->query($sql);

$count=1;
$count;
$signImage="";
$dispImage="";
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

#tblDetails tr{
	background-color:#b1cec6;
}

#tblDetails tr:hover{
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
		  <li><a href="logout.php" style="color:red">Logout</a></li>
		</ul>

	<!--Table details here for the selected activity-->
	<table id="tblDetails">
		<tr>
			<th style="background-color:#b1cec6;color:black">Activity Details</th>
		</tr>
		<?php if ($result2->num_rows > 0) {
				// output data of each row
				while($row = $result2->fetch_assoc()) {
					echo "<tr><td>". $row["actCode"]. "<td>". $row["actName"]."<td>". $row["date"]."<tr>";
				}
			} else {
				echo "Dapat hindi ito lalabas";
		}?>
	</table>

	<!--Table details here for the attendance-->
	<table>
		<tr>
			<th>#</th>
			<th>Fullname</th>
			<th>Timestamp</th>
			<th>Signature</th>
		</tr>

		<?php if ($result->num_rows > 0) {
			
				// output data of each row
				while($row = $result->fetch_assoc()) {
					$row["sign"]=$signImage;
					$dispImage=base64_encode($signImage);
					$dispImagee="<img src='image/logo/ico;base64,{$dispImage}' alt=\"Signature\">";
					echo "<tr><td>". $count++. "<td>". $row["lastname"]. ", ". $row["firstname"]."<td>".$row["signDate"]."<td>".$dispImagee."<tr>";
				}
			} else {
				echo "No Attendance at the moment";
		}
		//echo $actID.$actCode;
		?>
	</table>
	</div>
</body>
</html>