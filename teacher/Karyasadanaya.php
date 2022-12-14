<?php
include('../inc/config.php');

//********************************************** */
session_start();
$Userid  = $_SESSION['id'];


//********************************************** */
$reqErr = $start_dateErr = $end_dateErr = $reasonErr = $submittedDateErr = $tasks1Err = $Indicators1Err = $Problems1Err = "";
$tasks2Err = $Indicators2Err = $Problems2Err = $tasks3Err = $Indicators3Err = $Problems3Err = "";
$tasks4Err = $Indicators4Err = $Problems4Err = $tasks5Err = $Indicators5Err = $Problems5Err = "";

// $reasonErr = $commencing_dateErr = $resuming_dateErr = $intervalErr = "";
// $reason = $commencing_date = $resuming_date = $casual = $medical = $other ="";
$submittedDate = date("Y-m-d");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    // $reason = $_POST["reason"];
    // $submittedDate = $_POST["submittedDate"];
    $tasks1 = $_POST["tasks1"];
    $Indicators1 = $_POST["Indicators1"];
    $Problems1 = $_POST["Problems1"];
    $tasks2 = $_POST["tasks2"];
    $Indicators2 = $_POST["Indicators2"];
    $Problems2 = $_POST["Problems2"];
    $tasks3 = $_POST["tasks3"];
    $Indicators3 = $_POST["Indicators3"];
    $Problems3 = $_POST["Problems3"];
    $tasks4 = $_POST["tasks4"];
    $Indicators4 = $_POST["Indicators4"];
    $Problems4 = $_POST["Problems4"];
    $tasks5 = $_POST["tasks5"];
    $Indicators5 = $_POST["Indicators5"];
    $Problems5 = $_POST["Problems5"];

    if (empty($_POST["start_date"])) {
        $start_dateErr = "Start date is required";
    }

    if (empty($_POST["end_date"])) {
        $end_dateErr = "End date is required";
    }

    if (empty($_POST["reason"])) {
        $reasonErr = "Reason is required";
    }

    if (empty($_POST["submittedDate"])) {
        $submittedDateErr = "Submitted date is required";
    }

    if (empty($_POST["tasks1"])) {
        $tasks1Err = "Tasks is required";
    }

    if (empty($_POST["Indicators1"])) {
        $Indicators1Err = "Indicators is required";
    }

    if (empty($_POST["Problems1"])) {
        $Problems1Err = "Problems is required";
    }

    if (empty($_POST["tasks2"])) {
        $tasks2Err = "Tasks is required";
    }

    if (empty($_POST["Indicators2"])) {
        $Indicators2Err = "Indicators is required";
    }

    if (empty($_POST["Problems2"])) {
        $Problems2Err = "Problems is required";
    }

    if (empty($_POST["tasks3"])) {
        $tasks3Err = "Tasks is required";
    }

    if (empty($_POST["Indicators3"])) {
        $Indicators3Err = "Indicators is required";
    }

    if (empty($_POST["Problems3"])) {
        $Problems3Err = "Problems is required";
    }

    if (empty($_POST["tasks4"])) {
        $tasks4Err = "Tasks is required";
    }

    if (empty($_POST["Indicators4"])) {
        $Indicators4Err = "Indicators is required";
    }

    if (empty($_POST["Problems4"])) {
        $Problems4Err = "Problems is required";
    }

    if (empty($_POST["tasks5"])) {
        $tasks5Err = "Tasks is required";
    }

    if (empty($_POST["Indicators5"])) {
        $Indicators5Err = "Indicators is required";
    }

    if (empty($_POST["Problems5"])) {
        $Problems5Err = "Problems is required";
    }

    if(empty($start_dateErr) 
        && empty($end_dateErr) 
        && empty($tasks1Err) 
        && empty($Indicators1Err) 
        && empty($Problems1Err) 
        && empty($tasks2Err) 
        && empty($Indicators2Err) 
        && empty($Problems2Err) 
        && empty($tasks3Err) 
        && empty($Indicators3Err) 
        && empty($Problems3Err) 
        && empty($tasks4Err) 
        && empty($Indicators4Err) 
        && empty($Problems4Err) 
        && empty($tasks5Err) 
        && empty($Indicators5Err) 
        && empty($Problems5Err)){
        $sql = "INSERT INTO karyasadana(userId , start_date, end_date, submittedDate, tasks1, Indicators1, Problems1, tasks2, Indicators2, Problems2, tasks3, Indicators3, Problems3, tasks4, Indicators4, Problems4, tasks5, Indicators5, Problems5)
        VALUES ('$Userid','$start_date','$end_date','$submittedDate','$tasks1','$Indicators1','$Problems1','$tasks2','$Indicators2','$Problems2','$tasks3','$Indicators3','$Problems3','$tasks4','$Indicators4','$Problems4','$tasks5','$Indicators5','$Problems5')";
        $result = mysqli_query($con,$sql);
        if($result){
            echo "<script> alert(\"New record created successfully!\"); </script>";
        }else{
            echo "<script> alert(\"Submition Failed please try again!\"); </script>";
        }
        
    }
    else{
        $reqErr = "Please fill all the required fields";
    }
}



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
                <a href="index.php"><i class="fa-solid fa-house"></i><span></span>Home</a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-file-invoice-dollar"></i><span>Paysheet</span></a>
            </li>
            <li>
                <a href="Karyasadanaya.php" class="active"><i class="fa-solid fa-file-lines"></i><span>Karyasadanaya</span></a>
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
                                    <span class="error"><?php echo ($start_dateErr || $end_dateErr) ?></span>
                                </div>
                            </div>
                            <div class="forum_box">
                                <div class="forum_con">
                                    <h4>1. Process: Teaching</h4>
                                    <label for="tasks1">1.1 Resource support and training needs expected from the school to accomplish tasks :</label><br>
                                    <textarea id="tasks1" name="tasks1" required></textarea><br>
                                    <?php echo $tasks1Err; ?>
                                    <label for="indicators">1.2 Karya sadana Indicators :</label><br>
                                    <textarea id="Indicators1" name="Indicators1" required></textarea><br>
                                    <?php echo $Indicators1Err; ?>
                                    <label for="Problems1">1.3 Tasks performed and problems encountered :</label><br>
                                    <textarea id="Problems1" name="Problems1" required></textarea><br>
                                    <?php echo $Problems1Err; ?>
                                </div>
                            </div>
                            <button class="submit-btn" id="nxt1">Next</button>
                        </div>

                        <!-- Form 2************************************************************************************** -->
                        <div id="frm2">
                            <div class="forum_box">
                                <div class="forum_con">
                                    <h4>2. Process : Extracurricular activities</h4>
                                    <label for="tasks2">2.1 Resource support and training needs expected from the school to accomplish tasks :</label><br>
                                    <textarea id="tasks2" name="tasks2" required></textarea><br>
                                    <?php echo $tasks2Err; ?>
                                    <label for="indicators2">2.2 Karya sadana Indicators :</label><br>
                                    <textarea id="Indicators2" name="Indicators2" required></textarea><br>
                                    <?php echo $Indicators2Err; ?>
                                    <label for="Problems2">2.3 Tasks performed and problems encountered :</label><br>
                                    <textarea id="Problems2" name="Problems2" required></textarea><br>
                                    <?php echo $Problems2Err; ?>
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
                                    <label for="tasks3">3.1 Resource support and training needs expected from the school to accomplish tasks :</label><br>
                                    <textarea id="tasks3" name="tasks3" required></textarea><br>
                                    <?php echo $tasks3Err; ?>
                                    <label for="indicators3">3.2 Karya sadana Indicators :</label><br>
                                    <textarea id="Indicators3" name="Indicators3" required></textarea><br>
                                    <?php echo $Indicators3Err; ?>
                                    <label for="Problems3">3.3 Tasks performed and problems encountered :</label><br>
                                    <textarea id="Problems3" name="Problems3" required></textarea><br>
                                    <?php echo $Problems3Err; ?>
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
                                    <label for="tasks4">4.1 Resource support and training needs expected from the school to accomplish tasks :</label><br>
                                    <textarea id="tasks4" name="tasks4" required></textarea><br>
                                    <?php echo $tasks4Err; ?>
                                    <label for="indicators4">4.2 Karya sadana Indicators :</label><br>
                                    <textarea id="indicators4" name="Indicators4" required></textarea><br>
                                    <?php echo $Indicators4Err; ?>
                                    <label for="tasks4">4.3 Tasks performed and problems encountered :</label><br>
                                    <textarea id="tasks4" name="Problems4" required></textarea><br>
                                    <?php echo $Problems4Err; ?>
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
                                    <label for="tasks5">5.1 Resource support and training needs expected from the school to accomplish tasks :</label><br>
                                    <textarea id="tasks5" name="tasks5" required></textarea><br>
                                    <?php echo $tasks5Err; ?>
                                    <label for="indicators5">5.2 Karya sadana Indicators :</label><br>
                                    <textarea id="indicators5" name="Indicators5" required></textarea><br>
                                    <?php echo $Indicators5Err; ?>
                                    <label for="Problems5">5.3 Tasks performed and problems encountered :</label><br>
                                    <textarea id="Problems5" name="Problems5" required></textarea><br>
                                    <?php echo $Problems5Err; ?>
                                </div>
                            </div>
                            <div class="btn">
                                <a href="">
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
                    <!-- <span>Pending ...</span> -->
                    <?php
                    $query_last_id = "SELECT id FROM karyasadana WHERE userId='$Userid' ORDER BY id DESC LIMIT 1";
                    $result_last_id = mysqli_query($con, $query_last_id);
                    $row_last_id = mysqli_fetch_array($result_last_id);
                    ?>
                    <?php if(empty($row_last_id)) { ?>
                        <span class="no">No Applications</span>
                    <?php } else { $last_id = $row_last_id['id'];?>
                        <span>Pending ...</span>
                    <?php } ?>
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
                    <?php
                    $query_selectLeaves = "SELECT * FROM karyasadana WHERE userId='$Userid' ORDER BY id DESC LIMIT 5";
                    $result_selectLeaves = mysqli_query($con,$query_selectLeaves);
                    $row_selectLeaves = mysqli_fetch_array($result_selectLeaves);
                    if(empty($row_selectLeaves)) { ?>
                        <span class="no">No Karyasadana</span>
                    <?php } else {
                        $i = $row_selectLeaves['id'];
                        while ($row_selectLeaves = mysqli_fetch_array($result_selectLeaves)) { ?>
                            <div class="status-bt">
                                <span><?php echo $row_selectLeaves['end_date']; ?></span>
                                <a href="karyasadana_view.php?id=<?php echo $row_selectLeaves['id']; ?>">
                                    <button>View</button>
                                </a>
                            </div>
                            <?php $i++;
                        }
                    }
                    ?>
                    <!-- <div class="status-bt">
                        <div class="cmore">
                            <a href="#">
                                <button>See more...</button>
                            </a>
                        </div>
                    </div> -->
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