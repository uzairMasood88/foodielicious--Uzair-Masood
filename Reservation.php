<?php

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the form data
  $visitor_name = $_POST['visitor_name'];
  $visitor_email = $_POST['visitor_email'];
  $visitor_phone = $_POST['visitor_phone'];
  $total_adults = $_POST['total_adults'];
  $total_children = $_POST['total_children'];
  $checkin_date = $_POST['checkin_date'];
  $checkout_date = $_POST['checkout_date'];
  $special_requests = $_POST['special_requests'];

  // Validate the form data
  if (empty($visitor_name) || empty($visitor_email) || empty($visitor_phone) || empty($total_adults) || empty($checkin_date) || empty($checkout_date)) {
    $error_message = 'Please fill out all required fields.';
  } else {
    // Connect to the database
    $dbc = mysqli_connect('localhost', 'username', 'password', 'database_name');

    // Save the reservation to the database
    $query = "INSERT INTO reservations (visitor_name, visitor_email, visitor_phone, total_adults, total_children, checkin_date, checkout_date, special_requests) VALUES ('$visitor_name', '$visitor_email', '$visitor_phone', '$total_adults', '$total_children', '$checkin_date', '$checkout_date', '$special_requests')";
    mysqli_query($dbc, $query);

    // Close the database connection
    mysqli_close($dbc);

    // Redirect to the reservation confirmation page
    header('Location: reservation_confirmation.php');
    exit;
  }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>FOODIELICIOUS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="Style1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Header Nav-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">FOODIELICIOUS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="Home.html">Home</a></li>
        <li><a href="Menu.html">Menu</a></li>
        <li class="active"><a href="Reservation.html">Reservation</a></li>
        <li><a href="Feedback.html">Feedback</a></li>
        <li><a href="Contact.html">Contact</a></li>
        
        <li><a href="About.html">About</a></li>
      
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="Signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="Login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<form action="reservation.php" method="post">
  <div class="elem-group">
    <label for="name">Your Name</label>
    <input type="text" id="name" name="visitor_name" placeholder="John Doe" pattern=[A-Z\sa-z]{3,20} required>
  </div>
  <div class="elem-group">
    <label for="email">Your E-mail</label>
    <input type="email" id="email" name="visitor_email" placeholder="john.doe@email.com" required>
  </div>
  <div class="elem-group">
    <label for="phone">Your Phone</label>
    <input type="tel" id="phone" name="visitor_phone" placeholder="498-348-3872" pattern=(\d{3})-?\s?(\d{3})-?\s?(\d{4}) required>
  </div>
  <hr>
  <div class="elem-group inlined">
    <label for="adult">Adults</label>
    <input type="number" id="adult" name="total_adults" placeholder="2" min="1" required>
  </div>
  <div class="elem-group inlined">
    <label for="child">Children</label>
    <input type="number" id="child" name="total_children" placeholder="2" min="0" required>
  </div>
  <div class="elem-group inlined">
    <label for="checkin-date">Check-in Date</label>
    <input type="date" id="checkin-date" name="checkin" required>
  </div>
  <div class="elem-group inlined">
    <label for="time">Time</label>
    <input type="time" id="checkin-Time" name="timein" required>
  </div>
  <div class="elem-group">
    <label for="table-selection">Select Table Preference</label>
    <select id="table-selection" name="table_preference" required>
        <option value="">Choose a Table from the List</option>
        <option value="connecting">Connecting 6 people +</option>
        <option value="adjoining">sunset view</option>
        <option value="adjacent">Adjacent 2 people</option>
    </select>
  </div>
  <hr>
  <div class="elem-group">
    <label for="message">Anything Else?</label>
    <textarea id="message" name="visitor_message" placeholder="Tell us anything else that might be important." required></textarea>
  
  </div>
  <div>
    <button type="submit">Book a table</button>
  </div>
  
  <div class="free">
        <br>
  </div>
</form>
<div id="footer">
    <div>
      <h5>Copyright &copy;2023 | <a href="">FOODIELICIOUS</a> 
      </h5>
    </div>
    <div id="top">
      <a href=""><i class="fa fa-chevron-circle-up"></i> </a>
    </div>
  </div>
  <script>
    var currentDateTime = new Date();
var year = currentDateTime.getFullYear();
var month = (currentDateTime.getMonth() + 1);
var date = (currentDateTime.getDate() + 1);

if(date < 10) {
  date = '0' + date;
}
if(month < 10) {
  month = '0' + month;
}

var dateTomorrow = year + "-" + month + "-" + date;
var checkinElem = document.querySelector("#checkin-date");
var checkoutElem = document.querySelector("#checkout-date");

checkinElem.setAttribute("min", dateTomorrow);

checkinElem.onchange = function () {
    checkoutElem.setAttribute("min", this.value);
}
  </script>
</body>