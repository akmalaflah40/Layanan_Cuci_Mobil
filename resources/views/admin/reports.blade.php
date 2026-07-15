@extends('layouts.admin')

@section('title','Reports')

@section('page-title','Reports')

@section('content')

<!-- Statistik -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

    <div class="card border-l-4 border-black">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Total Pendapatan
                </p>

                <h2 class="text-3xl font-bold mt-2">
                    Rp{{ number_format($totalPendapatan,0,',','.') }}
                </h2>

            </div>

            <span class="material-symbols-outlined text-5xl text-black">
                payments
            </span>

        </div>

    </div>

    <div class="card border-l-4 border-black">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Total Booking
                </p>

                <h2 class="text-3xl font-bold mt-2">
                    {{ $totalBooking }}
                </h2>

                <p class="text-gray-600 mt-2 text-sm">
                    Booking berhasil
                </p>

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
                    Total Customer
                </p>

                <h2 class="text-3xl font-bold mt-2">
                    {{ $totalCustomer }}
                </h2>

                <p class="text-gray-600 mt-2 text-sm">
                    Customer aktif
                </p>

            </div>

            <span class="material-symbols-outlined text-5xl text-black">
                group
            </span>

        </div>

    </div>

</div>

<!-- Grafik -->
<div class="card mb-8">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h2 class="text-2xl font-bold">
                Grafik Pendapatan
            </h2>

            <p class="text-gray-500">
                Simulasi pendapatan bulanan
            </p>

        </div>

        <button
            class="bg-black text-white px-5 py-2 rounded-lg hover:bg-gray-800 transition">

            Cetak Laporan

        </button>

    </div>

    <div class="grid grid-cols-12 gap-3 items-end h-72">

@foreach($grafik as $nilai)

<div class="flex flex-col justify-end">

<div
class="bg-black rounded-t"
style="height:{{ max(($nilai/10000),10) }}px">
</div>

</div>

@endforeach

</div>

    <div class="grid grid-cols-12 mt-4 text-center text-sm text-gray-500">

<div>Jan</div>
<div>Feb</div>
<div>Mar</div>
<div>Apr</div>
<div>Mei</div>
<div>Jun</div>
<div>Jul</div>
<div>Agu</div>
<div>Sep</div>
<div>Okt</div>
<div>Nov</div>
<div>Des</div>

</div>

</div>

<!-- Tabel -->
<div class="card">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h2 class="text-2xl font-bold">
                Laporan Transaksi
            </h2>

            <p class="text-gray-500">
                Riwayat transaksi yang telah selesai.
            </p>

        </div>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gray-100 border-b">

                <tr>

                    <th class="text-left py-4 px-3">Tanggal</th>
                    <th class="text-left px-3">Pelanggan</th>
                    <th class="text-left px-3">Layanan</th>
                    <th class="text-left px-3">Status</th>
                    <th class="text-right px-3">Pendapatan</th>

                </tr>

            </thead>

            <tbody>

@forelse($transaksi as $item)

<tr class="border-b hover:bg-gray-50">

<td class="py-4 px-3">

{{ date('d M Y',strtotime($item->tanggal_booking)) }}

</td>

<td class="px-3">

{{ $item->nama_lengkap }}

</td>

<td class="px-3">

{{ $item->service->nama_layanan }}

</td>

<td class="px-3">

<span class="bg-black text-white px-3 py-1 rounded-full text-sm">

{{ $item->status }}

</span>

</td>

<td class="text-right px-3 font-semibold">

Rp{{ number_format($item->total_harga,0,',','.') }}

</td>

</tr>

@empty

<tr>

<td colspan="5" class="text-center py-6">

Belum ada transaksi selesai.

</td>

</tr>

@endforelse

</tbody>

        </table>

    </div>

</div>

@endsection