<?php 
	require_once('db.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Grade-add</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
<?php include('menu.php'); ?>

    <section class="banner">
        <div class="banner-left">
        Grade Add
        </div>
    </section>
    <section>
        <div class="login">
        <form name="addGradeForm" method="POST" onsubmit="return addGradeValidation()" style=" background-color: white;">
                <div>
                    <?php  include("errors.php"); ?><br>
                </div>

                <div style="width: 100%;">
                    <label>Semester</label>
                    <select name="semester_id" >
                        <option value="">Select Semester</option>
                        <?php 
                            $semesterQuery   = "SELECT * FROM semester";
                            $semesterResult = mysqli_query($con, $semesterQuery);
                            while($row = mysqli_fetch_assoc($semesterResult)) {
                                ?>
                                    <option value="<?php echo $row['semester_id']; ?>"><?php echo $row['name']; ?> <?php echo $row['year']; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div><br><br><br><br><br>

                <div style="width: 100%;">
                    <label>User</label>
                    <select name="user_id" >
                        <option value="">Select User</option>
                        <?php 
                            $userQuery  = "SELECT * FROM user";
                            $userResult = mysqli_query($con, $userQuery);
                            while($row = mysqli_fetch_assoc($userResult)) {
                                ?>
                                    <option value="<?php echo $row['user_id']; ?>"><?php echo $row['reg_number']; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div><br><br><br><br><br>

                <div style="width: 100%;">
                    <label>Unit</label>
                    <select name="unit_id" >
                        <option value="">Select Unit</option>
                        <?php 
                            $unitQuery  = "SELECT * FROM unit";
                            $unitResult = mysqli_query($con, $unitQuery);
                            while($row = mysqli_fetch_assoc($unitResult)) {
                                ?>
                                    <option value="<?php echo $row['unit_id']; ?>"><?php echo $row['unit_code']; ?>: <?php echo $row['unit_name']; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div><br><br><br><br><br>

                <div style="width: 100%;">
                    <label>Cat</label>
                    <input type="number" name="cat" min="0" max="30" >
                </div><br><br><br><br><br>

                <div style="width: 100%;">
                    <label>Exam</label>
                    <input type="number" name="exam" min="0" max="70" >
                </div><br><br><br><br><br>
                
                <input type="submit" value="Add Grade" name="addGrade">            
            </form>
        </div>
    </section>
    <script src="js/validation.js"></script>
</body>
</html>