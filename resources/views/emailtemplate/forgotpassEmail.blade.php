<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
{{-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> --}}
{{-- <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light"> --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@500&family=Playfair+Display:wght@600&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body{
            padding: 0px;
            background: #D7E0E8;
            background-color:#D7E0E8;
            color: #D7E0E8;
            text-align: center;
            font-family: "Montserrat";
        }
        .container{
            display: inline-block;
            text-align: center;
            max-width: calc(100% - 3rem);
            margin: 1.5rem;
            width: 36rem;
        }
        .card{
            background:white;
            border-radius: 0.75rem;
            padding:2.5rem 0rem 2.5rem 0rem;
        }
        .content{
            color:rgba(0,0,0,0.82);
            padding:0rem 3.5rem 0rem 3.5rem;
            text-align: left;
            font-style: normal;
            font-weight: 500;
            font-size: 16px;
            line-height: 150%;
            /* or 24px */

            letter-spacing: 0.02em;

            /* Black */

            color: #383530;
        }
        .content p{
            margin:1.5rem 0rem 1.5rem 0rem;
            font-family: "Montserrat"
        }
        a.btn{
            font-size:1.2rem;
            padding:0.7rem;
            margin-top: 1.25rem;
            display: block;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            font-family: "Montserrat";
            background: linear-gradient(91.33deg, #00A3FF -2.7%, #18E6FE 110.59%);
            border-radius: 17px;
            font-style: normal;
            font-weight: 600;
            font-size: 20px;
            line-height: 150%;
            /* identical to box height, or 30px */
            letter-spacing: 0.015em;
            /* putih */
            color: #FAFAFF;
        }
        .line{
            margin-top:1.25rem;
            width:100%;
            border-bottom: 2px solid #383530;;
            height: 1px;

            /* Black */

            background: #383530;
        }
        .link{
            text-decoration: none;
            font-weight: bold;
            color: rgba(0, 163, 255, 1);
            text-align: left;
            font-style: normal;
            font-size: 16px;
            line-height: 150%;
            width: 100%;
            /* or 24px */

            letter-spacing: 0.02em;
        }
        .copy{
            padding: 1rem 0rem 1rem 0rem;
            font-family: 'Montserrat';
            font-style: normal;
            font-weight: 500;
            font-size: 13px;
            line-height: 150%;
            /* identical to box height, or 20px */

            text-align: center;
            letter-spacing: 0.02em;

            /* Black */

            color: #383530;
        }
        .head{
            font-family: "Montserrat";
            font-weight: 500;
            font-size: 30px;
            line-height: 38px;
            /* identical to box height */

            letter-spacing: 0.02em;

            /* Black */

            color: #383530;
        }
    </style>
</head>

<?php
    use App\Models\User;
    $users = User::where('email','like',request('email'))->get();
?>

<body style="
background: #D7E0E8;
background-color:#D7E0E8;
color: #D7E0E8a;            
margin: 0px;
padding: 0px;
text-align: center;
">
    <div class="container">
        <div class="image" style="margin-bottom: 20px">
            {{-- <a href="{{route('main')}}"><img src="{{asset('assets/bncc-logo/bncc_new_whiteBG_1.png')}}"></a> --}}
            {{-- <a href="{{route('main')}}"><img src="{{$image}}"></a> --}}
            <a href="{{route('main')}}"><img src="https://launching.bncc.net/assets/bncc-logo/bncc_new_whiteBG_1.png"></a>
        </div>
        <div class="card">
            <div class="content">
                <p class="head"><b>Halo!</b></p>
                <p>Email ini bertujuan untuk membantu kamu dalam melakukan reset password akun.</p>
                <a href="{{ $url }}" class="btn">Reset Password</a>
                <p><b style="font-family: Montserrat">Link reset password hanya akan berlaku dalam waktu 60 menit.</b></p>
                <p>Apabila kamu tidak merasa ingin melakukan reset password, abaikan saja email ini.</p>
                <p>Regards,<br />
                    BNCC Opening Season</p>
                <div class="line"></div>
                <p>Apabila kamu ada mengalami masalah dalam klik button "Reset Password", kamu dapat melakukan salin dan tempel URL di bawah ke dalam web browsermu.</p>
                <p><a class="link" style="" href="{{ $url }}">{{ $url }}</a></p>
            </div>
        </div>
        <div class="copy">
            All Right Reserved BNCC 2022 © Bina Nusantara Computer Club
        </div>
    </div>
</body>

</html>
