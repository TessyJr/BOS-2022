<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BNCC Opening Season</title>
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css?t=160920221052') }}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/favicon/favicon.svg?t=270720221356')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
</head>
<body>
    {{-- Logout Popup --}}
    <section id="logout-popup" class="hidden fixed bg-overlay w-screen h-screen z-[100] flex justify-center items-center font-poppins">
        <div class="bg-white rounded-3xl tablet:w-[720px] w-[360px] tablet:p-32 p-16 flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
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

    {{-- Delete Confirmation Popup --}}
    <section id="delete-regist-popup" class="hidden fixed bg-overlay w-screen h-screen z-[100] flex justify-center items-center font-poppins">
        <div class="bg-white rounded-3xl tablet:w-[720px] w-[360px] tablet:p-32 p-16 flex flex-col justify-center items-center content-center tablet:gap-8 gap-4 relative">
            <img src="{{ asset('assets/icon/Logout.svg') }}" alt="Logout" class="tablet:h-32 h-20">
            <h1 class="tablet:text-3xl text-base font-poppins font-semibold text-center">Apa kamu yakin ingin menghapus data tersebut?</h1>
            <div class="flex justify-center tablet:gap-8 gap-4">
                <button class="button_alt font-semibold tablet:text-2xl text-sm tablet:w-40 w-28" id="delete-cancel" onclick="closeDeletePopup()">Tidak</button>
                <form action="" id="confirmDelete" method="GET">
                    @csrf
                    <button class="button font-semibold tablet:text-2xl text-sm tablet:w-40 w-28 rounded-full text-center">Iya</button>
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
                    <a href="{{route('viewUser')}}" class="text-xl font-semibold flex items-center">Participants</a>
                    <a href="{{route('adminPayment')}}" class="text-black text-xl font-semibold flex items-center">Payment</a>
                    <a href="{{route('viewMember')}}" class="text-black text-xl font-semibold flex items-center">Registration</a>
                    <div class="flex flex-col items-center">
                        <a href="{{route('viewMember2')}}" class="text-mainblue_dark text-xl font-semibold flex items-center">Re-Registered</a>
                        <div class="bg-mainblue_dark w-20 h-1 mt-10  absolute rounded"></div>
                    </div>

                    <div id="dropdown-wrapper" class="inline-block">
                        <button onclick="navMenu()"
                            class="text-black text-xl font-semibold flex items-center gap-4">
                            Admin <img src="{{ asset('assets/icon/Dropdown_Down.svg') }}" alt="" class="h-3"></button>
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

        {{-- Participant Content --}}
        <section class="card flex flex-col gap-6">
            <div class="flex justify-between">
                <h1 class="text-mainblue_dark font-extrabold font-montserrat text-4xl">Re-Registration</h1>
                @if (Auth::user()->campus_region == "Kemanggisan")
                    <h1 class="text-mainblue_dark font-extrabold font-montserrat text-4xl">BNCC Kemanggisan Admin</h1>
                @elseif (Auth::user()->campus_region == "Alam Sutera")
                    <h1 class="text-mainblue_dark font-extrabold font-montserrat text-4xl">BNCC Alam Sutera Admin</h1>
                @elseif (Auth::user()->campus_region == "Bandung")
                    <h1 class="text-mainblue_dark font-extrabold font-montserrat text-4xl">BNCC Bandung Admin</h1>
                @else
                    <h1 class="text-mainblue_dark font-extrabold font-montserrat text-4xl">BNCC Malang Admin</h1>
                @endif
            </div>
            <div class="flex justify-between gap-4 font-poppins">
                <form action="" class="w-full">
                    @csrf
                    @if (request('limit'))
                        <input type="hidden" name="limit" value="{{request('limit')}}">
                    @endif
                    <div class="flex bg-lightgray rounded-2xl px-5 py-1 gap-4 items-center w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                          </svg>
                        <input type="text" name="search" class="text-gray-400  text-xl rounded-xl bg-lightgray outline-none w-full" placeholder="Search..." value="{{request('search')}}">
                    </div>
                </form>
            </div>

            {{-- Table Data --}}
            <table class="flex flex-col overflow-y-scroll border-collapse h-full w-full font-poppins">
                <thead class="w-fit whitespace-nowrap">
                    <tr class="bg-mainblue text-white text-sm font-semibold flex items-center gap-4 py-4 px-8">
                        <th scope="col" class="w-8">No</th>
                        <th scope="col" class="w-20">Action</th>
                        <th scope="col" class="w-28">Time Stamp</th>
                        <th scope="col" class="w-32">Nama Lengkap</th>
                        <th scope="col" class="w-80">Linkedin URL</th>
                        <th scope="col" class="w-80">Github URL</th>
                        <th scope="col" class="w-48">LnT Course</th>
                    </tr>
                </thead>
                <tbody class="w-fit">
                    @foreach ($members as $i => $member)
                        <tr class="flex items-center text-center gap-4 py-4 px-8">
                            <td class="text-sm font-medium w-8">
                                {{($limit * ($page - 1))+ $i + 1}}
                            </td>
                            <td class="flex justify-center content-center gap-2 w-20">
                                <button><img src="{{ asset('assets/icon/Admin/Delete.svg') }}" alt="" class="h-8" id="delete-btn" type="button" onclick="openDeleteModal({{$member->id}},'admin')"></button>
                            </td>
                            <td class="text-sm font-medium w-28">
                                {{date('d-m-Y', strtotime($member->created_at))}} <br> {{date('H:i:s', strtotime($member->created_at))}}
                            </td>
                            <td class="text-sm font-medium w-32">
                                {{$member->user->fullName}}
                            </td>
                            <td class="text-sm font-medium w-80">{{$member->linkedinUrl}}</td>
                            <td class="text-sm font-medium w-80">{{$member->githubUrl}}</td>
                            <td class="flex justify-center content-center gap-2 w-48">{{$member->lnt_course}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Showing Data Qty --}}
            <div class="flex items-center gap-2 font-semibold text-sm font-poppins">Showing
                <div id="show-wrapper" class="inline-block z-0">
                    @if (request('limit'))
                        <button onclick="showQty()"
                            class="flex items-center border py-0 px-2 gap-2 rounded-md cursor-pointer">
                            {{request('limit')}}
                            <img src="{{ asset('assets/icon/Dropdown_Down.svg') }}" alt="" class="h-2"></button>
                    @else
                        <button onclick="showQty()"
                            class="flex items-center border py-0 px-2 gap-2 rounded-md cursor-pointer">
                            20<img src="{{ asset('assets/icon/Dropdown_Down.svg') }}" alt="" class="h-2"></button>
                    @endif
                    <form action="">
                        @csrf
                        @if (request('search'))
                            <input type="hidden" name="search" value="{{request('search')}}">
                        @endif
                        <div id="show-menu" class="hidden flex flex-col bg-lightgray drop-shadow-md absolute z-0">
                            <button name="limit" value="20" class="py-0 px-2 text-black text-sm font-semibold hover:text-blue-600 border-b border-gray-200 flex gap-3 items-center" href="#" id="" type="submit">20</button>
                            <button name="limit" value="50" class="py-0 px-2 text-black text-sm font-semibold hover:text-blue-600 border-b border-gray-200 flex gap-3 items-center" href="#" id="" type="submit">50</button>
                        </div>
                    </form>
                </div>
                out of
                {{$total}}
            </div>

            {{-- Pagination --}}
            {{-- <div class="flex justify-center items-center gap-2 -mt-14 w-auto mx-auto font-poppins">
                <form action="" class="flex justify-center items-center gap-3">
                    @csrf
                    @if (request('limit'))
                        @if ($total > request('limit'))
                            <button type="submit" name="page" value="1" class="h-7 w-7 border rounded-md font-semibold text-sm bg-mainblue_dark text-white">1</button>
                            {{$users->links()}}
                            @if ($page_total>3)
                                <button type="submit" value="{{$page_total}}" class="h-7 w-7 border rounded-md font-semibold text-sm bg-mainblue_dark text-white">{{$page_total}}</button>
                            @endif
                        @else
                            <button type="button" name="page" value="1" disabled class="h-7 w-7 border rounded-md font-semibold text-sm bg-mainblue_dark text-white">1</button>
                        @endif
                    @else
                        @if ($total > 20)
                            <button type="submit" name="page" value="1" class="h-7 w-7 border rounded-md font-semibold text-sm bg-mainblue_dark text-white">1</button>
                            {{$users->links()}}
                            @if ($page_total>3)
                                <button type="submit" value="{{$page_total}}" class="h-7 w-7 border rounded-md font-semibold text-sm bg-mainblue_dark text-white">{{$page_total}}</button>
                            @endif
                        @else
                            <button type="button" name="page" value="1" disabled class="h-7 w-7 border rounded-md font-semibold text-sm bg-mainblue_dark text-white">1</button>
                        @endif
                    @endif
                </form>
            </div> --}}

             <div class="flex justify-center items-center gap-2 -mt-14 w-auto mx-auto font-poppins">
                <form action="" class="flex justify-center items-center gap-3">
                    @csrf
                    @if (request('limit'))
                        @if ($total > request('limit'))
                            {{-- <button type="submit" name="page" value="1" class="h-7 w-7 border rounded-md font-semibold text-sm bg-mainblue_dark text-white">1</button> --}}
                            {{$members->links('pagination::tailwind')}}
                            {{-- @if ($page_total>3)
                                <button type="submit" value="{{$page_total}}" class="h-7 w-7 border rounded-md font-semibold text-sm bg-mainblue_dark text-white">{{$page_total}}</button>
                            @endif --}}
                        @else
                            <button type="button" name="page" value="1" disabled class="h-7 w-7 border rounded-md font-semibold text-sm bg-mainblue_dark text-white">1</button>
                        @endif
                    @else
                        @if ($total > 20)
                            {{-- <button type="submit" name="page" value="1" class="h-7 w-7 border rounded-md font-semibold text-sm bg-mainblue_dark text-white">1</button> --}}
                            {{$members->links('pagination::tailwind')}}
                            {{-- @if ($page_total>3)
                                <button type="submit" value="{{$page_total}}" class="h-7 w-7 border rounded-md font-semibold text-sm bg-mainblue_dark text-white">{{$page_total}}</button>
                            @endif --}}
                        @else
                            <button type="button" name="page" value="1" disabled class="h-7 w-7 border rounded-md font-semibold text-sm bg-mainblue_dark text-white">1</button>
                        @endif
                    @endif
                </form>
            </div>


            <form action="{{route('donwloadMember2Data',['region'=>Auth::user()->campus_region])}}" method="GET">
                @csrf
                @method('GET')
                <div class="flex justify-end -mt-14 w-full font-poppins">
                    <button class="button font-semibold text-lg w-96 text-center rounded-2xl px-5 gap-2 flex items-center justify-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>Download Participants Data</button>
                </div>
            </form>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/admin-dashboard.js?t=150920221037') }}"></script>
    <script src="{{ asset('js/admin-reregist.js?t=210920221103') }}"></script>
</body>
</html>
