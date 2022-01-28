<?php 
	require_once('db.php');
    $report_user = '';
    $report_unit = '';
    if (isset($_POST['report-user'])) {
        $report_unit = '';
        $report_user = mysqli_real_escape_string($con, $_POST['user_id']);
	}
    if (isset($_POST['report-unit'])) {
        $report_user = '';
        $report_unit = mysqli_real_escape_string($con, $_POST['unit_id']);
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Grade</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
<?php include('menu.php'); ?>

    <section class="banner">
        <div class="banner-left">
            Grade
        </div>
    </section>
    <section>
        <button class="btn add-button">
            <a href="grade-add.php" style="color: white;">
                Add Grade</a>
        </button>
        <button class="btn" onclick="showHideFilter()" style="float: right; right: 115px; position: absolute; background-color: #2dd36f; margin-top: -48px;">
            Filter by
        </button>
        <div>
            <?php  include("errors.php"); ?><br>
        </div>
        <div>
            <?php  include("success.php"); ?><br>
        </div>

        <!-- PICK USER FORM -->
        <form id="filter" class="report" method="POST">
            <select name="user_id">
                <option value="">Select User</option>
                <?php 
                    $userQuery  = "SELECT * FROM user";
                    $userResult = mysqli_query($con, $userQuery);
                    while($row = mysqli_fetch_assoc($userResult)) {
                        ?>
                            <option value="<?php echo $row['user_id'] ?>"><?php echo $row['reg_number'] ?></option>
                        <?php
                    }
                ?>
            </select>      
            <input type="submit" value="See Report" name="report-user">
        </form>

        <!-- PICK UNIT FORM -->
        <form id="filter-unit" class="report" method="POST">
            <select name="unit_id">
                <option value="">Select Unit</option>
                <?php 
                    $unitQuery  = "SELECT * FROM unit";
                    $unitResult = mysqli_query($con, $unitQuery);
                    while($row  = mysqli_fetch_assoc($unitResult)) {
                        ?>
                            <option value="<?php echo $row['unit_id'] ?>"><?php echo $row['unit_code'] ?>: <?php echo $row['unit_name'] ?></option>
                        <?php
                    }
                ?>
            </select>      
            <input type="submit" value="See Report" name="report-unit">
        </form>
        <table id="customers">
            <tr>
                <th>Reg Number</th>
                <th>Semester</th>
                <th>Unit</th>
                <th>Cat</th>
                <th>Exam</th>
                <th>Total Mark</th>
                <th>Grade</th>
                <th>Date</th>
                <th>Delete</th>
            <tr>
            
            <?php
                if($report_user) {
                    $gradeQuery = "SELECT * FROM grade WHERE user_id='$report_user'";
                } elseif($report_unit) {
                    $gradeQuery = "SELECT * FROM grade WHERE unit_id='$report_unit'";
                } else {
                    $gradeQuery = "SELECT * FROM grade ORDER BY created_at DESC";
                }
                $gradeResult = mysqli_query($con, $gradeQuery);
                while($row = $gradeResult->fetch_assoc()) {
                    // GET USER DETAILS
                    $user_id    = $row['user_id'];
                    $userQuery  = "SELECT * FROM user WHERE user_id = '$user_id'";
                    $userResult = mysqli_query($con, $userQuery);
                    if (mysqli_num_rows($userResult) == 1) {
                        $userData = $userResult->fetch_assoc();		
                    }
                    // GET UNIT DETAILS
                    $semester_id    = $row['semester_id'];
                    $semesterQuery  = "SELECT * FROM semester WHERE semester_id = '$semester_id'";
                    $semesterResult = mysqli_query($con, $semesterQuery);
                    if (mysqli_num_rows($semesterResult) == 1) {
                        $semesterData = $semesterResult->fetch_assoc();		
                    }
                    // GET SEMESTER DETAILS
                    $unit_id    = $row['unit_id'];
                    $unitQuery  = "SELECT * FROM unit WHERE unit_id = '$unit_id'";
                    $unitResult = mysqli_query($con, $unitQuery);
                    if (mysqli_num_rows($unitResult) == 1) {
                        $unitData = $unitResult->fetch_assoc();		
                    }
                    ?>
                        <tr>
                            <td><a href="grade-update.php?id=<?php echo $row['grade_id'] ?>"><?php echo $userData['reg_number'] ?></a></td>
                            <!-- <td><?php echo $userData['first_name'] ?></td>
                            <td><?php echo $userData['last_name'] ?></td> -->
                            <td><?php echo $semesterData['year'] ?> <?php echo $semesterData['name'] ?></td>
                            <td><?php echo $unitData['unit_code'] ?>: <?php echo $unitData['unit_name'] ?></td>
                            <td><?php echo $row['cat'] ?></td>
                            <td><?php echo $row['exam'] ?></td>
                            <td><?php echo $row['cat']+$row['exam'] ?></td>
                            <td>
                                <?php 
                                    if(($row['cat']+$row['exam']) < 40) {
                                        ?>
                                            <div style="color: red">F</div>
                                        <?php
                                    } elseif (($row['cat']+$row['exam']) < 50) {
                                        ?>
                                            <div style="color: green">D</div>
                                        <?php
                                    } elseif (($row['cat']+$row['exam']) < 60) {
                                        ?>
                                            <div style="color: green">C</div>
                                        <?php
                                    } elseif (($row['cat']+$row['exam']) < 70) {
                                        ?>
                                            <div style="color: green">B</div>
                                        <?php
                                    } elseif (($row['cat']+$row['exam']) < 80) {
                                        ?>
                                            <div style="color: green">A</div>
                                        <?php
                                    } elseif (($row['cat']+$row['exam']) <= 100) {
                                        ?>
                                            <div style="color: green">A+</div>
                                        <?php
                                    }
                                ?>
                            </td>
                            <td><?php echo date('M d Y',strtotime($row['created_at'])) ?></td>
                            <td>
                                <form method="POST">
                                    <input type="text" hidden value="<?php echo $row['grade_id'] ?>" name="grade_id">
                                    <input type="submit" style="background-color: transparent; color:red; margin-top:-2px;" name="deleteGrade" value="Delete">                       
                                </form> 
                            </td>
                        </tr>
                    <?php                    
                }
            ?>
        </table>
    </section>
    <script src="js/dashboard-validation.js"></script>
    <script>
        // SHOW AND HIDE FILTER BY
        function showHideFilter() {
            var filter = document.getElementById("filter");
            var filterUnit = document.getElementById("filter-unit");
            if(filter.style.display === "block") {
                filter.style.display = "none";
            } else {
                filter.style.display = "block";
            }

            if(filterUnit.style.display === "block") {
                filterUnit.style.display = "none";
            } else {
                filterUnit.style.display = "block";
            }
        }
    </script>
    <style>
        #filter-unit {
            display: none;
        }
    </style>
</body>
</html>