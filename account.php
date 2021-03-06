<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}

if($_SESSION["user_type"] === "admin") {
  header("location:admin.php");
}

include 'config.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Store</title>
</head>

<body>

<header>
  <nav id="header-nav" class="navbar navbar-expand-lg  navbar-dark bg-black">
    <div class="container">
      <div class="navbar-header">
        <a href="index.php" class="pull-left visible-md visible-lg" alt="logo">
        <div><img src="images/logo.png"></div></a>
          <div class="navbar-brand">
            <a href="index.php"><h1>T-store</h1></a>
          </div>
        </div>
      <!-- <div>
        <h1>T-store</h1></a>
      </div> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
    </div>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tshirts
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="tshirt-men.php">Men</a>
          <a class="dropdown-item" href="tshirt-women.php">Women</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="hoodies.php">Hoodies</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php">Cart</a>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="images/user1.png" height="20px" width="20px">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!--<a class="dropdown-item" href="login.php">Login</a>
          <a class="dropdown-item" href="register.php">Register</a> -->
           <?php

          if(isset($_SESSION['username'])){
            echo '<a class="dropdown-item" href="account.php">My Account</a>';
            echo '<a class="dropdown-item" href="logout.php">Log Out</a>';
          }
          else{
            echo '<a class="dropdown-item" href="login.php">Log In</a>';
            echo '<a class="dropdown-item" href="register.php">Register</a>';
          }
          ?>
      </li>
    </ul>
    </div>
    </div>
</div>
  </nav>
</header>

<section>
	 <form method="post" action="update.php" style="margin-top:30px;">
     <?php

        $result = $mysqli->query('SELECT * FROM users WHERE id='.$_SESSION['id']);

        if($result === FALSE){
          die(mysql_error());
        }

        if($result) {
          $obj = $result->fetch_object();

          echo '<div class="form-row">';
          echo '<div class="form-group col-md-6">';
          echo '<label for="inputEmail4">First Name</label>';
          echo '<input type="text" class="form-control" placeholder="'. $obj->first_name. '" name="fname">';
          echo '</div>';
          echo '<div class="form-group col-md-6">';
          echo '<label for="inputPassword4">Last Name</label>';
           echo '<input type="text" class="form-control" placeholder="'. $obj->last_name. '" name="lname">';
          echo '</div>';
          echo '</div>';


          echo '<div class="form-group">';
          echo '<label for="inputAddress">Address</label>';
          echo '<input type="text" class="form-control" placeholder="'. $obj->address. '" name="address">';
          echo '</div>';

          echo '<div class="form-row">';
          echo '<div class="form-group col-md-6">';
          echo '<label for="inputCity">City</label>';
          echo '<input type="text" class="form-control" name="city" placeholder="'. $obj->city. '">';
          echo '</div>';  
          echo '<div class="form-group col-md-2">';
          echo '<label for="inputZip">Pincode</label>';
          echo '<input type="text" class="form-control" name="pincode" placeholder="'. $obj->pincode. '">';
          echo '</div>';
          echo '</div>';

          echo '<div class="form-row">';
          echo '<div class="form-group col-md-6">';
          echo '<label for="inputEmail4">Email</label>';
          echo '<input type="email" class="form-control" name="email" placeholder="'. $obj->email_id. '">';
          echo '</div>';
    
      }
          
          echo '<div class="form-group col-md-6">';
          echo '<label for="inputPassword4">Password</label>';
          echo '<input type="password" class="form-control" name="password" required>';
          echo '</div>';
          echo '</div>';
            
          echo '<input type="submit" name="submit" class="btn btn-outline-dark" value="Update"></button>';
        ?>
      </form>
</section>

<footer>
  <p style="text-align: center">&copy;T-store Shopping 2020-21</p>
</footer>


<script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- <script src="js/script.js"></script> -->
</body>
</html>