<?php 
	require_once('db.php');
?>
  <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Semester-add</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
<?php include('menu.php'); ?>

    <section class="banner">
        <div class="banner-left">
        Semester Add
        </div>
    </section>
    <section>
        <div class="login">
            <form method="POST" name="addSemesterForm" onsubmit="return addStudentValidation()">
                <div>
                    <?php  include("errors.php"); ?><br>
                </div>

                <div style="width: 100%;">
                    <label>Name</label>
                    <input type="text" name="name">
                </div><br><br><br><br><br>

                <div style="width: 100%;">
                    <label>Year</label>
                    <input type="number" name="year" min="2021" max="2021">
                </div><br><br><br><br><br>
                
                <input type="submit" value="Add Semester" name="addSemester">            
            </form>
        </div>
    </section>
    <script src="js/dashboard-validation.js"></script>
</body>
</html>