<?php include('../inc/config.php'); 

//********************************************** */
session_start();
?>
<?php
 if(empty($_SESSION['id'])){
    header('Location:../index.php');;
 }else {
?>
<?php
$Userid  = $_SESSION['id'];
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
            <a href="Karyasadanaya.php"><i class="fa-solid fa-file-lines"></i><span>Karyasadanaya</span></a>
        </li>
        <li>
            <a href="Leave_form.php"><i class="fa-solid fa-file"></i><span>Leave Form</span></a>
        </li>
        <li>
            <a href="issue-p.php"><i class="fa-brands fa-wpforms"></i><span>Report Issue</span></a>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-eye"></i><span>View</span></a>
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
            <a href="#"><i class="fa-solid fa-arrows-rotate"></i><span>Transfers</span></a>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-building"></i><span>Projects</span></a>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-chalkboard-user"></i><span>Teacher Management</span></a>
        </li>
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
    <div class="container">
        <div class="left">
            <!-- <div class="topic">
                <h1>Hey <?php echo $Username; ?>,<br>Welcome to Ezymanage System</h1>
            </div> -->
            <div class="forum">
                <img src="../images/logo.png" alt="">
                <h1>Hey<?php echo " " . $Username; ?>,<br>Welcome to Ezymanage!</h1>
            </div>
            <div class="forum">
                <div class="dtl">
                    <h3>Number of days remaining in current school</h3>
                    <div class="dtl-k">
                        <div class="left">
                            <div class="dtls-card">
                                <span class="num">04</span>
                                <span>Years</span>
                            </div>
                            <div  class="dtls-card">
                                <span class="num">10</span>
                                <span>Months</span>
                            </div>
                            <div class="dtls-card">
                                <span class="num">22</span>
                                <span>Days</span>
                            </div>
                        </div>
                        <div class="right">
                            <img src="../images/Calendar.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="right">
            <div class="card">
                <div class="month">
                    <i class="fas fa-angle-left prev"></i>
                    <div class="date">
                        <h1>Calender</h1>
                        <span></span>
                    </div>
                    <i class="fas fa-angle-right next"></i>
                </div>
                <div class="weekdays">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                </div>
                <div class="days"></div>
            </div>
            <div class="card">
                <h3>Remaining Leave Details</h3>
                <div class="details">
                    <div class="details-card">
                        <span>Casual Leave</span>
                        <span class="num">42</span>
                    </div>
                    <div class="details-card">
                        <span>Medical Leave</span>
                        <span class="num">42</span>
                    </div>
                    <div class="details-card">
                        <span>Other Leave</span>
                        <span class="num">42</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once '../inc/footer.php' ?>
<?php } ?>