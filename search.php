<?php
session_start(); //or comment?
$host='localhost';
$user='root';
$pass='';
$db='dbWS';
//connection here
$conn = new mysqli($host, $user, $pass, $db);
//$username=$_SESSION["username"];

	$actCode = $_POST["actCode"];
	//$actName = $_POST["actName"];
	//$actDate = $_POST["actDate"];
	
	$sql="SELECT * FROM activity
	WHERE actCode='$actCode'";
	
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{
		$codeAct=$row["actCode"];
		//$nameAct=$row["actName"];
		//$dateAct=$row["actDate"];
		//echo "Successful"; TWICE nag output kay duha ang naa sa db
		echo "Searched! ".$codeAct;;
		}
	}else{
		echo "Activity does not exist! Try a different Activity Code ".$username;
	}
?>