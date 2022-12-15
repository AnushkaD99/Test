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
                <a href="index.php" class="active"><i class="fa-solid fa-house"></i><span></span>Home</a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-file-invoice-dollar"></i><span>View</span></a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-file-lines"></i><span>School Profile</span></a>
            </li>
            <li>
                <a href="Add_Project.php"><i class="fa-solid fa-building"></i><span>Projects</span></a>
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
            <div class="forum">
                <img src="../images/logo.png" alt="">
                <h1>Hey<?php echo " " . $Username; ?>,<br>Welcome to Ezymanage!</h1>
            </div>
            <div class="forum">
                <div class="dtl">
                    <h3>Projects Status</h3>
                    <div class="dt">
                        <table>
                            <tr>
                                <th>Project ID</th>
                                <th>Submitted Date</th>
                                <th>View</th>
                            </tr>
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
                                        <td> <?php echo "Project" . " " . $row_selectLeaves['id']; ?> </td>
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
        </div>
    </div>
</div>

<?php require_once '../inc/footer.php' ?>
<?php } ?>