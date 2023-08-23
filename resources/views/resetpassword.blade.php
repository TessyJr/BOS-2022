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

    {{-- success popup --}}
    <section id="popup-success" class="h-screen top-0 bg-black/50 py-4 px-10 fixed justify-center items-center w-full z-[1000] font-medium gap-4 hidden">
        <div class="bg-white tablet:p-28 p-12 flex flex-col justify-center items-center laptop:gap-8 tablet:gap-6 gap-4 rounded-[30px] relative w-[800px]">
            <img src="{{asset('assets/resetpassword/success.svg')}}" alt="success" class="laptop:w-[127px] tablet:w-[100px] w-[80px] h-auto">
            <h1 class="laptop:text-3xl tablet:text-2xl text-xl font-poppins font-semibold text-center w-full">Kata Sandi berhasil diubah</h1>
            <button id="return-login" class="tablet:py-4 py-2 tablet:px-8 px-3 w-auto flex justify-center items-center tablet:rounded-[22px] rounded-[9px] h-full font-poppins text-white font-semibold laptop:text-2xl tablet:text-xl text-lg" onclick="submitReset();">Kembali ke Halaman Login</button>
        </div>
    </section>

    <section id="forgot-content" class="min-h-screen absolute inset-0 px-[10%] py-20">
        <div class="flex flex-col justify-center items-center h-full w-full tabletgap-16 gap-8 z-[100]">
            <img src="{{asset('assets/bncc-logo/bncc-white.svg')}}" alt="bncc-logo-white">
            <div class="flex flex-col justify-center items-center tablet:gap-8 gap-4 w-full">
                <h1 class="font-montserrat font-extrabold tablet:text-7xl text-3xl drop-shadow-[0_0_18px_rgba(255,255,255,0.25)] text-white text-center">Reset Password</h1>
                    <form method="POST" action="{{ route('password.update') }}" id="reset-form" class="tablet:px-8 px-6 tablet:py-16 py-8 bg-white rounded-[20px] flex flex-col tablet:gap-12 gap-6 w-full max-w-[800px] font-poppins" onsubmit="validateForm(event)">
                        @csrf
                        @method("POST")
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="flex flex-col w-full tablet:gap-2 gap-1">
                            <input hidden type="email" name="email" value="{{$email_toreset}}">
                            <label for="kata-sandi"
                            class="text-[#22539F] font-medium tablet:text-2xl text-[13px]">Kata Sandi Baru</label>
                            <div class="relative w-full">
                                <input type="password" name="password" id="kata-sandi"
                                class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm border-[#DE3B25] border-none w-full tablet:pr-14 pr-9 text-black" placeholder="Masukkan kata sandi baru Anda">
                                <img src="{{asset('assets/icon/eye.svg')}}" alt="eye" class="tablet:w-[25px] w-[14px] cursor-pointer hidden absolute tablet:right-5 right-3 top-0 bottom-0 my-auto" id="eye1" onclick="togglePassword()">
                                <img src="{{asset('assets/icon/eye-slashed.svg')}}" alt="eye-slashed" class="tablet:w-[25px] w-[14px] cursor-pointer block absolute tablet:right-5 right-3 top-0 bottom-0 my-auto" id="eye-slashed1" onclick="togglePassword()">
                            </div>
                            <div class="items-center justify-start hidden gap-1" id="invalid-kata-sandi">
                                <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                                <p  class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]">Kata sandi yang Anda masukkan salah (Wajib memiliki huruf besar, huruf kecil, angka, simbol, serta minimal 8 karakter)</p>
                            </div>
                        </div>
                        <div class="flex flex-col w-full tablet:gap-2 gap-1">
                            <label for="konfirmasi-kata-sandi"
                                class="text-[#22539F] font-medium tablet:text-2xl text-[13px]">Konfirmasi Kata Sandi Baru</label>
                                <div class="relative w-full">
                                    <input type="password" name="password_confirmation" id="konfirmasi-kata-sandi"
                                    class="focus:outline-[#3171d3] bg-[#E1E5E8] laptop:pl-5 pl-3 tablet:py-3 py-2 rounded-[10px] laptop:text-xl tablet:text-lg text-sm border-[#DE3B25] border-none w-full tablet:pr-14 pr-9 text-black" placeholder="Masukkan kata sandi baru Anda">
                                    <img src="{{asset('assets/icon/eye.svg')}}" alt="eye" class="tablet:w-[25px] w-[14px] cursor-pointer hidden absolute tablet:right-5 right-3 top-0 bottom-0 my-auto" id="eye2" onclick="toggleConfirmPassword()">
                                    <img src="{{asset('assets/icon/eye-slashed.svg')}}" alt="eye-slashed" class="tablet:w-[25px] w-[14px] cursor-pointer block absolute tablet:right-5 right-3 top-0 bottom-0 my-auto" id="eye-slashed2" onclick="toggleConfirmPassword()">
                                </div>
                                <div class="items-center justify-start hidden gap-1" id="invalid-konfirmasi-kata-sandi">
                                    <img src="{{asset('assets/icon/exclamation.svg')}}" alt="exclamation" class="tablet:w-[36px] w-[20px]">
                                    <p  class="text-[#DE3B25] font-medium tablet:text-lg text-[10px]">Konfirmasi kata sandi yang Anda masukkan salah (Wajib sama dengan kata sandi)</p>
                                </div>
                        </div>

                        <button id="btn-submit" type="submit"
                                class="mt-10 laptop:px-20 tablet:px-16 px-8 laptop:py-4 tablet:py-3 py-2 laptop:text-2xl tablet:text-xl text-sm font-poppins font-semibold rounded-[100px] text-white" \>Reset</button>
                    </form>
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            </div>
        </div>
    </section>

    <script src="{{asset('js/resetPassword.js?t=150820221255')}}"></script>
</body>
</html>
