

/* Delete Participant Modal */
let deleteParticipantPopup = document.querySelector("#delete-participant-popup");
const deleteTidak = document.querySelector("#delete-tidak");

const openModal = (participantId, type) => {
    var confirm = document.getElementById("confirmDelete");
    confirm.action = "/" + type + "/delete/" + participantId;
    deleteParticipantPopup.style.display = "flex";
};

deleteTidak.onclick = function () {
    deleteParticipantPopup.style.display = "none";
};
