<?php 
	require_once('db.php');
?>
  <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Unit-add</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
<?php include('menu.php'); ?>

    <section class="banner">
        <div class="banner-left">
            Unit Add
        </div>
    </section>
    <section>
        <div class="login">
            <form method="POST" name="addStudentForm" onsubmit="return addStudentValidation()">
                <div>
                    <?php  include("errors.php"); ?><br>
                </div>

                <div style="width: 100%;">
                    <label>Unit Name</label>
                    <input type="text" name="unit_name">
                </div><br><br><br><br><br>

                <div style="width: 100%;">
                    <label>Unit Code</label>
                    <input type="text" name="unit_code">
                </div><br><br><br><br><br>
                
                <input type="submit" value="Add Unit" name="addUnit">            
            </form>
        </div>
    </section>
    <script src="js/dashboard-validation.js"></script>
</body>
</html>