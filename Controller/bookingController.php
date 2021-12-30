<?php
session_start();
$customer = $_SESSION['id'];
$carID = isset($_GET['carID']) ? $_GET['carID'] : '9';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Booking | Dhaka Car Rental</title>

		<!-- Bootstrap core CSS -->
		<link href="../View/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">


		<!-- Custom fonts for this template -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
		<link
			href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i"
			rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i"
			rel="stylesheet">
		<link href="../View/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">

		<!-- Custom styles for this template -->
		<link href="../View/assets/css/coming-soon.css" rel="stylesheet">
		<link href="../View/assets/css/booking.css" rel="stylesheet">

	</head>
	<body>
				
	<div class=""></div>
		<video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
			<source src="../View/assets/mp4/back.mp4" type="video/mp4">
		</video>
		<div class="wrapper fadeInDown">
			<div id="formContent">
				<div class="fadeIn first">
					<a href="index.html">
					<img src="../View/assets/img/car2.png" alt="" style="margin:50px 0px;" width="180" height="180" margin:50px 0px/>
					</a>
				</div>
				<form class="form1" action="bookingController.php " method = "POST">
					Start: <br> <input type="text" class="fadeIn second" placeholder=" Journey Starts From" required="required" name="start">
					<br> Stop: <br> <input type="text" class="fadeIn second" name="stop" placeholder="Journey Ends To" required="required" name="stop">
					<br> From: <br> <input type="date" class="fadeIn second" name="date" placeholder="ddmmyy" required="required" id="start" name="date">
					<input type="hidden" name="customer" value="<?php echo $customer; ?>">
					<input type="hidden" name="car"value="<?php echo $car; ?>">
					<br> Start Time: <br> <input type="time" class="fadeIn second" name="time"><br> No. of Days: <br>
					<input type="number" name="days" class="fadeIn second" placeholder="Number of Days You Want To Rent!!" ><br><br>
					<!-- creating the submit button -->
					<button type="submit" class="button"  name="submit">Submit</button> 
					<br>
					<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "mydb";

					// Create connection
					$db = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					
					if (isset($_POST['submit'])) {
						$start = mysqli_real_escape_string($db, $_POST['start']);
						$stop= mysqli_real_escape_string($db, $_POST['stop']);
						$date= mysqli_real_escape_string($db, $_POST['date']);
						$customer = mysqli_real_escape_string($db, $_POST['customer']);
						$car= mysqli_real_escape_string($db, $_POST['car']);
						$time= mysqli_real_escape_string($db, $_POST['time']);
						$days= mysqli_real_escape_string($db, $_POST['days']);
						$query = "INSERT INTO booking (car_id, customer_id, starts_from, ends_to, start_date, start_time, total_days) VALUES('$carID','$customer', '$start', '$stop', '$date','$time', '$days')";
						mysqli_query($db, $query); 
						header("refresh:2 ; url=customerPanel.php");
					}
					?>
					<br>
					<br>
				</form>

			</div>
		</div>
	</body>
</html>