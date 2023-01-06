<?php

// Connect to the database
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "reservations";

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$number_of_guests = $_POST['number'];
$date = $_POST['date'];
$time = $_POST['time'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Connect to the database
$conn = mysqli_connect('localhost', 'username', 'password', 'database');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert the reservation into the reservations table
$sql = "INSERT INTO reservations (name, email, number_of_guests, date, time, phone, message)
VALUES ('$name', '$email', '$number_of_guests', '$date', '$time', '$phone', '$message')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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



  <h1>Restaurant Reservation Form</h1>
  <form action="process_reservation.php" method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"><br>
    <label for="number">Number of guests:</label><br>
    <input type="number" id="number" name="number"><br>
    <label for="date">Date:</label><br>
    <input type="date" id="date" name="date"><br>
    <label for="time">Time:</label><br>
    <input type="time" id="time" name="time"><br>
    <label for="phone">Phone:</label><br>
    <input type="text" id="phone" name="phone"><br>
    <label for="message">Message:</label><br>
    <textarea id="message" name="message" rows="5" cols="50"></textarea><br>
    <input type="submit" value="Submit">
    <button><a>Submit</a></button>
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

</html>
<script>
  var currentDateTime = new Date();
  var year = currentDateTime.getFullYear();
  var month = (currentDateTime.getMonth() + 1);
  var date = (currentDateTime.getDate() + 1);

  if (date < 10) {
    date = '0' + date;
  }
  if (month < 10) {
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