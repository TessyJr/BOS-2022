// Registration Form Validation
const registForm = document.querySelector("#regist-form");
const emailBinusInput = document.querySelector("#email-binus");
const emailBinusNull = document.querySelector("#email-binus-null");
const emailBinusInvalid = document.querySelector("#email-binus-invalid");
const lntInput = document.querySelector("#lnt");
const ktpInput = document.querySelector("#ktp");
const ktpNull = document.querySelector("#ktp-null");
const ktpInvalid = document.querySelector("#ktp-invalid");
const fypInput = document.querySelector("#fyp");
const fypNull = document.querySelector("#fyp-null");
const suratMemberInput = document.querySelector("#surat-member");
const suratMemberNull = document.querySelector("#surat-member-null");
const jadwalReregistInput = document.querySelector("#jadwal-reregist");
const jadwalReregistNull = document.querySelector("#jadwal-reregist-null");
let registSuccessPopup = document.querySelector("#regist-success-popup");

emailBinusInput.isValid = () => isValidEmail(emailBinusInput.value);
lntInput.isValid = () => !!lntInput.value;
ktpInput.isValid = () => !!ktpInput.value;
fypInput.isValid = () => !!fypInput.value;
suratMemberInput.isValid = () => !!suratMemberInput.value;
jadwalReregistInput.isValid = () => !!jadwalReregistInput.value;

const inputFields = [
    emailBinusInput,
    lntInput,
    ktpInput,
    fypInput,
    suratMemberInput,
    jadwalReregistInput,
];

const isValidEmail = (emailBinus) => {
    const re =
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))+@binus.ac.id$/;
    return re.test(String(emailBinus).toLowerCase());
};

let shouldValidate = false;
let isFormValid = false;

const validateInput = () => {
    if (!shouldValidate) return;

    isFormValid = true;
    inputFields.forEach((input) => {
        input.classList.remove("input-error");
        input.nextElementSibling.classList.add("hidden");

        if (!input.isValid()) {
            input.classList.add("input-error");
            isFormValid = false;
            input.nextElementSibling.classList.remove("hidden");
        }
    });
};

registForm.addEventListener("submit", (e) => {
    e.preventDefault();
    shouldValidate = true;
    validateInput();
    if (isFormValid) {
        if (registSuccessPopup.classList.contains("hidden")) {
            registSuccessPopup.classList.remove("hidden");
        } else {
            registSuccessPopup.classList.add("hidden");
        }

        const myTimeout = setTimeout(function () {
            registForm.submit();
        }, 2000);
    }
});

inputFields.forEach((input) => input.addEventListener("input", validateInput));

// File Size Validation
var ktp = document.querySelector("#ktp");
var ktpSizeError = document.querySelector("#ktp-size");
var fyp = document.querySelector("#fyp");
var fypSizeError = document.querySelector("#fyp-size");
var suratMember = document.querySelector("#surat-member");
var suratMemberSizeError = document.querySelector("#surat-member-size");

ktp.onchange = function () {
    if (this.files[0].size > 2097152) {
        ktpInput.classList.add("input-error");
        ktpSizeError.classList.remove("hidden");
        this.value = "";
    } else {
        ktpInput.classList.remove("input-error");
        ktpSizeError.classList.add("hidden");
    }
};

fyp.onchange = function () {
    if (this.files[0].size > 2097152) {
        fypInput.classList.add("input-error");
        fypSizeError.classList.remove("hidden");
        this.value = "";
    } else {
        fypInput.classList.remove("input-error");
        fypSizeError.classList.add("hidden");
    }
};

suratMember.onchange = function () {
    if (this.files[0].size > 2097152) {
        suratMemberInput.classList.add("input-error");
        suratMemberSizeError.classList.remove("hidden");
        this.value = "";
    } else {
        suratMemberInput.classList.remove("input-error");
        suratMemberSizeError.classList.add("hidden");
    }
};

// // Registration Form Validation (Non-KMG)
// const registForm2 = document.querySelector("#regist-form-2");
// const emailBinusInput2 = document.querySelector("#email-binus-2");
// const emailBinusNull2 = document.querySelector("#email-binus-null-2");
// const emailBinusInvalid2 = document.querySelector("#email-binus-invalid-2");
// const ktpInput2 = document.querySelector("#ktp-2");
// const ktpNull2 = document.querySelector("#ktp-null-2");
// const fypInput2 = document.querySelector("#fyp-2");
// const fypNull2 = document.querySelector("#fyp-null-2");
// const suratMemberInput2 = document.querySelector("#surat-member-2");
// const suratMemberNull2 = document.querySelector("#surat-member-null-2");

// emailBinusInput2.isValid2 = () => isValidEmail(emailBinusInput2.value);
// ktpInput2.isValid2 = () => !!ktpInput2.value;
// fypInput2.isValid2 = () => !!fypInput2.value;
// suratMemberInput2.isValid2 = () => !!suratMemberInput2.value;

// const inputFields2 = [emailBinusInput2, ktpInput2, fypInput2, suratMemberInput2]

// let shouldValidate2 = false;
// let isFormValid2 = false

// const validateInput2 = () => {
//     if (!shouldValidate2) return;

//     isFormValid2 = true;
//     inputFields2.forEach((input) => {
//         input.classList.remove("input-error");
//         input.nextElementSibling.classList.add("hidden");

//         if (!input.isValid2()) {
//             input.classList.add("input-error");
//             isFormValid2 = false;
//             input.nextElementSibling.classList.remove("hidden");
//         };
//     });
// };

// registForm2.addEventListener("submit", (e) => {
//     e.preventDefault();
//     shouldValidate2 = true;
//     validateInput2();
//     if (isFormValid2) {
//         if (registSuccessPopup.classList.contains("hidden")) {
//             registSuccessPopup.classList.remove("hidden")
//         } else {
//             registSuccessPopup.classList.add("hidden");
//         }

//         const myTimeout = setTimeout(function (){
//             registForm2.submit();
//         }, 3000);
//     };
// });

// inputFields2.forEach((input) => input.addEventListener("input", validateInput2));

// // File Size Validation
// var ktp2 = document.querySelector("#ktp-2");
// var ktpSizeError2 = document.querySelector("#ktp-size-2");
// var fyp2 = document.querySelector("#fyp-2");
// var fypSizeError2 = document.querySelector("#fyp-size-2");
// var suratMember2 = document.querySelector("#surat-member-2");
// var suratMemberSizeError2 = document.querySelector("#surat-member-size-2");

// ktp2.onchange = function() {
//     if (this.files[0].size > 5242880) {
//         ktpInput2.classList.add("input-error");
//         ktpSizeError2.classList.remove("hidden");
//         this.value = "";
//     } else {
//         ktpInput2.classList.remove("input-error");
//         ktpSizeError2.classList.add("hidden");
//     }
// }

// fyp2.onchange = function() {
//     if (this.files[0].size > 5242880) {
//         fypInput2.classList.add("input-error");
//         fypSizeError2.classList.remove("hidden");
//         this.value = "";
//     } else {
//         fypInput2.classList.remove("input-error");
//         fypSizeError2.classList.add("hidden");
//     }
// }

// suratMember2.onchange = function() {
//     if (this.files[0].size > 5242880) {
//         suratMemberInput2.classList.add("input-error");
//         suratMemberSizeError2.classList.remove("hidden");
//         this.value = "";
//     } else {
//         suratMemberInput2.classList.remove("input-error");
//         suratMemberSizeError2.classList.add("hidden");
//     }
// }
