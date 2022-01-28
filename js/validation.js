// LOGIN INPUT VALIDATION
function loginValidation() {
    var userEmail = document.forms["loginForm"]["userEmail"].value;
    var userPassword = document.forms["loginForm"]["userPassword"].value;
    if(userEmail == '') {
        alert( "Email is required." );
        document.loginForm.userEmail.focus();
        return false;
    } else if(userPassword=='') {
        alert("Password is required.");
        document.loginForm.userPassword.focus() ;
        return false;
    }
}



// ADD STUDENT INPUT VALIDATION
function addStudentValidation() {
    var reg_number = document.forms["addStudentForm"]["reg_number"].value;
    var first_name = document.forms["addStudentForm"]["first_name"].value;
    var last_name = document.forms["addStudentForm"]["last_name"].value;
    var email = document.forms["addStudentForm"]["email"].value;
    if(reg_number == '') {
        alert( "Registration Number is required." );
        document.addStudentForm.reg_number.focus();
        return false;
    } else if(first_name =='') {
        alert("First Name is required.");
        document.addStudentForm.first_name.focus() ;
        return false;
    
    } else if(last_name =='') {
       alert("Last Name is required.");
       document.addStudentForm.last_name.focus() ;
       return false;

    } else if(email =='') {
       alert("Email is required.");
       document.addStudentForm.email.focus() ;
       return false;
    }

}




// ADD UNIT INPUT VALIDATION
function addUnitValidation() {
    var unit_name = document.forms["addUnitForm"]["unit_name"].value;
    var unit_code = document.forms["addUnitForm"]["unit_code"].value;
    if(unit_name == '') {
        alert( "Unit Name is required." );
        document.addUnitForm.unit_name.focus();
        return false;
    } else if(unit_code =='') {
        alert("Unit Code is required.");
        document.addUnitForm.unit_code.focus() ;
        return false;
    }
}



// ADD SEMESTER INPUT VALIDATION
function addSemesterValidation() {
    var name = document.forms["addSemesterForm"]["name"].value;
    var year = document.forms["addSemesterForm"]["year"].value;
    if(name == '') {
        alert( " Name is required." );
        documentaddSemesterForm.name.focus();
        return false;
    } else if(year =='') {
        alert("year is required.");
        document.addSemesterForm.year.focus() ;
        return false;
    }
}



// ADD GRADE INPUT VALIDATION
function addGradeValidation() {
    var semester_id = document.forms["addGradeForm"]["semester_id"].value;
    var user_id = document.forms["addGradeForm"]["user_id"].value;
    var unit_id = document.forms["addGradeForm"]["unit_id"].value;
    var cat = document.forms["addGradeForm"]["cat"].value;
    var exam = document.forms["addGradeForm"]["exam"].value;
    if(semester_id == '') {
        alert( "Semester is required." );
        document.addGradeForm.semester_id.focus();
        return false;
    } else if(user_id =='') {
        alert("User is required.");
        document.addGradeForm.user_id.focus() ;
        return false;
    
    } else if(unit_id =='') {
       alert(" Unit_id is required.");
       document.addGradeForm.unit_id.focus() ;
       return false;

    } else if(cat =='') {
       alert("Cat is required.");
       document.addGradeForm.cat.focus() ;
       return false;

    } else if(exam =='') {
        alert("Exam is required.");
        document.addGradeForm.exam.focus() ;
        return false;
    }

}


