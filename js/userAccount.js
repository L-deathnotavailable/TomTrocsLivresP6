document.addEventListener('DOMContentLoaded', function() {
    const newUserImageLink = document.getElementById('new-user-image-link');
    const imageToUpload = document.getElementById('imageToUpload');
    const submitNewImage = document.getElementById('submit-new-image');

    newUserImageLink.addEventListener('click', function(event) {
        event.preventDefault();
        imageToUpload.click();
    });

    imageToUpload.addEventListener('change', function() {
        submitNewImage.click();
    });
});

