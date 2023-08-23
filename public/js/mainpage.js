// parallex background
let heroRock = document.querySelector("#hero-rock");
let aboutusRock = document.querySelector("#aboutus-rock");
let cloud = document.querySelector("#cloud");
let mountain = document.querySelector("#mountain");
let stars = document.querySelector("#stars");
let leftHex = document.querySelector("#hex-left");
let rightHex = document.querySelector("#hex-right");
let aboutSmallRockTop = document.querySelector("#aboutus-rocks-top");
let aboutSmallRockBottom = document.querySelector("#aboutus-rocks-bottom");
let videoRockLeft = document.querySelector("#video-rock-left");
let videoRockRight = document.querySelector("#video-rock-right");
let funfactRockLeft = document.querySelector("#funfact-rock-left");
let funfactRockRight = document.querySelector("#funfact-rock-right");

let heroContent = document.querySelector("#hero-content");

window.addEventListener("scroll", function () {
    let value = window.scrollY;

    heroRock.style.bottom = value * 0 + "px";
    heroContent.style.marginTop = value * 1.5 + "px";
    cloud.style.top = -value * 0.2 + "px";
    stars.style.top = -value * 0.2 + "px";
    mountain.style.bottom = -value * 0.2 + "px";
    leftHex.style.left = -value * 0.5 + "px";
    rightHex.style.right = -value * 0.5 + "px";
    aboutSmallRockTop.style.top = -value * 0.5 + 500 + "px";
    aboutSmallRockBottom.style.bottom = value * 0.3 - 200 + "px";
    videoRockLeft.style.bottom = value * 0.7 - 1200 + "px";
    videoRockRight.style.bottom = value * 0.7 - 800 + "px";
    funfactRockLeft.style.bottom = value * 0.7 - 2000 + "px";
    funfactRockRight.style.bottom = value * 0.7 - 1500 + "px";
});

// Navbar Dropdown
let navMenuWhite = document.getElementById("nav-menu-white");
let navMenuBlue = document.getElementById("nav-menu-blue");
let dropdownWrapperBlue = document.getElementById("dropdown-wrapper-blue");
let dropdownWrapperWhite = document.getElementById("dropdown-wrapper-white");
let dropdownDownWhite = document.querySelector("#dropdown-down-white");
let dropdownUpWhite = document.querySelector("#dropdown-up-white");
let dropdownDownBlue = document.querySelector("#dropdown-down-blue");
let dropdownUpBlue = document.querySelector("#dropdown-up-blue");

function openDropdownNav() {
    navMenuWhite.classList.remove("hidden");
    navMenuBlue.classList.remove("hidden");
    dropdownDownWhite.classList.add("hidden");
    dropdownUpWhite.classList.remove("hidden");
    dropdownDownBlue.classList.add("hidden");
    dropdownUpBlue.classList.remove("hidden");
}
function closeDropdownNav() {
    navMenuWhite.classList.add("hidden");
    navMenuBlue.classList.add("hidden");
    dropdownDownWhite.classList.remove("hidden");
    dropdownUpWhite.classList.add("hidden");
    dropdownDownBlue.classList.remove("hidden");
    dropdownUpBlue.classList.add("hidden");
}
function navbarMenu() {
    if (
        navMenuWhite.classList.contains("hidden") ||
        navMenuBlue.classList.contains("hidden")
    ) {
        openDropdownNav();
    } else {
        closeDropdownNav();
    }
}

// logout
let logoutPopup = document.getElementById("logout-popup");
let logoutBtn = document.getElementById("logout-btn");
let logoutKembali = document.getElementById("logout-kembali");
function openPopupLogout() {
    logoutPopup.classList.remove("hidden");
}
function closePopupLogout() {
    logoutPopup.classList.add("hidden");
}

// nav links
function toAbout() {
    document.getElementById("about").scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "nearest",
    });
}
function toCourse() {
    document.getElementById("course").scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "nearest",
    });
}
function toBOSEvents() {
    document.getElementById("bos-events").scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "nearest",
    });
}
function toFAQ() {
    document.getElementById("faq").scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "nearest",
    });
}

// open and close navbar
function openNav() {
    let menuBtnWhite = document.querySelector("#menu-btn-white");
    let menuBtnBlue = document.querySelector("#menu-btn-blue");
    if (
        menuBtnWhite.classList.contains("block") ||
        menuBtnBlue.classList.contains("block")
    ) {
        menuBtnWhite.classList.replace("block", "hidden");
        menuBtnBlue.classList.replace("block", "hidden");
    } else {
        menuBtnWhite.classList.replace("hidden", "block");
        menuBtnBlue.classList.replace("hidden", "block");
    }
    let sideNav = document.querySelector("#side-nav");
    sideNav.style.width = "45%";
}
function closeNav() {
    let menuBtnWhite = document.querySelector("#menu-btn-white");
    let menuBtnBlue = document.querySelector("#menu-btn-blue");
    if (
        menuBtnWhite.classList.contains("block") ||
        menuBtnBlue.classList.contains("block")
    ) {
        menuBtnWhite.classList.replace("block", "hidden");
        menuBtnBlue.classList.replace("block", "hidden");
    } else {
        menuBtnWhite.classList.replace("hidden", "block");
        menuBtnBlue.classList.replace("hidden", "block");
    }
    let sideNav = document.querySelector("#side-nav");
    sideNav.style.width = "0%";
}

// change navbar color
let aboutUs = document.querySelector("#about");
let whiteNav = document.querySelector("#white-navbar");
let blueNav = document.querySelector("#blue-navbar");
let prevScrollpos = window.pageYOffset;
window.addEventListener("scroll", function () {
    // change navbar color
    if (aboutUs.getBoundingClientRect().top < 150) {
        whiteNav.classList.add("hidden");
        blueNav.classList.remove("hidden");
    } else {
        blueNav.classList.add("hidden");
        whiteNav.classList.remove("hidden");
    }
    // hide navbar on scroll down
    let currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        blueNav.style.top = "0";
        whiteNav.style.top = "0";
    } else {
        blueNav.style.top = "-100%";
        whiteNav.style.top = "-100%";
    }
    prevScrollpos = currentScrollPos;
});

// about us
let carouselImagesAbout = document.querySelectorAll(".carousel-image-about");
let carouselImagesAboutBig = document.querySelectorAll(
    ".carousel-image-about-big"
);
let counterAbout = 1;

function nextImageAbout() {
    carouselImagesAbout.forEach(function (imageAbout) {
        imageAbout.classList.add("hidden");
    });
    carouselImagesAboutBig.forEach(function (imageAbout) {
        imageAbout.classList.add("hidden");
    });
    if (counterAbout < carouselImagesAbout.length) {
        carouselImagesAbout[counterAbout].classList.remove("hidden");
        carouselImagesAboutBig[counterAbout].classList.remove("hidden");
        carouselImagesAbout[counterAbout].classList.add("animate-fade-in");
        carouselImagesAboutBig[counterAbout].classList.add("animate-fade-in");
        counterAbout++;
    } else {
        counterAbout = 0;
        carouselImagesAbout[counterAbout].classList.remove("hidden");
        carouselImagesAboutBig[counterAbout].classList.remove("hidden");
        carouselImagesAbout[counterAbout].classList.add("animate-fade-in");
        carouselImagesAboutBig[counterAbout].classList.add("animate-fade-in");
        counterAbout++;
    }
}
function prevImageAbout() {
    carouselImagesAbout.forEach(function (imageAbout) {
        imageAbout.classList.add("hidden");
    });
    carouselImagesAboutBig.forEach(function (imageAbout) {
        imageAbout.classList.add("hidden");
    });
    if (counterAbout > 1) {
        carouselImagesAbout[counterAbout - 2].classList.remove("hidden");
        carouselImagesAboutBig[counterAbout - 2].classList.remove("hidden");
        carouselImagesAbout[counterAbout - 2].classList.add("animate-fade-in");
        carouselImagesAboutBig[counterAbout - 2].classList.add(
            "animate-fade-in"
        );
        counterAbout--;
    } else {
        counterAbout = carouselImagesAbout.length - 1;
        carouselImagesAbout[counterAbout].classList.remove("hidden");
        carouselImagesAboutBig[counterAbout].classList.remove("hidden");
        carouselImagesAbout[counterAbout].classList.add("animate-fade-in");
        carouselImagesAboutBig[counterAbout].classList.add("animate-fade-in");
        counterAbout++;
    }
}
function popUpCarousel() {
    if (
        document
            .querySelector("#big-carousel-about")
            .classList.contains("hidden")
    ) {
        document
            .querySelector("#big-carousel-about")
            .classList.remove("hidden");
        document
            .querySelector("#big-carousel-about")
            .classList.add("animate-fade-in");
        setTimeout(() => {
            document
                .querySelector("#big-carousel-about")
                .classList.remove("animate-fade-in");
        }, 300);
    } else {
        document
            .querySelector("#big-carousel-about")
            .classList.add("animate-fade-out");
        setTimeout(() => {
            document
                .querySelector("#big-carousel-about")
                .classList.add("hidden");
            document
                .querySelector("#big-carousel-about")
                .classList.remove("animate-fade-out");
        }, 300);
    }
}
function stopPropa(e) {
    e.stopPropagation();
}

// our course
function courseTab(tabs) {
    let tab = tabs;
    switch (tab) {
        case "java":
            // content
            document.querySelector("#content-desc h1").innerHTML =
                "Java Programming";
            document.querySelector("#content-desc p").innerHTML =
                "Java Programming merupakan salah satu bahasa pemrograman yang paling dibutuhkan karena sifatnya yang multi platform/universal. Bagi kalian yang tertarik untuk mempelajari bahasa pemrograman ini dapat mengambil <span class='italic'>course</span> Java Programming";
            // image
            document.querySelector("#java-img").classList.remove("hidden");
            document.querySelector("#fe-img").classList.add("hidden");
            document.querySelector("#be-img").classList.add("hidden");
            document.querySelector("#uiux-img").classList.add("hidden");
            document.querySelector("#mobile-img").classList.add("hidden");
            document.querySelector("#c-img").classList.add("hidden");
            // tab
            document.querySelector("#java-tab").classList.add("course-active");
            document
                .querySelector("#mobile-tab")
                .classList.remove("course-active");
            document.querySelector("#be-tab").classList.remove("course-active");
            document
                .querySelector("#uiux-tab")
                .classList.remove("course-active");
            document.querySelector("#fe-tab").classList.remove("course-active");
            document.querySelector("#c-tab").classList.remove("course-active");
            // course region
            document.querySelector("#course-region").innerHTML =
                "<span class='bg-[#DDEEFF] text-[#22539F] rounded-[20px] py-1 px-8'>Kemanggisan</span><span class='bg-[#DDEEFF] text-[#22539F] rounded-[20px] py-1 px-8'>Alam Sutera</span>";
            break;
        case "mobile":
            // content
            document.querySelector("#content-desc h1").innerHTML =
                "Mobile Application Development ";
            document.querySelector("#content-desc p").innerHTML =
                "Pada <span class='italic'>course</span> Mobile Application Development, kamu akan mempelajari cara mengembangkan aplikasi Android dari nol. <span class='italic'>Course</span> ini dapat menjadi awalan yang sempurna untuk mengawali <span class='italic'>journey</span> kamu sebagai Mobile App Developer!";
            // image
            document.querySelector("#mobile-img").classList.remove("hidden");
            document.querySelector("#fe-img").classList.add("hidden");
            document.querySelector("#be-img").classList.add("hidden");
            document.querySelector("#uiux-img").classList.add("hidden");
            document.querySelector("#java-img").classList.add("hidden");
            document.querySelector("#c-img").classList.add("hidden");
            // tab
            document
                .querySelector("#mobile-tab")
                .classList.add("course-active");
            document
                .querySelector("#java-tab")
                .classList.remove("course-active");
            document.querySelector("#be-tab").classList.remove("course-active");
            document
                .querySelector("#uiux-tab")
                .classList.remove("course-active");
            document.querySelector("#fe-tab").classList.remove("course-active");
            document.querySelector("#c-tab").classList.remove("course-active");
            // course region
            document.querySelector("#course-region").innerHTML =
                "<span class='bg-[#DDEEFF] text-[#22539F] rounded-[20px] py-1 px-8'>Kemanggisan</span>";
            break;
        case "be":
            // content
            document.querySelector("#content-desc h1").innerHTML =
                "Back-End Development";
            document.querySelector("#content-desc p").innerHTML =
                "Seperti namanya “Back-End”, maka Back-End Developer menangani bagian “belakang” dari sebuah <span class='italic'>website</span> atau aplikasi. Back-End Developer berkaitan erat dengan <span class='italic'>server</span>, <span class='italic'>database</span>, dan aplikasi. Jadi, bagi kamu yang tertarik untuk bekerja di bidang ini, maka <span class='italic'>course</span> Back-End Development dapat menjadi pilihan kamu!";
            // image
            document.querySelector("#be-img").classList.remove("hidden");
            document.querySelector("#fe-img").classList.add("hidden");
            document.querySelector("#mobile-img").classList.add("hidden");
            document.querySelector("#uiux-img").classList.add("hidden");
            document.querySelector("#java-img").classList.add("hidden");
            document.querySelector("#c-img").classList.add("hidden");
            // tab
            document.querySelector("#be-tab").classList.add("course-active");
            document
                .querySelector("#mobile-tab")
                .classList.remove("course-active");
            document
                .querySelector("#java-tab")
                .classList.remove("course-active");
            document
                .querySelector("#uiux-tab")
                .classList.remove("course-active");
            document.querySelector("#fe-tab").classList.remove("course-active");
            document.querySelector("#c-tab").classList.remove("course-active");
            // course region
            document.querySelector("#course-region").innerHTML =
                "<span class='bg-[#DDEEFF] text-[#22539F] rounded-[20px] py-1 px-8'>Kemanggisan</span><span class='bg-[#DDEEFF] text-[#22539F] rounded-[20px] py-1 px-8'>Bandung</span><span class='bg-[#DDEEFF] text-[#22539F] rounded-[20px] py-1 px-8'>Malang</span>";
            break;
        case "uiux":
            // content
            document.querySelector("#content-desc h1").innerHTML =
                "UI/UX Design";
            document.querySelector("#content-desc p").innerHTML =
                "Untuk memberikan <span class='italic'>interface</span> dan  <span class='italic'>experience</span> yang luar biasa bagi <span class='italic'>user</span>, dibutuhkan kontribusi dari UI/UX Designer. Bagi kamu yang menyukai desain aplikasi maupun <span class='italic'>website</span>, <span class='italic'>course</span> UI/UX Design merupakan jawabannya!";
            // image
            document.querySelector("#uiux-img").classList.remove("hidden");
            document.querySelector("#fe-img").classList.add("hidden");
            document.querySelector("#be-img").classList.add("hidden");
            document.querySelector("#mobile-img").classList.add("hidden");
            document.querySelector("#java-img").classList.add("hidden");
            document.querySelector("#c-img").classList.add("hidden");
            // tab
            document.querySelector("#uiux-tab").classList.add("course-active");
            document
                .querySelector("#mobile-tab")
                .classList.remove("course-active");
            document.querySelector("#be-tab").classList.remove("course-active");
            document
                .querySelector("#java-tab")
                .classList.remove("course-active");
            document.querySelector("#fe-tab").classList.remove("course-active");
            document.querySelector("#c-tab").classList.remove("course-active");
            // course region
            document.querySelector("#course-region").innerHTML =
                "<span class='bg-[#DDEEFF] text-[#22539F] rounded-[20px] py-1 px-8'>Kemanggisan</span><span class='bg-[#DDEEFF] text-[#22539F] rounded-[20px] py-1 px-8'>Alam Sutera</span><span class='bg-[#DDEEFF] text-[#22539F] rounded-[20px] py-1 px-8'>Bandung</span><span class='bg-[#DDEEFF] text-[#22539F] rounded-[20px] py-1 px-8'>Malang</span>";
            break;
        case "fe":
            // content
            document.querySelector("#content-desc h1").innerHTML =
                "Front-End Development ";
            document.querySelector("#content-desc p").innerHTML =
                "Kamu suka <span class='italic'>coding</span> dan juga desain? Kenapa gak belajar keduanya? Di <span class='italic'>course</span> ini kamu akan belajar cara mendesain menggunakan <span class='italic'>coding</span> yang akan menunjang karir kamu di bidang Front-End Development!";
            // image
            document.querySelector("#fe-img").classList.remove("hidden");
            document.querySelector("#mobile-img").classList.add("hidden");
            document.querySelector("#be-img").classList.add("hidden");
            document.querySelector("#uiux-img").classList.add("hidden");
            document.querySelector("#java-img").classList.add("hidden");
            document.querySelector("#c-img").classList.add("hidden");
            // tab
            document.querySelector("#fe-tab").classList.add("course-active");
            document
                .querySelector("#mobile-tab")
                .classList.remove("course-active");
            document.querySelector("#be-tab").classList.remove("course-active");
            document
                .querySelector("#uiux-tab")
                .classList.remove("course-active");
            document
                .querySelector("#java-tab")
                .classList.remove("course-active");
            document.querySelector("#c-tab").classList.remove("course-active");
            // course region
            document.querySelector("#course-region").innerHTML =
                "<span class='bg-[#DDEEFF] text-[#22539F] rounded-[20px] py-1 px-8'>Kemanggisan</span><span class='bg-[#DDEEFF] text-[#22539F] rounded-[20px] py-1 px-8'>Alam Sutera</span><span class='bg-[#DDEEFF] text-[#22539F] rounded-[20px] py-1 px-8'>Bandung</span><span class='bg-[#DDEEFF] text-[#22539F] rounded-[20px] py-1 px-8'>Malang</span>";
            break;
        case "c":
            // content
            document.querySelector("#content-desc h1").innerHTML =
                "C Programming";
            document.querySelector("#content-desc p").innerHTML =
                "C Programming dapat membantu kamu dalam memahami dasar-dasar teori komputer, seperti <span class='italic'>computer network</span>, <span class='italic'>compiler designing</span>, <span class='italic'>computer architecture</span>, ataupun <span class='italic'>operating system</span> berbasis bahasa C. Maka dari itu, apabila kamu tertarik untuk berperan dalam bidang tersebut, kamu dapat mengikuti <span class='italic'>course</span> C Programming!";
            // image
            document.querySelector("#c-img").classList.remove("hidden");
            document.querySelector("#fe-img").classList.add("hidden");
            document.querySelector("#be-img").classList.add("hidden");
            document.querySelector("#uiux-img").classList.add("hidden");
            document.querySelector("#java-img").classList.add("hidden");
            document.querySelector("#mobile-img").classList.add("hidden");
            // tab
            document.querySelector("#c-tab").classList.add("course-active");
            document
                .querySelector("#mobile-tab")
                .classList.remove("course-active");
            document.querySelector("#be-tab").classList.remove("course-active");
            document
                .querySelector("#uiux-tab")
                .classList.remove("course-active");
            document.querySelector("#fe-tab").classList.remove("course-active");
            document
                .querySelector("#java-tab")
                .classList.remove("course-active");
            // course region
            document.querySelector("#course-region").innerHTML =
                "<span class='bg-[#DDEEFF] text-[#22539F] rounded-[20px] py-1 px-8'>Alam Sutera</span>";
            break;
    }
}

// our event
let carouselImages = document.querySelectorAll(".carousel-image");
let counter = 1;
let ourEventCarouselNext = document.querySelector(
    "#our-event-next-carousel-btn"
);
let ourEventInterval = setInterval(() => {
    ourEventCarouselNext.click();
}, 10000);
function changeIndicator() {
    let indicators = document.querySelectorAll(".carousel-indicator");
    indicators.forEach(function (indicator) {
        indicator.classList.replace("bg-[#22539F]", "bg-[#D7E0E8]");
        indicator.classList.replace("w-20", "w-4");
    });
    indicators[counter - 1].classList.replace("bg-[#D7E0E8]", "bg-[#22539F]");
    indicators[counter - 1].classList.replace("w-4", "w-20");
}
function nextImage(button) {
    clearInterval(ourEventInterval);
    button.classList.add("pointer-events-none");
    carouselImages[counter - 1].classList.add("hidden");
    if (counter < carouselImages.length) {
        carouselImages[counter].classList.remove("hidden");
        carouselImages[counter].classList.add("animate-fade-in");
        setTimeout(() => {
            carouselImages[counter].classList.remove("animate-fade-in");
            counter++;
            changeIndicator();
            button.classList.remove("pointer-events-none");
            ourEventInterval = setInterval(() => {
                ourEventCarouselNext.click();
            }, 10000);
        }, 200);
    } else {
        counter = 0;
        carouselImages[counter].classList.remove("hidden");
        carouselImages[counter].classList.add("animate-fade-in");
        setTimeout(() => {
            carouselImages[counter].classList.remove("animate-fade-in");
            counter++;
            changeIndicator();
            button.classList.remove("pointer-events-none");
            ourEventInterval = setInterval(() => {
                ourEventCarouselNext.click();
            }, 10000);
        }, 200);
    }
}
function prevImage(button) {
    clearInterval(ourEventInterval);
    button.classList.add("pointer-events-none");
    carouselImages[counter - 1].classList.add("hidden");
    if (counter > 1) {
        carouselImages[counter - 2].classList.remove("hidden");
        carouselImages[counter - 2].classList.add("animate-fade-in");
        setTimeout(() => {
            carouselImages[counter - 2].classList.remove("animate-fade-in");
            counter--;
            changeIndicator();
            button.classList.remove("pointer-events-none");
            ourEventInterval = setInterval(() => {
                ourEventCarouselNext.click();
            }, 10000);
        }, 200);
    } else {
        counter = carouselImages.length - 1;
        carouselImages[counter].classList.remove("hidden");
        carouselImages[counter].classList.add("animate-fade-in");
        setTimeout(() => {
            carouselImages[counter].classList.remove("animate-fade-in");
            counter++;
            changeIndicator();
            button.classList.remove("pointer-events-none");
            ourEventInterval = setInterval(() => {
                ourEventCarouselNext.click();
            }, 10000);
        }, 200);
    }
}
function changeImage(tab) {
    clearInterval(ourEventInterval);
    let indicatorContainer = document.querySelector("#indicator-container");
    indicatorContainer.classList.add("pointer-events-none");
    let currTab = tab;
    let indicators = document.querySelectorAll(".carousel-indicator");
    carouselImages[counter - 1].classList.add("hidden");
    counter = Array.prototype.indexOf.call(indicators, currTab);

    indicators.forEach(function (indicator) {
        indicator.classList.remove("pointer-events-none");
    });
    indicators[counter].classList.add("pointer-events-none");

    carouselImages[counter].classList.remove("hidden");
    carouselImages[counter].classList.add("animate-fade-in");
    setTimeout(() => {
        carouselImages[counter].classList.remove("animate-fade-in");
        counter++;
        changeIndicator();
        indicatorContainer.classList.remove("pointer-events-none");
        ourEventInterval = setInterval(() => {
            ourEventCarouselNext.click();
        }, 10000);
    }, 200);
}
// BOS Events
function lihatJadwal(element) {
    let jadwal = element.nextElementSibling;
    if (element.innerHTML == "Klik sini untuk melihat jadwal") {
        element.innerHTML = "Klik sini untuk menyembunyikan jadwal";
        jadwal.classList.remove("hidden");
    } else {
        element.innerHTML = "Klik sini untuk melihat jadwal";
        jadwal.classList.add("hidden");
    }
}

// tesimonial
function changeTestimonial(testimoni) {
    let currTestimoni = testimoni;
    let content = document.querySelector("#testimoni-content");
    let name = document.querySelector("#testinomi-name");

    document.querySelectorAll(".testimoni-tab").forEach(function (element) {
        element.classList.add("saturate-0");
        element.classList.remove("pointer-events-none");
    });
    currTestimoni.classList.remove("saturate-0");
    currTestimoni.classList.add("pointer-events-none");

    document.querySelectorAll(".testimoni-img").forEach(function (element) {
        element.classList.add("hidden");
    });

    document
        .querySelector("#testimonial-person")
        .classList.add("animate-fade-in");
    setTimeout(() => {
        document
            .querySelector("#testimonial-person")
            .classList.remove("animate-fade-in");
    }, 300);

    switch (currTestimoni.id) {
        case "jeffershon":
            name.innerHTML = "Jeffershon Dhamma Putra";
            content.innerHTML =
                '"Kesan dan pesanku selama di BNCC itu asik banget, bisa <span class="font-bold">menjalin koneksi dengan banyak orang</span> dan <span class="font-bold">kerasa banget solidaritasnya</span>. Banyak hal yang aku dapetin mulai dari <span class="font-bold"><span class="italic">soft skill</span> dimana sekarang aku sudah semakin PD buat ngomong ke publik</span>, serta <span class="font-bold"><span class="italic">hard skill</span> mulai dari <span class="italic">coding, design,</span></span> dan lainnya. Menurut aku B26 harus banget sih join UKM BNCC karena bisa dapat banyak banget <span class="italic">benefit</span> yang aku rasa agak sulit didapatkan di tempat lain, pokoknya <span class="italic">worth it</span> banget!"';
            document
                .querySelector("#jeffershon-img")
                .classList.remove("hidden");
            break;
        case "Andini":
            name.innerHTML = "Andini Malavika";
            content.innerHTML =
                '"BNCC tuh kece banget! Aku masuk bener-bener gak punya <span class="italic">skill</span>, dan pengalaman organisasi bisa langsung <span class="font-bold">berubah jadi lebih aktif dan punya kontribusi</span>. Aku ambil LnT Front-End dan itu <span class="italic">worth it</span> banget. BNCC tuh punya segala yang kamu mau! <span class="font-bold">Gausah diraguin lagi sih. <span class="italic">Join</span> langsung, gak bakal nyesel deh!</span>"';
            document.querySelector("#andini-img").classList.remove("hidden");
            break;
        case "Arrick":
            name.innerHTML = "Arrick Russell Adinoto";
            content.innerHTML =
                '"Suatu kebanggaan untuk bisa menjadi member BNCC karena <span class="font-bold">slot BNCC terbatas</span> tetapi memiliki peminat yang sangat banyak. <span class="font-bold">Di BNCC, aku merasa puas karena dibimbing dari nol sampai akhirnya bisa menyelesaikan <span class="italic">project</span> dari bidang yang aku pilih</span>. Pembelajaran di BNCC akan mengajarkan kalian <span class="italic">technical skill</span> yang nantinya dapat membuat kalian <span class="font-bold">memiliki keunggulan tersendiri</span>."';
            document.querySelector("#arrick-img").classList.remove("hidden");
            break;
        case "Tabitha":
            name.innerHTML = "Tabitha Dwiangraini";
            content.innerHTML =
                '"B26 wajib banget sih buat join BNCC, karena bakal banyak banget ilmu-ilmu yang bisa didapetin di BNCC yang bakal <span class="font-bold">berguna banget buat perkuliahan dan juga peluang karir kedepannya</span>. Semenjak aku masuk BNCC yang <span class="font-bold">awalnya aku gak tau apa-apa tentang teknologi aku bisa dapet banyak <span class="italic">insight</span> tentang karir di dunia teknologi</span>."';
            document.querySelector("#tabitha-img").classList.remove("hidden");
            break;
        case "Brian":
            name.innerHTML = "Marcellinus Brian Silvanus";
            content.innerHTML =
                '"Menjadi member BNCC merupakan kesempatan kalian untuk <span class="font-bold"><span class="italic">explore</span> lebih jauh</span>, karena kalian bakal ketemu dengan orang-orang baru, terus bakal belajar banyak hal-hal baru juga dan tentunya bisa mengasah <span class="italic">skill</span> kalian bahkan bisa <span class="font-bold">menemukan <span class="italic">skill</span> baru</span> yang sebelumnya gak pernah kalian pikirkan. Jadi tunggu apalagi? <span class="font-bold"> Yuk,<span class="italic"> join</span> jadi member BNCC!</span>"';
            document.querySelector("#brian-img").classList.remove("hidden");
            break;
    }
}

// FAQ
function openAcc(currAccordion) {
    currAccordion.lastElementChild.classList.add("rotate-45");
    currAccordion.nextElementSibling.classList.remove("hidden");
    currAccordion.nextElementSibling.classList.add("animate-slide-in-top");
}
function closeAcc(currAccordion) {
    if (currAccordion.nextElementSibling.classList.contains("hidden")) {
        return;
    }
    currAccordion.lastElementChild.classList.remove("rotate-45");
    currAccordion.nextElementSibling.classList.add("hidden");
    currAccordion.nextElementSibling.classList.remove("animate-slide-in-top");
}
function toggleAccordion(accordion) {
    let currAccordion = accordion;
    if (currAccordion.nextElementSibling.classList.contains("hidden")) {
        document
            .querySelectorAll(".accordion-item")
            .forEach(function (element) {
                closeAcc(element);
            });
        openAcc(currAccordion);
    } else {
        closeAcc(currAccordion);
    }
}
