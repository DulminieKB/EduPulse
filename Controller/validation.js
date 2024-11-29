//check for email address

function  checkEmail() {
    const email = document.getElementById("email").value;
    const filter = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!filter.test(email)) {
      alert("Please provide a valid email address.");
      return false;
    }
    return true;
  }
  

//check for username

  function checkUsername(){
    var username = document.getElementById("username").value;

     //check if the field is empty
    if (username.trim() === "") {
        alert("Username should not be kept empty.");
        return false;
    }
    
    //check for special characters
    if (/[^\w\s]/.test(username)) {
        alert("Username should not include special characters.");
        return false;
    }
    
    //if all requirements are fulfilled
    return true;
}


//check for password

  function checkPassword(){
    var password = document.getElementById("password").value;

    //check for at least 8 characters
    if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        errorDiv.style.color = 'red';
        return false;
    }

    //check for at least one uppercase letter
    if (!/[A-Z]/.test(password)) {
        alert("Password must contain at least one uppercase letter");
        errorDiv.style.color = 'red';
        return false;
    }
  
    //check for at least one lowercase letter
    if (!/[a-z]/.test(password)) {
        alert("Password must contain at least one lowercase letter");
        errorDiv.style.color = 'red';
        return false;
    }
    
    //check for at least one digit
    if (!/\d/.test(password)) {
        alert("Password must contain at least one digit.");
        errorDiv.style.color = 'red';
        return false;
    }
    
    //if all requirements are fulfilled
    return true;
}


//check for confirmpassword

function checkCmPassword() {
    var password = document.getElementById('txtPassword').value;
    var confirmPassword = document.getElementById('txtConfirmPassword').value;

    if (password != confirmPassword) {
      alert('Password and Confirm Password do not match.');
      return false;
    }

    //if all requirements are fulfilled
    return true;
  }


//check for email, username, password and confirm password

    function check(event) {

        const email = document.getElementById("email").value;
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;
      
        const isEmailValid = checkEmail();
        const isUsernameValid = checkUsername();
        const isPasswordValid = checkPassword();
        const isCmPasswordValid = checkCmPassword();
    
        if (!isEmailValid || !isUsernameValid || !isPasswordValid || !isCmPasswordValid) {

            event.preventDefault();
         
            return;
        }
        
    } 
