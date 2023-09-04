<?php
session_start();
include("db_conn.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Home</title>
</head>


<body>
<nav>

<div class="name">
  <p>FAMOUS WEBSITE</p>
</div>

<ul>
  <li><a href="#">Account</a>
      <ul>
       <li><a href="index.php">Home</a></li>
    <li><a href="signup.php">create new account</a></li>
    <li><a href="login.php">Login</a></li>
   </ul>
  </li>
</ul>
</nav>

<div class="btn">
<a href="signup.php"><button><p>Sign up now to start</p></button></a>
</div>
    
</body>
</html>