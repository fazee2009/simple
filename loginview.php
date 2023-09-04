<?php
session_start();
include("db_conn.php");

if (isset($_SESSION['firstname']) && isset($_SESSION['email'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginview.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <title>Home</title>
</head>
  
<body>
<nav>

<div class="name">
  <p>FAMOUS WEBSITE</p>
</div>

<ul>
  <li><a href="#"><img src="User.ico"><?php echo $_SESSION['firstname'];?></a>
      <ul>
       <li><a href="#"><img src="Home.ico"></div>Home</a></li>
    <li><a href="#"><img src="Search2.ico"></div>view services</a></li>
    <li><a href="logout.php"><img src="80.png"></div>Logout</a></li>
   </ul>
  </li>
</ul>
</nav>


<aside>
<img src='User.ico'>
<h2>main</h2>
  <button><h1>signup</h1></button>
</aside>



<div class="content">
  <div class="bg"></div>
  <a href="#"><img src='User.ico'></a>
  <h1><?php echo $_SESSION['firstname'];?></h1>
  <h3><?php echo $_SESSION['email'];?>|</h3>
  <hr>

</div><br>
<div class="container">
<div class="bgg"><input type="file"></div>
<h1><?php echo $_SESSION['email'];?></h1>
</div>
</body>
</html>
<?php
}else{
 header("location:signup.php");
}
?>