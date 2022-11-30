<?php
session_start();
include('config.php');
$reqErr = $loginErr = "";
if($_SERVER['REQUEST_METHOD'] == "POST") {
	if(!empty($_POST['Username']) && !empty($_POST['Password'])){
		$username = $_POST['Username'];
		$password = $_POST['Password'];

		$sql = "SELECT id,username,password FROM teacher WHERE username='$username' AND password='$password'";
		$result = mysqli_query($con,$sql);
				$row = mysqli_fetch_array($result);
					if($row) {
						$_SESSION['id'] =  $row['id'];
						$_SESSION['username'] = $_POST['Username'];
						$_SESSION['password'] = $_POST['Password'];
						header('Location:Leave_form.php');
					}
					else {
						$loginErr = "* Username or Password is incorrect.";
					}
	}	
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Ezymange</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700;900&family=Ubuntu&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a87d6dd22b.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<ul>
		<li class="image">
			<img class="loginPageImg" src="images/loginpage.png">
		</li>
	<li class="login">	
	<img class="logo" src="images/logo.png">
	<h1>Sign in to Ezymanage</h1>
	<p>New User? <a href="Registration/Registration.php">Sign Up</a> now</p>
	<br>
	<form method="POST" action="">
  	<!--<?php include('errors.php'); ?>-->
  	<div class="input-group">
  		<input type="text" name="Username" placeholder="Username" >
  	</div>
  	<div class="input-group">
  		<input type="password" name="Password" placeholder="Password" id="id_password">
		  <i class="fa-solid fa-eye" id="togglePassword"></i>
  	</div>
  	<div class="input-group">
  		<button type="submit" name="login_user" class="loginbtn">Sign In</button>
  	</div>
	<div class="input-group">
		<?php echo $loginErr; echo $reqErr; ?>
	</div>  
</li>
</ul>
<script>
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');
 
  togglePassword.addEventListener('click', function (e) {

    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
 
    this.classList.toggle('fa-eye-slash');
});

</script>

</body>
</html>