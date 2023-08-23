function deleteTidakTerdaftar() {
    let popupTidakTerdaftar = document.querySelector("#tidak-terdaftar");
    popupTidakTerdaftar.classList.replace("flex", "hidden");
}
function deleteTidakValid() {
    let popupTidakValid = document.querySelector("#tidak-valid");
    popupTidakValid.classList.add("animate-slide-out-top");
    setTimeout(() => {
        popupTidakValid.classList.replace("flex", "hidden");
        popupTidakValid.classList.remove("animate-slide-out-top");
    }, 200);
}
function deleteSuccess() {
    let popupSuccess = document.querySelector("#popup-success");
    popupSuccess.classList.remove("animate-fade-in");
    popupSuccess.classList.add("animate-fade-out");
    setTimeout(() => {
        popupSuccess.classList.replace("flex", "hidden");
    }, 250);
}

async function validateEmail(e) {
    e.preventDefault();
    let inputForgotEmail = document.querySelector("#forgot-email");
    let inputForgotEmailVal = inputForgotEmail.value;

    let popupTidakValid = document.querySelector("#tidak-valid");
    let popupTidakTerdaftar = document.querySelector("#tidak-terdaftar");
    let popupSuccess = document.querySelector("#popup-success");

    let formForgot = document.querySelector("#forgot-form");

    const re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let msgErrorType = "";
    // validasi email valid
    if (!inputForgotEmailVal.match(re)) {
        // cek kl valid
        inputForgotEmail.value = "";
        popupTidakTerdaftar.classList.replace("flex", "hidden");
        popupTidakValid.classList.replace("hidden", "flex");
        popupTidakValid.classList.add("animate-slide-in-top");
        setTimeout(() => {
            popupTidakValid.classList.remove("animate-slide-in-top");
        }, 500);
    } else {
        let res = await axios
            .post(formForgot.action, {
                email: inputForgotEmailVal,
            })
            .then((res) => {
                msgErrorType = res.data.status;
            })
            .catch((res) => {
                try {
                    msgErrorType = !(res.data.status === undefined)
                        ? "noerror"
                        : "error.email";
                } catch (e) {
                    msgErrorType = "noerror";
                }
            });
        if (msgErrorType == "error.email") {
            // cek kl tidak terdaftar
            //Hayo mau ngapain klo emailnya ga ada
            inputForgotEmail.value = "";
            popupTidakValid.classList.replace("flex", "hidden");
            popupTidakTerdaftar.classList.replace("hidden", "flex");
            popupTidakTerdaftar.classList.add("animate-slide-in-top");
            setTimeout(() => {
                popupTidakTerdaftar.classList.remove("animate-slide-in-top");
            }, 500);
        }
    }

    // validasi kl bener semua
    if (inputForgotEmailVal.match(re) && msgErrorType != "error.email") {
        //bikin ga refresh pas form submit
        // formForgot.submit();

        inputForgotEmail.value = "";
        popupTidakValid.classList.add("animate-slide-out-top");
        popupTidakTerdaftar.classList.add("animate-slide-out-top");
        setTimeout(() => {
            popupTidakValid.classList.replace("flex", "hidden");
            popupTidakValid.classList.remove("animate-slide-out-top");
            popupTidakTerdaftar.classList.replace("flex", "hidden");
            popupTidakTerdaftar.classList.remove("animate-slide-out-top");
        }, 200);
        popupSuccess.classList.replace("hidden", "flex");
        popupSuccess.classList.remove("animate-fade-out");
        popupSuccess.classList.add("animate-fade-in");
        startCountdown();
    }
}

// timer
function startTimer() {
    let presentTime = document.getElementById("timer").innerHTML;
    let countdownTimer = document.querySelector("#countdown-timer");

    let sendBtn = document.querySelector("#btn-send-email");

    if (presentTime == "00:00") {
        countdownTimer.classList.add("hidden");
        sendBtn.classList.remove("opacity-50");
        sendBtn.removeAttribute("disabled", "");
        resendEmail();
    } else {
        let timeArray = presentTime.split(/[:]+/);
        let m = timeArray[0];
        let s = checkSecond(timeArray[1] - 1);
        if (s == 59) {
            m = m - 1;
        }
        if ((m + "").length == 1) {
            m = "0" + m;
        }
        if (m < 0) {
            m = "59";
        }
        document.getElementById("timer").innerHTML = m + ":" + s;
        setTimeout(startTimer, 1000);
    }
}

function checkSecond(sec) {
    if (sec < 10 && sec >= 0) {
        sec = "0" + sec;
    }
    if (sec < 0) {
        sec = "59";
    }
    return sec;
}

// resend email selesai
function resendEmail() {
    let resendEmail = document.querySelector("#resend-email");
    resendEmail.classList.remove("hidden");
}

function startCountdown() {
    let resendEmail = document.querySelector("#resend-email");
    let sendBtn = document.querySelector("#btn-send-email");

    let countdownTimer = document.querySelector("#countdown-timer");
    let countdown = document.querySelector("#timer");

    sendBtn.classList.add("opacity-50");
    sendBtn.setAttribute("disabled", "");

    resendEmail.classList.add("hidden");
    countdownTimer.classList.remove("hidden");
    countdown.innerHTML = "01:30";
    startTimer();
}
