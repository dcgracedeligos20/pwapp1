<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbase='dbWS';
//creating a connection
$conn = new mysqli($servername,$username,$password,$dbase);
/*
$sql="CREATE DATABASE dbWS";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
*/
//creating table
/*
$sql="CREATE TABLE accounts(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, 
username VARCHAR(30),password VARCHAR(30))";
*/
/*
$sql="CREATE TABLE attendance(att_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, 
sign LONGBLOB ,act_id INT(6), signDate TIMESTAMP)";
*/
/*
$sql="CREATE TABLE activity(act_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
actCode VARCHAR(30) NOT NULL, actName VARCHAR(30) NOT NULL,date DATETIME)";
//CHECKING TABLE
if($conn->query($sql)===TRUE){
	echo"table created!";
}else{
	echo"oh no! ".$conn->error;
}
*/
//inserting values
/*
$sql="INSERT INTO accounts(firstname, lastname, username, password)
VALUES ('angelie','formentera','alformentera','123123')";
*/
//checking
if($conn->query($sql)===TRUE){
	echo"Values inserted!";
}else{
	echo"oh no! ".$conn->error;
}
?>