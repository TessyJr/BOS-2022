// copytext
const copyText = (element) => {
    navigator.clipboard.writeText(element.innerText);
    let toolTip = element.firstElementChild;
    toolTip.classList.remove("hidden");

    setTimeout(() => {
        toolTip.classList.add("hidden");
        console.log(1);
    }, 1000);
};

// Close Popups (windows)
window.onclick = function (close) {
    if (
        !dropdownWrapper.contains(close.target) &&
        !menu.classList.contains("hidden")
    ) {
        menu.classList.add("hidden");
    }
    if (
        !regionChangeWrapper.contains(close.target) &&
        !regionChangeMenu.classList.contains("hidden")
    ) {
        regionChangeMenu.classList.add("hidden");
    }
    if (
        !showWrapper.contains(close.target) &&
        !showMenu.classList.contains("hidden")
    ) {
        showMenu.classList.add("hidden");
    }
    // if (close.target == logoutPopup) {
    //     logoutPopup.style.display = "none";
    // }
    // if (close.target == deletePopup) {
    //     deletePopup.style.display = "none";
    // }
};

// Navbar Dropdown
var menu = document.getElementById("menu");
var dropdownWrapper = document.getElementById("dropdown-wrapper");

function navMenu() {
    if (menu.classList.contains("hidden")) {
        menu.classList.remove("hidden");
    } else {
        menu.classList.add("hidden");
    }
}

// Superadmin Region
var regionChangeMenu = document.getElementById("region-change-menu");
var regionChangeWrapper = document.getElementById("region-change-wrapper");

function regionMenu() {
    if (regionChangeMenu.classList.contains("hidden")) {
        regionChangeMenu.classList.remove("hidden");
    } else {
        regionChangeMenu.classList.add("hidden");
    }
}

// Superadmin Status
var statusChangeMenu = document.getElementById("status-change-menu");
var statusChangeWrapper = document.getElementById("status-change-wrapper");

function statusMenu() {
    if (statusChangeMenu.classList.contains("hidden")) {
        statusChangeMenu.classList.remove("hidden");
    } else {
        statusChangeMenu.classList.add("hidden");
    }
}

// Show Qty
var showMenu = document.getElementById("show-menu");
var showWrapper = document.getElementById("show-wrapper");

function showQty() {
    if (showMenu.classList.contains("hidden")) {
        showMenu.classList.remove("hidden");
    } else {
        showMenu.classList.add("hidden");
    }
}

// Logout Popup
let logoutPopup = document.getElementById("logout-popup");
let logoutBtn = document.getElementById("logout-btn");
let logoutKembali = document.getElementById("logout-kembali");

logoutBtn.onclick = function () {
    logoutPopup.style.display = "flex";
};
logoutKembali.onclick = function () {
    logoutPopup.style.display = "none";
};
