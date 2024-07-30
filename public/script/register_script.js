function togglePassword(id) {
    var input = document.getElementById(id);
    var icon = input.nextElementSibling.querySelector('img');
    if (input.type === "password") {
        input.type = "text";
        icon.src = "https://img.icons8.com/ios-filled/20/000000/invisible.png"; // change icon to hide
    } else {
        input.type = "password";
        icon.src = "https://img.icons8.com/ios-filled/20/000000/visible.png"; // change icon to show
    }
}