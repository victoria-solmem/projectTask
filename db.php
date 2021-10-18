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
    // DELETE STUDENT
    if(isset($_POST['deleteStudent'])){
        $user_id = mysqli_real_escape_string($con, $_POST['user_id']); 
        // SELECT ALL GRADE USERS
        $gradeQuery  = "SELECT * FROM grade WHERE user_id='$user_id'";
        $gradeResult = mysqli_query($con, $gradeQuery);
        while($grade = $gradeResult->fetch_assoc()) {
           // DELETE GRADE USERS
            $grade_users = "DELETE FROM grade WHERE user_id='$user_id'";
            mysqli_query($con, $grade_users);
        }
        $userQuery  = "DELETE FROM user WHERE user_id='$user_id'";
        $userResult = mysqli_query($con, $userQuery);
        header('Location: student.php');
        $_SESSION['success'] = "Student updated successfully.";
    }
    // UPDATE USER
    if(isset($_POST['updateStudent'])){
        $user_id    =  mysqli_real_escape_string($con, $_POST['user_id']);
        $reg_number = mysqli_real_escape_string($con, $_POST['reg_number']);
        $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
        $last_name  = mysqli_real_escape_string($con, $_POST['last_name']);
        $email      = mysqli_real_escape_string($con, $_POST['email']);
        $query      = "UPDATE user SET reg_number='$reg_number', first_name='$first_name', last_name='$last_name', email='$email' WHERE user_id='$user_id'";
        $results    = mysqli_query($con, $query);
        if ($results) {
            $_SESSION['success'] = "Student updated successfully.";
            header('Location: student.php');
        } else {
            array_push($errors, "Could update your profile");
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
    // DELETE UNIT
    if(isset($_POST['updateUnit'])){
        $unit_id    =  mysqli_real_escape_string($con, $_POST['unit_id']);
        $unit_name = mysqli_real_escape_string($con, $_POST['unit_name']);
        $unit_code = mysqli_real_escape_string($con, $_POST['unit_code']);
        $query      = "UPDATE unit SET unit_name='$unit_name', unit_code='$unit_code' WHERE unit_id='$unit_id'";
        $results    = mysqli_query($con, $query);
        if ($results) {
            $_SESSION['success'] = "Unit updated successfully.";
            header('Location: unit.php');
        } else {
            array_push($errors, "Could update your profile");
        }
    }
    // DELETE UNIT
    if(isset($_POST['deleteUnit'])){
        $unit_id = mysqli_real_escape_string($con, $_POST['unit_id']); 
        // SELECT ALL GRADE UNITS
        $gradeQuery  = "SELECT * FROM grade WHERE unit_id='$unit_id'";
        $gradeResult = mysqli_query($con, $gradeQuery);
        while($grade = $gradeResult->fetch_assoc()) {
           // DELETE GRADE UNITS
            $grade_users = "DELETE FROM grade WHERE unit_id='$unit_id'";
            mysqli_query($con, $grade_users);
        }
        $userQuery  = "DELETE FROM unit WHERE unit_id='$unit_id'";
        $userResult = mysqli_query($con, $userQuery);
        header('Location: unit.php');
        $_SESSION['success'] = "Unit updated successfully.";
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
    // UPDATE SEMESTER
    if(isset($_POST['updateSemester'])){
        $semester_id    =  mysqli_real_escape_string($con, $_POST['semester_id']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $year = mysqli_real_escape_string($con, $_POST['year']);
        $query      = "UPDATE semester SET name='$name', year='$year' WHERE semester_id='$semester_id'";
        $results    = mysqli_query($con, $query);
        if ($results) {
            $_SESSION['success'] = "Semester updated successfully.";
            header('Location: semester.php');
        } else {
            array_push($errors, "Could update your profile");
        }
    }
    // DELETE SEMESTER
    if(isset($_POST['deleteSemester'])){
        $semester_id = mysqli_real_escape_string($con, $_POST['semester_id']); 
        // SELECT ALL GRADE SEMESTER
        $semesterQuery  = "SELECT * FROM grade WHERE semester_id='$semester_id'";
        $semesterResult = mysqli_query($con, $semesterQuery);
        while($grade = $semesterResult->fetch_assoc()) {
           // DELETE SEMESTER UNITS
            $grade_users = "DELETE FROM grade WHERE semester_id='$semester_id'";
            mysqli_query($con, $grade_users);
        }
        $userQuery  = "DELETE FROM semester WHERE semester_id='$semester_id'";
        $userResult = mysqli_query($con, $userQuery);
        header('Location: semester.php');
        $_SESSION['success'] = "Semester updated successfully.";
    }
    //ADD GRADE
    if(isset($_POST['addGrade'])){
        $semester_id = mysqli_real_escape_string($con, $_POST['semester_id']);
        $user_id     = mysqli_real_escape_string($con, $_POST['user_id']);
        $unit_id     = mysqli_real_escape_string($con, $_POST['unit_id']);
        $cat         = mysqli_real_escape_string($con, $_POST['cat']);
        $exam        = mysqli_real_escape_string($con, $_POST['exam']);
        // CHECK IF USER AND SEMESTER AND UNIT ALREADY EXIST 
        $check_query = "SELECT * FROM grade WHERE semester_id='$semester_id' AND user_id='$user_id' AND unit_id='$unit_id'";
        $result      = mysqli_query($con, $check_query);
        if (mysqli_num_rows($result) == 1) { 
            array_push($errors, "This User with this semester and unit already exist. Please update it.");
        }
        if (count($errors) == 0) { 
            $query  = "INSERT INTO grade (semester_id, user_id, cat, exam, unit_id) VALUES('$semester_id', '$user_id', '$cat', '$exam', '$unit_id')";
            $result = mysqli_query($con, $query);
            if($result){
                header('Location: grade.php');
                $_SESSION['success'] = "Grade created successfully.";
            } else{
                array_push($errors,"error connection fail.");
            }  
        } 
    }
    // UPDATE GRADE
    if(isset($_POST['updateGrade'])){
        $grade_id    =  mysqli_real_escape_string($con, $_POST['grade_id']);
        $semester_id = mysqli_real_escape_string($con, $_POST['semester_id']);
        $user_id     = mysqli_real_escape_string($con, $_POST['user_id']);
        $unit_id     = mysqli_real_escape_string($con, $_POST['unit_id']);
        $cat         = mysqli_real_escape_string($con, $_POST['cat']);
        $exam        = mysqli_real_escape_string($con, $_POST['exam']);
        $query       = "UPDATE grade SET semester_id='$semester_id', user_id='$user_id', cat='$cat', exam='$exam', unit_id='$unit_id' WHERE grade_id='$grade_id'";
        $results     = mysqli_query($con, $query);
        if ($results) {
            $_SESSION['success'] = "Grade updated successfully.";
            header('Location: grade.php');
        } else {
            array_push($errors, "Could update");
        }
    }
    // DELETE GRADE
    if(isset($_POST['deleteGrade'])){
        $grade_id = mysqli_real_escape_string($con, $_POST['grade_id']); 
        $gradeQuery  = "DELETE FROM grade WHERE grade_id='$grade_id'";
        mysqli_query($con, $gradeQuery);
        header('Location: grade.php');
        $_SESSION['success'] = "Grade deleted successfully.";
    }

?>