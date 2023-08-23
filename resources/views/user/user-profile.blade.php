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
                    <a href="{{route('userRegist')}}"
                        class="text-black tablet:text-xl text-sm font-semibold flex items-center">Registration</a>
                    @endif
                    @if ($user->status == 4)
                    <a href="{{route('userReRegist')}}"
                        class="text-black tablet:text-xl text-sm font-semibold flex items-center">Re-Registration</a>
                    @endif

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
                        <a href="#" class="text-mainblue_dark tablet:text-3xl text-sm font-semibold flex items-center">Profile</a>
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

        {{-- Content Wrapper --}}
        <div class="flex tablet:flex-row flex-col justify-between tablet:gap-7 gap-3">

            {{-- Left Sections --}}
            <div class="flex flex-col tablet:gap-7 gap-3 w-full">

                {{-- Personal Information --}}
                <section class="card flex flex-col tablet:gap-4 gap-2">
                    <h1 class="text-mainblue_dark font-extrabold tablet:text-3xl text-lg font-montserrat">Personal Information</h1>

                    <div class="flex flex-col gap-4 font-poppins">
                        <div>
                            <h3 class="tablet:text-lg text-xs">Nama Lengkap</h3>
                            <p class="tablet:text-2xl text-base font-bold">{{$user->fullName}}</p>
                        </div>
                        <div>
                            <h3 class="tablet:text-lg text-xs">Jenis Kelamin</h3>
                            <p class="tablet:text-2xl text-base font-bold">{{$user->gender}}</p>
                        </div>
                        <div>
                            <h3 class="tablet:text-lg text-xs">Tanggal Lahir</h3>
                            <p class="tablet:text-2xl text-base font-bold">{{$user->birthDate}}</p>
                        </div>
                        <div>
                            <h3 class="tablet:text-lg text-xs">Tempat Lahir</h3>
                            <p class="tablet:text-2xl text-base font-bold">{{$user->placeBirth}}</p>
                        </div>
                        <div>
                            <h3 class="tablet:text-lg text-xs">Kota Domisili</h3>
                            <p class="tablet:text-2xl text-base font-bold">{{$user->domicile}}</p>
                        </div>
                        <div>
                            <h3 class="tablet:text-lg text-xs">Alamat Lengkap</h3>
                            <p class="tablet:text-2xl text-base font-bold">{{$user->address}}</p>
                        </div>
                        <div>
                            <h3 class="tablet:text-lg text-xs">ID LINE</h3>
                            <p class="tablet:text-2xl text-base font-bold">{{$user->line_id}}</p>
                        </div>
                        <div>
                            <h3 class="tablet:text-lg text-xs">Nomor WhatsApp</h3>
                            <p class="tablet:text-2xl text-base font-bold">{{$user->whatsapp}}</p>
                        </div>
                        @if ($user->instagram == null)
                            {{-- Kosong --}}
                        @else
                            <div>
                                <h3 class="tablet:text-lg text-xs">Instagram</h3>
                                <p class="tablet:text-2xl text-base font-bold">{{$user->instagram}}</p>
                            </div>
                        @endif
                        @if ($user->agama == null)
                        {{-- Kosong --}}
                        @else
                            <div>
                                <h3 class="tablet:text-lg text-xs">Agama</h3>
                                <p class="tablet:text-2xl text-base font-bold">{{$user->agama}}</p>
                            </div>
                        @endif
                        <div>
                            <h3 class="tablet:text-lg text-xs">Email Pribadi</h3>
                            <p class="tablet:text-2xl text-base font-bold">{{$user->email}}</p>
                        </div>
                        @if ($user->binus_email == null)
                            {{-- Kosong --}}
                        @else
                            <div>
                                <h3 class="tablet:text-lg text-xs">Email Binus</h3>
                                <p class="tablet:text-2xl text-base font-bold">{{$user->binus_email}}</p>
                            </div>
                        @endif
                    </div>
                </section>
            </div>

            {{-- Right Sections --}}
            <div class="flex flex-col tablet:gap-7 gap-3 w-full">

                {{-- Student Credentials --}}
                <section class="card flex flex-col tablet:gap-4 gap-2 w-full">
                    <h1 class="text-mainblue_dark font-extrabold tablet:text-3xl text-lg font-montserrat">Student Credentials</h1>

                    <div class="flex flex-col gap-4 font-poppins">
                        <div>
                            <h3 class="tablet:text-lg text-xs">NIM </h3>
                            <p class="tablet:text-2xl text-base font-bold">{{$user->nim}}</p>
                        </div>
                        @if ($user->bnccID == null)
                            {{-- Kosong --}}
                        @else
                            <div>
                                <h3 class="tablet:text-lg text-xs">BNCC ID</h3>
                                <p class="tablet:text-2xl text-base font-bold">{{$user->bnccID}}</p>
                            </div>
                        @endif
                        <div>
                            <h3 class="tablet:text-lg text-xs">Region Kampus </h3>
                            <p class="tablet:text-2xl text-base font-bold">{{$user->campus_region}}</p>
                        </div>
                        <div>
                            <h3 class="tablet:text-lg text-xs">Fakultas </h3>
                            <p class="tablet:text-2xl text-base font-bold">{{$user->faculty}}</p>
                        </div>
                        <div>
                            <h3 class="tablet:text-lg text-xs">Jurusan </h3>
                            <p class="tablet:text-2xl text-base font-bold">{{$user->major}}</p>
                        </div>
                        <div>
                            <h3 class="tablet:text-lg text-xs">FYP Batch </h3>
                            <p class="tablet:text-2xl text-base font-bold">{{$user->batch}}</p>
                        </div>
                    </div>
                </section>

                {{-- BNCC Registration --}}
                <section class="card flex flex-col tablet:gap-4 gap-2 w-full">
                    <h1 class="text-mainblue_dark font-extrabold tablet:text-3xl text-lg font-montserrat">BNCC Registration</h1>

                    <div class="flex flex-col gap-4 font-poppins">
                        @if ($user->launching_schedule == null)
                            {{-- Kosong --}}
                        @else
                            <div>
                                <h3 class="tablet:text-lg text-xs">Jadwal BNCC Launching</h3>
                                <p class="tablet:text-2xl text-base font-bold">{{Str::of($user->launching_schedule)->before('(')}}
                                    <br>{{Str::of($user->launching_schedule)->between('(', ')')}} WIB</p>
                            </div>
                        @endif
                        @if ($user->trial_class == null || $user->trial_class == '-')
                        {{-- Kosong --}}
                        @else
                            <div>
                                <h3 class="tablet:text-lg text-xs">Jadwal Trial Class</h3>
                                <p class="tablet:text-2xl text-base font-bold">{{Str::of($user->trial_class)->before('(')}}-{{Str::of($user->trial_class)->after(') -')}}
                                    <br>{{Str::of($user->trial_class)->between('(', ')')}} WIB</p>
                            </div>
                        @endif
                        @if ($user->reregister_schedule == null)
                        {{-- Kosong --}}
                        @else
                            <div>
                                <h3 class="tablet:text-lg text-xs">Jadwal Reregister</h3>
                                <p class="tablet:text-2xl text-base font-bold">{{Str::of($user->reregister_schedule)->before('(')}}
                                    <br>{{Str::of($user->reregister_schedule)->between('(', ')')}} WIB</p>
                            </div>
                        @endif
                        <div>
                            <h3 class="tablet:text-lg text-xs">LnT Course</h3>
                            <p class="tablet:text-2xl text-base font-bold">{{$user->lnt_course}}</p>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/user-dashboard.js?t=150920221037') }}"></script>
</body>
</html>
