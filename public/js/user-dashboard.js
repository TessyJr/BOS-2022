// Close Popups
window.onclick = function (close) {
    if (
        !dropdownWrapper.contains(close.target) &&
        !navMenu.classList.contains("hidden")
    ) {
        navMenu.classList.add("hidden");
    }
    if (
        !sidebarWrapper.contains(close.target) &&
        !sideMenu.classList.contains("hidden")
    ) {
        sideMenu.classList.add("hidden");
    }
    if (close.target == logoutPopup) {
        logoutPopup.style.display = "none";
    }
    if (close.target == reschedulePopup) {
        reschedulePopup.style.display = "none";
    }
    // if (close.target == schedulePopup) {
    //     schedulePopup.style.display = "none";
    // }
};

let closeSideMenu = document.getElementById("close-side-menu");

closeSideMenu.onclick = function () {
    if (!sideMenu.classList.contains("hidden")) {
        sideMenu.classList.add("hidden");
    }
};

// Navbar Dropdown
var navMenu = document.getElementById("nav-menu");
var dropdownWrapper = document.getElementById("dropdown-wrapper");

function navbarMenu() {
    if (navMenu.classList.contains("hidden")) {
        navMenu.classList.remove("hidden");
    } else {
        navMenu.classList.add("hidden");
    }
}

// Sidebar
var sideMenu = document.getElementById("side-menu");
var sidebarWrapper = document.getElementById("sidebar-wrapper");

function sidebarMenu() {
    if (sideMenu.classList.contains("hidden")) {
        sideMenu.classList.remove("hidden");
    } else {
        sideMenu.classList.add("hidden");
    }
}

// Logout Popup
let logoutPopup = document.getElementById("logout-popup");
let logoutBtn = document.getElementById("logout-btn");
let logoutTabletBtn = document.getElementById("logout-tablet-btn");
let logoutKembali = document.getElementById("logout-kembali");

logoutBtn.onclick = function () {
    logoutPopup.style.display = "flex";
};
logoutTabletBtn.onclick = function () {
    logoutPopup.style.display = "flex";
};
logoutKembali.onclick = function () {
    logoutPopup.style.display = "none";
};

// Reschedule Popup
let reschedulePopup = document.getElementById("reschedule-popup");
let rescheduleSubmit = document.getElementById("reschedule-submit");
// let rescheduleInput = document.getElementById("bncclaunching_reschedule");
// let trialclassInput = document.getElementById("trialclass_reschedule");

// rescheduleSubmit.onclick = function (e) {
//     if (rescheduleInput.value == "") {
//         e.preventDefault();
//     } else {
//         reschedulePopup.style.display = "flex";
//     }
// };

function submitReschedule() {
    reschedulePopup.style.display = "flex";
}

// Survey Validation
function validateSurvey(e) {
    e.preventDefault();

    let surveyPopup = document.getElementById("survey-popup");
    let surveyForm = document.getElementById("survey-form");
    let surveyInput = document.querySelectorAll("input[type='checkbox']");
    let surveyError = document.getElementById("survey-error");
    let igPopup = document.getElementById("ig-popup");

    let validSurvey = false;

    for (let i = 0; i < surveyInput.length; i++) {
        if (surveyInput[i].checked) {
            validSurvey = true;
            break;
        }
    }
    if (validSurvey == false) {
        surveyError.classList.remove("hidden");
    } else {
        surveyError.classList.add("hidden");
        surveyForm.submit();
        surveyPopup.classList.add("hidden");
        igPopup.classList.remove("hidden");
    }
}

// Validasi IG
async function validateIg(e) {
    e.preventDefault();

    let igForm = document.getElementById("ig-form");
    let igInput = document.getElementById("instagram");
    let igError = document.getElementById("ig-error");
    let igErrorContent = document.getElementById("ig-error-content");
    let agamaPopup = document.getElementById("agama-popup");

    // Validasi Instagram
    const reInstagram = /^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/gim;

    let data = false;
    let post_status = await axios
        .post("/register/validate/instagram", { instagram: igInput.value })
        .then((res) => {
            data = res.data.instagramStatus;
        });

    //Jika data true maka unik, udah tau lah ya klo false artinya apa
    if (igInput.value == "") {
        igError.classList.remove("hidden");
        igInput.classList.replace("border-none", "border-2");
        igErrorContent.innerHTML = "Bagian ini wajib diisi";
    } else if (data == false) {
        igError.classList.remove("hidden");
        igInput.classList.replace("border-none", "border-2");
        igErrorContent.innerHTML =
            "Username Instagram yang Anda masukkan sudah terdaftar";
    } else if (igInput.value[0] == "@") {
        igError.classList.remove("hidden");
        igInput.classList.replace("border-none", "border-2");
        igErrorContent.innerHTML = "Masukkan username Instagram tanpa awalan @";
    } else if (!igInput.value.match(reInstagram)) {
        igError.classList.remove("hidden");
        igInput.classList.replace("border-none", "border-2");
        igErrorContent.innerHTML =
            "Username Instagram yang Anda masukkan tidak valid";
    } else {
        igError.classList.add("hidden");
        igInput.classList.replace("border-2", "border-none");
    }

    if (
        igInput.value != "" &&
        igInput.value[0] != "@" &&
        igInput.value.match(reInstagram) &&
        data == true
    ) {
        igError.classList.add("hidden");
        igForm.submit();
        agamaPopup.classList.remove("hidden");
    }
}

// Validasi Agama
async function validateAgama(e) {
    e.preventDefault();

    let agamaForm = document.getElementById("agama-form");
    let agamaInput = document.getElementById("agama");
    let agamaError = document.getElementById("agama-error");
    let reminderPopup = document.getElementById("reminder-popup");

    // Validasi Agama
    if (agamaInput.value == "") {
        agamaError.classList.remove("hidden");
        agamaInput.classList.replace("border-none", "border-2");
    } else {
        agamaError.classList.add("hidden");
        agamaInput.classList.replace("border-2", "border-none");
    }

    if (agamaInput.value != "") {
        agamaError.classList.add("hidden");
        agamaForm.submit();
        reminderPopup.classList.remove("hidden");
    }
}

// Reregist Reschedule Validation
function submitReregistReschedule() {
    let reregistRescheduleForm = document.querySelector(
        "#reregist-reschedule-form"
    );
    let reregistRescheduleInput = document.querySelector(
        "#reregist_reschedule"
    );
    let reregistRescheduleNull = document.querySelector(
        "#reregist-reschedule-null"
    );

    if (reregistRescheduleInput.value == "") {
        reregistRescheduleInput.classList.add("input-error");
        reregistRescheduleNull.classList.remove("hidden");
    } else {
        reregistRescheduleInput.classList.remove("input-error");
        reregistRescheduleNull.classList.add("hidden");
        reschedulePopup.classList.remove("hidden");

        const myTimeout = setTimeout(function () {
            reregistRescheduleForm.submit();
        }, 2000);
    }
}

// Calendar
const date = new Date();

const renderCalendar = () => {
    date.setDate(1);

    const monthDays = document.querySelector(".days");

    const lastDay = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDate();

    const prevLastDay = new Date(
        date.getFullYear(),
        date.getMonth(),
        0
    ).getDate();

    const firstDayIndex = date.getDay();

    const lastDayIndex = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDay();

    const nextDays = 7 - lastDayIndex - 1;

    const months = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember",
    ];

    document.querySelector(".date h1").innerHTML = months[date.getMonth()];

    let days = "";

    for (let x = firstDayIndex; x > 0; x--) {
        days += `<div class="prev-date">${prevLastDay - x + 1}</div>`;
    }

    let launchDate = new Date(
        document.querySelector('[name="schedule"]').content
    );

    let reregistDate = new Date(
        document.querySelector('[name="reregister_schedule"]').content
    );

    for (let i = 1; i <= lastDay; i++) {
        if (
            i === new Date().getDate() &&
            date.getMonth() === new Date().getMonth()
        ) {
            days += `<div class="today">${i}</div>`;
        } else if (
            i === launchDate.getDate() &&
            date.getMonth() === launchDate.getMonth()
        ) {
            days += `<div class="bg-mainblue rounded-full text-white">${i}</div>`;
        } else if (
            i === reregistDate.getDate() &&
            date.getMonth() === reregistDate.getMonth()
        ) {
            days += `<div class="bg-[#3171d3] rounded-full text-white">${i}</div>`;
        } else {
            days += `<div>${i}</div>`;
        }
    }

    for (let j = 1; j <= nextDays; j++) {
        days += `<div class="next-date">${j}</div>`;
        monthDays.innerHTML = days;
    }
};

document.querySelector(".prev").addEventListener("click", () => {
    date.setMonth(date.getMonth() - 1);
    renderCalendar();
});

document.querySelector(".next").addEventListener("click", () => {
    date.setMonth(date.getMonth() + 1);
    renderCalendar();
});

renderCalendar();

// // Schedule Popup
// let schedulePopup = document.getElementById("schedule-popup");
// let scheduleSubmit = document.getElementById("schedule-submit");

// scheduleSubmit.onclick = function () {
//     schedulePopup.style.display = "flex";
// };

function changeTrialClassMKG() {
    if (
        document.querySelector("#bncclaunching_reschedule").value ==
        "Kamis, 15 September 2022 (10.00 - 12.00) - UI/UX Design"
    ) {
        document.querySelector("#trialclass_reschedule").innerHTML =
            '<option selected value="Kamis, 15 September 2022 (10.00 - 12.00) - UI/UX Design">Kamis, 15 September 2022 (10.00 - 12.00) - UI/UX Design</option>';
    } else if (
        document.querySelector("#bncclaunching_reschedule").value ==
        "Kamis, 15 September 2022 (13.00 - 15.00) - Front-End Development"
    ) {
        document.querySelector("#trialclass_reschedule").innerHTML =
            '<option selected value="Kamis, 15 September 2022 (13.00 - 15.00) - Front-End Development">Kamis, 15 September 2022 (13.00 - 15.00) - Front-End Development</option>';
    }
}

function changeTrialClassALS() {
    if (
        document.querySelector("#bncclaunching_reschedule").value ==
        "Kamis, 15 September 2022 (10.00 - 12.00) - C Programming Trial Class"
    ) {
        document.querySelector("#trialclass_reschedule").innerHTML =
            '<option selected value="Kamis, 15 September 2022 (10.00 - 12.00) - C Programming Trial Class">Kamis, 15 September 2022 (10.00 - 12.00) - C Programming Trial Class</option>';
    } else if (
        document.querySelector("#bncclaunching_reschedule").value ==
        "Kamis, 15 September 2022 (13.00 - 15.00) - Java Programming"
    ) {
        document.querySelector("#trialclass_reschedule").innerHTML =
            '<option selected value="Kamis, 15 September 2022 (13.00 - 15.00) - Java Programming">Kamis, 15 September 2022 (13.00 - 15.00) - Java Programming</option>';
    } else if (
        document.querySelector("#bncclaunching_reschedule").value ==
        "Jumat, 16 September 2022 (10.00 - 12.00) - Front-End Development"
    ) {
        document.querySelector("#trialclass_reschedule").innerHTML =
            '<option selected value="Jumat, 16 September 2022 (10.00 - 12.00) - Front-End Development">Jumat, 16 September 2022 (10.00 - 12.00) - Front-End Development</option>';
    } else if (
        document.querySelector("#bncclaunching_reschedule").value ==
        "Jumat, 16 September 2022 (13.00 - 15.00) - UI/UX Design"
    ) {
        document.querySelector("#trialclass_reschedule").innerHTML =
            '<option selected value="Jumat, 16 September 2022 (13.00 - 15.00) - UI/UX Design">Jumat, 16 September 2022 (13.00 - 15.00) - UI/UX Design</option>';
    }
}

// close reminder
function closeReminder(element) {
    element.parentElement.parentElement.classList.add("hidden");
}
