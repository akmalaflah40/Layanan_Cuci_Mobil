@extends('layouts.user')

@section('title', 'Booking Saya')

@section('page-title', 'Booking Saya')

@section('content')

<div class="card border border-gray-300">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">

            Daftar Booking

        </h2>

        <a href="{{ route('booking') }}"
           class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition">

            + Booking Baru

        </a>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="border-b bg-gray-100">

                    <th class="text-left px-5 py-4">No</th>

                    <th class="text-left px-5 py-4">Kode Booking</th>

                    <th class="text-left px-5 py-4">Layanan</th>

                    <th class="text-left px-5 py-4">Tanggal</th>

                    <th class="text-left px-5 py-4">Jam</th>

                    <th class="text-left px-5 py-4">Status</th>

                </tr>

            </thead>

            <tbody>

@forelse($bookings as $booking)

<tr class="border-b hover:bg-gray-50">

    <td class="px-5 py-4">
        {{ $loop->iteration }}
    </td>

    <td class="px-5 py-4 font-semibold">
        BKG-{{ str_pad($booking->id,3,'0',STR_PAD_LEFT) }}
    </td>

    <td class="px-5 py-4">
        {{ $booking->service->nama_layanan }}
    </td>

    <td class="px-5 py-4">
        {{ \Carbon\Carbon::parse($booking->tanggal_booking)->format('d M Y') }}
    </td>

    <td class="px-5 py-4">
        {{ $booking->jam_booking }} WIB
    </td>

    <td class="px-5 py-4">

        @if($booking->status=='Menunggu')

            <span class="bg-gray-200 text-black px-3 py-1 rounded-full text-sm">
                Menunggu
            </span>

        @elseif($booking->status=='Diproses')

            <span class="bg-black text-white px-3 py-1 rounded-full text-sm">
                Diproses
            </span>

        @elseif($booking->status=='Selesai')

            <span class="border border-black px-3 py-1 rounded-full text-sm">
                Selesai
            </span>

        @else

            <span class="border border-red-500 text-red-500 px-3 py-1 rounded-full text-sm">
                Dibatalkan
            </span>

        @endif

    </td>

</tr>

@empty

<tr>

    <td colspan="7" class="text-center py-10 text-gray-500">

        Belum ada data booking.

    </td>

</tr>

@endforelse

</tbody>

        </table>

    </div>

</div>

<!-- Statistik -->

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">

    <div class="card border-l-4 border-black">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500">

                    Booking Diproses

                </p>

                <h2 class="text-4xl font-bold mt-2">
    {{ $diproses }}
</h2>

            </div>

            <span class="material-symbols-outlined text-5xl">

                pending_actions

            </span>

        </div>

    </div>

    <div class="card border-l-4 border-black">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500">

                    Booking Selesai

                </p>

                <h2 class="text-4xl font-bold mt-2">
    {{ $selesai }}
</h2>

            </div>

            <span class="material-symbols-outlined text-5xl">

                task_alt

            </span>

        </div>

    </div>

    <div class="card border-l-4 border-black">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500">

                    Booking Dibatalkan

                </p>

                <h2 class="text-4xl font-bold mt-2">
    {{ $dibatalkan }}
</h2>

            </div>

            <span class="material-symbols-outlined text-5xl">

                cancel

            </span>

        </div>

    </div>

</div>

@endsection