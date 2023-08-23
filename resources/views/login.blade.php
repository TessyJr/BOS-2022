<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BNCC Opening Season 2022</title>
    <link rel="stylesheet" href="{{asset('css/login-regis-forgot.css?t=290820221805')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon/favicon.svg?t=140820222239')}}">
</head>

<body>
    <section id="login-content"
        class="w-full px-[10%] laptop:py-20 py-40 flex justify-center items-center text-white relative min-h-screen">
        {{-- background --}}
        <div id="login-background" class="z-[1]">
            {{-- desktop --}}
            <div class="laptop:block hidden">
                <img src="{{asset('assets/login-background/desktop/hex-left.svg')}}" alt="hex-left"
                class="absolute left-0 top-0">
            <img src="{{asset('assets/login-background/desktop/hex-right.svg')}}" alt="hex-right"
                class="absolute right-0 top-0">
            <img src="{{asset('assets/login-background/desktop/rocks.svg')}}" alt="rocks"
                class="absolute bottom-0 left-0 right-0 w-full">
            </div>

            {{-- tablet --}}
            <div class="laptop:hidden tablet:block hidden">
                <img src="{{asset('assets/login-background/tablet/hex-left.svg')}}" alt="hex-left"
                class="absolute left-0 top-0 max-h-screen">
            <img src="{{asset('assets/login-background/tablet/hex-right.svg')}}" alt="hex-right"
                class="absolute right-0 top-0 max-h-screen">
            <img src="{{asset('assets/login-background/tablet/rocks.svg')}}" alt="rocks"
                class="absolute bottom-0 left-0 right-0 w-full">
            </div>

            {{-- mobile --}}
            <div class="tablet:hidden block">
                <img src="{{asset('assets/login-background/mobile/hex-left.svg')}}" alt="hex-left"
                class="absolute left-0 top-0">
            <img src="{{asset('assets/login-background/mobile/hex-right.svg')}}" alt="hex-right"
                class="absolute right-0 top-0">
            <img src="{{asset('assets/login-background/mobile/rocks.svg')}}" alt="rocks"
                class="absolute bottom-0 left-0 right-0 w-full">
            </div>
        </div>

        {{-- content --}}
        <div
            class="flex flex-col justify-center items-center bg-white rounded-3xl tablet:p-20 p-8 tablet:gap-12 gap-4 laptop:max-w-[800px] w-full max-w-[600px] z-[10]">
            {{-- login header --}}
            <a href="{{ route('main') }}"><img src="{{asset('assets/bncc-logo/bncc-blue.svg')}}" alt="logo-bncc" class="tablet:w-auto w-[83px]"></a>
            <div class="text-[#22539F] flex flex-col justify-center items-center">
                <h1 class="font-extrabold tablet:text-5xl text-2xl font-montserrat text-center">Welcome Back</h1>
            </div>

            <form action="{{route('login')}}" method="POST" class="flex flex-col font-poppins w-full tablet:gap-12 gap-4" id="login-form" onsubmit="validateLogin(event)">
                @csrf
                @method('POST')
                {{-- input email --}}
                <div class="flex flex-col tablet:gap-2 gap-1">
                    <label for="email" class="text-[#22539F] font-medium tablet:text-2xl text-[13px]">Email</label>
                    <input type="text" name="email" id="input-email"
                        class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:px-5 px-3 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm border-[#DE3B25] border-none text-black" placeholder="Masukkan Email Anda">
                    <!-- error message-->
                    @if($errors->has('email'))
                    <div class="flex items-center justify-start gap-1" id="email-validation">
                        <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                        <p id="email-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]">Email yang Anda masukkan tidak terdaftar</p>
                    </div>
                    @else
                    <div class="flex items-center justify-start gap-1 hidden" id="email-validation">
                        <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                        <p id="email-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                    </div>
                    @endif
                </div>

                {{-- input password --}}
                <div class="flex flex-col tablet:gap-2 gap-1">
                    <label for="password"
                        class="text-[#22539F] font-medium tablet:text-2xl text-[13px]">Password</label>
                    <div class="relative w-full">
                        <input type="password" name="password" id="input-password"
                        class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm border-[#DE3B25] border-none w-full tablet:pr-14 pr-9 text-black" placeholder="Masukkan kata sandi Anda">
                        <img src="{{asset('assets/icon/eye.svg')}}" alt="eye" class="tablet:w-[25px] w-[14px] cursor-pointer hidden absolute tablet:right-5 right-3 top-0 bottom-0 my-auto" id="eye" onclick="togglePassword()">
                        <img src="{{asset('assets/icon/eye-slashed.svg')}}" alt="eye-slashed" class="tablet:w-[25px] w-[14px] cursor-pointer block absolute tablet:right-5 right-3 top-0 bottom-0 my-auto" id="eye-slashed" onclick="togglePassword()">
                    </div>
                    <!-- error message password-->
                    @if($errors->has('password'))
                    <div class="flex items-center justify-start gap-1" id="password-validation">
                        <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                        <p id="password-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]">Kata sandi yang Anda masukkan salah</p>
                    </div>
                    @else
                    <div class="flex items-center justify-start gap-1 hidden" id="password-validation">
                        <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                        <p id="password-validation-content" class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]"></p>
                    </div>
                    @endif
                    </p>
                    <a href="{{route('password.request')}}"
                        class="text-[#00A3FF] font-medium tablet:text-lg text-[10px] self-end font-poppins">Forgot your
                        password?</a>
                </div>

                <button type="submit"
                    class="tablet:py-4 py-3 tablet:text-2xl text-xs font-poppins font-semibold rounded-[100px] mx-[5%]" id="login-submit">Log
                    in</button>
            </form>

            {{-- Forgot password --}}
            <div class="font-poppins">
                <span class="text-black tablet:text-xl text-[10px] font-medium">Belum memiliki akun? </span>
                <a href="{{route('register')}}" class="text-[#00A3FF] tablet:text-xl text-[10px] font-medium">Registrasi disini</a>
            </div>

        </div>
    </section>

    <script src="{{asset('js/login.js?t=290820221805')}}"></script>
</body>

</html>
