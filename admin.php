<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])){

        header("location:index.php");
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
        <a href="index.html" class="pull-left visible-md visible-lg" alt="logo">
        <div><img src="images/logo.png"></div></a>
          <div class="navbar-brand">
            <a href="index.html"><h1>T-store</h1></a>
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

<div class="row" style="margin-top:10px;">
      <div class="large-12">
        <h3 align="center">Hey Admin!</h3>
        <?php
          $result = $mysqli->query("SELECT * from products order by id asc");
          if($result) {
            while($obj = $result->fetch_object()) {
              echo '<div class="divh col-lg-4 col-md-6">';
              echo '<img src="images/'.$obj->img_name.'"/>';
              echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Description</strong>: '.$obj->description.'</p>';
              echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              echo '<div class="large-6 columns" style="padding-left:0;">';
              echo '<form method="post" name="update-quantity" action="admin-update.php">';
              echo '<p><strong>New Qty</strong>:</p>';
              echo '</div>';
              echo '<div class="large-6 columns">';
              echo '<input type="number" name="quantity[]"/>';

              echo '</div>';
              echo '</div>';
            }
          }
        ?>

      </div>
    </div>

        <p align="center"><input style="clear:both;" type="submit" class="button" value="Update"></p>
        </form>
      

  <footer>
  <p style="text-align: center">&copy;T-store Shopping 2020-21</p>
</footer>


<script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- <script src="js/script.js"></script> -->
</body>
</html>
