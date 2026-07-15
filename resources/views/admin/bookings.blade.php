@extends('layouts.admin')

@section('title','Bookings')

@section('page-title','Bookings')

@section('content')

<div class="card">

    <div class="flex justify-between items-center border-b pb-5 mb-6">

        <div>

            <h2 class="text-2xl font-bold">
                Data Booking
            </h2>

            <p class="text-gray-500">
                Daftar seluruh pemesanan pelanggan.
            </p>

        </div>

    </div>

    <!-- Filter -->

    <div class="flex flex-col md:flex-row gap-4 mb-6">

        <input
            type="text"
            placeholder="Cari pelanggan..."
            class="flex-1 border-2 border-black rounded-lg px-5 py-3 focus:outline-none">

        <select
            class="border-2 border-black rounded-lg px-5 py-3 focus:outline-none">

            <option>Semua Status</option>
            <option>Menunggu</option>
            <option>Diproses</option>
            <option>Selesai</option>
            <option>Dibatalkan</option>

        </select>

    </div>

    <!-- Table -->

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-4">No</th>
                    <th class="text-left py-4">Pelanggan</th>
                    <th class="text-left py-4">Layanan</th>
                    <th class="text-left py-4">Tanggal</th>
                    <th class="text-left py-4">Jam</th>
                    <th class="text-left py-4">Total</th>
                    <th class="text-center py-4">Status</th>
                    <th class="text-center py-4">Aksi</th>

                </tr>

            </thead>

            <tbody>

@forelse($bookings as $booking)

<tr class="border-b hover:bg-gray-50">

    <td class="py-5">
        {{ $loop->iteration }}
    </td>

    <td>
        <strong>{{ $booking->nama_lengkap }}</strong>
    </td>

    <td>
        {{ $booking->service->nama_layanan }}
    </td>

    <td>
        {{ date('d F Y',strtotime($booking->tanggal_booking)) }}
    </td>

    <td>
        {{ $booking->jam_booking }}
    </td>

    <td>
        Rp{{ number_format($booking->total_harga,0,',','.') }}
    </td>

    <td class="text-center">

        @if($booking->status=='Menunggu')

            <span class="px-3 py-1 rounded-full bg-gray-200 text-black text-sm">
                Menunggu
            </span>

        @elseif($booking->status=='Diproses')

            <span class="px-3 py-1 rounded-full bg-black text-white text-sm">
                Diproses
            </span>

        @elseif($booking->status=='Selesai')

            <span class="px-3 py-1 rounded-full border border-black text-black text-sm">
                Selesai
            </span>

        @else

            <span class="px-3 py-1 rounded-full border-2 border-black text-black text-sm">
                Dibatalkan
            </span>

        @endif

    </td>

    <td class="text-center">

    <div class="flex justify-center gap-2">

        <button
            onclick="editBooking('{{ $booking->id }}','{{ $booking->status }}')"
            class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">

            Update

        </button>

        <form action="{{ route('admin.bookings.destroy',$booking->id) }}"
              method="POST">

            @csrf
            @method('DELETE')

            <button
                onclick="return confirm('Yakin ingin menghapus booking ini?')"
                class="border border-black px-4 py-2 rounded hover:bg-gray-100">

                Hapus

            </button>

        </form>

    </div>

</td>

</tr>

@empty

<tr>

<td colspan="8" class="text-center py-6">

Belum ada data booking.

</td>

</tr>

@endforelse

</tbody>

        </table>

    </div>

</div>

<!-- Ringkasan -->

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-8">

    <div class="card border-l-4 border-black text-center">

        <span class="material-symbols-outlined text-5xl text-black">

            event_note

        </span>

        <h3 class="text-3xl font-bold mt-3">
    {{ $totalBooking }}
</h3>

        <p class="text-gray-500">

            Total Booking

        </p>

    </div>

    <div class="card border-l-4 border-black text-center">

        <span class="material-symbols-outlined text-5xl text-black">

            hourglass_top

        </span>

        <h3 class="text-3xl font-bold mt-3">
    {{ $menunggu }}
</h3>

        <p class="text-gray-500">

            Menunggu

        </p>

    </div>

    <div class="card border-l-4 border-black text-center">

        <span class="material-symbols-outlined text-5xl text-black">

            settings

        </span>

        <h3 class="text-3xl font-bold mt-3">
    {{ $diproses }}
</h3>

        <p class="text-gray-500">

            Diproses

        </p>

    </div>

    <div class="card border-l-4 border-black text-center">

        <span class="material-symbols-outlined text-5xl text-black">

            task_alt

        </span>

        <h3 class="text-3xl font-bold mt-3">
    {{ $selesai }}
</h3>

        <p class="text-gray-500">

            Selesai

        </p>

    </div>

</div>
<!-- Modal Update Booking -->

<div id="modalEdit"
     class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50">

    <div class="bg-white rounded-xl w-full max-w-sm p-6">

        <div class="flex justify-between items-center mb-5">

            <h2 class="text-xl font-bold">

                Update Status Booking

            </h2>

            <button
                onclick="closeEdit()"
                class="text-3xl">

                &times;

            </button>

        </div>

        <form id="editForm" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-5">

                <label class="font-semibold">

                    Status Booking

                </label>

                <select
                    id="editStatus"
                    name="status"
                    class="w-full border rounded-lg p-3 mt-2">

                    <option value="Menunggu">Menunggu</option>

                    <option value="Diproses">Diproses</option>

                    <option value="Selesai">Selesai</option>

                    <option value="Dibatalkan">Dibatalkan</option>

                </select>

            </div>

            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    onclick="closeEdit()"
                    class="border border-black px-5 py-2 rounded">

                    Batal

                </button>

                <button
                    type="submit"
                    class="bg-black text-white px-5 py-2 rounded">

                    Update

                </button>

            </div>

        </form>

    </div>

</div>
<script>

function editBooking(id,status){

    document.getElementById('modalEdit').classList.remove('hidden');

    document.getElementById('editStatus').value = status;

    document.getElementById('editForm').action =
    "/bookings-admin/update/" + id;

}

function closeEdit(){

    document.getElementById('modalEdit').classList.add('hidden');

}

</script>
@endsection