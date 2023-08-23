/* Delete Participant Modal */
let deleteRegistPopup = document.querySelector("#delete-regist-popup");
const deleteCancel = document.querySelector("#delete-cancel");

const openDeleteModal = (memberId, type) => {
    var confirmDelete = document.getElementById("confirmDelete");
    confirmDelete.action = "/" + type + "/reregister/delete/" + memberId;
    deleteRegistPopup.style.display = "flex";
};

deleteCancel.onclick = function () {
    deleteRegistPopup.style.display = "none";
};
