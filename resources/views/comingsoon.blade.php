<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="server-countdown" content="{{$serverCountdown}}">
    <title>BNCC Opening Season 2022</title>
    <link rel="stylesheet" href="{{asset('css/comingsoon.css?t=140820222239')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon/favicon.svg?t=270720221356')}}">
</head>

<body class="min-h-screen font-montserrat">
    @if(!$errors->any() && session('post_status') !== null && session('post_status') === 0)
    <section id="newsletter-popup-success"
        class="bg-[#25A7DE] py-4 px-10 fixed justify-between items-center w-full z-[1000] flex text-white font-medium animate-slide-in-top gap-4">
        <h1 class="w-full font-poppins">Email-mu berhasil ditambahkan. Kami akan segera mengirimkan informasi
            terbarunya!</h1>
        <img src="{{asset('assets/icon/x.svg?t=270720221356')}}" alt="x" class="w-7 h-7 cursor-pointer"
            id="newsletter-x-success?t=270720221356" onclick="deleteSuccess()">

    </section>
    @endif

    {{-- invalid email --}}
    <section id="newsletter-popup-failed"
        class="bg-[#DE3B25] py-4 px-10 fixed justify-between items-center w-full z-[1000] font-medium gap-4 text-white hidden">
        <h1 class="w-full font-poppins">Email-mu tidak berhasil ditambahkan. Masukkan kembali email kamu agar tidak
            ketinggalan
            informasi terbarunya!</h1>

        <img src="{{asset('assets/icon/x.svg?t=270720221356')}}" alt="x" class="w-7 h-7 cursor-pointer"
            id="newsletter-x-failed" onclick="deleteFailed()">

    </section>

    {{-- duplicate email --}}
    <section id="newsletter-popup-duplicate"
        class="bg-[#DE3B25] py-4 px-10 fixed justify-between items-center w-full z-[1000] font-medium text-white gap-4 hidden">
        <h1 class="w-full font-poppins">Email-mu sudah terdaftar! Kami akan segera mengirimkan informasi terbarunya!
        </h1>

        <img src="{{asset('assets/icon/x.svg?t=270720221356')}}" alt="x" class="w-7 h-7 cursor-pointer"
            id="newsletter-x-failed" onclick="deleteDuplicate()">

    </section>

    {{-- Empty Email --}}
    <section id="newsletter-popup-empty"
        class="bg-[#DE3B25] py-4 px-10 fixed justify-between items-center w-full z-[1000] font-medium text-white gap-4 hidden">
        <h1 class="w-full font-poppins">Kamu belum menuliskan email-mu. Masukkan email kamu agar tidak ketinggalan
            informasi terbarunya!</h1>

        <img src="{{asset('assets/icon/x.svg?t=270720221356')}}" alt="x" class="w-7 h-7 cursor-pointer"
            id="newsletter-x-failed" onclick="deleteEmpty()">

    </section>

    {{-- background music --}}
    <audio src="{{asset('assets/audio/bg-music.mp3?t=270720221356')}}" type="audio/mpeg" id="bg-music" loop>
    </audio>
    <audio src="{{asset('assets/audio/click.mp3?t=270720221356')}}" type="audio/mpeg" id="click-music">
    </audio>

    {{-- loading screen --}}
    <section id="loading"
        class="min-h-screen w-full fixed flex justify-center items-center z-[100] animate-[fadeOut_2s_ease-in-out_1s]">
        <img src="{{asset('assets/loading/loading1.png?t=270720221356')}}" alt="loading1"
            class="absolute inset-0 m-auto animate-[fadeOut_1s_ease-in-out] opacity-0 tablet:w-auto w-64">
        <img src="{{asset('assets/loading/loading2.png?t=270720221356')}}" alt="loading2"
            class="absolute inset-0 m-auto animate-[fade_1s_ease-in-out_0.5s] opacity-0 tablet:w-auto w-64">
        <img src="{{asset('assets/loading/loading3.png?t=270720221356')}}" alt="loading3"
            class="absolute inset-0 m-auto animate-[fade_1s_ease-in-out_1s] opacity-0 tablet:w-auto w-64">
        <img src="{{asset('assets/loading/loading4.png?t=270720221356')}}" alt="loading4"
            class="absolute inset-0 m-auto animate-[fade_1s_ease-in-out_1.5s] opacity-0 tablet:w-auto w-64">
        <span id="loading-counter" data-target="100"
            class="absolute text-white animate-[fadeOut_3s_ease-in-out_1.5s] opacity-100 font-bold tablet:text-xl text-md"></span>
    </section>

    <section id="coming-soon"
        class="flex flex-col items-center justify-center gap-0 relative h-full py-20 px-[10%] min-h-screen">
        <img src="{{asset('assets/comingsoon-background/lg-bg.png?t=270720221356')}}" alt="background"
            class="absolute object-cover z-[-1] top-0 left-0 w-full h-full laptop:block hidden">
        <img src="{{asset('assets/comingsoon-background/md-bg.png?t=270720221356')}}" alt="background"
            class="absolute object-cover z-[-1] top-0 left-0 w-full h-full laptop:hidden tablet:block hidden">
        <img src="{{asset('assets/comingsoon-background/sm-bg.png?t=270720221356')}}" alt="background"
            class="absolute object-cover z-[-1] top-0 left-0 w-full h-full laptop:hidden block">

        {{-- music and countdown --}}
        <div class="flex items-center justify-end w-full gap-5">
            {{-- <div class="text-white flex justify-center items-start flex-col tablet:gap-2 gap-0 w-full">
                <h1 class="tablet:text-2xl text-md font-bold drop-shadow-[2px_4px_4px_rgba(0,0,0,0.25)]">BNCC Opening
                    Season 2022 akan segera hadir</h1>
                <div class="tablet:text-2xl text-md font-medium flex drop-shadow-[2px_4px_4px_rgba(0,0,0,0.25)]">
                    <span class="days">00</span>
                    <span class="pl-1">hari lagi...</span>
                </div>
            </div> --}}
            <img src="{{asset('assets/icon/music.png?t=270720221356')}}" alt="music" id="music"
                class="tablet:w-14 w-11 h-auto opacity-50 hover:drop-shadow-[0_0_3px_white]">
        </div>

        <div
            class="comingsoon-content flex justify-between items-center laptop:flex-row flex-col w-full h-auto laptop:gap-8 gap-2 px-[5%]">
            <div class="comingsoon-text flex flex-col justify-center gap-6 laptop:order-1 order-2 laptop:w-[55%]">
                <div class="headings text-white flex flex-col laptop laptop:items-start items-center w-full">
                    <p
                        class="font-semibold desktop:text-xl laptop:text-lg tablet:text-xl mb-5 text-sm drop-shadow-[2px_4px_4px_rgba(0,0,0,0.25)] text-center tablet:text-left font-poppins">
                        Spaceship to BNCC Opening Season 2022 is</p>
                    <h1
                        class="desktop:text-[80px] tablet:text-[60px] mobile:text-[32px] text-[24px] font-extrabold leading-none drop-shadow-[2px_4px_4px_rgba(0,0,0,0.25)]">
                        LAUNCHING</h1>
                    <h1
                        class="desktop:text-[200px] laptop:text-[140px] tablet:text-[150px] mobile:text-[74px] text-[60px] font-extrabold leading-none drop-shadow-[2px_4px_4px_rgba(0,0,0,0.25)]">
                        SOON</h1>
                </div>
                <div class="newsletter flex flex-col gap-3 w-full">
                    <p
                        class="font-poppins text-white font-semibold desktop:text-xl laptop:text-lg tablet:text-xl text-sm text-center laptop:text-left drop-shadow-[2px_4px_4px_rgba(0,0,0,0.25)]">
                        Masukkan
                        email kamu agar tidak
                        ketinggalan informasi
                        terbarunya!</p>
                    <form action="{{route('postEmail')}}" method="POST" class="w-full flex flex-col gap-2"
                        id="email-form" onsubmit="validateEmail(event)">
                        @csrf
                        @method("POST")
                        <div class="flex laptop:justify-start justify-center tablet:h-16 h-12 w-full">
                            <input name="email" type="text" placeholder="Masukkan email-mu di sini…"
                                class="focus:outline-0 font-medium tablet:text-xl text-xs h-full tablet:p-5 mobile:p-5 p-4 border-0 rounded-l-2xl w-4/5 font-poppins"
                                id="email">
                            <button type="submit"
                                class="border-0 py-2 px-4 w-16 flex items-center justify-center rounded-r-2xl bg-[#37C8EE] hover:bg-[#28b3d6] active:bg-[#1eabce]"
                                onclick="playClickSound()"><img
                                    src=" {{asset('assets/form/submit.png?t=270720221356')}}" alt="send"
                                    class="tablet:w-6 tablet:h-6 w-5 h-5"></button>
                        </div>
                    </form>
                </div>
                <div
                    class="social flex items-center laptop:justify-start justify-center tablet:gap-4 gap-2 flex-wrap w-full">
                    <a href="https://www.instagram.com/bnccbinus/" target="_blank" rel="noreferrer noopener"
                        class="p-3 tablet:w-16 tablet:h-16 w-[52px] h-[52px] flex justify-center items-center border-0 rounded-full bg-white hover:drop-shadow-[0_0_3px_white]"
                        onclick="playClickSound()">
                        <span><img src="{{asset('assets/medsos/instagram.png?t=270720221356')}}" alt="instagram"
                                class="tablet:w-9 tablet:h-9 w-7 h-7"></span></a>
                    <a href="https://www.linkedin.com/company/bina-nusantara-computer-club/" target="_blank"
                        rel="noreferrer noopener"
                        class="p-3 tablet:w-16 tablet:h-16 w-[52px] h-[52px] flex justify-center items-center border-0 rounded-full bg-white hover:drop-shadow-[0_0_3px_white]"
                        onclick="playClickSound()"><span><img
                                src="{{asset('assets/medsos/linkedin.png?t=270720221356')}}" alt="linkedin"
                                class="tablet:w-9 tablet:h-9 w-7 h-7"></span></a>
                    <a href="https://www.youtube.com/channel/UC0BND4Aekeg90GQ1_ZX79Yw/videos?app=desktop"
                        target="_blank" rel="noreferrer noopener"
                        class="p-3 tablet:w-16 tablet:h-16 w-[52px] h-[52px] flex justify-center items-center border-0 rounded-full bg-white hover:drop-shadow-[0_0_3px_white]"
                        onclick="playClickSound()"><span><img
                                src="{{asset('assets/medsos/youtube.png?t=270720221356')}}" alt="youtube"
                                class="tablet:w-9 tablet:h-9 w-7 h-7"></span></a>
                    <a href="https://twitter.com/bncc_binus" target="_blank" rel="noreferrer noopener"
                        class="p-3 tablet:w-16 tablet:h-16 w-[52px] h-[52px] flex justify-center items-center border-0 rounded-full bg-white hover:drop-shadow-[0_0_3px_white]"
                        onclick="playClickSound()"><span><img
                                src="{{asset('assets/medsos/twitter.png?t=270720221356')}}" alt="twitter"
                                class="tablet:w-9 tablet:h-9 w-7 h-7"></span></a>
                    <a href="https://web.facebook.com/bina.nusantara.computer.club/" target="_blank"
                        rel="noreferrer noopener"
                        class="p-2 tablet:w-16 tablet:h-16 w-[52px] h-[52px] flex justify-center items-center border-0 rounded-full bg-white hover:drop-shadow-[0_0_3px_white]"
                        onclick="playClickSound()"><span><img
                                src="{{asset('assets/medsos/facebook.png?t=270720221356')}}" alt="facebook"
                                class="tablet:w-11 tablet:h-11 w-9 h-9"></span></a>
                </div>
            </div>
            <div
                class="comingsoon-person-icon laptop:order-2 order-1 laptop:w-2/5 w-full laptop:min-h-[700px] tablet:min-h-[500px] mobile:min-h-[340px] min-h-[270px] relative flex items-center justify-center">

                <div
                    class="absolute desktop:w-44 laptop:w-36 tablet:w-32 mobile:w-28 w-16 left-0 right-0 tablet:top-[30%] mobile:top-[20%] top-[30%] z-[21] m-auto h-auto desktop:gap-8 laptop:gap-4 tablet:gap-3 mobile:gap-2 gap-0 laptop:animate-float-big-slow animate-float-small-slow drop-shadow-[0_0_0.75rem_white] flex flex-col justify-center items-center">
                    <img src="{{asset('assets/comingsoon-person-icon/lg-person-icon.png?t=270720221356')}}"
                        alt="person-icon" id="person-icon">
                </div>

                {{-- <div id="countdown"
                    class="laptop:text-4xl text:xl flex justify-center items-center drop-shadow-[0_0_3px_white] text-white absolute bottom-[25%] left-[50%] right-[50%] z-[22] gap-2 font-medium m-auto ">
                    <span id="days" class=""></span><span>:</span>
                    <span id="hours"></span><span>:</span>
                    <span id="minutes"></span><span>:</span>
                    <span id="seconds"></span>
                </div> --}}
                <div>
                    <div id="countdown"
                        class="desktop:text-[44px] tablet:text-4xl mobile:text-2xl text-lg flex justify-center items-center drop-shadow-[0_0_3px_white] text-white z-[22] dekstop:gap-2 tablet:gap-1.5 mobile:gap-1 gap-0.5 font-digital absolute left-0 right-0 bottom-0 desktop:top-[15vw] laptop:top-[12vw] tablet:top-[30%] mobile:top-[24vw] top-[25vw] m-auto">
                        <span id="days"></span><span>:</span>
                        <span id="hours"></span><span>:</span>
                        <span id="minutes"></span><span>:</span>
                        <span id="seconds"></span>
                    </div>
                    <img src="{{asset('assets/comingsoon-person-icon/lg-glow.png?t=270720221356')}}" alt="glow"
                        id="lg-glow"
                        class="laptop:block hidden absolute z-20 left-0 right-0 top-[40%] bottom-[60%] m-auto w-full">
                    <img src="{{asset('assets/comingsoon-person-icon/md-glow.png?t=270720221356')}}" alt="glow"
                        id="md-glow"
                        class="tablet:w-[440px] w-[400px] laptop:hidden block absolute z-20 left-0 right-0 top-[45%] bottom-[55%] m-auto">
                </div>


                {{-- <img src="{{asset('assets/comingsoon-person-icon/lg-person-icon.png')}}" alt="person-icon"
                    id="person-icon"
                    class="absolute desktop:w-44 laptop:w-36 tablet:w-32 mobile:w-28 w-16 inset-0 z-[21] m-auto h-auto animate-float-slow drop-shadow-[0_0_0.75rem_white]">
                --}}
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{asset('js/comingsoon.js?t=140820222239')}}"></script>
</body>

</html>
