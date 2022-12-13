<?php
include('../inc/config.php');

//********************************************** */
session_start();
$Userid  = $_SESSION['id'];
$sql = "SELECT username FROM teacher WHERE id='$Userid'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$Username = $row['username'];

//********************************************** */

$reasonErr = $commencing_dateErr = $resuming_dateErr = $intervalErr = "";
$reason = $commencing_date = $resuming_date = $casual = $medical = $other ="";
$submittedDate = date("Y-m-d");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["reason"])) {
      $reasonErr = "Reason is required";
    } else {
      $reason = $_POST["reason"];
    }
    
    if (empty($_POST["commencing_date"])) {
      $commencing_dateErr = "Commencing date is required";
    } else {
      $commencing_date = $_POST["commencing_date"];
    }
      
    if (empty($_POST["resuming_date"])) {
        $resuming_dateErr = "Resuming date is required";
    } else {
        $resuming_date = $_POST["resuming_date"];
    }
  
    if (empty($_POST["casual"])) {
      $casual = "0";
    } else {
      $casual = $_POST["casual"];
    }
  
    if (empty($_POST["medical"])) {
        $medical = "0";
    } else {
        $medical = $_POST["medical"];
    }

    if (empty($_POST["other"])) {
        $other = "0";
    } else {
        $other = $_POST["other"];
    }

    $date1 = strtotime($commencing_date);
    $date2 = strtotime($resuming_date);
    $interval = (($date2 - $date1)/60/60/24);

    if($interval < 0){
      $commencing_dateErr = "*Commencing date must be less than resuming date";
    }
    else {
        if($interval > 42){
            $resuming_dateErr = "*Resuming date must be less than 42 days";
          }
          else{
            if(abs($interval) != $casual + $medical + $other){
                $intervalErr = "*Sum of casual, medical and other leaves must be equal to interval";
              }
            else{
                if($reason != null && $commencing_date != null && $resuming_date != null){
                    $sql = "INSERT INTO leave_details (reason, commencing_date, resuming_date, casual, medical, other, userId, submitted_date) VALUES ('$reason', '$commencing_date', '$resuming_date', '$casual', '$medical', '$other', '$Userid', '$submittedDate')";
                    if (mysqli_query($con, $sql)) {
                        echo "<script> alert(\"New record created successfully!\"); </script>";
                    } else {
                        echo "<script> alert(\"Submition Failed please try again!\"); </script>";
                    }
                }
            }
          } 
    }
}
?>

<?php require_once '../inc/header.php'; ?>
    <div class="sidebar">
        <ul>
            <li>
                <a href="Home.php"><i class="fa-solid fa-house"></i><span></span>Home</a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-file-invoice-dollar"></i><span>Paysheet</span></a>
            </li>
            <li>
                <a href="Karyasadanaya1.php"><i class="fa-solid fa-file-lines"></i><span>Karyasadanaya</span></a>
            </li>
            <li>
                <a href="Leave_form.php" class="active"><i class="fa-solid fa-file"></i><span>Leave Form</span></a>
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
        <?php require_once '../inc/navbar.php'; ?>
        <div class="container">
            <div class="left">
                <div class="topic">
                    <h1>LEAVE FORM</h1>
                </div>
                <div class="forum">
                    <span class="forum-topic">Application For Leave</span>
                    <form action="" method="POST">
                        <div class="forum_box">
                            <div class="forum_con">
                                <label for="reason">Reason for leave :</label><br>
                                <textarea id="reason" name="reason" required></textarea><br>
                                <label for="commencing_date">Date of commencing date :</label><br>
                                <input type="date" id="commencing_date" name="commencing_date" required>
                                <span class="error"><?php echo $commencing_dateErr ?></span>
                                <label for="resuming_date">Date of resuming duties :</label><br>
                                <input type="date" id="resuming_date" name="resuming_date" required>
                                <span class="error"><?php echo $resuming_dateErr ?></span>
                                <label for="total_leaves">Number of days leave applied for :</label>
                                <span class="error"><?php echo $intervalErr ?></span><br>
                                <div class="leave">
                                    <div class="leave_t">
                                        <label for="casual">Casual :</label>
                                        <input type="number" id="casual" name="casual" min="0" max="42" placeholder="0">
                                    </div>
                                    <div class="leave_t">
                                        <label for="medical">Medical :</label>
                                        <input type="number" id="medical" name="medical" min="0" max="42" placeholder="0">
                                    </div>
                                    <div class="leave_t">
                                        <label for="other">Other :</label>
                                        <input type="number" id="other" name="other" min="0" max="42" placeholder="0">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input class="submit-btn" type="submit">
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="card">
                    <h3>LATEST APPLICATION STATUS</h3>
                    <div class="status-bt">
                        <span>Pending ...</span>
                        <?php
                        $query_last_id = "SELECT leave_id FROM leave_details WHERE userId='$Userid' ORDER BY leave_id DESC LIMIT 1";
                        $result_last_id = mysqli_query($con, $query_last_id);
                        $row_last_id = mysqli_fetch_array($result_last_id);
                        $last_id = $row_last_id['leave_id'];
                        ?>
                        <a href="Leave_view.php?leave_id=<?php echo $last_id;?>">
                            <button>View</button>
                        </a>
                    </div>
                </div>
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
<?php require_once '../inc/footer.php'; ?>