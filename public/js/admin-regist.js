// let viewPopupKTP = document.querySelector("#view-popup-ktp");
// let viewPopupFYP = document.querySelector("#view-popup-fyp");
// let viewPopupSuratMR = document.querySelector("#view-popup-surat-mr");
// let deletePopup = document.querySelector("#delete-popup");

/* Delete Participant Modal */
let deleteRegistPopup = document.querySelector("#delete-regist-popup");
const deleteCancel = document.querySelector("#delete-cancel");

const openDeleteModal = (memberId, type) => {
    var confirmDelete = document.getElementById("confirmDelete");
    confirmDelete.action = "/" + type + "/register/delete/" + memberId;
    deleteRegistPopup.style.display = "flex";
};

deleteCancel.onclick = function () {
    deleteRegistPopup.style.display = "none";
};

// // Delete Popup
// function deleteUser() {
//     if (deletePopup.classList.contains("hidden")) {
//         deletePopup.classList.remove("hidden");
//     } else {
//         deletePopup.classList.add("hidden")
//     }
// }

// function closeDeletePopup() {
//     if (!deletePopup.classList.contains("hidden"));
//         deletePopup.classList.add("hidden");
// }

// // View Popup KTP
// function viewKTP(ktp) {
//     let imgKTP = document.querySelector("#img-ktp");
//     var urlKTP = ktp.getAttribute("data-ktp-url");

//     imgKTP.src = urlKTP;

//     if (viewPopupKTP.classList.contains("hidden")) {
//         viewPopupKTP.classList.remove("hidden");
//     } else {
//         viewPopupKTP.classList.add("hidden");
//     }
// }

// function closePopupKTP() {
//     if (!viewPopupKTP.classList.contains("hidden")) {
//         viewPopupKTP.classList.add("hidden");
//     }
// }

// // View Popup FYP
// function viewFYP(FYP) {
//     let imgFYP = document.querySelector("#img-fyp");
//     var urlFYP = FYP.getAttribute("data-fyp-url");

//     imgFYP.src = urlFYP;

//     if (viewPopupFYP.classList.contains("hidden")) {
//         viewPopupFYP.classList.remove("hidden");
//     } else {
//         viewPopupFYP.classList.add("hidden");
//     }
// }

// function closePopupFYP() {
//     if (!viewPopupFYP.classList.contains("hidden")) {
//         viewPopupFYP.classList.add("hidden");
//     }
// }

// // View Popup Surat MR
// function viewSuratMR(ktp) {
//     let imgSuratMR = document.querySelector("#img-surat-mr");
//     var urlSuratMR = ktp.getAttribute("data-suratMR-url");

//     imgSuratMR.src = urlSuratMR;

//     if (viewPopupSuratMR.classList.contains("hidden")) {
//         viewPopupSuratMR.classList.remove("hidden");
//     } else {
//         viewPopupSuratMR.classList.add("hidden");
//     }
// }

// function closePopupSuratMR() {
//     if (!viewPopupSuratMR.classList.contains("hidden")) {
//         viewPopupSuratMR.classList.add("hidden");
//     }
// }
