document.getElementById('levelform').addEventListener('submit', function (event) {
    const radios = document.querySelectorAll('input[name="privilege"]');
    // initialise the variable to false
    let isChecked = false;

    // Check if any radio button is selected
    radios.forEach((radio) => {
        if (radio.checked) {
            isChecked = true;
        }
    });

    // Prevent form submission if no radio button is selected
    if (!isChecked) 
    {
        // Stop form submission
        event.preventDefault(); 
        // alert the user to select one of the privilege options
        alert('Please select a privilege before submitting the form.');
    }
});
document.getElementById('levelform').addEventListener('submit', function (event) {
    const radios = document.querySelectorAll('input[name="privilege"]');
    // initialise the variable to false
    let isChecked = false;

    // Check if any radio button is selected
    radios.forEach((radio) => {
        if (radio.checked) {
            isChecked = true;
        }
    });

    // Prevent form submission if no radio button is selected
    if (!isChecked) 
    {
        // Stop form submission
        event.preventDefault(); 
        // alert the user to select one of the privilege options
        alert('Please select a privilege before submitting the form.');
    }
});