{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<div class="container w-1/2 h-full mx-auto space-y-10 pt-36 pb-28">
    <section>
        <form action="/track" method="get" class="flex flex-col w-full h-full">
            <div class="w-full h-full p-6 space-y-6 bg-white border rounded-xl border-slate-200">
                <div>
                    <h3 class="text-lg font-medium">Pencarian</h3>
                    <p class="text-sm text-slate-600">Lacak progress bugs/issue berdasarkan Kode Referensi</p>
                </div>
                <div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" name="search" id="default-search" value="{{request()->search}}" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-200 rounded-lg input bg-gray-50" placeholder="Masukkan Kode Referensi disini" required>
                        <button type="submit" class="text-white absolute right-2.5 bottom-1.5 bg-primary hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
                    </div>
                </div>
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
                <h3 class="text-lg">ID: <span class="font-semibold">{{$result[0]["reference_code"]}}</span></h3>
            </div>
            <div class="flex justify-between w-full space-x-2">
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
                            <p class="text-base font-medium text-gray-700">{{$result[0]["impact"]}}</p>
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
                            <p class="text-lg font-medium">{{date('H:i', strtotime($histories[$i]["date"]))}}</p>
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
                            <p class="text-sm">Pesan:</p>
                            <p class="text-lg font-medium">{{$histories[$i]["update_message"]}}</p>
                        </div>
                    </div>
                </div>
                @endfor
                @endif
            </div>
            <button class="w-full rounded-full btn btn-primary" id="update-btn">Update</button>
        </div>
    </section>

    <section>
        <button class="w-full rounded-full btn btn-primary btn-outline" id="resolved-btn">Tutup/Resolved</button>
    </section>

    @endif
</div>

@if($result != null)
    @include('elements/update-modal')
    @include('elements/resolved-modal')
@endif

@if(session()->has("success"))
    @include("elements/update-success-notification");
@endif

@endsection