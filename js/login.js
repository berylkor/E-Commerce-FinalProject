const container = document.querySelector('.container');
const LoginLink = document.querySelector('.LoginLink');
const SignupLink = document.querySelector('.SignupLink');

SignupLink.addEventListener('click', ()=>{
    container.classList.add('active')
})

LoginLink.addEventListener('click', ()=>{
    container.classList.remove('active')
})

// Form to validate the signup form
function validateSignupForm(event)
{
    let username = document.forms["signupform"]["username"].value;
    let email = document.forms["signupform"]["email"].value;
    let ppassword = document.forms["signupform"]["ppassword"].value;
    let country = document.forms["signupform"]["country"].value;

    // Username Field Validation
    if (username === "") 
    {
        Swal.fire({
            title: "Username must be filled",
            icon: "warning",
        });
        event.preventDefault();
        return;
    } 
    else if (!/^[a-zA-Z]+([' -][a-zA-Z]+)?$/.test(username)) 
    {
        Swal.fire({
            title: "Incorrect Entry",
            text: "Please enter a valid username",
            icon: "warning",
        });
        event.preventDefault();
        return;
    }
    // Email Field Validation
    else if (email === "") 
    {
        Swal.fire({
            title: "Email must be filled",
            icon: "warning",
        });
        event.preventDefault();
        return;
    } 
    else if (!/^[a-z0-9._%+-]+@ashesi\.edu\.gh$/.test(email)) 
    {
        Swal.fire({
            title: "Incorrect Entry",
            text: "Please enter a valid Ashesi email address (ending with @ashesi.edu.gh)",
            icon: "warning",
        });
        event.preventDefault();
        return;
    }
    // Password Field Validation
    else if (ppassword === "") 
    {
        Swal.fire({
            title: "Please enter a password",
            icon: "warning",
        });
        event.preventDefault();
        return;
    } 
    else if (!/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/.test(ppassword)) 
    {
        Swal.fire({
            title: "Incorrect Entry",
            text: "Please enter a valid password",
            icon: "warning",
        });
        event.preventDefault();
        return;
    }
    // Country Field Validation
    else if (country === "") 
    {
        Swal.fire({
            title: "Please enter your country of residence",
            icon: "warning",
        });
        event.preventDefault();
        return;
    }
}

// Form to validate the login form
function validateLoginForm(event)
{
    let email = document.forms["loginform"]["email"].value;
    let ppassword = document.forms["signupform"]["ppassword"].value;

    // Email Field Validation
    if (email === "") 
    {
        Swal.fire({
            title: "Email must be filled",
            icon: "warning",
        });
        event.preventDefault();
        return;
    } 
    else if (!/^[a-z0-9._%+-]+@ashesi\.edu\.gh$/.test(email)) 
    {
        Swal.fire({
            title: "Incorrect Entry",
            text: "Please enter a valid Ashesi email address (ending with @ashesi.edu.gh)",
            icon: "warning",
        });
        event.preventDefault();
        return;
    }
    // Password Field Validation
    else if (ppassword === "") 
    {
        Swal.fire({
            title: "Please enter a password",
            icon: "warning",
        });
        event.preventDefault();
        return;
    } 
    else if (!/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/.test(ppassword)) 
    {
        Swal.fire({
            title: "Incorrect Entry",
            text: "Please enter a valid password",
            icon: "warning",
        });
        event.preventDefault();
        return;
    }
}