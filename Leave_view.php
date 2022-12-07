<?php
include('config.php');

//********************************************** */
session_start();
$Userid  = $_SESSION['id'];
$sql = "SELECT username FROM teacher WHERE id='$Userid'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$Username = $row['username'];

//********************************************** */
$leave_id = $_GET['leave_id'];
$query_selectLeave = "SELECT * FROM leave_details WHERE userId='$Userid' AND leave_id = (SELECT MAX(leave_id) FROM leave_details WHERE userId='$Userid') OR leave_id = '$leave_id'";
$result_selectLeave = mysqli_query($con,$query_selectLeave);
$row_selectLeave = mysqli_fetch_array($result_selectLeave);
// $leave_id = $row_selectLeave['leave_id'];
$submittedDate = $row_selectLeave['submitted_date'];
$reason = $row_selectLeave['reason'];
$approvement = $row_selectLeave['approvement'];
$commencing_date = $row_selectLeave['commencing_date'];
$resuming_date = $row_selectLeave['resuming_date'];
$casual = $row_selectLeave['casual'];
$medical = $row_selectLeave['medical'];
$other = $row_selectLeave['other'];
$days = $casual + $medical + $other;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Ezymange</title>
</head>

<body>
    <div class="sidebar">
        <ul>
            <li>
                <a href="#"><i class="fa-solid fa-house"></i><span></span>Home</a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-file-invoice-dollar"></i><span>Paysheet</span></a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-file-lines"></i><span>Karyasadanaya</span></a>
            </li>
            <li>
                <a href="#" class="active"><i class="fa-solid fa-file"></i><span>Leave Form</span></a>
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
            <a href="logout.php"><i class="fa-solid fa-sign-out"></i><span>Logout</span></a>
        </div>
    </div>

    <!-- //Navigation bar -->
    <div class="content">
        <div class="navbar">
            <div class="navbar__left">
                <div class="nav-icon" onclick="toggleSidebar()">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="logo">
                    <img src="Ezymanage lgo.png" alt="logo">
                </div>
            </div>
            <div class="navbar__right">
                <ul>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-bell"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-circle-user"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span id="userName"><?php echo $Username ?></span><br>
                            <span id="designation">Teacher</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="left">
                <div class="topic">
                    <h1>LEAVE FORM</h1>
                </div>
                <div class="forum">
                    <span class="forum-topic">Application For Leave</span>
                    <div class="view">
                        <div class="for um_box">
                            <div class="forum_view-top">
                                <div>
                                    <span class="title">Form No :</span>
                                    <span><?php echo $leave_id ?></span>
                                </div>
                                <div>
                                    <span class="title">Submitted date :</span>
                                    <span><?php echo $submittedDate ?></span>
                                </div>
                            </div>
                            <div class="forum_view">
                                <span class="title">Name:</span>
                                <div class="spc"><?php echo $Username ?></div>
                            </div>
                            <div class="forum_view">
                                <span class="title">Designation :</span>
                                <div class="spc">Teacher</div>
                            </div>
                            <!-- <div class="forum_view">
                                <span class="title">Date of First Appointment:</span>
                                <div class="spc"><?php echo $Username ?></div>
                            </div> -->
                            <div class="forum_view">
                                <span class="title">Date of Commencing leave :</span>
                                <div class="spc"><?php echo $commencing_date ?></div>
                            </div>
                            <div class="forum_view">
                                <span class="title">Date of resuming duties :</span>
                                <div class="spc"><?php echo $resuming_date ?></div>
                            </div>
                            <div class="forum_view">
                                <span class="title">Number of days leave appplied for :</span>
                                <div class="spc"><?php echo $days ?></div>
                            </div>
                            <!-- <div class="forum_view">
                                <span class="title">Leaves taken in current year :</span>
                                <div class="spc"><?php echo $Username ?></div>
                            </div> -->
                            <div class="forum_view">
                                <span class="title">Reason for leave :</span>
                                <div class="spc"><?php echo $reason ?></div>
                            </div>
                            <div class="forum_view">
                                <span class="title">Principal's approvement :</span>
                                <div class="spc"><?php echo $approvement ?></div>
                            </div>
                            <div class="forum_view">
                                <a href="Leave_form.php"><button class="submit-btn">Back</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="card">
                    <h3>LATEST APPLICATION STATUS</h3>
                    <table>
                        <tr>
                            <th>Form ID</th>
                            <th>Submitted Date</th>
                            <th>Reason</th>
                            <th>View</th>
                        </tr>
                        <tr>
                            <td colspan="4"><hr></td>
                        </tr>

                    <?php
                    $query_selectLeaves = "SELECT * FROM leave_details WHERE userId='$Userid'";
                    $result_selectLeaves = mysqli_query($con,$query_selectLeaves);
                    $i = $leave_id;
                    while ($row_selectLeaves = mysqli_fetch_array($result_selectLeaves)) { ?>
                        <tr>
                            <td> <?php echo $row_selectLeaves['leave_id']; ?> </td>
                            <td> <?php echo $row_selectLeaves['submitted_date']; ?> </td>
                            <td> <?php echo $row_selectLeaves['reason']; ?> </td>
                            <td> <a href="Leave_view.php?leave_id=<?php echo $row_selectLeaves['leave_id']; ?>">view</a></td>
                        </tr>
                        <tr>
                            <td colspan="4"><hr></td>
                        </tr>
                        <?php $i++;
                    }
                    ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>