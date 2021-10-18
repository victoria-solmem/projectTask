
<?php 
	require_once('db.php');
?>
  <!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Unit</title>
    <link rel="stylesheet" href="css/dashboard.css">
    
</head>
<body>
<?php include('menu.php'); ?>

    <section class="banner">
        <div class="banner-left">
            Unit
        </div>
    </section>
    <section>
    <button class="btn"
            style="float: right; right: 10px; position: absolute; background-color: #2dd36f; margin-top: -48px;">
            <a href="unit-add.php" style="color: white;">
                Add Unit</a>
        </button>
        <div>
            <?php  include("success.php"); ?><br>
        </div>
        <table id="customers">
            <tr>
                <th>Unit Name</th>
                <th>Unit Code</th>
                <th>Date</th>
                <th>Delete</th>
            <tr>
            
            <?php
                $studentQuery  = "SELECT * FROM unit ORDER BY created_at DESC";
                $studentResult = mysqli_query($con, $studentQuery);
                while($row = $studentResult->fetch_assoc()) {
                    ?>
                        <tr>
                            <td><a href="unit-update.php?id=<?php echo $row['unit_id'] ?>"><?php echo $row['unit_name'] ?></a></td>
                            <td><?php echo $row['unit_code'] ?></td>
                            <td><?php echo date('M d Y',strtotime($row['created_at'])) ?></td>
                            <td>
                            <form method="POST">
                                <input type="text" hidden value="<?php echo $row['unit_id'] ?>" name="unit_id">
                                <input type="submit" style="background-color: transparent; color:red; margin-top:-2px;" name="deleteUnit" value="Delete">                       
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