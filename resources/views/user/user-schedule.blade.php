<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="schedule" content="{{$user->launching_schedule}}">
    <meta name="reregister_schedule" content="{{$user->reregister_schedule}}">
    <title>BNCC Opening Season</title>
    <link rel="stylesheet" href="{{ asset('css/user-dashboard.css?t=170920221635') }}">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon/favicon.svg?t=270720221356')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
</head>

<body>
    {{-- Survey Popup --}}
    @if (!$surveyFilled)
    <section id="survey-popup"
        class=" fixed bg-overlay top-0 w-screen h-screen z-[100] flex justify-center items-center font-poppins">
        <div
            class="bg-white rounded-3xl tablet:w-[631px] w-[277px] tablet:p-12 p-8 flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
            <form action="{{route('registrationSource')}}" method="POST" id="survey-form"
                onsubmit="validateSurvey(event)" class="flex flex-col gap-7 items-center">
                @csrf
                <label class="tablet:text-3xl text-base font-poppins font-semibold text-center" for="survey">Daftar BNCC
                    dari mana?</label>
                <div class="flex tablet:flex-row flex-col tablet:gap-7 gap-4">

                    {{-- Left Section --}}
                    <div class="flex flex-col tablet:gap-7 gap-4">
                        <div class="text-[#383530B2] opacity-70 flex items-center gap-3">
                            <input type="checkbox" value="Freshmen Leader" name="registration_source[]"
                                id="freshmen-leader" class="tablet:w-5 tablet:h-5 w-4 h-4">
                            <label for="freshmen-leader" class="tablet:text-xl text-[11px]">Freshmen Leader</label>
                        </div>
                        <div class="text-[#383530B2] opacity-70 flex items-center gap-3">
                            <input type="checkbox" name="registration_source[]" value="Teman" id="teman"
                                class="tablet:w-5 tablet:h-5 w-4 h-4">
                            <label for="teman" class="tablet:text-xl text-[11px]">Teman</label>
                        </div>
                        <div class="text-[#383530B2] opacity-70 flex items-center gap-3">
                            <input type="checkbox" name="registration_source[]" id="ig-bncc" value="Instagram BNCC"
                                class="tablet:w-5 tablet:h-5 w-4 h-4">
                            <label for="ig-bncc" class="tablet:text-xl text-[11px]">Instagram BNCC</label>
                        </div>
                        <div class="text-[#383530B2] opacity-70 flex items-center gap-3">
                            <input type="checkbox" name="registration_source[]" value="Email" id="email"
                                class="tablet:w-5 tablet:h-5 w-4 h-4">
                            <label for="email" class="tablet:text-xl text-[11px]">Email</label>
                        </div>
                    </div>

                    {{-- Right Section --}}
                    <div class="flex flex-col tablet:gap-7 gap-4">
                        <div class="text-[#383530B2] opacity-70 flex items-center gap-3">
                            <input type="checkbox" name="registration_source[]" value="Live Session Q&A"
                                id="live-session" class="tablet:w-5 tablet:h-5 w-4 h-4">
                            <label for="live-session" class="tablet:text-xl text-[11px]">Live Session Q&A</label>
                        </div>
                        <div class="text-[#383530B2] opacity-70 flex items-center gap-3">
                            <input type="checkbox" name="registration_source[]" value="Codesign" id="codesign"
                                class="tablet:w-5 tablet:h-5 w-4 h-4">
                            <label for="codesign" class="tablet:text-xl text-[11px]">Codesign</label>
                        </div>
                        <div class="text-[#383530B2] opacity-70 flex items-center gap-3">
                            <input type="checkbox" name="registration_source[]" value="BNCC Expo" id="bncc-expo"
                                class="tablet:w-5 tablet:h-5 w-4 h-4">
                            <label for="bncc-expo" class="tablet:text-xl text-[11px]">BNCC Expo</label>
                        </div>
                        <div class="text-[#383530B2] opacity-70 flex items-center gap-3">
                            <input type="checkbox" name="registration_source[]" value="Others" id="others"
                                class="tablet:w-5 tablet:h-5 w-4 h-4">
                            <label for="others" class="tablet:text-xl text-[11px]">Others</label>
                        </div>
                    </div>

                </div>

                {{-- Error Message --}}
                <div id="survey-error" class="hidden flex items-center gap-2">
                    <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="" class="tablet:w-[36px] w-[20px]">
                    <p class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]">Bagian ini wajib diisi</p>
                </div>
                <button type="submit"
                    class="button p-[0.3rem] font-semibold tablet:text-2xl text-sm tablet:w-40 w-28 p-3 text-center rounded-full h-full">Submit</button>
            </form>
        </div>
    </section>
    @endif

    {{-- Instagram Popup --}}
    @if($user->instagram === null)
    <section id="ig-popup"
        class=" fixed bg-overlay top-0 w-screen h-screen z-[100] flex justify-center items-center font-poppins">
        <div
            class="bg-white rounded-3xl tablet:w-[631px] w-[277px] tablet:p-12 p-8 flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
            <form method="post" action="{{route('storeInstagram')}}" id="ig-form" onsubmit="validateIg(event)"
                class="flex flex-col gap-7 items-center w-full">
                @csrf
                <label class="tablet:text-3xl text-base font-poppins font-semibold text-center" for="survey">Masukkan
                    data Anda</label>
                <div class="flex flex-col tablet:gap-6 gap-4 w-full">
                    {{-- Instagram --}}
                    <div class="flex flex-col tablet:gap-2 gap-1">
                        <label for="instagram"
                            class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]">Instagram</label>
                        <input name="instagram" type="text" id="instagram"
                            class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:px-5 px-3 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm border-[#DE3B25] border-none"
                            placeholder="Masukkan username Instagram Anda">

                        {{-- Error Message --}}
                        <div id="ig-error" class="hidden flex items-center gap-2">
                            <img src="{{ asset('assets/icon/exclamation.svg') }}" alt=""
                                class="tablet:w-[36px] w-[20px]">
                            <p id="ig-error-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                        </div>
                    </div>
                </div>

                <button type=""
                    class="button p-[0.3rem] font-semibold tablet:text-2xl text-sm tablet:w-40 w-28 p-3 text-center rounded-full h-full">Submit</button>
            </form>
        </div>
    </section>
    @endif

    @if($user->agama === null)
    {{-- Agama Popup --}}
    <section id="agama-popup"
        class=" fixed bg-overlay top-0 w-screen h-screen z-[100] flex justify-center items-center font-poppins">
        <div
            class="bg-white rounded-3xl tablet:w-[631px] w-[277px] tablet:p-12 p-8 flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
            <form method="post" action="{{route('storeReligion')}}" id="agama-form" onsubmit="validateAgama(event)"
                class="flex flex-col gap-7 items-center w-full">
                @csrf
                <label class="tablet:text-3xl text-base font-poppins font-semibold text-center" for="survey">Masukkan
                    data Anda</label>
                <div class="flex flex-col tablet:gap-6 gap-4 w-full">
                    {{-- Agama --}}
                    <div class="flex flex-col tablet:gap-2 gap-1">
                        <label for="agama"
                            class="laptop:text-2xl tablet:text-xl text-lg font-medium text-[#3171D3]">Agama</label>
                        <select name="agama" type="text" id="agama"
                            class="appearance-none focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat tablet:bg-auto border-[#DE3B25] border-none"
                            style="background-image: url('{{asset('assets/register/dropdown.svg')}}');">
                            <option value="" selected disabled>Pilih agama Anda</option>
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Islam">Islam</option>
                            <option value="Konghucu">Konghucu</option>
                            <option value="Kristen Katolik">Kristen Katolik</option>
                            <option value="Kristen Protestan">Kristen Protestan</option>
                        </select>

                        {{-- Error Message --}}
                        <div id="agama-error" class="hidden flex items-center gap-2">
                            <img src="{{ asset('assets/icon/exclamation.svg') }}" alt=""
                                class="tablet:w-[36px] w-[20px]">
                            <p class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]">Bagian ini wajib diisi</p>
                        </div>
                    </div>
                </div>

                <button type=""
                    class="button p-[0.3rem] font-semibold tablet:text-2xl text-sm tablet:w-40 w-28 p-3 text-center rounded-full h-full">Submit</button>
            </form>
        </div>
    </section>
    @endif

    {{-- Isi Jadwal Popup --}}
    @if($user->launching_schedule === null && $user->status == 0)
    <section id="reminder-popup"
        class="fixed bg-overlay top-0 w-screen h-screen z-[101] flex justify-center items-center font-poppins">
        <div
            class="bg-white rounded-3xl tablet:w-[631px] w-[277px] tablet:h-fit h-[400px] tablet:py-24 tablet:px-12 py-8 px-6 flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
            <img src="{{ asset('assets/icon/Close.svg') }}" alt="" id="reminder-close"
                class="absolute top-8 right-8 tablet:w-5 tablet:h-5 w-3 h-3 cursor-pointer"
                onclick="closeReminder(this)"">

                <img src=" {{ asset('assets/icon/reminder.svg') }}" alt="" class="tablet:w-28 w-16">
            <h1 class="tablet:text-3xl text-base font-poppins font-semibold text-center">Segera isi jadwal BNCC
                Launching agar tidak kehabisan slot!</h1>
        </div>
    </section>
    @endif
    {{-- Reschedule Successful --}}
    <section id="reschedule-popup"
        class="hidden fixed bg-overlay w-screen h-screen z-[101] flex justify-center items-center font-poppins top-0">
        <div
            class="bg-white rounded-3xl tablet:w-[720px] w-[360px] tablet:p-32 p-16 flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
            <img src="{{ asset('assets/icon/Reschedule_Success.svg') }}" alt="x" class="tablet:h-32 h-20">
            <h1 class="tablet:text-3xl text-base font-poppins font-semibold text-center">Jadwalmu telah berhasil
                diperbaharui!</h1>
        </div>
    </section>

    {{-- Logout Popup --}}
    <section id="logout-popup"
        class="hidden fixed bg-overlay w-screen h-screen z-[101] flex justify-center items-center font-poppins -mt-4">
        <div
            class="bg-white rounded-3xl tablet:w-[720px] w-[360px] tablet:p-32 p-16 flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
            <img src="{{ asset('assets/icon/Logout.svg') }}" alt="x" class="tablet:h-32 h-20">
            <h1 class="tablet:text-3xl text-base font-poppins font-semibold text-center">Apa kamu yakin ingin keluar?
            </h1>
            <div class="flex justify-center tablet:gap-8 gap-4">
                <button class="button_alt font-semibold tablet:text-2xl text-sm tablet:w-40 w-28 p-3"
                    id="logout-kembali" onclick="closePopup()">Kembali</button>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button
                        class="button p-[0.3rem] font-semibold tablet:text-2xl text-sm tablet:w-40 w-28 p-3 text-center rounded-full h-full"
                        type="submit">Keluar</button>
                </form>
            </div>
        </div>
    </section>

    {{-- Wrapper --}}
    <div class="flex flex-col tablet:gap-8 gap-4 tablet:mx-12 tablet:my-13 mx-3 my-4">

        {{-- Navbar --}}
        <nav class="card font-poppins">
            <div class="flex justify-between items-center">

                {{-- Desktop Navbar --}}
                <div class="hidden laptop:flex justify-between w-full items-center">
                    <img src="{{ asset('assets/BNCC logo.svg') }}" alt="BNCC logo" class="h-8">
                    <div class="flex gap-8 justify-center items-center">
                        <div class="flex gap-8 laptop:flex hidden">
                            <div class="flex flex-col items-center">
                                <a href="{{ route('dashboard') }}"
                                    class="text-mainblue_dark tablet:text-xl text-sm font-semibold flex items-center">Schedule</a>
                                <div class="bg-[#22539f] w-20 h-2 mt-9 absolute rounded"></div>
                            </div>
                            @if ($user->status >= 1)
                            <a href="{{route('userPayment')}}"
                                class="text-black tablet:text-xl text-sm font-semibold flex items-center">Payment</a>
                            @endif
                            @if ($user->payment_status == 3)
                            <a href="{{route('userRegist')}}"
                                class="text-black tablet:text-xl text-sm font-semibold flex items-center">Registration</a>
                            @endif
                            @if ($user->status == 4)
                            <a href="{{route('userReRegist')}}"
                                class="text-black tablet:text-xl text-sm font-semibold flex items-center">Re-Registration</a>
                            @endif
                        </div>

                        <div id="dropdown-wrapper" class="inline-block">
                            <button onclick="navbarMenu()" class="text-black text-xl font-semibold flex items-center gap-4">
                                {{$name}} <img src="{{ asset('assets/icon/Dropdown_Down.svg') }}" alt="" class="h-3">
                            </button>
                            <div id="nav-menu" class="hidden flex flex-col bg-white drop-shadow-md absolute z-0">
                                <a class="px-5 py-3 text-black text-xl font-semibold hover:text-blue-600 border-b border-gray-200 flex gap-3 items-center"
                                    href="{{route('main')}}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                    </svg>Home</a>
                                <a class="px-5 py-3 text-black text-xl font-semibold hover:text-blue-600  border-b border-gray-200 flex gap-3 items-center"
                                    href="{{ route('profile') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                            clip-rule="evenodd" />
                                    </svg>Profile</a>
                                <button
                                    class="px-5 py-3 text-black text-xl font-semibold hover:text-blue-600 border-b border-gray-200 flex gap-2 items-center"
                                    href="#" id="logout-btn" type="button" data-modal-toggle="logout-popup">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>Logout
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Sidebar --}}
            <div class="flex gap-4 laptop:hidden w-full justify-between items-center">
                <img src="{{ asset('assets/BNCC logo.svg') }}" alt="BNCC logo" class="tablet:h-8 h-4">
                <div class="flex flex-col items-center">
                    <a href="#"
                        class="text-mainblue_dark tablet:text-3xl text-sm font-semibold flex items-center">Schedule</a>
                </div>
                <div id="sidebar-wrapper" class="inline-block">
                    <button onclick="sidebarMenu()"
                        class="text-black tablet:text-xl text-sm font-semibold flex items-center gap-4">
                        <img src="{{ asset('assets/icon/Sidebar.svg') }}" alt="" class="tablet:h-8 h-3">
                    </button>
                    <div id="side-menu"
                        class="hidden fixed flex flex-col bg-white z-0 h-screen top-0 w-2/5 right-0 tablet:px-12 px-4 tablet:py-16 py-6">

                        <img id="close-side-menu" src="{{ asset('assets/icon/Close.svg') }}" alt=""
                            class="tablet:h-5 h-3 absolute right-8 top-8 cursor-pointer">
                        <div class="flex flex-col justify-between h-full tablet:text-xl text-xs">
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
                                <a class="px-5 py-3 text-black font-semibold hover:text-blue-600 flex gap-3 items-center"
                                    href="{{ route('main') }}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                    </svg>Home</a>
                                <button
                                    class="text-black font-semibold hover:text-blue-600 flex gap-2 items-center justify-center border-2 border-black rounded-full tablet:px-12 px-5 tablet:py-3 py-1"
                                    href="#" id="logout-tablet-btn" type="button"
                                    data-modal-toggle="logout-popup">Logout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </nav>

    {{-- BL Closed --}}
    @if ($user->status >= 1 && ($user->campus_region == "Malang" || $user->campus_region == "Alam Sutera" || $user->campus_region == "Bandung" || $user->campus_region === 'Kemanggisan' || $user->campus_region === 'BOL' || $user->campus_region === 'ASO' || $user->campus_region === 'Bekasi' || $user->campus_region === 'Senayan' || $user->campus_region === 'Semarang'))
    <section class="card flex flex-col tablet:mx-12 tablet:my-13 mx-3 my-4 laptop:gap-10 tablet:gap-6 gap-4 items-center justify-center laptop:h-[80vh] h-[88vh] font-poppins">
        <img src="{{ asset('assets/user-payment/closed.svg') }}" alt="" class="tablet:h-28 h-16">
        @if ($user->status >= 3 && ($user->campus_region == 'Kemanggisan' || $user->campus_region === 'BOL' || $user->campus_region === 'ASO' || $user->campus_region === 'Bekasi' || $user->campus_region === 'Senayan' || $user->campus_region === 'Semarang'))
        <div class="flex flex-col gap-2 tablet:px-32 px-4">
            <h1 class="text-center tablet:text-3xl text-lg font-bold">BNCC Member Re-Registration telah selesai.</h1>
            <p class="text-center tablet:text-xl text-xs font-medium">Terima kasih sudah menghadiri acara BNCC
                Member Re-Registration. Jangan lupa untuk melakukan reregister supaya kamu resmi menjadi bagian dari keluarga BNCC, ya!</p>
        </div>

        <a href="{{ route('userReRegist') }}" class="my-4 button whitespace-nowrap font-semibold tablet:text-2xl text-sm tablet:py-3 tablet:px-12 py-2 px-8 text-center flex items-center justify-center rounded-full">Re-Registration</a>
        @else
        <div class="flex flex-col gap-2 tablet:px-32 px-4">
            <h1 class="text-center tablet:text-3xl text-lg font-bold">BNCC Launching telah selesai.</h1>
            <p class="text-center tablet:text-xl text-xs font-medium">Terima kasih sudah menghadiri acara BNCC
                Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                keluarga BNCC, ya!</p>
        </div>

        <a href="{{ route('userPayment') }}" class="my-4 button whitespace-nowrap font-semibold tablet:text-2xl text-sm tablet:py-3 tablet:px-12 py-2 px-8 text-center flex items-center justify-center rounded-full">Payment</a>
        @endif

        <div class="flex justify-center font-poppins gap-16">
            @if ($user->campus_region == "Alam Sutera")
            <div class="flex flex-col items-center gap-3">
                <div class="flex flex-col items-center gap-2">
                    <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                    <p class="tablet:text-xl text-base font-bold text-center">Marvel</p>
                </div>
                <div class="flex flex-col gap-2">
                    <div class="flex gap-2 items-center">
                        <img src="{{ asset('assets/icon/Social_Line.svg') }}" class="laptop:w-10 tablet:w-8 w-5" alt="">
                        <p class="tablet:text-lg text-xs font-medium">mosesgod</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}" class="laptop:w-10 tablet:w-8 w-5"
                            alt="">
                        <p class="tablet:text-lg text-xs font-medium">081546468800</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center gap-3">
                <div class="flex flex-col items-center gap-2">
                    <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                    <p class="tablet:text-xl text-base font-bold text-center">Adham</p>
                </div>
                <div class="flex flex-col gap-2">
                    <div class="flex gap-2 items-center">
                        <img src="{{ asset('assets/icon/Social_Line.svg') }}" class="laptop:w-10 tablet:w-8 w-5" alt="">
                        <p class="tablet:text-lg text-xs font-medium">mifth20</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}" class="laptop:w-10 tablet:w-8 w-5"
                            alt="">
                        <p class="tablet:text-lg text-xs font-medium">082116171315</p>
                    </div>
                </div>
            </div>
            @elseif ($user->campus_region == "Bandung")
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
                        <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}" class="laptop:w-10 tablet:w-8 w-5"
                            alt="">
                        <p class="tablet:text-lg text-xs font-medium">082136764859</p>
                    </div>
                </div>
            </div>
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
                        <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}" class="laptop:w-10 tablet:w-8 w-5"
                            alt="">
                        <p class="tablet:text-lg text-xs font-medium">081802228681</p>
                    </div>
                </div>
            </div>
            @elseif ($user->campus_region == "Malang")
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
    @endif

    {{-- Trial Class (Khusus buat Bandung(?)) --}}
    {{-- @if ($user->campus_region == "Bandung" && $user->status == 1)
    <section class="card flex flex-col tablet:mx-12 tablet:my-13 mx-3 my-4 tablet:gap-9 gap-4">
        <div>
            <h1 class="text-mainblue_dark font-montserrat font-extrabold tablet:text-3xl text-lg mb-2">Join Our Trial
                Class!</h1>
            <p class="tablet:text-xl text-xs font-poppins font-medium">Jangan lupa untuk <i>join</i> BNCC Trial Class
                pada jadwal:</p>
        </div> --}}
        {{-- trial class UI UX Design --}}
        {{-- <div class="flex flex-col tablet:gap-3 gap-2 font-poppins font-medium">
            <div class="flex items-center tablet:gap-3 gap-2">
                <img class="tablet:w-9 w-5" src="{{ asset('assets/icon/Calendar.svg') }}" alt="">
                <p class="tablet:text-xl text-xs">Rabu, 14 September 2022 (UI/UX Design)</p>
            </div>
            <div class="flex items-center tablet:gap-3 gap-2">
                <img class="tablet:w-9 w-5" src="{{ asset('assets/icon/Time.svg') }}" alt="">
                <p class="tablet:text-xl text-xs">15.10 -17.30 WIB</p>
            </div>
        </div> --}}
        {{-- trial class front end development --}}
        {{-- <div class="flex flex-col tablet:gap-3 gap-2 font-poppins font-medium">
            <div class="flex items-center tablet:gap-3 gap-2">
                <img class="tablet:w-9 w-5" src="{{ asset('assets/icon/Calendar.svg') }}" alt="">
                <p class="tablet:text-xl text-xs">Kamis, 15 September 2022 (Front-End Development)</p>
            </div>
            <div class="flex items-center tablet:gap-3 gap-2">
                <img class="tablet:w-9 w-5" src="{{ asset('assets/icon/Time.svg') }}" alt="">
                <p class="tablet:text-xl text-xs">15.10 - 17.30 WIB</p>
            </div>
        </div> --}}
        {{-- Trial class back end development --}}
        {{-- <div class="flex flex-col tablet:gap-3 gap-2 font-poppins font-medium">
            <div class="flex items-center tablet:gap-3 gap-2">
                <img class="tablet:w-9 w-5" src="{{ asset('assets/icon/Calendar.svg') }}" alt="">
                <p class="tablet:text-xl text-xs">Jumat, 16 September 2022 (Back-End Development)</p>
            </div>
            <div class="flex items-center tablet:gap-3 gap-2">
                <img class="tablet:w-9 w-5" src="{{ asset('assets/icon/Time.svg') }}" alt="">
                <p class="tablet:text-xl text-xs">15.10 - 17.30 WIB</p>
            </div>
        </div>
        <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[600px] w-full text-center py-3"
            href="{{route('joinLaunching', ['zoom' => 'https://binus.zoom.us/j/94267732177?pwd=OTEvdjlOL3p5ZU1tMk1xbnVkRzI2QT09'])}}" target="_blank"
            rel="noopener noreferrer">Join Now!</a>
    </section>
    @endif --}}

    {{-- Contact Person --}}
    {{-- <section class="card flex flex-col gap-9 h-fit tablet:w-fit w-full">
        <h1 class="text-mainblue_dark font-extrabold font-montserrat tablet:text-3xl text-lg mb-2 text-center">Contact
            Person</h1>
            @if ($user->campus_region === 'Malang')

            @elseif ($user->campus_region == "Alam Sutera")

            @elseif ($user->campus_region == "Bandung")

            @else

            @endif
        </div>
    </section> --}}
    {{-- @else --}}

    {{-- Content Wrapper --}}
    @if ($user->status >= 99 && ($user->campus_region === 'Kemanggisan' || $user->campus_region === 'BOL' ||
    $user->campus_region === 'ASO' || $user->campus_region === 'Bekasi' || $user->campus_region ===
    'Senayan' || $user->campus_region === 'Semarang'))
    {{-- Status diubah menjadi 99 agar ifnya tidak jalan karena memang sudah ditutup jadwalnya --}}

    <div class="flex laptop:flex-row tablet:mx-12 tablet:my-13 mx-3 my-4 flex-col justify-between tablet:gap-7 gap-3">

        {{-- Left Sections --}}
        <div class="flex flex-col tablet:gap-7 gap-3 w-full">

            {{-- Join Our Launch --}}
            @if($user->status < 3 && !($user->launching_schedule === null))
            <section class="card flex flex-col tablet:gap-9 gap-4">
                <div>
                    @if ($user->status >= 1)
                    <h1 class="text-mainblue_dark font-montserrat font-extrabold tablet:text-3xl text-lg mb-2">Your Launch Schedule is Closed!</h1>
                    <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih telah mengikuti BNCC
                            Launching pada jadwal:</p>
                    @else
                    <h1 class="text-mainblue_dark font-montserrat font-extrabold tablet:text-3xl text-lg mb-2">Join Our
                        Launch!</h1>
                    <p class="tablet:text-xl text-xs font-poppins font-medium">Jangan lupa untuk <i>join</i> BNCC
                            Launching pada jadwal:</p>
                    @endif
                </div>

                <div class="flex flex-col tablet:gap-3 gap-2 font-poppins font-medium">
                    <div class="flex items-center tablet:gap-3 gap-2">
                        <img class="tablet:w-9 w-5" src="{{ asset('assets/icon/Calendar.svg') }}" alt="">
                        {{-- @if ($user->campus_region == 'Malang' || $user->campus_region == 'Alam Sutera') --}}
                        @if ($user->campus_region == 'Malang')
                        <p class="tablet:text-xl text-xs">
                            @if ($user->launching_schedule == '-')
                            -
                            @else
                            {{Str::of($user->launching_schedule)->before('(')}}-{{Str::of($user->launching_schedule)->after(') -')}}
                            @endif
                        </p>
                        @else
                        <p class="tablet:text-xl text-xs">{{Str::of($user->launching_schedule)->before('(')}}</p>
                        @endif
                    </div>
                    <div class="flex items-center tablet:gap-3 gap-2">
                        <img class="tablet:w-9 w-5" src="{{ asset('assets/icon/Time.svg') }}" alt="">
                        @if ($user->launching_schedule == '-')
                        <p class="tablet:text-xl text-xs">-
                        @else
                        <p class="tablet:text-xl text-xs">{{Str::of($user->launching_schedule)->between('(', ')')}} WIB
                        @endif
                        </p>
                    </div>
                </div>
                {{-- Kemanggisan --}}
                @if ($user->launching_schedule === 'Kamis, 15 September 2022 (10.00 - 12.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/82892137428?pwd=SzY3aHh0NTlTdnEvaks2a1NoT3ZPZz09">Join Now!</a> --}}
                @elseif ($user->launching_schedule === 'Kamis, 15 September 2022 (13.00 - 15.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/85421968016?pwd=eHAyWHdGcytTVlltY3lkU05wUm40QT09">Join Now!</a> --}}
                @elseif ($user->launching_schedule === 'Kamis, 15 September 2022 (16.00 - 18.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/84758044642?pwd=dGpFLzBVZDhBVDhOZGdyWk9UemRwZz09">Join Now!</a> --}}
                @elseif ($user->launching_schedule === 'Kamis, 15 September 2022 (19.00 - 21.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/89822592365?pwd=UFlsb1VNTDhaL1VjNXNWcmFYYlhZUT09">Join Now!</a> --}}
                @elseif ($user->launching_schedule === 'Jumat, 16 September 2022 (10.00 - 12.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/83453542008?pwd=bUY4b1l3MDY3SnZVNC9laUZVVXE0QT09">Join Now!</a> --}}
                @elseif ($user->launching_schedule === 'Jumat, 16 September 2022 (13.00 - 15.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/83817696970?pwd=emFUcklzbTJWL2RmeHFKRVRRWjVZZz09">Join Now!</a> --}}
                @elseif ($user->launching_schedule === 'Jumat, 16 September 2022 (16.00 - 18.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                @elseif ($user->launching_schedule === 'Jumat, 16 September 2022 (19.00 - 21.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                @elseif ($user->launching_schedule === 'Sabtu, 17 September 2022 (10.00 - 12.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/85846494982?pwd=WmJLTmZqaDJSS0ZDRUlwSmp0Mnlzdz09">Join Now!</a> --}}
                @elseif ($user->launching_schedule === 'Sabtu, 17 September 2022 (13.00 - 15.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/82825757836?pwd=M2hXNUs5UXY0dnZJbFpQOG90ek5mdz09">Join Now!</a> --}}
                @elseif ($user->launching_schedule === 'Sabtu, 17 September 2022 (16.00 - 18.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/88325351649?pwd=SnB6d3N2aXNsaTA0TndOeVM4ckpUZz09">Join Now!</a> --}}
                @elseif ($user->launching_schedule === 'Sabtu, 17 September 2022 (19.00 - 21.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/84762224677?pwd=Rm1lQS81MzRMczMzZ1lVcVNrQVNTZz09">Join Now!</a> --}}
                @elseif ($user->launching_schedule === 'Senin, 19 September 2022 (16.00 - 18.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/82148562550?pwd=SU94ZnUrc2lMM2JITW0ra3FlWWNnUT09">Join Now!</a> --}}
                @elseif ($user->launching_schedule === 'Senin, 19 September 2022 (19.00 - 21.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/87660652849?pwd=alRtc1lEaTV2dWxOZFJabzBhRk9kdz09">Join Now!</a> --}}

                {{-- Alam Sutera --}}
                @elseif ($user->launching_schedule === 'Kamis, 15 September 2022 (10.00 - 12.00) - C Programming')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/85947260615?pwd=MlNWYTVnb0lEZi81anBuS2RXYTFPUT09">Join Now!</a> --}}
                @elseif ($user->launching_schedule === 'Kamis, 15 September 2022 (13.00 - 15.00) - Java Programming')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/81886770260?pwd=VDlNTkd0elJwb3V5YjlwR0taKzdHZz09">Join Now!</a> --}}
                @elseif ($user->launching_schedule === 'Jumat, 16 September 2022 (10.00 - 12.00) - Front-End Development')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/86179562151?pwd=TTB6TCtHckZvMHplK0lnaDlXSVVCZz09">Join Now!</a> --}}
                @elseif ($user->launching_schedule === 'Jumat, 16 September 2022 (13.00 - 15.00) - UI/UX Design')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/81247184801?pwd=RlBEanhDb2d1Sllac3lmYXo1Nkl1dz09">Join Now!</a> --}}
                @elseif ($user->launching_schedule === 'Senin, 19 September 2022 (11.00 - 12.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/83235457533?pwd=M1BBTVlFOFUrZVh6UDR2czBiaXZWdz09">Join Now!</a> --}}
                @elseif ($user->launching_schedule === 'Senin, 19 September 2022 (16.00 - 17.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara BNCC
                    Launching. Jangan lupa untuk melakukan pembayaran tepat waktu supaya kamu bisa menjadi bagian dari
                    keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="{{ route('userPayment') }}">Payment</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/87907099296?pwd=Uno2ZjZyZkdyR2FmSkxGM3UyQnlaZz09">Join Now!</a> --}}

                {{-- Bandung --}}
                @elseif ($user->launching_schedule === 'Senin, 12 September 2022 (10.00 - 12.00)')
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3 opacity-50"
                    href="#">Launching Done!</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3 opacity-50" href="https://binus.zoom.us/j/92708421730?pwd=dk9HWGd0L1dMT1JpUzZVSE10bXJIdz09">Launching Done!</a> --}}
                @elseif ($user->launching_schedule === 'Senin, 12 September 2022 (15.30 - 17.30)')
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3 opacity-50"
                    href="#">Launching Done!</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3 opacity-50" href="https://binus.zoom.us/j/92708421730?pwd=dk9HWGd0L1dMT1JpUzZVSE10bXJIdz09">Launching Done!</a> --}}
                @elseif ($user->launching_schedule === 'Selasa, 13 September 2022 (10.00 - 12.00)')
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3 opacity-50"
                    href="#">Launching Done!</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3 opacity-50" href="https://binus.zoom.us/j/94472475914?pwd=Z0NUQlZqU3oraUc0MjRTK2wzNHZmdz09">Launching Done!</a> --}}
                @elseif ($user->launching_schedule === 'Selasa, 13 September 2022 (15.30 - 17.30)')
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3 opacity-50"
                    href="#">Launching Done!</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3 opacity-50" href="https://binus.zoom.us/j/94472475914?pwd=Z0NUQlZqU3oraUc0MjRTK2wzNHZmdz09">Join Now!</a> --}}
                @endif
            </section>

            {{-- Join Our Member Re-Registration --}}
            @elseif ($user->status >= 3 && $user->reregister_schedule != NULL &&($user->campus_region === 'Kemanggisan' || $user->campus_region === 'BOL' ||
            $user->campus_region === 'ASO' || $user->campus_region === 'Bekasi' || $user->campus_region ===
            'Senayan' || $user->campus_region === 'Semarang'))
            <section class="card flex flex-col tablet:gap-9 gap-4">
                <div>
                    @if ($user->status == 4)
                    <h1 class="text-mainblue_dark font-montserrat font-extrabold tablet:text-3xl text-lg mb-2">Your Member Re-Registration Schedule is Closed!</h1>
                    <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih telah mengikuti Member Re-Registration pada jadwal:</p>
                    @else
                    <h1 class="text-mainblue_dark font-montserrat font-extrabold tablet:text-3xl text-lg mb-2">Join Our Member Re-Registration!</h1>
                    <p class="tablet:text-xl text-xs font-poppins font-medium">Jangan lupa untuk <i>join</i> Member Re-Registration pada jadwal:</p>
                    @endif
                </div>

                <div class="flex flex-col tablet:gap-3 gap-2 font-poppins font-medium">
                    <div class="flex items-center tablet:gap-3 gap-2">
                        <img class="tablet:w-9 w-5" src="{{ asset('assets/icon/Calendar.svg') }}" alt="">
                        <p class="tablet:text-xl text-xs">{{Str::of($user->reregister_schedule)->before('(')}}</p>
                    </div>
                    <div class="flex items-center tablet:gap-3 gap-2">
                        <img class="tablet:w-9 w-5" src="{{ asset('assets/icon/Time.svg') }}" alt="">
                        <p class="tablet:text-xl text-xs">{{Str::of($user->reregister_schedule)->between('(', ')')}} WIB
                        </p>
                    </div>
                </div>

                @if ($user->reregister_schedule === 'Kamis, 22 September 2022 (15.00 - 17.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara Member Reregistration. Jangan lupa untuk melakukan reregister supaya kamu resmi menjadi bagian dari keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                href="{{ route('userReRegist') }}">Re-Register</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/87345480707?pwd=ME9IOThScFB0RExOcjFRYzFzVXFRUT09" target="_blank"
                    rel="noopener noreferrer">Join Now!</a> --}}
                @elseif ($user->reregister_schedule === 'Kamis, 22 September 2022 (19.00 - 21.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara Member Reregistration. Jangan lupa untuk melakukan reregister supaya kamu resmi menjadi bagian dari keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                href="{{ route('userReRegist') }}">Re-Register</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/82295465437?pwd=Q0o3d3RzZTF0WjBpQS9jM21VVW5YUT09" target="_blank"
                    rel="noopener noreferrer">Join Now!</a> --}}
                @elseif ($user->reregister_schedule === 'Jumat, 23 September 2022 (15.00 - 17.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara Member Reregistration. Jangan lupa untuk melakukan reregister supaya kamu resmi menjadi bagian dari keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                href="{{ route('userReRegist') }}">Re-Register</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://us06web.zoom.us/j/84209930496?pwd=T2hQelQ5WlRjSStabUcvTlB3dW83Zz09" target="_blank"
                    rel="noopener noreferrer">Join Now!</a> --}}
                @elseif ($user->reregister_schedule === 'Jumat, 23 September 2022 (19.00 - 21.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara Member Reregistration. Jangan lupa untuk melakukan reregister supaya kamu resmi menjadi bagian dari keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                href="{{ route('userReRegist') }}">Re-Register</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://us06web.zoom.us/j/89495725491?pwd=RmMzWUxzcGNhZHFGcys2MS85eXpDZz09" target="_blank"
                    rel="noopener noreferrer">Join Now!</a> --}}
                @elseif ($user->reregister_schedule === 'Sabtu, 24 September 2022 (15.00 - 17.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara Member Reregistration. Jangan lupa untuk melakukan reregister supaya kamu resmi menjadi bagian dari keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                href="{{ route('userReRegist') }}">Re-Register</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/81496262103?pwd=QjRaVHVKZit3Y1hyREdYMFhBN2JYQT09" target="_blank"
                    rel="noopener noreferrer">Join Now!</a> --}}
                @elseif ($user->reregister_schedule === 'Sabtu, 24 September 2022 (19.00 - 21.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara Member Reregistration. Jangan lupa untuk melakukan reregister supaya kamu resmi menjadi bagian dari keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                href="{{ route('userReRegist') }}">Re-Register</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/83881267635?pwd=cnM1REFicXF4bDJKRjd6Z05GSmM0Zz09" target="_blank"
                    rel="noopener noreferrer">Join Now!</a> --}}
                @elseif ($user->reregister_schedule === 'Sabtu, 1 Oktober 2022 (19.00 - 21.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara Member Reregistration. Jangan lupa untuk melakukan reregister supaya kamu resmi menjadi bagian dari keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                href="{{ route('userReRegist') }}">Re-Register</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/82976517178?pwd=alVnYkhvTU5XeVh3THlKNVVVam96UT09" target="_blank"
                    rel="noopener noreferrer">Join Now!</a> --}}
                @elseif ($user->reregister_schedule === 'Minggu, 2 Oktober 2022 (19.00 - 21.00)')
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara Member Reregistration. Jangan lupa untuk melakukan reregister supaya kamu resmi menjadi bagian dari keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                href="{{ route('userReRegist') }}">Re-Register</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="https://csueb.zoom.us/j/89953175191?pwd=MktxNmlEblpuYVYrSDVzb1I0OEhGdz09" target="_blank"
                    rel="noopener noreferrer">Join Now!</a> --}}
                @else
                <p class="tablet:text-xl text-xs font-poppins font-medium">Terima kasih sudah menghadiri acara Member Reregistration. Jangan lupa untuk melakukan reregister supaya kamu resmi menjadi bagian dari keluarga BNCC, ya!</p>
                <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                href="{{ route('userReRegist') }}">Re-Register</a>
                {{-- <a class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full text-center py-3"
                    href="#">Join Now!</a> --}}
                @endif
            </section>
            @endif

            {{-- Change Your Schedule --}}
            @if ($user->status < 3)
            <section class="card flex flex-col tablet:gap-9 gap-4">
                <form action="{{route('scheduleChange')}}" class="flex flex-col tablet:gap-9 gap-4" method="POST"
                    onsubmit="submitReschedule()">
                    @csrf
                    @method('patch')
                    <div>
                        <h1 class="text-mainblue_dark font-extrabold font-montserrat tablet:text-3xl text-lg mb-2">
                            {{$user->launching_schedule === null ? "Select Schedule" : "Change Your Schedule"}}</h1>
                        @if ($user->launching_schedule === null)
                        <p class="tablet:text-xl text-xs font-poppins font-medium">Pilih jadwal BNCC Launching yang
                            dapat kamu hadiri, ya!</p>
                        @else
                        <p class="tablet:text-xl text-xs font-poppins font-medium">Tidak bisa hadir pada jadwal yang
                            sudah dipilih sebelumnya? <br> Jangan ragu untuk memilih jadwal baru kamu ya!</p>
                        @endif
                    </div>

                    @if (($user->campus_region === 'Kemanggisan' || $user->campus_region === 'BOL' ||
                    $user->campus_region === 'ASO' || $user->campus_region === 'Bekasi' || $user->campus_region ===
                    'Senayan' || $user->campus_region === 'Semarang'))
                    <div class="font-poppins font-medium">
                        {{-- KMG BNCC Launching --}}
                        <label for="bncclaunching_reschedule"
                            class="block text-mainblue_dark font-semibold tablet:text-2xl text-sm mb-2">Jadwal BNCC
                            Launching</label>
                        <select name="schedule" id="bncclaunching_reschedule" class="tablet:w-[28rem] w-full focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat tablet:bg-auto border-[#DE3B25] border-none appearance-none"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');" onchange="" required>
                            <option selected disabled class="text-black" value="">BNCC Launching telah selesai
                            </option>
                            {{-- <option value="Kamis, 15 September 2022 (10.00 - 12.00)">Kamis, 15 September 2022 (10.00 - 12.00)</option>
                                    <option value="Kamis, 15 September 2022 (13.00 - 15.00)">Kamis, 15 September 2022 (13.00 - 15.00)</option>
                                    <option value="Kamis, 15 September 2022 (16.00 - 18.00)">Kamis, 15 September 2022 (16.00 - 18.00)</option>
                                    <option value="Kamis, 15 September 2022 (19.00 - 21.00)">Kamis, 15 September 2022 (19.00 - 21.00)</option> --}}
                            {{-- <option value="Jumat, 16 September 2022 (10.00 - 12.00)">Jumat, 16 September 2022 (10.00 -
                                12.00)</option> --}}
                            {{-- <option value="Jumat, 16 September 2022 (13.00 - 15.00)">Jumat, 16 September 2022 (13.00 - 15.00)</option> --}}
                            {{-- <option value="Jumat, 16 September 2022 (16.00 - 18.00)">Jumat, 16 September 2022 (16.00 -
                                18.00)</option> --}}
                            {{-- <option value="Jumat, 16 September 2022 (19.00 - 21.00)">Jumat, 16 September 2022 (19.00 -
                                21.00)</option> --}}
                            {{-- <option value="Sabtu, 17 September 2022 (10.00 - 12.00)">Sabtu, 17 September 2022 (10.00 -
                                12.00)</option> --}}
                            {{-- <option value="Sabtu, 17 September 2022 (13.00 - 15.00)">Sabtu, 17 September 2022 (13.00 -
                                15.00)</option> --}}
                            {{-- <option value="Sabtu, 17 September 2022 (16.00 - 18.00)">Sabtu, 17 September 2022 (16.00 -
                                18.00)</option> --}}
                            {{-- <option value="Sabtu, 17 September 2022 (19.00 - 21.00)">Sabtu, 17 September 2022 (19.00 -
                                21.00)</option> --}}
                            {{-- <option value="Senin, 19 September 2022 (16.00 - 18.00)">Senin, 19 September 2022 (16.00 - 18.00)</option> --}}
                            {{-- <option value="Senin, 19 September 2022 (19.00 - 21.00)">Senin, 19 September 2022 (19.00 - 21.00)</option> --}}
                        </select>
                        {{-- KMG trial class
                                <label for="trialclass_reschedule" class="mt-6 block text-mainblue_dark font-semibold tablet:text-2xl text-sm mb-2">Jadwal Trial Class</label>
                                <select id="trialclass_reschedule" name="trial_class" class="bg-lightgray text-black tablet:text-xl text-xs rounded-xl focus:outline-[#3171d3] block tablet:w-[28rem] w-full p-2 cursor-pointer" required>
                                    <option value='-' disabled='disabled' selected='selected'>Region Anda belum bisa pilih jadwal Trial Class</option>
                                </select> --}}
                    </div>
                    <button
                        class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full py-3"
                        id="reschedule-submit" type="submit" data-modal-toggle="reschedule-popup">Submit</button>
                    @elseif($user->campus_region === 'Malang')
                    <div class="font-poppins font-medium">
                        {{-- MALANG BNCC Launching --}}
                        <label for="bncclaunching_reschedule"
                            class="block text-mainblue_dark font-semibold tablet:text-2xl text-sm mb-2">Jadwal BNCC
                            Launching</label>
                        <select name="schedule" id="bncclaunching_reschedule" class="tablet:w-[28rem] w-full focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat tablet:bg-auto border-[#DE3B25] border-none appearance-none"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');" onchange="" required>
                            <option selected disabled class="text-black" value="">BNCC Launching telah selesai
                            </option>
                            {{-- <option value="Senin, 19 September 2022 (10.00 - 12.00) - UI/UX Design">Senin, 19 September
                                2022 (10.00 - 12.00) - UI/UX Design</option> --}}
                            {{-- <option value="Senin, 19 September 2022 (13.00 - 15.00) - Front-End Development">Senin, 19
                                September 2022 (13.00 - 15.00) - Front-End Development</option> --}}
                        </select>
                    </div>
                    <button
                        class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full py-3"
                        id="reschedule-submit" type="submit" data-modal-toggle="reschedule-popup">Submit</button>
                    @elseif($user->campus_region === 'Alam Sutera')
                    <div class="font-poppins font-medium">
                        {{-- ALSUT BNCC Launching --}}
                        <label for="bncclaunching_reschedule"
                            class="block text-mainblue_dark font-semibold tablet:text-2xl text-sm mb-2">Jadwal BNCC
                            Launching</label>
                         <select name="schedule" id="bncclaunching_reschedule" class="tablet:w-[28rem] w-full focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat tablet:bg-auto border-[#DE3B25] border-none appearance-none"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');" onchange="" required>
                            <option selected disabled class="text-black" value="">BNCC Launching telah selesai
                            </option>
                            {{-- <option value="Kamis, 15 September 2022 (10.00 - 12.00) - C Programming">Kamis, 15 September
                                2022 (10.00 - 12.00) - C Programming</option> --}}
                            {{-- <option value="Kamis, 15 September 2022 (13.00 - 15.00) - Java Programming">Kamis, 15
                                September 2022 (13.00 - 15.00) - Java Programming</option> --}}
                            {{-- <option value="Jumat, 16 September 2022 (10.00 - 12.00) - Front-End Development">Jumat, 16
                                September 2022 (10.00 - 12.00) - Front-End Development</option> --}}
                            {{-- <option value="Jumat, 16 September 2022 (13.00 - 15.00) - UI/UX Design">Jumat, 16 September
                                2022 (13.00 - 15.00) - UI/UX Design</option> --}}
                            {{-- <option value="Senin, 19 September 2022 (11.00 - 12.00)">Senin, 19 September 2022 (11.00 - 12.00)</option> --}}
                            {{-- <option value="Senin, 19 September 2022 (16.00 - 17.00)">Senin, 19 September 2022 (16.00 - 17.00)</option> --}}
                        </select>
                    </div>
                    <button
                        class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full py-3"
                        id="reschedule-submit" type="submit" data-modal-toggle="reschedule-popup">Submit</button>
                    @elseif($user->campus_region === 'Bandung')
                    <div class="font-poppins font-medium">
                        {{-- Bandung BNCC Launching --}}
                        <label for="bncclaunching_reschedule"
                            class="block text-mainblue_dark font-semibold tablet:text-2xl text-sm mb-2">Jadwal BNCC
                            Launching</label>
                         <select name="schedule" id="bncclaunching_reschedule" class="tablet:w-[28rem] w-full focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat tablet:bg-auto border-[#DE3B25] border-none appearance-none"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');" onchange="" required>
                            <option selected disabled class="text-black" value="">BNCC Launching telah selesai
                            </option>
                            {{-- <option value="Senin, 12 September 2022 (10.00 - 12.00)">Senin, 12 September 2022 (10.00 - 12.00)</option>
                                    <option value="Senin, 12 September 2022 (15.30 - 17.30)">Senin, 12 September 2022 (15.30 - 17.30)</option>
                                    <option value="Selasa, 13 September 2022 (10.00 - 12.00)">Selasa, 13 September 2022 (10.00 - 12.00)</option>
                                    <option value="Selasa, 13 September 2022 (15.30 - 17.30)">Selasa, 13 September 2022 (15.30 - 17.30)</option> --}}
                        </select>
                        {{-- Bandung trial class --}}
                        <label for="trialclass_reschedule"
                            class="mt-6 block text-mainblue_dark font-semibold tablet:text-2xl text-sm mb-2">Jadwal
                            Trial Class</label>
                        <select id="trialclass_reschedule" name="trial_class"
                            class="bg-lightgray text-black tablet:text-xl text-xs rounded-xl focus:outline-[#3171d3] block tablet:w-[28rem] w-full p-2 cursor-pointer"
                            required>
                            <option selected disabled class="text-black" value="">Trial Class telah selesai
                            </option>
                            {{-- <option value='Rabu, 14 September 2022 (15.10 - 17.30) - UI/UX Design'>Rabu, 14 September
                                2022 (15.10 - 17.30) - UI/UX Design</option>
                            <option value='Kamis, 15 September 2022 (15.10 - 17.30) - Front-End Development'>Kamis, 15
                                September 2022 (15.10 - 17.30) - Front-End Development</option>
                            <option value='Jumat, 16 September 2022 (15.10 - 17.30) - Back-End Development'>Jumat, 16
                                September 2022 (15.10 - 17.30) - Back-End Development</option> --}}
                        </select>
                    </div>

                    <button
                        class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full py-3"
                        id="reschedule-submit" type="submit" data-modal-toggle="reschedule-popup">Submit</button>
                    @else
                    <div class="font-poppins font-medium">
                        <label for="bncclaunching_reschedule"
                            class="block text-mainblue_dark font-semibold tablet:text-2xl text-sm mb-2">Jadwal BNCC
                            Launching</label>
                         <select name="schedule" id="bncclaunching_reschedule" class="tablet:w-[28rem] w-full focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat tablet:bg-auto border-[#DE3B25] border-none appearance-none"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');" onchange="" required>
                            <option selected disabled class="text-black">BNCC Launching telah selesai</option>
                            {{-- <option value="Kamis, 15 September 2022 (10.00 - 12.00)">Kamis, 15 September 2022 (10.00 - 12.00)</option> --}}
                            {{-- <option value="Kamis, 15 September 2022 (13.00 - 15.00)">Kamis, 15 September 2022 (13.00 - 15.00)</option> --}}
                            {{-- <option value="Kamis, 15 September 2022 (16.00 - 18.00)">Kamis, 15 September 2022 (16.00 - 18.00)</option> --}}
                            {{-- <option value="Kamis, 15 September 2022 (19.00 - 21.00)">Kamis, 15 September 2022 (19.00 - 21.00)</option> --}}
                            {{-- <option value="Jumat, 16 September 2022 (10.00 - 12.00)">Jumat, 16 September 2022 (10.00 - 12.00)</option> --}}
                            {{-- <option value="Jumat, 16 September 2022 (13.00 - 15.00)">Jumat, 16 September 2022 (13.00 - 15.00)</option>
                                    <option value="Jumat, 16 September 2022 (16.00 - 18.00)">Jumat, 16 September 2022 (16.00 - 18.00)</option> --}}
                            {{-- <option value="Jumat, 16 September 2022 (19.00 - 21.00)">Jumat, 16 September 2022 (19.00 - 21.00)</option> --}}
                                    {{-- <option value="Sabtu, 17 September 2022 (10.00 - 12.00)">Sabtu, 17 September 2022 (10.00 - 12.00)</option> --}}
                                    {{-- <option value="Sabtu, 17 September 2022 (13.00 - 15.00)">Sabtu, 17 September 2022 (13.00 - 15.00)</option>
                                    <option value="Sabtu, 17 September 2022 (16.00 - 18.00)">Sabtu, 17 September 2022 (16.00 - 18.00)</option>
                                    <option value="Sabtu, 17 September 2022 (19.00 - 21.00)">Sabtu, 17 September 2022 (19.00 - 21.00)</option> --}}
                        </select>
                    </div>

                    <button
                        class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full py-3 opacity-50"
                        id="reschedule-submit" type="submit" data-modal-toggle="reschedule-popup"
                        disabled>Submit</button>
                    @endif

                </form>
            </section>
            @endif

            {{-- Change Your MR Schedule --}}
            @if ($user->status >= 3 && ($user->campus_region === 'Kemanggisan' || $user->campus_region === 'BOL' ||
                    $user->campus_region === 'ASO' || $user->campus_region === 'Bekasi' || $user->campus_region ===
                    'Senayan' || $user->campus_region === 'Semarang'))
            <section class="card flex flex-col tablet:gap-9 gap-4">
                <form action="{{route('reregisterScheduleChange')}}" class="flex flex-col tablet:gap-9 gap-4" method="POST"
                    id="reregist-reschedule-form">
                    @csrf
                    @method('patch')
                    <div>
                        <h1 class="text-mainblue_dark font-extrabold font-montserrat tablet:text-3xl text-lg mb-2">
                            {{$user->reregister_schedule === null ? "Select Schedule" : "Change Your Schedule"}}
                        </h1>
                        @if ($user->reregister_schedule === null)
                        <p class="tablet:text-xl text-xs font-poppins font-medium">Pilih jadwal Re-Registratioin yang
                            dapat kamu hadiri, ya!</p>
                        @else
                        <p class="tablet:text-xl text-xs font-poppins font-medium">Tidak bisa hadir pada jadwal Member Re-Registration yang
                            sudah dipilih sebelumnya? <br> Jangan ragu untuk memilih jadwal baru kamu ya!</p>
                        @endif
                    </div>

                    <div class="font-poppins font-medium">
                        <label for="reregist_reschedule"
                            class="block text-mainblue_dark font-semibold tablet:text-2xl text-sm mb-2">Jadwal Member Re-Registration</label>
                        <select name="reregister_schedule" id="reregist_reschedule" class="px-5 py-3 flex items-center focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:pr-12 pr-10 rounded-[10px] laptop:text-xl tablet:text-lg text-xs tablet:bg-[right_24px_center] bg-[right_12px_center] bg-no-repeat border-[#DE3B25] border-none appearance-none cursor-pointer"  style="background-image: url('{{asset('assets/register/dropdown.svg')}}');">
                            {{-- <option value="" disabled selected>Pilih jadwal Re-Registration Anda</option> --}}
                            <option value="" disabled selected>Member Re-Registration telah selesai</option>
                            {{-- <option value="Kamis, 22 September 2022 (15.00 - 17.00)">Kamis, 22 September 2022 (15.00 - 17.00)</option> --}}
                            {{-- <option value="Kamis, 22 September 2022 (19.00 - 21.00)">Kamis, 22 September 2022 (19.00 - 21.00)</option> --}}
                            {{-- <option value="Jumat, 23 September 2022 (15.00 - 17.00)">Jumat, 23 September 2022 (15.00 - 17.00)</option> --}}
                            {{-- <option value="Jumat, 23 September 2022 (19.00 - 21.00)">Jumat, 23 September 2022 (19.00 - 21.00)</option> --}}
                            {{-- <option value="Sabtu, 24 September 2022 (15.00 - 17.00)">Sabtu, 24 September 2022 (15.00 - 17.00)</option> --}}
                            {{-- <option value="Sabtu, 24 September 2022 (19.00 - 21.00)">Sabtu, 24 September 2022 (19.00 - 21.00)</option> --}}
                            {{-- <option value="Sabtu, 1 Oktober 2022 (19.00 - 21.00)" >Sabtu, 1 Oktober 2022 (19.00 - 21.00)</option> --}}
                            {{-- <option value="Minggu, 2 Oktober 2022 (19.00 - 21.00)" >Minggu, 2 Oktober 2022 (19.00 - 21.00)</option> --}}
                        </select>

                        <div id="reregist-reschedule-null" class="hidden flex items-center gap-2">
                            <img src="{{ asset('assets/icon/exclamation.svg') }}" alt="error" class="mt-2 tablet:h-8 h-5" />
                            <p class="text-[#DE3B25] tablet:text-base text-xs mt-2">Bagian ini wajib diisi bila Anda ingin mengubah jadwal</p>
                        </div>
                    </div>
                    <button
                        class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full py-3"
                        id="reregist-reschedule-submit" onclick="submitReregistReschedule()" type="button">Submit</button>
                </form>
            </section>
            @endif

        </div>

        {{-- Right Sections --}}
        <div class="flex laptop:flex-col tablet:flex-row flex-col tablet:gap-7 gap-3">
            {{-- Calendar --}}
            <section class="calendar-content card tablet:w-fit w-full font-poppins">
                <div class="container flex justify-center items-center text-black -mt-6">
                    <div class="calendar w-full">
                        <div class="month w-full flex justify-between items-center text-center px-0 py-8 mx-3 -mb-7">
                            <div class="date">
                                <h1 class="tablet:text-xl text-base font-bold"></h1>
                                <p></p>
                            </div>
                            <div class="mr-4 flex gap-2">
                                <i class="fas fa-angle-left prev cursor-pointer p-2 hover:text-gray-400"></i>
                                <i class="fas fa-angle-right next cursor-pointer p-2 hover:text-gray-400"></i>
                            </div>
                        </div>
                        <hr>
                        <div class="weekdays w-full px-0 py-2 flex items-center uppercase laptop:ml-4 ml-2 mt-4">
                            <div class="w-full text-gray-400 text-xs">Min</div>
                            <div class="w-full text-gray-400 text-xs">Sen</div>
                            <div class="w-full text-gray-400 text-xs">Sel</div>
                            <div class="w-full text-gray-400 text-xs">Rab</div>
                            <div class="w-full text-gray-400 text-xs">Kam</div>
                            <div class="w-full text-gray-400 text-xs">Jum</div>
                            <div class="w-full text-gray-400 text-xs">Sab</div>
                        </div>
                        <div class="days flex flex-wrap">
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="ml-3 mt-4 flex flex-col gap-2">
                    <div class="flex items-center gap-3">
                        <div class="bg-lightgray h-4 w-4 rounded-full"></div>
                        <p class="text-base font-medium">Hari ini</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="bg-mainblue h-4 w-4 rounded-full"></div>
                        <p class="text-base font-medium">BNCC Launching</p>
                    </div>
                    @if($user->status >= 3)
                    <div class="flex items-center gap-3">
                        <div class="bg-[#3171d3] h-4 w-4 rounded-full"></div>
                        <p class="text-base font-medium">Member Re-Registration</p>
                    </div>
                    @endif
                </div>
            </section>

            {{-- Contact Person --}}
            <section class="card flex flex-col gap-9 h-fit laptop:w-fit w-full">
                <h1 class="text-mainblue_dark font-extrabold font-montserrat tablet:text-3xl text-lg mb-2">Contact
                    Person</h1>

                <div class="flex justify-center font-poppins">

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
                                <img src="{{ asset('assets/icon/Social_Line.svg') }}" class="laptop:w-10 tablet:w-8 w-5"
                                    alt="">
                                <p class="tablet:text-lg text-xs font-medium">ndy.fa</p>
                            </div>

                            <div class="flex gap-2 items-center">
                                <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}"
                                    class="laptop:w-10 tablet:w-8 w-5" alt="">
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
                                <img src="{{ asset('assets/icon/Social_Line.svg') }}" class="laptop:w-10 tablet:w-8 w-5"
                                    alt="">
                                <p class="tablet:text-lg text-xs font-medium">charissa_jeanette</p>
                            </div>

                            <div class="flex gap-2 items-center">
                                <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}"
                                    class="laptop:w-10 tablet:w-8 w-5" alt="">
                                <p class="tablet:text-lg text-xs font-medium">081802228681</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="flex laptop:flex-row flex-col laptop:gap-10 tablet:gap-8 gap-6">
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/user-dashboard.js?t=170920221635') }}"></script>
</body>

</html>
