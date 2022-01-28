<?php 
	require_once('db.php');
    $unit_id = $_GET['id'];
    $query   = "SELECT * FROM unit WHERE unit_id = '$unit_id' LIMIT 1";
	$results = mysqli_query($con, $query);
	if ($results) {
		$unitData = $results->fetch_assoc();		
    }
?>
  <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Unit-update</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
<?php include('menu.php'); ?>

    <section class="banner">
        <div class="banner-left">
             Update Unit
        </div>
    </section>
    <section>
        <div class="login">
        <form name="addUnitForm" method="POST" onsubmit="return addUnitValidation()" style=" background-color: white;">
                <div>
                    <?php  include("errors.php"); ?><br>
                </div>

                <input type="text" hidden value="<?php echo $unitData['unit_id'] ?>" name="unit_id">
                <div style="width: 100%;">
                    <label>Unit Name</label>
                    <input type="text" value="<?php echo $unitData['unit_name'] ?>" name="unit_name" >
                </div><br><br><br><br><br>

                <div style="width: 100%;">
                    <label>Unit Code</label>
                    <input type="text" value="<?php echo $unitData['unit_code'] ?>" name="unit_code" >
                </div><br><br><br><br><br>
                
                <input type="submit" value="Update Unit" name="updateUnit">            
            </form>
        </div>
    </section>
    <script src="js/validation.js"></script>
</body>
</html>