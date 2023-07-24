{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="container w-1/2 h-full mx-auto space-y-10 pb-28 pt-36">

    <section class="flex flex-col w-full h-full px-6">
        <h1 class="text-2xl font-bold">We'd Love to Hear!</h1>
        <p class="font-medium text-slate-600">Share Feedback on Bugs or Issues using our Online Form below.</p>
    </section>

    <section>
        <form action="/" method="post" class="flex flex-col w-full h-full">
            @csrf
            <div class="mb-16 space-y-6">
                <div class="w-full h-full p-6 space-y-6 bg-white border rounded-xl border-slate-200">
                    <div>
                        <h3 class="text-lg font-medium">Tanggal dan Waktu Mulai Masalah <span class="text-sm text-slate-600">(Opsional akan otomatis terisi sistem)</span></h3>
                        <p class="text-sm text-slate-600">Masukkan tanggal dan waktu ketika masalah dialami</p>
                    </div>
                    <div>
                        <input name="start_date" type="datetime-local" class="w-full input" />
                    </div>
                </div>
                <div class="w-full h-full p-6 space-y-6 bg-white border rounded-xl border-slate-200">
                    <div>
                        <h3 class="text-lg font-medium">Layanan Terkait <span class="text-sm text-slate-600">(Opsional)</span></h3>
                        <p class="text-sm text-slate-600">Pilih layanan yang terkena masalah</p>
                    </div>
                    <div>
                    <input type="hidden" name="service" value="">
                    <select name="service" class="w-full font-normal select">
                        <option disabled selected>Pilih salah satu...</option>
                        <option value="DMM">DMM</option>
                        <option value="TAM">TAM</option>
                        <option value="VAM">VAM</option>
                        <option value="Digital Channel">Digital Channel</option>
                        <option value="Salper">Salper</option>
                        <option value="FCC">FCC</option>
                        <option value="NPC-Management">NPC-Management</option>
                        <option value="PlasaIndibiz">PlasaIndibiz</option>
                        <option value="Social Media">Social Media</option>
                        <option value="Smart Collection">Smart Collection</option>
                        <option value="CTB">CTB</option>
                        <option value="Data Analyst">Data Analyst</option>
                        <option value="T2 Retensi">T2 Retensi</option>
                        <option value="HVC">HVC</option>
                    </select>
                    </div>
                </div>
                <div class="w-full h-full p-6 space-y-6 bg-white border rounded-xl border-slate-200">
                    <div>
                        <h3 class="text-lg font-medium">Platform <span class="text-sm text-slate-600">(Opsional)</span></h3>
                        <p class="text-sm text-slate-600">Tentukan platform atau sistem di mana masalah terjadi</p>
                    </div>
                    <div>
                        <input name="platform" type="text" placeholder="Type here" class="w-full input" />
                    </div>
                </div>
                <div class="w-full h-full p-6 space-y-6 bg-white border rounded-xl border-slate-200">
                    <div>
                        <h3 class="text-lg font-medium">Link Platform <span class="text-sm text-slate-600">(Opsional)</span></h3>
                        <p class="text-sm text-slate-600">Masukkan tautan atau URL terkait dengan platform yang terkena masalah</p>
                    </div>
                    <div>
                        <input name="platform_link" type="text" placeholder="Type here" class="w-full input" />
                    </div>
                </div>
                <div class="w-full h-full p-6 space-y-6 bg-white border rounded-xl border-slate-200">
                    <div>
                        <h3 class="text-lg font-medium">Channel/Saluran <span class="text-sm text-slate-600">(Opsional)</span></h3>
                        <p class="text-sm text-slate-600">Tentukan platform atau sistem di mana masalah terjadi</p>
                    </div>
                    <div>
                    <input type="hidden" name="channel" value="">
                    <select name="channel" class="w-full font-normal select">
                        <option disabled selected>Pilih salah satu...</option>
                        <option value="Voice">Voice</option>
                        <option value="Email">Email</option>
                        <option value="WhatsApp">WhatsApp</option>
                        <option value="Telegram">Telegram</option>
                        <option value="Web">Web</option>
                    </select>
                    </div>
                </div>
                <div class="w-full h-full p-6 space-y-6 bg-white border rounded-xl border-slate-200">
                    <div>
                        <h3 class="text-lg font-medium">Deskripsi Masalah <span class="text-sm text-red-700">*</span></h3>
                        <p class="text-sm text-slate-600">Berikan deskripsi detail tentang masalah</p>
                    </div>
                    <div>
                        <textarea name="detail" class="w-full textarea h-60" placeholder="Tulis deskripsi disini..." required></textarea>
                    </div>
                </div>
                <div class="w-full h-full p-6 space-y-6 bg-white border rounded-xl border-slate-200">
                    <div>
                        <h3 class="text-lg font-medium">Impact/Dampak <span class="text-sm text-red-700">*</span></h3>
                        <p class="text-sm text-slate-600">Tentukan tingkat keparahan atau dampak masalah</p>
                    </div>
                    <div>
                        <select name="impact" class="w-full font-normal select" required>
                            <option disabled selected>Pilih salah satu...</option>
                            <option value="1">Low</option>
                            <option value="2">Medium</option>
                            <option value="3">High</option>
                        </select>
                    </div>
                </div>
                <div class="w-full h-full p-6 space-y-6 bg-white border rounded-xl border-slate-200">
                    <div>
                        <h3 class="text-lg font-medium">Ticket ID <span class="text-sm text-slate-600">(Opsional)</span></h3>
                        <p class="text-sm text-slate-600">Jika tersedia, berikan ID tiket yang terkait dengan masalah</p>
                    </div>
                    <div>
                        <input name="ticket_id" type="text" placeholder="Masukan ID Tiket disini..." class="w-full input" />
                    </div>
                </div>
                <div class="w-full h-full p-6 space-y-6 bg-white border rounded-xl border-slate-200">
                    <div>
                        <h3 class="text-lg font-medium">Penanggung Jawab/PIC <span class="text-sm text-red-700">*</span></h3>
                        <p class="text-sm text-slate-600">Masukkan nama orang yang bertanggung jawab atas penanganan masalah</p>
                    </div>
                    <div>
                        <input name="pic" type="text" placeholder="Masukan nama disini..." class="w-full input" required />
                    </div>
                </div>
            </div>
            <button type="submit" class="rounded-full btn btn-primary">Simpan</button>
        </form>
    </section>
</div>

@if(session()->has("success"))
    @include("elements/success-notification");
@endif

@endsection