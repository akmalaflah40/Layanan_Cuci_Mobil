@extends('layouts.user')

@section('title', 'Dashboard User')

@section('page-title', 'Dashboard')

@section('content')

<!-- Card -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <div class="card border-l-4 border-black">
        <div class="flex justify-between items-center">

            <div>
                <h4 class="text-gray-500 text-sm">
                    Booking Aktif
                </h4>

                <h2 class="text-4xl font-bold mt-2">
                    2
                </h2>
            </div>

            <span class="material-symbols-outlined text-5xl text-black">
                event_note
            </span>

        </div>
    </div>

    <div class="card border-l-4 border-black">

        <div class="flex justify-between items-center">

            <div>

                <h4 class="text-gray-500 text-sm">
                    Riwayat Transaksi
                </h4>

                <h2 class="text-4xl font-bold mt-2">
                    15
                </h2>

            </div>

            <span class="material-symbols-outlined text-5xl text-black">
                receipt_long
            </span>

        </div>

    </div>

    <div class="card border-l-4 border-black">

        <div class="flex justify-between items-center">

            <div>

                <h4 class="text-gray-500 text-sm">
                    Status Akun
                </h4>

                <h2 class="text-2xl font-bold mt-2">
                    Member
                </h2>

            </div>

            <span class="material-symbols-outlined text-5xl text-black">
                person
            </span>

        </div>

    </div>

</div>

<!-- Content -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

    <!-- Booking -->
    <div class="card">

        <h3 class="text-xl font-semibold mb-5 border-b pb-3">
            Booking Terbaru
        </h3>

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-3">
                        Layanan
                    </th>

                    <th class="text-left py-3">
                        Tanggal
                    </th>

                    <th class="text-left py-3">
                        Status
                    </th>

                </tr>

            </thead>

            <tbody>

                <tr class="border-b">

                    <td class="py-4">
                        Premium Wash
                    </td>

                    <td>
                        25 Juni 2026
                    </td>

                    <td>
                        <span class="px-3 py-1 rounded-full bg-gray-200 text-black text-sm">
                            Diproses
                        </span>
                    </td>

                </tr>

                <tr class="border-b">

                    <td class="py-4">
                        Interior Cleaning
                    </td>

                    <td>
                        20 Juni 2026
                    </td>

                    <td>
                        <span class="px-3 py-1 rounded-full bg-black text-white text-sm">
                            Selesai
                        </span>
                    </td>

                </tr>

                <tr>

                    <td class="py-4">
                        Engine Wash
                    </td>

                    <td>
                        15 Juni 2026
                    </td>

                    <td>
                        <span class="px-3 py-1 rounded-full bg-black text-white text-sm">
                            Selesai
                        </span>
                    </td>

                </tr>

            </tbody>

        </table>

    </div>

    <!-- Profil -->
    <div class="card">

        <h3 class="text-xl font-semibold mb-5 border-b pb-3">
            Informasi Akun
        </h3>

        <div class="space-y-5">

            <div>

                <p class="text-gray-500">
                    Nama
                </p>

                <h4 class="font-semibold text-lg">
                    {{ Auth::user()->name }}
                </h4>

            </div>

            <div>

                <p class="text-gray-500">
                    Email
                </p>

                <h4 class="font-semibold text-lg">
                    {{ Auth::user()->email }}
                </h4>

            </div>

            <div>

                <p class="text-gray-500">
                    Role
                </p>

                <span class="inline-block px-4 py-2 bg-black text-white rounded-lg">
                    User
                </span>

            </div>

        </div>

    </div>

</div>

<!-- Pengumuman -->
<div class="card mt-8">

    <h3 class="text-xl font-semibold border-b pb-3 mb-5">
        Pengumuman
    </h3>

    <div class="border-2 border-black rounded-xl p-8">

        <h2 class="text-2xl font-bold">
            Selamat Datang di X-CarWash
        </h2>

        <p class="mt-4 text-gray-600 leading-7">

            Terima kasih telah menggunakan layanan kami.
            Anda dapat melakukan booking layanan cuci mobil,
            melihat riwayat transaksi, serta mengelola profil
            melalui dashboard ini.

        </p>

        <a href="{{ route('booking') }}"
           class="inline-block mt-6 bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800">

            Booking Sekarang

        </a>

    </div>

</div>

@endsection