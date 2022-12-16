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
$query_selectLeave = "SELECT * FROM users INNER JOIN projects ON projects.user_id = users.id WHERE projects.user_id='$Userid' AND projects.id = '$id'";
$result_selectLeave = mysqli_query($con,$query_selectLeave);
$row_selectLeave = mysqli_fetch_array($result_selectLeave);
    $id = $row_selectLeave['id'];
    $Userid = $row_selectLeave['user_id'];
    $name = $row_selectLeave['full_name'];
    $submittedDate = $row_selectLeave['submittedDate'];
    $designation = $row_selectLeave["designation"];
    $description = $row_selectLeave['description'];
    $link = $row_selectLeave['link'];
?>

<?php require_once '../inc/header.php'; ?>
    <div class="sidebar">
        <ul>
            <li>
                <a href="index.php"><i class="fa-solid fa-house"></i><span></span>Home</a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-file-invoice-dollar"></i><span>View</span></a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-file-lines"></i><span>School Profile</span></a>
            </li>
            <li>
                <a href="Add_Project.php" class="active"><i class="fa-solid fa-building"></i><span>Projects</span></a>
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
                                <div class="spc"><?php echo $designation ?></div>
                            </div>
                            <div class="forum_view">
                                <span class="title">Brief description about project :</span>
                                <div class="spc"><?php echo $description ?></div>
                            </div>
                            <div class="forum_view">
                                <span class="title">Issue category :</span>
                                <div class="spc"><a href="<?php echo $link ?>">Click here to see project files</a></div>
                            </div>
                            <div class="forum_view">
                                <a href="Add_Project.php"><button class="submit-btn">Back</button></a>
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
                    $query_selectLeaves = "SELECT * FROM projects WHERE user_id='$Userid'";
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
                                <td> <?php echo $row_selectLeaves['submittedDate']; ?> </td>
                                <td> <a href="project_view.php?id=<?php echo $row_selectLeaves['id']; ?>">view</a></td>
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