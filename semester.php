
<?php 
	require_once('db.php');
?>
  <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Semester</title>
    <link rel="stylesheet" href="css/dashboard.css">
    
</head>
<body>
<?php include('menu.php'); ?>

    <section class="banner">
        <div class="banner-left">
            Semester
        </div>
    </section>
    <section>
    <button class="btn"
            style="float: right; right: 10px; position: absolute; background-color: #2dd36f; margin-top: -48px;">
            <a href="semester-add.php" style="color: white;">
                Add Semester</a>
        </button>
        <div>
            <?php  include("success.php"); ?><br>
        </div>
        <table id="customers">
            <tr>
                <th>Name</th>
                <th>Year</th>
                <th>Date</th>
                <th>Delete</th>
            <tr>
            
            <?php
                $semesterQuery  = "SELECT * FROM semester ORDER BY created_at DESC";
                $semesterResult = mysqli_query($con, $semesterQuery);
                while($row = $semesterResult->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><a href="student-update?<?php echo $row['semester_id'] ?>"><?php echo $row['name'] ?></a></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo date('M d Y',strtotime($row['created_at'])) ?></td>
                            <td>
                            <form method="POST">
                                <input type="text" value="<?php echo $row['semester_id'] ?>" name="semester_id" hidden>
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
</body>
</html>