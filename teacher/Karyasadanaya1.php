<?php
include('../inc/config.php');

//********************************************** */
session_start();
$Userid  = $_SESSION['id'];
$sql = "SELECT username FROM teacher WHERE id='$Userid'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$Username = $row['username'];

// //********************************************** */

// $reasonErr = $commencing_dateErr = $resuming_dateErr = $intervalErr = "";
// $reason = $commencing_date = $resuming_date = $casual = $medical = $other ="";
// $submittedDate = date("Y-m-d");

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (empty($_POST["reason"])) {
//       $reasonErr = "Reason is required";
//     } else {
//       $reason = $_POST["reason"];
//     }
    
//     if (empty($_POST["commencing_date"])) {
//       $commencing_dateErr = "Commencing date is required";
//     } else {
//       $commencing_date = $_POST["commencing_date"];
//     }
      
//     if (empty($_POST["resuming_date"])) {
//         $resuming_dateErr = "Resuming date is required";
//     } else {
//         $resuming_date = $_POST["resuming_date"];
//     }
  
//     if (empty($_POST["casual"])) {
//       $casual = "0";
//     } else {
//       $casual = $_POST["casual"];
//     }
  
//     if (empty($_POST["medical"])) {
//         $medical = "0";
//     } else {
//         $medical = $_POST["medical"];
//     }

//     if (empty($_POST["other"])) {
//         $other = "0";
//     } else {
//         $other = $_POST["other"];
//     }

//     $date1 = strtotime($commencing_date);
//     $date2 = strtotime($resuming_date);
//     $interval = (($date2 - $date1)/60/60/24);

//     if($interval < 0){
//       $commencing_dateErr = "*Commencing date must be less than resuming date";
//     }
//     else {
//         if($interval > 42){
//             $resuming_dateErr = "*Resuming date must be less than 42 days";
//           }
//           else{
//             if(abs($interval) != $casual + $medical + $other){
//                 $intervalErr = "*Sum of casual, medical and other leaves must be equal to interval";
//               }
//             else{
//                 if($reason != null && $commencing_date != null && $resuming_date != null){
//                     $sql = "INSERT INTO leave_details (reason, commencing_date, resuming_date, casual, medical, other, userId, submitted_date) VALUES ('$reason', '$commencing_date', '$resuming_date', '$casual', '$medical', '$other', '$Userid', '$submittedDate')";
//                     if (mysqli_query($con, $sql)) {
//                         echo "<script> alert(\"New record created successfully!\"); </script>";
//                     } else {
//                         echo "<script> alert(\"Submition Failed please try again!\"); </script>";
//                     }
//                 }
//             }
//           } 
//     }
// }
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
                <a href="Karyasadanaya1.php" class="active"><i class="fa-solid fa-file-lines"></i><span>Karyasadanaya</span></a>
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
            <a href="logout.php"><i class="fa-solid fa-sign-out"></i><span>Logout</span></a>
        </div>
    </div>

    <!-- //Navigation bar -->
    <div class="content">
        <?php require_once '../inc/navbar.php'; ?>
        <div class="container">
            <div class="left">
                <div class="topic">
                    <h1>KARYASADANAYA</h1>
                </div>
                <div class="forum">
                    <span class="forum-topic">KARYASADANAYA - 2022<br>EDUCATION ZONAL - COLOMBO</span>
                    <form action="" method="POST">
                        <!-- Form 1************************************************************************************** -->
                        <div id="frm1">
                            <div class="forum_box">
                                <div class="forum_con">
                                    <label for="Evaluation period">Evaluation period :</label><br>
                                    <div class="dt">
                                        <input type="date" id="start_date" name="start_date" required>
                                        <span>To</span>
                                        <input type="date" id="end_date" name="end_date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="forum_box">
                                <div class="forum_con">
                                    <h4>1. Process: Teaching</h4>
                                    <label for="tasks">1.1 Resource support and training needs expected from the school to accomplish tasks :</label><br>
                                    <textarea id="tasks" name="tasks" required></textarea><br>
                                    <label for="indicators">1.2 Karya sadana Indicators :</label><br>
                                    <textarea id="indicators" name="Indicators" required></textarea><br>
                                    <label for="tasks">1.3 Tasks performed and problems encountered :</label><br>
                                    <textarea id="tasks" name="tasks" required></textarea><br>
                                </div>
                            </div>
                            <button class="submit-btn" id="nxt1">Next</button>
                        </div>

                        <!-- Form 2************************************************************************************** -->
                        <div id="frm2">
                            <div class="forum_box">
                                <div class="forum_con">
                                    <h4>2. Process : Extracurricular activities</h4>
                                    <label for="tasks">2.1 Resource support and training needs expected from the school to accomplish tasks :</label><br>
                                    <textarea id="tasks" name="tasks" required></textarea><br>
                                    <label for="indicators">2.2 Karya sadana Indicators :</label><br>
                                    <textarea id="indicators" name="Indicators" required></textarea><br>
                                    <label for="tasks">2.3 Tasks performed and problems encountered :</label><br>
                                    <textarea id="tasks" name="tasks" required></textarea><br>
                                </div>
                            </div>
                            <div class="btn">
                                <button class="two-btn" id="bck1">Back</button>
                                <button class="two-btn" id="nxt2">Next</button>
                            </div>
                        </div>

                        <!-- Form 3************************************************************************************** -->
                        <div id="frm3">
                            <div class="forum_box">
                                <div class="forum_con">
                                    <h4>3. Process : Student Welfare and Guidance</h4>
                                    <label for="tasks">3.1 Resource support and training needs expected from the school to accomplish tasks :</label><br>
                                    <textarea id="tasks" name="tasks" required></textarea><br>
                                    <label for="indicators">3.2 Karya sadana Indicators :</label><br>
                                    <textarea id="indicators" name="Indicators" required></textarea><br>
                                    <label for="tasks">3.3 Tasks performed and problems encountered :</label><br>
                                    <textarea id="tasks" name="tasks" required></textarea><br>
                                </div>
                            </div>
                            <div class="btn">
                                <button class="two-btn" id="bck2">Back</button>
                                <button class="two-btn" id="nxt3">Next</button>
                            </div>
                        </div>

                        <!-- Form 4************************************************************************************** -->
                        <div id="frm4">
                            <div class="forum_box">
                                <div class="forum_con">
                                    <h4>4. Process : Special services for the school</h4>
                                    <label for="tasks">4.1 Resource support and training needs expected from the school to accomplish tasks :</label><br>
                                    <textarea id="tasks" name="tasks" required></textarea><br>
                                    <label for="indicators">4.2 Karya sadana Indicators :</label><br>
                                    <textarea id="indicators" name="Indicators" required></textarea><br>
                                    <label for="tasks">4.3 Tasks performed and problems encountered :</label><br>
                                    <textarea id="tasks" name="tasks" required></textarea><br>
                                </div>
                            </div>
                            <div class="btn">
                                <button class="two-btn" id="bck3">Back</button>
                                <button class="two-btn" id="nxt4">Next</button>
                            </div>
                        </div>

                        <!-- Form 5************************************************************************************** -->
                        <div id="frm5">
                            <div class="forum_box">
                                <div class="forum_con">
                                    <h4>5. Process : School community relations</h4>
                                    <label for="tasks">5.1 Resource support and training needs expected from the school to accomplish tasks :</label><br>
                                    <textarea id="tasks" name="tasks" required></textarea><br>
                                    <label for="indicators">5.2 Karya sadana Indicators :</label><br>
                                    <textarea id="indicators" name="Indicators" required></textarea><br>
                                    <label for="tasks">5.3 Tasks performed and problems encountered :</label><br>
                                    <textarea id="tasks" name="tasks" required></textarea><br>
                                </div>
                            </div>
                            <div class="btn">
                                <a href="Karyasadanaya2.php">
                                    <button class="two-btn" id="bck4">Back</button>
                                </a>
                                <input type="submit" class="two-btn">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="card">
                    <h3>LATEST APPLICATION STATUS</h3>
                    <span>Pending ...</span>
                </div>
                <div class="card">
                    <h3>Intructions</h3>
                    <div class="crd-bx"><h4>Areas subject to evaluation :</h4>
                        <ul>
                            <li>Learning-teaching mechanism</li>
                            <li>Extra curricular activities</li>
                            <li>Student welfare and guidance</li>
                            <li>Special services done for the school</li>
                            <li>Civic relationships</li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <h3>PREVIOUS KARYSADANA</h3>
                    <div class="status-bt">
                        <span>2022</span>
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
                    <div class="status-bt">
                        <span>2021</span>
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
                    <div class="status-bt">
                        <div class="cmore">
                            <a href="#">
                                <button>See more...</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var form1 = document.getElementById("frm1");
        var form2 = document.getElementById("frm2");
        var form3 = document.getElementById("frm3");
        var form4 = document.getElementById("frm4");
        var form5 = document.getElementById("frm5");

        var Next1 = document.getElementById("nxt1");
        var Next2 = document.getElementById("nxt2");
        var Next3 = document.getElementById("nxt3");
        var Next4 = document.getElementById("nxt4");
        var Back1 = document.getElementById("bck1");
        var Back2 = document.getElementById("bck2"); 
        var Back3 = document.getElementById("bck3");
        var Back4 = document.getElementById("bck4"); 

        Next1.onclick = function(){
            form1.style.display = 'none';
            form2.style.display = 'contents';
        }

        Next2.onclick = function(){
            form2.style.display = 'none';
            form3.style.display = 'contents';
        }

        Next3.onclick = function(){
            form3.style.display = 'none';
            form4.style.display = 'contents';
        }

        Next4.onclick = function(){
            form4.style.display = 'none';
            form5.style.display = 'contents';
        }

        Back1.onclick = function(){
            form2.style.display = 'none';
            form1.style.display = 'contents';
        }

        Back2.onclick = function(){
            form3.style.display = 'none';
            form2.style.display = 'contents';
        }
        Back3.onclick = function(){
            form4.style.display = 'none';
            form3.style.display = 'contents';
        }

        Back4.onclick = function(){
            form5.style.display = 'none';
            form4.style.display = 'contents';
        }

    </script>
<?php require_once '../inc/footer.php'; ?>