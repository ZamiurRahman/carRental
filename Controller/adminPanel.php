<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="viewport" content="width=device-width,innitial-scale=1.0">
	<title>Welcome, Admin!</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <!-- Favicons -->
  <link href="../View/assets/img/favicon.png" rel="icon">
  <link href="../View/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../View/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../View/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../View/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../View/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../View/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../View/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../View/assets/css/coming-soon.css" rel="stylesheet">
  <link href="../View/assets/css/home.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../View/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio - v1.4.1
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="assets/img/car.png" alt="" >
        <h1 class="text-light"><a href="index.html">Hello, Admin</a></h1>
      </div>

      <nav class="nav-menu">
        <ul>
          <li class="active"><a href="#hero"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#cars"><i class="bx bx-car"></i> <span>Cars</span></a></li>
          <li><a href="#addcar"><i class="bx bx-plus"></i> <span>Add Car</span></a></li>
          <li><a href="#deleteA"><i class="bx bx-minus"></i> Delete Account</a></li>
          <li><a href="#deleteC"><i class="bx bx-minus"></i> Delete Car</a></li>
          <li><a href="#history"><i class="bx bx-coin-stack"></i> History</a></li>
          <li><a href="../View/index.html"><i class="bx bx-log-out"></i> Log Out</a></li>

        </ul>
      </nav><!-- .nav-menu -->
      
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>Dhaka Car Rental</h1>
      <p>We <span class="typed" data-typed-items="Believe, Communicate, Deliver"></span></p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Cars Section ======= -->
    <section id="cars" class="about section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Our Selection of Cars</h2>
        </div>

        <h2>Available Cars:</h2>
        <hr />
        <br>

      <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mydb";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM car WHERE booked = 0";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
          ?>
          <div class="container bcontent">
            <div class="card" style="width: 1070px;">
              <div class="row no-gutters">
                <div class="col-sm-5">
                  <img class="card-img" src="../View/assets/img/carphotos/<?=$row['image'];?>" alt="Suresh Dasari Card">
                </div>
                <div class="col-sm-7">
                  <div class="card-body">
                    <h1 class='card-title'>Car Name: <?=$row['car_name'];?></h1>
                    <h3 class='card-text'>registration No.: <?=$row['reg_no'];?></h3>
                    <h3 class='card-text'>fare per hour: <?=$row['fare'];?></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
        <?php
          }
        } else {
          echo "No Cars Available";
        }
        $conn->close();
      ?>
      <br>
      <h2>Unavilable cars:</h2>
      <hr/>
		  <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mydb";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM car WHERE booked = 1";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
        // output data of each row
          while($row = $result->fetch_assoc()) {
            ?>
            <div class="container bcontent">
              <div class="card" style="width: 1070px;">
                <div class="row no-gutters">
                  <div class="col-sm-5">
                    <img class="card-img" src="../View/assets/img/carphotos/<?=$row['image'];?>" alt="Suresh Dasari Card">
                  </div>
                  <div class="col-sm-7">
                    <div class="card-body">
                      <h1 class='card-title'>Car Name: <?=$row['car_name'];?></h1>
                      <h3 class='card-text'>registration No.: <?=$row['reg_no'];?></h3>
                      <h3 class='card-text'>fare per hour: <?=$row['fare'];?></h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br>
        <?php
          }
        } else {
          echo "All Cars Available";
        }
        $conn->close();
		  ?>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Add Car Section ======= -->
    <section id="addcar" class="resume">
      <div class="container">
        <div class="section-title">
          <h2>Add A New Car</h2>
        </div>
        <div class="wrapper">
          <div id="formContent">
            <!-- Login Form -->
            <form class="form1" method="POST" action = "carController.php" enctype="multipart/form-data">
              <input type="hidden" name="size" value="1000000">
              <input type="file" name="image" onchange="loadfile(event)">
              <img id="preimage" width="200px" height="500px">
              <script type="text/javascript">
                function loadfile(event) {
                  var output = document.getElementById('preimage');
                  output.src=URL.createObjectURL(event.target.files[0]);
                };
              </script>
              <input type="text" name="car_name" placeholder="Car Name">
              <input type="text" name="reg_no"  placeholder="Registration No">
              <input type="text" name="mileage" placeholder="Mileage">
              <input type="text" name="fare" placeholder="Fare Per Hour">
              <input type="submit" name="submit">
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Add Car Section -->

    <!-- ======= Delete Account Section ======= -->
    <section id="deleteA" class="resume">
      <div class="container">
        <div class="section-title">
          <h2>Delete An Account</h2>
        </div>
        <div class="wrapper">
          <div id="formContent">
            <!-- Login Form -->
            <h3 style="text-align: center;"> Fill up the form to delete an Account</h3>
            <br>
            <form class="form1" action="userController.php" method = "POST">
              <input type="text" name="username" placeholder=" User ID" required="required">
              <input type="Password" name="password" placeholder="Password" required="required">
              <input type="submit" name="submit">
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Delete Account Section -->

    <!-- ======= Delete Car Section ======= -->
    <section id="deleteC" class="resume">
      <div class="container">
        <div class="section-title">
          <h2>Delete A Car</h2>
        </div>
        <div class="wrapper">
          <div id="formContent">
            <!-- Login Form -->
            <h3 style="text-align: center;"> Fill up the form to delete a car</h3>
            <br>
            <form class="form1" action="carDeleteController.php" method = "POST">
              <input type="text" name="car_name" placeholder="Name of the Vehicle" required="required">
              <input type="submit" name="submit">
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Delete Car Section -->

    <!-- ======= History Section ======= -->
    <section id="history" class="about section-bg">
      <div class="container">
        <div class="section-title">
          <h2>Car Rental History</h2>
        </div>
        <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "mydb";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }

          $sql = "SELECT * FROM car inner join booking on carID = car_id inner join customer on customer.id = booking.customer_id" ;
          $result = mysqli_query($conn, $sql);

          if ($result->num_rows > 0) {
          // output data of each row
            while($row = $result->fetch_assoc()) {
              ?>
                <div class="container bcontent">
                  <div class="card" style="width: 1070px;">
                    <div class="row no-gutters">
                      <div class="col-sm-5">
                        <img class="card-img" src="../View/assets/img/carphotos/<?=$row['image'];?>" alt="Suresh Dasari Card">
                      </div>
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h1 class='card-title'>Customer Name: <?=$row['name'];?></h1>
                          <h1 class='card-title'>Car Name: <?=$row['car_name'];?></h1>
                          <h3 class='card-title'>Customer Username: <?=$row['username'];?></h3>
                          <h3 class='card-text'>Car Registration No.: <?=$row['reg_no'];?></h3>
                          <h3 class='card-text'>Booking No: <?=$row['book_id'];?></h3>
                          <h3 class='card-text'>Booking Started: <?=$row['starts_from'];?></h3>
                          <h3 class='card-text'>Booking Ended: <?=$row['ends_to'];?></h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
            <?php
            }
          } else {
            
          }
          $conn->close();
        ?>
    </section><!-- End History Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Dhaka Car Rental</span></strong>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="../View/assets/vendor/jquery/jquery.min.js"></script>
  <script src="../View/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../View/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../View/assets/vendor/php-email-form/validate.js"></script>
  <script src="../View/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../View/assets/vendor/counterup/counterup.min.js"></script>
  <script src="../View/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../View/assets/vendor/venobox/venobox.min.js"></script>
  <script src="../View/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../View/assets/vendor/typed.js/typed.min.js"></script>
  <script src="../View/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../View/assets/js/main.js"></script>

</body>

</html>