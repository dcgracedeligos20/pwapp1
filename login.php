<!DOCTYPE html>
<!--THE CANCEL OR CLOSE BUTTON SOMETIMES WORKS, BUT IT
WON'T WORK IN CHROME BUT IT WORKS IN MICROSOFT EDGE hmmm-->
<?php

session_start();
$host='localhost';
$user='root';
$pass='';
$db='dbWS';
//connection here
$conn = new mysqli($host, $user, $pass, $db);
$err="";

if(isset($_POST['submit'])){
	$inpHash="";
	$username = $_POST["username"]; //user input login username
	$password = $_POST["password"];	//user input login password
	
	//hashing the user input password
	$hash = hash("sha256", $password);
	//echo $hash; //printing the hashed password
	
	$sql="SELECT * FROM accounts
	WHERE username='$username' AND password='$hash'";
	
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{
		$_SESSION['username']=$username;
		header('Location: mainscreen.php');
		}
	}
	else if((empty($username))||(empty($password))){
		$err="Please input username AND password";
		//echo "<script type='text/javascript'>alert('$msg');</script>";
	}
	else 
	{
		$msg="You are not permitted to access!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		exit();
	}
	
	//try to hash the passwords that are not yet hashed
	$disp="SELECT password FROM accounts";
	$resDisp=$conn->query($disp);
	
	if($resDisp->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{
		$row['password']=$inpHash;
		echo $inpHash;
		}
	}
}
?>
<html>
<head>
	<link rel="shortcut icon" href="image/logo.ico" />
	<title>Login Page</title>
<style>
body{
background-color:#d9d9d9;
margin:0;
font-family:monospace;
}

.middle{
width:200px;
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

#text{
width:90%;
padding:3px;
font-size:14px;
text-align:center;
margin-bottom:2%;
}

#buttons{
margin-top:15px;
width:45%;
background-color: #4CAF50;
border: none;
color: white;
padding: 10px 18px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 13px;
}

#buttons:hover{
cursor:pointer;
background-color:#588c7e;
}
</style>
</head>
<body>
	<div class="middle">
		<img src="image/logotrans.png" id="logo" alt="logoHere">
	
	<!--login input details here--->
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
		<input type="text" id="text" name="username" placeholder="Username" ><br>
		<input type="password" id="text" name="password" placeholder="Password" ><br>
		
		<input type="button" id="buttons" style="float:left;" value="Cancel" onclick="closeB();">
		<input type="submit" id="buttons" name="submit" style="float:right;" value="Login">
	</form>
	<span style="font-size:12px; color:red;">
	<?php echo $err;?></span>
	</div>
</body>
<script type="text/javascript">
function closeB(){
	var x = confirm("Are you sure you want to exit?");
	if (x==true){
		self.close();
	}else{
		return;
	}
}
</script>
</html>