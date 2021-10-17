
<?php 
	require_once('db.php');
?>
  <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Student</title>
    <link rel="stylesheet" href="css/dashboard.css">
    
</head>
<body>
<?php include('menu.php'); ?>

    <section class="banner">
        <div class="banner-left">
            Student
        </div>
    </section>
    <section>
    <button class="btn"
            style="float: right; right: 10px; position: absolute; background-color: #2dd36f; margin-top: -48px;">
            <a href="student-add.php" style="color: white;">
                Add Student</a>
        </button>
        <div>
            <?php  include("success.php"); ?><br>
        </div>
        <table id="customers">
            <tr>
                <th>Reg Number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Delete</th>
            <tr>
            
            <?php
                $studentQuery  = "SELECT * FROM user ORDER BY created_at DESC";
                $studentResult = mysqli_query($con, $studentQuery);
                while($row = $studentResult->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><a href="student-update?<?php echo $row['user_id'] ?>"><?php echo $row['reg_number'] ?></a></td>
                            <td><?php echo $row['first_name'] ?></td>
                            <td><?php echo $row['last_name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo date('M d Y',strtotime($row['created_at'])) ?></td>
                            <td>
                            <form method="POST">
                                <input type="text" hidden value="<?php echo $row['user_id'] ?>" name="user_id">
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