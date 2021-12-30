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
$User_name = $_POST['username'];
$password = $_POST['password'];

if(['username'] != NULL){
	$userId = $_POST['username'];
	$pass = $_POST['password'];
	

	$sql = "SELECT * FROM customer WHERE username = '$userId' AND password = '$pass' LIMIT 1";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) == 1){
		$sql2="DELETE FROM customer WHERE username = '$userId'";
		if(mysqli_query($conn,$sql2) == TRUE){
			echo "Successfully deleted";
			header("refresh:2; url=adminPanel.php");
			exit();
		}
		else{
			echo"Error deleting Record: " . $conn->error ;
		}
	} 
	else {
		echo "Invalid Password or Username" ;
		exit();
	}
}

$conn->close();
?>