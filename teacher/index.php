<?php include('../inc/config.php'); ?>
<?php
//********************************************** */
session_start();
$Userid  = $_SESSION['id'];
$sql = "SELECT username FROM teacher WHERE id='$Userid'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$Username = $row['username'];
?>

<?php require_once '../inc/header.php' ?>
<div class="sidebar">
    <ul>
        <li>
            <a href="#" class="active"><i class="fa-solid fa-house"></i><span></span>Home</a>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-file-invoice-dollar"></i><span>Paysheet</span></a>
        </li>
        <li>
            <a href="Karyasadanaya1.php"><i class="fa-solid fa-file-lines"></i><span>Karyasadanaya</span></a>
        </li>
        <li>
            <a href="Leave_form.php"><i class="fa-solid fa-file"></i><span>Leave Form</span></a>
        </li>
        <li>
            <a href="#"><i class="fa-brands fa-wpforms"></i><span>Report Issue</span></a>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-eye"></i><span>School Details</span></a>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-calendar-plus"></i><span>Appointments</span></a>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-angles-up"></i><span>Promotions</span></a>
        </li>
        <li>
            <a href="#"><i class="fa-sharp fa-solid fa-file-circle-plus"></i><span>Salary Increment Form</span></a>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-arrows-rotate"></i><span>Transfers</span></a li>
        <li>
            <a href="#"><i class="fa-solid fa-circle-user"></i><span>Profile</span></a>
        </li>
    </ul>
    <div class="logout">
        <hr>
        <a href="../logout.php"><i class="fa-solid fa-sign-out"></i><span>Logout</span></a>
    </div>
</div>
<div class="content">
<?php require_once '../inc/navbar.php' ?>
</div>

<?php require_once '../inc/footer.php' ?>
