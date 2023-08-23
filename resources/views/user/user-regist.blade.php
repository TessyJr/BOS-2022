<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BNCC Opening Season</title>
    <link rel="stylesheet" href="{{ asset('css/user-dashboard.css?t=170920221635') }}">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon/favicon.svg?t=270720221356')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>
<body>
    {{-- Logout Popup --}}
    <section id="logout-popup" class="hidden fixed bg-overlay w-screen h-screen z-[101] flex justify-center items-center font-poppins -mt-4">
        <div class="bg-white rounded-3xl tablet:w-[720px] w-[360px] tablet:p-32 p-16 flex flex-col justify-center items-center content-center tablet:gap-8 gap-4">
            <img src="{{ asset('assets/icon/Logout.svg') }}" alt="x" class="tablet:h-32 h-20">
            <h1 class="tablet:text-3xl text-base font-poppins font-semibold text-center">Apa kamu yakin ingin keluar?</h1>
            <div class="flex justify-center tablet:gap-8 gap-4">
                <button class="button_alt font-semibold tablet:text-2xl text-sm tablet:w-40 w-28" id="logout-kembali" onclick="closePopup()">Kembali</button>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="button p-[0.3rem] font-semibold tablet:text-2xl text-sm tablet:w-40 w-28 text-center rounded-full h-full" type="submit">Keluar</button>
                </form>
            </div>
        </div>
    </section>

    {{-- Regis Success Popup --}}
    <section id="regist-success-popup" class="hidden fixed bg-overlay w-screen h-screen z-[101] flex justify-center items-center font-poppins -mt-4">
        <div class="bg-white rounded-3xl tablet:w-[720px] w-[360px] tablet:p-32 p-16 flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
            <img src="{{ asset('assets/user-regist/regist_success_popup.svg') }}" alt="x" class="tablet:h-32 h-20">
            <h1 class="tablet:text-3xl text-base font-poppins font-semibold text-center">Registrasi telah berhasil!</h1>
        </div>
    </section>

    {{-- Wrapper --}}
    <div class="flex flex-col tablet:gap-8 gap-4 tablet:mx-12 tablet:my-13 mx-3 my-4">

        {{-- Navbar --}}
        <nav class="card font-poppins">
            <div class="flex justify-between items-center">

                {{-- Desktop Navbar --}}
                <img src="{{ asset('assets/BNCC logo.svg') }}" alt="BNCC logo" class="hidden laptop:block h-8">

                <div class="flex gap-8 laptop:flex hidden">
                    <a href="{{ route('dashboard') }}" class="text-black tablet:text-xl text-sm font-semibold flex items-center">Schedule</a>
                    @if ($user->status >= 1)
                    <a href="{{route('userPayment')}}"
                        class="text-black tablet:text-xl text-sm font-semibold flex items-center">Payment</a>
                    @endif
                    @if ($user->payment_status == 3)
                    <div class="flex flex-col items-center">
                        <a href="{{route('userRegist')}}" class="text-mainblue_dark tablet:text-xl text-sm font-semibold flex items-center">Registration</a>
                        <div class="bg-[#22539f] w-20 h-2 mt-9 absolute rounded"></div>
                    </div>
                    @endif
                    @if ($user->status == 4)
                    <a href="{{route('userReRegist')}}"
                        class="text-black tablet:text-xl text-sm font-semibold flex items-center">Re-Registration</a>
                    @endif

                    <div id="dropdown-wrapper" class="inline-block">
                        <button onclick="navbarMenu()" class="text-black text-xl font-semibold flex items-center gap-4">
                            {{$name}}
                            <img src="{{ asset('assets/icon/Dropdown_Down.svg') }}" alt="" class="h-3">
                        </button>
                        <div id="nav-menu" class="hidden flex flex-col bg-white drop-shadow-md absolute z-0">
                            <a class="px-5 py-3 text-black text-xl font-semibold hover:text-blue-600 border-b border-gray-200 flex gap-3 items-center" href="{{route('main')}}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>Home</a>
                            <a class="px-5 py-3 text-black text-xl font-semibold hover:text-blue-600  border-b border-gray-200 flex gap-3 items-center" href="{{ route('profile') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                            </svg>Profile</a>
                            <button class="px-5 py-3 text-black text-xl font-semibold hover:text-blue-600 border-b border-gray-200 flex gap-2 items-center" href="#" id="logout-btn" type="button" data-modal-toggle="logout-popup">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>Logout
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="flex gap-4 laptop:hidden w-full justify-between items-center z-[100]">
                    <img src="{{ asset('assets/BNCC logo.svg') }}" alt="BNCC logo" class="tablet:h-8 h-4">
                    <div class="flex flex-col items-center">
                        <a href="#" class="text-mainblue_dark tablet:text-3xl text-sm font-semibold flex items-center">Registration</a>
                    </div>
                    <div id="sidebar-wrapper" class="inline-block">
                        <button onclick="sidebarMenu()"
                            class="text-black tablet:text-xl text-sm font-semibold flex items-center gap-4">
                            <img src="{{ asset('assets/icon/Sidebar.svg') }}" alt="" class="tablet:h-8 h-3">
                        </button>
                        <div id="side-menu" class="hidden fixed flex flex-col bg-white z-0 h-screen top-0 w-2/5 right-0 tablet:px-12 px-4 tablet:py-16 py-6">

                            <img id="close-side-menu" src="{{ asset('assets/icon/Close.svg') }}" alt="" class="tablet:h-5 h-3 absolute right-8 top-8">
                            <div class="flex flex-col justify-between h-full">
                                <div class="w-full flex flex-col gap-8 mt-16">
                                    <a class="px-5 py-3 text-black tablet:text-xl text-xs font-semibold hover:text-blue-600 flex gap-3 justify-end"
                                        href="{{ route('dashboard') }}">Schedule</a>
                                    @if ($user->status >= 1)
                                    <a class="px-5 py-3 text-black tablet:text-xl text-xs font-semibold hover:text-blue-600 flex gap-3 justify-end"
                                        href="{{route('userPayment')}}">Payment</a>
                                    @endif
                                    @if ($user->payment_status == 3)
                                    <a class="px-5 py-3 text-black tablet:text-xl text-xs font-semibold hover:text-blue-600 flex gap-3 justify-end"
                                        href="{{route('userRegist')}}">Registration</a>
                                    @endif
                                    @if ($user->status == 4)
                                    <a class="px-5 py-3 text-black tablet:text-xl text-xs font-semibold hover:text-blue-600 flex gap-3 justify-end"
                                        href="{{route('userReRegist')}}">Re-Registration</a>
                                    @endif
                                    <a class="px-5 py-3 text-black tablet:text-xl text-xs font-semibold hover:text-blue-600 flex gap-3 justify-end"
                                        href="{{ route('profile') }}">Profile</a>
                                </div>
                                <div class="flex flex-col items-center gap-4">
                                    <a class="px-5 py-3 text-black tablet:text-xl text-xs font-semibold hover:text-blue-600 flex gap-3 items-center" href="{{route('main')}}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                        </svg>Home</a>
                                    <button class="px-5 py-3 text-black tablet:text-xl text-xs font-semibold hover:text-blue-600 flex gap-2 items-center justify-center border-2 border-black rounded-full tablet:px-12 px-5 tablet:py-3 py-1" href="#" id="logout-tablet-btn" type="button" data-modal-toggle="logout-popup">Logout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        @if($user->status >=3)
        {{-- Registration Successful --}}
        <section class="font-poppins card flex flex-col laptop:gap-10 tablet:gap-6 gap-4 items-center justify-center laptop:h-[80vh] h-[88vh]">
            <img src="{{ asset('assets/user-regist/regist_success.svg') }}" alt="" class="tablet:h-28 h-16">
            <div class="flex flex-col gap-2 tablet:px-32 px-4">
                <h1 class="text-center tablet:text-3xl text-lg font-semibold">Registrasi telah berhasil!</h1>
                @if ($user->campus_region === 'Kemanggisan' || $user->campus_region == "ASO" || $user->campus_region == "BOL" || $user->campus_region == "Bekasi" || $user->campus_region == "Senayan" || $user->campus_region == "Semarang")
                <p class="text-center tablet:text-xl text-xs font-medium">Terima kasih telah mendaftar menjadi bagian dari keluarga kami! Jangan lupa hadiri acara Member Re-Registration sesuai dengan jadwal yang kamu pilih, ya!</p>
                @else
                <p class="text-center tablet:text-xl text-xs font-medium">Terima kasih telah mendaftar menjadi bagian dari keluarga kami! Sekarang, kamu telah resmi menjadi member BNCC.</p>
                @endif
            </div>
        </section>
        @else
        {{-- Content Wrapper --}}
        <div class="flex laptop:flex-row flex-col justify-between tablet:gap-7 gap-3">

            {{-- Left Sections --}}
            <div class="flex flex-col tablet:gap-7 gap-3 w-full">
                {{-- Personal Information --}}
                {{-- @if ($user->campus_region == "Kemanggisan" || $user->campus_region == "ASO" || $user->campus_region == "BOL" || $user->campus_region == "Bekasi" || $user->campus_region == "Senayan" || $user->campus_region == "Semarang") --}}
                <form action="{{route('addMember')}}" id="regist-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <section class="card flex flex-col tablet:gap-4 gap-2">

                        {{-- Registraation Form --}}
                        <h1 class="text-mainblue_dark font-extrabold tablet:text-3xl text-lg font-montserrat tablet:px-8 px-0 tablet:pt-6 pt-3">Registration Form</h1>
                        <div class="flex flex-col tablet:gap-6 gap-4 font-poppins tablet:px-8 px-0 tablet:pb-6 pb-3 tablet:w-[640px] w-full">
                            <div class="flex flex-col gap-1">
                                <h3 class="text-mainblue tablet:text-2xl text-xs tablet:font-medium font-semibold">BNCC ID</h3>
                                <p class="tablet:text-2xl text-base font-bold">{{$user->bnccID}}</p>
                            </div>
                            {{-- Email Binus --}}
                            <div class="flex flex-col gap-1">
                                <h3 class="text-mainblue tablet:text-2xl text-xs tablet:font-medium font-semibold">Email Binus</h3>
                                <input id="email-binus" name="binus_email" class="p-3 rounded-xl tablet:text-xl text-xs bg-lightgray focus:outline-[#3171d3]" placeholder="Masukkan Email Binus Anda"></input>

                                <div id="email-binus-null" class="hidden flex items-center gap-2">
                                    <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                    <p class="text-[#DE3B25] tablet:text-base text-xs">Bagian ini wajib diisi</p>
                                </div>

                                <div id="email-binus-invalid" class="hidden flex items-center gap-2">
                                    <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                    <p class="text-[#DE3B25] tablet:text-base text-xs">Email Binus yang Anda masukkan tidak valid</p>
                                </div>
                            </div>
                            {{-- LnT Course --}}
                            @if ($user->campus_region === 'Alam Sutera')
                            <div class="flex flex-col gap-1">
                                <h3 class="text-mainblue tablet:text-2xl text-xs tablet:font-medium font-semibold">LnT Course</h3>
                                <div for="lnt" class="flex flex-col w-full tablet:gap-2 gap-1">
                                    <select name="lnt_course" id="lnt" class="px-5 py-3 flex items-center focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 rounded-[10px] laptop:text-xl tablet:text-lg text-xs tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat border-[#DE3B25] border-none appearance-none cursor-pointer"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');">
                                        <option value="" disabled selected>Pilih LnT Course yang Anda inginkan</option>
                                        <option value="Front-End Development">Front-End Development</option>
                                        <option value="UI/UX Design">UI/UX Design</option>
                                        <option value="Java Programming">Java Programming</option>
                                        <option value="C Programming">C Programming</option>
                                    </select>

                                    <div id="lnt-null" class="hidden flex items-center gap-2">
                                        <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                        <p class="text-[#DE3B25] tablet:text-base text-xs">Bagian ini wajib diisi</p>
                                    </div>
                                </div>
                            </div>
                            @elseif ($user->campus_region === 'Malang')
                            <div class="flex flex-col gap-1">
                                <h3 class="text-mainblue tablet:text-2xl text-xs tablet:font-medium font-semibold">LnT Course</h3>
                                <div for="lnt" class="flex flex-col w-full tablet:gap-2 gap-1">
                                    <select name="lnt_course" id="lnt" class="px-5 py-3 flex items-center focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 rounded-[10px] laptop:text-xl tablet:text-lg text-xs tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat border-[#DE3B25] border-none appearance-none cursor-pointer"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');">
                                        <option value="" disabled selected>Pilih LnT Course yang Anda inginkan</option>
                                        <option value="Front-End Development">Front-End Development</option>
                                        <option value="Back-End Development">Back-End Development</option>
                                        <option value="UI/UX Design">UI/UX Design</option>
                                    </select>

                                    <div id="lnt-null" class="hidden flex items-center gap-2">
                                        <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                        <p class="text-[#DE3B25] tablet:text-base text-xs">Bagian ini wajib diisi</p>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div for="lnt" class="hidden flex flex-col w-full tablet:gap-2 gap-1">
                                <select name="" id="lnt" class="px-5 py-3 flex items-center focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 rounded-[10px] laptop:text-xl tablet:text-lg text-xs tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat border-[#DE3B25] border-none appearance-none cursor-pointer"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');">
                                    <option value="-" disabled selected>Pilih di Re-Registration</option>
                                </select>

                                <div id="lnt-null" class="hidden flex items-center gap-2">
                                    <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                    <p class="text-[#DE3B25] tablet:text-base text-xs">Bagian ini wajib diisi</p>
                                </div>
                            </div>
                            @endif
                            {{-- KTP --}}
                            <div class="flex flex-col gap-1">
                                <h3 class="text-mainblue tablet:text-2xl text-xs tablet:font-medium font-semibold">KTP</h3>
                                <input id="ktp" name="ktp_pic" type="file" accept="image/jpg, image/jpeg, image/png" class="input-file text-[#20202077] focus:outline-[#3171d3] bg-lightgray px-5 py-3 rounded-xl tablet:text-xl text-xs flex items-center justify-between cursor-pointer"></input>

                                <div id="ktp-invalid" class="hidden flex items-center gap-2">
                                    <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                    <p class="text-[#DE3B25] tablet:text-base text-xs">Bagian ini wajib diisi</p>
                                </div>

                                <div id="ktp-size" class="hidden flex items-center gap-2">
                                    <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                    <p class="text-[#DE3B25] tablet:text-base text-xs">Ukuran file melebihi batas maksimal</p>
                                </div>

                                <p class="font-medium tablet:text-lg text-xs text-[#9D9D9D]">*KTP harus dalam format .jpg, .jpeg, atau .png dengan maksimal ukuran file sebesar 2 MB.</p>
                            </div>
                            {{-- FYP/Binusian Card --}}
                            <div class="flex flex-col gap-1">
                                <h3 class="text-mainblue tablet:text-2xl text-xs tablet:font-medium font-semibold">FYP/Binusian Card</h3>
                                <input id="fyp" name="fyp_pic" type="file" accept="image/jpg, image/jpeg, image/png" class="input-file text-[#20202077] bg-lightgray px-5 py-3 rounded-xl tablet:text-xl text-xs  outline-none flex items-center justify-between cursor-pointer"></input>

                                <div id="fyp-null" class="hidden flex items-center gap-2">
                                    <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                    <p class="text-[#DE3B25] tablet:text-base text-xs">Bagian ini wajib diisi</p>
                                </div>

                                <div id="fyp-size" class="hidden flex items-center gap-2">
                                    <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                    <p class="text-[#DE3B25] tablet:text-base text-xs">Ukuran file melebihi batas maksimal</p>
                                </div>

                                <p class="font-medium tablet:text-lg text-xs text-[#9D9D9D]">*FYP/Binusian Card harus dalam format .jpg, .jpeg, atau .png dengan maksimal ukuran file sebesar 2 MB.</p>
                            </div>
                        </div>

                        {{-- Surat Member --}}
                        <h1 class="text-mainblue_dark font-extrabold tablet:text-3xl text-lg font-montserrat tablet:px-8 px-0 tablet:pt-6 pt-3">Surat Member</h1>
                        <div class="flex flex-col tablet:gap-6 gap-4 font-poppins tablet:px-8 px-0 tablet:pb-6 pb-3 tablet:w-[640px] w-full">
                            <div class="flex flex-col gap-1">
                                <h3 class="text-mainblue tablet:text-2xl text-xs tablet:font-medium font-semibold">Template Surat Member</h3>
                                <p class="tablet:text-xl text-sm font-medium">Unduh Template Surat Member di bawah, kemudian isi data yang dibutuhkan dengan cara diketik dan cantumkan tanda tangan kamu. </p>
                                <a href="{{route('downloadSurat')}}" class="flex items-center justify-center gap-4 bg-gradient-alt py-3 tablet:text-2xl text-sm text-gradient font-semibold"><img src="{{ asset('assets/user-regist/download.svg') }}" class="tablet:h-8 h-4" alt=""> Unduh Template</a>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h3 class="text-mainblue tablet:text-2xl text-xs font-medium">Surat Member</h3>
                                <p class="tablet:text-xl text-xs tablet:font-medium font-semibold">Unggah Surat Member yang sudah kamu isi.</p>
                                <input id="surat-member" name="suratMember" type="file" accept="application/pdf" class="input-file text-[#20202077] bg-lightgray px-5 py-3 rounded-xl tablet:text-xl text-xs  outline-none flex items-center justify-between cursor-pointer"></input>

                                <div id="surat-member-null" class="hidden flex items-center gap-2">
                                    <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                    <p class="text-[#DE3B25] tablet:text-base text-xs">Bagian ini wajib diisi</p>
                                </div>

                                <div id="surat-member-size" class="hidden flex items-center gap-2">
                                    <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                    <p class="text-[#DE3B25] tablet:text-base text-xs">Ukuran file melebihi batas maksimal</p>
                                </div>

                                <p class="font-medium tablet:text-lg text-xs text-[#9D9D9D]">*Surat Member harus dalam format .pdf dengan maksimal ukuran file sebesar 2 MB.</p>
                            </div>
                        </div>

                        {{-- LnT Course --}}
                        {{-- <h1 class="text-mainblue_dark font-extrabold tablet:text-3xl text-lg font-montserrat tablet:px-8 px-0 tablet:pt-6 pt-3">LnT Course</h1>
                        <div class="flex flex-col tablet:gap-6 gap-4 font-poppins tablet:px-8 px-0 tablet:pb-6 pb-3 tablet:w-[640px] w-full">
                            <div class="flex flex-col gap-1">
                                <p class="tablet:text-xl text-sm font-medium">Perjalananmu untuk menjadi member BNCC tinggal sebentar lagi! Pilih jadwal Member Re-Registration di bawah dan pastikan kamu hadir pada jadwal yang telah dipilih.</p>
                            </div>
                            <div class="flex flex-col gap-1">

                            </div>
                        </div> --}}

                        {{-- Member Re-Registration --}}
                        @if ($user->campus_region === 'Kemanggisan' || $user->campus_region == "ASO" || $user->campus_region == "BOL" || $user->campus_region == "Bekasi" || $user->campus_region == "Senayan" || $user->campus_region == "Semarang")
                        <h1 class="text-mainblue_dark font-extrabold tablet:text-3xl text-lg font-montserrat tablet:px-8 px-0 tablet:pt-6 pt-3">Member Re-Registration</h1>
                        <div class="flex flex-col tablet:gap-6 gap-4 font-poppins tablet:px-8 px-0 tablet:pb-6 pb-3 tablet:w-[640px] w-full">
                            <div class="flex flex-col gap-1">
                                <p class="tablet:text-xl text-sm font-medium">Perjalananmu untuk menjadi member BNCC tinggal sebentar lagi! Pilih jadwal Member Re-Registration di bawah dan pastikan kamu hadir pada jadwal yang telah dipilih.</p>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h3 class="text-mainblue tablet:text-2xl text-xs tablet:font-medium font-semibold">Jadwal Re-Registration</h3>
                                <div for="jadwal-reregist" class="flex flex-col w-full tablet:gap-2 gap-1">
                                    <select name="reregister_schedule" id="jadwal-reregist" class="px-5 py-3 flex items-center focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 rounded-[10px] laptop:text-xl tablet:text-lg text-xs tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat border-[#DE3B25] border-none appearance-none cursor-pointer"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');">
                                        {{-- <option value="" disabled selected>Pilih jadwal Member Re-Registration kamu</option> --}}
                                        <option value="-" disabled selected>Member Re-Registration telah selesai</option>
                                        {{-- <option value="Sabtu, 1 Oktober 2022 (19.00 - 21.00)" >Sabtu, 1 Oktober 2022 (19.00 - 21.00)</option> --}}
                                        {{-- <option value="Minggu, 2 Oktober 2022 (19.00 - 21.00)" >Minggu, 2 Oktober 2022 (19.00 - 21.00)</option> --}}
                                    </select>

                                    <div id="jadwal-reregist-null" class="hidden flex items-center gap-2">
                                        <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                        <p class="text-[#DE3B25] tablet:text-base text-xs">Bagian ini wajib diisi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <select name="reregister_schedule" id="jadwal-reregist" class="hidden px-5 py-3 flex items-center focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 rounded-[10px] laptop:text-xl tablet:text-lg text-xs tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat border-[#DE3B25] border-none appearance-none cursor-pointer"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');">
                            <option value="-" disabled selected class="hidden">Region Anda tidak bisa memilih jadwal reregistration</option>
                        </select>

                            <div id="jadwal-reregist-null" class="hidden flex items-center gap-2">
                                <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                <p class="text-[#DE3B25] tablet:text-base text-xs">Bagian ini wajib diisi</p>
                            </div>
                        @endif

                        <div class="flex flex-col tablet:gap-6 gap-4 font-poppins tablet:px-8 px-0 tablet:pb-6 pb-3 tablet:w-[640px] w-full">
                            <div class="flex flex-col gap-1">
                                <button type="submit" id="reregist-submit" class="tablet:my-4 my-2 button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[572px] w-full tablet:py-3 py-2">Submit</button>
                            </div>
                        </div>

                    </section>
                </form>
                {{-- @else
                <form action="{{route('addMember')}}" id="regist-form-2" method="POST" enctype="multipart/form-data">
                    @csrf
                    <section class="card flex flex-col tablet:gap-4 gap-2">

                        Registraation Form
                        <h1 class="text-mainblue_dark font-extrabold tablet:text-3xl text-lg font-montserrat tablet:px-8 px-0 tablet:pt-6 pt-3">Registration Form</h1>
                        <div class="flex flex-col tablet:gap-6 gap-4 font-poppins tablet:px-8 px-0 tablet:pb-6 pb-3 tablet:w-[640px] w-full">
                            <div class="flex flex-col gap-1">
                                <h3 class="text-mainblue tablet:text-2xl text-xs tablet:font-medium font-semibold">BNCC ID</h3>
                                <p class="tablet:text-2xl text-base font-bold">{{$user->bnccID}}</p>
                            </div>
                            Email Binus
                            <div class="flex flex-col gap-1">
                                <h3 class="text-mainblue tablet:text-2xl text-xs tablet:font-medium font-semibold">Email Binus</h3>
                                <input id="email-binus-2" name="binus_email" class="p-3 rounded-xl tablet:text-xl text-xs bg-lightgray outline-none" placeholder="Masukkan Email Binus Anda"></input>

                                <div id="email-binus-null-2" class="hidden flex items-center gap-2">
                                    <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                    <p class="text-[#DE3B25] tablet:text-base text-xs">Bagian ini wajib diisi</p>
                                </div>

                                <div id="email-binus-invalid-2" class="hidden flex items-center gap-2">
                                    <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                    <p class="text-[#DE3B25] tablet:text-base text-xs">Email yang Anda masukkan tidak valid</p>
                                </div>
                            </div>
                            KTP
                            <div class="flex flex-col gap-1">
                                <h3 class="text-mainblue tablet:text-2xl text-xs tablet:font-medium font-semibold">KTP</h3>
                                <input id="ktp-2" name="ktp_pic" type="file" accept="image/jpg, image/jpeg, image/png" class="input-file text-[#20202077] bg-lightgray px-5 py-3 rounded-xl tablet:text-xl text-xs  outline-none flex items-center justify-between cursor-pointer"></input>

                                <div id="ktp-invalid-2" class="hidden flex items-center gap-2">
                                    <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                    <p class="text-[#DE3B25] tablet:text-base text-xs">Bagian ini wajib diisi</p>
                                </div>

                                <div id="ktp-size-2" class="hidden flex items-center gap-2">
                                    <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                    <p class="text-[#DE3B25] tablet:text-base text-xs">Ukuran file melebihi batas maksimal</p>
                                </div>

                                <p class="font-medium tablet:text-lg text-xs text-[#9D9D9D]">*KTP harus dalam format .jpg, .jpeg, atau .png dengan maksimal ukuran file sebesar 2 MB.</p>
                            </div>
                            FYP/Binusian Card
                            <div class="flex flex-col gap-1">
                                <h3 class="text-mainblue tablet:text-2xl text-xs tablet:font-medium font-semibold">FYP/Binusian Card</h3>
                                <input id="fyp-2" name="fyp_pic" type="file" accept="image/jpg, image/jpeg, image/png" class="input-file text-[#20202077] bg-lightgray px-5 py-3 rounded-xl tablet:text-xl text-xs  outline-none flex items-center justify-between cursor-pointer"></input>

                                <div id="fyp-null-2" class="hidden flex items-center gap-2">
                                    <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                    <p class="text-[#DE3B25] tablet:text-base text-xs">Bagian ini wajib diisi</p>
                                </div>

                                <div id="fyp-size-2" class="hidden flex items-center gap-2">
                                    <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                    <p class="text-[#DE3B25] tablet:text-base text-xs">Ukuran file melebihi batas maksimal</p>
                                </div>

                                <p class="font-medium tablet:text-lg text-xs text-[#9D9D9D]">*FYP/Binusian Card harus dalam format .jpg, .jpeg, atau .png dengan maksimal ukuran file sebesar 2 MB.</p>
                            </div>
                        </div>

                        Surat Member
                        <h1 class="text-mainblue_dark font-extrabold tablet:text-3xl text-lg font-montserrat tablet:px-8 px-0 tablet:pt-6 pt-3">Surat Member</h1>
                        <div class="flex flex-col tablet:gap-6 gap-4 font-poppins tablet:px-8 px-0 tablet:pb-6 pb-3 tablet:w-[640px] w-full">
                            <div class="flex flex-col gap-1">
                                <h3 class="text-mainblue tablet:text-2xl text-xs tablet:font-medium font-semibold">Template Surat Member</h3>
                                <p class="tablet:text-xl text-sm font-medium">Unduh Template Surat Member di bawah, kemudian isi data yang dibutuhkan dengan cara diketik dan cantumkan tanda tangan kamu. </p>
                                <a href="{{route('downloadSurat')}}" class="flex items-center justify-center gap-4 bg-gradient-alt py-3 tablet:text-2xl text-sm text-gradient font-semibold"><img src="{{ asset('assets/user-regist/download.svg') }}" class="tablet:h-8 h-4" alt=""> Unduh Template</a>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h3 class="text-mainblue tablet:text-2xl text-xs font-medium">Surat Member</h3>
                                <p class="tablet:text-xl text-xs tablet:font-medium font-semibold">Unggah Surat Member yang sudah kamu isi.</p>
                                <input id="surat-member-2" name="suratMember" type="file" accept="application/pdf" class="input-file text-[#20202077] bg-lightgray px-5 py-3 rounded-xl tablet:text-xl text-xs  outline-none flex items-center justify-between cursor-pointer"></input>

                                <div id="surat-member-null-2" class="hidden flex items-center gap-2">
                                    <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                    <p class="text-[#DE3B25] tablet:text-base text-xs">Bagian ini wajib diisi</p>
                                </div>

                                <div id="surat-member-size-2" class="hidden flex items-center gap-2">
                                    <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="tablet:h-8 h-5" />
                                    <p class="text-[#DE3B25] tablet:text-base text-xs">Ukuran file melebihi batas maksimal</p>
                                </div>

                                <p class="font-medium tablet:text-lg text-xs text-[#9D9D9D]">*Surat Member harus dalam format .pdf dengan maksimal ukuran file sebesar 2 MB.</p>
                            </div>

                            <button type="submit" id="reregist-submit" class="tablet:my-4 my-2 button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[572px] w-full tablet:py-3 py-2">Submit</button>
                        </div>
                    </section>
                </form>
                @endif --}}
            </div>

            {{-- Right Sections --}}
            <div class="flex flex-col tablet:gap-7 gap-3 laptop:w-[1080px] w-full">

                {{-- Contact Person --}}
                <section class="card flex flex-col gap-9 h-fit">
                    <h1 class="text-mainblue_dark font-extrabold font-montserrat tablet:text-3xl text-lg mb-2">Contact Person</h1>

                    <div class="flex justify-center gap-14 font-poppins">

                        @if ($user->campus_region === 'Malang')
                        <div class="flex tablet:flex-row flex-col laptop:gap-10 tablet:gap-8 gap-6">
                            <div class="flex laptop:gap-10 tablet:gap-8 gap-6">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="flex flex-col items-center gap-2">
                                        <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                                        <p class="tablet:text-xl text-base font-bold text-center">Gede Dyava</p>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset('assets/icon/Social_Line.svg') }}"
                                                class="laptop:w-10 tablet:w-8 w-5" alt="">
                                            <p class="tablet:text-lg text-xs font-medium">dyava_s</p>
                                        </div>

                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}"
                                                class="laptop:w-10 tablet:w-8 w-5" alt="">
                                            <p class="tablet:text-lg text-xs font-medium">087711354449</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col items-center gap-3">
                                    <div class="flex flex-col items-center gap-2">
                                        <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                                        <p class="tablet:text-xl text-base font-bold text-center">Celine</p>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset('assets/icon/Social_Line.svg') }}"
                                                class="laptop:w-10 tablet:w-8 w-5" alt="">
                                            <p class="tablet:text-lg text-xs font-medium">cmp123</p>
                                        </div>

                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}"
                                                class="laptop:w-10 tablet:w-8 w-5" alt="">
                                            <p class="tablet:text-lg text-xs font-medium">081252323650</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col items-center gap-3">
                                <div class="flex flex-col items-center gap-2">
                                    <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                                    <p class="tablet:text-xl text-base font-bold text-center">Muh. Rizal</p>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Line.svg') }}"
                                            class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">ikowcool</p>
                                    </div>

                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}"
                                            class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">08122253036</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif ($user->campus_region == "Alam Sutera")
                        <div class="flex laptop:flex-row flex-col laptop:gap-10 tablet:gap-8 gap-6">
                            <div class="flex laptop:gap-10 tablet:gap-8 gap-6">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="flex flex-col items-center gap-2">
                                        <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                                        <p class="tablet:text-xl text-base font-bold text-center">Davy</p>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset('assets/icon/Social_Line.svg') }}"
                                                class="laptop:w-10 tablet:w-8 w-5" alt="">
                                            <p class="tablet:text-lg text-xs font-medium">Daviriya</p>
                                        </div>

                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}"
                                                class="laptop:w-10 tablet:w-8 w-5" alt="">
                                            <p class="tablet:text-lg text-xs font-medium">08996540488</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col items-center gap-3">
                                    <div class="flex flex-col items-center gap-2">
                                        <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                                        <p class="tablet:text-xl text-base font-bold text-center">Fraderic</p>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset('assets/icon/Social_Line.svg') }}"
                                                class="laptop:w-10 tablet:w-8 w-5" alt="">
                                            <p class="tablet:text-lg text-xs font-medium">fazbear</p>
                                        </div>

                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}"
                                                class="laptop:w-10 tablet:w-8 w-5" alt="">
                                            <p class="tablet:text-lg text-xs font-medium">089649499832</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col items-center gap-3">
                                <div class="flex flex-col items-center gap-2">
                                    <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                                    <p class="tablet:text-xl text-base font-bold text-center">Jeta</p>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Line.svg') }}"
                                            class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">jetaaa1</p>
                                    </div>

                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}"
                                            class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">087871447555</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif ($user->campus_region == "Bandung")
                            {{-- CP Bandung 1 --}}
                            <div class="flex flex-col items-center gap-3">
                                <div class="flex flex-col items-center gap-2">
                                    <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                                    <p class="tablet:text-xl text-base font-bold text-center">Nadya L</p>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Line.svg') }}" class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">ndy.fa</p>
                                    </div>

                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}" class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">082136764859</p>
                                    </div>
                                </div>
                            </div>

                            {{-- CP Bandung 2 --}}
                            <div class="flex flex-col items-center gap-3">
                                <div class="flex flex-col items-center gap-2">
                                    <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                                    <p class="tablet:text-xl text-base font-bold text-center">Charissa</p>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Line.svg') }}" class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">charissa_jeanette</p>
                                    </div>

                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}" class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">081802228681</p>
                                    </div>
                                </div>
                            </div>
                        @else
                        <div class="flex tablet:flex-row flex-col laptop:gap-10 tablet:gap-8 gap-6">
                            <div class="flex laptop:gap-10 tablet:gap-8 gap-6">
                                <div class="flex flex-col items-center gap-3">
                                    <div class="flex flex-col items-center gap-2">
                                        <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                                        <p class="tablet:text-xl text-base font-bold text-center">Camelia</p>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset('assets/icon/Social_Line.svg') }}"
                                                class="laptop:w-10 tablet:w-8 w-5" alt="">
                                            <p class="tablet:text-lg text-xs font-medium">claudiacameliaa</p>
                                        </div>

                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}"
                                                class="laptop:w-10 tablet:w-8 w-5" alt="">
                                            <p class="tablet:text-lg text-xs font-medium">085714990994</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-col items-center gap-3">
                                    <div class="flex flex-col items-center gap-2">
                                        <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                                        <p class="tablet:text-xl text-base font-bold text-center">Mutiara</p>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset('assets/icon/Social_Line.svg') }}"
                                                class="laptop:w-10 tablet:w-8 w-5" alt="">
                                            <p class="tablet:text-lg text-xs font-medium">tiararahmahh</p>
                                        </div>

                                        <div class="flex gap-2 items-center">
                                            <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}"
                                                class="laptop:w-10 tablet:w-8 w-5" alt="">
                                            <p class="tablet:text-lg text-xs font-medium">081351953814</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col items-center gap-3">
                                <div class="flex flex-col items-center gap-2">
                                    <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                                    <p class="tablet:text-xl text-base font-bold text-center">Gracella</p>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Line.svg') }}"
                                            class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">graceliora</p>
                                    </div>

                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}"
                                            class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">085173251809</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </section>
            </div>
        </div>
        @endif
    </div>

    <script src="{{ asset('js/user-dashboard.js?t=160920222338') }}"></script>
    <script src="{{ asset('js/user-regist.js?t=160920222338') }}"></script>
</body>
</html>
