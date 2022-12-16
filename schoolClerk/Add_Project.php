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

$descriptioErr = $linkErr = "";

//********************************************** */
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST['description'])){
        $descriptioErr = "Description is required";
    }

    if(empty($_POST['link'])){
        $linkErr = "Document link is required";
    }

    if(empty($linkErr) && empty($linkErr)){
        $description = $_POST['description'];
        $link = $_POST['link'];
        $submittedDate = date("Y-m-d");

        $sql = "INSERT INTO projects (description, link, submittedDate, user_id) VALUES ('$description', '$link', '$submittedDate', '$Userid')";
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
// define variables and set to empty values
// $descriptionErr = $linkErr = "";
// $descriptio = $link = "";
// $submittedDate = date("Y-m-d");

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (empty($_POST["description"])) {
//       $descriptioErr = "Description is required";
//     } else {
//       $descriptio = $_POST["description"];
//     }
    
//     if (empty($_POST["link"])) {
//       $linkErr = "Document link is required";
//     } else {
//       $link = $_POST["link"];
//     }

// }
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
                <a href="index.php"><i class="fa-solid fa-house"></i><span></span>Home</a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-file-invoice-dollar"></i><span>View</span></a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-file-lines"></i><span>School Profile</span></a>
            </li>
            <li>
                <a href="" class="active"><i class="fa-solid fa-building"></i><span>Projects</span></a>
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
    <?php require_once '../inc/navbar.php'; ?>

    <div class="topic">
        <h1>PROJECT</h1>
    </div>

    <div class="rectangle1" style=""></div>
    <fieldset class="fieldset1">
        <legend><b>School Development Project Details</b> </legend>
        <form class="form" method="POST" action="">
            <table>
                <tr>
                    <td class="col1">
                        <label for="description">Brief Description About the Project :</label><br><br>
                        <span><?php echo $descriptioErr; ?></span>
                        <textarea id="description" name="description" class="description"></textarea><br>
                    </td>
                    <td class="col2">
                        <label for="link">Link fo the Resourses :</label><br><br>
                        <span><?php echo $linkErr; ?></span>
                        <input class="link" type="text" name="link">
                        <input id="submit-btn" type="submit">
                    </td>
                </tr>
            </table>
        </form>
    </fieldset>

    <fieldset class="fieldset2">
        <legend><b>Response Of the Zonal Education Office<br>for the previous project</b> </legend>
        <div class="rectangle2">
            <span class="span1">Not Yet Refered</span>
        </div>
        <h1 class="feedback">Feedback :</h1>
        <div class="rectangle2">
            <span class="span1">No</span>
        </div>
    </fieldset>

    <fieldset class="fieldset3">
        <legend><b>Previously Submitted Projects</b></legend>
        <!-- <div class="rectangle3">
            <span class="span2">PR.No.05</span>
            <span><button id="view-btn"><b>View</b></button></span>
        </div>
        <div class="rectangle3">
            <span class="span2">PR.No.04</span>
            <span><button id="view-btn"><b>View</b></button></span>
        </div>
        <div class="rectangle3">
            <span class="span2">PR.No.03</span>
            <span><button id="view-btn"><b>View</b></button></span>
        </div>
        <div class="rectangle3">
            <span class="span2">PR.No.02</span>
            <span><button id="view-btn"><b>View</b></button></span>
        </div> -->
        <!-- *************************************************** -->
        <?php
            $query_selectLeaves = "SELECT * FROM projects WHERE user_id='$Userid' ORDER BY id DESC";
            $result_selectLeaves = mysqli_query($con,$query_selectLeaves);
            //$row_selectLeaves = mysqli_fetch_array($result_selectLeaves);
            if(empty(" ")) { ?>
                <span class="no">No Projects Subbmitted Yet</span>
            <?php } else {
                //$i = $row_selectLeaves['id'];
                while ($row_selectLeaves = mysqli_fetch_array($result_selectLeaves)) { ?>
                    <div class="rectangle3">
                        <span class="span2"><?php echo "PR.No." . $row_selectLeaves['id']; ?></span>
                        <a href="project_view.php?id=<?php echo $row_selectLeaves['id']; ?>">
                            <span><button id="view-btn">View</button>
                        </a>
                    </div>
                    <?php //$i++;
                }
            }
        ?>
        <!-- ************************************************** -->
        <!--
            js --
            <script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}
</script>
        -->

    </fieldset>
<?php require_once '../inc/footer.php'; ?>
<?php } ?>