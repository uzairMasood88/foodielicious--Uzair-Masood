<?php

// Connect to the database
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'FOODIELICIOUS';

$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
$pdo = new PDO($dsn, $user, $password);

// Insert data into the database
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

$sql = "INSERT INTO users (firstname, lastname, email) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$firstname, $lastname, $email]);

echo "Record added successfully";

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
        <li><a href="Feedback.html">Feedback</a></li>
        <li class="active"><a href="Contact.html">Contact</a></li>
        
        <li><a href="About.html">About</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="Signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="Login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<div id="contact">
    <h1 id="section">Our Contact</h1>
    <div id="contact_row">
        <div class="contact_col">
            <div>
                <p>
                    <i class="fa fa-map-marker"></i>
                    68 South Street, behind NESCOM,
                     H-11/4 H 11/4 H-11,
                     Islamabad Capital Territory 44000

                </p>
               <p>
                <a href="uzairman1997@gmail.com">
                    <i class="fa fa-envelop"></i>
                    uzairman1997@gmail.com
                </a>
               </p> 
               <p>
                
                <a href="tel:+923485318789">
                <i class="fa fa-phone-square"></i>
               
                    +923485318789

                </a>
               </p>
               <h3>Follow Us</h3>
               <p>
                
               </p>
            </div>
            <div style="text-align:center">
                <h2>Contact Us</h2>
                <p>Swing by for a cup of coffee, or leave us a message:</p>
              </div>
              <div class="row">
                <div class="column">
                  <img src="tmuc.jpg" style="width:100%">
                </div>
                <div class="column">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="firstname" placeholder="Your name..">
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                    <label for="country">Country</label>
                    <select id="country" name="country">
                      <option value="Pakistan">Pakistan</option>
                      <option value="canada">Canada</option>
                      <option value="usa">USA</option>
                    </select>
                    <label for="subject">Subject</label>
                    <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
                    <input type="submit" value="Submit">
                  </form>
                </div>
              </div>
    </div>
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