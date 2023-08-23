// form validation
async function validateForm1(clickedId) {
    let btnId = clickedId;

    // input
    let inputNama = document.querySelector("#nama");
    let inputNamaVal = inputNama.value;

    let inputLakiLaki = document.querySelector("#laki-laki");
    let inputPerempuan = document.querySelector("#perempuan");

    let inputTanggalLahir = document.querySelector("#tanggal-lahir");
    let inputTanggalLahirVal = inputTanggalLahir.value;

    let inputTempatLahir = document.querySelector("#tempat-lahir");
    let inputTempatLahirVal = inputTempatLahir.value;

    let inputDomisili = document.querySelector("#domisili");
    let inputDomisiliVal = inputDomisili.value;

    let inputAlamat = document.querySelector("#alamat");
    let inputAlamatVal = inputAlamat.value;

    let inputLine = document.querySelector("#id-line");
    let inputLineVal = inputLine.value;

    let inputWhatsapp = document.querySelector("#whatsapp");
    let inputWhatsappVal = inputWhatsapp.value;

    let inputInstagram = document.querySelector("#instagram");
    let inputInstagramVal = inputInstagram.value;

    let inputAgama = document.querySelector("#agama");
    let inputAgamaVal = inputAgama.value;

    // error messages
    let namaValidation = document.querySelector("#nama-validation");
    let namaValidationContent = document.querySelector(
        "#nama-validation-content"
    );

    let jenisKelaminValidation = document.querySelector(
        "#jenis-kelamin-validation"
    );
    let jenisKelaminValidationContent = document.querySelector(
        "#jenis-kelamin-validation-content"
    );

    let tanggalLahirValidation = document.querySelector(
        "#tanggal-lahir-validation"
    );
    let tanggalLahirValidationContent = document.querySelector(
        "#tanggal-lahir-validation-content"
    );

    let tempatLahirValidation = document.querySelector(
        "#tempat-lahir-validation"
    );
    let tempatLahirValidationContent = document.querySelector(
        "#tempat-lahir-validation-content"
    );

    let domisiliValidation = document.querySelector("#domisili-validation");
    let domisiliValidationContent = document.querySelector(
        "#domisili-validation-content"
    );

    let alamatValidation = document.querySelector("#alamat-validation");
    let alamatValidationContent = document.querySelector(
        "#alamat-validation-content"
    );

    let lineValidation = document.querySelector("#line-validation");
    let lineValidationContent = document.querySelector(
        "#line-validation-content"
    );

    let whatsappValidation = document.querySelector("#whatsapp-validation");
    let whatsappValidationContent = document.querySelector(
        "#whatsapp-validation-content"
    );

    let instagramValidation = document.querySelector("#instagram-validation");
    let instagramValidationContent = document.querySelector(
        "#instagram-validation-content"
    );

    let agamaValidation = document.querySelector("#agama-validation");
    let agamaValidationContent = document.querySelector(
        "#agama-validation-content"
    );

    // validations
    // nama validasi
    if (inputNamaVal == "") {
        namaValidation.classList.remove("hidden");
        inputNama.classList.replace("border-none", "border-2");
        namaValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else {
        namaValidation.classList.add("hidden");
        inputNama.classList.replace("border-2", "border-none");
    }
    // jenis kelamin validasi
    if (!inputLakiLaki.checked && !inputPerempuan.checked) {
        jenisKelaminValidation.classList.remove("hidden");
        jenisKelaminValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else {
        jenisKelaminValidation.classList.add("hidden");
    }
    // tanggal lahir validasi
    if (inputTanggalLahirVal == "") {
        tanggalLahirValidation.classList.remove("hidden");
        inputTanggalLahir.classList.replace("border-none", "border-2");
        tanggalLahirValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else if (inputTanggalLahirVal > "2007-12-31") {
        tanggalLahirValidation.classList.remove("hidden");
        inputTanggalLahir.classList.replace("border-none", "border-2");
        tanggalLahirValidationContent.innerHTML =
            "Tanggal lahir yang Anda masukkan tidak valid";
    } else {
        tanggalLahirValidation.classList.add("hidden");
        inputTanggalLahir.classList.replace("border-2", "border-none");
    }
    // tempat lahir validasi
    if (inputTempatLahirVal == "") {
        tempatLahirValidation.classList.remove("hidden");
        inputTempatLahir.classList.replace("border-none", "border-2");
        tempatLahirValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else {
        tempatLahirValidation.classList.add("hidden");
        inputTempatLahir.classList.replace("border-2", "border-none");
    }
    // domisili validasi
    if (inputDomisiliVal == "") {
        domisiliValidation.classList.remove("hidden");
        inputDomisili.classList.replace("border-none", "border-2");
        domisiliValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else {
        domisiliValidation.classList.add("hidden");
        inputDomisili.classList.replace("border-2", "border-none");
    }
    // alamat validasi
    if (inputAlamatVal == "") {
        alamatValidation.classList.remove("hidden");
        inputAlamat.classList.replace("border-none", "border-2");
        alamatValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else {
        alamatValidation.classList.add("hidden");
        inputAlamat.classList.replace("border-2", "border-none");
    }
    // line id validasi
    //True = Unique | False = Tidak Unique
    let lineUnique = false;
    await axios
        .post("/register/validate/line", {
            lineId: inputLineVal,
        })
        .then((res) => (lineUnique = res.data.lineStatus))
        .catch((err) => (lineUnique = false));

    if (inputLineVal == "") {
        lineValidation.classList.remove("hidden");
        inputLine.classList.replace("border-none", "border-2");
        lineValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else if (inputLineVal.indexOf(" ") >= 0) {
        lineValidation.classList.remove("hidden");
        inputLine.classList.replace("border-none", "border-2");
        lineValidationContent.innerHTML =
            "LINE ID yang Anda masukkan tidak valid";
    } else if (!lineUnique) {
        lineValidation.classList.remove("hidden");
        inputLine.classList.replace("border-none", "border-2");
        lineValidationContent.innerHTML =
            "LINE ID yang Anda masukkan sudah terdaftar";
    } else {
        lineValidation.classList.add("hidden");
        inputLine.classList.replace("border-2", "border-none");
    }
    // whatsapp validasi
    //True = Unique | False = Tidak Unique
    const reWhatsapp =
        /^[\+]?[(]?(08){1}[)]?[-\s\.]?[0-9]{2}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{3,6}$/im;
    let whatsappUnique = false;
    await axios
        .post("/register/validate/whatsapp", {
            whatsapp: inputWhatsappVal,
        })
        .then((res) => (whatsappUnique = res.data.whatsappStatus))
        .catch((err) => (whatsappUnique = false));
    if (inputWhatsappVal == "") {
        whatsappValidation.classList.remove("hidden");
        inputWhatsapp.classList.replace("border-none", "border-2");
        whatsappValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else if (inputWhatsappVal.substring(0, 2) != "08") {
        // validasi whatsapp depanny 08
        whatsappValidation.classList.remove("hidden");
        inputWhatsapp.classList.replace("border-none", "border-2");
        whatsappValidationContent.innerHTML =
            "Masukkan nomor telpon dengan awalan 08";
    } else if (!inputWhatsappVal.match(reWhatsapp)) {
        whatsappValidation.classList.remove("hidden");
        inputWhatsapp.classList.replace("border-none", "border-2");
        whatsappValidationContent.innerHTML =
            "Nomor telpon yang Anda masukkan tidak valid";
    } else if (!whatsappUnique) {
        // validasi unik whatsapp
        whatsappValidation.classList.remove("hidden");
        inputWhatsapp.classList.replace("border-none", "border-2");
        whatsappValidationContent.innerHTML =
            "Nomer telpon yang Anda masukkan sudah terdaftar";
    } else {
        whatsappValidation.classList.add("hidden");
        inputWhatsapp.classList.replace("border-2", "border-none");
    }
    // instagram validasi
    const reInstagram = /^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/gim;
    let instagramUnique = false;
    let post_status = await axios
        .post("/register/validate/instagram", { instagram: inputInstagramVal })
        .then((res) => {
            instagramUnique = res.data.instagramStatus;
        });

    if (inputInstagramVal == "") {
        instagramValidation.classList.remove("hidden");
        inputInstagram.classList.replace("border-none", "border-2");
        instagramValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else if (instagramUnique == false) {
        instagramValidation.classList.remove("hidden");
        inputInstagram.classList.replace("border-none", "border-2");
        instagramValidationContent.innerHTML =
            "Username Instagram yang Anda masukkan sudah terdaftar";
    } else if (inputInstagramVal[0] == "@") {
        instagramValidation.classList.remove("hidden");
        inputInstagram.classList.replace("border-none", "border-2");
        instagramValidationContent.innerHTML =
            "Masukkan username Instagram tanpa awalan @";
    } else if (!inputInstagramVal.match(reInstagram)) {
        instagramValidation.classList.remove("hidden");
        inputInstagram.classList.replace("border-none", "border-2");
        instagramValidationContent.innerHTML =
            "Username Instagram yang Anda masukkan tidak valid";
    } else {
        instagramValidation.classList.add("hidden");
        inputInstagram.classList.replace("border-2", "border-none");
    }
    // agama validasi
    if (inputAgamaVal == "") {
        agamaValidation.classList.remove("hidden");
        inputAgama.classList.replace("border-none", "border-2");
        agamaValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else {
        agamaValidation.classList.add("hidden");
        inputAgama.classList.replace("border-2", "border-none");
    }

    // validasi semua
    if (
        inputNamaVal != "" &&
        (inputLakiLaki.checked || inputPerempuan.checked) &&
        inputTanggalLahirVal != "" &&
        inputTanggalLahirVal <= "2007-12-31" &&
        inputTempatLahirVal != "" &&
        inputDomisiliVal != "" &&
        inputAlamatVal != "" &&
        inputLineVal != "" &&
        inputLineVal.indexOf(" ") < 0 &&
        inputWhatsappVal != "" &&
        inputWhatsappVal.match(reWhatsapp) &&
        lineUnique &&
        whatsappUnique &&
        inputWhatsappVal.substring(0, 2) == "08" &&
        inputInstagramVal != "" &&
        inputInstagramVal[0] != "@" &&
        instagramUnique == true &&
        inputInstagramVal.match(reInstagram) &&
        inputAgamaVal != ""
    ) {
        namaValidation.classList.add("hidden");
        inputNama.classList.replace("border-2", "border-none");
        jenisKelaminValidation.classList.add("hidden");
        tanggalLahirValidation.classList.add("hidden");
        inputTanggalLahir.classList.replace("border-2", "border-none");
        tempatLahirValidation.classList.add("hidden");
        inputTempatLahir.classList.replace("border-2", "border-none");
        domisiliValidation.classList.add("hidden");
        inputDomisili.classList.replace("border-2", "border-none");
        alamatValidation.classList.add("hidden");
        inputAlamat.classList.replace("border-2", "border-none");
        lineValidation.classList.add("hidden");
        inputLine.classList.replace("border-2", "border-none");
        whatsappValidation.classList.add("hidden");
        inputWhatsapp.classList.replace("border-2", "border-none");
        instagramValidation.classList.add("hidden");
        inputInstagram.classList.replace("border-2", "border-none");
        agamaValidation.classList.add("hidden");
        inputAgama.classList.replace("border-2", "border-none");
        nextForm(btnId);
    }
}
async function validateForm2(clickedId) {
    let btnId = clickedId;
    let inputNIM = document.querySelector("#nim");
    let inputNIMVal = inputNIM.value;
    let inputRegion = document.querySelector("#region-kampus");
    let inputRegionVal = inputRegion.value;
    let inputFakultas = document.querySelector("#fakultas");
    let inputFakultasVal = inputFakultas.value;
    let inputJurusan = document.querySelector("#jurusan");
    let inputJurusanVal = inputJurusan.value;
    let inputBatchFYP = document.querySelector("#batch-fyp");
    let inputBatchFYPVal = inputBatchFYP.value;

    // error message
    let nimValidation = document.querySelector("#nim-validation");
    let nimValidationContent = document.querySelector(
        "#nim-validation-content"
    );
    let regionValidation = document.querySelector("#region-validation");
    let regionValidationContent = document.querySelector(
        "#region-validation-content"
    );
    let fakultasValidation = document.querySelector("#fakultas-validation");
    let fakultasValidationContent = document.querySelector(
        "#fakultas-validation-content"
    );
    let jurusanValidation = document.querySelector("#jurusan-validation");
    let jurusanValidationContent = document.querySelector(
        "#jurusan-validation-content"
    );
    let batchFYPValidation = document.querySelector("#batchFYP-validation");
    let batchFYPValidationContent = document.querySelector(
        "#batchFYP-validation-content"
    );

    // validasi NIM
    //True = Unique | False = Tidak Unique
    const reNIM = /^[\+]?[(]?(24|25|26){1}[)]?[-\s\.]?[0-9]{8}[)]?$/im;
    let nimUnique = false;
    await axios
        .post("/register/validate/nim", {
            nim: inputNIMVal,
        })
        .then((res) => (nimUnique = res.data.nimStatus))
        .catch((err) => (nimUnique = false));
    if (inputNIMVal == "") {
        nimValidation.classList.remove("hidden");
        inputNIM.classList.replace("border-none", "border-2");
        nimValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else if (!inputNIMVal.match(reNIM)) {
        // validasi NIM 10 angka dan awal 25/26
        nimValidation.classList.remove("hidden");
        inputNIM.classList.replace("border-none", "border-2");
        nimValidationContent.innerHTML =
            "Masukkan NIM yang valid dengan awalan 24 / 25 / 26";
    } else if (!nimUnique) {
        // validasi NIM tidak unik
        nimValidation.classList.remove("hidden");
        inputNIM.classList.replace("border-none", "border-2");
        nimValidationContent.innerHTML =
            "NIM yang Anda masukkan sudah terdaftar";
    } else {
        nimValidation.classList.add("hidden");
        inputNIM.classList.replace("border-2", "border-none");
    }

    // validasi region kampus
    if (inputRegionVal == "") {
        regionValidation.classList.remove("hidden");
        inputRegion.classList.replace("border-none", "border-2");
        regionValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else {
        regionValidation.classList.add("hidden");
        inputRegion.classList.replace("border-2", "border-none");
    }

    // validasi fakultas
    if (inputFakultasVal == "") {
        fakultasValidation.classList.remove("hidden");
        inputFakultas.classList.replace("border-none", "border-2");
        fakultasValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else {
        fakultasValidation.classList.add("hidden");
        inputFakultas.classList.replace("border-2", "border-none");
    }

    // validasi jurusan
    if (inputJurusanVal == "") {
        jurusanValidation.classList.remove("hidden");
        inputJurusan.classList.replace("border-none", "border-2");
        jurusanValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else {
        jurusanValidation.classList.add("hidden");
        inputJurusan.classList.replace("border-2", "border-none");
    }

    // validasi batch FYP
    if (inputBatchFYPVal == "") {
        batchFYPValidation.classList.remove("hidden");
        inputBatchFYP.classList.replace("border-none", "border-2");
        batchFYPValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else {
        batchFYPValidation.classList.add("hidden");
        inputBatchFYP.classList.replace("border-2", "border-none");
    }

    // validasi semua
    if (
        inputRegionVal != "" &&
        inputFakultasVal != "" &&
        inputJurusanVal != "" &&
        inputBatchFYPVal != "" &&
        inputNIMVal != "" &&
        inputNIMVal.match(reNIM) &&
        nimUnique
    ) {
        nimValidation.classList.add("hidden");
        inputNIM.classList.replace("border-2", "border-none");
        nextForm(btnId);
    }
}
function validateForm3(clickedId) {
    let btnId = clickedId;
    let inputLntcourse = document.querySelector("#lnt-course");
    let inputLntcourseVal = inputLntcourse.value;
    let inputJadwal = document.querySelector("#jadwal-bncc-launching");
    let inputJadwalVal = inputJadwal.value;
    let inputJadwalTrialClass = document.querySelector("#jadwal-trial-class");
    let inputJadwalTrialClassVal = inputJadwalTrialClass.value;
    let inputDaftarDariMana = document.querySelectorAll(
        "input[type='checkbox']"
    );

    // error message
    let lntcourseValidation = document.querySelector("#lntcourse-validation");
    let lntcourseValidationContent = document.querySelector(
        "#lntcourse-validation-content"
    );
    let jadwalValidation = document.querySelector("#jadwal-validation");
    let jadwalValidationContent = document.querySelector(
        "#jadwal-validation-content"
    );
    let jadwalTrialClassValidation = document.querySelector(
        "#jadwal-trial-class-validation"
    );
    let jadwalTrialClassValidationContent = document.querySelector(
        "#jadwal-trial-class-validation-content"
    );
    let daftarDariManaValidation = document.querySelector(
        "#daftar-dari-mana-validation"
    );
    let daftarDariManaValidationContent = document.querySelector(
        "#daftar-dari-mana-validation-content"
    );

    // lnt course validasi
    if (inputLntcourseVal == "") {
        lntcourseValidation.classList.remove("hidden");
        inputLntcourse.classList.replace("border-none", "border-2");
        lntcourseValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else {
        lntcourseValidation.classList.add("hidden");
        inputLntcourse.classList.replace("border-2", "border-none");
    }

    // jadwal bncc launching validation
    if (inputJadwalVal == "") {
        jadwalValidation.classList.remove("hidden");
        inputJadwal.classList.replace("border-none", "border-2");
        jadwalValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else {
        jadwalValidation.classList.add("hidden");
        inputJadwal.classList.replace("border-2", "border-none");
    }

    // jadwal trial class validation
    if (inputJadwalTrialClassVal == "") {
        jadwalTrialClassValidation.classList.remove("hidden");
        inputJadwalTrialClass.classList.replace("border-none", "border-2");
        jadwalTrialClassValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else {
        jadwalTrialClassValidation.classList.add("hidden");
        inputJadwalTrialClass.classList.replace("border-2", "border-none");
    }

    // daftar dari mana validation
    let validDaftarDariMana = false;
    for (let i = 0; i < inputDaftarDariMana.length; i++) {
        if (inputDaftarDariMana[i].checked) {
            validDaftarDariMana = true;
            break;
        }
    }
    if (validDaftarDariMana == false) {
        daftarDariManaValidation.classList.remove("hidden");
        daftarDariManaValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else {
        daftarDariManaValidation.classList.add("hidden");
        daftarDariManaValidationContent.innerHTML = "";
    }

    if (
        inputLntcourseVal != "" &&
        inputJadwalVal != "" &&
        inputJadwalTrialClassVal != "" &&
        validDaftarDariMana == true
    ) {
        // validasi semua
        lntcourseValidation.classList.add("hidden");
        inputLntcourse.classList.replace("border-2", "border-none");
        jadwalValidation.classList.add("hidden");
        inputJadwal.classList.replace("border-2", "border-none");
        daftarDariManaValidation.classList.add("hidden");
        nextForm(btnId);
    }
}
async function validateForm4() {
    let inputEmailPribadi = document.querySelector("#email-pribadi");
    let inputEmailPribadiValue = inputEmailPribadi.value;

    let inputKataSandi = document.querySelector("#kata-sandi");
    let inputKataSandiValue = inputKataSandi.value;

    let inputKonfirmasiKataSandi = document.querySelector(
        "#konfirmasi-kata-sandi"
    );
    let inputKonfirmasiKataSandiValue = inputKonfirmasiKataSandi.value;

    // error message
    let emailPribadiValidation = document.querySelector(
        "#email-pribadi-validation"
    );
    let emailPribadiValidationContent = document.querySelector(
        "#email-pribadi-validation-content"
    );
    let kataSandiValidation = document.querySelector("#kata-sandi-validation");
    let kataSandiValidationContent = document.querySelector(
        "#kata-sandi-validation-content"
    );
    let konfirmasiKataSandiValidation = document.querySelector(
        "#konfirmasi-kata-sandi-validation"
    );
    let konfirmasiKataSandiValidationContent = document.querySelector(
        "#konfirmasi-kata-sandi-validation-content"
    );
    let invalidRecaptcha = document.querySelector("#invalid-recaptcha");

    let successPopup = document.querySelector("#success-popup");

    // validasi email
    //True = Unique | False = Tidak Unique
    let emailUnique = false;
    await axios
        .post("/register/validate/email", {
            email: inputEmailPribadiValue,
        })
        .then((res) => (emailUnique = res.data.emailStatus))
        .catch((err) => (emailUnique = false));
    const reEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (inputEmailPribadiValue == "") {
        emailPribadiValidation.classList.remove("hidden");
        inputEmailPribadi.classList.replace("border-none", "border-2");
        emailPribadiValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else if (
        !inputEmailPribadiValue.match(reEmail) ||
        inputEmailPribadiValue.toLowerCase().includes("@binus.ac.id") ||
        inputEmailPribadiValue.toLowerCase().indexOf("@binus.ac.id") >= 0
    ) {
        emailPribadiValidation.classList.remove("hidden");
        inputEmailPribadi.classList.replace("border-none", "border-2");
        emailPribadiValidationContent.innerHTML =
            "Email pribadi yang Anda masukkan salah";
    } else if (!emailUnique) {
        emailPribadiValidation.classList.remove("hidden");
        inputEmailPribadi.classList.replace("border-none", "border-2");
        emailPribadiValidationContent.innerHTML =
            "Email pribadi yang Anda masukkan sudah terdaftar";
    } else {
        emailPribadiValidation.classList.add("hidden");
        inputEmailPribadi.classList.replace("border-2", "border-none");
    }

    // validasi password
    const rePass =
        /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\~.\/<>?;:"'`!@#$%^&*()\[\]{}_+=|\\-])[A-Za-z\d\~.\/<>?;:"'`!@#$%^&*()\[\]{}_+=|\\-]{8,}$/;
    if (inputKataSandiValue == "") {
        kataSandiValidation.classList.remove("hidden");
        inputKataSandi.classList.replace("border-none", "border-2");
        kataSandiValidationContent.innerHTML = "Bagian ini wajib diisi";
    } else if (!inputKataSandiValue.match(rePass)) {
        kataSandiValidation.classList.remove("hidden");
        inputKataSandi.classList.replace("border-none", "border-2");
        kataSandiValidationContent.innerHTML =
            "Kata sandi yang Anda masukkan salah (Wajib mengandung huruf besar, huruf kecil, angka, simbol, serta minimal 8 karakter)";
    } else {
        kataSandiValidation.classList.add("hidden");
        inputKataSandi.classList.replace("border-2", "border-none");
    }

    // konfirmasi password validasi
    if (inputKataSandiValue == "") {
        konfirmasiKataSandiValidation.classList.remove("hidden");
        inputKonfirmasiKataSandi.classList.replace("border-none", "border-2");
        konfirmasiKataSandiValidationContent.innerHTML =
            "Bagian ini wajib diisi";
    } else if (inputKonfirmasiKataSandiValue != inputKataSandiValue) {
        konfirmasiKataSandiValidation.classList.remove("hidden");
        inputKonfirmasiKataSandi.classList.replace("border-none", "border-2");
        konfirmasiKataSandiValidationContent.innerHTML =
            "Konfirmasi kata sandi yang Anda masukkan salah (Wajib sama dengan kata sandi)";
    } else {
        konfirmasiKataSandiValidation.classList.add("hidden");
        inputKonfirmasiKataSandi.classList.replace("border-2", "border-none");
    }

    //validasi recaptcha udah di isi apa blom
    //False blom di isi | true udah di isi
    let recaptchaSudahDiIsi = false;
    if (grecaptcha.getResponse()) recaptchaSudahDiIsi = true;
    // console.log(recaptchaSudahDiIsi)

    // validasi recaptcha
    const beValidasiCaptcha = document.querySelector("#be-captcha-failed");
    if (beValidasiCaptcha) {
        beValidasiCaptcha.remove();
    }
    if (!recaptchaSudahDiIsi) {
        invalidRecaptcha.classList.replace("hidden", "flex");
    } else {
        invalidRecaptcha.classList.replace("flex", "hidden");
    }

    // validasi semua
    if (
        inputEmailPribadiValue != "" &&
        inputKataSandiValue != "" &&
        inputKonfirmasiKataSandiValue != "" &&
        inputEmailPribadiValue.match(reEmail) &&
        !inputEmailPribadiValue.toLowerCase().includes("@binus.ac.id") &&
        inputEmailPribadiValue.toLowerCase().indexOf("@binus.ac.id") < 0 &&
        inputKataSandiValue.match(rePass) &&
        inputKonfirmasiKataSandiValue == inputKataSandiValue &&
        recaptchaSudahDiIsi &&
        emailUnique
    ) {
        emailPribadiValidation.classList.add("hidden");
        inputEmailPribadi.classList.replace("border-2", "border-none");
        kataSandiValidation.classList.add("hidden");
        inputKataSandi.classList.replace("border-2", "border-none");
        konfirmasiKataSandiValidation.classList.add("hidden");
        inputKonfirmasiKataSandi.classList.replace("border-2", "border-none");
        invalidRecaptcha.classList.replace("flex", "hidden");

        let registrasiForm = document.querySelector("#registrasi-form");
        successPopup.classList.replace("hidden", "flex");
        successPopup.classList.add("animate-fade-in");
        setTimeout(() => {
            registrasiForm.submit();
        }, 1000);
    }
}

// next and back
let currentForm = 1;
let form1 = document.querySelector("#form-1");
let form2 = document.querySelector("#form-2");
let form3 = document.querySelector("#form-3");
let form4 = document.querySelector("#form-4");
function nextForm(clickedId) {
    let btnId = clickedId;
    if (currentForm == 1 && btnId == "btn-next-1") {
        form1.classList.replace("flex", "hidden");
        form2.classList.replace("hidden", "flex");
        currentForm = 2;
    } else if (currentForm == 2 && btnId == "btn-next-2") {
        form2.classList.replace("flex", "hidden");
        form3.classList.replace("hidden", "flex");
        currentForm = 3;
    } else if (currentForm == 3 && btnId == "btn-next-3") {
        form3.classList.replace("flex", "hidden");
        form4.classList.replace("hidden", "flex");
        currentForm = 4;
    }
}
function previousForm() {
    if (currentForm == 2) {
        form2.classList.replace("flex", "hidden");
        form1.classList.replace("hidden", "flex");
        currentForm = 1;
    } else if (currentForm == 3) {
        form3.classList.replace("flex", "hidden");
        form2.classList.replace("hidden", "flex");
        currentForm = 2;
    } else if (currentForm == 4) {
        form4.classList.replace("flex", "hidden");
        form3.classList.replace("hidden", "flex");
        currentForm = 3;
    }
}

// button validation
// function buttonValidation1() {
//     let inputNama = document.querySelector("#nama");
//     let inputLakiLaki = document.querySelector("#laki-laki");
//     let inputPerempuan = document.querySelector("#perempuan");
//     let inputTanggalLahir = document.querySelector("#tanggal-lahir");
//     let inputTempatLahir = document.querySelector("#tempat-lahir");
//     let inputDomisili = document.querySelector("#domisili");
//     let inputAlamat = document.querySelector("#alamat");
//     let inputIDLINE = document.querySelector("#id-line");
//     let inputWhatsapp = document.querySelector("#whatsapp");

//     let btnNext1 = document.querySelector("#btn-next-1");
//     if (
//         inputNama.value != "" &&
//         (inputLakiLaki.checked || inputPerempuan.checked) &&
//         inputTanggalLahir.value != "" &&
//         inputTempatLahir.value != "" &&
//         inputDomisili.value != "" &&
//         inputAlamat.value != "" &&
//         inputIDLINE.value != "" &&
//         inputWhatsapp.value != ""
//     ) {
//         btnNext1.classList.remove("opacity-50");
//         btnNext1.removeAttribute("disabled", "");
//     } else {
//         btnNext1.classList.add("opacity-50");
//         btnNext1.setAttribute("disabled", "");
//     }
// }
// function buttonValidation2() {
//     let inputNIM = document.querySelector("#nim");
//     let inputKampus = document.querySelector("#region-kampus");
//     let inputBatch = document.querySelector("#fakultas");
//     let inputJurusan = document.querySelector("#jurusan");
//     let inputBatchFYP = document.querySelector("#batch-fyp");

//     let btnNext2 = document.querySelector("#btn-next-2");
//     if (
//         inputNIM.value != "" &&
//         inputKampus.value != "" &&
//         inputFakultas.value != "" &&
//         inputJurusan.value != "" &&
//         inputBatchFYP.value != ""
//     ) {
//         btnNext2.classList.remove("opacity-50");
//         btnNext2.removeAttribute("disabled", "");
//     } else {
//         btnNext2.classList.add("opacity-50");
//         btnNext2.setAttribute("disabled", "");
//     }
// }
// function buttonValidation3() {
//     let inputLnTCourse = document.querySelector("#lnt-course");
//     let inputJadwalBNCCLaunching = document.querySelector(
//         "#jadwal-bncc-launching"
//     );

//     let btnNext3 = document.querySelector("#btn-next-3");
//     if (inputLnTCourse.value != "" && inputJadwalBNCCLaunching.value != "") {
//         btnNext3.classList.remove("opacity-50");
//         btnNext3.removeAttribute("disabled", "");
//     } else {
//         btnNext3.classList.add("opacity-50");
//         btnNext3.setAttribute("disabled", "");
//     }
// }
// function buttonValidation4() {
//     let inputEmailPribadi = document.querySelector("#email-pribadi");
//     let inputKataSandi = document.querySelector("#kata-sandi");
//     let inputKonfirmasiKataSandi = document.querySelector(
//         "#konfirmasi-kata-sandi"
//     );

//     let btnSubmit = document.querySelector("#btn-submit");
//     if (
//         inputEmailPribadi.value != "" &&
//         inputKataSandi.value != "" &&
//         inputKonfirmasiKataSandi.value != ""
//     ) {
//         btnSubmit.classList.remove("opacity-50");
//         btnSubmit.removeAttribute("disabled", "");
//     } else {
//         btnSubmit.classList.add("opacity-50");
//         btnSubmit.setAttribute("disabled", "");
//     }
// }
// function buttonValidationAll() {
//     buttonValidation1();
//     buttonValidation2();
//     buttonValidation3();
//     buttonValidation4();
// }

// region fakultas jurusan
function changeFakultas() {
    let jurusanSelect = document.querySelector("#jurusan");
    jurusanSelect.innerHTML =
        "<option value='' disabled='disabled' selected='selected'>Pilih fakultas Anda terlebih dahulu</option>";
    changeLnTCourse();
    changeJadwalBL();
    changeTrialClass1();
    let region = document.querySelector("#region-kampus");
    let regionVal = region.value;

    let fakultasSelect = document.querySelector("#fakultas");
    if (regionVal == "Kemanggisan" || regionVal == "Alam Sutera") {
        fakultasSelect.innerHTML = fakultasList[0];
    } else if (regionVal == "Bandung") {
        fakultasSelect.innerHTML = fakultasList[1];
    } else if (regionVal == "Malang") {
        fakultasSelect.innerHTML = fakultasList[2];
    } else if (regionVal == "Bekasi") {
        fakultasSelect.innerHTML = fakultasList[3];
    } else if (regionVal == "Senayan") {
        fakultasSelect.innerHTML = fakultasList[4];
    } else if (regionVal == "Semarang") {
        fakultasSelect.innerHTML = fakultasList[5];
    } else if (regionVal == "BOL") {
        fakultasSelect.innerHTML = fakultasList[6];
    } else if (regionVal == "ASO") {
        fakultasSelect.innerHTML = fakultasList[7];
    }
}

function changeJurusan() {
    let region = document.querySelector("#region-kampus");
    let regionVal = region.value;

    let fakultas = document.querySelector("#fakultas");
    let fakultasVal = fakultas.value;

    let jurusanSelect = document.querySelector("#jurusan");
    if (regionVal == "Alam Sutera") {
        if (fakultasVal == "Binus Business School") {
            jurusanSelect.innerHTML = jurusanList[0];
        } else if (fakultasVal == "Faculty of Economics and Communication") {
            jurusanSelect.innerHTML = jurusanList[1];
        } else if (fakultasVal == "Faculty of Engineering") {
            jurusanSelect.innerHTML = jurusanList[2];
        } else if (fakultasVal == "Faculty of Humanities") {
            jurusanSelect.innerHTML = jurusanList[3];
        } else if (fakultasVal == "School of Computer Science") {
            jurusanSelect.innerHTML = jurusanList[4];
        } else if (fakultasVal == "School of Design") {
            jurusanSelect.innerHTML = jurusanList[5];
        } else if (fakultasVal == "School of Information Systems") {
            jurusanSelect.innerHTML = jurusanList[6];
        }
    } else if (regionVal == "Kemanggisan") {
        if (fakultasVal == "Binus Business School") {
            jurusanSelect.innerHTML = jurusanList[7];
        } else if (fakultasVal == "Faculty of Economics and Communication") {
            jurusanSelect.innerHTML = jurusanList[8];
        } else if (fakultasVal == "Faculty of Engineering") {
            jurusanSelect.innerHTML = jurusanList[9];
        } else if (fakultasVal == "Faculty of Humanities") {
            jurusanSelect.innerHTML = jurusanList[10];
        } else if (fakultasVal == "School of Computer Science") {
            jurusanSelect.innerHTML = jurusanList[11];
        } else if (fakultasVal == "School of Design") {
            jurusanSelect.innerHTML = jurusanList[12];
        } else if (fakultasVal == "School of Information Systems") {
            jurusanSelect.innerHTML = jurusanList[13];
        }
    } else if (regionVal == "Bandung") {
        if (fakultasVal == "Binus Business School") {
            jurusanSelect.innerHTML = jurusanList[14];
        } else if (fakultasVal == "School of Computer Science") {
            jurusanSelect.innerHTML = jurusanList[15];
        } else if (fakultasVal == "School of Design") {
            jurusanSelect.innerHTML = jurusanList[16];
        }
    } else if (regionVal == "Malang") {
        if (fakultasVal == "Binus Business School") {
            jurusanSelect.innerHTML = jurusanList[17];
        } else if (fakultasVal == "School of Computer Science") {
            jurusanSelect.innerHTML = jurusanList[18];
        } else if (fakultasVal == "School of Design") {
            jurusanSelect.innerHTML = jurusanList[19];
        } else if (fakultasVal == "Faculty of Economics and Communication") {
            jurusanSelect.innerHTML = jurusanList[20];
        }
    } else if (regionVal == "Bekasi") {
        if (fakultasVal == "School of Computer Science") {
            jurusanSelect.innerHTML = jurusanList[21];
        } else if (fakultasVal == "School of Information Systems") {
            jurusanSelect.innerHTML = jurusanList[22];
        } else if (fakultasVal == "Binus Business School") {
            jurusanSelect.innerHTML = jurusanList[23];
        } else if (fakultasVal == "Faculty of Economics and Communication") {
            jurusanSelect.innerHTML = jurusanList[24];
        } else if (fakultasVal == "Faculty of Humanities") {
            jurusanSelect.innerHTML = jurusanList[25];
        }
    } else if (regionVal == "Senayan") {
        if (fakultasVal == "FX") {
            jurusanSelect.innerHTML = jurusanList[26];
        } else if (fakultasVal == "JWC") {
            jurusanSelect.innerHTML = jurusanList[27];
        }
    } else if (regionVal == "Semarang") {
        if (fakultasVal == "School of Design") {
            jurusanSelect.innerHTML = jurusanList[28];
        } else if (fakultasVal == "Faculty of Industrial Engineering") {
            jurusanSelect.innerHTML = jurusanList[29];
        } else if (fakultasVal == "School of Information Systems") {
            jurusanSelect.innerHTML = jurusanList[30];
        } else if (fakultasVal == "School of Computer Science") {
            jurusanSelect.innerHTML = jurusanList[31];
        } else if (fakultasVal == "Binus Business School") {
            jurusanSelect.innerHTML = jurusanList[32];
        }
    } else if (regionVal == "BOL") {
        if (fakultasVal == "BOL") {
            jurusanSelect.innerHTML = jurusanList[33];
        }
    } else if (regionVal == "ASO") {
        if (fakultasVal == "ASO") {
            jurusanSelect.innerHTML = jurusanList[34];
        }
    }
}

function changeJadwalBL() {
    let region = document.querySelector("#region-kampus");
    let regionVal = region.value;

    let jadwalBLSelect = document.querySelector("#jadwal-bncc-launching");
    if (
        regionVal == "Kemanggisan" ||
        regionVal == "Bekasi" ||
        regionVal == "Senayan" ||
        regionVal == "Semarang" ||
        regionVal == "BOL" ||
        regionVal == "ASO"
    ) {
        jadwalBLSelect.innerHTML = jadwalBL[0];
    } else if (regionVal == "Alam Sutera") {
        jadwalBLSelect.innerHTML = jadwalBL[1];
    } else if (regionVal == "Malang") {
        jadwalBLSelect.innerHTML = jadwalBL[2];
    } else if (regionVal == "Bandung") {
        jadwalBLSelect.innerHTML = jadwalBL[3];
    }
}

function changeTrialClass1() {
    let region = document.querySelector("#region-kampus");
    let regionVal = region.value;

    let jadwalTrialClassSelect = document.querySelector("#jadwal-trial-class");
    if (
        regionVal == "Kemanggisan" ||
        regionVal == "Bekasi" ||
        regionVal == "Senayan" ||
        regionVal == "Semarang" ||
        regionVal == "BOL" ||
        regionVal == "ASO" ||
        regionVal == "Alam Sutera"
    ) {
        jadwalTrialClassSelect.innerHTML =
            "<option value='-' disabled='disabled' selected='selected'>Region Anda belum bisa pilih jadwal Trial Class</option>";
        document
            .querySelector("#jadwal-trial-class-form")
            .classList.add("hidden");
        // } else if (regionVal == "Alam Sutera") {
        //     document
        //         .querySelector("#jadwal-trial-class-form")
        //         .classList.remove("hidden");
        //     jadwalTrialClassSelect.innerHTML =
        //         "<option value='' disabled='disabled' selected='selected'>Pilih jadwal BNCC Launching Anda terlebih dahulu</option>";
    } else if (regionVal == "Malang") {
        document
            .querySelector("#jadwal-trial-class-form")
            .classList.remove("hidden");
        jadwalTrialClassSelect.innerHTML =
            "<option value='-' disabled='disabled' selected='selected'>BNCC Trial Class telah selesai</option>";
    } else if (regionVal == "Bandung") {
        document
            .querySelector("#jadwal-trial-class-form")
            .classList.remove("hidden");
        jadwalTrialClassSelect.innerHTML =
            "<option value='-' disabled='disabled' selected='selected'>BNCC Trial Class telah selesai</option>";
    }
}

function changeTrialClass2() {
    let region = document.querySelector("#region-kampus");
    let regionVal = region.value;
    let jadwalBL = document.querySelector("#jadwal-bncc-launching");
    let jadwalBLVal = jadwalBL.value;

    let jadwalTrialClassSelect = document.querySelector("#jadwal-trial-class");
    if (regionVal == "Alam Sutera") {
        if (
            jadwalBLVal ==
            "Kamis, 15 September 2022 (10.00 - 12.00) - C Programming"
        ) {
            jadwalTrialClassSelect.innerHTML =
                "<option value='Kamis, 15 September 2022 (10.00 - 12.00) - C Programming'>Kamis, 15 September 2022 (10.00 - 12.00) - C Programming</option>";
        } else if (
            jadwalBLVal ==
            "Kamis, 15 September 2022 (13.00 - 15.00) - Java Programming"
        ) {
            jadwalTrialClassSelect.innerHTML =
                "<option value='Kamis, 15 September 2022 (13.00 - 15.00) - Java Programming'>Kamis, 15 September 2022 (13.00 - 15.00) - Java Programming</option>";
        } else if (
            jadwalBLVal ==
            "Jumat, 16 September 2022 (10.00 - 12.00) - Front-End Development"
        ) {
            jadwalTrialClassSelect.innerHTML =
                "<option value='Jumat, 16 September 2022 (10.00 - 12.00) - Front-End Development'>Jumat, 16 September 2022 (10.00 - 12.00) - Front-End Development</option>";
        } else if (
            jadwalBLVal ==
            "Jumat, 16 September 2022 (13.00 - 15.00) - UI/UX Design"
        ) {
            jadwalTrialClassSelect.innerHTML =
                "<option value='Jumat, 16 September 2022 (13.00 - 15.00) - UI/UX Design'>Jumat, 16 September 2022 (13.00 - 15.00) - UI/UX Design</option>";
        }
    } else if (regionVal == "Malang") {
        if (
            jadwalBLVal ==
            "Senin, 19 September 2022 (10.00 - 12.00) - UI/UX Design"
        ) {
            jadwalTrialClassSelect.innerHTML =
                "<option value='Senin, 19 September 2022 (10.00 - 12.00) - UI/UX Design'>Senin, 19 September 2022 (10.00 - 12.00) - UI/UX Design</option>";
        } else if (
            jadwalBLVal ==
            "Senin, 19 September 2022 (13.00 - 15.00) - Front-End Development"
        ) {
            jadwalTrialClassSelect.innerHTML =
                "<option value='Senin, 19 September 2022 (13.00 - 15.00) - Front-End Development'>Senin, 19 September 2022 (13.00 - 15.00) - Front-End Development</option>";
        }
    }
}

function changeLnTCourse() {
    let region = document.querySelector("#region-kampus");
    let regionVal = region.value;

    let lntCourseSelect = document.querySelector("#lnt-course");
    if (
        regionVal == "Kemanggisan" ||
        regionVal == "Bekasi" ||
        regionVal == "Senayan" ||
        regionVal == "Semarang" ||
        regionVal == "BOL" ||
        regionVal == "ASO"
    ) {
        lntCourseSelect.innerHTML = lntCourseList[0];
    } else if (regionVal == "Alam Sutera") {
        lntCourseSelect.innerHTML = lntCourseList[1];
    } else if (regionVal == "Malang" || regionVal == "Bandung") {
        lntCourseSelect.innerHTML = lntCourseList[2];
    }
}

let fakultasList = [
    `<option value='' disabled='disabled' selected='selected'>Pilih fakultas Anda</option>
    <option value='Binus Business School'>Binus Business School</option>
    <option value='Faculty of Economics and Communication'>Faculty of Economics and Communication</option>
    <option value='Faculty of Engineering'>Faculty of Engineering</option>
    <option value='Faculty of Humanities'>Faculty of Humanities</option>
    <option value='School of Computer Science'>School of Computer Science</option>
    <option value='School of Design'>School of Design</option>
    <option value='School of Information Systems'>School of Information Systems</option>`,
    `<option value='' disabled='disabled' selected='selected'>Pilih fakultas Anda</option>
    <option value='Binus Business School'>Binus Business School</option>
    <option value='School of Computer Science'>School of Computer Science</option>
    <option value='School of Design'>School of Design</option>`,
    `<option value='' disabled='disabled' selected='selected'>Pilih fakultas Anda</option>
    <option value='Binus Business School'>Binus Business School</option>
    <option value='School of Computer Science'>School of Computer Science</option>
    <option value='School of Design'>School of Design</option>
    <option value='Faculty of Economics and Communication'>Faculty of Economics and Communication</option>`,
    `<option value='' disabled='disabled' selected='selected'>Pilih fakultas Anda</option>
    <option value='School of Computer Science'>School of Computer Science</option>
    <option value='School of Information Systems'>School of Information Systems</option>
    <option value='Binus Business School'>Binus Business School</option>
    <option value='Faculty of Economics and Communication'>Faculty of Economics and Communication</option>
    <option value='Faculty of Humanities'>Faculty of Humanities</option>`,
    `<option value='' disabled='disabled' selected='selected'>Pilih fakultas Anda</option>
    <option value='FX'>FX</option><option value='JWC'>JWC</option>`,
    `<option value='' disabled='disabled' selected='selected'>Pilih fakultas Anda</option>
    <option value='School of Design'>School of Design</option>
    <option value='Faculty of Industrial Engineering'>Faculty of Industrial Engineering</option>
    <option value='School of Information Systems'>School of Information Systems</option>
    <option value='School of Computer Science'>School of Computer Science</option>
    <option value='Binus Business School'>Binus Business School</option>`,
    `<option value='' disabled='disabled' selected='selected'>Pilih fakultas Anda</option>
    <option value='BOL'>BOL</option>`,
    `<option value='' disabled='disabled' selected='selected'>Pilih fakultas Anda</option>
    <option value='ASO'>ASO</option>`,
];

let jurusanList = [
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Business Creation'>Business Creation</option><option value='Global Business Marketing'>Global Business Marketing</option><option value='International Business Management'>International Business Management</option><option value='Management'>Management</option><option value='Master of Management'>Master of Management</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Accounting'>Accounting</option><option value='Communication - Marketing Communication'>Communication - Marketing Communication</option><option value='Communication - Mass Communication'>Communication - Mass Communication</option><option value='Finance'>Finance</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Food Technology'>Food Technology</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Chinese Literature'>Chinese Literature</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Computer Science'>Computer Science</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Film'>Film</option><option value='Visual Communication Design - Animation'>Visual Communication Design - Animation</option><option value='Visual Communication Design - New Media'>Visual Communication Design - New Media</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Information Systems'>Information Systems</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Management'>Management</option><option value='Business Creation'>Business Creation</option><option value='Business Management'>Business Management</option><option value='Global Business Marketing'>Global Business Marketing</option><option value='International Business Management'>International Business Management</option><option value='Master of Management'>Master of Management</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Accounting'>Accounting</option><option value='Finance'>Finance</option><option value='Tourism'>Tourism</option><option value='Communication - Marketing Communication'>Communication - Marketing Communication</option><option value='Communication - Mass Communication'>Communication - Mass Communication</option><option value='Hotel Management'>Hotel Management</option><option value='Business Hotel Management'>Business Hotel Management</option><option value='Taxation'>Taxation</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Architecture'>Architecture</option><option value='Civil Engineering'>Civil Engineering</option><option value='Computer Engineering'>Computer Engineering</option><option value='Food Technology'>Food Technology</option><option value='Industrial Engineering'>Industrial Engineering</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Chinese Literature'>Chinese Literature</option><option value='English Literature'>English Literature</option><option value='International Relations'>International Relations</option><option value='Japanese Literature'>Japanese Literature</option><option value='Law - Business Law'>Law - Business Law</option><option value='Primary Teacher Education'>Primary Teacher Education</option><option value='Psychology'>Psychology</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Computer Science'>Computer Science</option><option value='Cyber Security'>Cyber Security</option><option value='Data Science'>Data Science</option><option value='Game Application and Technology'>Game Application and Technology</option><option value='Mobile Application and Technology'>Mobile Application and Technology</option><option value='Computer Science & Mathematics'>Computer Science & Mathematics</option><option value='Computer Science & Statistics'>Computer Science & Statistics</option><option value='Master of Computer Science'>Master of Computer Science</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Film'>Film</option><option value='Interior Design'>Interior Design</option><option value='Visual Communication Design - Animation'>Visual Communication Design - Animation</option><option value='Visual Communication Design - Creative Advertising'>Visual Communication Design - Creative Advertising</option><option value='Visual Communication Design - New Media'>Visual Communication Design - New Media</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Business Analytics'>Business Analytics</option><option value='Business Information Technology'>Business Information Technology</option><option value='Information Systems'>Information Systems</option><option value='Information Systems Accounting and Auditing'>Information Systems Accounting and Auditing</option><option value='Information Systems & Accounting'>Information Systems & Accounting</option><option value='Information Systems & Management'>Information Systems & Management</option><option value='Master of Information Systems Management'>Master of Information Systems Management</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Creativepreneurship'>Creativepreneurship</option><option value='Digital Business Innovation'>Digital Business Innovation</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Computer Science'>Computer Science</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Interior Design'>Interior Design</option><option value='Visual Communication Design'>Visual Communication Design</option><option value='Interactive Design & Technology'>Interactive Design & Technology</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Entrepreneurship - Business Creation'>Entrepreneurship - Business Creation</option><option value='Digital Business Innovation'>Digital Business Innovation</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Computer Science'>Computer Science</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Interior Design'>Interior Design</option><option value='Visual Communication Design'>Visual Communication Design</option><option value='Interactive Design & Technology'>Interactive Design & Technology</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Communication'>Communication</option><option value='Public Relations'>Public Relations</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Software Engineering'>Software Engineering</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Business Information Technology'>Business Information Technology</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Management'>Management</option><option value='Business Management'>Business Management</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Accounting'>Accounting</option><option value='Business Hotel Management'>Business Hotel Management</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Psychology'>Psychology</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Fashion Design (International Program)'>Fashion Design (International Program)</option><option value='Fashion Management (International Program)'>Fashion Management (International Program)</option><option value='Graphic Design and New Media (International Program)'>Graphic Design and New Media (International Program)</option><option value='Interactive Digital Media (International Program)'>Interactive Digital Media (International Program)</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Finance (International Program)'>Finance (International Program)</option><option value='Business Information Systems (International Program)'>Business Information Systems (International Program)</option><option value='Business Management & Marketing (International Program)'>Business Management & Marketing (International Program)</option><option value='Communication (International Program)'>Communication (International Program)</option><option value='Computer Science (International Program)'>Computer Science (International Program)</option><option value='International Business (International Program)'>International Business (International Program)</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Visual Communication Design'>Visual Communication Design</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Industrial Engineering'>Industrial Engineering</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Information Systems'>Information Systems</option><option value='Master of Information Systems'>Master of Information Systems</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Computer Science'>Computer Science</option><option value='Master of Computer Science'>Master of Computer Science</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Digital Business'>Digital Business</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Accounting'>Accounting</option><option value='Computer Science'>Computer Science</option><option value='Industrial Engineering'>Industrial Engineering</option><option value='Information Systems'>Information Systems</option><option value='Business Management'>Business Management</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih jurusan Anda</option><option value='Automotive and Robotics Engineering'>Automotive and Robotics Engineering</option><option value='Product Design Engineering'>Product Design Engineering</option>",
];

let lntCourseList = [
    "<option value='' disabled='disabled' selected='selected'>Pilih LnT Course yang Anda inginkan</option><option value='Front-End Development'>Front-End Development</option><option value='Back-End Development'>Back-End Development</option><option value='UI/UX Design'>UI/UX Design</option><option value='Java Programming'>Java Programming</option><option value='Mobile Application Development'>Mobile Application Development</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih LnT Course yang Anda inginkan</option><option value='Front-End Development'>Front-End Development</option><option value='UI/UX Design'>UI/UX Design</option><option value='Java Programming'>Java Programming</option><option value='C Programming'>C Programming</option>",
    "<option value='' disabled='disabled' selected='selected'>Pilih LnT Course yang Anda inginkan</option><option value='Front-End Development'>Front-End Development</option><option value='Back-End Development'>Back-End Development</option><option value='UI/UX Design'>UI/UX Design</option>",
];

// BNCC Lauching Schedule
/*
 <option value='Kamis, 15 September 2022 (10.00 - 12.00)'>Kamis, 15 September 2022 (10.00 - 12.00)</option>
<option value='Kamis, 15 September 2022 (13.00 - 15.00)'>Kamis, 15 September 2022 (13.00 - 15.00)</option>
<option value='Kamis, 15 September 2022 (16.00 - 18.00)'>Kamis, 15 September 2022 (16.00 - 18.00)</option>
<option value='Kamis, 15 September 2022 (19.00 - 21.00)'>Kamis, 15 September 2022 (19.00 - 21.00)</option>
<option value='Jumat, 16 September 2022 (10.00 - 12.00)'>Jumat, 16 September 2022 (10.00 - 12.00)</option>
<option value='Jumat, 16 September 2022 (13.00 - 15.00)'>Jumat, 16 September 2022 (13.00 - 15.00)</option>
<option value='Jumat, 16 September 2022 (16.00 - 18.00)'>Jumat, 16 September 2022 (16.00 - 18.00)</option>
<option value='Jumat, 16 September 2022 (19.00 - 21.00)'>Jumat, 16 September 2022 (19.00 - 21.00)</option>
<option value='Sabtu, 17 September 2022 (10.00 - 12.00)'>Sabtu, 17 September 2022 (10.00 - 12.00)</option>
<option value='Sabtu, 17 September 2022 (13.00 - 15.00)'>Sabtu, 17 September 2022 (13.00 - 15.00)</option>
<option value='Sabtu, 17 September 2022 (16.00 - 18.00)'>Sabtu, 17 September 2022 (16.00 - 18.00)</option>
<option value='Sabtu, 17 September 2022 (19.00 - 21.00)'>Sabtu, 17 September 2022 (19.00 - 21.00)</option>
<option value='Senin, 19 September 2022 (16.00 - 18.00)'>Senin, 19 September 2022 (16.00 - 18.00)</option>
<option value="Senin, 19 September 2022 (13.00 - 15.00) - Front-End Development">Senin, 19 September 2022 (13.00 - 15.00) - Front-End Development</option>

*/

let jadwalBL = [
    // KMG
    `<option value="-" disabled="disabled" selected="selected">BNCC Launching telah selesai</option>`,
    // ALSUT
    `<option value="-" disabled="disabled" selected="selected">BNCC Launching telah selesai</option>`,
    // MALANG
    `<option value="-" disabled="disabled" selected="selected">BNCC Launching telah selesai</option>`,
    // BANDUNG
    `<option value="-" disabled="disabled" selected="selected">BNCC Launching telah selesai</option>`,
];

// toggle password
function togglePassword() {
    let inputPassword = document.querySelector("#kata-sandi");
    let eye1 = document.querySelector("#eye1");
    let eyeSlashed1 = document.querySelector("#eye-slashed1");

    if (inputPassword.type == "text") {
        // hide password
        eye1.classList.replace("block", "hidden");
        eyeSlashed1.classList.replace("hidden", "block");
        inputPassword.type = "password";
    } else if (inputPassword.type == "password") {
        // show password
        eye1.classList.replace("hidden", "block");
        eyeSlashed1.classList.replace("block", "hidden");
        inputPassword.type = "text";
    }
}

function toggleConfirmPassword() {
    let inputConfirmPassword = document.querySelector("#konfirmasi-kata-sandi");
    let eye2 = document.querySelector("#eye2");
    let eyeSlashed2 = document.querySelector("#eye-slashed2");

    if (inputConfirmPassword.type == "text") {
        // hide password
        eye2.classList.replace("block", "hidden");
        eyeSlashed2.classList.replace("hidden", "block");
        inputConfirmPassword.type = "password";
    } else if (inputConfirmPassword.type == "password") {
        // show password
        eye2.classList.replace("hidden", "block");
        eyeSlashed2.classList.replace("block", "hidden");
        inputConfirmPassword.type = "text";
    }
}
