<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "foodielicious";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$status = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form values
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Sanitize the form values
  $name = filter_var($name, FILTER_SANITIZE_STRING);
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  $message = filter_var($message, FILTER_SANITIZE_STRING);

  // Validate the form values
  $formErrors = array();

  if (empty($name)) {
    $formErrors[] = 'Name is required';
  }

  if (empty($email)) {
    $formErrors[] = 'Email is required';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $formErrors[] = 'Email is not valid';
  }

  if (empty($message)) {
    $formErrors[] = 'Message is required';
  }

  // If there are no errors, save the form values to the database
  if (empty($formErrors)) {
    $sql = "INSERT INTO Feedback (name, email, message) VALUES ('$name', '$email', '$message')";

    // Execute the query and handle any errors
    if ($conn->query($sql) === TRUE) {
      $status = "<script>alert('New record created successfully');</script>";

    } else {
      $status = "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
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
          <li><a href="Reservation.php">Reservation</a></li>
        
          <li class="active"><a href="Feedback.php">Feedback</a></li>
          <li><a href="Contact.php">Contact</a></li>

          <li><a href="About.html">About</a></li>

        </ul>

      </div>
    </div>
  </nav>
  <div>
      <h1>Send us your feed back</h1>
      <h2>How can we make ourselves better</h2>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" placeholder="Name" name="name"><br>
        <input type="email" placeholder="Email" name="email"><br>
        <textarea id="message" placeholder="Message" required name="message" rows="5" cols="30"></textarea><br>
        <input id='standard-button' type="submit" value="Submit">
      </form>
  </div>

  <div class="free">
    <br>
    </div>
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
</body>