<?php
session_start();
include "db_conn.php";
//var_dump($_SERVER["REQUEST_METHOD"]);
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $email = htmlspecialchars($_POST['email']); 
  $password = htmlspecialchars($_POST['password']); 

  
    $stmt = $conn->prepare("select * from form where password = ? and email = ?");
    $stmt->bind_param("ss",$password,$email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0){
      $data = $result->fetch_assoc();
      if ($data['password'] == $password && $data['email'] == $email){
        $_SESSION['firstname'] = $data['firstname'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['email'] = $data['email'];
        echo "<script>alert('Login successful')</script>";
        header("Location:loginview.php");
        }
    else{
      header("Location:login.php?error=Wrong name,password or email");
    }
    
    if (empty($password)){
      header("Location:login.php?error=password is required");
  }
  if (empty($email)){
    header("Location:login.php?error=email is required");
}

}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="login.css">
	<title>login</title>
</head>

<body>
<nav>

  <div class="name">
    <button>Famous</button>
  </div>
<div class="menu">
  <ul>
    <li><a href="#">Account</a>
        <ul>
         <li><a href="index.php"><img src="Add user.ico">Home</a></li>
      <li><a href="signup.php"><img src="Add user.ico">Create new account</a></li>
      <li><a href="logout.php"><img src="Add user.ico">Logout</a></li>
     </ul>
    </li>
  </ul>
</div>
</nav>
   <form action = "login.php" method="post">
  <h1>Login</h1>
  <?php if (isset($_GET['error'])){ ?>
      <p class="error"><?php echo $_GET['error']?></p>
  <?php } ?>
  <input type="email"  placeholder="Enter your email" name="email" id="email"><br>
  <input type="password" placeholder="Enter your password" name="password" id="password"><br>
      <p>Don't have an account<a href = "signup.php">Signup now</a>Now</p>
  <button type="submit">Submit</button>
   </form>
</body>
</html>