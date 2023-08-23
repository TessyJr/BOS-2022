<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BNCC Opening Season</title>
    <link rel="stylesheet" href="{{asset('css/login-regis-forgot.css?t=150920221037')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon/favicon.svg?t=270720221356')}}">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    {{-- success popup --}}
    <section id="success-popup" class="hidden fixed w-screen h-screen z-[100] bg-black/50 justify-center items-center">
        <div class="bg-white tablet:p-28 p-12 flex flex-col justify-center items-center laptop:gap-8 tablet:gap-6 gap-4 rounded-[30px] relative">
            {{-- <img src="{{asset('assets/register/x.svg')}}" alt="x" class="absolute tablet:top-10 tablet:right-10 top-7 right-7 cursor-pointer"> --}}
            <img src="{{asset('assets/register/success.svg')}}" alt="success" class="laptop:w-[127px] tablet:w-[100px] w-[80px] h-auto">
            <div class="flex flex-col laptop:gap-4 tablet:gap-2 gap-1 justify-center items-center">
                <h1 class="laptop:text-3xl tablet:text-2xl text-xl font-poppins font-semibold text-center">Pendaftaran Berhasil!</h1>
                <p class="font-poppins laptop:text-xl tablet:text-lg text-sm font-medium">Akun Anda sedang dibuat...</p>
            </div>
        </div>
    </section>


    <section id="register-content" class="w-full min-h-screen relative px-[10%] py-20">
        {{-- Background --}}
        <section id="register-background" class="z-1 w-full">
            <img src="{{asset('assets/register-background/light.svg')}}" alt="light" class="absolute left-0 top-0 tablet:h-full laptop:w-auto w-4/5">
            <img src="{{asset('assets/register-background/left-rocks.svg')}}" alt="left rocks" class="absolute left-0 top-0 h-full w-auto">
            <img src="{{asset('assets/register-background/rock.svg')}}" alt="rock" class="absolute left-0 bottom-0 tablet:w-auto w-1/2">
            <img src="{{asset('assets/register-background/stars.svg')}}" alt="stars"
                class="absolute top-0 left-0 right-0 m-auto h-full">
            {{-- <img src="{{asset('assets/register-background/full.svg')}}" alt="full"
                class="absolute left-0 top-0 max-h-full max-w-full"> --}}
        </section>
        {{-- Content --}}
        <div class="flex laptop:justify-end justify-center items-center h-full w-full">
            <form action="{{route("register")}}" method="POST"
                class="flex flex-col items-center justify-center bg-white laptop:p-20 tablet:p-16 p-10 laptop:gap-10 tablet:gap-6 gap-3 rounded-[30px] font-poppins z-10 laptop:w-[650px] w-full" id="registrasi-form">
                @method("POST")
                @csrf
                <a href="{{ route('main') }}"><img src="{{asset('assets/bncc-logo/bncc-blue.svg')}}" alt="BNCC-logo" class="tablet:mb-2 mb-5"></a>
                {{-- bagian 1 --}}
                <div class="flex w-full flex-col items-center justify-center laptop:gap-10 tablet:gap-6 gap-4" id="form-1">
                    <img src="{{asset('assets/register/form1.svg')}}" alt="form1" class="mb-5">
                    {{-- Nama lengkap --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="nama">Nama Lengkap</label>
                        <input autocomplete="false" value="{{old('nama')}}" type="text" name="nama" id="nama" class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:px-5 px-3 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm border-[#DE3B25] border-none"
                            placeholder="Masukkan nama lengkap Anda" >
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="nama-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="nama-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>
                    {{-- Jenis kelamin --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="">Jenis Kelamin</label>
                        <div class="tablet:py-2 flex tablet:gap-8 gap-4">
                            <div class="flex tablet:gap-3 gap-2">
                                <input type="radio" name="jenisKelamin" value="Laki-laki" id="laki-laki"  {{(old('jenisKelamin') === 'Laki-laki')? "checked" : "" }}>
                                <label class="laptop:text-xl tablet:text-lg text-sm font-normal text-[rgba(56,53,48,0.7)]"
                                    for="laki-laki">Laki-laki</label>
                            </div>
                            <div class="flex tablet:gap-3 gap-2">
                                <input type="radio" name="jenisKelamin" value="Perempuan" id="perempuan"  {{(old('jenisKelamin') === 'Perempuan')? "checked" : "" }}>
                                <label class="laptop:text-xl tablet:text-lg text-sm font-normal text-[rgba(56,53,48,0.7)]"
                                    for="perempuan">Perempuan</label>
                            </div>
                        </div>
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="jenis-kelamin-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="jenis-kelamin-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>
                    {{-- tanggal lahir --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="tanggal-lahir">Tanggal Lahir</label>
                        <input type="date" name="birthDate" id="tanggal-lahir" value="{{old('birthDate')}}" max="2007-12-31" placeholder="Masukkan tanggal lahir Anda"
                            class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:px-5 px-3 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm border-[#DE3B25] border-none w-full">
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="tanggal-lahir-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="tanggal-lahir-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>
                    {{-- tempat lahir --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="tempat-lahir">Tempat Lahir</label>
                        <input type="text" name="placeBirth" id="tempat-lahir" value="{{old('placeBirth')}}"
                            class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:px-5 px-3 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm border-[#DE3B25] border-none"
                            placeholder="Masukkan tempat lahir Anda" >
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="tempat-lahir-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="tempat-lahir-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>
                    {{-- domisili --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="domisili">Kota Domisili</label>
                        <input value="{{old('domicile')}}" type="text" name="domicile" id="domisili" class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:px-5 px-3 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm border-[#DE3B25] border-none"
                            placeholder="Masukkan kota domisili Anda" >
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="domisili-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="domisili-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>
                    {{-- alamat lengkap --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="alamat">Alamat Lengkap</label>
                        <input value="{{old('address')}}" type="text" name="address" id="alamat" class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:px-5 px-3 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm border-[#DE3B25] border-none"
                            placeholder="Masukkan alamat lengkap Anda" >
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="alamat-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="alamat-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>
                    {{-- line ID --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="id-line">ID LINE</label>
                        <input readonly
                        onfocus="this.removeAttribute('readonly');" value="{{old('lineID')}}" type="text" name="lineID" id="id-line" class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:px-5 px-3 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm border-[#DE3B25] border-none" placeholder="Masukkan ID LINE Anda" >
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="line-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="line-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>
                    {{-- whatsapp --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="whatsapp">Nomor WhatsApp</label>
                        <input value="{{old('whatsapp')}}" type="text" name="whatsapp" id="whatsapp" class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:px-5 px-3 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm border-[#DE3B25] border-none"
                            placeholder="Masukkan nomor WhatsApp Anda" >
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="whatsapp-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="whatsapp-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>
                    {{-- Instagram --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="instagram">Instagram</label>
                        <input value="{{old('instagram')}}" type="text" name="instagram" id="instagram" class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:px-5 px-3 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm border-[#DE3B25] border-none"
                            placeholder="Masukkan username Instagram Anda" >
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="instagram-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="instagram-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>
                    {{-- agama --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="agama">Agama</label>
                        <select name="agama" id="agama" class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat tablet:bg-auto border-[#DE3B25] border-none"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');">
                            <option value="" disabled="disabled" selected="selected">Pilih agama Anda</option>
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Islam">Islam</option>
                            <option value="Konghucu">Konghucu</option>
                            <option value="Kristen Katolik">Kristen Katolik</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                        </select>
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="agama-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="agama-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>

                    <button id="btn-next-1" type="button"
                        class="mt-10 laptop:px-20 tablet:px-16 px-12 laptop:py-4 tablet:py-3 py-2 laptop:text-2xl tablet:text-xl text-md font-poppins font-semibold rounded-[100px] text-white" onclick="validateForm1(this.id)">Next</button>
                </div>

                {{-- bagian 2 --}}
                <div class="hidden w-full flex-col items-center justify-center laptop:gap-10 tablet:gap-6 gap-4" id="form-2">
                    <img src="{{asset('assets/register/form2.svg')}}" alt="form2" class="mb-5">
                    {{-- nim --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="nim">NIM</label>
                        <input value="{{old('nim')}}" type="text" name="nim" id="nim" class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:px-5 px-3 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm border-[#DE3B25] border-none"
                            placeholder="Masukkan NIM Anda" >
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="nim-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="nim-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>
                    {{-- region kampus --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="region-kampus">Region Kampus</label>
                        <select name="campusRegion" id="region-kampus" class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat tablet:bg-auto border-[#DE3B25] border-none"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');" onchange="changeFakultas();">
                            <option value="" disabled="disabled" selected="selected">Pilih region kampus Anda</option>
                            <option value="Kemanggisan">Kemanggisan</option>
                            <option value="Alam Sutera">Alam Sutera</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Malang">Malang</option>
                            <option value="Bekasi">Bekasi</option>
                            <option value="Senayan">Senayan</option>
                            <option value="Semarang">Semarang</option>
                            <option value="BOL">BOL</option>
                            <option value="ASO">ASO</option>
                        </select>
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="region-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="region-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>
                    {{-- fakultas --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="fakultas">Fakultas</label>
                        <select name="faculty" id="fakultas" class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat tablet:bg-auto border-[#DE3B25] border-none"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');" onchange="changeJurusan();">
                            <option value="" disabled="disabled" selected="selected">Pilih region kampus Anda terlebih dahulu</option>
                        </select>
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="fakultas-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="fakultas-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>
                    {{-- jurusan --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="jurusan">Jurusan</label>
                        <select name="major" id="jurusan" class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat tablet:bg-auto border-[#DE3B25] border-none"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');" onchange="">
                            <option value="" disabled="disabled" selected="selected">Pilih fakultas Anda terlebih dahulu</option>
                        </select>
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="jurusan-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="jurusan-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>
                    {{-- Batch fyp --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="batch-fyp">Batch FYP</label>
                        <select name="batch" id="batch-fyp" class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat border-[#DE3B25] border-none"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');" onchange="">
                            <option value="" disabled="disabled" selected="selected">Pilih batch FYP Anda</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            {{-- <option value="Others">Others</option> --}}
                            {{-- <option value="EBN">EBN</option>
                            <option value="FBN">FBN</option> --}}
                        </select>
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="batchFYP-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="batchFYP-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>

                    <div class="flex tablet:gap-4 gap-2">
                        <button type="button"
                            class="mt-10 laptop:px-20 tablet:px-16 px-8 laptop:py-4 tablet:py-3 py-2 laptop:text-2xl tablet:text-xl text-sm font-poppins font-semibold rounded-[100px] text-[#00A3FF] border-[#00A3FF] border-[3px]" onclick="previousForm()">Back</button>
                        <button id="btn-next-2" type="button"
                            class="mt-10 laptop:px-20 tablet:px-16 px-10 laptop:py-4 tablet:py-3 py-2 laptop:text-2xl tablet:text-xl text-sm font-poppins font-semibold rounded-[100px] text-white" onclick="validateForm2(this.id)">Next</button>
                    </div>
                </div>

                {{-- bagian 3 --}}
                <div class="hidden w-full flex-col items-center justify-center laptop:gap-10 tablet:gap-6 gap-4" id="form-3">
                    <img src="{{asset('assets/register/form3.svg')}}" alt="form3" class="mb-5">
                    {{-- lnt course --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="lnt-course">LnT Course</label>
                        <select name="course" id="lnt-course" class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat tablet:bg-auto border-[#DE3B25] border-none"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');" onchange="">
                            <option value="" disabled="disabled" selected="selected">Pilih region Anda terlebih dahulu</option>
                        </select>
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="lntcourse-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="lntcourse-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>
                    {{-- jadwal bncc launching --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="jadwal-bncc-launching">Jadwal BNCC Launching</label>
                        <select name="schedule" id="jadwal-bncc-launching" class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat tablet:bg-auto border-[#DE3B25] border-none"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');" onchange="changeTrialClass2();">
                            <option value="" disabled="disabled" selected="selected">Pilih region Anda terlebih dahulu</option>
                        </select>

                        <div class="flex items-center justify-start gap-1 hidden" id="jadwal-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="jadwal-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>

                    {{-- Jadwal Trial Class --}}
                    <div id="jadwal-trial-class-form" class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="jadwal-trial-class">Jadwal Trial Class</label>
                        <select name="trial_class" id="jadwal-trial-class" class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat tablet:bg-auto border-[#DE3B25] border-none"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');" onchange="">
                            <option value="" disabled="disabled" selected="selected">Pilih region Anda terlebih dahulu</option>
                        </select>

                        <div class="flex items-center justify-start gap-1 hidden" id="jadwal-trial-class-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="jadwal-trial-class-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>

                    {{-- Daftar dari mana --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="daftar-dari-mana">Daftar BNCC dari mana?</label>
                        <div class="flex laptop:text-xl tablet:text-lg text-sm laptop:gap-8 tablet:gap-6 gap-4 items-stretch w-full">
                            {{-- left column --}}
                            <div class="flex flex-col gap-4">
                                <div class="flex gap-2 items-center">
                                    <input type="checkbox" name="registration_source[]" id="freshmen-leader" value="Freshmen Leader" class="laptop:w-5 laptop:h-5 tablet:w-4 tablet:h-4">
                                    <label for="freshmen-leader">Freshmen Leader</label>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <input type="checkbox" name="registration_source[]" id="teman" value="Teman" class="laptop:w-5 laptop:h-5 tablet:w-4 tablet:h-4">
                                    <label for="teman">Teman</label>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <input type="checkbox" name="registration_source[]" id="instagram-bncc" value="Instagram BNCC" class="laptop:w-5 laptop:h-5 tablet:w-4 tablet:h-4">
                                    <label for="instagram-bncc">Instagram BNCC</label>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <input type="checkbox" id="dari-email" name="registration_source[]" value="Email" class="laptop:w-5 laptop:h-5 tablet:w-4 tablet:h-4">
                                    <label for="dari-email">Email</label>
                                </div>
                            </div>
                            {{-- right column --}}
                            <div class="flex flex-col gap-4">
                                <div class="flex gap-2 items-center">
                                    <input type="checkbox" name="registration_source[]" id="live-session-qna" value="Live Session Q&A" class="laptop:w-5 laptop:h-5 tablet:w-4 tablet:h-4">
                                    <label for="live-session-qna">Live Session Q&A</label>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <input type="checkbox" name="registration_source[]" id="codesign" value="Codesign" class="laptop:w-5 laptop:h-5 tablet:w-4 tablet:h-4">
                                    <label for="codesign">Codesign</label>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <input type="checkbox" name="registration_source[]" id="bncc-expo" value="BNCC Expo" class="laptop:w-5 laptop:h-5 tablet:w-4 tablet:h-4">
                                    <label for="bncc-expo">BNCC Expo</label>
                                </div>
                                <div class="flex gap-2 items-center">
                                    <input type="checkbox" id="others" name="registration_source[]" value="Others" class="laptop:w-5 laptop:h-5 tablet:w-4 tablet:h-4">
                                    <label for="others">Others</label>
                                </div>
                            </div>

                        </div>
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="daftar-dari-mana-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="daftar-dari-mana-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>

                    <div class="flex tablet:gap-4 gap-2">
                        <button  type="button"
                            class="mt-10 laptop:px-20 tablet:px-16 px-8 laptop:py-4 tablet:py-3 py-2 laptop:text-2xl tablet:text-xl text-sm font-poppins font-semibold rounded-[100px] text-[#00A3FF] border-[#00A3FF] border-[3px]" onclick="previousForm()">Back</button>
                        <button id="btn-next-3" type="button"
                            class="mt-10 laptop:px-20 tablet:px-16 px-8 laptop:py-4 tablet:py-3 py-2 laptop:text-2xl tablet:text-xl text-sm font-poppins font-semibold rounded-[100px] text-white" onclick="validateForm3(this.id)">Next</button>
                    </div>
                </div>

                {{-- bagian 4 --}}
                <div class="hidden w-full flex-col items-center justify-center laptop:gap-10 tablet:gap-6 gap-4" id="form-4">
                    <img src="{{asset('assets/register/form4.svg')}}" alt="form4" class="mb-5">
                    {{-- email pribadi --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="email-pribadi">Email Pribadi</label>
                        <input value="{{old('personalEmail')}}" type="text" name="personalEmail" id="email-pribadi"
                            class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:px-5 px-3 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm border-[#DE3B25] border-none"
                            placeholder="Masukkan email pribadi Anda" >
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="email-pribadi-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="email-pribadi-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>
                    {{-- password --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="password">Kata Sandi</label>
                        <div class="relative w-full">
                            <input value="{{old('password')}}" type="password" name="password" id="kata-sandi"
                                class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm border-[#DE3B25] border-none w-full tablet:pr-14 pr-9"
                                placeholder="Masukkan kata sandi Anda" >
                            <img src="{{asset('assets/icon/eye.svg')}}" alt="eye" class="tablet:w-[25px] w-[14px] cursor-pointer hidden absolute tablet:right-5 right-3 top-0 bottom-0 my-auto" id="eye1" onclick="togglePassword()">
                            <img src="{{asset('assets/icon/eye-slashed.svg')}}" alt="eye-slashed" class="tablet:w-[25px] w-[14px] cursor-pointer block absolute tablet:right-5 right-3 top-0 bottom-0 my-auto" id="eye-slashed1" onclick="togglePassword()">
                        </div>
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="kata-sandi-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="kata-sandi-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>
                    {{-- konfirmasi password --}}
                    <div class="flex flex-col w-full tablet:gap-2 gap-1">
                        <label class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]" for="konfirmasi-kata-sandi">Konfirmasi Kata Sandi</label>
                        <div class="relative w-full">
                            <input value="{{old('password')}}" type="password" name="" id="konfirmasi-kata-sandi"
                                class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm border-[#DE3B25] border-none w-full tablet:pr-14 pr-9"
                                placeholder="Masukkan kata sandi Anda" >
                            <img src="{{asset('assets/icon/eye.svg')}}" alt="eye" class="tablet:w-[25px] w-[14px] cursor-pointer hidden absolute tablet:right-5 right-3 top-0 bottom-0 my-auto" id="eye2" onclick="toggleConfirmPassword()">
                            <img src="{{asset('assets/icon/eye-slashed.svg')}}" alt="eye-slashed" class="tablet:w-[25px] w-[14px] cursor-pointer block absolute tablet:right-5 right-3 top-0 bottom-0 my-auto" id="eye-slashed2" onclick="toggleConfirmPassword()">
                        </div>
                        {{-- error message --}}
                        <div class="flex items-center justify-start gap-1 hidden" id="konfirmasi-kata-sandi-validation">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p id="konfirmasi-kata-sandi-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                         </div>
                    </div>

                    <div class="flex flex-col w-full tablet:gap-2 gap-1 justify-center items-center">
                        <div class="g-recaptcha" data-sitekey="6LfBLUwhAAAAALbDVp7qpeG9EDbdy8AlFFYYhlJJ" data-size="compact"></div>

                        <div class="items-center justify-start hidden gap-1" id="invalid-recaptcha">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p  class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]">reCAPTCHA belum diisi</p>
                        </div>

                        @if(!empty(Session::get('captchaStatus')))
                        <div class="items-center flex justify-start gap-1" id="be-captcha-failed">
                            <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                            <p  class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]">{{Session::get('captchaStatus')}}</p>
                        </div>
                        @endif
                    </div>


                    <div class="flex items-center tablet:gap-4 gap-2">
                        <button type="button"
                            class="mt-10 laptop:px-20 tablet:px-16 px-8 laptop:py-4 tablet:py-3 py-2 laptop:text-2xl tablet:text-xl text-sm font-poppins font-semibold rounded-[100px] text-[#00A3FF] border-[#00A3FF] border-[3px]" onclick="previousForm()">Back</button>
                        <button id="btn-submit" type="button"
                            class="mt-10 laptop:px-20 tablet:px-16 px-8 laptop:py-4 tablet:py-3 py-2 laptop:text-2xl tablet:text-xl text-sm font-poppins font-semibold rounded-[100px] text-white" onclick="validateForm4()">Submit</button>
                    </div>
                </div>


                <div class="font-poppins">
                    <span class="text-black tablet:text-xl text-[12px] font-medium">Sudah memiliki akun? </span>
                    <a href="{{route('login')}}" class="text-[#00A3FF] tablet:text-xl text-[12px] font-medium">Masuk di sini</a>
                </div>
            </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{asset('js/register.js?t=200920221454')}}"></script>
</body>

</html>
