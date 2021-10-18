<?php 
	require_once('db.php');
    $semester_id = $_GET['id'];
    $query   = "SELECT * FROM semester WHERE semester_id = '$semester_id' LIMIT 1";
	$results = mysqli_query($con, $query);
	if ($results) {
		$semesterData = $results->fetch_assoc();		
    }
?>
  <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Semester-update</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
<?php include('menu.php'); ?>

    <section class="banner">
        <div class="banner-left">
            Semester Update
        </div>
    </section>
    <section>
        <div class="login">
            <form method="POST">
                <div>
                    <?php  include("errors.php"); ?><br>
                </div>

                <input type="text" hidden value="<?php echo $semesterData['semester_id'] ?>" name="semester_id">
                <div style="width: 100%;">
                    <label>Name</label>
                    <input type="text" value="<?php echo $semesterData['name'] ?>" name="name" required>
                </div><br><br><br><br><br>

                <div style="width: 100%;">
                    <label>Year</label>
                    <input type="number" value="<?php echo $semesterData['year'] ?>" name="year" min="2021" max="2021" required>
                </div><br><br><br><br><br>
                
                <input type="submit" value="Update Semester" name="updateSemester">            
            </form>
        </div>
    </section>
    <script src="js/dashboard-validation.js"></script>
</body>
</html>