// Countdown
const serverTime = document.querySelector('[name="server-countdown"]').content;
const newDate = new Date(serverTime).getTime();
const countdown = setInterval(() => {
    const date = new Date().getTime();
    const diff = newDate - date;

    const days = Math.floor(
        (diff % (1000 * 60 * 60 * 24 * (365.25 / 12))) / (1000 * 60 * 60 * 24)
    );
    const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((diff % (1000 * 60)) / 1000);

    document.querySelector("#days").innerHTML = days < 10 ? "0" + days : days;
    document.querySelector("#hours").innerHTML =
        hours < 10 ? "0" + hours : hours;
    document.querySelector("#minutes").innerHTML =
        minutes < 10 ? "0" + minutes : minutes;
    document.querySelector("#seconds").innerHTML =
        seconds < 10 ? "0" + seconds : seconds;

    if (date >= newDate) {
        clearInterval(countdown);
        document.querySelector("#days").innerHTML = "00";
    }
}, 1000);

// Email Validation
let popupFailed = document.querySelector("#newsletter-popup-failed");
let popupDuplicate = document.querySelector("#newsletter-popup-duplicate");
let popupSuccess = document.querySelector("#newsletter-popup-success");
let popupEmpty = document.querySelector("#newsletter-popup-empty");

async function validateEmail(e) {
    e.preventDefault();
    let email = document.querySelector("#email");
    let emailValue = email.value;
    let duplicateBool = false;
    const re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    let res = await axios
        .post("/validate", {
            email: emailValue,
        })
        .then((response) => {
            duplicateBool = response.data.duplicate;
        });

    //Duplicate Bool  True = duplikat | false = unik
    if (emailValue.match(re) && !duplicateBool) {
        let form = document.querySelector("#email-form");
        form.submit();
    } else if (emailValue == "") {
        if (typeof popupSuccess != "undefined" && popupSuccess != null) {
            popupSuccess.classList.remove("flex");
            popupSuccess.classList.add("hidden");
        }
        popupDuplicate.classList.remove("flex");
        popupDuplicate.classList.add("hidden");
        popupDuplicate.classList.remove("animate-slide-in-top");

        popupFailed.classList.remove("flex");
        popupFailed.classList.add("hidden");
        popupFailed.classList.remove("animate-slide-in-top");

        popupEmpty.classList.remove("hidden");
        popupEmpty.classList.add("flex");
        popupEmpty.classList.add("animate-slide-in-top");
        email.value = "";
        setTimeout(() => {
            popupEmpty.classList.remove("animate-slide-in-top");
        }, 500);
    } else if (!emailValue.match(re)) {
        if (typeof popupSuccess != "undefined" && popupSuccess != null) {
            popupSuccess.classList.remove("flex");
            popupSuccess.classList.add("hidden");
        }
        popupEmpty.classList.remove("flex");
        popupEmpty.classList.add("hidden");
        popupEmpty.classList.remove("animate-slide-in-top");

        popupDuplicate.classList.remove("flex");
        popupDuplicate.classList.add("hidden");
        popupDuplicate.classList.remove("animate-slide-in-top");

        popupFailed.classList.remove("hidden");
        popupFailed.classList.add("flex");
        popupFailed.classList.add("animate-slide-in-top");
        email.value = "";
        setTimeout(() => {
            popupFailed.classList.remove("animate-slide-in-top");
        }, 500);
    } else if (duplicateBool) {
        if (typeof popupSuccess != "undefined" && popupSuccess != null) {
            popupSuccess.classList.remove("flex");
            popupSuccess.classList.add("hidden");
        }
        popupEmpty.classList.remove("flex");
        popupEmpty.classList.add("hidden");
        popupEmpty.classList.remove("animate-slide-in-top");

        popupFailed.classList.remove("flex");
        popupFailed.classList.add("hidden");
        popupFailed.classList.remove("animate-slide-in-top");

        popupDuplicate.classList.remove("hidden");
        popupDuplicate.classList.add("flex");
        popupDuplicate.classList.add("animate-slide-in-top");
        email.value = "";
        setTimeout(() => {
            popupDuplicate.classList.remove("animate-slide-in-top");
        }, 500);
    }
}

// newsletter popup
function deleteSuccess() {
    playClickSound();
    let newsletterPopupSuccess = document.querySelector(
        "#newsletter-popup-success"
    );
    newsletterPopupSuccess.classList.add("animate-slide-out-top");
    setTimeout(() => {
        newsletterPopupSuccess.classList.add("hidden");
        newsletterPopupSuccess.classList.remove("flex");
        newsletterPopupSuccess.classList.remove("animate-slide-out-top");
    }, 250);
}
function deleteFailed() {
    playClickSound();
    let newsletterPopupFailed = document.querySelector(
        "#newsletter-popup-failed"
    );
    newsletterPopupFailed.classList.add("animate-slide-out-top");
    setTimeout(() => {
        newsletterPopupFailed.classList.add("hidden");
        newsletterPopupFailed.classList.remove("flex");
        newsletterPopupFailed.classList.remove("animate-slide-out-top");
    }, 250);
}
function deleteDuplicate() {
    playClickSound();
    let newsletterPopupDuplicate = document.querySelector(
        "#newsletter-popup-duplicate"
    );
    newsletterPopupDuplicate.classList.add("animate-slide-out-top");
    setTimeout(() => {
        newsletterPopupDuplicate.classList.add("hidden");
        newsletterPopupDuplicate.classList.remove("flex");
        newsletterPopupDuplicate.classList.remove("animate-slide-out-top");
    }, 250);
}
function deleteEmpty() {
    playClickSound();
    let newsletterPopupEmpty = document.querySelector(
        "#newsletter-popup-empty"
    );
    newsletterPopupEmpty.classList.add("animate-slide-out-top");
    setTimeout(() => {
        newsletterPopupEmpty.classList.add("hidden");
        newsletterPopupEmpty.classList.remove("flex");
        newsletterPopupEmpty.classList.remove("animate-slide-out-top");
    }, 250);
}

// music icon
let musicIcon = document.querySelector("#music");
let sizeStatus = 0;

musicIcon.addEventListener("click", function () {
    musicIcon.classList.add("animate-scale-rotate");
    musicIcon.classList.add("pointer-events-none");
    setTimeout(function () {
        musicIcon.classList.remove("animate-scale-rotate");
        if (sizeStatus == 0) {
            musicIcon.classList.remove("opacity-50");
            musicIcon.classList.add("opacity-100");
            sizeStatus = 1;
        } else {
            musicIcon.classList.remove("opacity-100");
            musicIcon.classList.add("opacity-50");
            sizeStatus = 0;
        }
        musicIcon.classList.remove("pointer-events-none");
    }, 500);
});

// loading screen
let loading = document.querySelector("#loading-counter");
loading.innerText = "0%";

let updateCounter = () => {
    let target = +loading.getAttribute("data-target");
    let c = +loading.innerText.replace("%", "");

    let increment = target / 100;

    if (c < target) {
        c += increment;
        loading.innerText = c + "%";
        setTimeout(updateCounter, 15);
    } else {
        loading.innerText = target + "%";
    }
};

updateCounter();

let loadingScreen = document.querySelector("#loading");
setTimeout(function () {
    loadingScreen.style.display = "none";
}, 3000);

// Audio
let audioCtr = 1;
let bgAudio = document.querySelector("#bg-music");
let clickAudio = document.querySelector("#click-music");

function playClickSound() {
    clickAudio.play();
}
musicIcon.addEventListener("click", function () {
    playClickSound();
    if (audioCtr == 1) {
        bgAudio.play();
        audioCtr = 0;
    } else {
        bgAudio.pause();
        audioCtr = 1;
    }
});
