const pwShowHide = document.querySelectorAll(".icon-a");

pwShowHide.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", () => {
        let pwField = eyeIcon.previousElementSibling;
        if (pwField.type === "password") {
            pwField.type = "text";
            eyeIcon.classList.replace("bx-hide", "bx-show");
        } else {
            pwField.type = "password";
            eyeIcon.classList.replace("bx-show", "bx-hide");
        }
    });
});

function handleCredentialResponse(response) {
    console.log("Encoded JWT ID token: " + response.credential);
}
