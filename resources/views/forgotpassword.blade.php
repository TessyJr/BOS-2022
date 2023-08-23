<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BNCC Opening Season</title>
    <link rel="stylesheet" href="{{asset('css/login-regis-forgot.css?t=150820221255')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon/favicon.svg?t=270720221356')}}">
</head>
<body>
    {{-- background --}}
    <div id="forgot-background" class="w-full min-h-screen z-[-1] relative">
        <img src="{{asset('assets/forgot-background/hex-left.svg')}}" alt="hex-left" class="absolute left-0 max-h-screen">
        <img src="{{asset('assets/forgot-background/hex-right.svg')}}" alt="hex-right" class="absolute right-0 max-h-screen">
        <img src="{{asset('assets/forgot-background/stars-top.svg')}}" alt="stars-top" class="absolute top-0 w-full">
        <img src="{{asset('assets/forgot-background/stars-bottom.svg')}}" alt="stars-bottom" class="absolute bottom-0 w-full">
    </div>

    {{-- Popup --}}
    <section id="tidak-terdaftar" class="top-0 bg-[#DE3B25] py-4 px-10 fixed justify-between items-center w-full z-[100] font-medium text-white gap-4 hidden">
        <h1 class="w-full font-poppins">Email yang Anda masukkan tidak terdaftar</h1>
        <img src="{{asset('assets/icon/x.svg')}}" alt="x" class="w-7 h-7 cursor-pointer" id="x-tidak-terdaftar" onclick="deleteTidakTerdaftar()">
    </section>
    <section id="tidak-valid" class="top-0 bg-[#DE3B25] py-4 px-10 fixed justify-between items-center w-full z-[100] font-medium text-white gap-4 hidden">
        <h1 class="w-full font-poppins">Email yang Anda masukkan tidak valid</h1>
        <img src="{{asset('assets/icon/x.svg')}}" alt="x" class="w-7 h-7 cursor-pointer" id="x-tidak-valid" onclick="deleteTidakValid()">
    </section>

    {{-- success popup --}}
    <section id="popup-success" class="h-screen top-0 bg-black/50 py-4 px-10 fixed justify-center items-center w-full z-[1000] font-medium gap-4 hidden">
        <div class="bg-white tablet:p-28 p-12 flex flex-col justify-center items-center laptop:gap-8 tablet:gap-6 gap-4 rounded-[30px] relative w-[800px]">
            <img src="{{asset('assets/register/x.svg')}}" alt="x" class="absolute tablet:top-10 tablet:right-10 top-7 right-7 cursor-pointer" onclick="deleteSuccess()">
            <img src="{{asset('assets/register/success.svg')}}" alt="success" class="laptop:w-[127px] tablet:w-[100px] w-[80px] h-auto">
            <h1 class="laptop:text-3xl tablet:text-2xl text-xl font-poppins font-semibold text-center w-full">Instruksi telah dikirimkan!</h1>
            <p class="text-center laptop:text-xl tablet:text-md text-sm font-medium font-poppins w-full">Kami telah mengirimkan link verifikasi ke email Anda. Silahkan membuka email dan mengklik Link Verifikasi. Jika anda tidak mendapatkan email, silahkan coba kembali.</p>
        </div>
    </section>

    <section id="forgot-content" class="min-h-screen absolute inset-0 px-[10%] py-20">
        <div class="flex flex-col justify-center items-center h-full w-full tabletgap-16 gap-8 z-[100]">
            <img src="{{asset('assets/bncc-logo/bncc-white.svg')}}" alt="bncc-logo-white">
            <div class="flex flex-col justify-center items-center tablet:gap-8 gap-4 w-full">
                <h1 class="font-montserrat font-extrabold tablet:text-7xl text-3xl drop-shadow-[0_0_18px_rgba(255,255,255,0.25)] text-white text-center">Forgot Password</h1>
                <h2 class="font-poppins tablet:text-2xl text-xs text-white font-medium text-center">Masukkan email Anda yang telah terdaftar</h2>
                <form id="forgot-form" method="POST" action="{{route('password.email')}}" class="w-full" onsubmit="validateEmail(event)">
                    @csrf
                    {{-- onsubmit="validateEmail(event)" --}}
                    <div class="flex justify-center items-center tablet:gap-2 gap-1 w-full h-full">
                        <input name="email" type="text" class="h-full w-full max-w-[550px] tablet:px-8 px-4 tablet:py-5 py-2 tablet:text-xl text-xs focus:outline-none tablet:rounded-l-[22px] rounded-l-[9px] font-poppins" placeholder="Masukkan email Anda" id="forgot-email">
                        <button type="submit" class="tablet:py-4 py-2 tablet:px-8 px-3 tablet:w-[100px] w-[50px] tablet:rounded-r-[22px] rounded-r-[9px] h-full relative overflow-hidden" id="btn-send-email">
                            <img src="{{asset('assets/form/submit.svg')}}" alt="send" class="inset-0 m-auto absolute animate-left-to-right tablet:w-8 w-5">
                        </button>
                    </div>
                </form>
                <div class="text-center font-poppins tablet:text-2xl text-xs text-white font-medium hidden" id="countdown-timer">
                    Silahkan periksa Email Anda <span id="timer" class="text-[#18E6FE]"></span>
                </div>
                <div class="text-center font-poppins tablet:text-2xl text-xs text-white font-medium hidden" id="resend-email">
                    Belum mendapatkan email? <a href="#" class="text-[#18E6FE]" onclick="startCountdown()">Kirim ulang email</a>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{asset('js/forgot.js?t=150820221255')}}"></script>
</body>
</html>
