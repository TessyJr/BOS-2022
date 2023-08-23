<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BNCC Opening Season</title>
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css?t=150920221037') }}">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon/favicon.svg?t=270720221356')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
</head>
<body>
    {{-- Edit Confirmation --}}
    <section id="edit-popup" class="hidden fixed bg-overlay w-screen h-screen z-[100] flex justify-center items-center font-poppins">
        <div class="bg-white rounded-3xl tablet:w-[720px] w-[360px] tablet:p-32 p-16 flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
            <div class="button rounded-full p-8 h-32 w-32 flex justify-center items-center">
                <img src="{{ asset('assets/icon/Admin/Edit_Popup.svg') }}" alt="x" class="w-full">
            </div>
            <h1 class="tablet:text-3xl text-base font-poppins font-semibold text-center">Apa kamu yakin ingin mengubah data partisipan ini?</h1>
            <div class="flex justify-center tablet:gap-8 gap-4">
                <button class="button_alt p-[0.3rem] font-semibold tablet:text-2xl text-sm tablet:w-40 w-28" id="edit-kembali" onclick="closePopup()">Kembali</button>
                <button class="button p-[0.3rem] font-semibold tablet:text-2xl text-sm tablet:w-40 w-28 rounded-full text-center" type="submit">Ubah</button>
            </div>
        </div>
    </section>

    {{-- Logout Popup --}}
    <section id="logout-popup" class="hidden fixed bg-overlay w-screen h-screen z-[100] flex justify-center items-center font-poppins">
        <div class="bg-white rounded-3xl tablet:w-[720px] w-[360px] tablet:p-32 p-16 flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
            <img src="{{ asset('assets/icon/Logout.svg') }}" alt="x" class="tablet:h-32 h-20">
            <h1 class="tablet:text-3xl text-base font-poppins font-semibold text-center">Apa kamu yakin ingin keluar?</h1>
            <div class="flex justify-center tablet:gap-8 gap-4">
                <button class="button_alt p-[0.3rem] font-semibold tablet:text-2xl text-sm tablet:w-40 w-28" id="logout-kembali" onclick="closePopup()">Kembali</button>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="button p-[0.3rem] font-semibold tablet:text-2xl text-sm tablet:w-40 w-28 text-center rounded-full h-full">Keluar</button>
                </form>
            </div>
        </div>
    </section>

        {{-- Wrapper --}}
        <div class="admin-participant flex flex-col gap-8 mx-12 my-14">

            {{-- Navbar --}}
            <nav class="card font-poppins">
                <div class="flex justify-between items-center">
                    <img src="{{ asset('assets/BNCC logo.svg') }}" alt="BNCC logo" class="h-8">

                    <div class="flex gap-8">
                        <div class="flex flex-col items-center">
                            @if (Auth::user()->role == 1)
                                <a href="{{route('viewSuperUser')}}" class="text-mainblue_dark text-xl font-semibold flex items-center">Participants</a>
                            @else
                                <a href="{{route('viewUser')}}" class="text-mainblue_dark text-xl font-semibold flex items-center">Participants</a>
                            @endif
                            <div class="bg-mainblue_dark w-20 h-1 mt-10  absolute rounded"></div>
                        </div>

                        @if (Auth::user()->role == 1)
                            <a href="{{route('superAdminPayment')}}" class="text-black text-xl font-semibold flex items-center">Payment</a>
                            <a href="{{route('viewMemberSuper')}}" class="text-black text-xl font-semibold flex items-center">Registration</a>
                            <a href="{{route('viewMember2Super')}}" class="text-black text-xl font-semibold flex items-center">Re-Registered</a>
                        @else
                            <a href="{{route('adminPayment')}}" class="text-black text-xl font-semibold flex items-center">Payment</a>
                            <a href="{{route('viewMember')}}" class="text-black text-xl font-semibold flex items-center">Registration</a>
                            <a href="{{route('viewMember2')}}" class="text-black text-xl font-semibold flex items-center">Re-Registered</a>
                        @endif

                        <div id="dropdown-wrapper" class="inline-block">
                            @if (Auth::user()->role == 1)
                                <button onclick="navMenu()"
                                class="text-black text-xl font-semibold flex items-center gap-4">
                                SuperAdmin <img src="{{ asset('assets/icon/Dropdown_Down.svg') }}" alt="" class="h-3"></button>
                            @else
                                <button onclick="navMenu()"
                                class="text-black text-xl font-semibold flex items-center gap-4">
                                Admin <img src="{{ asset('assets/icon/Dropdown_Down.svg') }}" alt="" class="h-3"></button>
                            @endif
                            <div id="menu" class="hidden flex flex-col bg-white drop-shadow-md absolute z-0">
                                <a class="px-5 py-3 text-black text-xl font-semibold hover:text-blue-600 border-b border-gray-200 flex gap-3 items-center" href="{{route('main')}}"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>Home</a>
                                <button class="px-5 py-3 text-black text-xl font-semibold hover:text-blue-600 border-b border-gray-200 flex gap-2 items-center" href="#" id="logout-btn" type="button" data-modal-toggle="logout-popup">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>Log Out
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <form @if (Auth::user()->role == 1)
                action="{{route('updateSuperUser',['id'=>$user->id])}}"
            @else
                action="{{route('updateUser',['id'=>$user->id])}}"
            @endif
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')

                {{-- Participant Edit Content --}}
                <section class="card flex flex-col gap-6">
                    <div class="">
                        <h1 class="text-mainblue_dark font-extrabold font-montserrat text-4xl">Participants</h1>
                    </div>

                    <div class="overflow-y-scroll px-14 py-8 border border-opacity-50 border-[#383530] rounded-xl flex flex-col gap-7">
                        <h1 class="text-mainblue_dark font-extrabold font-montserrat text-4xl">Personal Info</h1>

                        <div class="flex gap-40 font-poppins">
                            {{-- Left Section --}}
                            <div class="flex flex-col gap-7">
                                {{-- Nama Lengkap --}}
                                <div class="flex flex-col gap-2">
                                    <label for="nama" class="text-mainblue text-lg font-medium">Nama Lengkap</label>
                                    <input value="{{$user->fullName}}" name="nama" id="nama" type="text" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 border-[#DE3B25] outline-none"
                                    placeholder="" oninput="">
                                </div>
                                {{-- NIM --}}
                                <div class="flex flex-col gap-2">
                                    <label for="nim" class="text-mainblue text-lg font-medium">NIM</label>
                                    <input value="{{$user->nim}}" name="nim" id="nim" type="text" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 border-[#DE3B25] outline-none"
                                    placeholder="" oninput="">
                                </div>
                                {{-- Tempat Lahir --}}
                                <div class="flex flex-col gap-2">
                                    <label for="tempat-lahir" class="text-mainblue text-lg font-medium">Tempat Lahir</label>
                                    <input value="{{$user->placeBirth}}" name="placeBirth" id="tempat-lahir" type="text" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 border-[#DE3B25] outline-none"
                                    placeholder="" oninput="">
                                </div>
                                {{-- Kota Domisili --}}
                                <div class="flex flex-col gap-2">
                                    <label for="tempat-lahir" class="text-mainblue text-lg font-medium">Kota Domisili</label>
                                    <input value="{{$user->domicile}}" name="domicile" id="tempat-lahir" type="text" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 border-[#DE3B25] outline-none"
                                    placeholder="" oninput="">
                                </div>
                                {{-- Tanggal Lahir --}}
                                <div class="flex flex-col gap-2">
                                    <label for="tanggal-lahir" class="text-mainblue text-lg font-medium">Tanggal Lahir</label>
                                    <input value="{{$user->birthDate}}" name="birthDate" id="tanggal-lahir" max="2007-12-31" type="date" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 border-[#DE3B25] outline-none"
                                    placeholder="" oninput="">
                                </div>
                                {{-- Jenis Kelamin --}}
                                <div class="flex flex-col gap-2">
                                    <label for="jenis-kelamin" class="text-mainblue text-lg font-medium">Jenis Kelamin</label>
                                    <select name="jenisKelamin" id="jenis-kelamin" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 cursor-pointer border-[#DE3B25] outline-none">
                                        <option value="laki-laki" @if ($user->gender === 'Laki-laki')
                                            selected
                                        @endif>Laki-laki</option>
                                        <option value="perempuan" @if ($user->gender === 'Perempuan')
                                            selected
                                        @endif>Perempuan</option>
                                    </select>
                                </div>
                                {{-- ID LINE --}}
                                <div class="flex flex-col gap-2">
                                    <label for="id-line" class="text-mainblue text-lg font-medium">ID LINE</label>
                                    <input value="{{$user->line_id}}" name="lineID" id="id-line" type="text" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 border-[#DE3B25] outline-none"
                                    placeholder="" oninput="">
                                </div>
                                {{-- Whatsapp --}}
                                <div class="flex flex-col gap-2">
                                    <label for="whatsapp" class="text-mainblue text-lg font-medium">Whatsapp</label>
                                    <input value="{{$user->whatsapp}}" name="whatsapp" id="whatsapp" type="text" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 border-[#DE3B25] outline-none"
                                    placeholder="" oninput="">
                                </div>
                                {{-- Instagram --}}
                                <div class="flex flex-col gap-2">
                                    <label for="instagram" class="text-mainblue text-lg font-medium">Instagram</label>
                                    <input value="{{$user->instagram}}" name="instagram" id="instagram" type="text" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 border-[#DE3B25] outline-none"
                                    placeholder="" oninput="">
                                </div>
                                {{-- Group Status --}}
                                <div class="flex flex-col gap-2">
                                    <label for="jenis-kelamin" class="text-mainblue text-lg font-medium">Group Status</label>
                                    <select name="has_group" id="jenis-kelamin" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 cursor-pointer border-[#DE3B25] outline-none">
                                        <option value="0" @if ($user->has_group == '0')
                                            selected
                                        @endif>0</option>
                                        <option value="1" @if ($user->has_group == '1')
                                            selected
                                        @endif>1</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Right Section --}}
                            <div class="flex flex-col gap-7 pr-14">
                                {{-- LnT Course --}}
                                <div class="flex flex-col gap-2">
                                    <label for="lnt_course" class="text-mainblue text-lg font-medium">Lnt Course</label>
                                    <select name="lnt_course" id="lnt_course" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 cursor-pointer border-[#DE3B25] outline-none">
                                        <option value="Front-End Development" @if ($user->lnt_course === "Front-End Development")
                                            selected
                                        @endif>Front-End Development</option>
                                        <option value="Back-End Development" @if ($user->lnt_course === "Back-End Development")
                                            selected
                                        @endif>Back-End Development</option>
                                        <option value="UI/UX Design" @if ($user->lnt_course === "UI/UX Design")
                                            selected
                                        @endif>UI/UX Design</option>
                                        <option value="Java Programming" @if ($user->lnt_course === "Java Programming")
                                            selected
                                        @endif>Java Programming</option>
                                        <option value="Mobile Application Development" @if ($user->lnt_course === "Mobile Application Development")
                                            selected
                                        @endif>Mobile Application Development</option>
                                        <option value="C Programming" @if ($user->lnt_course === "C Programming")
                                            selected
                                        @endif>C Programming</option>
                                    </select>
                                </div>
                                {{-- Jadwal BNCC Launching --}}
                                <div class="flex flex-col gap-2">
                                    <label for="jadwal-bncc-launching" class="text-mainblue text-lg font-medium">Jadwal BNCC Launching</label>
                                    <select id="jadwal-bncc-launching" name="schedule" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 cursor-pointer border-[#DE3B25] outline-none">
                                    @if ($user->campus_region === "Bandung")
                                        <option disabled value="Senin, 12 September 2022 (10.00 - 12.00)" @if ($user->launching_schedule === "Senin, 12 September 2022 (10.00 - 12.00)")
                                            selected
                                        @endif>Senin, 12 September 2022 (10.00 - 12.00)</option>
                                        <option disabled value="Senin, 12 September 2022 (15.30 - 17.30)" @if ($user->launching_schedule === "Senin, 12 September 2022 (15.30 - 17.30)")
                                            selected
                                        @endif>Senin, 12 September 2022 (15.30 - 17.30)</option>
                                        <option disabled value="Selasa, 13 September 2022 (10.00 - 12.00)" @if ($user->launching_schedule === "Selasa, 13 September 2022 (10.00 - 12.00)")
                                            selected
                                        @endif>Selasa, 13 September 2022 (10.00 - 12.00)</option>
                                        <option disabled value="Selasa, 13 September 2022 (15.30 - 17.30)" @if ($user->launching_schedule === "Selasa, 13 September 2022 (15.30 - 17.30)")
                                            selected
                                        @endif>Selasa, 13 September 2022 (15.30 - 17.30)</option>

                                    @elseif ($user->campus_region === "Alam Sutera")
                                        <option disabled value="Kamis, 15 September 2022 (10.00 - 12.00) - C Programming" @if ($user->launching_schedule === "Kamis, 15 September 2022 (10.00 - 12.00) - C Programming")
                                            selected
                                        @endif>Kamis, 15 September 2022 (10.00 - 12.00) - C Programming</option>
                                        <option disabled value="Kamis, 15 September 2022 (13.00 - 15.00) - Java Programming" @if ($user->launching_schedule === "Kamis, 15 September 2022 (13.00 - 15.00) - Java Programming")
                                            selected
                                        @endif>Kamis, 15 September 2022 (13.00 - 15.00) - Java Programming</option>
                                        <option disabled value="Jumat, 16 September 2022 (10.00 - 12.00) - Front-End Development" @if ($user->launching_schedule === "Jumat, 16 September 2022 (10.00 - 12.00) - Front-End Development")
                                            selected
                                        @endif>Jumat, 16 September 2022 (10.00 - 12.00) - Front-End Development</option>
                                        <option disabled value="Jumat, 16 September 2022 (13.00 - 15.00) - UI/UX Design" @if ($user->launching_schedule === "Jumat, 16 September 2022 (13.00 - 15.00) - UI/UX Design")
                                            selected
                                        @endif>Jumat, 16 September 2022 (13.00 - 15.00) - UI/UX Design</option>
                                        <option disabled value="Senin, 19 September 2022 (11.00 - 12.00) @if ($user->launching_schedule === "Senin, 19 September 2022 (11.00 - 12.00)")
                                            selected
                                        @endif">Senin, 19 September 2022 (11.00 - 12.00)</option>
                                        <option value="Senin, 19 September 2022 (16.00 - 17.00) @if ($user->launching_schedule === "Senin, 19 September 2022 (16.00 - 17.00)")
                                            selected
                                        @endif">Senin, 19 September 2022 (16.00 - 17.00)</option>

                                    @elseif ($user->campus_region === "Malang")
                                        <option disabled value="Senin, 19 September 2022 (10.00 - 12.00) - UI/UX Design" @if ($user->launching_schedule === "Senin, 19 September 2022 (10.00 - 12.00) - UI/UX Design")
                                            selected
                                        @endif>Senin, 19 September 2022 (10.00 - 12.00) - UI/UX Design</option>
                                        <option disabled value="Senin, 19 September 2022 (13.00 - 15.00) - Front-End Development" @if ($user->launching_schedule === "Senin, 19 September 2022 (13.00 - 15.00) - Front-End Development")
                                            selected
                                        @endif>Senin, 19 September 2022 (13.00 - 15.00) - Front-End Development</option>

                                    @else
                                        <option disabled value="Kamis, 15 September 2022 (10.00 - 12.00)" @if ($user->launching_schedule === "Kamis, 15 September 2022 (10.00 - 12.00)")
                                            selected
                                        @endif>Kamis, 15 September 2022 (10.00 - 12.00)</option>
                                        <option disabled value="Kamis, 15 September 2022 (13.00 - 15.00)" @if ($user->launching_schedule === "Kamis, 15 September 2022 (13.00 - 15.00)")
                                            selected
                                        @endif>Kamis, 15 September 2022 (13.00 - 15.00)</option>
                                        <option disabled value="Kamis, 15 September 2022 (16.00 - 18.00)" @if ($user->launching_schedule === "Kamis, 15 September 2022 (16.00 - 18.00)")
                                            selected
                                        @endif>Kamis, 15 September 2022 (16.00 - 18.00)</option>
                                        <option disabled value="Kamis, 15 September 2022 (19.00 - 21.00)" @if ($user->launching_schedule === "Kamis, 15 September 2022 (19.00 - 21.00)")
                                            selected
                                        @endif>Kamis, 15 September 2022 (19.00 - 21.00)</option>
                                        <option disabled value="Jumat, 16 September 2022 (10.00 - 12.00)" @if ($user->launching_schedule === "Jumat, 16 September 2022 (10.00 - 12.00)")
                                            selected
                                        @endif>Jumat, 16 September 2022 (10.00 - 12.00)</option>
                                        <option disabled value="Jumat, 16 September 2022 (13.00 - 15.00)" @if ($user->launching_schedule === "Jumat, 16 September 2022 (13.00 - 15.00)")
                                            selected
                                        @endif>Jumat, 16 September 2022 (13.00 - 15.00)</option>
                                        <option disabled value="Jumat, 16 September 2022 (16.00 - 18.00)" @if ($user->launching_schedule === "Jumat, 16 September 2022 (16.00 - 18.00)")
                                            selected
                                        @endif>Jumat, 16 September 2022 (16.00 - 18.00)</option>
                                        <option disabled value="Jumat, 16 September 2022 (19.00 - 21.00)" @if ($user->launching_schedule === "Jumat, 16 September 2022 (19.00 - 21.00)")
                                            selected
                                        @endif>Jumat, 16 September 2022 (19.00 - 21.00)</option>
                                        <option disabled value="Sabtu, 17 September 2022 (10.00 - 12.00)" @if ($user->launching_schedule === "Sabtu, 17 September 2022 (10.00 - 12.00)")
                                            selected
                                        @endif>Sabtu, 17 September 2022 (10.00 - 12.00)</option>
                                        <option disabled value="Sabtu, 17 September 2022 (13.00 - 15.00)" @if ($user->launching_schedule === "Sabtu, 17 September 2022 (13.00 - 15.00)")
                                            selected
                                        @endif>Sabtu, 17 September 2022 (13.00 - 15.00)</option>
                                        <option disabled value="Sabtu, 17 September 2022 (16.00 - 18.00)" @if ($user->launching_schedule === "Sabtu, 17 September 2022 (16.00 - 18.00)")
                                            selected
                                        @endif>Sabtu, 17 September 2022 (16.00 - 18.00)</option>
                                        <option disabled value="Sabtu, 17 September 2022 (19.00 - 21.00)" @if ($user->launching_schedule === "Sabtu, 17 September 2022 (19.00 - 21.00)")
                                            selected
                                        @endif>Sabtu, 17 September 2022 (19.00 - 21.00)</option>
                                        <option value="Senin, 19 September 2022 (16.00 - 18.00) @if ($user->launching_schedule === "Senin, 19 September 2022 (16.00 - 18.00)")
                                            selected
                                        @endif">Senin, 19 September 2022 (16.00 - 18.00)</option>
                                        <option value="Senin, 19 September 2022 (19.00 - 21.00) @if ($user->launching_schedule === "Senin, 19 September 2022 (19.00 - 21.00)")
                                            selected
                                        @endif">Senin, 19 September 2022 (19.00 - 21.00)</option>

                                    @endif
                                    </select>
                                </div>
                                @if ($user->campus_region == "Bandung")
                                {{-- Trial Class --}}
                                <div class="flex flex-col gap-2">
                                    <label for="jadwal-bncc-launching" class="text-mainblue text-lg font-medium">Jadwal Trial Class</label>
                                    <select id="jadwal-bncc-launching" name="trial_class" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 cursor-pointer border-[#DE3B25] outline-none">
                                    <option disabled value='Rabu, 14 September 2022 (15.10 - 17.30) - UI/UX Design' @if ($user->trial_class === "Rabu, 14 September 2022 (15.10 - 17.30) - UI/UX Design")
                                        selected
                                    @endif>Rabu, 14 September 2022 (15.10 - 17.30) - UI/UX Design</option>
                                    <option disabled value='Kamis, 15 September 2022 (15.10 - 17.30) - Front-End Development' @if ($user->trial_class === "Kamis, 15 September 2022 (15.10 - 17.30) - Front-End Development")
                                        selected
                                    @endif>Kamis, 15 September 2022 (15.10 - 17.30) - Front-End Development</option>
                                    <option disabled value='Jumat, 16 September 2022 (15.10 - 17.30) - Back-End Development' @if ($user->trial_class === "Jumat, 16 September 2022 (15.10 - 17.30) - Back-End Development")
                                        selected
                                    @endif>Jumat, 16 September 2022 (15.10 - 17.30) - Back-End Development</option>
                                    </select>
                                </div>
                                @endif
                                {{-- Email Pribadi --}}
                                <div class="flex flex-col gap-2">
                                    <label for="email-pribadi" class="text-mainblue text-lg font-medium">Email Pribadi</label>
                                    <input value="{{$user->email}}" name="personalEmail" id="email-pribadi" type="text" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 border-[#DE3B25] outline-none"
                                    placeholder="" oninput="">
                                </div>
                                {{-- Email Binus --}}
                                <div class="flex flex-col gap-2">
                                    <label for="" class="text-mainblue text-lg font-medium">Email Binus (DISABLED)</label>
                                    <input value="{{$user->binus_email}}" name="binusEmail" id="" type="text" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 border-[#DE3B25] outline-none"
                                    placeholder="" oninput="" disabled>
                                </div>
                                {{-- Region Kampus --}}
                                <div class="flex flex-col gap-2">
                                    <label for="region-kampus" class="text-mainblue text-lg font-medium">Region Kampus</label>
                                    <select name="campusRegion" id="region-kampus" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 cursor-pointer border-[#DE3B25] outline-none">
                                        <option value="Kemanggisan" @if ($user->campus_region === "Kemanggisan")
                                            selected
                                        @endif>Kemanggisan</option>
                                        <option value="Alam Sutera" @if ($user->campus_region === "Alam Sutera")
                                            selected
                                        @endif>Alam Sutera</option>
                                        <option value="Bandung" @if ($user->campus_region === "Bandung")
                                            selected
                                        @endif>Bandung</option>
                                        <option value="Malang" @if ($user->campus_region === "Malang")
                                            selected
                                        @endif>Malang</option>
                                        <option value="Bekasi" @if ($user->campus_region === "Bekasi")
                                            selected
                                        @endif>Bekasi</option>
                                        <option value="Senayan" @if ($user->campus_region === "Senayan")
                                            selected
                                        @endif>Senayan</option>
                                        <option value="Semarang" @if ($user->campus_region === "Semarang")
                                            selected
                                        @endif>Semarang</option>
                                        {{-- ganti value di bawah jadi BOL --}}
                                        <option value="BOL" @if  ($user->campus_region === "BOL")
                                            selected
                                        @endif>BOL</option>
                                        <option value="ASO" @if  ($user->campus_region === "ASO")
                                            selected
                                        @endif>ASO</option>
                                    </select>
                                </div>
                                {{-- Fakultas --}}
                                <div class="flex flex-col gap-2">
                                    <label for="fakultas" class="text-mainblue text-lg font-medium">Fakultas</label>
                                    <select id="fakultas" name="faculty" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 cursor-pointer border-[#DE3B25] outline-none">
                                        <option value="{{$user->faculty}}" selected>{{$user->faculty}}</option>
                                        <option value="BOL">BOL</option>
                                        <option value="ASO">ASO</option>
                                        <option value="Binus Business School">Binus Business School</option>
                                        <option value="Faculty of Economics and Communication">Faculty of Economics and Communication</option>
                                        <option value="Faculty of Engineering">Faculty of Engineering</option>
                                        <option value="Faculty of Humanities">Faculty of Humanities</option>
                                        <option value="Faculty of Industrial">Faculty of Industrial</option>
                                        <option value="Engineering">Engineering</option>
                                        <option value="FX">FX</option>
                                        <option value="JWC">JWC</option>
                                        <option value="School of Computer Science">School of Computer Science</option>
                                        <option value="School of Design">School of Design</option>
                                        <option value="School of Information Systems">School of Information Systems</option>
                                    </select>
                                </div>
                                {{-- Jurusan --}}
                                <div class="flex flex-col gap-2">
                                    <label for="jurusan" class="text-mainblue text-lg font-medium">Jurusan</label>
                                    <select id="jurusan" name="major" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 cursor-pointer border-[#DE3B25] outline-none">
                                        <option value="{{$user->major}}" selected>{{$user->major}}</option>
                                        <option value="Accounting">Accounting</option>
                                        <option value="Automotive and Robotics Engineering">Automotive and Robotics Engineering</option>
                                        <option value="Architecture">Architecture</option>
                                        <option value="Business Analytics">Business Analytics</option>
                                        <option value="Business Creation">Business Creation</option>
                                        <option value="Business Hotel Management">Business Hotel Management</option>
                                        <option value="Business Information Systems (International Program)">Business Information Systems (International Program)</option>
                                        <option value="Business Information Technology">Business Information Technology</option>
                                        <option value="Business Management">Business Management</option>
                                        <option value="Business Management & Marketing (International Program)">Business Management & Marketing (International Program)</option>
                                        <option value="Chinese Literature">Chinese Literature</option>
                                        <option value="Civil Engineering">Civil Engineering</option>
                                        <option value="Communication">Communication</option>
                                        <option value="Communication (International Program)">Communication (International Program)</option>
                                        <option value="Communication - Marketing Communication">Communication - Marketing Communication</option>
                                        <option value="Communication - Mass Communication">Communication - Mass Communication</option>
                                        <option value="Computer Engineering">Computer Engineering</option>
                                        <option value="Computer Science">Computer Science</option>
                                        <option value="Computer Science & Mathematics">Computer Science & Mathematics</option>
                                        <option value="Computer Science & Statistics">Computer Science & Statistics</option>
                                        <option value="Computer Science (International Program)">Computer Science (International Program)</option>
                                        <option value="Creativepreneurship">Creativepreneurship</option>
                                        <option value="Cyber Security">Cyber Security</option>
                                        <option value="Data Science">Data Science</option>
                                        <option value="Digital Business">Digital Business</option>
                                        <option value="Digital Business Innovation">Digital Business Innovation</option>
                                        <option value="English Literature">English Literature</option>
                                        <option value="Entrepreneurship - Business Creation">Entrepreneurship - Business Creation</option>
                                        <option value="Fashion Design (International Program)">Fashion Design (International Program)</option>
                                        <option value="Fashion Management (International Program)">Fashion Management (International Program)</option>
                                        <option value="Film">Film</option>
                                        <option value="Finance">Finance</option>
                                        <option value="Finance (International Program)">Finance (International Program)</option>
                                        <option value="Food Technology">Food Technology</option>
                                        <option value="Game Application and Technology">Game Application and Technology</option>
                                        <option value="Global Business Marketing">Global Business Marketing</option>
                                        <option value="Graphic Design and New Media (International Program)">Graphic Design and New Media (International Program)</option>
                                        <option value="Hotel Management">Hotel Management</option>
                                        <option value="Industrial Engineering">Industrial Engineering</option>
                                        <option value="Information Systems">Information Systems</option>
                                        <option value="Information Systems & Accounting">Information Systems & Accounting</option>
                                        <option value="Information Systems & Management">Information Systems & Management</option>
                                        <option value="Information Systems Accounting and Auditing">Information Systems Accounting and Auditing</option>
                                        <option value="Interactive Design & Technology">Interactive Design & Technology</option>
                                        <option value="Interactive Digital Media (International Program)">Interactive Digital Media (International Program)</option>
                                        <option value="Interior Design">Interior Design</option>
                                        <option value="International Business (International Program)">International Business (International Program)</option>
                                        <option value="International Business Management">International Business Management</option>
                                        <option value="International Relations">International Relations</option>
                                        <option value="Japanese Literature">Japanese Literature</option>
                                        <option value="Law - Business Law">Law - Business Law</option>
                                        <option value="Management">Management</option>
                                        <option value="Master of Computer Science">Master of Computer Science</option>
                                        <option value="Master of Information Systems">Master of Information Systems</option>
                                        <option value="Master of Information Systems Management">Master of Information Systems Management</option>
                                        <option value="Master of Management">Master of Management</option>
                                        <option value="Mobile Application and Technology">Mobile Application and Technology</option>
                                        <option value="Primary Teacher Education">Primary Teacher Education</option>
                                        <option value="Product Design Engineering">Product Design Engineering</option>
                                        <option value="Psychology">Psychology</option>
                                        <option value="Public Relations">Public Relations</option>
                                        <option value="Software Engineering">Software Engineering</option>
                                        <option value="Taxation">Taxation</option>
                                        <option value="Tourism">Tourism</option>
                                        <option value="Visual Communication Design">Visual Communication Design</option>
                                        <option value="Visual Communication Design - Animation">Visual Communication Design - Animation</option>
                                        <option value="Visual Communication Design - Creative Advertising">Visual Communication Design - Creative Advertising</option>
                                        <option value="Visual Communication Design - New Media">Visual Communication Design - New Media</option>
                                    </select>
                                </div>
                                {{-- Batch FYP --}}
                                <div class="flex flex-col gap-2">
                                    <label for="batch-fyp" class="text-mainblue text-lg font-medium">Batch FYP</label>
                                    <select name="batch" id="batch-fyp" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 cursor-pointer border-[#DE3B25] outline-none">
                                        <option value="{{$user->batch}}" selected>{{$user->batch}}</option>
                                        <option value="1" @if ($user->batch === "1")
                                            disabled
                                        @endif>1</option>
                                        <option value="2" @if ($user->batch === "2")
                                            disabled
                                        @endif>2</option>
                                        <option value="3" @if ($user->batch === "3")
                                            disabled
                                        @endif>3</option>
                                        <option value="4" @if ($user->batch === "4")
                                            disabled
                                        @endif>4</option>
                                        <option value="5" @if ($user->batch === "5")
                                            disabled
                                        @endif>5</option>
                                        <option value="6" @if ($user->batch === "6")
                                            disabled
                                        @endif>6</option>
                                    </select>
                                </div>
                                {{-- Agama --}}
                                <div class="flex flex-col gap-2">
                                    <label for="agama" class="text-mainblue text-lg font-medium">Agama</label>
                                    <select type="text" id="agama" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 cursor-pointer border-[#DE3B25] outline-none">
                                        <option value="Budha" @if ($user->agama === "Budha")
                                            selected
                                        @endif>Budha</option>
                                        <option value="Hindu" @if ($user->agama === "Hindu")
                                            selected
                                        @endif>Hindu</option>
                                        <option value="Islam" @if ($user->agama === "Islam")
                                            selected
                                        @endif>Islam</option>
                                        <option value="Konghucu" @if ($user->agama === "Konghucu")
                                            selected
                                        @endif>Konghucu</option>
                                        <option value="Kristen Katolik" @if ($user->agama === "Kristen Katolik")
                                            selected
                                        @endif>Kristen Katolik</option>
                                        <option value="Kristen Protestan" @if ($user->agama === "Kristen Protestan")
                                            selected
                                        @endif>Kristen Protestan</option>
                                    </select>
                                </div>
                                {{-- Status --}}
                                <div class="flex flex-col gap-2">
                                    <label for="lnt_course" class="text-mainblue text-lg font-medium">Status</label>
                                    <select name="status" id="lnt_course" class="text-lg font-normal text-[#636772] bg-[#E1E5E8] px-3 rounded-xl w-96 h-14 cursor-pointer border-[#DE3B25] outline-none">
                                        <option value="0" @if ($user->status == "0")
                                            selected
                                        @endif>0</option>
                                        <option value="1" @if ($user->status == "1")
                                            selected
                                        @endif>1</option>
                                        <option value="2" @if ($user->status == "2")
                                            selected
                                        @endif>2</option>
                                        <option value="3" @if ($user->status == "3")
                                            selected
                                        @endif>3</option>
                                        <option value="4" @if ($user->status == "4")
                                            selected
                                        @endif>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="flex justify-between font-poppins">
                        @if (Auth::user()->role == 1)
                            <a href="{{ route('viewSuperUser') }}" class="button_alt text-base font-semibold font-poppins px-8 py-1">Cancel</a>
                            {{-- <button type="button" onclick="openEditModal({{$user->id}}, 'superadmin')" id="edit-btn" class="button rounded-full text-base font-semibold font-poppins px-8 py-1">Save Changes</button> --}}
                        @else
                            <a href="{{ route('viewUser') }}" class="button_alt text-base font-semibold font-poppins px-8 py-1">Cancel</a>
                            {{-- <button type="button" onclick="openEditModal({{$user->id}}, 'admin')" id="edit-btn" class="button rounded-full text-base font-semibold font-poppins px-8 py-1">Save Changes</button> --}}
                        @endif
                        {{-- <form @if (Auth::user()->role = 1)
                            action="{{route('updateSuperUser',['id'=>$user->id])}}"
                        @else
                            action="{{route('updateUser',['id'=>$user->id])}}"
                        @endif
                        method="GET">
                            @csrf
                            @method('patch')
                            <button type="button" onclick="validateForm()" id="edit-btn" class="button rounded-full text-base font-semibold font-poppins px-8 py-1">Save Changes</button>
                        </form> --}}
                        <button type="submit" onclick="validateForm()" class="button rounded-full text-base font-semibold font-poppins px-8 py-1">Save Changes</button>
                    </div>
                </section>
            </form>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/admin-dashboard.js?t=160920221256') }}"></script>
    <script src="{{ asset('js/admin-edit.js?t=160920221256') }}"></script>
</body>
</html>
