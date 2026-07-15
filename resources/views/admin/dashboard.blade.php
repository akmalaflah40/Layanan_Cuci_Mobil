@extends('layouts.admin')

@section('title','Dashboard Admin')

@section('page-title','Dashboard')

@section('content')

<!-- Statistik -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <div class="card border-l-4 border-black">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Total Pelanggan
                </p>

                <h2 class="text-4xl font-bold mt-2">
                    {{ $totalCustomer }}
                </h2>

                <small class="text-gray-500">
                    Customer Terdaftar
                </small>

            </div>

            <span class="material-symbols-outlined text-5xl text-black">
                group
            </span>

        </div>

    </div>

    <div class="card border-l-4 border-black">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Booking Hari Ini
                </p>

                <h2 class="text-4xl font-bold mt-2">
                    {{ $bookingHariIni }}
                </h2>

                <small class="text-gray-500">
                    Booking Aktif
                </small>

            </div>

            <span class="material-symbols-outlined text-5xl text-black">
                event_note
            </span>

        </div>

    </div>

    <div class="card border-l-4 border-black">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Pendapatan
                </p>

                <h2 class="text-3xl font-bold mt-2">
                    Rp{{ number_format($pendapatan,0,',','.') }}
                </h2>

                <small class="text-gray-500">
                    Bulan Ini
                </small>

            </div>

            <span class="material-symbols-outlined text-5xl text-black">
                payments
            </span>

        </div>

    </div>

    <div class="card bg-black text-white">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-300 text-sm">
                    Booking Minggu Ini
                </p>

                <h2 class="text-4xl font-bold mt-2">
                    {{ $bookingMingguIni }}
                </h2>

                <small class="text-gray-300">
                    Total Booking
                </small>

            </div>

            <span class="material-symbols-outlined text-5xl">
                analytics
            </span>

        </div>

    </div>

</div>

<!-- Booking Terbaru -->

<div class="card">

    <div class="flex justify-between items-center border-b pb-4 mb-6">

        <div>

            <h2 class="text-2xl font-bold">

                Booking Terbaru

            </h2>

            <p class="text-gray-500">

                Daftar booking pelanggan terbaru.

            </p>

        </div>


    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-4">
                        Pelanggan
                    </th>

                    <th class="text-left py-4">
                        Layanan
                    </th>

                    <th class="text-left py-4">
                        Lokasi
                    </th>

                    <th class="text-left py-4">
                        Waktu
                    </th>

                    <th class="text-left py-4">
                        Status
                    </th>

                    <th class="text-center py-4">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

@forelse($bookings as $booking)

<tr class="border-b hover:bg-gray-50">

    <td class="py-5">

        <strong>{{ $booking->nama_lengkap }}</strong><br>

        <small class="text-gray-500">

            {{ $booking->kendaraan }}

        </small>

    </td>

    <td>

        {{ $booking->service->nama_layanan }}

    </td>

    <td>

        {{ $booking->alamat }}

    </td>

    <td>

        {{ $booking->jam_booking }}

    </td>

    <td>

        @if($booking->status=='Menunggu')

            <span class="px-3 py-1 rounded-full bg-gray-200">

                Menunggu

            </span>

        @elseif($booking->status=='Diproses')

            <span class="px-3 py-1 rounded-full bg-black text-white">

                Diproses

            </span>

        @elseif($booking->status=='Selesai')

            <span class="px-3 py-1 rounded-full border border-black">

                Selesai

            </span>

        @else

            <span class="px-3 py-1 rounded-full border-2 border-black">

                Dibatalkan

            </span>

        @endif

    </td>

    <td class="text-center">

        <a href="{{ route('admin.bookings') }}"
           class="bg-black text-white px-4 py-2 rounded">

            Detail

        </a>

    </td>

</tr>

@empty

<tr>

    <td colspan="6" class="text-center py-5">

        Belum ada booking.

    </td>

</tr>

@endforelse

</tbody>

        </table>

    </div>

</div>

@endsection