<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="schedule" content="{{$user->launching_schedule}}">
    <title>BNCC Opening Season</title>
    <link rel="stylesheet" href="{{ asset('css/user-dashboard.css?t=170920221635') }}">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon/favicon.svg?t=270720221356')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
</head>
<body>
    {{-- Schedule Successful --}}
    <section id="schedule-popup" class="hidden fixed bg-overlay w-screen h-screen z-[101] flex justify-center items-center font-poppins">
        <div class="bg-white rounded-3xl tablet:w-[720px] w-[360px] tablet:p-32 p-16 flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
            <img src="{{ asset('assets/icon/Reschedule_Success.svg') }}" alt="x" class="tablet:h-32 h-20">
            <h1 class="tablet:text-3xl text-base font-poppins font-semibold text-center">Jadwalmu telah berhasil dipilih!</h1>
        </div>
    </section>

    {{-- Logout Popup --}}
    <section id="logout-popup" class="hidden fixed bg-overlay w-screen h-screen z-[101] flex justify-center items-center font-poppins -mt-4">
        <div class="bg-white rounded-3xl tablet:w-[720px] w-[360px] tablet:p-32 p-16 flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
            <img src="{{ asset('assets/icon/Logout.svg') }}" alt="x" class="tablet:h-32 h-20">
            <h1 class="tablet:text-3xl text-base font-poppins font-semibold text-center">Apa kamu yakin ingin keluar?</h1>
            <div class="flex justify-center tablet:gap-8 gap-4">
                <button class="button_alt font-semibold tablet:text-2xl text-sm tablet:w-40 w-28 p-3" id="logout-kembali" onclick="closePopup()">Kembali</button>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="button p-[0.3rem] font-semibold tablet:text-2xl text-sm tablet:w-40 w-28 p-3 text-center rounded-full h-full" type="submit">Keluar</button>
                </form>
            </div>
        </div>
    </section>

    {{-- Wrapper --}}
    <div class="flex flex-col tablet:gap-8 gap-4 tablet:mx-12 tablet:my-13 mx-3 my-4">

        {{-- Navbar --}}
        <nav class="card font-poppins">
            <div class="flex justify-between items-center">
                <img src="{{ asset('assets/BNCC logo.svg') }}" alt="BNCC logo" class="hidden laptop:block h-8">

                <div class="flex gap-8 laptop:flex hidden">
                    <div class="flex flex-col items-center">
                        <a href="{{route('dashboard')}}" class="text-mainblue_dark text-xl font-semibold flex items-center">Schedule</a>

                        <div class="bg-mainblue w-20 h-1 mt-10  absolute rounded"></div>
                    </div>

                    <div id="dropdown-wrapper" class="inline-block">
                        <button onclick="navbarMenu()" class="text-black text-xl font-semibold flex items-center gap-4">
                            {{$name}} <img src="{{ asset('assets/icon/Dropdown_Down.svg') }}" alt="" class="h-3">
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
                <div class="flex gap-4 laptop:hidden w-full justify-between items-center">
                    <img src="{{ asset('assets/BNCC logo.svg') }}" alt="BNCC logo" class="tablet:h-8 h-4">
                    <div class="flex flex-col items-center">
                        <a href="#" class="text-mainblue_dark tablet:text-3xl text-sm font-semibold flex items-center">Schedule</a>
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
                                    <a class="px-5 py-3 text-black tablet:text-xl text-xs font-semibold hover:text-blue-600 flex gap-3 justify-end" href="{{ route('dashboard') }}">Schedule</a>
                                    <a class="px-5 py-3 text-black tablet:text-xl text-xs font-semibold hover:text-blue-600 flex gap-3 justify-end" href="{{ route('profile') }}">Profile</a>
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

        {{-- Content Wrapper --}}
        <div class="flex laptop:flex-row flex-col justify-between tablet:gap-7 gap-3">

            {{-- Left Sections --}}
            <div class="flex flex-col tablet:gap-7 gap-3 w-full">


                {{-- Choose Your Schedule --}}
                <section class="card flex flex-col tablet:gap-9 gap-4">
                    <form action="{{route('scheduleChange',["id" => $user->id])}}" class="flex flex-col tablet:gap-9 gap-4" method="POST">
                        @csrf
                        {{-- @method('patch') --}}
                        <div>
                            <h1 class="text-mainblue_dark font-extrabold font-montserrat tablet:text-3xl text-lg mb-2">Change Your Schedule</h1>
                            <p class="tablet:text-xl text-xs font-poppins font-medium">Tidak bisa hadir pada jadwal yang sudah dipilih sebelumnya? <br> Jangan ragu untuk memilih jadwal baru kamu ya!</p>
                        </div>

                        {{-- Kemanggisan --}}
                        <div class="font-poppins font-medium">
                            <label for="bncclaunching_reschedule" class="block text-mainblue_dark font-semibold tablet:text-2xl text-sm mb-2">Jadwal BNCC Launching</label>
                            <select id="bncclaunching_reschedule" name="schedule" class="bg-lightgray text-gray-400 tablet:text-xl text-xs rounded-xl focus:ring-blue-500 focus:border-blue-500 block tablet:w-[28rem] w-full p-2 cursor-pointer">>
                                <option selected disabled class="text-gray-400">Pilih Jadwal Baru Kamu</option>
                                {{-- <option value="Kamis, 15 September 2022 (10.00 - 12.00)">Kamis, 15 September 2022 (10.00 - 12.00)</option>
                                <option value="Kamis, 15 September 2022 (13.00 - 15.00)">Kamis, 15 September 2022 (13.00 - 15.00)</option>
                                <option value="Kamis, 15 September 2022 (16.00 - 18.00)">Kamis, 15 September 2022 (16.00 - 18.00)</option>
                                <option value="Kamis, 15 September 2022 (19.00 - 21.00)">Kamis, 15 September 2022 (19.00 - 21.00)</option>
                                <option value="Jumat, 16 September 2022 (10.00 - 12.00)">Jumat, 16 September 2022 (10.00 - 12.00)</option>
                                <option value="Jumat, 16 September 2022 (13.00 - 15.00)">Jumat, 16 September 2022 (13.00 - 15.00)</option>
                                <option value="Jumat, 16 September 2022 (16.00 - 18.00)">Jumat, 16 September 2022 (16.00 - 18.00)</option>
                                <option value="Jumat, 16 September 2022 (19.00 - 21.00)">Jumat, 16 September 2022 (19.00 - 21.00)</option>
                                <option value="Sabtu, 17 September 2022 (10.00 - 12.00)">Sabtu, 17 September 2022 (10.00 - 12.00)</option> --}}
                                {{-- <option value="Sabtu, 17 September 2022 (13.00 - 15.00)">Sabtu, 17 September 2022 (13.00 - 15.00)</option>
                                <option value="Sabtu, 17 September 2022 (16.00 - 18.00)">Sabtu, 17 September 2022 (16.00 - 18.00)</option> --}}
                                {{-- <option value="Sabtu, 17 September 2022 (19.00 - 21.00)">Sabtu, 17 September 2022 (19.00 - 21.00)</option> --}}
                                <option value="Senin, 19 September 2022 (16.00 - 18.00)">Senin, 19 September 2022 (16.00 - 18.00)</option>
                                <option value="Senin, 19 September 2022 (19.00 - 21.00)">Senin, 19 September 2022 (19.00 - 21.00)</option>
                            </select>
                        </div>

                        {{-- Alam Sutera --}}
                        <div class="font-poppins font-medium">
                            <label for="bncclaunching_reschedule" class="block text-mainblue_dark font-semibold tablet:text-2xl text-sm mb-2">Jadwal BNCC Launching</label>
                            <select disabled id="bncclaunching_reschedule" name="schedule" class="bg-lightgray text-gray-400 tablet:text-xl text-xs rounded-xl focus:ring-blue-500 focus:border-blue-500 block tablet:w-[28rem] w-full p-2 cursor-pointer">>
                                <option selected disabled class="text-gray-400">Coming Soon</option>
                            </select>
                        </div>

                        {{-- Bandung --}}
                        <div class="font-poppins font-medium">
                            <label for="bncclaunching_reschedule" class="block text-mainblue_dark font-semibold tablet:text-2xl text-sm mb-2">Jadwal BNCC Launching</label>
                            <select disabled id="bncclaunching_reschedule" name="schedule" class="bg-lightgray text-gray-400 tablet:text-xl text-xs rounded-xl focus:ring-blue-500 focus:border-blue-500 block tablet:w-[28rem] w-full p-2 cursor-pointer">>
                                <option selected disabled class="text-gray-400">Coming Soon</option>
                            </select>
                        </div>

                        {{-- Malang --}}
                        <div class="font-poppins font-medium">
                            <label for="bncclaunching_reschedule" class="block text-mainblue_dark font-semibold tablet:text-2xl text-sm mb-2">Jadwal BNCC Launching</label>
                            <select disabled id="bncclaunching_reschedule" name="schedule" class="bg-lightgray text-gray-400 tablet:text-xl text-xs rounded-xl focus:ring-blue-500 focus:border-blue-500 block tablet:w-[28rem] w-full p-2 cursor-pointer">>
                                <option selected disabled class="text-gray-400">Coming Soon</option>
                            </select>
                        </div>

                        <button disabled class="button font-semibold tablet:text-2xl text-sm font-poppins tablet:w-[28rem] w-full py-3" id="schedule-submit" type="submit" data-modal-toggle="reschedule-popup">Submit</button>
                    </form>
                </section>

            </div>

            {{-- Right Sections --}}
            <div class="flex laptop:flex-col tablet:flex-row flex-col justify-between tablet:gap-7 gap-3">
                {{-- Calendar --}}
                <section class="calendar-content card tablet:w-[28rem] w-full font-poppins">
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
                    </div>
                </section>

                {{-- Contact Person --}}
                <section class="card flex flex-col gap-9 h-fit">
                    <h1 class="text-mainblue_dark font-extrabold font-montserrat tablet:text-3xl text-lg mb-2">Contact Person</h1>

                    <div class="flex justify-between font-poppins">

                        @if (Auth::user()->campus_region == "Kemanggisan")
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
                        @elseif (Auth::user()->campus_region == "Alam Sutera")
                            {{-- CP 1: Audrey --}}
                            <div class="flex flex-col items-center gap-3">
                                <div class="flex flex-col items-center gap-2">
                                    <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                                    <p class="tablet:text-xl text-base font-bold text-center">Audrey</p>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Line.svg') }}" class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">dreyelvia</p>
                                    </div>

                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}" class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">085173171809</p>
                                    </div>
                                </div>
                            </div>

                            {{-- CP 2: Vaness --}}
                            <div class="flex flex-col items-center gap-3">
                                <div class="flex flex-col items-center gap-2">
                                    <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                                    <p class="tablet:text-xl text-base font-bold text-center">Vaness</p>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Line.svg') }}" class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">vvvnnnsss</p>
                                    </div>

                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}" class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">085159661361</p>
                                    </div>
                                </div>
                            </div>
                        @elseif (Auth::user()->campus_region == "Bandung")
                            {{-- CP 1: Audrey --}}
                            <div class="flex flex-col items-center gap-3">
                                <div class="flex flex-col items-center gap-2">
                                    <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                                    <p class="tablet:text-xl text-base font-bold text-center">Audrey</p>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Line.svg') }}" class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">dreyelvia</p>
                                    </div>

                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}" class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">085173171809</p>
                                    </div>
                                </div>
                            </div>

                            {{-- CP 2: Vaness --}}
                            <div class="flex flex-col items-center gap-3">
                                <div class="flex flex-col items-center gap-2">
                                    <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                                    <p class="tablet:text-xl text-base font-bold text-center">Vaness</p>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Line.svg') }}" class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">vvvnnnsss</p>
                                    </div>

                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}" class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">085159661361</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{-- CP 1: Audrey --}}
                            <div class="flex flex-col items-center gap-3">
                                <div class="flex flex-col items-center gap-2">
                                    <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                                    <p class="tablet:text-xl text-base font-bold text-center">Audrey</p>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Line.svg') }}" class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">dreyelvia</p>
                                    </div>

                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}" class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">085173171809</p>
                                    </div>
                                </div>
                            </div>

                            {{-- CP 2: Vaness --}}
                            <div class="flex flex-col items-center gap-3">
                                <div class="flex flex-col items-center gap-2">
                                    <img src="{{ asset('assets/icon/Profile.svg') }}" alt="">
                                    <p class="tablet:text-xl text-base font-bold text-center">Vaness</p>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Line.svg') }}" class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">vvvnnnsss</p>
                                    </div>

                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('assets/icon/Social_Whatsapp.svg') }}" class="laptop:w-10 tablet:w-8 w-5" alt="">
                                        <p class="tablet:text-lg text-xs font-medium">085159661361</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/user-dashboard.js?t=150920221037') }}"></script>
</body>
</html>
