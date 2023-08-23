// toggle password
function togglePassword() {
    let inputPassword = document.querySelector("#kata-sandi");
    let eye1 = document.querySelector("#eye1");
    let eyeSlashed1 = document.querySelector("#eye-slashed1");

    if (inputPassword.type == "text") {
        // hide password
        eye1.classList.replace("block", "hidden");
        eyeSlashed1.classList.replace("hidden", "block");
        inputPassword.type = "password";
    } else if (inputPassword.type == "password") {
        // show password
        eye1.classList.replace("hidden", "block");
        eyeSlashed1.classList.replace("block", "hidden");
        inputPassword.type = "text";
    }
}

function toggleConfirmPassword() {
    let inputConfirmPassword = document.querySelector("#konfirmasi-kata-sandi");
    let eye2 = document.querySelector("#eye2");
    let eyeSlashed2 = document.querySelector("#eye-slashed2");

    if (inputConfirmPassword.type == "text") {
        // hide password
        eye2.classList.replace("block", "hidden");
        eyeSlashed2.classList.replace("hidden", "block");
        inputConfirmPassword.type = "password";
    } else if (inputConfirmPassword.type == "password") {
        // show password
        eye2.classList.replace("hidden", "block");
        eyeSlashed2.classList.replace("block", "hidden");
        inputConfirmPassword.type = "text";
    }
}

// form validation
function validateForm(e) {
    e.preventDefault();
    let inputKataSandi = document.querySelector("#kata-sandi");
    let inputKataSandiValue = inputKataSandi.value;

    let inputKonfirmasiKataSandi = document.querySelector(
        "#konfirmasi-kata-sandi"
    );
    let inputKonfirmasiKataSandiValue = inputKonfirmasiKataSandi.value;

    let invalidKataSandi = document.querySelector("#invalid-kata-sandi");
    let invalidKonfirmasiKataSandi1 = document.querySelector(
        "#invalid-konfirmasi-kata-sandi"
    );
    let successPopup = document.querySelector("#popup-success");

    const rePass =
        /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\~.\/<>?;:"'`!@#$%^&*()\[\]{}_+=|\\-])[A-Za-z\d\~.\/<>?;:"'`!@#$%^&*()\[\]{}_+=|\\-]{8,}$/;

    // validations
    // salah password
    if (!inputKataSandiValue.match(rePass)) {
        invalidKataSandi.classList.replace("hidden", "flex");
        inputKataSandi.classList.replace("border-none", "border-2");
    } else {
        invalidKataSandi.classList.replace("flex", "hidden");
        inputKataSandi.classList.replace("border-2", "border-none");
    }

    // salah konfirmasi password
    if (inputKonfirmasiKataSandiValue != inputKataSandiValue) {
        invalidKonfirmasiKataSandi1.classList.replace("hidden", "flex");
        inputKonfirmasiKataSandi.classList.replace("border-none", "border-2");
    } else {
        invalidKonfirmasiKataSandi1.classList.replace("flex", "hidden");
        inputKonfirmasiKataSandi.classList.replace("border-2", "border-none");
    }

    // validasi semua
    if (
        inputKataSandiValue.match(rePass) &&
        inputKonfirmasiKataSandiValue == inputKataSandiValue
    ) {
        invalidKataSandi.classList.replace("flex", "hidden");
        inputKataSandi.classList.replace("border-2", "border-none");
        invalidKonfirmasiKataSandi1.classList.replace("flex", "hidden");
        inputKonfirmasiKataSandi.classList.replace("border-2", "border-none");

        successPopup.classList.replace("hidden", "flex");
        successPopup.classList.remove("animate-fade-out");
        successPopup.classList.add("animate-fade-in");
    }
}

// submit form
function submitReset() {
    let resetForm = document.querySelector("#reset-form");
    resetForm.submit();
    // tambhain pergi ke login
}
