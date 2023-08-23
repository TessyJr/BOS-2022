// validation login
function validateLogin(e) {
    e.preventDefault();

    let loginForm = document.querySelector("#login-form");

    let validasiEmail = document.querySelector("#email-validation");
    let validasiEmailContent = document.querySelector(
        "#email-validation-content"
    );
    let validasiPassword = document.querySelector("#password-validation");
    let validasiPasswordContent = document.querySelector(
        "#password-validation-content"
    );

    let loginEmail = document.querySelector("#input-email");
    let loginEmailValue = loginEmail.value;

    let loginPassword = document.querySelector("#input-password");
    let loginPasswordValue = loginPassword.value;

    const re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    // validasi email
    if (loginEmailValue == "") {
        // email tidak diisi
        validasiEmail.classList.remove("hidden");
        loginEmail.classList.replace("border-none", "border-2");
        validasiEmailContent.innerHTML = "Bagian ini wajib diisi";
    } else if (!loginEmailValue.match(re)) {
        // email tidak valid
        validasiEmail.classList.remove("hidden");
        loginEmail.classList.replace("border-none", "border-2");
        validasiEmailContent.innerHTML =
            "Email pribadi yang Anda masukkan salah";
    } else {
        validasiEmail.classList.add("hidden");
        loginEmail.classList.replace("border-2", "border-none");
    }
    // tambahin Email belum terdaftar

    // validasi password
    if (loginPasswordValue == "") {
        // password tidak diisi
        validasiPassword.classList.remove("hidden");
        loginPassword.classList.replace("border-none", "border-2");
        validasiPasswordContent.innerHTML = "Bagian ini wajib diisi";
    } else {
        validasiPassword.classList.add("hidden");
        loginPassword.classList.replace("border-2", "border-none");
    }
    // tambahin password salah

    if (
        loginEmailValue != "" &&
        loginEmailValue.match(re) &&
        loginPasswordValue != ""
    ) {
        loginForm.submit();
    }
}

// see password
function togglePassword() {
    let inputPassword = document.querySelector("#input-password");
    let eye = document.querySelector("#eye");
    let eyeSlashed = document.querySelector("#eye-slashed");

    if (inputPassword.type == "text") {
        // hide password
        eye.classList.replace("block", "hidden");
        eyeSlashed.classList.replace("hidden", "block");
        inputPassword.type = "password";
    } else if (inputPassword.type == "password") {
        // show password
        eye.classList.replace("hidden", "block");
        eyeSlashed.classList.replace("block", "hidden");
        inputPassword.type = "text";
    }
}
