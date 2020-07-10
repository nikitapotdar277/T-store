<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$pin = $_POST["pincode"];
$email = $_POST["email"];
$pwd = md5($_POST["password"]);

$result = $mysqli->query('SELECT * from users WHERE id='.$_SESSION['id']);
$obj = $result->fetch_object();

echo $_SESSION['id'];

if ($_POST['submit']) {

    if ($pwd === $obj->password) {



          if($fname!=""){
          $result = $mysqli->query('UPDATE users SET first_name ="'. $fname .'" WHERE id ='.$_SESSION['id']);
          if($result){
          }
          }

          if($lname!=""){
          $result = $mysqli->query('UPDATE users SET last_name ="'. $lname .'" WHERE id ='.$_SESSION['id']);
          if($result){
          }
          }

          if($address!=""){
          $result = $mysqli->query('UPDATE users SET address ="'. $address .'" WHERE id ='.$_SESSION['id']);
          if($result){
          }
          }

          if($city!=""){
          $result = $mysqli->query('UPDATE users SET city ="'. $city .'" WHERE id ='.$_SESSION['id']);
          if($result){
          }
          }

          if($pin!=""){
          $result = $mysqli->query('UPDATE users SET pincode ="'. $pin .'" WHERE id ='.$_SESSION['id']);
          if($result){
            }
          }

          if($email!=""){
            $result = $mysqli->query('UPDATE users SET email_id ="'. $email .'" WHERE id ='.$_SESSION['id']);
            if($result) {
            }

          }
    header("location:success.php");
}

  else
    header("location:failed.php");
}

?>
