<?php

include 'config.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$pin = $_POST["pincode"];
$email = $_POST["email"];
$pwd = md5($_POST["password"]);


if($mysqli->query("INSERT INTO users (first_name, last_name, address, city, pincode, email_id, password) VALUES('$fname', '$lname', '$address', '$city', $pin, '$email', '$pwd')")){

	echo 'Data inserted';
	echo '<br/>';
}

header ("location:login.php");

?>
