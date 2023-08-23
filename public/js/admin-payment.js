// let viewPopup = document.querySelector("#view-popup");
let verifyPopup = document.querySelector("#verify-popup");
let rejectPopup = document.querySelector("#reject-popup");

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

// // View Bukti Transfer
// function viewBuktiTransfer(payment) {
//     let imgBuktiTransfer = document.querySelector("#img-bukti-transfer");
//     var urlBuktiTransfer = payment.getAttribute("data-payment-url");

//     imgBuktiTransfer.src = urlBuktiTransfer

//     if (viewPopup.classList.contains("hidden")) {
//         viewPopup.classList.remove("hidden");
//     } else {
//         viewPopup.classList.add("hidden");
//     }
// }

// function closeViewPopup() {
//     if (!viewPopup.classList.contains("hidden")) {
//         viewPopup.classList.add("hidden");
//     }
// }

// Verification Confirmation
function verifyConfirmation() {
    if (verifyPopup.classList.contains("hidden")) {
        verifyPopup.classList.remove("hidden");
    } else {
        verifyPopup.classList.add("hidden");
    }
}

function closeVerificationPopup() {
    if (verifyPopup.classList.contains("hidden")) {
        verifyPopup.classList.remove("hidden");
    } else {
        verifyPopup.classList.add("hidden");
    }
}

// Rejection Confirmation
function rejectConfirmation() {
    if (rejectPopup.classList.contains("hidden")) {
        rejectPopup.classList.remove("hidden");
    } else {
        rejectPopup.classList.add("hidden");
    }
}

function closeRejectPopup() {
    if (rejectPopup.classList.contains("hidden")) {
        rejectPopup.classList.remove("hidden");
    } else {
        rejectPopup.classList.add("hidden");
    }
}

/* Delete Participant Modal */
let deletePaymentPopup = document.querySelector("#delete-payment-popup");
const deleteCancel = document.querySelector("#delete-cancel");

const openDeleteModal = (memberId, type) => {
    var confirmDelete = document.getElementById("confirmDelete");
    confirmDelete.action = "/" + type + "/payment/delete/" + memberId;
    deletePaymentPopup.style.display = "flex";
};

deleteCancel.onclick = function () {
    deletePaymentPopup.style.display = "none";
};

/* Verify Participant Modal */
let verifyPaymentPopup = document.querySelector("#verify-payment-popup");
const verifyCancel = document.querySelector("#verify-cancel");

const openVerifyModal = (memberId, type) => {
    var confirmVerify = document.getElementById("confirmVerify");
    confirmVerify.action = "/" + type + "/payment/approve/" + memberId;
    verifyPaymentPopup.style.display = "flex";
};

verifyCancel.onclick = function () {
    verifyPaymentPopup.style.display = "none";
};

/* Reject Participant Modal */
let rejectPaymentPopup = document.querySelector("#reject-payment-popup");
const rejectCancel = document.querySelector("#reject-cancel");

const openRejectModal = (memberId, type) => {
    var confirmReject = document.getElementById("confirmReject");
    confirmReject.action = "/" + type + "/payment/reject/" + memberId;
    rejectPaymentPopup.style.display = "flex";
};

rejectCancel.onclick = function () {
    rejectPaymentPopup.style.display = "none";
};
