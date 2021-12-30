<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

//creating connection
// giving $dbname as a param.. it will create a database and use it..

$conn = new mysqli($servername,$username,$password,$dbname);

//checking connection

if($conn->connect_error){
	die ("Connection failed: " . $conn->connect_error);
}

// creating table
$User_name = $_POST['car_name'];

if(['car_name'] != NULL){
	$userId = $_POST['car_name'];

	$sql = "SELECT * FROM car WHERE car_name = '$userId' LIMIT 1";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) == 1){
		$sql2="DELETE FROM car WHERE car_name = '$userId'";
		if(mysqli_query($conn,$sql2) == TRUE){
			echo "Successfully deleted";
			header("refresh:2; url=welcomeAdmin.php");
			exit();
		}
		else{
			echo"Error deleting Record: " . $conn->error ;
		}
	} 
	else {
		echo "Invalid car name" ;
		exit();
	}
}

$conn->close();
?>