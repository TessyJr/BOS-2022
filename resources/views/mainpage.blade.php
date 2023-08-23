<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BNCC Opening Season 2022</title>
    <link rel="stylesheet" href="{{asset('css/mainpage.css?t=150920221037')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon/favicon.svg?t=270720221202')}}">
</head>

<body class="relative">
    {{-- Logout Popup --}}
    <section id="logout-popup"
        class="hidden fixed bg-overlay w-screen h-screen z-[2000] flex justify-center items-center bg-black/50 font-poppins">
        <div
            class="bg-white rounded-3xl tablet:w-[720px] w-[360px] p-[10%] flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
            <img src="{{ asset('assets/icon/Logout.svg') }}" alt="x" class="tablet:h-32 h-20">
            <h1 class="tablet:text-3xl text-base font-poppins font-semibold text-center">Apa kamu yakin ingin keluar?
            </h1>
            <div class="flex justify-center laptop:gap-8 tablet:gap-4 gap-2   laptop:w-[500px] w-full">
                <button
                    class="flex-1 tablet:py-4 py-2 rounded-[100px] laptop:text-2xl tablet:text-xl text-sm font-semibold text-[#00A3FF] border-[#00A3FF] border-2"
                    id="logout-kembali" onclick="closePopupLogout()">Kembali</button>
                <form action="{{route('logout')}}" method="POST" class="flex-1">
                    @csrf
                    <button
                        class="blue-btn w-full h-full text-white laptop:text-2xl tablet:text-xl text-sm font-semibold tablet:py-4 py-2 rounded-[100px]"
                        type="submit">Keluar</button>
                </form>
            </div>
        </div>
    </section>

    {{-- white navbar --}}
    <nav id="white-navbar"
        class="w-full h-fit flex justify-between py-6 px-[5%] text-white font-poppins desktop:gap-8 gap-3 fixed z-[1000] transition-all duration-300">
        <div class="logo laptop:w-[160px] tablet:w-[140px] w-[100px] h-auto flex items-center justify-center"><img
                src="{{asset('assets/bncc-logo/bncc-white.svg')}}" alt="BNCC logo White"></div>
        <div
            class="menu flex justify-center items-center laptop:hidden laptop:w-[37px] tablet:w-[34px] w-[30px] h-auto">
            <img id="menu-btn-white" src="{{asset('assets/mainpage/icons/white-menu.svg')}}" alt="menu bar"
                class="cursor-pointer block" onclick="openNav()">
        </div>
        <div class="navLinks laptop:block hidden">
            <ul
                class="flex list-none item-center laptop:text-2xl text-xl font-semibold laptop:gap-11 gap-5 text-center">
                <li class="py-2 flex items-center justify-center group relative">
                    <span onclick="toAbout()" class="cursor-pointer">About</span>
                    <span class="absolute bottom-0 left-0 w-0 h-1 bg-white transition-all group-hover:w-full"></span>
                </li>
                <li class="py-2 flex justify-center items-center group relative"><span onclick="toCourse()"
                        class="cursor-pointer">Courses</span><span
                        class="absolute bottom-0 left-0 w-0 h-1 bg-white transition-all group-hover:w-full"></span></li>
                <li class="py-2 flex justify-center items-center group relative"><span onclick="toBOSEvents()"
                        class="cursor-pointer">Ongoing Events</span><span
                        class="absolute bottom-0 left-0 w-0 h-1 bg-white transition-all group-hover:w-full"></span></li>
                <li class="py-2 flex justify-center items-center group relative"><span onclick="toFAQ()"
                        class="cursor-pointer">FAQ</span><span
                        class="absolute bottom-0 left-0 w-0 h-1 bg-white transition-all group-hover:w-full"></span></li>
                @guest
                <li class="py-2 flex justify-center items-center">
                    <a href="{{route('login')}}"
                        class="px-8 py-2 relative border-[3px] border-white rounded-full bg-[linear-gradient(to_top,transparent_50%,white_50%)] bg-[length:150%_200%] bg-bottom hover:bg-top transition-all duration-200 ease-out hover:text-[#3171D3]">Sign In

                    </a></li>
                @endguest
                @auth
                <li class="py-2 flex justify-center items-center relative">
                    <div id="dropdown-wrapper-white" class="inline-block">
                        <button id="dropdown-down-white" onclick="navbarMenu()"
                            class="text-white flex items-center gap-4">
                            {{Str::words(Auth::user()->fullName,2,'')}} <img
                                src="{{ asset('assets/icon/Dropdown_Down_White.svg') }}" alt="" class="h-3"></button>
                        <button id="dropdown-up-white" onclick="navbarMenu()"
                            class="text-white flex items-center gap-4 hidden">
                            {{Str::words(Auth::user()->fullName,2,'')}} <img
                                src="{{ asset('assets/icon/Dropdown_Up_White.svg') }}" alt="" class="h-3"></button>
                        <div id="nav-menu-white"
                            class="hidden flex flex-col bg-white drop-shadow-md absolute z-0 w-full mt-1">
                            <a class="px-5 py-3 text-black text-xl font-semibold hover:text-blue-600 border-b border-gray-200 flex gap-3 items-center"
                                href="{{route('dashboard')}}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>Dashboard</a>
                            <button
                                class="px-5 py-3 text-black text-xl font-semibold hover:text-blue-600 border-b border-gray-200 flex gap-2 items-center"
                                href="#" id="logout-btn" type="button" data-modal-toggle="logout-popup"
                                onclick="openPopupLogout()">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>Log Out
                            </button>
                        </div>
                    </div>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
    {{-- blue navbar --}}
    <nav id="blue-navbar"
        class="w-full h-fit flex justify-between py-6 px-[5%] text-[#00A3FF] font-poppins desktop:gap-8 gap-3 fixed z-[1000] transition-all duration-300 bg-white hidden">
        <div class="logo laptop:w-[160px] tablet:w-[140px] w-[100px] h-auto flex items-center justify-center"><img
                src="{{asset('assets/bncc-logo/bncc-blue.svg')}}" alt="BNCC logo Blue"></div>
        <div id="icon-hamburger"
            class="menu flex justify-center items-center laptop:hidden laptop:w-[37px] tablet:w-[34px] w-[30px] h-auto">
            <img id="menu-btn-blue" src="{{asset('assets/mainpage/icons/blue-menu.svg')}}" alt="menu bar"
                class="cursor-pointer block" onclick="openNav()">
        </div>
        <div class="navLinks laptop:block hidden">
            <ul
                class="flex list-none item-center laptop:text-2xl text-xl font-semibold laptop:gap-11 gap-5 text-center">
                <li class="py-2 flex items-center justify-center group relative"><span onclick="toAbout()"
                        class="cursor-pointer">About</span><span
                        class="absolute bottom-0 left-0 w-0 h-1 bg-[#00A3FF] transition-all group-hover:w-full"></span>
                </li>
                <li class="py-2 flex justify-center items-center group relative"><span onclick="toCourse()"
                        class="cursor-pointer">Courses</span><span
                        class="absolute bottom-0 left-0 w-0 h-1 bg-[#00A3FF] transition-all group-hover:w-full"></span>
                </li>
                <li class="py-2 flex justify-center items-center group relative"><span onclick="toBOSEvents()"
                        class="cursor-pointer">Ongoing Events</span><span
                        class="absolute bottom-0 left-0 w-0 h-1 bg-[#00A3FF] transition-all group-hover:w-full"></span>
                </li>
                <li class="py-2 flex justify-center items-center group relative"><span onclick="toFAQ()"
                        class="cursor-pointer">FAQ</span><span
                        class="absolute bottom-0 left-0 w-0 h-1 bg-[#00A3FF] transition-all group-hover:w-full"></span>
                </li>
                @guest
                <li class="py-2 flex justify-center items-center group relative"><a href="{{route('login')}}"
                        class="px-8 py-2 relative border-[3px] rounded-[100px] border-white group overflow-hidden">
                        <span
                            class="absolute top-0 left-0 flex w-full h-0 mb-0 transition-all duration-200 ease-out transform translate-y-0 bg-white group-hover:h-full opacity-90"></span>
                        <span class="relative group-hover:text-[#3171D3]">Sign In</span>
                    </a></li>
                @endguest
                @auth
                <li class="py-2 flex justify-center items-center relative">
                    <div id="dropdown-wrapper-blue" class="inline-block">
                        <button id="dropdown-down-blue" onclick="navbarMenu()" class="flex items-center gap-4">
                            {{Str::words(Auth::user()->fullName,2,'')}} <img
                                src="{{ asset('assets/icon/Dropdown_Down_Blue.svg') }}" alt="" class="h-3"></button>
                        <button id="dropdown-up-blue" onclick="navbarMenu()" class="hidden flex items-center gap-4">
                            {{Str::words(Auth::user()->fullName,2,'')}} <img
                                src="{{ asset('assets/icon/Dropdown_Up_Blue.svg') }}" alt="" class="h-3"></button>
                        <div id="nav-menu-blue"
                            class="hidden flex flex-col bg-white drop-shadow-md absolute z-0 w-full mt-2">
                            <a class="px-5 py-3 text-black text-xl font-semibold hover:text-[#00A3FF] border-b border-gray-200 flex gap-3 items-center"
                                href="{{route('dashboard')}}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>Dashboard</a>
                            <button
                                class="px-5 py-3 text-black text-xl font-semibold hover:text-[#00A3FF] border-b border-gray-200 flex gap-2 items-center"
                                href="#" id="logout-btn" type="button" data-modal-toggle="logout-popup">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>Log Out
                            </button>
                        </div>
                    </div>
                </li>
                @endauth
            </ul>
        </div>
    </nav>
    {{-- side bar responsive --}}
    <div id="side-nav"
        class="flex flex-col items-end justify-between h-full fixed top-0 right-0 bg-black/50 overflow-x-hidden py-7 laptop:hidden transition-all w-0 z-[1001]">
        <div
            class="flex flex-col items-end tablet:gap-16 gap-12 tablet:text-xl mobile:text-sm font-semibold font-poppins text-white text-end px-[12%] w-full">
            <img src="{{asset('assets/mainpage/icons/close.svg')}}" alt="close"
                class="cursor-pointer laptop:w-[37px] tablet:w-[34px] w-[30px] h-auto" onclick="closeNav()">
            <li class="py-2 flex items-center justify-center"><span onclick="toAbout()"
                    class="cursor-pointer">About</span></li>
            <li class="py-2 flex justify-center items-center"><span onclick="toCourse()"
                    class="cursor-pointer">Courses</span></li>
            <li class="py-2 flex justify-center items-center"><span onclick="toBOSEvents()"
                    class="cursor-pointer">Ongoing Events</span></li>
            <li class="py-2 flex justify-center items-center"><span onclick="toFAQ()" class="cursor-pointer">FAQ</span>
            </li>
        </div>
        @auth
        <div
            class="flex flex-col items-end tablet:gap-12 gap-8 tablet:text-xl mobile:text-sm font-semibold font-poppins text-white text-end px-[12%] w-full tablet:pb-16 pb-8">
            <a class="flex justify-center items-center gap-2" href="{{route('dashboard')}}">Dashboard <svg
                    xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg></a>
            <span onclick="openPopupLogout()" class="flex justify-center items-center gap-2">Logout <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg></span>
        </div>
        @endauth
        @guest
        <a href="{{route('login')}}"
            class="laptop:text-2xl tablet:text-xl text-sm font-semibold text-white px-6 tablet:pb-16 pb-8"><button
                type="button"
                class="tablet:px-12 px-6 py-2 border-[3px] rounded-[100px] border-white hover:bg-white hover:text-[#3171D3] transition-colors">Sign
                In</button>
        </a>
        @endguest
    </div>

    {{-- Hero Section --}}
    <section id="hero" class="min-h-screen w-full relative px-[5%] overflow-hidden flex justify-center items-center">
        {{-- background --}}
        <img src="{{asset('assets/mainpage/hero/rocks-front.svg')}}" alt="rocks"
            class="absolute w-full left-0 bottom-0 z-[100] pointer-events-none" id="hero-rock">
        <img src="{{asset('assets/mainpage/hero/cloud.svg')}}" alt="cloud" id="cloud"
            class="absolute laptop:w-full w-auto laptop:h-auto h-full top-0 object-cover">
        <img src="{{asset('assets/mainpage/hero/stars.svg')}}" alt="stars" id="stars"
            class="absolute laptop:w-full w-auto laptop:h-auto h-full top-0 object-cover">
        <img src="{{asset('assets/mainpage/hero/hex-left.svg')}}" alt="hex left" id="hex-left"
            class="absolute left-0 top-0 laptop:w-auto tablet:w-1/5 w-2/5">
        <img src="{{asset('assets/mainpage/hero/hex-right.svg')}}" alt="hex right" id="hex-right"
            class="absolute right-0 top-0 laptop:w-auto tablet:w-1/5 w-2/5">
        <img src="{{asset('assets/mainpage/hero/mountain.svg')}}" alt="mountain" id="mountain"
            class="absolute w-full bottom-0 object-cover">

        <div class="absolute font-poppins text-white flex flex-col text-center gap-16" id="hero-content">
            <div class="flex flex-col justify-center items-center">
                <h2 class="tablet:text-2xl text-[11px] font-medium">Bina Nusantara Computer Club</h2>
                <h1 class="laptop:text-[90px] tablet:text-[75px] text-[28px] font-extrabold font-montserrat">Opening
                    Season 2022</h1>
                <h2 class="tablet:text-2xl text-[11px] font-bold">Gaining Worthwhile Insights to Unlock Your Full
                    Potential</h2>
            </div>
            @guest
            <div class="flex flex-col justify-center items-center gap-4">
                <h2 class="tablet:text-xl text-[11px] font-medium">Ingin menjadi bagian dari kami?</h2>
                <a href="{{route('register')}}">
                    <button
                        class="blue-btn tablet:text-2xl text-xs font-semibold tablet:px-32 px-20 tablet:py-4 py-2 rounded-[100px]">Register
                        Now</button>
                </a>
            </div>
            @endguest
        </div>
    </section>

    {{-- about us --}}
    <section id="about"
        class="min-h-screen desktop:pt-[400px] laptop:pt-[300px] tablet:pt-[200px] pt-[12%] desktop:pb-[12%] laptop:pb-[5%] tablet:pb-[250px] px-[10%] flex laptop:flex-row flex-col laptop:justify-between justify-center items-center text-white tablet:gap-16 gap-8 relative overflow-hidden">

        {{-- background --}}
        <img src="{{asset('assets/mainpage/background/aboutus-rock.svg')}}" alt="rocks" id="aboutus-rocks"
            class="absolute w-full left-0 top-0 z-[100] pointer-events-none">
        <img src="{{asset('assets/mainpage/background/aboutus-smallrock-top.svg')}}" alt="rocks" id="aboutus-rocks-top"
            class="absolute top-0 bottom-0 my-auto right-32 z-[98] pointer-events-none w-auto">
        <img src="{{asset('assets/mainpage/background/aboutus-smallrock-bottom.svg')}}" alt="rocks"
            id="aboutus-rocks-bottom" class="absolute left-24 bottom-0 z-[98] pointer-events-none w-auto">
        <img src="{{asset('assets/mainpage/background/aboutus-rock-bottom.svg')}}" alt="rocks" id="aboutus-rock-bottom"
            class="absolute bottom-0 right-0 z-[98] pointer-events-none tablet:w-auto w-3/5">

        <div class="laptop:w-1/2 w-full flex flex-col justify-center items-start gap-8 font-poppins z-[99]">
            <h1
                class="tablet:text-[64px] text-2xl font-extrabold font-montserrat drop-shadow-[1_1_23px_rgba(255,255,255,0.25)]">
                About Us</h1>
            <p class="font-medium tablet:text-xl text-xs tablet:leading-[30px] leading-[150%]">BNCC (Bina Nusantara
                Computer Club) merupakan <span class="font-bold">organisasi yang bergerak dalam bidang teknologi</span>
                di Universitas Bina Nusantara.<span class="font-bold"> BNCC telah berhasil mengedukasi mahasiswa
                    Binus</span> melalui beragam pilihan <span class="italic">course</span> IT, <span
                    class="italic">event</span> menarik dan inovatif, produk pemecah masalah, <span
                    class="italic">research</span>, dan masih banyak lagi.
                <br><br>
                Memasuki tahun ke-33 berdirinya BNCC,<span class="font-bold"> kami siap untuk menghadapi tantangan
                    baru</span> di perjalanan kami. Kami <span class="font-bold">mengundang Anda untuk bergabung menjadi
                    bagian dari BNCC</span>, di mana kita akan belajar dan bertumbuh, serta mencapai kesuksesan secara
                bersama-sama!
            </p>
        </div>

        {{-- big carousel --}}
        <div id="big-carousel-about"
            class="p-10 fixed w-screen h-screen bg-black/50 flex justify-center items-center z-[2000] inset-0 m-auto hidden"
            onclick="popUpCarousel()">
            <div class="laptop:w-3/5 w-full h-auto relative" onclick="stopPropa(event)">
                <img src="{{asset('assets/mainpage/about-us/carousel-border.svg')}}" alt="border" class="w-full h-auto">
                <div class="absolute m-auto inset-0 w-[80%] flex justify-center items-center">
                    <img src="{{asset('assets/mainpage/about-us/aboutus1.png')}}" alt="about-us-1"
                        class="carousel-image-about-big">
                    <img src="{{asset('assets/mainpage/about-us/aboutus2.png')}}" alt="about-us-2"
                        class="carousel-image-about-big hidden">
                    <img src="{{asset('assets/mainpage/about-us/aboutus3.png')}}" alt="about-us-3"
                        class="carousel-image-about-big hidden">
                    <img src="{{asset('assets/mainpage/about-us/aboutus4.png')}}" alt="about-us-4"
                        class="carousel-image-about-big hidden">
                </div>

                <span class="absolute left-0 inset-y-0 my-auto h-full w-[5%] ml-[2%]">
                    <img src="{{asset('assets/mainpage/about-us/left-blue.svg')}}" alt="left-blue" class="absolute left-0 inset-y-0 my-auto z-10 peer cursor-pointer opacity-0 hover:opacity-100 transition-all" onclick="prevImageAbout()">
                    <img src="{{asset('assets/mainpage/about-us/left.svg')}}" alt="left"
                    class="absolute left-0 inset-y-0 my-auto cursor-pointer peer-hover:opacity-0 transition-all">
                 </span>
                <span class="absolute right-0 inset-y-0 my-auto h-full w-[5%] mr-[2%]">
                    <img src="{{asset('assets/mainpage/about-us/right-blue.svg')}}"     alt="right-blue" class="absolute right-0 inset-y-0 my-auto z-10 peer cursor-pointer opacity-0 hover:opacity-100 transition-all" onclick="nextImageAbout()">
                    <img src="{{asset('assets/mainpage/about-us/right.svg')}}" alt="right"
                    class="absolute right-0 inset-y-0 my-auto cursor-pointer peer-hover:opacity-0 transition-all">
                </span>
            </div>
        </div>
        {{-- small carousel --}}
        <div class="laptop:w-1/2 w-full h-auto relative transition-all z-[99]">
            <img src="{{asset('assets/mainpage/about-us/carousel-border.svg')}}" alt="border" class="w-full h-auto">
            <div class="absolute m-auto inset-0 w-[80%] flex justify-center items-center">
                <img src="{{asset('assets/mainpage/about-us/aboutus1.png')}}" alt="about-us-1"
                        class="carousel-image-about cursor-pointer" onclick="popUpCarousel()">
                    <img src="{{asset('assets/mainpage/about-us/aboutus2.png')}}" alt="about-us-2"
                        class="carousel-image-about hidden cursor-pointer" onclick="popUpCarousel()">
                    <img src="{{asset('assets/mainpage/about-us/aboutus3.png')}}" alt="about-us-3"
                        class="carousel-image-about hidden cursor-pointer" onclick="popUpCarousel()">
                    <img src="{{asset('assets/mainpage/about-us/aboutus4.png')}}" alt="about-us-4"
                        class="carousel-image-about hidden cursor-pointer" onclick="popUpCarousel()">
            </div>
            <span class="absolute left-0 inset-y-0 my-auto h-full w-[5%] ml-[2%]">
                <img src="{{asset('assets/mainpage/about-us/left-blue.svg')}}" alt="left-blue" class="absolute left-0 inset-y-0 my-auto z-10 peer cursor-pointer opacity-0 hover:opacity-100 transition-all" onclick="prevImageAbout()">
                <img src="{{asset('assets/mainpage/about-us/left.svg')}}" alt="left"
                    class="absolute left-0 inset-y-0 my-auto cursor-pointer peer-hover:opacity-0 transition-all">
            </span>
            <span class="absolute right-0 inset-y-0 my-auto h-full w-[5%] mr-[2%]">
                <img src="{{asset('assets/mainpage/about-us/right-blue.svg')}}" alt="right-blue" class="absolute right-0 inset-y-0 my-auto z-10 peer cursor-pointer opacity-0 hover:opacity-100 transition-all" onclick="nextImageAbout()">
                <img src="{{asset('assets/mainpage/about-us/right.svg')}}" alt="right"
                    class="absolute right-0 inset-y-0 my-auto cursor-pointer peer-hover:opacity-0 transition-all">
            </span>
        </div>
    </section>

    {{-- video company --}}
    <section id="video-company"
        class="tablet:min-h-screen flex flex-col justify-center items-center laptop:px-[20%] px-[10%] tablet:py-[100px] py-[50px] tablet:gap-16 gap-8 relative">
        {{-- background --}}
        <img src="{{asset('assets/mainpage/background/video-rock-left.svg')}}" alt="mountain" id="video-rock-left"
            class="absolute bottom-0 left-20 object-cover z-[100]">
        <img src="{{asset('assets/mainpage/background/video-rock-right.svg')}}" alt="mountain" id="video-rock-right"
            class="absolute bottom-1/2 right-20 object-cover z-[100]">

        <h1 class="text-[#3171D3] text-center font-montserrat tablet:text-[64px] text-2xl font-extrabold z-[101]">Video
            Company
        </h1>
        <div class="relative pt-[56.25%] h-0 rounded-3xl w-full z-[101]">
            {{-- <iframe class="rounded-3xl absolute top-0 left-0 w-full h-full"
                src="https://www.youtube.com/embed/pDk94cOADQI"
                title="Bina Nusantara Computer Club (BNCC) BINUS UNIVERSITY 2020" allowfullscreen></iframe> --}}
            <iframe class="shadow-[3px_4px_34px_rgba(39,92,171,0.1)] rounded-3xl absolute top-0 left-0 w-full h-full" title="Bina Nusantara Computer Club (BNCC) BINUS UNIVERSITY 2022" src="https://drive.google.com/file/d/1_pM5qRe_kKj6HPMxUDZwD64Ffv24G_uH/preview" width="640" height="480" allowfullscreen></iframe>
        </div>
    </section>

    {{-- BNCC Fun Fact --}}
    <section id="fun-fact"
        class="min-h-screen flex flex-col justify-center items-center px-[10%] tablet:py-[100px] py-[50px] tablet:gap-16 gap-8 bg-[#fbfbfb] relative">
        {{-- background --}}
        <img src="{{asset('assets/mainpage/background/funfact-rock-left.svg')}}" alt="mountain" id="funfact-rock-left"
            class="absolute bottom-0 left-20 object-cover z-[100]">
        <img src="{{asset('assets/mainpage/background/funfact-rock-right.svg')}}" alt="mountain" id="funfact-rock-right"
            class="absolute bottom-1/2 right-20 object-cover z-[100]">

        <h1 class="text-[#3171D3] text-center font-montserrat tablet:text-[64px] text-2xl font-extrabold z-[101]">BNCC
            Fun Facts
        </h1>
        <div class="flex flex-col justify-center items-center tablet:gap-8 gap-4 z-[101] font-poppins font-medium tablet:text-lg text-[10px] leading-relaxed">
            <div
                class="flex justify-center items-center tablet:gap-10 gap-6 rounded-[20px] shadow-[3px_4px_34px_rgba(39,92,171,0.1)] tablet:py-6 py-4 tablet:px-8 px-6 laptop:w-[70%] w-full bg-[#fbfbfb]">
                <img src="{{asset('assets/mainpage/fun-fact/33-years.svg')}}" alt="33 years old"
                    class="tablet:h-auto h-12">
                <p
                    class="w-full">
                    BNCC telah berumur 33 tahun.</p>
            </div>

            <div
                class="flex justify-center items-center tablet:gap-10 gap-6 rounded-[20px] shadow-[3px_4px_34px_rgba(39,92,171,0.1)] tablet:py-6 py-4 tablet:px-8 px-6 laptop:w-[70%] w-full bg-[#fbfbfb]">
                <img src="{{asset('assets/mainpage/fun-fact/produk.svg')}}" alt="products" class="tablet:h-auto h-12">
                <p
                    class="w-full">
                    BNCC memiliki 3 produk, yaitu FAVE Solution yang merupakan <span class="italic">software
                        house</span>, Filemagz sebagai <span class="italic">media online</span>, dan Learning and
                    Training (LnT) yang merupakan <span class="italic">course</span> IT.</p>
            </div>

            <div
                class="flex justify-center items-center tablet:gap-10 gap-6 rounded-[20px] shadow-[3px_4px_34px_rgba(39,92,171,0.1)] tablet:py-6 py-4 tablet:px-8 px-6 laptop:w-[70%] w-full bg-[#fbfbfb]">
                <img src="{{asset('assets/mainpage/fun-fact/kerjasama.svg')}}" alt="kerjasama"
                    class="tablet:h-auto h-12">
                <p
                    class="w-full">
                    BNCC telah menjalin kerja sama bersama banyak perusahaan besar, seperti Gojek, Tiket.com, dan masih
                    banyak lagi!</p>
            </div>

            <div
                class="flex justify-center items-center tablet:gap-10 gap-6 rounded-[20px] shadow-[3px_4px_34px_rgba(39,92,171,0.1)] tablet:py-6 py-4 tablet:px-8 px-6 laptop:w-[70%] w-full bg-[#fbfbfb]">
                <img src="{{asset('assets/mainpage/fun-fact/event.svg')}}" alt="events" class="tablet:h-auto h-12">
                <p
                    class="w-full">
                    BNCC telah melaksanakan berbagai <span class="italic">event</span> yang menghadirkan 1,500+ peserta
                    pada <span class="italic">event</span> terbesar kami, yaitu TechnoScape, dengan lebih dari 35
                    partner yang berkolaborasi dengan kami.</p>
            </div>
        </div>
    </section>

    {{-- Why BNCC? --}}
    <section id="why-bncc"
        class="min-h-screen flex flex-col justify-center items-center px-[10%] tablet:py-[100px] py-[50px] tablet:gap-24 gap-12 bg-[#fbfbfb]">
        <h1 class="text-[#3171D3] text-center font-montserrat tablet:text-[64px] text-2xl font-extrabold z-[101]">Why
            BNCC?</h1>
        <div class="flex flex-wrap font-poppins justify-center items-stretch laptop:gap-12 tablet:gap-6 gap-4 z-[101]">
            <div
                class="flex flex-col laptop:flex-[1_1_30%] flex-[1_1_40%] justify-center items-center rounded-3xl shadow-[4px_8px_20px_8px_rgba(157,157,157,0.3)] tablet:p-8 p-4 gap-2 bg-[#fbfbfb]">
                <img src="{{asset('assets/mainpage/why-bncc/networking.svg')}}" alt="networking"
                    class="tablet:w-auto w-16">
                <h1 class="tablet:text-[28px] text-[16px] font-bold text-center">Networking</h1>
                <p class="leading-relaxed tablet:text-lg text-[10px] font-medium text-center">Kamu bakal berkesempatan untuk menjalin koneksi dengan berbagai perusahaan ternama serta Binusian lainnya dari berbagai jurusan dan latar belakang.</p>
            </div>
            <div
                class="flex flex-col laptop:flex-[1_1_30%] flex-[1_1_40%] justify-center items-center rounded-3xl shadow-[4px_8px_20px_8px_rgba(157,157,157,0.3)] tablet:p-8 p-4 gap-2 bg-[#fbfbfb]">
                <img src="{{asset('assets/mainpage/why-bncc/hardskills.svg')}}" alt="hard skills"
                    class="tablet:w-auto w-16">
                <h1 class="tablet:text-[28px] text-[16px] font-bold text-center">Hard Skills</h1>
                <p class="leading-relaxed tablet:text-lg text-[10px] font-medium text-center">Pengen berkarir di industri teknologi? Pas banget, BNCC menawarkan berbagai macam <span class="italic">hard skills</span>, seperti <span class="italic">web development</span>, <span class="italic">mobile apps development</span>,
                    <span class="italic">UI/UX design</span>, dan masih banyak lagi!</p>
            </div>
            <div
                class="flex flex-col laptop:flex-[1_1_30%] flex-[1_1_40%] justify-center items-center rounded-3xl shadow-[4px_8px_20px_8px_rgba(157,157,157,0.3)] tablet:p-8 p-4 gap-2 bg-[#fbfbfb]">
                <img src="{{asset('assets/mainpage/why-bncc/softskills.svg')}}" alt="soft skills"
                    class="tablet:w-auto w-16">
                <h1 class="tablet:text-[28px] text-[16px] font-bold text-center">Soft Skills</h1>
                <p class="leading-relaxed tablet:text-lg text-[10px] font-medium text-center">Tahukah kamu? <span class="italic">Soft skills</span> juga tidak kalah penting dalam mensukseskan karirmu, lho! Yuk, asah <span class="italic">soft skills</span>-mu di BNCC, seperti <span class="italic">public speaking, leadership, time management</span>, dan masih banyak lagi!</p>
            </div>
            <div
                class="flex flex-col laptop:flex-[1_1_30%] flex-[1_1_40%] justify-center items-center rounded-3xl shadow-[4px_8px_20px_8px_rgba(157,157,157,0.3)] tablet:p-8 p-4 gap-2 bg-[#fbfbfb]">
                <img src="{{asset('assets/mainpage/why-bncc/sat.svg')}}" alt="SAT points" class="tablet:w-auto w-16">
                <h1 class="tablet:text-[28px] text-[16px] font-bold text-center">SAT Points & ComServ</h1>
                <p class="leading-relaxed tablet:text-lg text-[10px] font-medium text-center">Apakah kamu khawatir tidak memenuhi kuota SAT Points dan ComServ yang menjadi syarat untuk mengambil skripsi? Tenang saja! Di BNCC, kamu bisa mendapatkan SAT Points dan ComServ yang melimpah!</p>
            </div>
            <div
                class="flex flex-col laptop:flex-[1_1_30%] flex-[1_1_40%] justify-center items-center rounded-3xl shadow-[4px_8px_20px_8px_rgba(157,157,157,0.3)] tablet:p-8 p-4 gap-2 bg-[#fbfbfb]">
                <img src="{{asset('assets/mainpage/why-bncc/experience.svg')}}" alt="experience"
                    class="tablet:w-auto w-16">
                <h1 class="tablet:text-[28px] text-[16px] font-bold text-center">Experience</h1>
                <p class="leading-relaxed tablet:text-lg text-[10px] font-medium text-center">Pengen menambah berbagai pengalaman kerja?
                    Dengan mengikuti berbagai macam program di BNCC, dijamin akan menambah nilai dan pengalaman di
                    CV-mu!
                </p>
            </div>
            <div
                class="flex flex-col laptop:flex-[1_1_30%] flex-[1_1_40%] justify-center items-center rounded-3xl shadow-[4px_8px_20px_8px_rgba(157,157,157,0.3)] tablet:p-8 p-4 gap-2 bg-[#fbfbfb]">
                <img src="{{asset('assets/mainpage/why-bncc/techinsights.svg')}}" alt="tech insights"
                    class="tablet:w-auto w-16">
                <h1 class="tablet:text-[28px] text-[16px] font-bold text-center">Tech Insights</h1>
                <p class="leading-relaxed tablet:text-lg text-[10px] font-medium text-center">Tidak hanya menambah pengetahuanmu di industri teknologi saja, namun di BNCC, kamu juga bakal mendapatkan <span class="italic">insights</span> dan tren baru di dunia teknologi.
                </p>
            </div>

        </div>
        <h1 class="tablet:text-4xl text-[16px] text-black font-poppins font-bold text-center z-[101]">Dan masih banyak
            lagi!
        </h1>
    </section>

    {{-- Our Courses --}}
    <section id="course"
        class="tablet:min-h-screen flex flex-col justify-center items-center px-[10%] tablet:py-[100px] py-[50px] tablet:gap-20 gap-8 bg-[#fbfbfb]">
        <h1 class="text-[#3171D3] text-center font-montserrat tablet:text-[64px] text-2xl font-extrabold">Our Courses
        </h1>
        <div
            class="flex laptop:flex-row flex-col justify-center items-center laptop:gap-16 tablet:gap-12 gap-8 font-poppins w-full">
            <div id="content"
                class="laptop:order-1 order-2 flex flex-col justify-center laptop:items-start items-center tablet:gap-8 gap-4 w-full">
                <div id="content-desc" class="flex flex-col gap-2 laptop:text-left text-center w-full">
                    <h1 class="tablet:text-[32px] text-[16px] font-bold">Java Programming</h1>
                    <p class="tablet:text-xl text-[11px] font-medium leading-[150%] ">Java Programming merupakan salah satu bahasa pemrograman yang paling dibutuhkan karena sifatnya yang multi platform/universal. Bagi kalian yang tertarik untuk mempelajari bahasa pemrograman ini dapat mengambil <span class='italic'>course</span> Java Programming</p>
                </div>
                <div id="course-region"
                    class="flex tablet:justify-start justify-center items-center tablet:gap-4 gap-2 font-medium tablet:text-sm text-[9px] flex-wrap text-center">
                    <span class="bg-[#DDEEFF] text-[#22539F] rounded-[20px] py-1 px-8">Kemanggisan</span>
                    <span class="bg-[#DDEEFF] text-[#22539F] rounded-[20px] py-1 px-8">Alam Sutera</span>
                </div>
                <div class="flex tablet:gap-4 gap-2 flex-wrap laptop:justify-start justify-center">
                    <div id="java-tab"
                        class="course-active course-tab rounded-[10px] shadow-[4px_6px_30px_rgba(0,0,0,0.2)] tablet:p-4 p-2 cursor-pointer tablet:w-24 tablet:h-24 w-12 h-12 flex justify-center items-center hover:scale-110 transition-all"
                        onclick="courseTab('java')">
                        <img src="{{asset('assets/mainpage/our-courses/tab/java.svg')}}" alt="java programming">
                    </div>
                    <div id="mobile-tab"
                        class="course-tab rounded-[10px] shadow-[4px_6px_30px_rgba(0,0,0,0.2)] tablet:p-4 p-2 cursor-pointer tablet:w-24 tablet:h-24 w-12 h-12 flex justify-center items-center hover:scale-110 transition-all"
                        onclick="courseTab('mobile')">
                        <img src="{{asset('assets/mainpage/our-courses/tab/mobile.svg')}}"
                            alt="mobile application development">
                    </div>
                    <div id="be-tab"
                        class="course-tab rounded-[10px] shadow-[4px_6px_30px_rgba(0,0,0,0.2)] tablet:p-4 p-2 cursor-pointer tablet:w-24 tablet:h-24 w-12 h-12 flex justify-center items-center hover:scale-110 transition-all"
                        onclick="courseTab('be')">
                        <img src="{{asset('assets/mainpage/our-courses/tab/be.svg')}}" alt="back end development">
                    </div>
                    <div id="uiux-tab"
                        class="course-tab rounded-[10px] shadow-[4px_6px_30px_rgba(0,0,0,0.2)] tablet:p-4 p-2 cursor-pointer tablet:w-24 tablet:h-24 w-12 h-12 flex justify-center items-center hover:scale-110 transition-all"
                        onclick="courseTab('uiux')">
                        <img src="{{asset('assets/mainpage/our-courses/tab/uiux.svg')}}" alt="ui/ux design">
                    </div>
                    <div id="fe-tab"
                        class="course-tab rounded-[10px] shadow-[4px_6px_30px_rgba(0,0,0,0.2)] tablet:p-4 p-2 cursor-pointer tablet:w-24 tablet:h-24 w-12 h-12 flex justify-center items-center hover:scale-110 transition-all"
                        onclick="courseTab('fe')">
                        <img src="{{asset('assets/mainpage/our-courses/tab/fe.svg')}}" alt="front end development">
                    </div>
                    <div id="c-tab"
                        class="course-tab rounded-[10px] shadow-[4px_6px_30px_rgba(0,0,0,0.2)] tablet:p-4 p-2 cursor-pointer tablet:w-24 tablet:h-24 w-12 h-12 flex justify-center items-center hover:scale-110 transition-all"
                        onclick="courseTab('c')">
                        <img src="{{asset('assets/mainpage/our-courses/tab/c.svg')}}" alt="c programming">
                    </div>
                </div>
            </div>
            <div id="content-img"
                class="laptop:order-2 order-1 flex-[0_0_30%] flex justify-center items-center tablet:w-full w-1/2">
                <img id="mobile-img" src="{{asset('assets/mainpage/our-courses/mobile.svg')}}"
                    alt="mobile application development" class="hidden">
                <img id="fe-img" src="{{asset('assets/mainpage/our-courses/fe.svg')}}" alt="front end development"
                    class="hidden">
                <img id="be-img" src="{{asset('assets/mainpage/our-courses/be.svg')}}" alt="back end development"
                    class="hidden">
                <img id="java-img" src="{{asset('assets/mainpage/our-courses/java.svg')}}" alt="java programming"
                    >
                <img id="uiux-img" src="{{asset('assets/mainpage/our-courses/uiux.svg')}}" alt="ui ux design"
                    class="hidden">
                <img id="c-img" src="{{asset('assets/mainpage/our-courses/c.svg')}}" alt="c programming" class="hidden">
            </div>
        </div>
    </section>

    {{-- Our Events --}}
    <section id="bncc-events"
        class="tablet:min-h-screen flex flex-col justify-center items-center px-[10%] tablet:py-[100px] py-[50px] tablet:gap-16 gap-8 text-center bg-[#fbfbfb]">
        <h1 class="text-[#3171D3] text-center font-montserrat tablet:text-[64px] text-2xl font-extrabold">Our Events
        </h1>
        <p class="tablet:text-xl text-[11px] font-medium leading-[150%] font-poppins">Selama menjalani <span class="italic">event</span>, tentunya
            kami banyak <span class="font-bold">belajar hal baru</span> dan <span class="font-bold">mendapatkan berbagai pengalaman menarik</span>. Tidak hanya itu saja, kami juga
            <span class="font-bold">membangun <span class="italic">sense of belonging</span></span> di keluarga BNCC <span class="font-bold">melalui <span class="italic">event</span></span> seperti:</p>

        <div class="relative mx-[5%]">
            <div class="mx-[4%] drop-shadow-[4px_6px_30px_rgba(0,0,0,0.15)]">
                <img src="{{asset('assets/mainpage/our-events/carousel/btt1.svg')}}" alt="bncc-techno-talk-I"
                    class="carousel-image rounded-3xl ">
                <img src="{{asset('assets/mainpage/our-events/carousel/btt2.svg')}}" alt="bncc-techno-talk-II"
                    class="carousel-image rounded-3xl hidden">
                <img src="{{asset('assets/mainpage/our-events/carousel/bncc-birthday-party.svg')}}" alt="bncc-birthday-party"
                    class="carousel-image rounded-3xl hidden">
                <img src="{{asset('assets/mainpage/our-events/carousel/developer-workshop.svg?t=150820221930')}}" alt="developer-workshop"
                    class="carousel-image rounded-3xl hidden">
                <img src="{{asset('assets/mainpage/our-events/carousel/bncc-csr.svg')}}" alt="bncc-csr"
                    class="carousel-image rounded-3xl hidden">
                <img src="{{asset('assets/mainpage/our-events/carousel/bncc-webinar-series.svg')}}" alt="bncc-webinar-series"
                    class="carousel-image rounded-3xl hidden">
                <img src="{{asset('assets/mainpage/our-events/carousel/virtual-conference.svg?t=150820221930')}}" alt="virtual-conference"
                    class="carousel-image rounded-3xl hidden">
                <img src="{{asset('assets/mainpage/our-events/carousel/hackathon-5.svg?t=150820221930')}}" alt="hackathon-5.0"
                    class="carousel-image rounded-3xl hidden">
                <img src="{{asset('assets/mainpage/our-events/carousel/company-visit.svg?t=150820221930')}}" alt="company-visit"
                    class="carousel-image rounded-3xl hidden">
            </div>
            <div id="indicator-container"
                class="flex gap-2 laptop:mt-6 tablet:mt-4 mt-2 justify-center transition-all laptop:scale-100 tablet:scale-50 scale-[.40]">
                <div class="carousel-indicator w-20 h-4 bg-[#22539F] rounded-full transition-all cursor-pointer pointer-events-none" onclick="changeImage(this)"></div>
                <div class="carousel-indicator w-4 h-4 bg-[#D7E0E8] rounded-full transition-all cursor-pointer" onclick="changeImage(this)"></div>
                <div class="carousel-indicator w-4 h-4 bg-[#D7E0E8] rounded-full transition-all cursor-pointer" onclick="changeImage(this)"></div>
                <div class="carousel-indicator w-4 h-4 bg-[#D7E0E8] rounded-full transition-all cursor-pointer" onclick="changeImage(this)"></div>
                <div class="carousel-indicator w-4 h-4 bg-[#D7E0E8] rounded-full transition-all cursor-pointer" onclick="changeImage(this)"></div>
                <div class="carousel-indicator w-4 h-4 bg-[#D7E0E8] rounded-full transition-all cursor-pointer" onclick="changeImage(this)"></div>
                <div class="carousel-indicator w-4 h-4 bg-[#D7E0E8] rounded-full transition-all cursor-pointer" onclick="changeImage(this)"></div>
                <div class="carousel-indicator w-4 h-4 bg-[#D7E0E8] rounded-full transition-all cursor-pointer" onclick="changeImage(this)"></div>
                <div class="carousel-indicator w-4 h-4 bg-[#D7E0E8] rounded-full transition-all cursor-pointer" onclick="changeImage(this)"></div>
            </div>
            <span class="absolute right-0 top-0 bottom-0 my-auto rotate-180 drop-shadow-[4px_6px_30px_rgba(0,0,0,0.15)] laptop:w-[5%] tablet:w-[7%] w-[8%] h-full">
                <img src="{{asset('assets/mainpage/our-events/carousel/nav-blue.svg')}}" alt="next-blue"
                    class="peer opacity-0 hover:opacity-100 transition-all z-10 cursor-pointer absolute top-0 bottom-0 my-auto"
                    onclick="nextImage(this)" id="our-event-next-carousel-btn">
                <img src="{{asset('assets/mainpage/our-events/carousel/nav.svg')}}" alt="next"
                    class="peer-hover:opacity-0 transition-all cursor-pointer absolute top-0 bottom-0 my-auto">
            </span>
            <span class="absolute left-0 top-0 bottom-0 my-auto drop-shadow-[4px_6px_30px_rgba(0,0,0,0.15)] laptop:w-[5%] tablet:w-[7%] w-[8%] h-full">
                <img src="{{asset('assets/mainpage/our-events/carousel/nav-blue.svg')}}" alt="next-blue"
                    class="peer opacity-0 hover:opacity-100 transition-all z-10 cursor-pointer absolute top-0 bottom-0 my-auto"
                    onclick="prevImage(this)" id="our-event-prev-carousel-btn">
                <img src="{{asset('assets/mainpage/our-events/carousel/nav.svg')}}" alt="next"
                    class="peer-hover:opacity-0 transition-all cursor-pointer absolute top-0 bottom-0 my-auto">
            </span>
        </div>


        <h1 class="tablet:text-4xl text-[16px] text-black font-poppins font-bold text-center">Dan masih banyak lagi!
        </h1>
    </section>

    {{-- BOS Events --}}
    <section id="bos-events"
        class="min-h-screen flex flex-col justify-center items-center px-[10%] tablet:py-[100px] py-[50px] tablet:gap-24 gap-12 bg-[#fbfbfb]">
        <h1
            class="text-[#3171D3] text-center font-montserrat tablet:text-[64px] text-2xl font-extrabold leading-[125%]">
            BNCC Opening
            Season Events</h1>
        <div class="flex tablet:gap-12 gap-4 text-left flex-wrap items-stretch">
                <div
                    class="flex flex-col justify-between items-start gap-8 shadow-[4px_4px_16px_4px_rgba(157,157,157,0.3)] rounded-[11px] laptop:p-8 tablet:p-6 p-3 flex-[1_1_45%]">
                    <div class="flex flex-col justify-between items-start gap-4">
                        <h1 class="font-montserrat laptop:text-[32px] tablet:text-[22px] text-[12px] font-extrabold">Live Session
                            Q&A</h1>
                        <p class="tablet:text-lg text-[10px] leading-relaxed font-medium font-poppins">Sesi
                            tanya jawab di mana kamu dapat bertanya apa pun seputar organisasi BNCC.</p>
                        <span onclick="lihatJadwal(this)" id="show-qna"
                            class="tablet:text-lg text-[10px] leading-relaxed font-medium font-poppins text-[#00A3FF] cursor-pointer">Klik sini untuk melihat jadwal</span>
                        <div id="qna-schedule"
                            class="flex flex-col tablet:text-lg text-[10px] leading-relaxed font-medium font-poppins hidden">
                            <h2>Senin - Sabtu hingga 7 September 2022<br>19.00 - 22.00 WIB<br>Note: Khusus hari Jumat, Live Session Q&A tidak diadakan.</h2>
                        </div>
                    </div>
                        <a href="https://us06web.zoom.us/j/82894991145?pwd=VDZhODdES0dHVjF0dkQ4NzduU1l5UT09" target="_blank"
                        rel="noreferrer noopener"
                            class="blue-btn w-full text-white rounded-[100px] laptop:py-4 tablet:py-3 py-2 font-poppins font-semibold laptop:text-2xl tablet:text-lg text-[8px] text-center opacity-50 pointer-events-none" disabled>This Event Has Ended</a>
                </div>
                <div
                    class="flex flex-col justify-between items-start gap-8 shadow-[4px_4px_16px_4px_rgba(157,157,157,0.3)] rounded-[11px] laptop:p-8 tablet:p-6 p-3 flex-[1_1_45%]">
                    <div class="flex flex-col justify-between items-start gap-4">

                        <h1 class="font-montserrat laptop:text-[32px] tablet:text-[22px] text-[12px] font-extrabold">Twibbon
                            Challenge</h1>
                        <p class="tablet:text-lg text-[10px] leading-relaxed font-medium font-poppins">
                            Ikuti Twibbon Challenge untuk menunjukkan bahwa kamu akan menjadi bagian dari keluarga BNCC dan
                            dapatkan kesempatan untuk memenangkan berbagai macam hadiah!
                        </p>
                        <p
                            class="tablet:text-lg text-[10px] leading-relaxed font-medium font-poppins text-[#DE3B25]">
                            Berakhir pada 19 September 2022
                        </p>
                    </div>
                    <a href="{{asset('assets/twibbon/Twibbon Challenge Guideline.pdf')}}"
                        class="blue-btn w-full text-white rounded-[100px] laptop:py-4 tablet:py-3 py-2 font-poppins font-semibold laptop:text-2xl tablet:text-lg text-[8px] flex justify-center items-center laptop:gap-4 tablet:gap-3 gap-1" download>
                        <img src="{{asset('assets/mainpage/our-events/download.svg')}}" alt="download"
                            class="laptop:w-auto tablet:w-6 w-3 pointer-events-none">Download Guideline
                        </a>
                </div>
                <div
                    class="flex flex-col justify-between items-start gap-8 shadow-[4px_4px_16px_4px_rgba(157,157,157,0.3)] rounded-[11px] laptop:p-8 tablet:p-6 p-3 flex-[1_1_45%]">
                    <div class="flex flex-col justify-between items-start gap-4">
                        <h1 class="font-montserrat laptop:text-[32px] tablet:text-[22px] text-[12px] font-extrabold">Codesign:
                            UI/UX Design</h1>
                        <p class="tablet:text-lg text-[10px] leading-relaxed font-medium font-poppins">
                            Tingkatkan <span class="italic">skill</span> UI/UX Design mu dari dasar melalui <span class="italic">event workshop</span> yang diadakan secara <span class="italic">online</span>.
                        </p>
                        {{-- <p onclick="lihatJadwal(this)"
                            class="tablet:text-lg text-[10px] leading-relaxed font-medium font-poppins text-[#00A3FF] cursor-pointer">Klik sini untuk melihat jadwal</p> --}}
                        <div id="codesign-uiux-schedule"
                            class="flex flex-col tablet:text-lg text-[10px] leading-relaxed font-medium font-poppins">
                            <h2 >Jumat, 9 September 2022</h2>
                            <h2 >19.00 - 21.00 WIB</h2>
                        </div>
                    </div>
                    <a href="https://bit.ly/codesignregistration" target="_blank" rel="noopener noreferrer"
                        class="flex justify-center items-center blue-btn w-full text-white rounded-[100px] laptop:py-4 tablet:py-3 py-2 font-poppins font-semibold laptop:text-2xl tablet:text-lg text-[8px] opacity-50 pointer-events-none" disabled>This Event Has Ended</a>
                </div>
                <div
                    class="flex flex-col justify-between items-start gap-8 shadow-[4px_4px_16px_4px_rgba(157,157,157,0.3)] rounded-[11px] laptop:p-8 tablet:p-6 p-3 flex-[1_1_45%]">
                    <div class="flex flex-col justify-between items-start gap-4">
                        <h1 class="font-montserrat laptop:text-[32px] tablet:text-[22px] text-[12px] font-extrabold">Codesign:
                            Front-End Development</h1>
                        <p class="tablet:text-lg text-[10px] leading-relaxed font-medium font-poppins">
                            Tingkatkan <span class="italic">skill</span> Front-End Development mu dari dasar melalui <span class="italic">event workshop</span> yang diadakan secara <span class="italic">online</span>.
                        </p>
                        {{-- <p onclick="lihatJadwal(this)"
                            class="tablet:text-lg text-[10px] leading-relaxed font-medium font-poppins text-[#00A3FF] cursor-pointer">Klik sini untuk melihat jadwal</p> --}}
                        <div id="codesign-fe-schedule"
                            class="flex flex-col tablet:text-lg text-[10px] leading-relaxed font-medium font-poppins">
                            <h2 >Sabtu, 10 September 2022</h2>
                            <h2 >19.00 - 21.00 WIB</h2>
                        </div>

                    </div>
                    <a href="https://bit.ly/codesignregistration" target="_blank" rel="noopener noreferrer"
                        class="flex justify-center items-center blue-btn w-full text-white rounded-[100px] laptop:py-4 tablet:py-3 py-2 font-poppins font-semibold laptop:text-2xl tablet:text-lg text-[8px] opacity-50 pointer-events-none" disabled>This Event Has Ended</a>
                </div>
                <div
                    class="flex flex-col justify-between items-start gap-8 shadow-[4px_4px_16px_4px_rgba(157,157,157,0.3)] rounded-[11px] laptop:p-8 tablet:p-6 p-3 flex-[1_1_45%]">
                    <div class="flex flex-col justify-between items-start gap-4">
                        <h1 class="font-montserrat laptop:text-[32px] tablet:text-[22px] text-[12px] font-extrabold">BNCC Expo
                        </h1>
                        <p class="tablet:text-lg text-[10px] leading-relaxed font-medium font-poppins">
                            Sebuah sesi untuk memperkenalkan BNCC kepada mahasiswa baru yang hadir.
                        </p>
                        {{-- <p id="show-expo" onclick="lihatJadwal(this)"
                            class="tablet:text-lg text-[10px] leading-relaxed font-medium font-poppins text-[#00A3FF] cursor-pointer">Klik sini untuk melihat jadwal</p>
                        <div id="expo-schedule"
                            class="flex flex-col tablet:text-lg text-[10px] leading-relaxed font-medium font-poppins hidden">
                            <h2 >Jumat, 5 - 7 September 2022</h2>
                        </div> --}}
                        <div id="expo-schedule"
                            class="flex flex-col tablet:text-lg text-[10px] leading-relaxed font-medium font-poppins">
                            <h2 >5 - 7 September 2022</h2>
                            <h2 >Lantai 4, Binus Anggrek</h2>
                        </div>
                    </div>
                    <a href="https://www.instagram.com/p/CiFouHrrg3m/?igshid=YmMyMTA2M2Y=" target="_blank" rel="noopener noreferrer"
                        class="flex justify-center items-center blue-btn w-full text-white rounded-[100px] laptop:py-4 tablet:py-3 py-2 font-poppins font-semibold laptop:text-2xl tablet:text-lg text-[8px] opacity-50 pointer-events-none" disabled>This Event Has Ended</a>
                </div>


                <div
                    class="flex flex-col justify-between items-start gap-8 shadow-[4px_4px_16px_4px_rgba(157,157,157,0.3)] rounded-[11px] laptop:p-8 tablet:p-6 p-4 flex-[1_1_45%]">
                    <div class="flex flex-col justify-between items-start gap-4">
                        <h1 class="font-montserrat laptop:text-[32px] tablet:text-[22px] text-[12px] font-extrabold">BNCC Launching
                        </h1>
                        <p class="tablet:text-lg text-[10px] leading-relaxed font-medium font-poppins">
                            Event utama dari BNCC Opening Season, di mana kamu dapat mengetahui lebih dalam seputar BNCC dan
                            cara untuk menjadi member BNCC.
                        </p>
                        {{-- <p onclick="lihatJadwal(this)"
                            class="tablet:text-lg text-[10px] leading-relaxed font-medium font-poppins text-[#00A3FF] cursor-pointer">Klik sini untuk melihat jadwal</p>
                        <div id="bncc-launching-schedule"
                            class="flex flex-col tablet:text-lg text-[10px] leading-relaxed font-medium font-poppins hidden">
                            <h2 >15 - 17 September 2022</h2>
                        </div> --}}

                    </div>
                    <a href="{{route('register')}}"
                        class="blue-btn w-full text-white rounded-[100px] laptop:py-4 tablet:py-3 py-2 font-poppins font-semibold laptop:text-2xl tablet:text-lg text-[8px] text-center">Register Now</a>
                </div>
        </div>

    </section>

    <div id="testimonial-faq-sposors" class="flex flex-col">
        {{-- testimonial --}}
        <section id="testimonial"
            class="min-h-screen flex flex-col justify-center items-center px-[10%] tablet:py-[100px] py-[50px] tablet:gap-16 gap-8">
            <h1 class="text-[#3171D3] text-center font-montserrat tablet:text-[64px] text-2xl font-extrabold">
                Testimonial</h1>
            <div class="flex flex-col w-full laptop:gap-16 tablet:gap-10 gap-6">
                <div id="testimonial-person"
                    class="flex tablet:flex-row flex-col laptop:gap-16 gap-8 font-poppins items-center w-full">
                    <img id="jeffershon-img" src="{{asset('assets/mainpage/testimonial/jeffershon-testi.svg')}}"
                        alt="jeffershon" class="laptop:w-1/5 tablet:w-[30%] w-2/5 testimoni-img">
                    <img id="andini-img" src="{{asset('assets/mainpage/testimonial/andini-testi.svg')}}" alt="andini"
                        class="laptop:w-1/5 tablet:w-[30%] w-2/5 testimoni-img hidden">
                    <img id="brian-img" src="{{asset('assets/mainpage/testimonial/brian-testi.svg')}}" alt="brian"
                        class="laptop:w-1/5 tablet:w-[30%] w-2/5 testimoni-img hidden">
                    <img id="tabitha-img" src="{{asset('assets/mainpage/testimonial/tabitha-testi.svg')}}" alt="tabitha"
                        class="laptop:w-1/5 tablet:w-[30%] w-2/5 testimoni-img hidden">
                    <img id="arrick-img" src="{{asset('assets/mainpage/testimonial/arrick-testi.svg')}}" alt="arrick"
                        class="laptop:w-1/5 tablet:w-[30%] w-2/5 testimoni-img hidden">
                    <div class="flex flex-col laptop:gap-4 tablet:gap-3 gap-2 justify-center tablet:text-left text-center">
                        <h1 id="testinomi-name"
                            class="font-bold text-[#0054A5] laptop:text-[40px] tablet:text-[28px] text-[15px]">Jeffershon Dhamma Putra
                        </h1>
                        <p id="testimoni-content"
                            class="font-medium tablet:text-xl text-[10px] leading-[150%]">
                            "Kesan dan pesanku selama di BNCC itu asik banget, bisa <span class="font-bold">menjalin koneksi dengan banyak orang</span> dan <span class="font-bold">kerasa banget solidaritasnya</span>. Banyak hal yang aku dapetin mulai dari <span class="font-bold"><span class="italic">soft skill</span> dimana sekarang aku sudah semakin PD buat ngomong ke publik</span>, serta <span class="font-bold"><span class="italic">hard skill</span> mulai dari <span class="italic">coding, design,</span></span> dan lainnya. Menurut aku B26 harus banget sih join UKM BNCC karena bisa dapat banyak banget <span class="italic">benefit</span> yang aku rasa agak sulit didapatkan di tempat lain, pokoknya <span class="italic">worth it</span> banget!"</p>
                    </div>
                </div>
                <div class="flex justify-center laptop:gap-16 tablet:gap-8 gap-2 w-full flex-wrap">
                    <img id="jeffershon" src="{{asset('assets/mainpage/testimonial/jeffershon-testi.svg')}}"
                        alt="jeffershon"
                        class="testimoni-tab pointer-events-none laptop:w-32 tablet:w-20 w-12 cursor-pointer transition-all hover:saturate-100"
                        onclick="changeTestimonial(this)">
                    <img id="Andini" src="{{asset('assets/mainpage/testimonial/andini-testi.svg')}}" alt="Andini"
                        class="testimoni-tab saturate-0 laptop:w-32 tablet:w-20 w-12 cursor-pointer transition-all hover:saturate-100"
                        onclick="changeTestimonial(this)">
                    <img id="Arrick" src="{{asset('assets/mainpage/testimonial/arrick-testi.svg')}}" alt="Arrick"
                        class="testimoni-tab saturate-0 laptop:w-32 tablet:w-20 w-12 cursor-pointer transition-all hover:saturate-100"
                        onclick="changeTestimonial(this)">
                    <img id="Tabitha" src="{{asset('assets/mainpage/testimonial/tabitha-testi.svg')}}" alt="Tabitha"
                        class="testimoni-tab saturate-0 laptop:w-32 tablet:w-20 w-12 cursor-pointer transition-all hover:saturate-100"
                        onclick="changeTestimonial(this)">
                    <img id="Brian" src="{{asset('assets/mainpage/testimonial/brian-testi.svg')}}" alt="Brian"
                        class="testimoni-tab saturate-0 laptop:w-32 tablet:w-20 w-12 cursor-pointer transition-all hover:saturate-100"
                        onclick="changeTestimonial(this)">
                </div>
            </div>
        </section>

        {{-- FAQ --}}
        <section id="faq"
            class="tablet:min-h-screen flex flex-col justify-start items-center px-[10%] tablet:py-[100px] py-[50px] tablet:gap-16 gap-8 ">
            <h1
                class="text-[#3171D3] text-center font-montserrat tablet:text-[64px] text-2xl font-extrabold leading-[125%]">
                Frequently Asked Questions</h1>
            <div class="flex flex-col w-full items-center justify-start tablet:gap-4 gap-3 font-poppins h-full">
                <div class="flex flex-col w-full">
                    <button id="accordion"
                        class="relative z-10 accordion-item flex justify-between items-center bg-[#fbfbfb] laptop:rounded-[15px] tablet:rounded-[11px] rounded-[5px]  shadow-[3px_3px_12px_#D7E0E8] laptop:px-8 tablet:px-6 px-4 laptop:py-6 tablet:py-5 py-3 w-full"
                        type="button" onclick="toggleAccordion(this)">
                        <span class="text-[#3171D3] text-left laptop:text-2xl tablet:text-lg text-[9px] font-bold">Apa itu Bina Nusantara Computer Club (BNCC)?</span>
                        <img src="{{asset('assets/mainpage/faq/plus.svg')}}" alt="+"
                            class="transition-all laptop:w-auto tablet:w-6 w-3   ">
                    </button>
                    <p
                        class="shadow-[3px_3px_12px_#D7E0E8] font-medium laptop:text-2xl tablet:text-lg text-[9px] text-[#3171D3] bg-[#fbfbfb]/70 laptop:rounded-b-[15px] tablet:rounded-b-[11px] rounded-b-[5px] laptop:px-8 tablet:px-6 px-4 laptop:py-7 tablet:py-6 py-3 w-full laptop:leading-10 tablet:leading-[30px] leading-[13.5px] laptop:mt-[-12px] tablet:mt-[-6px] mt-[-3px] hidden">
                        Bina Nusantara Computer Club (BNCC) merupakan organisasi kemahasiswaan di BINUS yang sudah berdiri selama lebih dari 33 tahun. BNCC sendiri merupakan organisasi yang bergerak di bidang seputar komputer dan teknologi.
                    </p>
                </div>
                <div class="flex flex-col w-full">
                    <button id="accordion"
                        class="relative z-10 accordion-item flex justify-between items-center bg-[#fbfbfb] laptop:rounded-[15px] tablet:rounded-[11px] rounded-[5px]  shadow-[3px_3px_12px_#D7E0E8] laptop:px-8 tablet:px-6 px-4 laptop:py-6 tablet:py-5 py-3 w-full"
                        type="button" onclick="toggleAccordion(this)">
                        <span class="text-[#3171D3] text-left laptop:text-2xl tablet:text-lg text-[9px] font-bold">Apa benefit yang kamu bisa dapat dari bergabung di BNCC?</span>
                        <img src="{{asset('assets/mainpage/faq/plus.svg')}}" alt="+"
                            class="transition-all laptop:w-auto tablet:w-6 w-3   ">
                    </button>
                    <p
                        class="shadow-[3px_3px_12px_#D7E0E8] font-medium laptop:text-2xl tablet:text-lg text-[9px] text-[#3171D3] bg-[#fbfbfb]/70 laptop:rounded-b-[15px] tablet:rounded-b-[11px] rounded-b-[5px] laptop:px-8 tablet:px-6 px-4 laptop:py-7 tablet:py-6 py-3 w-full laptop:leading-10 tablet:leading-[30px] leading-[13.5px] laptop:mt-[-12px] tablet:mt-[-6px] mt-[-3px] hidden">
                        Kamu bisa mendapatkan pengetahuan di bidang <span class="italic">hard skill</span> dan <span class="italic">soft skill</span>, pengalaman berorganisasi, dan tentunya <span class="italic">networking</span>.
                    </p>
                </div>
                <div class="flex flex-col w-full">
                    <button id="accordion"
                        class="relative z-10 accordion-item flex justify-between items-center bg-[#fbfbfb] laptop:rounded-[15px] tablet:rounded-[11px] rounded-[5px]  shadow-[3px_3px_12px_#D7E0E8] laptop:px-8 tablet:px-6 px-4 laptop:py-6 tablet:py-5 py-3 w-full"
                        type="button" onclick="toggleAccordion(this)">
                        <span class="text-[#3171D3] text-left laptop:text-2xl tablet:text-lg text-[9px] font-bold">Apakah mendaftar BNCC harus dari jurusan tertentu?</span>
                        <img src="{{asset('assets/mainpage/faq/plus.svg')}}" alt="+"
                            class="transition-all laptop:w-auto tablet:w-6 w-3   ">
                    </button>
                    <p
                        class="shadow-[3px_3px_12px_#D7E0E8] font-medium laptop:text-2xl tablet:text-lg text-[9px] text-[#3171D3] bg-[#fbfbfb]/70 laptop:rounded-b-[15px] tablet:rounded-b-[11px] rounded-b-[5px] laptop:px-8 tablet:px-6 px-4 laptop:py-7 tablet:py-6 py-3 w-full laptop:leading-10 tablet:leading-[30px] leading-[13.5px] laptop:mt-[-12px] tablet:mt-[-6px] mt-[-3px] hidden">
                        Tidak harus, semua jurusan dapat bergabung menjadi member BNCC.
                    </p>
                </div>
                <div class="flex flex-col w-full">
                    <button id="accordion"
                        class="relative z-10 accordion-item flex justify-between items-center bg-[#fbfbfb] laptop:rounded-[15px] tablet:rounded-[11px] rounded-[5px]  shadow-[3px_3px_12px_#D7E0E8] laptop:px-8 tablet:px-6 px-4 laptop:py-6 tablet:py-5 py-3 w-full"
                        type="button" onclick="toggleAccordion(this)">
                        <span class="text-[#3171D3] text-left laptop:text-2xl tablet:text-lg text-[9px] font-bold">BNCC ada di region mana aja?</span>
                        <img src="{{asset('assets/mainpage/faq/plus.svg')}}" alt="+"
                            class="transition-all laptop:w-auto tablet:w-6 w-3   ">
                    </button>
                    <p
                        class="shadow-[3px_3px_12px_#D7E0E8] font-medium laptop:text-2xl tablet:text-lg text-[9px] text-[#3171D3] bg-[#fbfbfb]/70 laptop:rounded-b-[15px] tablet:rounded-b-[11px] rounded-b-[5px] laptop:px-8 tablet:px-6 px-4 laptop:py-7 tablet:py-6 py-3 w-full laptop:leading-10 tablet:leading-[30px] leading-[13.5px] laptop:mt-[-12px] tablet:mt-[-6px] mt-[-3px] hidden">
                        Untuk saat ini, BNCC terdapat 4 region, yaitu Kemanggisan, Bandung, Malang dan Alam Sutera.
                    </p>
                </div>
                <div class="flex flex-col w-full">
                    <button id="accordion"
                        class="relative z-10 accordion-item flex justify-between items-center bg-[#fbfbfb] laptop:rounded-[15px] tablet:rounded-[11px] rounded-[5px]  shadow-[3px_3px_12px_#D7E0E8] laptop:px-8 tablet:px-6 px-4 laptop:py-6 tablet:py-5 py-3 w-full"
                        type="button" onclick="toggleAccordion(this)">
                        <span class="text-[#3171D3] text-left laptop:text-2xl tablet:text-lg text-[9px] font-bold">Apa itu Learning and Training?</span>
                        <img src="{{asset('assets/mainpage/faq/plus.svg')}}" alt="+"
                            class="transition-all laptop:w-auto tablet:w-6 w-3   ">
                    </button>
                    <p
                        class="shadow-[3px_3px_12px_#D7E0E8] font-medium laptop:text-2xl tablet:text-lg text-[9px] text-[#3171D3] bg-[#fbfbfb]/70 laptop:rounded-b-[15px] tablet:rounded-b-[11px] rounded-b-[5px] laptop:px-8 tablet:px-6 px-4 laptop:py-7 tablet:py-6 py-3 w-full laptop:leading-10 tablet:leading-[30px] leading-[13.5px] laptop:mt-[-12px] tablet:mt-[-6px] mt-[-3px] hidden">
                        LnT merupakan learning course yang ditawarkan oleh BNCC. Di LnT, kamu dapat mempelajari dan meningkatkan <span class="italic">hard skill</span> di bidang IT seperti mempelajari:<br>
                        - UI/UX Design<br>
                        - Front-End development<br>
                        - Back-End development<br>
                        - Mobile Application<br>
                        - Java Programming<br>
                        - C Programming<br>
                    </p>
                </div>
                <div class="flex flex-col w-full">
                    <button id="accordion"
                        class="relative z-10 accordion-item flex justify-between items-center bg-[#fbfbfb] laptop:rounded-[15px] tablet:rounded-[11px] rounded-[5px]  shadow-[3px_3px_12px_#D7E0E8] laptop:px-8 tablet:px-6 px-4 laptop:py-6 tablet:py-5 py-3 w-full"
                        type="button" onclick="toggleAccordion(this)">
                        <span class="text-[#3171D3] text-left laptop:text-2xl tablet:text-lg text-[9px] font-bold">Bagaimana sistem pembagian kelas LnT?</span>
                        <img src="{{asset('assets/mainpage/faq/plus.svg')}}" alt="+"
                            class="transition-all laptop:w-auto tablet:w-6 w-3   ">
                    </button>
                    <p
                        class="shadow-[3px_3px_12px_#D7E0E8] font-medium laptop:text-2xl tablet:text-lg text-[9px] text-[#3171D3] bg-[#fbfbfb]/70 laptop:rounded-b-[15px] tablet:rounded-b-[11px] rounded-b-[5px] laptop:px-8 tablet:px-6 px-4 laptop:py-7 tablet:py-6 py-3 w-full laptop:leading-10 tablet:leading-[30px] leading-[13.5px] laptop:mt-[-12px] tablet:mt-[-6px] mt-[-3px] hidden">
                        Pembagian kelas akan disesuaikan dengan pilihan materi dan jadwal member serta pengajar.
                    </p>
                </div>
                <div class="flex flex-col w-full">
                    <button id="accordion"
                        class="relative z-10 accordion-item flex justify-between items-center bg-[#fbfbfb] laptop:rounded-[15px] tablet:rounded-[11px] rounded-[5px]  shadow-[3px_3px_12px_#D7E0E8] laptop:px-8 tablet:px-6 px-4 laptop:py-6 tablet:py-5 py-3 w-full"
                        type="button" onclick="toggleAccordion(this)">
                        <span class="text-[#3171D3] text-left laptop:text-2xl tablet:text-lg text-[9px] font-bold">Bagaimana jadwal kelas LnT?</span>
                        <img src="{{asset('assets/mainpage/faq/plus.svg')}}" alt="+"
                            class="transition-all laptop:w-auto tablet:w-6 w-3   ">
                    </button>
                    <p
                        class="shadow-[3px_3px_12px_#D7E0E8] font-medium laptop:text-2xl tablet:text-lg text-[9px] text-[#3171D3] bg-[#fbfbfb]/70 laptop:rounded-b-[15px] tablet:rounded-b-[11px] rounded-b-[5px] laptop:px-8 tablet:px-6 px-4 laptop:py-7 tablet:py-6 py-3 w-full laptop:leading-10 tablet:leading-[30px] leading-[13.5px] laptop:mt-[-12px] tablet:mt-[-6px] mt-[-3px] hidden">
                        Pemilihan jadwal dapat didiskusikan dengan member dan pengajar sehingga jadwal tidak akan bentrok dengan perkuliahan.
                    </p>
                </div>
                <div class="flex flex-col w-full">
                    <button id="accordion"
                        class="relative z-10 accordion-item flex justify-between items-center bg-[#fbfbfb] laptop:rounded-[15px] tablet:rounded-[11px] rounded-[5px] shadow-[3px_3px_12px_#D7E0E8] laptop:px-8 tablet:px-6 px-4 laptop:py-6 tablet:py-5 py-3 w-full"
                        type="button" onclick="toggleAccordion(this)">
                        <span class="text-[#3171D3] text-left laptop:text-2xl tablet:text-lg text-[9px] font-bold">Apa itu BNCC Opening Season (BOS)?</span>
                        <img src="{{asset('assets/mainpage/faq/plus.svg')}}" alt="+"
                            class="transition-all laptop:w-auto tablet:w-6 w-3   ">
                    </button>
                    <p
                        class="shadow-[3px_3px_12px_#D7E0E8] font-medium laptop:text-2xl tablet:text-lg text-[9px] text-[#3171D3] bg-[#fbfbfb]/70 laptop:rounded-b-[15px] tablet:rounded-b-[11px] rounded-b-[5px] laptop:px-8 tablet:px-6 px-4 laptop:py-7 tablet:py-6 py-3 w-full laptop:leading-10 tablet:leading-[30px] leading-[13.5px] laptop:mt-[-12px] tablet:mt-[-6px] mt-[-3px] hidden">
                        BNCC Opening Season (BOS) merupakan acara dimana kamu akan mendapatkan pengetahuan seputar apa itu BNCC, apa saja <span class="italic">benefit</span> yang ada di BNCC dan bagaimana kamu bisa bergabung di BNCC.
                    </p>
                </div>
        </section>

        {{-- our sponsors --}}
        <section id="sponsors"
            class="tablet:min-h-screen flex flex-col justify-center items-center px-[10%] tablet:pt-[100px] pt-[50px] tablet:gap-16 gap-8 pb-[40%]">
            {{-- background --}}
            <img src="{{asset('assets/mainpage/background/sponsor-stars.svg')}}" alt="sponsor-stars"
                class="absolute top-0 w-full pointer-events-none object-cover">

            <div class="w-full h-full flex  flex-col justify-center items-center font-poppins laptop:gap-32 tablet:gap-16 gap-8">
                <h1
                    class="text-[#fbfbfb] text-center font-montserrat tablet:text-[64px] text-2xl font-extrabold leading-[125%]">
                    Our Sponsors</h1>
                {{-- <img src="{{asset('assets/mainpage/sponsors/comingsoon.svg')}}" alt="comingsoon"> --}}

                {{-- platinum sponsor --}}
                <div id="platinum-sponsor" class="shadow-[4px_4px_16px_4px_rgba(157,157,157,0.3)] w-full flex flex-col laptop:gap-20 tablet:gap-10 gap-5 justify-center items-center bg-white laptop:rounded-[56px] tablet:rounded-[34px] rounded-[16px] laptop:py-20 tablet:py-16 py-8 laptop:px-28 tablet:px-20 px-12">
                    <h1 class="text-[#004E99] font-semibold laptop:text-[40px] tablet:text-2xl text-sm text-center">Platinum Sponsor</h1>
                    <div class="w-full flex justify-center items-center">
                        <a href="http://intel.co.id/LaptopsEvolved" target="_blank" rel="noreferrer noopener"><img src="{{asset('assets/logo-sponsor/intel-evo.svg')}}" alt="intel-evo-logo"></a>
                    </div>
                </div>

                {{-- gold sponsor --}}
                <div id="gold-sponsor" class="shadow-[4px_4px_16px_4px_rgba(157,157,157,0.3)] w-full flex flex-col laptop:gap-20 tablet:gap-10 gap-5 justify-center items-center bg-white laptop:rounded-[56px] tablet:rounded-[34px] rounded-[16px] laptop:py-20 tablet:py-16 py-8 laptop:px-28 tablet:px-12 px-8">
                    <h1 class="text-[#004E99] font-semibold laptop:text-[40px] tablet:text-2xl text-sm text-center">Gold Sponsor</h1>
                    <div class="w-full flex flex-col justify-center items-center laptop:gap-32 tablet:gap-16 gap-8">
                        <div class="flex w-full justify-center items-center laptop:gap-32 tablet:gap-16 gap-8">
                            <a href="https://www.logitech.com/id-id" target="_blank" rel="noreferrer noopener"><img src="{{asset('assets/logo-sponsor/logitech.svg')}}" alt="logitech-logo"></a>
                            <a href="https://www.cermati.com/" target="_blank" rel="noreferrer noopener"><img src="{{asset('assets/logo-sponsor/cermati.svg')}}" alt="cermati-logo"></a>
                        </div>
                        <div class="flex w-full justify-center items-center laptop:gap-32 tablet:gap-16 gap-8">
                            <a href="https://www.biznetgio.com" target="_blank" rel="noreferrer noopener"><img src="{{asset('assets/logo-sponsor/biznet-giocloud.svg')}}" alt="biznet-giocloud-logo"></a>
                          <a href="https://dqlab.id/" target="_blank" rel="noreferrer noopener"><img src="{{asset('assets/logo-sponsor/dq-lab.svg')}}" alt="dq-lab-logo"></a>
                        </div>
                    </div>
                </div>

                {{-- silver sponsor --}}
                <div id="silver-sponsor" class="shadow-[4px_4px_16px_4px_rgba(157,157,157,0.3)] w-full flex flex-col laptop:gap-20 tablet:gap-10 gap-5 justify-center items-center bg-white laptop:rounded-[56px] tablet:rounded-[34px] rounded-[16px] laptop:py-20 tablet:py-16 py-8 laptop:px-16 tablet:px-12 px-6">
                    <h1 class="text-[#004E99] font-semibold laptop:text-[40px] tablet:text-2xl text-sm text-center">Silver Sponsor</h1>
                    <div class="w-full flex justify-center items-center laptop:gap-16 tablet:gap-8 gap-4">
                        <a href="https://www.instagram.com/klinikutamakmc/" target="_blank" rel="noreferrer noopener"><img src="{{asset('assets/logo-sponsor/klinik-utama-kemanggisan-medical-center.svg')}}" alt="klinik-utama-kemanggisan-medical-center-logo"></a>
                        <a href="https://www.superindo.co.id/karir/" target="_blank" rel="noreferrer noopener"><img src="{{asset('assets/logo-sponsor/super-indo.svg?t=030920222254')}}" alt="super-indo-logo"></a>
                        <a href="https://kulkul.tech/" target="_blank" rel="noreferrer noopener"><img src="{{asset('assets/logo-sponsor/kulkul.svg')}}" alt="kulkul-logo"></a>
                        <a href="https://www.instagram.com/portal.coffee/" target="_blank" rel="noreferrer noopener"><img src="{{asset('assets/logo-sponsor/portal.svg')}}" alt="portal-logo"></a>
                        <a href="https://www.instagram.com/foodlah.id/" target="_blank" rel="noreferrer noopener"><img src="{{asset('assets/logo-sponsor/food-lah.svg?t=030920222254')}}" alt="foodlah-logo"></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- footer --}}
    <footer id="footer"
        class="laptop:min-h-screen flex flex-col justify-end items-center desktop:gap-64 laptop:gap-32 tablet:gap-16 gap-8 text-center relative">
        {{-- background --}}
        {{-- <div class="absolute w-full h-full"
            style="background: url({{asset('assets/mainpage/background/footer-sponsor.svg')}}) no-repeat center; background-size: auto;">
        </div> --}}
        <img src="{{asset('assets/mainpage/background/footer-sponsor-rock.svg')}}" alt=""
            class="absolute bottom-0 w-full object-cover">

        <div class="w-full flex flex-col px-[10%] laptop:gap-16 tablet:gap-10 gap-4 z-[100]">
            <h1
                class="text-[#fbfbfb] text-center font-montserrat laptop:text-5xl tablet:text-[28px] text-xs font-extrabold leading-[125%]">
                Got a question? Contact us!</h1>
                {{-- <div class="flex font-poppins text-white laptop:text-[24px] tablet:text-[14px] text-[8px] justify-center items-center laptop:gap-32 tablet:gap-16 gap-8">
                    <div class="flex flex-col laptop:gap-3 tablet:gap-1.5 gap-0.5 items-center font-medium justify-center">
                            <h1 class="laptop:text-[40px] tablet:text-[24px] text-[10px] font-semibold">Audrey</h1>
                            <div class="flex laptop:gap-3 tablet:gap-2 gap-1 justify-center items-center">
                                <img class="laptop:w-auto tablet:w-3 w-2"
                                    src="{{asset('assets/mainpage/footer/whatsapp.svg')}}" alt="whatsapp-icon">
                                <h2>085173171809</h2>
                            </div>
                            <div class="flex laptop:gap-3 tablet:gap-1.5 gap-1 justify-center items-center">
                                <img class="laptop:w-auto tablet:w-3 w-2"
                                    src="{{asset('assets/mainpage/footer/line.svg')}}" alt="line-icon">
                                <h2>dreyelvia</h2>
                            </div>
                        </div>
                        <div class="flex flex-col laptop:gap-3 tablet:gap-1.5 gap-0.5 items-center font-medium justify-center">
                                <h1 class="laptop:text-[40px] tablet:text-[24px] text-[10px] font-semibold">Vaness</h1>
                                <div class="flex laptop:gap-3 tablet:gap-2 gap-1 justify-center items-center">
                                    <img class="laptop:w-auto tablet:w-3 w-2"
                                        src="{{asset('assets/mainpage/footer/whatsapp.svg')}}" alt="whatsapp-icon">
                                    <h2>085159661361</h2>
                                </div>
                                <div class="flex laptop:gap-3 tablet:gap-2 gap-1 justify-center items-center">
                                    <img class="laptop:w-auto tablet:w-3 w-2"
                                        src="{{asset('assets/mainpage/footer/line.svg')}}" alt="line-icon">
                                    <h2>vvvnnnsss</h2>
                                </div>

                            </div>
                </div> --}}
            <div
                class="flex font-poppins text-white laptop:text-[22px] tablet:text-[13px] text-[7px] justify-between item-center w-full flex-wrap">
                <div class="flex flex-col laptop:gap-8 tablet:gap-4 gap-2">
                    <h1 class="font-bold ">Kemanggisan</h1>
                    <div class="flex flex-col laptop:gap-12 tablet:gap-8 gap-4">
                        <div class="flex flex-col laptop:gap-3 tablet:gap-1.5 gap-0.5 items-start font-medium">
                            <h1>Audrey</h1>
                            <div class="flex laptop:gap-3 tablet:gap-2 gap-1 justify-center items-center">
                                <img class="laptop:w-auto tablet:w-3 w-2"
                                    src="{{asset('assets/mainpage/footer/whatsapp.svg')}}" alt="whatsapp-icon">
                                <h2>085173171809</h2>
                            </div>
                            <div class="flex laptop:gap-3 tablet:gap-1.5 gap-1 justify-center items-center">
                                <img class="laptop:w-auto tablet:w-3 w-2"
                                    src="{{asset('assets/mainpage/footer/line.svg')}}" alt="line-icon">
                                <h2>dreyelvia</h2>
                            </div>
                        </div>
                        <div class="flex flex-col laptop:gap-3 tablet:gap-2 gap-0.5 items-start font-medium">
                            <h1>Vaness</h1>
                            <div class="flex laptop:gap-3 tablet:gap-2 gap-1 justify-center items-center">
                                <img class="laptop:w-auto tablet:w-3 w-2"
                                    src="{{asset('assets/mainpage/footer/whatsapp.svg')}}" alt="whatsapp-icon">
                                <h2>085159661361</h2>
                            </div>
                            <div class="flex laptop:gap-3 tablet:gap-2 gap-1 justify-center items-center">
                                <img class="laptop:w-auto tablet:w-3 w-2"
                                    src="{{asset('assets/mainpage/footer/line.svg')}}" alt="line-icon">
                                <h2>vvvnnnsss</h2>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col laptop:gap-8 tablet:gap-4 gap-2">
                    <h1 class="font-bold ">Alam Sutera</h1>
                    <div class="flex flex-col laptop:gap-12 tablet:gap-8 gap-4">
                        <div class="flex flex-col laptop:gap-3 tablet:gap-1.5 gap-0.5 items-start font-medium">
                            <h1>Marvel</h1>
                            <div class="flex laptop:gap-3 tablet:gap-2 gap-1 justify-center items-center">
                                <img class="laptop:w-auto tablet:w-3 w-2"
                                    src="{{asset('assets/mainpage/footer/whatsapp.svg')}}" alt="whatsapp-icon">
                                <h2>081546468800</h2>
                            </div>
                            <div class="flex laptop:gap-3 tablet:gap-1.5 gap-1 justify-center items-center">
                                <img class="laptop:w-auto tablet:w-3 w-2"
                                    src="{{asset('assets/mainpage/footer/line.svg')}}" alt="line-icon">
                                <h2>mosesgod</h2>
                            </div>
                        </div>
                        <div class="flex flex-col laptop:gap-3 tablet:gap-2 gap-0.5 items-start font-medium">
                            <h1>Adham</h1>
                            <div class="flex laptop:gap-3 tablet:gap-2 gap-1 justify-center items-center">
                                <img class="laptop:w-auto tablet:w-3 w-2"
                                    src="{{asset('assets/mainpage/footer/whatsapp.svg')}}" alt="whatsapp-icon">
                                <h2>082116171315</h2>
                            </div>
                            <div class="flex laptop:gap-3 tablet:gap-2 gap-1 justify-center items-center">
                                <img class="laptop:w-auto tablet:w-3 w-2"
                                    src="{{asset('assets/mainpage/footer/line.svg')}}" alt="line-icon">
                                <h2>mifth20</h2>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col laptop:gap-8 tablet:gap-4 gap-2">
                    <h1 class="font-bold ">Malang</h1>
                    <div class="flex flex-col laptop:gap-12 tablet:gap-8 gap-4">
                        <div class="flex flex-col laptop:gap-3 tablet:gap-1.5 gap-0.5 items-start font-medium">
                            <h1>Muh. Rizal</h1>
                            <div class="flex laptop:gap-3 tablet:gap-2 gap-1 justify-center items-center">
                                <img class="laptop:w-auto tablet:w-3 w-2"
                                    src="{{asset('assets/mainpage/footer/whatsapp.svg')}}" alt="whatsapp-icon">
                                <h2>08122253036</h2>
                            </div>
                            <div class="flex laptop:gap-3 tablet:gap-1.5 gap-1 justify-center items-center">
                                <img class="laptop:w-auto tablet:w-3 w-2"
                                    src="{{asset('assets/mainpage/footer/line.svg')}}" alt="line-icon">
                                <h2>ikowcool</h2>
                            </div>
                        </div>
                        <div class="flex flex-col laptop:gap-3 tablet:gap-2 gap-0.5 items-start font-medium">
                            <h1>Celine</h1>
                            <div class="flex laptop:gap-3 tablet:gap-2 gap-1 justify-center items-center">
                                <img class="laptop:w-auto tablet:w-3 w-2"
                                    src="{{asset('assets/mainpage/footer/whatsapp.svg')}}" alt="whatsapp-icon">
                                <h2>081252323650</h2>
                            </div>
                            <div class="flex laptop:gap-3 tablet:gap-2 gap-1 justify-center items-center">
                                <img class="laptop:w-auto tablet:w-3 w-2"
                                    src="{{asset('assets/mainpage/footer/line.svg')}}" alt="line-icon">
                                <h2>cmp123</h2>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="flex flex-col laptop:gap-8 tablet:gap-4 gap-2">
                    <h1 class="font-bold ">Bandung</h1>
                    <div class="flex flex-col laptop:gap-12 tablet:gap-8 gap-4">
                        <div class="flex flex-col laptop:gap-3 tablet:gap-1.5 gap-0.5 items-start font-medium">
                            <h1>Nadya L</h1>
                            <div class="flex laptop:gap-3 tablet:gap-2 gap-1 justify-center items-center">
                                <img class="laptop:w-auto tablet:w-3 w-2"
                                    src="{{asset('assets/mainpage/footer/whatsapp.svg')}}" alt="whatsapp-icon">
                                <h2>082136764859</h2>
                            </div>
                            <div class="flex laptop:gap-3 tablet:gap-1.5 gap-1 justify-center items-center">
                                <img class="laptop:w-auto tablet:w-3 w-2"
                                    src="{{asset('assets/mainpage/footer/line.svg')}}" alt="line-icon">
                                <h2>ndy.fa</h2>
                            </div>
                        </div>
                        <div class="flex flex-col laptop:gap-3 tablet:gap-2 gap-0.5 items-start font-medium">
                            <h1>Charissa</h1>
                            <div class="flex laptop:gap-3 tablet:gap-2 gap-1 justify-center items-center">
                                <img class="laptop:w-auto tablet:w-3 w-2"
                                    src="{{asset('assets/mainpage/footer/whatsapp.svg')}}" alt="whatsapp-icon">
                                <h2>081802228681</h2>
                            </div>
                            <div class="flex laptop:gap-3 tablet:gap-2 gap-1 justify-center items-center">
                                <img class="laptop:w-auto tablet:w-3 w-2"
                                    src="{{asset('assets/mainpage/footer/line.svg')}}" alt="line-icon">
                                <h2>charissa_jeanette</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="flex flex-col laptop:gap-8 tablet:gap-4 gap-2 w-full px-[5%] font-poppins z-[100] tablet:pb-[100px] pb-[10%]">
            <div class="flex justify-between items-end w-full font-poppins laptop:gap-8 gap-4">
                <div class="flex-initial">
                    <img src="{{asset('assets/mainpage/footer/binus.svg')}}" alt="binus-logo">
                </div>
                <div class="flex flex-col laptop:gap-4 tablet:gap-2 gap-1 flex-none">
                    <h1 class="text-white font-medium laptop:text-[30px] tablet:text-[17px] text-[8px]">Check our Social
                        Media:</h1>
                    <div
                        class="social flex items-center justify-center laptop:gap-4 tablet:gap-2 gap-1 flex-wrap w-full">
                        <a href="https://www.instagram.com/bnccbinus/" target="_blank" rel="noreferrer noopener"
                            class="hover:drop-shadow-[0_0_3px_white]">
                            <img src="{{asset('assets/mainpage/footer/instagram.svg')}}" alt="instagram-logo"
                                class="laptop:w-auto tablet:w-10 w-5"></a>
                        <a href="https://www.linkedin.com/company/bina-nusantara-computer-club/" target="_blank"
                            rel="noreferrer noopener" class="hover:drop-shadow-[0_0_3px_white]"><span><img
                                    src="{{asset('assets/mainpage/footer/linkedin.svg')}}" alt="linkedin"
                                    class="laptop:w-auto tablet:w-10 w-5"></span></a>
                        <a href="https://www.youtube.com/channel/UC0BND4Aekeg90GQ1_ZX79Yw/videos?app=desktop"
                            target="_blank" rel="noreferrer noopener"
                            class="hover:drop-shadow-[0_0_3px_white]"><span><img
                                    src="{{asset('assets/mainpage/footer/youtube.svg')}}" alt="youtube"
                                    class="laptop:w-auto tablet:w-10 w-5"></span></a>
                        <a href="https://twitter.com/bncc_binus" target="_blank" rel="noreferrer noopener"
                            class="hover:drop-shadow-[0_0_3px_white]"><span><img
                                    src="{{asset('assets/mainpage/footer/twitter.svg')}}" alt="twitter"
                                    class="laptop:w-auto tablet:w-10 w-5"></span></a>
                        <a href="https://web.facebook.com/bina.nusantara.computer.club/" target="_blank"
                            rel="noreferrer noopener" class="hover:drop-shadow-[0_0_3px_white]"><span><img
                                    src="{{asset('assets/mainpage/footer/facebook.svg')}}" alt="facebook"
                                    class="laptop:w-auto tablet:w-10 w-5"></span></a>
                    </div>
                </div>
                <div class="flex-initial">
                    <img src="{{asset('assets/mainpage/footer/partners.svg')}}" alt="gojek-tiket.com-logo"
                        class="flex-initial">
                </div>
            </div>
            <hr class="border-[#fbfbfb] tabetl:border-2 border-1 w-full">
            <div
                class="w-full flex justify-start text-[#fbfbfb] laptop:text-[22px] tablet:text-[14px] text-[6px] font-medium fontpo">
                <span>All Right Reserved BNCC 2022 &copy; Bina Nusantara Computer Club</span>
            </div>
        </div>
    </footer>

    <script src="{{asset('js/mainpage.js?t=150920221037')}}""></script>
</body>
</html>
