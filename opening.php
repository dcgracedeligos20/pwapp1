<?php
session_start(); //or comment?
$host='localhost';
$user='root';
$pass='';
$db='dbWS';
//connection here
$conn = new mysqli($host, $user, $pass, $db);

	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$sql="SELECT * FROM accounts
	WHERE username='$username' AND password='$password'";
	
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{
		$fname=$row["firstname"];
		$lname=$row["lastname"];
		//echo "Successful";
		echo "Welcome ".$lname.", ".$fname."!";
		}
	}else{
		echo "Account does not exist! Nice try ".$username;
	}
?>