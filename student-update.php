<?php 
	require_once('db.php');
    $user_id = $_GET['id'];
    $query   = "SELECT * FROM user WHERE user_id = '$user_id' LIMIT 1";
	$results = mysqli_query($con, $query);
	if ($results) {
		$userData = $results->fetch_assoc();		
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Student-update</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
<?php include('menu.php'); ?>

    <section class="banner">
        <div class="banner-left">
             Update Student
        </div>
    </section>
    <section>
        <div class="login">
        <form name="addStudentForm" method="POST" onsubmit="return addStudentValidation()" style=" background-color: white;">
                <div>
                    <?php  include("errors.php"); ?><br>
                </div>

                <input type="text" hidden value="<?php echo $userData['user_id'] ?>" name="user_id">
                <div style="width: 100%;">
                    <label>Registration Number</label>
                    <input type="text" value="<?php echo $userData['reg_number'] ?>" name="reg_number" >
                </div><br><br><br><br><br>

                <div style="width: 100%;">
                    <label>First Name</label>
                    <input type="text" value="<?php echo $userData['first_name'] ?>" name="first_name" >
                </div><br><br><br><br><br>

                <div style="width: 100%;">
                    <label>Last Name</label>
                    <input type="text" value="<?php echo $userData['last_name'] ?>" name="last_name" >
                </div><br><br><br><br><br>

                <div style="width: 100%;">
                    <label>Email</label>
                    <input type="email" value="<?php echo $userData['email'] ?>" name="email">
                </div><br><br><br><br><br>
                
                <input type="submit" value="Update Student" name="updateStudent">            
            </form>
        </div>
    </section>
    <script src="js/validation.js"></script>
</body>
</html>