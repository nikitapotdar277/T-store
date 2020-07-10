<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
?>

<!DOCTYPE html>
<html class="no-js">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/foundation.css" />
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
    
<!--    <div class="container">
      <div class="small-12"> -->
     <?php
    //   $i = 0;
    //   $product_id = array();
    //   $product_qty = array();

    //   $result = $mysqli->query('SELECT * from products WHERE category like "men"');

    //   if ($result === FALSE) {
    //     die(mysqli_error($mysqli));
    //   }

    //   else {

    //     while ($obj = $result->fetch_object()) {
    //       echo '<p>';
    //       echo '<div>';
    //       echo '<img src="images/'.$obj->img_name.'"/>';
    //       echo '</div>';
    //       echo '<div>';
    //       echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
    //       echo '<p>'.$obj->description.'</p>';
    //       echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';
    //       echo '<p><a href="add.php?action=add&id='.$obj->id.'"><input type="submit" class="btn btn-primary" value="Add to Cart" style="clear: both; padding: 10px;"/></p></a>';
    //       echo '</p>';
        
    //     $i++;
    //   }
    // }

    // echo '</div>';
    // echo '</div>';
    ?> 




    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();

          $result = $mysqli->query('SELECT * FROM products WHERE category like "men"');
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {

              echo '<div class=" large-4 col-lg-4 col-md-6">';
              echo '<img src="images/'.$obj->img_name.'"/height="300 px" width="250" text-align="center">';
              echo '<p style="text-align:center;"><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              echo '<p style="text-align:center;"><strong>Description</strong>: '.$obj->description.'</p>';
              echo '<p style="text-align:center;"><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';



              if($obj->qty > 0){
                echo '<p style="text-align:center;"><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;


          echo '</div>';
          echo '</div>';
          ?>
</div>
</div>


<footer>
  <p style="text-align: center">&copy;T-store Shopping 2020-21</p>
</footer>


<script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- <script src="js/script.js"></script> -->
</body>
</html>