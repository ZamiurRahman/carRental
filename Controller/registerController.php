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
$name = $_POST['name'];
$email = $_POST['email'];
$nid = $_POST['nid_no'];
$p_no= $_POST['phone_number'];
$address = $_POST['address'];

$sql= "INSERT INTO customer (username, password, name, email, nid_no, phone_number, address) VALUES ('$User_name', '$password', '$name', '$email', '$nid', '$p_no', '$address')";
if ($conn->query($sql) == TRUE) {
    header("refresh:2; url=../View/login.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

?>