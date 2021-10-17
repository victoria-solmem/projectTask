// LOGIN INPUT VALIDATION
function loginValidation() {
    var userEmail = document.forms["loginForm"]["userEmail"].value;
    var userPassword = document.forms["loginForm"]["userPassword"].value;
    if(userEmail == '') {
        alert( "Email is required." );
        document.loginForm.userEmail.focus() ;
        return false;
    } else if(userPassword =='') {
        alert("Password is required.");
        document.loginForm.userPassword.focus() ;
        return false;
    }
}


// FORGOT PASSWORD INPUT VALIDATION
function forgotPasswordValidation() {
    var userEmail = document.forms["forgotPasswordForm"]["userEmail"].value;
    if(userEmail =='') {
        alert( "Email is required." );
        document.forgotPasswordForm.userEmail.focus() ;
        return false;
    }
}

// FORGOT PASSWORD INPUT VALIDATION
function profileChangePasswordValidation() {
    var oldPassword = document.forms["profileChangePasswordForm"]["oldPassword"].value;
    var newPassword = document.forms["profileChangePasswordForm"]["newPassword"].value;
    var confirmPassword = document.forms["profileChangePasswordForm"]["confirmPassword"].value;
    if(oldPassword =='') {
        alert( "Old Password is required." );
        document.profileChangePasswordForm.oldPassword.focus() ;
        return false;
    } else if(newPassword =='') {
        alert( "New Password is required." );
        document.profileChangePasswordForm.newPassword.focus() ;
        return false;
    } else if(newPassword.length < 6) {
        alert( "Password should be greater than 6 characters." );
        document.profileChangePasswordForm.newPassword.focus() ;
        return false;
    } else if(confirmPassword == '') {
        alert( "Confirm Password is required." );
        document.profileChangePasswordForm.newPassword.focus() ;
        return false;
    } else if(confirmPassword != newPassword) {
        alert( "Passwords do not match." );
        document.profileChangePasswordForm.confirmPassword.focus() ;
        return false;
    }
}


// FORGOT PASSWORD INPUT VALIDATION
function profileDeleteAccountValidation() {
    var password = document.forms["profileDeleteAccountForm"]["password"].value;
    if(password =='') {
        alert( "Password is required." );
        document.profileDeleteAccountForm.password.focus() ;
        return false;
    }
}


// CREATE ACCOUNT INPUT VALIDATION
function createAccountValidation() {
    var firstName    = document.forms["createAccountForm"]["firstName"].value;
    var lastName     = document.forms["createAccountForm"]["lastName"].value;
    var userEmail    = document.forms["createAccountForm"]["userEmail"].value;
    var userTypeId   = document.forms["createAccountForm"]["userTypeId"].value;
    var userPassword = document.forms["createAccountForm"]["userPassword"].value;
    var confirmUserPassword = document.forms["createAccountForm"]["confirmUserPassword"].value;
    if(firstName =='') {
        alert( "First Name is required." );
        document.createAccountForm.firstName.focus() ;
        return false;
    } else if(lastName == '') {
        alert("Last Name is required.");
        document.createAccountForm.lastName.focus() ;
        return false;
    } else if(userEmail == '') {
        alert("Email is required.");
        document.createAccountForm.userEmail.focus() ;
        return false;
    } else if(userTypeId == '') {
        alert("User Type is required.");
        document.createAccountForm.userTypeId.focus() ;
        return false;
    } else if(userPassword == '') {
        alert("Password is required.");
        document.createAccountForm.userPassword.focus() ;
        return false;
    }
    else if(userPassword.length < 6) {
        alert("Password should be greater than 6 characters.");
        document.createAccountForm.userPassword.focus() ;
        return false;
    } else if(confirmUserPassword=='') {
        alert("Confirm Password is required.");
        document.createAccountForm.confirmUserPassword.focus() ;
        return false;
    } else if(userPassword != confirmUserPassword) {
        alert("Passwords do not match.");
        document.createAccountForm.confirmUserPassword.focus() ;
        return false;
    }
}


// CONTACT INPUT VALIDATION
function contactValidation() {
    var firstName = document.forms["contactForm"]["firstName"].value;
    var lastName  = document.forms["contactForm"]["lastName"].value;
    var email     = document.forms["contactForm"]["email"].value;
    var telephone = document.forms["contactForm"]["telephone"].value;
    var subject   = document.forms["contactForm"]["subject"].value;
    var message   = document.forms["contactForm"]["message"].value;
    if(firstName =='') {
        alert( "First Name is required." );
        document.contactForm.firstName.focus() ;
        return false;
    } else if(lastName=='') {
        alert("Last Name is required.");
       document.contactForm.lastName.focus() ;
        return false;
    } else if(email == '') {
        alert("Email is required.");
      document.contactForm.email.focus() ;
       return false;
    } else if(telephone == '') {
        alert("Telephone is required.");
        document.contactForm.telephone.focus() ;
        return false;
    } else if(subject == '') {
        alert("Subject is required.");
        document.contactForm.subject.focus() ;
        return false;
    } else if(message == '') {
       alert("Message is required.");
       document.contactForm.message.focus() ;
       return false;
    }
}




// INDIVIDUAL INPUT VALIDATION
function indivudialConsumerValidation() {
    var firstName = document.forms["indivudialConsumerForm"]["firstName"].value;
    var lastName  = document.forms["indivudialConsumerForm"]["lastName"].value;
    var email     = document.forms["indivudialConsumerForm"]["email"].value;
    var idOrPassport = document.forms["indivudialConsumerForm"]["idOrPassport"].value;
    var phoneNumber  = document.forms["indivudialConsumerForm"]["phoneNumber"].value;
    var address      = document.forms["indivudialConsumerForm"]["address"].value;
    var ownershipOfProperty = document.forms["indivudialConsumerForm"]["ownershipOfProperty"].value;
    var occupation = document.forms["indivudialConsumerForm"]["occupation"].value;
    var assurance  = document.forms["indivudialConsumerForm"]["assurance"].value;
    if(firstName == '') {
        alert( "First Name is required." );
        document.indivudialConsumerForm.firstName.focus() ;
        return false;
    } else if(lastName=='') {
         alert("Last Name is required.");
       document.indivudialConsumerForm.lastName.focus() ;
        return false;
    } else if(email == '') {
        alert("Email is required.");
      document.indivudialConsumerForm.email.focus() ;
       return false;
    } else if(idOrPassport == '') {
        alert("ID or Passport is required.");
        document.indivudialConsumerForm.idOrPassport.focus() ;
        return false;
    } else if(phoneNumber == '') {
        alert("Phone Number is required.");
      document.indivudialConsumerForm.phoneNumber.focus() ;
       return false;
    } else if(address == '') {
       alert("Address is required.");
       document.indivudialConsumerForm.address.focus() ;
       return false;
    } else if(ownershipOfProperty == '') {
        alert("Ownership Of Property Is Required.");
        document.indivudialConsumerForm.ownershipOfProperty.focus() ;
        return false;
    } else if(occupation == '') {
        alert("Occupation is required.");
        document.indivudialConsumerForm.occupation.focus() ;
        return false;
    } else if(assurance == '') {
        alert("Assurance is required.");
        document.indivudialConsumerForm.assurance.focus() ;
        return false;
    }
}



// COOPERATIVE INPUT VALIDATION
function cooperativeConsumerValidation() {
    var idOrPassport = document.forms["cooperativeConsumerForm"]["idOrPassport"].value;
    var email        = document.forms["cooperativeConsumerForm"]["email"].value;
    var phoneNumber  = document.forms["cooperativeConsumerForm"]["phoneNumber"].value;
    var companyName  = document.forms["cooperativeConsumerForm"]["companyName"].value;
    var address      = document.forms["cooperativeConsumerForm"]["address"].value;
    var businessPermit = document.forms["cooperativeConsumerForm"]["businessPermit"].value;
    var assurance      = document.forms["cooperativeConsumerForm"]["assurance"].value;
    if(idOrPassport =='') {
        alert( "ID or Passport Is Required." );
        document.cooperativeConsumerForm.idOrPassport.focus() ;
        return false;
    } else if(email=='') {
        alert("Email is required.");
        document.cooperativeConsumerForm.email.focus() ;
        return false;
    } else if(phoneNumber == '') {
        alert("Phone Number is required.");
        document.cooperativeConsumerForm.phoneNumber.focus() ;
        return false;
    } else if(address == '') {
        alert("Address is required.");
        document.cooperativeConsumerForm.address.focus() ;
        return false;
    } else if(companyName == '') {
        alert("Company Name is required.");
        document.cooperativeConsumerForm.companyName.focus() ;
        return false;
    }  else if(businessPermit == '') {
       alert("Business Permit is required.");
       document.cooperativeConsumerForm.businessPermit.focus() ;
       return false;
    } else if(assurance == '') {
        alert("Assurance is required.");
        document.cooperativeConsumerForm.assurance.focus() ;
        return false;
    }
}