{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<div class="container w-[90%] h-full mx-auto space-y-10 sm:w-4/5 md:w-3/5 lg:w-1/2 pt-36 pb-28">
    <section>
        <form action="/track" method="get" class="flex flex-col w-full h-full">
            <div class="w-full h-full p-6 space-y-10 bg-white border rounded-xl border-slate-200">
                <div class="flex flex-col justify-between h-full space-y-2 sm:space-x-4 sm:flex-row">
                    <div class="flex flex-col justify-between space-y-1">
                        <h3 class="text-xl font-semibold">Pencarian</h3>
                        <p class="max-w-sm text-xs sm:text-sm text-slate-600">Lacak progress bugs/issue berdasarkan opsi pencarian yang dipilih</p>
                    </div>
                    <div class="flex flex-col justify-between h-full">
                        <label class="label">
                            <span class="label-text-alt">Cari berdasarkan</span>
                        </label>
                        <select class="font-normal select select-sm sm:select-md" id="search-by">
                            <option class="font-normal" value="1">Kode Referensi</option>
                            <option class="font-normal" value="2" {{request()->input('pic') ? 'Selected' : ''}}>Nama PIC</option>
                        </select> 
                    </div>
                </div>
                <form action="/track" method="get">
                    <div class="w-full space-y-6" id="search-container">
                        @if(request()->has("pic"))
                        <div class="w-full form-control">
                            <label class="label">
                                <span class="font-semibold label-text">PIC</span>
                            </label>
                            <select class="font-normal select select-bordered" name="pic" id="pic" onchange="findServices()" required>
                                <option disabled selected>Pilih salah satu PIC</option>
                                @for($k =0; $k < count($pic); $k++)
                                <option value="{{$pic[$k]}}" {{request()->input('pic') == $pic[$k] ? 'Selected' : ''}}>{{$pic[$k]}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="w-full form-control">
                            <label class="label">
                                <span class="font-semibold label-text">Layanan</span>
                            </label>
                            <select class="font-normal select select-bordered" name="service" id="services" required>
                                <option value="request()->input('service')" selected>{{request()->input('service')}}</option>
                            </select>
                        </div>
                        <div class="pt-6">
                            <button type="submit" class="w-full text-white rounded-full btn btn-primary">Search</button>
                        </div>
                        @else
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="text" name="search" id="default-search" value="{{request()->search}}" class="block w-full p-4 pl-10 text-xs text-gray-900 border border-gray-200 rounded-lg sm:text-sm input bg-gray-50" placeholder="Masukkan Kode Referensi" required>
                            <button type="submit" class="text-white absolute right-2.5 bottom-1.5 bg-primary hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
        </form>
    </section>

    @if($result != null)
    <section class="flex flex-col w-full h-full px-6">
        <h1 class="text-2xl font-semibold">Result</h1>
    </section>

    <section class="space-y-5">
        <div class="w-full h-full p-6 mb-6 space-y-6 bg-white border rounded-xl border-slate-200">
            <div>
                <h3 class="text-lg">Kode Referensi: <span class="font-semibold">{{$result[0]["reference_code"]}}</span></h3>
            </div>
            <div class="flex flex-col justify-between w-full space-y-6 sm:space-y-0 sm:space-x-2 sm:flex-row">
                <div class="flex flex-col w-full space-y-6">
                    <div class="flex items-center w-full space-x-4">
                        <div class="flex items-center justify-center p-2 bg-blue-200 rounded-xl">
                            <span class="material-symbols-rounded text-primary">event</span>
                        </div>
                        <div class="w-full">
                            <p class="text-xs">Tanggal & Waktu</p>
                            <p class="text-base font-medium text-gray-700">{{date('Y:m:d H:i:s', strtotime($result[0]["start_date"]))}}</p>
                        </div>
                    </div>
                    <div class="flex items-center w-full space-x-4">
                        <div class="flex items-center justify-center p-2 bg-blue-200 rounded-xl">
                            <span class="material-symbols-rounded text-primary">home_repair_service</span>
                        </div>
                        <div class="w-full">
                            <p class="text-xs">Layanan Terkait</p>
                            <p class="text-base font-medium text-gray-700">{{$result[0]["service"] ? $result[0]["service"] : '-'}}</p>
                        </div>
                    </div>
                    <div class="flex items-center w-full space-x-4">
                        <div class="flex items-center justify-center p-2 bg-blue-200 rounded-xl">
                            <span class="material-symbols-rounded text-primary">widgets</span>
                        </div>
                        <div class="w-full">
                            <p class="text-xs">Platform</p>
                            <p class="text-base font-medium text-gray-700">{{$result[0]["platform"] ? $result[0]["platform"] : '-'}}</p>
                        </div>
                    </div>
                    <div class="flex items-center w-full space-x-4">
                        <div class="flex items-center justify-center p-2 bg-blue-200 rounded-xl">
                            <span class="material-symbols-rounded text-primary">link</span>
                        </div>
                        <div class="w-full">
                            <p class="text-xs">Platform Link</p>
                            <p class="text-base font-medium text-gray-700">{{$result[0]["platform_link"] ? $result[0]["platform_link"] : '-'}}</p>
                        </div>
                    </div>
                    @if($result[0]["resolved_time"] != null)
                    <div class="flex items-center w-full space-x-4">
                        <div class="flex items-center justify-center p-2 bg-blue-200 rounded-xl">
                            <span class="material-symbols-rounded text-primary">event_available</span>
                        </div>
                        <div class="w-full">
                            <p class="text-xs">Tiket Resolved/Closed</p>
                            <p class="text-base font-medium text-gray-700">{{date('Y:m:d H:i:s', strtotime($result[0]["resolved_time"]))}}</p>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="flex flex-col w-full space-y-6">
                    <div class="flex items-center w-full space-x-4">
                        <div class="flex items-center justify-center p-2 bg-blue-200 rounded-xl">
                            <span class="material-symbols-rounded text-primary">confirmation_number</span>
                        </div>
                        <div class="w-full">
                            <p class="text-xs">Ticket ID</p>
                            <p class="text-base font-medium text-gray-700">{{$result[0]["ticket_id"] ? $result[0]["ticket_id"] : '-'}}</p>
                        </div>
                    </div>
                    <div class="flex items-center w-full space-x-4">
                        <div class="flex items-center justify-center p-2 bg-blue-200 rounded-xl">
                            <span class="material-symbols-rounded text-primary">signal_cellular_3_bar</span>
                        </div>
                        <div class="w-full">
                            <p class="text-xs">Impact</p>
                            <p class="text-base font-medium text-gray-700">
                                @switch(true)
                                    @case($result[0]["impact"] == 1)
                                        Low
                                        @break
                                    @case($result[0]["impact"] == 2)
                                        Medium
                                        @break
                                    @case($result[0]["impact"] == 3)
                                        High
                                        @break
                                @endswitch
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center w-full space-x-4">
                        <div class="flex items-center justify-center p-2 bg-blue-200 rounded-xl">
                            <span class="material-symbols-rounded text-primary">construction</span>
                        </div>
                        <div class="w-full">
                            <p class="text-xs">Channel</p>
                            <p class="text-base font-medium text-gray-700">{{$result[0]["channel"] ? $result[0]["channel"] : '-'}}</p>
                        </div>
                    </div>
                    <div class="flex items-center w-full space-x-4">
                        <div class="flex items-center justify-center p-2 bg-blue-200 rounded-xl">
                            <span class="material-symbols-rounded text-primary">assignment_ind</span>
                        </div>
                        <div class="w-full">
                            <p class="text-xs">PIC</p>
                            <p class="text-base font-medium text-gray-700">{{$result[0]["pic"]}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full h-full p-6 mb-6 space-y-6 bg-white border rounded-xl border-slate-200">
            <div class="w-full space-y-2">
                <h3 class="text-lg font-medium">Deskripsi Masalah</h3>
                <p class="text-justify text-gray-700">{{$result[0]["detail"]}}</p>
            </div>
        </div>
        <div class="w-full h-full p-6 mb-6 space-y-12 bg-white border rounded-xl border-slate-200">
            <div>
                <h3 class="text-lg font-medium">Progress</h3>
            </div>
            <div class="flex flex-col w-full h-full space-y-1">
                <div class="flex justify-between w-full">
                    <div class="space-y-20 w-fit">
                        <div class="w-fit">
                            <p class="text-sm">{{date('Y-m-d', strtotime($result[0]["start_date"]))}}</p>
                            <p class="text-lg font-medium">{{date('H:i', strtotime($result[0]["start_date"]))}}</p>
                        </div>
                    </div>
                    <div class="w-[10%] flex flex-col items-center space-y-1">
                        <div class="w-6 h-6 border-2 border-red-800 rounded-full bg-red-50"></div>
                        @if($histories != null)
                        <div class="h-24 border border-gray-500 border-dashed "></div>
                        @endif
                    </div>
                    <div class="w-[70%] space-y-20">
                        <div class="w-full">
                            <p class="text-sm">Pesan:</p>
                            <p class="text-lg font-medium">Permasalahan dialami dan terdeteksi</p>
                        </div>
                    </div>
                </div>
                @if($histories != null)

                @php
                    $count_history = count($histories);
                @endphp

                @for($i=0; $i < $count_history; $i++)
                <div class="flex justify-between w-full">
                    <div class="space-y-20 w-fit">
                        <div class="w-fit">
                            <p class="text-sm">{{date('Y-m-d', strtotime($histories[$i]["date"]))}}</p>
                            <p class="text-base font-medium sm:text-lg">{{date('H:i', strtotime($histories[$i]["date"]))}}</p>
                        </div>
                    </div>
                    <div class="w-[10%] flex flex-col items-center space-y-1">
                        <div class="h-6 w-6 rounded-full {{ $i != $count_history-1 ? 'bg-red-50 border-2 border-red-800' : ($histories[$i]['update_type'] == 2 ? 'bg-green-700' : 'bg-red-800') }}"></div>
                        @if($i != $count_history-1)
                        <div class="h-24 border border-gray-500 border-dashed "></div>
                        @endif
                    </div>
                    <div class="w-[70%] space-y-20">
                        <div class="w-full">
                            <p class="text-sm"> {{$histories[$i]["update_type"] == 2 ? 'Pesan closed tiket:' : 'Pesan:'}}</p>
                            <p class="text-base font-medium sm:text-lg">{{$histories[$i]["update_message"]}}</p>
                        </div>
                    </div>
                </div>
                @endfor
                @endif
            </div>
            @if($result[0]["resolved_time"] == null)
            <button class="w-full rounded-full btn btn-primary" id="update-btn">Update</button>
            @endif
        </div>
    </section>

    @if($result[0]["resolved_time"] == null)
    <section>
        <button class="w-full rounded-xl btn btn-primary btn-outline" id="resolved-btn">Tutup/Resolved</button>
    </section>
    @endif

    @endif

    @if($ticket_list != null)
    <section class="flex flex-col w-full h-full px-6">
        <h1 class="text-2xl font-semibold">Result</h1>
    </section>
    
    <div class="overflow-x-auto bg-white rounded-xl">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>Deskripsi Masalah</th>
                    <th>Tanggal & Waktu</th>
                    <th>Impact</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @for($i=0; $i < count($ticket_list); $i++)
                <tr class="group">
                    <td>
                        <div class="line-clamp-2 group-hover:line-clamp-none">
                            {{$ticket_list[$i]["detail"]}}
                        </div>
                    </td>
                    <td>
                        {{date('Y-m-d', strtotime($ticket_list[$i]["start_date"]))}}
                    </td>
                    <td>
                        @switch($ticket_list[$i]["impact"])
                            @case($ticket_list[$i]["impact"] == 1)
                                <div class="px-4 text-white bg-blue-600 border-0 badge">
                                Low
                                </div>
                                @break
                            @case($ticket_list[$i]["impact"] == 2)
                                <div class="px-4 text-white bg-yellow-600 border-0 badge">
                                Medium
                                </div>
                                @break
                            @case($ticket_list[$i]["impact"] == 3)
                                <div class="px-4 text-white bg-red-600 border-0 badge">
                                High
                                </div>
                                @break

                        @endswitch
                    </td>
                    <th>
                        <a href="/track?search={{$ticket_list[$i]['reference_code']}}" target="_blank" class="btn btn-ghost btn-xs">details</a>
                    </th>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
    @endif

</div>

@if($result != null)
    @include('elements/update-modal')
    @include('elements/resolved-modal')
@endif

@if(session()->has("success"))
    @include("elements/update-success-notification");
@endif

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>
    let searchContainer = document.getElementById("search-container");

    $(document).ready(function() {
    $('#search-by').change(function() {
        let searchBy = $(this).val();

        switch(true){
            case (searchBy == 1):
                searchContainer.innerHTML = `
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" name="search" id="default-search" value="{{request()->search}}" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-200 rounded-lg input bg-gray-50" placeholder="Masukkan Kode Referensi disini" required>
                        <button type="submit" class="text-white absolute right-2.5 bottom-1.5 bg-primary hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                    </div>
                `;
                console.log(searchBy);
                break;
            case (searchBy == 2):
                searchContainer.innerHTML = `
                    <div class="w-full form-control">
                        <label class="label">
                            <span class="font-semibold label-text">PIC</span>
                        </label>
                        <select class="font-normal select select-bordered" name="pic" id="pic" onchange="findServices()" required>
                            <option disabled selected>Pilih salah satu PIC</option>
                            <option>Star Wars</option>
                            <option>Harry Potter</option>
                            <option>Lord of the Rings</option>
                            <option>Planet of the Apes</option>
                            <option>Star Trek</option>
                        </select>
                    </div>
                    <div class="w-full form-control">
                        <label class="label">
                            <span class="font-semibold label-text">Layanan</span>
                        </label>
                        <select class="font-normal select select-bordered" name="service" id="services" required>
                            <option disabled selected>Pilih salah satu layanan</option>
                            <option>Star Wars</option>
                            <option>Harry Potter</option>
                            <option>Lord of the Rings</option>
                            <option>Planet of the Apes</option>
                            <option>Star Trek</option>
                        </select>
                    </div>
                    <div class="pt-6">
                        <button type="submit" class="w-full text-white rounded-full btn btn-primary">Search</button>
                    </div>
                `;

                $.ajax({
                url: '/get-pic',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                        $('#pic').empty();
                        $('#pic').append('<option value="" selected disabled>Pilih salah satu</option>');
                        $.each(data, function(key, value) {
                            $('#pic').append('<option value="'+ value +'">'+ value +'</option>');
                        });
                        console.log(data);
                    }
                });

                console.log(searchBy);
                break;
        }
        
        });
    });
</script>

<script>
    function findServices() {
        let pic = document.getElementById("pic");
        let picName = pic.value;
        
        $.ajax({
        url: '/get-services/' + picName,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
                $('#services').empty();
                $('#services').append('<option value="" selected disabled>Pilih salah satu</option>');
                $.each(data, function(key, value) {
                    $('#services').append('<option value="'+ value +'">'+ value +'</option>');
                });
                console.log(data);
            }
        });
    }
</script>
@endsection