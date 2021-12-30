<?php

if(isset($_POST['submit'])) {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mydb";
	$conn = new mysqli($servername,$username,$password,$dbname);
	//checking connection
	if($conn->connect_error){
		die ("Connection failed: " . $conn->connect_error);
	}
	$msg="";
	//taking the input of image file
	$image = $_FILES['image']['name'];
	//path to store the image
	$target = "carphotos/".basename($image);
	$name = $_POST['car_name'];
	$reg = $_POST['reg_no'];
	$mileage = $_POST['mileage'];
	$fare = $_POST['fare'];
	//insert query
	$sql = "INSERT INTO car (car_name,image,reg_no, mileage, fare) VALUES ('$name','$image','$reg','$mileage', '$fare')";
	//runnting the qurry
	if(mysqli_query($conn,$sql)==TRUE){
		
	} else {
		echo "error in insertion";
	}
	//moving the uploaded picture to the targeted directory
	if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
		
	} else {
		echo "There was a problem";
	}

}

?>
