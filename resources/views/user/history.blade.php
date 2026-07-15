@extends('layouts.user')

@section('title', 'Riwayat Transaksi')

@section('page-title', 'Riwayat Transaksi')

@section('content')

<div class="card border border-gray-300">

    <div class="mb-6">

        <h2 class="text-2xl font-bold">

            Riwayat Transaksi

        </h2>

        <p class="text-gray-500 mt-2">

            Seluruh transaksi layanan yang pernah dilakukan.

        </p>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="bg-gray-100 border-b">

                    <th class="text-left px-5 py-4">No</th>
                    <th class="text-left px-5 py-4">Invoice</th>
                    <th class="text-left px-5 py-4">Layanan</th>
                    <th class="text-left px-5 py-4">Tanggal</th>
                    <th class="text-left px-5 py-4">Total</th>
                    <th class="text-left px-5 py-4">Status</th>

                </tr>

            </thead>

            <tbody>

@forelse($histories as $history)

<tr class="border-b hover:bg-gray-50">

    <td class="px-5 py-4">
        {{ $loop->iteration }}
    </td>

    <td class="px-5 py-4 font-semibold">
        INV-{{ date('Y') }}{{ str_pad($history->id,4,'0',STR_PAD_LEFT) }}
    </td>

    <td class="px-5 py-4">
        {{ $history->service->nama_layanan }}
    </td>

    <td class="px-5 py-4">
        {{ date('d F Y',strtotime($history->tanggal_booking)) }}
    </td>

    <td class="px-5 py-4">
        Rp{{ number_format($history->total_harga,0,',','.') }}
    </td>

    <td class="px-5 py-4">

        @if($history->status=='Selesai')

            <span class="bg-black text-white px-3 py-1 rounded-full text-sm">
                Lunas
            </span>

        @elseif($history->status=='Menunggu')

            <span class="bg-gray-200 text-black px-3 py-1 rounded-full text-sm">
                Menunggu Verifikasi
            </span>

        @elseif($history->status=='Diproses')

            <span class="bg-black text-white px-3 py-1 rounded-full text-sm">
                Diproses
            </span>

        @else

            <span class="border border-black px-3 py-1 rounded-full text-sm">
                Dibatalkan
            </span>

        @endif

    </td>

</tr>

@empty

<tr>

<td colspan="7" class="text-center py-8">

Belum ada riwayat transaksi.

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

                    Total Transaksi

                </p>

                <h2 class="text-4xl font-bold mt-2">

                    {{ $totalTransaksi }}

                </h2>

            </div>

            <span class="material-symbols-outlined text-5xl">

                receipt_long

            </span>

        </div>

    </div>

    <div class="card border-l-4 border-black">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500">

                    Menunggu Verifikasi

                </p>

                <h2 class="text-4xl font-bold mt-2">

                    {{ $menunggu }}

                </h2>

            </div>

            <span class="material-symbols-outlined text-5xl">

                schedule

            </span>

        </div>

    </div>

    <div class="card border-l-4 border-black">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500">

                    Dibatalkan

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