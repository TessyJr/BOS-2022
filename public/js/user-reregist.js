// Reregistration Form Validation
let reregistForm = document.querySelector("#reregist-form");
let linkedinInput = document.querySelector("#linkedin");

let linkedinError = document.querySelector("#linkedin-error");
let linkedinErrorMessage = document.querySelector("#linkedin-error-message");
let githubInput = document.querySelector("#github");
let githubError = document.querySelector("#github-error");
let githubErrorMessage = document.querySelector("#github-error-message");
let lntCourseInput = document.querySelector("#lnt-course");
let lntCourseError = document.querySelector("#lnt-course-error");
let reregistSuccessPopup = document.querySelector("#reregist-success-popup");

async function submitReregist() {
    const reLinkedin =
    /^(((http(s):\/\/www\.)?linkedin\.com\/(pub|in|profile)\/[a-zA-Z0-9-#]{3,}\/?)|((www\.)?linkedin\.com\/(pub|in|profile)\/[a-zA-Z0-9-#]{3,}\/?))$/im;

    const reGithub =
    /^(((http(s):\/\/)?(www\.)?github\.com\/[a-zA-Z0-9-#]{3,}\/?)|(www\.)?(github\.com\/[a-zA-Z0-9-#]{3,}\/?))$/im;
    // /https|www|linkedin|com|in/gm;

    // const reGithub =
    // /https|www|github|\/|com/gm

    let linkedinVal =linkedinInput.value;
    let githubVal = githubInput.value;

        let linkedinUnique = false;
        await axios
        .post("/user/reregister/linkedin", {
            linkedin: linkedinVal,
        })
        .then((res) => (linkedinUnique = res.data.linkedinStatus))
        .catch((err) => (linkedinUnique = false));

        let githubUnique = false;
        await axios.post("/user/reregister/github", {
            github: githubVal,
        })
        .then((res) => (githubUnique = res.data.githubStatus))
        .catch((err) => (githubUnique = false));

    // Linkedin Validation
    if (linkedinInput.value == "") {
        linkedinError.classList.remove("hidden");
        linkedinInput.classList.add("input-error");
        linkedinErrorMessage.innerHTML = "Bagian ini wajib diisi";
    }
    else if (!linkedinInput.value.match(reLinkedin)) {
        linkedinError.classList.remove("hidden");
        linkedinInput.classList.add("input-error");
        linkedinErrorMessage.innerHTML = "URL yang Anda masukkan tidak valid";
    }
    else if (!linkedinUnique) {
        linkedinError.classList.remove("hidden");
        linkedinInput.classList.add("input-error");
        linkedinErrorMessage.innerHTML = "URL yang Anda masukkan sudah terdaftar";
    } else {
        linkedinError.classList.add("hidden");
        linkedinInput.classList.remove("input-error");
    }

    // Github Validation
    if (githubInput.value == "") {
        githubError.classList.remove("hidden");
        githubInput.classList.add("input-error");
        githubErrorMessage.innerHTML = "Bagian ini wajib diisi";
    }
    else if (!githubInput.value.match(reGithub)) {
        githubError.classList.remove("hidden");
        githubInput.classList.add("input-error");
        githubErrorMessage.innerHTML = "URL yang Anda masukkan tidak valid";
    }
    else if (!githubUnique) {
        githubError.classList.remove("hidden");
        githubInput.classList.add("input-error");
        githubErrorMessage.innerHTML = "URL yang Anda masukkan sudah terdaftar";
    } else {
        githubError.classList.add("hidden");
        githubInput.classList.remove("input-error");
    }

    // LnT Course Validation

    if (lntCourseInput.value == "" && lntCourseError) {
        lntCourseError.classList.remove("hidden");
        lntCourseInput.classList.add("input-error");
    } else if(lntCourseError) {
        lntCourseError.classList.add("hidden");
        lntCourseInput.classList.remove("input-error");
    }

    // All
    if (
        linkedinInput.value != "" &&
        linkedinInput.value.match(reLinkedin) &&
        linkedinUnique == true &&
        githubInput.value != "" &&
        githubInput.value.match(reGithub) &&
        githubUnique == true &&
        lntCourseInput.value != ""
    ) {
        reregistForm.submit()
    }
}
