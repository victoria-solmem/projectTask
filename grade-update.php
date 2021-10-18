<?php 
	require_once('db.php');
    $grade_id = $_GET['id'];
    $query   = "SELECT * FROM grade WHERE grade_id = '$grade_id' LIMIT 1";
	$results = mysqli_query($con, $query);
	if ($results) {
		$gradeData = $results->fetch_assoc();		
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Grade-update</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
<?php include('menu.php'); ?>

    <section class="banner">
        <div class="banner-left">
        Grade update
        </div>
    </section>
    <section>
        <div class="login">
            <form method="POST">
                <div>
                    <?php  include("errors.php"); ?><br>
                </div>
                <input type="text" hidden value="<?php echo $gradeData['grade_id'] ?>" name="grade_id">
                <div style="width: 100%;">
                    <label>Semester</label>
                    <select name="semester_id" required>
                        <option value="">Select Semester</option>
                        <?php 
                            $semesterQuery   = "SELECT * FROM semester";
                            $semesterResult = mysqli_query($con, $semesterQuery);
                            while($row = mysqli_fetch_assoc($semesterResult)) {
                                if($row['semester_id'] == $gradeData['semester_id']) {
                                    ?>
                                        <option value="<?php echo $row['semester_id'] ?>" selected>
                                            <?php echo $row['name']; ?> <?php echo $row['year']; ?>
                                        </option>
                                    <?php
                                }
                                ?>
                                    <option value="<?php echo $row['semester_id']; ?>"><?php echo $row['name']; ?> <?php echo $row['year']; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div><br><br><br><br><br>

                <div style="width: 100%;">
                    <label>User</label>
                    <select name="user_id" required>
                        <option value="">Select User</option>
                        <?php 
                            $userQuery  = "SELECT * FROM user";
                            $userResult = mysqli_query($con, $userQuery);
                            while($row = mysqli_fetch_assoc($userResult)) {
                                if($row['user_id'] == $gradeData['user_id']) {
                                    ?>
                                        <option value="<?php echo $row['user_id'] ?>" selected>
                                            <?php echo $row['reg_number']; ?>
                                        </option>
                                    <?php
                                }
                                ?>
                                    <option value="<?php echo $row['user_id']; ?>"><?php echo $row['reg_number']; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div><br><br><br><br><br>

                <div style="width: 100%;">
                    <label>Unit</label>
                    <select name="unit_id" required>
                        <option value="">Select Unit</option>
                        <?php 
                            $unitQuery  = "SELECT * FROM unit";
                            $unitResult = mysqli_query($con, $unitQuery);
                            while($row  = mysqli_fetch_assoc($unitResult)) {
                                if($row['unit_id'] == $gradeData['unit_id']) {
                                    ?>
                                        <option value="<?php echo $row['unit_id']; ?>" selected>
                                            <?php echo $row['unit_code']; ?>: <?php echo $row['unit_name']; ?>
                                        </option>
                                    <?php
                                }
                                ?>
                                    <option value="<?php echo $row['unit_id']; ?>"><?php echo $row['unit_code']; ?>: <?php echo $row['unit_name']; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div><br><br><br><br><br>

                <div style="width: 100%;">
                    <label>Cat</label>
                    <input type="number" value="<?php echo $gradeData['cat'] ?>" name="cat" min="0" max="30" required>
                </div><br><br><br><br><br>

                <div style="width: 100%;">
                    <label>Exam</label>
                    <input value="<?php echo $gradeData['exam'] ?>" type="number" name="exam" min="0" max="70" required>
                </div><br><br><br><br><br>
                
                <input type="submit" value="Update Grade" name="updateGrade">            
            </form>
        </div>
    </section>
    <script src="js/dashboard-validation.js"></script>
</body>
</html>