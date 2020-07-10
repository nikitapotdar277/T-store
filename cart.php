<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

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
    <div class="container" style="align-content: center; align-items: center; align-self: center; text-align: center;">
      <div class="large-12">
<?php

          echo '<p><h3>Your Cart</h3></p>';

          if(isset($_SESSION['cart'])) {

            $total = 0;
            echo '<table>';
            echo '<tr>';
            echo '<th>Product</th>';
            echo '<th>Code</th>';
            echo '<th>Name</th>';
            echo '<th>Quantity</th>';
            echo '<th>Cost</th>';
            echo '</tr>';
            foreach($_SESSION['cart'] as $product_id => $newqty) {


            $result = $mysqli->query("SELECT product_code, product_name, img_name, description, qty, price FROM products WHERE id = ".$product_id);


            if($result){
              while($obj = $result->fetch_object()) {
                $price= $obj->price;
                $cost = $obj->price * $newqty; 
                echo '<tr>';
                echo '<td>';
                echo '<img src = "images/'.$obj->img_name.'"/ width="100 px" height="150 px">';
                echo '</td>';
                echo '<td>'.$obj->product_code.'</td>';
                echo '<td>'.$obj->product_name.'</td>';
                echo '<td>
                <form method="post" action="cart.php?id='.$product_id.'">
                <select name="quantity" id="quantity">';    
                echo '<option>'.$newqty.'</option>'; 
                for($i=1; $i<=$obj->qty; $i++) {
                  echo '<option>'.$i.'</option>';
                 
                }
                echo '</select>';
                echo '<input class="btn btn-outline-dark" type="submit" value="update" name="submit" onclick="history.go(-1);"></input>';
                echo '</form>';

                if (isset($_POST['submit'])) {
                  if ($_GET['id'] == $product_id){
                    $newqty=$_POST['quantity'];
                     $_SESSION['cart'][$product_id] = $newqty;
                
                    $cost = $obj->price * $newqty; 
                }
              }
                echo '<td>'.$cost.'</td>';

                $total = $total + $cost;

                echo '</tr>';
              }
            }
          }
          echo '</table>';
          echo '<br>';

          echo '<table>';

          echo '<tr>';
          echo '<th align="right">Total</th>';
                // $total = $total + $cost;
          echo '<td>'.$total.'</td>';
          echo '</tr>';

          echo '<tr>';
          echo '<td colspan="4" align="right"><a href="update-cart.php?action=empty" class="btn btn-outline-dark">Empty Cart</a>&nbsp;<a href="index.php" class="btn btn-outline-dark">Continue Shopping</a>';
          if(isset($_SESSION['username'])) {
              echo '<form method="post">';
              echo '<button type="submit" name="submit1" class="btn btn-outline-dark" >Checkout</button>';
              echo '</form>';

            if(isset($_POST['submit1'])) {

            foreach ($_SESSION['cart'] as $product_id => $newqty) {

           if($_SESSION['cart'][$product_id] - $newqty >= 0){
              $result = $mysqli->query('UPDATE products SET qty = qty-'.$newqty.' WHERE id = '.$product_id);

            }
          else {
              $result = $mysqli->query('UPDATE products SET qty = 0 WHERE id = '.$product_id);
              if ($result) {
              }
          }
        }

          echo '</td>';

          echo '</tr>';
          echo '</table>';

          // header("location:success.php");
          if (!headers_sent())
          {    
            header('Location: success.php');
            exit;
          }
          
          else
          {  
              echo '<script type="text/javascript">';
              echo 'window.location.href="success.php";';
              echo '</script>';
              exit;
          }

      }
    }


          else {
            echo '<a href="login.php"><button class="btn btn-outline-dark">Login</button></a>';

          echo '</td>';

          echo '</tr>';
          echo '</table>';
        }
        }

        else {
          echo "You have no items in your shopping cart.";
        }

          echo '</div>';
          echo '</div>';

          ?>
</section>

<footer>
  <p style="text-align: center">&copy;T-store Shopping 2020-21</p>
</footer>

<!-- <script type="text/javascript">
  $(document).ready(function() {
    $('newqty.select').on('change',function() {
      var newqty = $(this).val();
      // alert(newqty);
        $.ajax({
        type: "POST",
        url: "update-cart.php?action=add&id=", +product_id,
        data: {newqty: newqty},
        }
      })
    });
</script> -->
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <!-- <script src="js/script.js"></script> -->
</body>
</html>

<!-- <a href="update-cart.php?action=add&id='.$product_id.'"> -->