
<?php 
	require_once('db.php');
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
        <!-- PICK DAY FORM -->
        <form id="filter" style="margin-top:15px; float:right;right:0px;margin-right:30px;" method="POST" name="monthlyForm">
            <select name="userTypeId" id="userTypeId">
                <option value="">Select User Type</option>
                <?php 
                    $userTypeQuery  = "SELECT * FROM userType ORDER BY createdAt DESC";
                    $userTypeResult = mysqli_query($con, $userTypeQuery);
                    while($userTypeData = mysqli_fetch_assoc($userTypeResult)) {
                        ?>
                            <option value="<?php echo $userTypeData['userTypeId'] ?>"><?php echo $userTypeData['name'] ?></option>
                        <?php
                    }
                ?>
            </select>      
            <input type="date" style="padding:10px; width:100%" name="monthInput" id="monthInput" value="<?php echo $monthInput ?>" >
            <input type="submit" value="Filter" name="filterByDay">
        </form>
        <button class="btn"
            style="float: right; right: 10px; position: absolute; background-color: #2dd36f; margin-top: -48px;">
            <a href="grade-add.php" style="color: white;">
                Add Grade</a>
        </button>
        <div>
            <?php  include("success.php"); ?><br>
        </div>
        <table id="customers">
            <tr>
                <th>Reg Number</th>
                <th>Semester</th>
                <th>Unit</th>
                <th>Cat 1</th>
                <th>Cat 2</th>
                <th>Exam</th>
                <th>Total Mark</th>
                <th>Grade</th>
                <th>Date</th>
                <th>Delete</th>
            <tr>
            
            <?php
                $gradeQuery  = "SELECT * FROM grade ORDER BY created_at DESC";
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
                            <td><a href="grade-update?<?php echo $row['grade_id'] ?>"><?php echo $userData['reg_number'] ?></a></td>
                            <!-- <td><?php echo $userData['first_name'] ?></td>
                            <td><?php echo $userData['last_name'] ?></td> -->
                            <td><?php echo $semesterData['year'] ?> <?php echo $semesterData['name'] ?></td>
                            <td><?php echo $unitData['unit_code'] ?>: <?php echo $unitData['unit_name'] ?></td>
                            <td><?php echo $row['cat_1'] ?></td>
                            <td><?php echo $row['cat_2'] ?></td>
                            <td><?php echo $row['exam'] ?></td>
                            <td><?php echo $row['cat_1']+$row['cat_2']+$row['exam'] ?></td>
                            <td>
                                <?php 
                                    if(($row['cat_1']+$row['cat_2']+$row['exam']) < 40) {
                                        ?>
                                            <div style="color: red">F</div>
                                        <?php
                                    } elseif (($row['cat_1']+$row['cat_2']+$row['exam']) < 50) {
                                        ?>
                                            <div style="color: green">D</div>
                                        <?php
                                    } elseif (($row['cat_1']+$row['cat_2']+$row['exam']) < 60) {
                                        ?>
                                            <div style="color: green">C</div>
                                        <?php
                                    } elseif (($row['cat_1']+$row['cat_2']+$row['exam']) < 70) {
                                        ?>
                                            <div style="color: green">B</div>
                                        <?php
                                    } elseif (($row['cat_1']+$row['cat_2']+$row['exam']) < 80) {
                                        ?>
                                            <div style="color: green">A</div>
                                        <?php
                                    } elseif (($row['cat_1']+$row['cat_2']+$row['exam']) < 100) {
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
                                    <input type="submit" style="background-color: transparent; color:red; margin-top:-2px;" name="deleteStudent" value="Delete">                       
                                </form> 
                            </td>
                        </tr>
                    <?php                    
                }
            ?>

        </table>
    </section>
    <script src="js/dashboard-validation.js"></script>
    <style>
       #filter {
         display:none;
       }
       #topFive {
           display: none;
       }
    </style>
    <script>
        // SHOW AND HIDE FILTER
        function showHideFilter() {
            var filter = document.getElementById("filter");
            if(filter.style.display === "block") {
                filter.style.display = "none";
            } else {
                filter.style.display = "block";
            }
        }

        // SHOW AND HIDE TOP FIVE FUNCTION
        function showHideTopFive() {
            var topFive = document.getElementById("topFive");
            if(topFive.style.display === "block") {
                topFive.style.display = "none";
            } else {
                topFive.style.display = "block";
            }
        }
    </script>
</body>
</html>