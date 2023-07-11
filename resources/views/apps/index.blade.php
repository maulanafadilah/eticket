{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="w-1/2 h-full container mx-auto pb-28 pt-36 space-y-10">

    <section class="flex flex-col w-full h-full px-6">
        <h1 class="text-2xl font-bold">We'd Love to Hear!</h1>
        <p class="text-slate-600 font-medium">Share Feedback on Bugs or Issues using our Online Form below.</p>
    </section>

    <section>
        <form action="/" method="post" class="flex flex-col w-full h-full">
            @csrf
            <div class="space-y-6 mb-16">
                <div class="w-full h-full bg-white rounded-xl border border-slate-200 p-6 space-y-6">
                    <div>
                        <h3 class="text-lg font-medium">Tanggal dan Waktu Mulai Masalah <span class="text-sm text-slate-600">(Opsional)</span></h3>
                        <p class="text-slate-600 text-sm">Masukkan tanggal dan waktu ketika masalah dialami</p>
                    </div>
                    <div>
                        <input name="start_date" type="datetime-local" class="input w-full" />
                    </div>
                </div>
                <div class="w-full h-full bg-white rounded-xl border border-slate-200 p-6 space-y-6">
                    <div>
                        <h3 class="text-lg font-medium">Layanan Terkait <span class="text-sm text-slate-600">(Opsional)</span></h3>
                        <p class="text-slate-600 text-sm">Pilih layanan yang terkena masalah</p>
                    </div>
                    <div>
                    <input type="hidden" name="service" value="">
                    <select name="service" class="select w-full font-normal">
                        <option disabled selected>Pilih salah satu...</option>
                        <option value="a">Homer</option>
                        <option value="b">Marge</option>
                        <option value="c">Bart</option>
                        <option value="d">Lisa</option>
                        <option value="e">Maggie</option>
                    </select>
                    </div>
                </div>
                <div class="w-full h-full bg-white rounded-xl border border-slate-200 p-6 space-y-6">
                    <div>
                        <h3 class="text-lg font-medium">Platform <span class="text-sm text-slate-600">(Opsional)</span></h3>
                        <p class="text-slate-600 text-sm">Tentukan platform atau sistem di mana masalah terjadi</p>
                    </div>
                    <div>
                        <input name="platform" type="text" placeholder="Type here" class="input w-full" />
                    </div>
                </div>
                <div class="w-full h-full bg-white rounded-xl border border-slate-200 p-6 space-y-6">
                    <div>
                        <h3 class="text-lg font-medium">Link Platform <span class="text-sm text-slate-600">(Opsional)</span></h3>
                        <p class="text-slate-600 text-sm">Masukkan tautan atau URL terkait dengan platform yang terkena masalah</p>
                    </div>
                    <div>
                        <input name="platform_link" type="text" placeholder="Type here" class="input w-full" />
                    </div>
                </div>
                <div class="w-full h-full bg-white rounded-xl border border-slate-200 p-6 space-y-6">
                    <div>
                        <h3 class="text-lg font-medium">Channel/Saluran <span class="text-sm text-slate-600">(Opsional)</span></h3>
                        <p class="text-slate-600 text-sm">Tentukan platform atau sistem di mana masalah terjadi</p>
                    </div>
                    <div>
                    <input type="hidden" name="channel" value="">
                    <select name="channel" class="select w-full font-normal">
                        <option disabled selected>Pilih salah satu...</option>
                        <option value="home">Homer</option>
                        <option value="mar">Marge</option>
                        <option value="bar">Bart</option>
                        <option value="lis">Lisa</option>
                        <option value="mag">Maggie</option>
                    </select>
                    </div>
                </div>
                <div class="w-full h-full bg-white rounded-xl border border-slate-200 p-6 space-y-6">
                    <div>
                        <h3 class="text-lg font-medium">Deskripsi Masalah <span class="text-sm text-red-700">*</span></h3>
                        <p class="text-slate-600 text-sm">Berikan deskripsi detail tentang masalah</p>
                    </div>
                    <div>
                        <textarea name="detail" class="textarea w-full h-60" placeholder="Tulis deskripsi disini..." required></textarea>
                    </div>
                </div>
                <div class="w-full h-full bg-white rounded-xl border border-slate-200 p-6 space-y-6">
                    <div>
                        <h3 class="text-lg font-medium">Impact/Dampak <span class="text-sm text-red-700">*</span></h3>
                        <p class="text-slate-600 text-sm">Tentukan tingkat keparahan atau dampak masalah</p>
                    </div>
                    <div>
                        <select name="impact" class="select w-full font-normal" required>
                            <option disabled selected>Pilih salah satu...</option>
                            <option value="1">Homer</option>
                            <option value="2">Marge</option>
                            <option value="3">Bart</option>
                            <option value="4">Lisa</option>
                            <option value="5">Maggie</option>
                        </select>
                    </div>
                </div>
                <div class="w-full h-full bg-white rounded-xl border border-slate-200 p-6 space-y-6">
                    <div>
                        <h3 class="text-lg font-medium">Ticket ID <span class="text-sm text-slate-600">(Opsional)</span></h3>
                        <p class="text-slate-600 text-sm">Jika tersedia, berikan ID tiket yang terkait dengan masalah</p>
                    </div>
                    <div>
                        <input name="ticket_id" type="text" placeholder="Masukan ID Tiket disini..." class="input w-full" />
                    </div>
                </div>
                <div class="w-full h-full bg-white rounded-xl border border-slate-200 p-6 space-y-6">
                    <div>
                        <h3 class="text-lg font-medium">Penanggung Jawab/PIC <span class="text-sm text-red-700">*</span></h3>
                        <p class="text-slate-600 text-sm">Masukkan nama orang yang bertanggung jawab atas penanganan masalah</p>
                    </div>
                    <div>
                        <input name="pic" type="text" placeholder="Masukan nama disini..." class="input w-full" required />
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary rounded-full">Simpan</button>
        </form>
    </section>
</div>

@if(session()->has("success"))
    @include("elements/success-notification");
@endif

@endsection