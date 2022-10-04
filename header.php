<?php include('function.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Corinthia Hotel Khartoum five-star hotel in central Khartoum -->
        <meta charset="utf-8">
        <title>CORINTHIA HOTEL | FIVE-STAR HOTEL </title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicons -->
        <!-- <link href="img/images.png" rel="icon">
        <link href="img/images.png" rel="apple-touch-icon">  -->
   

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet"> 
<!-- admin fils -->

<!-- admin fils -->

        <!-- Vendor CSS File -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="vendor/animate/animate.min.css" rel="stylesheet">
        <link href="vendor/slick/slick.css" rel="stylesheet">
        <link href="vendor/slick/slick-theme.css" rel="stylesheet">
        <link href="vendor/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

        <!-- Main Stylesheet File -->
        <link href="css/hover-style.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Header Section Start -->
        <header id="header">
            <!-- <a href="index.php" class="logo"><img src="img/logo.jpg" alt="logo"></a> -->
            
            <a href="index.php" class="logo"></a>
    <?php if(isset($_SESSION['user_id'])){   ?> <div class="phone"><i class="fa fa-user"></i><?php echo  $_SESSION['user_name'];}   ?></div>
            <div class="mobile-menu-btn"><i class="fa fa-bars"></i></div>
            <nav class="main-menu top-menu">
                <ul>
                    <?php if(isset($_SESSION['user_id'])){        ?>
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="room.php">Rooms</a></li>
                    <li><a href="report.php">Reports</a></li>
                    <!-- <li><a href="booking.php">Booking</a></li> -->
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="my_booking.php">Reservation <div class="badge bg-primary badge-number"><?php include("user_notification.php"); ?></div> </a></li>
                    <li><a href="logout.php">Logout</a></li>

<?php  }else{ ?>
                   <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="room.php">Rooms</a></li>
                    <li><a href="amenities.php">Service</a></li>
                    <!-- <li><a href="booking.php">Booking</a></li> -->
                    <!-- <li><a href="contact.php">Contact Us</a></li> -->
                    <li><a href="login.php">Login</a></li>
                    <li><a href="registration.php">Registration</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </header>
        <!-- Header Section End -->