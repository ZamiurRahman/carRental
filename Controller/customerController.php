<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width,innitial-scale=1.0">
	<meta name="Author" content="Shahriar, Istinub, Himadri, Iffat">
	<title>Welcome!!</title>

	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/carrentalsystem/MVC PATTERN/View/Adminstyle.css">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="css/coming-soon.css" rel="stylesheet">
  <link href="css/home.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

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
        <?php if(isset($_GET['customer_id'])) {?>
          <h1 class="text-light">Hello, <?php echo $_GET['customer_id'] ?></h1>
        <?php } ?>
      </div>

      <nav class="nav-menu">
        <ul>
          <li class="active"><a href="#hero"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="#cars"><i class="bx bx-car"></i> <span>Cars</span></a></li>
          <li><a href="#branch"><i class="bx bx-git-branch"></i> <span>Branches</span></a></li>
          <li><a href="#history"><i class="bx bx-coin-stack"></i> History</a></li>
          <li><a href="#about"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="#contact"><i class="bx bx-envelope"></i> Contact</a></li>
          <li><a href="#terms"><i class="bx bx-book-alt"></i> Terms & Conditions</a></li>
          <li><a href="index.html"><i class="bx bx-log-out"></i> Log Out</a></li>

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
                  <img class="card-img" src="carphotos/<?=$row['image'];?>" alt="Suresh Dasari Card">
                </div>
                <div class="col-sm-7">
                  <div class="card-body">
                    <h1 class='card-title'>Car Name: <?=$row['car_name'];?></h1>
                    <h3 class='card-text'>registration No.: <?=$row['reg_no'];?></h3>
                    <h3 class='card-text'>fare per hour: <?=$row['fare'];?></h3>
                    <a href='bookingForm.php?carID=<?=$row['carID'];?>'><button class=book>Book</button></a>
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
                    <img class="card-img" src="carphotos/<?=$row['image'];?>" alt="Suresh Dasari Card">
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

    <!-- ======= Branch Section ======= -->
    <section id="branch" class="resume">
    <div class="container">
    <div class="section-title">
          <h2>Our Branches</h2>
    </div>
    <div class="box">
    
     	<div class="row">
			  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" > 
					<div class="box-part text-center" id="boxContent">   
            <i class="bx bx-car"></i>         
						<div class="title">
							<h2>Dhaka</h2>
						</div>         
						<div class="text">
							<span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
						</div>       
						<a href="#">Google Maps</a>        
					 </div>
				</div>	 
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="box-part text-center" id="boxContent">
					    <i class="bx bx-car"></i>
						<div class="title">
              <h2>Chittagong</h2>
						</div>  
						<div class="text">
							<span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
						</div>         
						<a href="#">Google Maps</a>      
          </div>
				</div>	 
				 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">  
					<div class="box-part text-center" id="boxContent">         
            <i class="bx bx-car"></i>      
						<div class="title">
              <h2>Rajshahi</h2>
						</div>    
						<div class="text">
							<span>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</span>
						</div>       
						<a href="#">Google Maps</a>        
					 </div>
				</div>
		</div>		
    </div>
</div>
    </section><!-- End Branch Section -->


    <!-- ======= History Section ======= -->
    <section id="history" class="about section-bg">
       <div class="container">
        <div class="section-title">
          <h2>Car Rental History</h2>
        </div>
        <!--
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

          $sql = "SELECT * FROM car inner join booking on carID = car_id inner join customer on customer.id = booking.customer_id WHERE customer.id = $customer" ;
          $result = mysqli_query($conn, $sql);

          if ($result->num_rows > 0) {
          // output data of each row
            while($row = $result->fetch_assoc()) {
              ?>
                <div class="container bcontent">
                  <div class="card" style="width: 1070px;">
                    <div class="row no-gutters">
                      <div class="col-sm-5">
                        <img class="card-img" src="carphotos/<?=$row['image'];?>" alt="Suresh Dasari Card">
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
        ?> -->
    </section><!-- End History Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.
              Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
              Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.
            </p>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Mohakhali, Dhaka, Bangladesh</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>info@dcr.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 555</p>
              </div>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.1341791530517!2d90.40388691543184!3d23.77823579362829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c77105370809%3A0xceb3b63e332f8df!2sMohakhali%2C%20Dhaka%201212!5e0!3m2!1sen!2sbd!4v1606909801847!5m2!1sen!2sbd" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Terms & Conditions Section ======= -->
    <section id="terms" class="contact">
      <div class="container">
        <div class="section-title">
          <h2>Terms & Conditions</h2>
        </div>
          <p>Dhaka Car Rental cars are prominent in Bangladesh for its quality and moderate administrations for the
          customers. We have long term success story of overcoming adversity in the vehicle rental space
          of Bangladesh. We treat customers as our family members. At the point when you once lease a
          vehicle from us we gather your contact number just as your data in our information framework.
          On the off chance that you again lease a vehicle from us you sholid be permitted to get discount
          on vehicle rental charge.</p>
          <p>Our car rental fleet, networks and services offer airport car rental, sharing of car, understudy
          transport answer for schools, universities and even colleges. Moreover, we provide business
          solution for business organizations. We have temperature controlled vehicles of both economy
          and premium quality for rent.</p>
          <ul>
            <li> We are the primary online based rent a car in Bangladesh who can arrange vehicle for you within your budget and affordability.</li>
            <li>Dhaka Car Rental cars are the easy, hassle free and affordable car rental service provider in Bangladesh.</li>
            <li>If the customer cancels any booking then Dhaka Car Rental cars will not impose any charges to the customers.</li>
            <li>In the day of general strike or blockade or political movement the vehicle will not move and the trip will be canceled.</li>
            <li>Dhaka Car Rental rent a car will provide the best transport facility to you as indicated by your prerequisites.</li>
            <li>However, we will provide car rental facilities to our clients all day. A specialized team always works 24/7 in ensuring the facility to the customers.</li>
            <li>We also provide car facility without driver on client’s request. In this case the client must sign the prior documents before the booking.</li>
            <li>If any accident occurs in the roads Dhaka Car Rental cars will not take any responsibility.</li>
            <li>If the vehicle goes outside Dhaka, the clients have to pay BDT 1000 for driver’s accommodation. The clients have to take the responsibilities of the vehicle that is, safety and security when go outside Dhaka.</li>
            <li>The vehicle will carry only passenger and their belongings. No illegal things are allowed to carry and Dhaka Car Rental cars will not take any responsibility of that thing.</li>
            <li>All the fares for hiring are excluding of VAT/ TAXES and including of all expenses like ferry/ toll/ parking and so on.</li>
            <li>Half of the payment of hiring charge must be paid during booking and rest of the amount needs to pay after completion of the trip.</li>
          </ul>

        
      </div>
    </section><!-- End Terms & Conditions Section -->

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
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>