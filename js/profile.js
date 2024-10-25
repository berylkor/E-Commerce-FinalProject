// Get the elements
const profileImage = document.getElementById('profileimage');
const uploadicon = document.getElementById('upload');
const imageInput = document.getElementById('imageinput');

// When the icon is clicked, select the iimage input
uploadicon.addEventListener('click', function() {
    imageInput.click();
});

// When a file is selected, update the profile image
imageInput.addEventListener('change', function() {
    const file = imageInput.files[0];
    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            profileImage.src = e.target.result;
        };
        
        reader.readAsDataURL(file); // Read the selected file as a data URL
    }
});
