// Filtering Reviews by Themed Sections
document.querySelectorAll('input[name="theme"]').forEach((radio) => {
    radio.addEventListener('change', (event) => {
        const selectedValue = event.target.value;

        // Hide all reviews first
        document.querySelectorAll('.list_container').forEach((section) => {
            section.style.display = 'none';
        });

        // Show all review sections if all is selected
        if (selectedValue === 'all') 
        {
            document.querySelectorAll('.list_container').forEach((section) => {
                section.style.display = 'block';
            });
        } 
        else
         {
            // Show the selected review section only
            document.getElementById(selectedValue).style.display = 'block';
        }
    });
});

// Optional: Set default visibility
document.querySelectorAll('.list_container').forEach((section) => {
    section.style.display = 'block'; 
});