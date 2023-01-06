<?php
// Connect to the database
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "foodielicious";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $visitor_name = mysqli_real_escape_string($conn, $_POST["visitor_name"]);
  $visitor_email = mysqli_real_escape_string($conn, $_POST["visitor_email"]);
  $visitor_phone = mysqli_real_escape_string($conn, $_POST["visitor_phone"]);
  $total_adults = mysqli_real_escape_string($conn, $_POST["total_adults"]);
  $total_children = mysqli_real_escape_string($conn, $_POST["total_children"]);
  $checkin = mysqli_real_escape_string($conn, $_POST["checkin"]);
  $checkout = mysqli_real_escape_string($conn, $_POST["checkout"]);
  $special_request = mysqli_real_escape_string($conn, $_POST["special_request"]);

  // Insert the reservation into the database
  $sql = "INSERT INTO reservations (visitor_name, visitor_email, visitor_phone, total_adults, total_children, checkin, checkout, special_request) VALUES ('$visitor_name', '$visitor_email', '$visitor_phone', '$total_adults', '$total_children', '$checkin', '$checkout', '$special_request')";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    // Redirect to a confirmation page
    header("Location: reservation_confirmation.html");
    exit;
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);
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
        <li><a href="Contact.html">Contact</a></li>
        <li><a href="Feedback.html">Feedback</a></li>
        <li class="active"><a href="Reservation.html">Reservation</a></li>
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
    <label for="checkout-date">Check-out Date</label>
    <input type="date" id="checkout-date" name="checkout" required>
  </div>
  <div class="elem-group">
    <label for="room-selection">Select Room Preference</label>
    <select id="room-selection" name="room_preference" required>
        <option value="">Choose a Room from the List</option>
        <option value="connecting">Connecting</option>
        <option value="adjoining">Adjoining</option>
        <option value="adjacent">Adjacent</option>
    </select>
  </div>
  <hr>
  <div class="elem-group">
    <label for="message">Anything Else?</label>
    <textarea id="message" name="visitor_message" placeholder="Tell us anything else that might be important." required></textarea>
  </div>
  <button type="submit">Book a table</button>
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