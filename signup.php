
<?php
//var_dump($_SERVER["REQUEST_METHOD"]);
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$firstname = htmlspecialchars($_POST['fname']);
  $lastname = htmlspecialchars($_POST['lname']);
  $email = htmlspecialchars($_POST['email']);
  $phonenumber = htmlspecialchars($_POST['pnum']);
  $password = htmlspecialchars($_POST['pwd']); 
  $cpassword = htmlspecialchars($_POST['cpwd']);
  $age = htmlspecialchars($_POST['age']);
  $gender = htmlspecialchars($_POST['gender']);
  $country = htmlspecialchars($_POST['country']);

  //connecting to database
    $conn = new mysqli('localhost','root','','Register');
    $stmt = $conn->prepare("insert into form(firstname,lastname,email,phonenumber,password,cpassword,age,gender,country) 
      values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssississ",$firstname,$lastname,$email,$phonenumber,$password,$cpassword,$age,$gender,$country);
    if ($age < 13){
      echo "<script> alert('Sorry,You are not old enough to register')</script>";
      die;
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      
      header("Location:signup.php?error=Enter a valid email");
    }
    if (!preg_match("/^[a-zA-z0-9]*$/",$firstname)){
      $stmt->close();
    $conn->close();
      header("Location:signup.php?error=Enter a valid firstname");
    }
    if(empty($firstname) || empty($lastname)){
      $stmt->close();
    $conn->close();
      header("Location:signup.php?error=All field is required");
 }
 if($password != $cpassword){
  $stmt->close();
    $conn->close();
  header("Location:signup.php?error=Passwords do not match");

}else{
    $stmt->execute();
    echo "<script> alert('Registration successful')</script>";
    header("Location:login.php");
    $stmt->close();
    $conn->close();
}
 
}

?>      
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="signup.css">
    <title>Signup</title>
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
      <li><a href="signup.php">Create new account</a></li>
      <li><a href="logout.php">Logout</a></li>
     </ul>
    </li>
  </ul>
</nav>
<main>
   <form method="post">
  <h1>Signup</h1>
  <?php if (isset($_GET['error'])){ ?>
      <p class="error"><?php echo $_GET['error']?></p>
  <?php } ?>
  <input type="text"  placeholder="Enter your username" name="fname" ><br>
  <input type="text"  placeholder="Enter your lastname" name="lname" ><br>
  <input type="email"  placeholder="Enter your email" name="email" ><br>
  <input type="number"  placeholder="Enter your phonenumber" name="pnum" ><br>
  <input type="number"  placeholder="Enter your age" name="age" ><br>
  <input type="password"  placeholder="Enter your password" name="pwd" ><br>
  <input type="password"  placeholder="Confirm your password" name="cpwd" ><br>
  <input type="country"  placeholder="Enter your country name" name="country" ><br>
  <select name="gender"><br>
    <option name="male">Male</option>
    <option name="female">Female</option>
  </select><br>
  <p class="check">Alredy have an account <a href="login.php"> Login </a> now</p>
  <button type="submit">Submit</button>
   </form>
</main>
</body>
</html>