// const { default: axios } = require("axios");

const paymentForm = document.querySelector("#payment-form");
const tipeRegistInput = document.querySelector("#tipe-regist");
const tipeRegistNull = document.querySelector("#tipe-regist-null");
const kodeKelompokInput = document.querySelector("#kode-kelompok");
const kodeKelompokInvalid = document.querySelector("#kode-kelompok-invalid");
const kodeKelompokError = document.querySelector("#kode-kelompok-error");
const jadwalBL = document.querySelector("#jadwal-bl");
const konfirmasiJadwalInput = document.querySelector("#konfirmasi-jadwal");
const konfirmasiJadwalNull = document.querySelector("#konfirmasi-jadwal-null");
const buktiTransferInput = document.querySelector("#bukti-transfer");
const buktiTransferNull = document.querySelector("#bukti-transfer-null");

// Tipe Registrasi Validation
function validatePayment1(clickedId) {
    let paymentId = clickedId;

    if (tipeRegistInput.value == "") {
        tipeRegistNull.classList.remove("hidden");
        tipeRegistInput.classList.add("input-error");
    } else if (tipeRegistInput.value == "individual" || tipeRegistInput.value == "group") {
        tipeRegistNull.classList.add("hidden");
        tipeRegistInput.classList.remove("input-error");
        nextForm(paymentId);
    }
}

// Kode Kelompok Validation
async function validatePaymentGroup2(clickedId) {
    let kodeKelompokValue = kodeKelompokInput.value;
    let paymentId = clickedId;

    let status = {}

    await axios.post('/user/group/verify-group', {
        token : kodeKelompokValue
    }).then(data => {status = data.data})

    let token_exist = status.token_exist;

    //true => valid belum lebih dari 3
    //false => tidak valid sudah maks
    // let statusCapacities = {}
    // await axios.post('/user/group/verify-group-capacity', {
    //     token : kodeKelompokValue
    // }).then(data => {statusCapacities = data.data.capacities_status})

    // let token_capacity = statusCapacities.token_capacity;

    let statusCapacities = false;
    await axios
        .post('/user/group/verify-group-capacity', {
        token : kodeKelompokValue
        })
        .then(data => {statusCapacities = data.data.capacities_status})
        .catch((err) => (statusCapacities = false))

    if (kodeKelompokInput.value == "") {
        kodeKelompokInvalid.classList.remove("hidden");
        kodeKelompokInput.classList.add("input-error");
        kodeKelompokError.innerHTML = "Bagian ini wajib diisi"
    }
    // VALIDASI KODE KELOMPOK INVALID
    else if (!token_exist) {
        kodeKelompokInvalid.classList.remove("hidden");
        kodeKelompokInput.classList.add("input-error")
        kodeKelompokError.innerHTML = "Kode kelompok yang Anda masukkan tidak valid"
    } else if (!statusCapacities) {
        kodeKelompokInvalid.classList.remove("hidden");
        kodeKelompokInput.classList.add("input-error")
        kodeKelompokError.innerHTML = "Kode kelompok yang Anda masukkan sudah melebihi kapasitas"
    }
    else {
        kodeKelompokInvalid.classList.add("hidden");
        kodeKelompokInput.classList.remove("input-error");
        nextForm(paymentId);
    }

}

// Konfirmasi Jadwal BL Validation
function validatePaymentIndividual2(clickedId) {
    let paymentId = clickedId;

    if (!konfirmasiJadwalInput.checked) {
        konfirmasiJadwalNull.classList.remove("hidden");
        jadwalBL.classList.add("input-error");
    }
    else {
        konfirmasiJadwalNull.classList.add("hidden");
        jadwalBL.classList.remove("input-error");
        nextForm(paymentId);
    }

}

//  Bukti Transfer Validation
function validatePayment3(clickedId) {
    let paymentId = clickedId;

    if (buktiTransferInput.value == "") {
        buktiTransferNull.classList.remove("hidden");
        buktiTransferSizeError.classList.add("hidden");
        buktiTransferInput.classList.add("input-error");
    }
    else {
        buktiTransferNull.classList.add("hidden");
        buktiTransferInput.classList.remove("input-error");
        paymentForm.submit();
    }
}

var buktiTransferSizeError = document.querySelector("#bukti-transfer-size");

buktiTransferInput.onchange = function() {
    if (this.files[0].size > 2097152) {
        buktiTransferInput.classList.add("input-error");
        buktiTransferNull.classList.add("hidden");
        buktiTransferSizeError.classList.remove("hidden");
        this.value = "";
    } else {
        buktiTransferInput.classList.remove("input-error");
        buktiTransferSizeError.classList.add("hidden");
    }
}


// Next Back Button
let currentForm = 1;
let form1 = document.querySelector("#form-1");
let form2Individual = document.querySelector("#form-2-individual");
let form2Group = document.querySelector("#form-2-group");
let form3 = document.querySelector("#form-3");

function nextForm(clickedId) {
    let paymentId = clickedId;
    if (currentForm == 1 && paymentId == "payment-next-1" && tipeRegistInput.value == "individual") {
        form1.classList.replace("flex", "hidden");
        form2Individual.classList.replace("hidden", "flex");
        currentForm = 2;
    } else if (currentForm == 1 && paymentId == "payment-next-1" && tipeRegistInput.value == "group") {
        form1.classList.replace("flex", "hidden");
        form2Group.classList.replace("hidden", "flex");
        currentForm = 3;
    } else if (currentForm == 2 && paymentId == "payment-next-individual-2") {
        form2Individual.classList.replace("flex", "hidden");
        form3.classList.replace("hidden", "flex");
        currentForm = 4;
    } else if (currentForm == 3 && paymentId == "payment-next-group-2") {
        form2Group.classList.replace("flex", "hidden");
        form3.classList.replace("hidden", "flex");
        currentForm = 4;
    }
}
function previousForm(clickedId) {
    let paymentId = clickedId;

    if (currentForm == 2 && paymentId == "payment-prev-individual-2") {
        form2Individual.classList.replace("flex", "hidden");
        form1.classList.replace("hidden", "flex");
        currentForm = 1;
    } else if (currentForm == 3 && paymentId == "payment-prev-group-2") {
        form2Group.classList.replace("flex", "hidden");
        form1.classList.replace("hidden", "flex");
        currentForm = 1;
    } else if (currentForm == 4 && paymentId == "payment-prev-3" && tipeRegistInput.value == "individual") {
        form3.classList.replace("flex", "hidden");
        form2Individual.classList.replace("hidden", "flex");
        currentForm = 2;
    } else if (currentForm == 4 && paymentId == "payment-prev-3" && tipeRegistInput.value == "group") {
        form3.classList.replace("flex", "hidden");
        form2Group.classList.replace("hidden", "flex");
        currentForm = 3;
    }
}

