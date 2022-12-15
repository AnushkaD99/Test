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

//********************************************** */
$submittedDate = date("Y-m-d");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $iss_type = ('Personal');
    //$iss_cat = $_POST['iss_cat'];
    $issue = $_POST['issue'];

    if(empty($_POST["iss_cat"])){
        $iss_catErr = "Category is required";
    }
    if(empty($_POST["issue"])){
        $issueErr = "Issue is required";
    }

    if(empty($reqErr) && empty($issueErr)){
        $sql = "INSERT INTO issues (user_id, submitted_date, issue_type, issue_cat, issue) VALUES ('$Userid','$submittedDate', '$iss_type', '$iss_type', '$issue')";
        $result = mysqli_query($con,$sql);
        if($result){
            echo "<script> alert(\"New record created successfully!\"); </script>";
        }
        else{
            echo "<script> alert(\"Submition Failed please try again!\"); </script>";
        }
    }
    else {
        $reqErr = "Please fill all the required fields";
    }
}
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
                    <span class="forum-topic">Please select the issue type</span>
                    <div class="btn_iss">
                        <a href="issue-p.php"><button class="active">Personal Issues</button></a>
                        <a href="issue-s.php"><button>School Issues</button></a>
                    </div>
                    <form action="" method="POST">
                        <div class="forum_box">
                            <div class="forum_con">
                                <span class="forum-topic">Application for personal issue report</span>
                                <!-- <div class="input-group">
                                <label for="iss_cat">Issue Category :</label>
                                    <select id="iss_cat" name="iss_cat">
                                        <option value="Teacher-Issues">Teacher's issues</option>
                                        <option value="Principal">About school</option>
                                        <option value="Director">Student's issues</option>
                                    </select>
                                </div> -->
                                <!-- <span class="error"><?php echo $iss_catErr ?></span> -->
                                <label for="issue">Issue :</label><br>
                                <textarea id="issue" name="issue" required></textarea>
                                <span class="error"><?php echo $issueErr ?></span>
                                <span class="error"><?php echo $reqErr ?></span>
                            </div>
                        </div>
                        <input class="submit-btn" type="submit">
                    </form>
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
                                <td> <a href="issue_view.php?id=<?php echo $row_selectLeaves['id']; ?>">view</a></td>
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