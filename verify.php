<?php

if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$username = $_POST["email"];
$pwd = md5($_POST["password"]);
$flag = 'true';

$result = $mysqli->query('SELECT id,email_id,password,first_name, user_type from users order by id asc');

if($result === FALSE){
  die(mysqli_error($mysqli));
}

if($result){
  while($obj = $result->fetch_object()){
    if($obj->email_id === $username && $obj->password === $pwd) {

      $_SESSION['username'] = $username;
      $_SESSION['user_type'] = $obj->user_type;
      $_SESSION['id'] = $obj->id;
      $_SESSION['first_name'] = $obj->first_name;
      header("location:index.php");
    } else {

        if($flag === 'true'){
          redirect();
          $flag = 'false';
        }
    }
  }
}

function redirect() {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}


?>