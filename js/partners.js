document.getElementById('confirm_role_btn').addEventListener('click', () => {
    let selectedRole = document.querySelector('input[name="role_option"]:checked');
    
    // Hide all elements initially
    document.getElementById('expert_form').classList.add('hidden');
    document.getElementById('shopper_form').classList.add('hidden');
    document.getElementById('welcome').classList.add('hidden');
    document.getElementById('content').classList.add('hidden'); 

    if (selectedRole) 
    {
        document.getElementById('content').classList.remove('hidden'); 
        document.getElementById('welcome').classList.remove('hidden');
        
        if (selectedRole.value === 'expert') 
        {
            document.getElementById('expert_form').classList.remove('hidden');
        } 
        else if (selectedRole.value === 'shopper') 
        {
            document.getElementById('shopper_form').classList.remove('hidden'); 
        }
    }
}
);
