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
          <li><a href="Contact.php">Contact</a></li>
          <li><a href="About.html">About</a></li>
          
        </ul>
        
      </div>
    </div>
  </nav>



  <h1>Restaurant Reservation </h1>
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
  </form>

  <div class="free">
        <br>
  </div>

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