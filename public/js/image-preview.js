function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function() {
        const avatar = document.getElementById('avatar');
        avatar.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}