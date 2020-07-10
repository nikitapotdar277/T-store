<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$product_id = $_GET['id'];
$action = $_GET['action'];


if($action === 'empty')
  unset($_SESSION['cart']);

$result = $mysqli->query("SELECT qty FROM products WHERE id = ".$product_id);


if($result){

  if($obj = $result->fetch_object()) {

      if($action === "add") {
      $new_qty = $_POST['newqty'];
      echo $new_qty;
      if($_SESSION['cart'][$product_id]+1 <= $obj->qty)
         $_SESSION['cart'][$product_id]++;

      if($obj->qty-$new_qty >= 0){
      $result = $mysqli->query('UPDATE products SET qty = qty-$new_qty WHERE id = '.$product_id);
      }
      else {
        $result = $mysqli->query('UPDATE products SET qty = 0 WHERE id = '.$product_id);
      }

    }
   }
 }

header("location: cart.php");
 ?>
