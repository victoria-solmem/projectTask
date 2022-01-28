<?php 
	require_once('db.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Student-add</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
<?php include('menu.php'); ?>

    <section class="banner">
        <div class="banner-left">
           Add Student
        </div>
    </section>
    <section>
        <div class="login">
            <form name="addStudentForm" method="POST" onsubmit="return addStudentValidation()" style=" background-color: white;">
                <div>
                    <?php  include("errors.php"); ?><br>
                </div>

                <div style="width: 100%;">
                    <label>Registration Number</label>
                    <input type="text" name="reg_number" >
                </div><br><br><br><br><br>

                <div style="width: 100%;">
                    <label>First Name</label>
                    <input type="text" name="first_name" >
                </div><br><br><br><br><br>

                <div style="width: 100%;">
                    <label>Last Name</label>
                    <input type="text" name="last_name" >
                </div><br><br><br><br><br>

                <div style="width: 100%;">
                    <label>Email</label>
                    <input type="email" name="email" >
                </div><br><br><br><br><br>
                
                <input type="submit" value="Add Student" name="addStudent">            
            </form>
        </div>
    </section>
    <script src="js/validation.js"></script>
</body>
</html>