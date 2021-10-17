<?php 
    session_start();
    $errors = array();
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "projecttask";
    $con = mysqli_connect($host,$user,$password,$dbname);
    if(!$con){
        die("connection failed: ".mysqli_connect_error());
    }


    //USER LOGIN
    if(isset($_POST['UserLogin'])){
        $userEmail     = mysqli_real_escape_string($con, $_POST['userEmail']);
        $userPassword  = mysqli_real_escape_string($con, $_POST['userPassword']);
        $userPasswordhashed = crypt($userPassword, "salt@#.com");

        $query  = "SELECT * FROM user WHERE email='$userEmail' AND password='$userPasswordhashed'";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) == 1){
            header('Location: student.php');
        } else {
            array_push($errors,"Wrong email/password combination.");
        }
    }

    //ADD STUDENT
    if(isset($_POST['addStudent'])){
        $reg_number = mysqli_real_escape_string($con, $_POST['reg_number']);
        $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
        $last_name  = mysqli_real_escape_string($con, $_POST['last_name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        // CHECK IF REG NUMBER OR EMAIL ALREADY EXIST 
        $user_check_query = "SELECT * FROM user WHERE reg_number='$reg_number' OR email='$email' LIMIT 1";
        $result           = mysqli_query($con, $user_check_query);
        $user             = mysqli_fetch_assoc($result);
        if ($user) { 
            if ($user['reg_number'] === $reg_number) { array_push($errors, "Registration Number already exists"); }
            if ($user['email'] === $email) { array_push($errors, "Email already exists"); }
        }
        if (count($errors) == 0) { 
            $query  = "INSERT INTO user (reg_number, first_name, last_name, email) VALUES('$reg_number', '$first_name', '$last_name', '$email')";
            $result = mysqli_query($con, $query);
            if($result){
                header('Location: student.php');
                $_SESSION['success'] = "Student created successfully.";
            } else{
                array_push($errors,"error connection fail.");
            }  
        } 
    }


    //ADD UNIT
    if(isset($_POST['addUnit'])){
        $unit_name = mysqli_real_escape_string($con, $_POST['unit_name']);
        $unit_code = mysqli_real_escape_string($con, $_POST['unit_code']);
        // CHECK IF UNIT NAME OR UNIT CODE ALREADY EXIST 
        $unit_check_query = "SELECT * FROM unit WHERE unit_name='$unit_name' OR unit_code='$unit_code' LIMIT 1";
        $result           = mysqli_query($con, $unit_check_query);
        $user             = mysqli_fetch_assoc($result);
        if ($user) { 
            if ($user['unit_name'] === $unit_name) { array_push($errors, "Unit Name already exists"); }
            if ($user['unit_code'] === $unit_code) { array_push($errors, "Unit Code already exists"); }
        }
        if (count($errors) == 0) { 
            $query  = "INSERT INTO unit (unit_name, unit_code) VALUES('$unit_name', '$unit_code')";
            $result = mysqli_query($con, $query);
            if($result){
                header('Location: unit.php');
                $_SESSION['success'] = "Unit created successfully.";
            } else{
                array_push($errors,"error connection fail.");
            }  
        } 
    }

    //ADD SEMESTER
    if(isset($_POST['addSemester'])){
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $year = mysqli_real_escape_string($con, $_POST['year']);
        // CHECK IF NAME AND YEAR ALREADY EXIST 
        $unit_check_query = "SELECT * FROM semester WHERE name='$name' AND year='$year'";
        $result           = mysqli_query($con, $unit_check_query);
        if (mysqli_num_rows($result) == 1) { 
            array_push($errors, "This semester already exists");
        }
        if (count($errors) == 0) { 
            $query  = "INSERT INTO semester (name, year) VALUES('$name', '$year')";
            $result = mysqli_query($con, $query);
            if($result){
                header('Location: semester.php');
                $_SESSION['success'] = "Semester created successfully.";
            } else{
                array_push($errors,"error connection fail.");
            }  
        } 
    }

    //ADD SEMESTER
    if(isset($_POST['addGrade'])){
        $semester_id = mysqli_real_escape_string($con, $_POST['semester_id']);
        $user_id     = mysqli_real_escape_string($con, $_POST['user_id']);
        $unit_id     = mysqli_real_escape_string($con, $_POST['unit_id']);
        $cat_1       = mysqli_real_escape_string($con, $_POST['cat_1']);
        $cat_2       = mysqli_real_escape_string($con, $_POST['cat_2']);
        $exam        = mysqli_real_escape_string($con, $_POST['exam']);
        // CHECK IF USER AND SEMESTER AND UNIT ALREADY EXIST 
        $check_query = "SELECT * FROM grade WHERE semester_id='$semester_id' AND user_id='$user_id' AND unit_id='$unit_id'";
        $result      = mysqli_query($con, $check_query);
        if (mysqli_num_rows($result) == 1) { 
            array_push($errors, "This User with this semester and unit already exist. Please update it.");
        }
        if (count($errors) == 0) { 
            $query  = "INSERT INTO grade (semester_id, user_id, cat_1, cat_2, exam, unit_id) VALUES('$semester_id', '$user_id', '$cat_1', '$cat_2', '$exam', '$unit_id')";
            $result = mysqli_query($con, $query);
            if($result){
                header('Location: grade.php');
                $_SESSION['success'] = "Grade created successfully.";
            } else{
                array_push($errors,"error connection fail.");
            }  
        } 
    }

?>