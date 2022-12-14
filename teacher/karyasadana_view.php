<?php include('../inc/config.php');
session_start();
$Userid  = $_SESSION['id'];

$Username = $_SESSION['username'];
$Designation = $_SESSION['designation'];

$id = $_GET['id'];
$query_selectLeave = "SELECT * FROM karyasadana INNER JOIN users ON karyasadana.userId = users.id WHERE karyasadana.userId='$Userid' AND karyasadana.id = '$id'";
$result_selectLeave = mysqli_query($con,$query_selectLeave);
$row_selectLeave = mysqli_fetch_array($result_selectLeave);
    $id = $row_selectLeave["id"];
    $name = $row_selectLeave["users.name"];
    $start_date = $row_selectLeave["start_date"];
    $end_date = $row_selectLeave["end_date"];
    $submittedDate = $row_selectLeave["submittedDate"];
    $tasks1 = $row_selectLeave["tasks1"];
    $Indicators1 = $row_selectLeave["Indicators1"];
    $Problems1 = $row_selectLeave["Problems1"];
    $tasks2 = $row_selectLeave["tasks2"];
    $Indicators2 = $row_selectLeave["Indicators2"];
    $Problems2 = $row_selectLeave["Problems2"];
    $tasks3 = $row_selectLeave["tasks3"];
    $Indicators3 = $row_selectLeave["Indicators3"];
    $Problems3 = $row_selectLeave["Problems3"];
    $tasks4 = $row_selectLeave["tasks4"];
    $Indicators4 = $row_selectLeave["Indicators4"];
    $Problems4 = $row_selectLeave["Problems4"];
    $tasks5 = $row_selectLeave["tasks5"];
    $Indicators5 = $row_selectLeave["Indicators5"];
    $Problems5 = $row_selectLeave["Problems5"];
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
    <!-- <div class="sidebar">
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
            <a href="logout.php"><i class="fa-solid fa-sign-out"></i><span>Logout</span></a>
        </div>
    </div> -->

    <!-- //Navigation bar -->

    <nav class="navbar">
        <div class="navbar__left">
            <div class="nav-icon" onclick="toggleSidebar()">
                <i class="fa-solid fa-bars"></i>
            </div>
            <div class="logo">
                <img src="../images/logo.png" alt="logo">
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
                    <a href="">
                        <span id="userName"><?php echo $Username ?></span><br>
                        <span id="designation"><?php echo $Designation ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="rectangle1">
        <table>
            <tr>
                <td class="col1">
                    <span class="forum-topic">KARYASADANAYA - 2022<br>EDUCATION ZONAL - COLOMBO</span>
                </td>
                <td class="col2">
                    <fieldset class="fieldset1">
                        <p class="span1">
                            <b>Evaluation period</b><br>
                            <?php echo ($start_date); ?> To <?php echo ($end_date); ?>
                        </p>
                    </fieldset>
                </td>
            </tr>
        </table>
        <fieldset class="fieldset2">
            <p class="subtopic">Personal details</p>
            <table class="table1">
                <tr>
                    <td class="th">
                        <ul>
                            <li><b>Name :</b> <?php echo ($name); ?> </li>
                        </ul>
                    </td>
                    <td class="th">
                        <ul>
                            <li><b>Birthday :</b> 01/01/1990 </li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li><b>School :</b> Nalanda College</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>
                        <ul>
                            <li><b>Position :</b> Teacher </li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li><b>Registration Number :</b> 000001 </li>
                        </ul>
                    </td>
                    <td>
                        <ul>
                            <li><b>Current Grade :</b> 3</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><b>Education Qualifications :</b> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </td>
                </tr>
            </table>
        </fieldset>

        <fieldset class="fieldset3">
            <p class="subtopic">Karya Sadana</p>
            <table class="table2">
                <tr>
                    <th>
                        Tasks for the year
                    </th>
                    <th class="td">
                        Resource support and training needs expected from the school to accomplish tasks
                    </th>
                    <th>
                        Karya sadana Indicators
                    </th>
                    <th style="width: 200px;">
                        Tasks performed and problems encountered
                    </th>
                </tr>
                <tr>
                    <th>
                        Teaching
                    </th>
                    <td>
                        Lorem ipsum dolor sit amet.
                    </td>
                    <td>
                        Lorem ipsum dolor sit amet.
                    </td>
                    <td>
                        Lorem ipsum dolor sit amet.
                    </td>
                </tr>
                <tr>
                    <th>
                        Extracurricular activities
                    </th>
                    <td>
                        Lorem ipsum dolor sit amet.
                    </td>
                    <td>
                        Lorem ipsum dolor sit amet.
                    </td>
                    <td>
                        Lorem ipsum dolor sit amet.
                    </td>
                </tr>
                <tr>
                    <th>
                        Student welfare & guidance
                    </th>
                    <td>
                        Lorem ipsum dolor sit amet.
                    </td>
                    <td>
                        Lorem ipsum dolor sit amet.
                    </td>
                    <td>
                        Lorem ipsum dolor sit amet.
                    </td>
                </tr>
                <tr>
                    <th>
                        Special services for the school
                    </th>
                    <td>
                        Lorem ipsum dolor sit amet.
                    </td>
                    <td>
                        Lorem ipsum dolor sit amet.
                    </td>
                    <td>
                        Lorem ipsum dolor sit amet.
                    </td>
                </tr>
                <tr>
                    <th>
                        School community relations
                    </th>
                    <td>
                        Lorem ipsum dolor sit amet.
                    </td>
                    <td>
                        Lorem ipsum dolor sit amet.
                    </td>
                    <td>
                        Lorem ipsum dolor sit amet.
                    </td>
                </tr>
                </tr>
            </table>
        </fieldset>
    </div>
</body>

</html>