{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<div class="w-1/2 h-full container mx-auto pt-36 pb-28 space-y-10">
    <section>
        <form action="/track" method="get" class="flex flex-col w-full h-full">
            <div class="w-full h-full bg-white rounded-xl border border-slate-200 p-6 space-y-6">
                <div>
                    <h3 class="text-lg font-medium">Pencarian</h3>
                    <p class="text-slate-600 text-sm">Lacak progress bugs/issue berdasarkan Kode Referensi</p>
                </div>
                <div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" name="search" id="default-search" value="{{request()->search}}" class="input block w-full p-4 pl-10 text-sm text-gray-900 rounded-lg bg-gray-50 border border-gray-200" placeholder="Masukkan Kode Referensi disini" required>
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
        <div class="w-full h-full bg-white rounded-xl border border-slate-200 p-6 space-y-6 mb-6">
            <div>
                <h3 class="text-lg">ID: <span class="font-semibold">{{$result[0]["reference_code"]}}</span></h3>
            </div>
            <div class="w-full flex justify-between space-x-2">
                <div class="w-full flex flex-col space-y-6">
                    <div class="w-full flex space-x-4 items-center">
                        <div class="flex justify-center items-center rounded-xl bg-blue-200 p-2">
                            <span class="material-symbols-rounded text-primary">event</span>
                        </div>
                        <div class="w-full">
                            <p class="text-xs">Tanggal & Waktu</p>
                            <p class="text-base font-medium text-gray-700">{{date('Y:m:d H:i:s', strtotime($result[0]["start_date"]))}}</p>
                        </div>
                    </div>
                    <div class="w-full flex space-x-4 items-center">
                        <div class="flex justify-center items-center rounded-xl bg-blue-200 p-2">
                            <span class="material-symbols-rounded text-primary">home_repair_service</span>
                        </div>
                        <div class="w-full">
                            <p class="text-xs">Layanan Terkait</p>
                            <p class="text-base font-medium text-gray-700">{{$result[0]["service"] ? $result[0]["service"] : '-'}}</p>
                        </div>
                    </div>
                    <div class="w-full flex space-x-4 items-center">
                        <div class="flex justify-center items-center rounded-xl bg-blue-200 p-2">
                            <span class="material-symbols-rounded text-primary">widgets</span>
                        </div>
                        <div class="w-full">
                            <p class="text-xs">Platform</p>
                            <p class="text-base font-medium text-gray-700">{{$result[0]["platform"] ? $result[0]["platform"] : '-'}}</p>
                        </div>
                    </div>
                    <div class="w-full flex space-x-4 items-center">
                        <div class="flex justify-center items-center rounded-xl bg-blue-200 p-2">
                            <span class="material-symbols-rounded text-primary">link</span>
                        </div>
                        <div class="w-full">
                            <p class="text-xs">Platform Link</p>
                            <p class="text-base font-medium text-gray-700">{{$result[0]["platform_link"] ? $result[0]["platform_link"] : '-'}}</p>
                        </div>
                    </div>
                </div>
                <div class="w-full flex flex-col space-y-6">
                    <div class="w-full flex space-x-4 items-center">
                        <div class="flex justify-center items-center rounded-xl bg-blue-200 p-2">
                            <span class="material-symbols-rounded text-primary">confirmation_number</span>
                        </div>
                        <div class="w-full">
                            <p class="text-xs">Ticket ID</p>
                            <p class="text-base font-medium text-gray-700">{{$result[0]["ticket_id"] ? $result[0]["ticket_id"] : '-'}}</p>
                        </div>
                    </div>
                    <div class="w-full flex space-x-4 items-center">
                        <div class="flex justify-center items-center rounded-xl bg-blue-200 p-2">
                            <span class="material-symbols-rounded text-primary">signal_cellular_3_bar</span>
                        </div>
                        <div class="w-full">
                            <p class="text-xs">Impact</p>
                            <p class="text-base font-medium text-gray-700">{{$result[0]["impact"]}}</p>
                        </div>
                    </div>
                    <div class="w-full flex space-x-4 items-center">
                        <div class="flex justify-center items-center rounded-xl bg-blue-200 p-2">
                            <span class="material-symbols-rounded text-primary">construction</span>
                        </div>
                        <div class="w-full">
                            <p class="text-xs">Channel</p>
                            <p class="text-base font-medium text-gray-700">{{$result[0]["channel"] ? $result[0]["channel"] : '-'}}</p>
                        </div>
                    </div>
                    <div class="w-full flex space-x-4 items-center">
                        <div class="flex justify-center items-center rounded-xl bg-blue-200 p-2">
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
        <div class="w-full h-full bg-white rounded-xl border border-slate-200 p-6 space-y-6 mb-6">
            <div class="w-full space-y-2">
                <h3 class="text-lg font-medium">Deskripsi Masalah</h3>
                <p class="text-justify text-gray-700">{{$result[0]["detail"]}}</p>
            </div>
        </div>
        <div class="w-full h-full bg-white rounded-xl border border-slate-200 p-6 space-y-12 mb-6">
            <div>
                <h3 class="text-lg font-medium">Progress</h3>
            </div>
            <div class="w-full h-full flex flex-col space-y-1">
                <div class="w-full flex justify-between">
                    <div class="w-fit space-y-20">
                        <div class="w-fit">
                            <p class="text-sm">{{date('Y-m-d', strtotime($result[0]["start_date"]))}}</p>
                            <p class="text-lg font-medium">{{date('H:i', strtotime($result[0]["start_date"]))}}</p>
                        </div>
                    </div>
                    <div class="w-[10%] flex flex-col items-center space-y-1">
                        <div class="h-6 w-6 rounded-full bg-red-50 border-2 border-red-800"></div>
                        @if($histories != null)
                        <div class="h-24 border border-dashed border-gray-500 "></div>
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
                <div class="w-full flex justify-between">
                    <div class="w-fit space-y-20">
                        <div class="w-fit">
                            <p class="text-sm">{{date('Y-m-d', strtotime($histories[$i]["date"]))}}</p>
                            <p class="text-lg font-medium">{{date('H:i', strtotime($histories[$i]["date"]))}}</p>
                        </div>
                    </div>
                    <div class="w-[10%] flex flex-col items-center space-y-1">
                        <div class="h-6 w-6 rounded-full {{ $i != $count_history-1 ? 'bg-red-50 border-2 border-red-800' : ($histories[$i]['update_type'] == 2 ? 'bg-green-700' : 'bg-red-800') }}"></div>
                        @if($i != $count_history-1)
                        <div class="h-24 border border-dashed border-gray-500 "></div>
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
            <button class="w-full btn btn-primary rounded-full" id="update-btn">Update</button>
        </div>
    </section>

    <section>
        <button class="w-full btn btn-primary btn-outline rounded-full" id="resolved-btn">Tutup/Resolved</button>
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