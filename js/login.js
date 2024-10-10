const container = document.querySelector('.container');
const LoginLink = document.querySelector('.LoginLink');
const SignupLink = document.querySelector('.SignupLink');

SignupLink.addEventListener('click', ()=>{
    container.classList.add('active')
})

LoginLink.addEventListener('click', ()=>{
    container.classList.remove('active')
})