<?php
include('../inc/config.php');
session_start();
?>
<?php
 if(empty($_SESSION['id'])){
    header('Location:../index.php');;
 }else {
?>
<?php
$Userid  = $_SESSION['id'];
$reqErr = $issueErr = $iss_catErr = "";

/********************************************** */

$id = $_GET['id'];
$query_selectLeave = "SELECT * FROM users INNER JOIN issues ON issues.user_id = users.id WHERE issues.user_id='$Userid' AND issues.id = '$id'";
$result_selectLeave = mysqli_query($con,$query_selectLeave);
$row_selectLeave = mysqli_fetch_array($result_selectLeave);
    $id = $row_selectLeave['id'];
    $Userid = $row_selectLeave['user_id'];
    $name = $row_selectLeave['full_name'];
    $submittedDate = $row_selectLeave['submitted_date'];
    $designation = $row_selectLeave["designation"];
    $iss_type = $row_selectLeave['issue_type'];
    $iss_cat = $row_selectLeave['issue_cat'];
    $issue = $row_selectLeave['issue'];
?>

<?php require_once '../inc/header.php'; ?>
<div class="sidebar">
    <ul>
        <li>
            <a href="index.php"><i class="fa-solid fa-house"></i><span></span>Home</a>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-file-invoice-dollar"></i><span>Paysheet</span></a>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-file-lines"></i><span>Karyasadanaya</span></a>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-file"></i><span>Leave Form</span></a>
        </li>
        <li>
            <a href="issue-p.php" class="active"><i class="fa-brands fa-wpforms"></i><span>Report Issue</span></a>
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

    <!-- //Navigation bar -->
    <div class="content">
    <?php require_once '../inc/navbar.php'; ?>
        <div class="container">
            <div class="left">
                <div class="topic">
                    <h1>REPORT ISSUES</h1>
                </div>
                <div class="forum">
                    <span class="forum-topic">Application For Leave</span>
                    <div class="view">
                        <div class="for um_box">
                            <div class="forum_view-top">
                                <div>
                                    <span class="title">Form No :</span>
                                    <span><?php echo $id ?></span>
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
                            <div class="forum_view">
                                <span class="title">Issue type :</span>
                                <div class="spc"><?php echo $iss_type ?></div>
                            </div>
                            <div class="forum_view">
                                <span class="title">Issue category :</span>
                                <div class="spc"><?php echo $iss_cat ?></div>
                            </div>
                            <div class="forum_view">
                                <span class="title">Issue :</span>
                                <div class="spc"><?php echo $issue ?></div>
                            </div>
                            <div class="forum_view">
                                <a href="issue-p.php"><button class="submit-btn">Back</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="card">
                    <h3>Reported Issue History</h3>
                    <table>
                    <?php
                    $query_selectLeaves = "SELECT * FROM issues WHERE user_id='$Userid'";
                    $result_selectLeaves = mysqli_query($con,$query_selectLeaves);
                    $row_selectLeaves = mysqli_fetch_array($result_selectLeaves);
                    if(empty($row_selectLeaves)){
                        echo "<tr><td colspan='4'>No issues reported yet</td></tr>";
                    }
                    else{
                        $i = $row_selectLeaves['id'];
                        while ($row_selectLeaves = mysqli_fetch_array($result_selectLeaves)) { ?>
                            <tr>
                                <td> <?php echo $row_selectLeaves['id']; ?> </td>
                                <td> <?php echo $row_selectLeaves['issue_type']; ?> </td>
                                <td> <?php echo $row_selectLeaves['submitted_date']; ?> </td>
                                <td> <a href="issue_view.php?leave_id=<?php echo $row_selectLeaves['id']; ?>">view</a></td>
                            </tr>
                            <tr>
                                <td colspan="4"><hr></td>
                            </tr>
                            <?php $i++;
                        }
                    }
                    ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php require_once '../inc/footer.php'; ?>
<?php } ?>