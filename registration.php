<?php
session_start();
include('inc/config.php');
$reqErr = $loginErr = $name_err = $user_err = $des_err = $email_err = $pass_err = $con_pass_err ="";
$regDate = date("Y-m-d");
if($_SERVER['REQUEST_METHOD'] == "POST") {
	if(empty($_POST['full_name'])){
		$name_err = "*Plase enter your name";
	}
    if(empty($_POST['user_name'])){
        $user_err = "*Plase enter your user name";
    }
    if(!isset($_POST['designation'])){
        $des_err = "*Plase choose your designation";
    }
    if(empty($_POST['email'])){
        $email_err = "*Plase enter your email";
    }
    if(empty($_POST['password'])){
        $pass_err = "*Plase enter your password";
    }
    if(empty($_POST['confirm_password'])){
        $con_pass_err = "*Plase enter your confirm password";
    }
    if(empty($_POST['password']) && !empty($_POST['confirm_password'])){
        if($_POST['password'] != $_POST['confirm_password']){
            $con_pass_err = $pass_err = "*Password and confirm password does not match";
        }
    }
    if(strlen($_POST['password']) < 8){
        $pass_err = "*Password must be at least 8 characters";
    }
    // Given password
    $password = $_POST['password'];

    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars) {
        $pass_err = 'Password should include at least one upper case letter, one number, and one special character.';
    }else{
        // echo 'Strong password.';
    }

    if(empty($name_err) && empty($user_err) && empty($des_err) && empty($email_err) && empty($pass_err) && empty($con_pass_err)){
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];
        $designation = $_POST['designation'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashed = md5($password);

        $sql = "SELECT * FROM users WHERE username = '$user_name'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
        if($row) {
            $user_err = "* Username already exists.";
        }
        else{
            $sql = "INSERT INTO users (full_name, username, designation, email, password, reg_date) VALUES ('$full_name', '$user_name', '$designation', '$email', '$hashed', '$regDate')";
            $result = mysqli_query($con,$sql);
            if($result){
                echo "<script> alert(\"Registration Successful!\"); </script>";
                header('Location:index.php');
            }
            else{
                $reqErr = "*Something went wrong";
            }
        }

        // if($designation == 'Teacher'){
        //     $sql = "SELECT * FROM teacher WHERE username = '$user_name'";
        //     $result = mysqli_query($con,$sql);
        //     $row = mysqli_fetch_array($result);
        //     if($row) {
        //         $user_err = "* Username already exists.";
        //     }
        //     else{
        //         $sql = "INSERT INTO teacher (full_name, username, email, password) VALUES ('$full_name', '$user_name', '$email', '$hashed')";
        //         $result = mysqli_query($con,$sql);
        //         if($result){
        //             echo "<script> alert(\"Registration Successful!\"); </script>";
        //             header('Location:index.php');
        //         }
        //         else{
        //             $reqErr = "*Something went wrong";
        //         }
        //     }
        // }
        // else if($designation == 'Principal'){
        //     $sql = "SELECT * FROM pricipal WHERE username = '$user_name'";
        //     $result = mysqli_query($con,$sql);
        //     $row = mysqli_fetch_array($result);
        //     if($row) {
        //         $user_err = "* Username already exists.";
        //     }
        //     else{
        //         $sql = "INSERT INTO principal (full_name, username, email, password) VALUES ('$full_name', '$user_name', '$email', '$hashed')";
        //         $result = mysqli_query($con,$sql);
        //         if($result){
        //             echo "<script> alert(\"Registration Successful!\"); </script>";
        //             header('Location:index.php');
        //         }
        //         else{
        //             $reqErr = "*Something went wrong";
        //         }
        //     }
        // }
        // else if($designation == 'Director'){
        //     $sql = "INSERT INTO director (full_name, username, email, password) VALUES ('$full_name', '$user_name', '$email', '$hashed')";
        //     $result = mysqli_query($con,$sql);
        //     if($result){
        //         header('Location:login.php');
        //     }
        //     else{
        //         $reqErr = "*Something went wrong";
        //     }
        // }
        // else if($designation == 'Clerk - School'){
        //     $sql = "INSERT INTO clerk_school (full_name, username, email, password) VALUES ('$full_name', '$user_name', '$email', '$hashed')";
        //     $result = mysqli_query($con,$sql);
        //     if($result){
        //         header('Location:login.php');
        //     }
        //     else{
        //         $reqErr = "*Something went wrong";
        //     }
        // }
        // else if($designation == 'Clerk - College'){
        //     $sql = "INSERT INTO clerk_college (full_name, username, email, password) VALUES ('$full_name', '$user_name', '$email', '$hashed')";
        //     $result = mysqli_query($con,$sql);
        //     if($result){
        //         header('Location:login.php');
        //     }
        //     else{
        //         $reqErr = "Something went wrong";
        //     }
        // }

    }
    else{
        $reqErr = "Please fill out all the fields";
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
        <div class="container">
            <h2>Create An Account</h2>
            <p>Please fill out this form to register with Ezymanage</p>
            <form action="" method="POST">
                <div class="input-group">
                    <lable for="fullname">Full Name : <sup>*</sup></lable>
                    <span class="error"><?php echo $name_err; ?></span>
                    <input type="text" name="full_name" class="inpt" placeholder="Full Name">
                </div>
                <div class="input-group">
                    <lable for="user_name">User Name : <sup>*</sup></lable>
                    <span class="error"><?php echo $user_err; ?></span>
                    <input type="text" name="user_name" class="inpt" placeholder="User Name">
                </div>
                <div class="input-group">
                    <lable for="Designation">Designation : <sup>*</sup></lable>
                    <span class="error"><?php echo $des_err; ?></span>
                    <select id="designation" name="designation">
						<option value="Teacher">Teacher</option>
						<option value="Principal">Principal</option>
					</select>
                </div>
                <div class="input-group">
                    <lable for="email">Email : <sup>*</sup></lable>
                    <span class="error"><?php echo $email_err; ?></span>
                    <input type="email" name="email" class="inpt" placeholder="abc@gmail.com">
                </div>
                <div class="input-group">
                    <lable for="password">Password : <sup>*</sup></lable>
                    <span class="error"><?php echo $pass_err; ?></span>
                    <input type="password" name="password" class="inpt" id="id_password" placeholder="********">
                    <i class="fa-solid fa-eye" id="togglePassword"></i>
                </div>
                <div class="input-group">
                    <lable for="confirm password">Confirm Passsword : <sup>*</sup></lable>
                    <span class="error"><?php echo $con_pass_err; ?></span>
                    <input type="password" name="confirm_password" class="inpt" id="id_password" placeholder="********">
                    <i class="fa-solid fa-eye" id="togglePassword"></i>
                </div>
                <div class="input-group">
                    <span class="error"><?php echo $reqErr; ?></span>
                </div>
                <div class="reg-btn">
                    <input type="submit" value="Register">
                </div>
            </form>
            <span class="lgmsg">Already have an account? <a href="index.php"><strong>Login</strong></a></span>
        </div>
    </div>
    <div class="right">
        <img src="images/Sign_up.svg" alt="">
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
<?php require_once 'inc/footer.php'; ?>