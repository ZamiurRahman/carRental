<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mydb";

//creating connection
// giving $dbname as a param.. it will create a database and use it..

$con = new mysqli($servername,$username,$password,$dbname);

//checking connection

session_start();

if($con->connect_error){
	die ("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM car WHERE fare BETWEEN 0 AND 5000";
		$result = mysqli_query($conn,$sql);
		
		while ($row = mysqli_fetch_array($result)) {
      echo "<div >";
      	echo "<img src='carphotos/".$row['image']."' > <br>";
      	echo "<p> Name: ".$row['car_name']."</p> <br>";
      	echo "<p>Reg No: ".$row['reg_no']." </p>";
      echo "</div>";
		} 
?>