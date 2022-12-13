<?php
session_start();
include('inc/config.php');
$reqErr = $loginErr = "";
if($_SERVER['REQUEST_METHOD'] == "POST") {
	if(!empty($_POST['Username']) && !empty($_POST['Password']) && !empty($_POST['designation'])) {
		$username = $_POST['Username'];
		$password = $_POST['Password'];
        $designation = $_POST['designation'];
		$hashed_password = md5($password);
        //Teacher
        if($designation == "Teacher"){
            $sql = "SELECT * FROM teacher WHERE username='$username' AND password='$hashed_password'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            if($row) {
                $_SESSION['id'] =  $row['id'];
                $_SESSION['username'] = $_POST['Username'];
                $_SESSION['password'] = $hashed_password;
                header('Location:teacher');
            }
            else {
                $loginErr = "* Username or Password is incorrect.";
            }
        }

        //Principal
        else if($designation == "Principal"){
            $sql = "SELECT * FROM principal WHERE username='$username' AND password='$hashed_password'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            if($row) {
                $_SESSION['id'] =  $row['id'];
                $_SESSION['username'] = $_POST['Username'];
                $_SESSION['password'] = $hashed_password;
                header('Location:teacher');
            }
            else {
                $loginErr = "* Username or Password is incorrect.";
            }
        }

        //Director
        else if($designation == "Director"){
            $sql = "SELECT * FROM director WHERE username='$username' AND password='$hashed_password'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            if($row) {
                $_SESSION['id'] =  $row['id'];
                $_SESSION['username'] = $_POST['Username'];
                $_SESSION['password'] = $hashed_password;
                header('Location:teacher');
            }
            else {
                $loginErr = "* Username or Password is incorrect.";
            }
        }

        //School Clerk
        else if($designation == "Clerk - School"){
            $sql = "SELECT * FROM school_clerk WHERE username='$username' AND password='$hashed_password'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            if($row) {
                $_SESSION['id'] =  $row['id'];
                $_SESSION['username'] = $_POST['Username'];
                $_SESSION['password'] = $hashed_password;
                header('Location:teacher');
            }
            else {
                $loginErr = "* Username or Password is incorrect.";
            }
        }

        //Transfer Clerk
        else if($designation == "Clerk - Transfer"){
            $sql = "SELECT * FROM transfer_clerk WHERE username='$username' AND password='$hashed_password'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            if($row) {
                $_SESSION['id'] =  $row['id'];
                $_SESSION['username'] = $_POST['Username'];
                $_SESSION['password'] = $hashed_password;
                header('Location:teacher');
            }
            else {
                $loginErr = "* Username or Password is incorrect.";
            }
        }
        
        //Salary Clerk
        else if($designation == "Clerk - Salary"){
            $sql = "SELECT * FROM salary_clerk WHERE username='$username' AND password='$hashed_password'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            if($row) {
                $_SESSION['id'] =  $row['id'];
                $_SESSION['username'] = $_POST['Username'];
                $_SESSION['password'] = $hashed_password;
                header('Location:teacher');
            }
            else {
                $loginErr = "* Username or Password is incorrect.";
            }
        }

        //Admin Clerk
        else if($designation == "Clerk - Admin"){
            $sql = "SELECT * FROM admin_clerk WHERE username='$username' AND password='$hashed_password'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result);
            if($row) {
                $_SESSION['id'] =  $row['id'];
                $_SESSION['username'] = $_POST['Username'];
                $_SESSION['password'] = $hashed_password;
                header('Location:teacher');
            }
            else {
                $loginErr = "* Username or Password is incorrect.";
            }
        }

		// $sql = "SELECT id,username,password FROM teacher WHERE username='$username' AND password='$hashed_password'";
		// $result = mysqli_query($con,$sql);
        // $row = mysqli_fetch_array($result);
        // if($row) {
        //     $_SESSION['id'] =  $row['id'];
        //     $_SESSION['username'] = $_POST['Username'];
        //     $_SESSION['password'] = $hashed_password;
        //     header('Location:teacher');
        // }
        // else {
        //     $loginErr = "* Username or Password is incorrect.";
        // }
	}
    else {
        $loginErr = "* All fields are required.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Ezymange</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700;900&family=Ubuntu&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a87d6dd22b.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;700;900&family=Ubuntu&display=swap" rel="stylesheet">
</head>
<body>
<div class="frm">
	<div class="left">
        <img src="images/loginpage.svg" alt="">
    </div>
    <div class="right">
        <div class="container">
            <h2>Login to Ezymanage</h2>
            <p>New User? <a href="registration.php"><strong>Sign Up</strong></a> now</p>
            <form action="" method="POST">
                <div class="input-group">
                    <lable for="fullname">User Name : <sup>*</sup></lable>
                    <input type="text" name="Username" placeholder="Username" required>
                    <span class="err"></span>
                </div>
                <div class="input-group">
                    <lable for="fullname">Password : <sup>*</sup></lable>
                    <input type="password" name="Password" placeholder="Password" id="id_password" required>
                    <span class="err"></span>
                </div>
				<div class="input-group">
                    <lable for="fullname">Designation : <sup>*</sup></lable>
                    <select id="designation" name="designation">
						<option value="Teacher">Teacher</option>
						<option value="Principal">Principal</option>
						<option value="Director">Director</option>
						<option value="Clark - School">Clark - School</option>
						<option value="Clerk - Transfer Dep.">Clerk - Transfer Dep.</option>
						<option value="Clerk - Salary Dep.">Clerk - Salary Dep.</option>
						<option value="Clerk - Admin">Clerk - Admin</option>
					</select>
                    <span class="error"><?php echo $loginErr ?></span>
                </div>
                <div class="reg-btn">
                    <input type="submit" value="Login" class="loginbtn">
                </div>
            </form>
        </div>
    </div>
</div>


<script>
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');
 
  togglePassword.addEventListener('click', function (e) {

    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
 
    this.classList.toggle('fa-eye-slash');
});

</script>
<? require_once 'inc/footer.php'; ?>