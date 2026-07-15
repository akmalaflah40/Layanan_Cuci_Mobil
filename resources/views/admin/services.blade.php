@extends('layouts.admin')

@section('title','Services')

@section('page-title','Services')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h2 class="text-2xl font-bold">
            Data Layanan
        </h2>

        <p class="text-gray-500">
            Kelola seluruh layanan X-CarWash
        </p>

    </div>

    <button
    onclick="document.getElementById('modalTambah').classList.remove('hidden')"
    class="bg-black text-white px-5 py-3 rounded-lg hover:bg-gray-800">

    + Tambah Layanan

</button>

</div>

<div class="mb-8">

    <input
        type="text"
        placeholder="Cari layanan..."
        class="w-full border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black">

</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

@foreach($services as $service)

<div class="card overflow-hidden">

    <img
        src="{{ asset('storage/'.$service->gambar) }}"
        class="w-full h-56 object-cover">

    <div class="p-6">

        <h3 class="text-2xl font-bold">

            {{ $service->nama_layanan }}

        </h3>

        <p class="text-gray-500 mt-3">

            {{ $service->deskripsi }}

        </p>

        <h4 class="text-xl font-bold mt-4">

            Rp{{ number_format($service->harga,0,',','.') }}

        </h4>

        @if($service->status=='Aktif')

            <span class="inline-block mt-4 px-4 py-2 bg-black text-white rounded">

                Aktif

            </span>

        @else

            <span class="inline-block mt-4 px-4 py-2 border border-black rounded">

                Nonaktif

            </span>

        @endif

        <div class="flex gap-3 mt-6">

            <button
    onclick="editService(
        '{{ $service->id }}',
        '{{ $service->nama_layanan }}',
        '{{ $service->deskripsi }}',
        '{{ $service->harga }}',
        '{{ $service->status }}'
    )"
    class="flex-1 bg-black text-white py-2 rounded hover:bg-gray-800">

    Edit

</button>

            <form
                action="{{ route('services.admin.destroy',$service->id) }}"
                method="POST"
                class="flex-1">

                @csrf
                @method('DELETE')

                <button
                    onclick="return confirm('Hapus layanan?')"
                    class="w-full border border-black py-2 rounded hover:bg-gray-100">

                    Hapus

                </button>

            </form>

        </div>

    </div>

</div>

@endforeach

</div>

<div id="modalTambah"
     class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50">

    <div class="bg-white rounded-xl w-full max-w-xl p-8">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl font-bold">
                Tambah Layanan
            </h2>

            <button
                onclick="document.getElementById('modalTambah').classList.add('hidden')"
                class="text-3xl">

                &times;

            </button>

        </div>

        <form
            action="{{ route('services.admin.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <div class="mb-4">

                <label>Nama Layanan</label>

                <input
                    type="text"
                    name="nama_layanan"
                    class="w-full border rounded-lg p-3">

            </div>

            <div class="mb-4">

                <label>Deskripsi</label>

                <textarea
                    name="deskripsi"
                    class="w-full border rounded-lg p-3"></textarea>

            </div>

            <div class="mb-4">

                <label>Harga</label>

                <input
                    type="number"
                    name="harga"
                    class="w-full border rounded-lg p-3">

            </div>

            <div class="mb-4">

                <label>Status</label>

                <select
                    name="status"
                    class="w-full border rounded-lg p-3">

                    <option value="Aktif">Aktif</option>

                    <option value="Nonaktif">Nonaktif</option>

                </select>

            </div>

            <div class="mb-6">

                <label>Gambar</label>

                <input
                    type="file"
                    name="gambar"
                    class="w-full border rounded-lg p-3">

            </div>

            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    onclick="document.getElementById('modalTambah').classList.add('hidden')"
                    class="border border-black px-5 py-2 rounded">

                    Batal

                </button>

                <button
                    class="bg-black text-white px-6 py-2 rounded">

                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

<div id="modalEdit"
     class="fixed inset-0 bg-black/50 hidden flex items-center justify-center z-50">

    <div class="bg-white rounded-xl w-full max-w-xl p-8">

        <div class="flex justify-between mb-6">

            <h2 class="text-2xl font-bold">

                Edit Layanan

            </h2>

            <button
                onclick="closeEdit()"
                class="text-3xl">

                &times;

            </button>

        </div>

        <form
            id="editForm"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-4">

                <label>Nama</label>

                <input
                    id="editNama"
                    name="nama_layanan"
                    class="w-full border rounded-lg p-3">

            </div>

            <div class="mb-4">

                <label>Deskripsi</label>

                <textarea
                    id="editDeskripsi"
                    name="deskripsi"
                    class="w-full border rounded-lg p-3"></textarea>

            </div>

            <div class="mb-4">

                <label>Harga</label>

                <input
                    id="editHarga"
                    type="number"
                    name="harga"
                    class="w-full border rounded-lg p-3">

            </div>

            <div class="mb-4">

                <label>Status</label>

                <select
                    id="editStatus"
                    name="status"
                    class="w-full border rounded-lg p-3">

                    <option value="Aktif">Aktif</option>

                    <option value="Nonaktif">Nonaktif</option>

                </select>

            </div>

            <div class="mb-6">

                <label>Ganti Gambar</label>

                <input
                    type="file"
                    name="gambar"
                    class="w-full border rounded-lg p-3">

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
                    class="bg-black text-white px-6 py-2 rounded">

                    Update

                </button>

            </div>

        </form>

    </div>

</div>

<script>

function editService(id,nama_layanan,deskripsi,harga,status){

    document.getElementById('modalEdit').classList.remove('hidden');

    document.getElementById('editNama').value=nama_layanan;

    document.getElementById('editDeskripsi').value=deskripsi;

    document.getElementById('editHarga').value=harga;

    document.getElementById('editStatus').value=status;

    document.getElementById('editForm').action='/services-admin/update/'+id;

}

function closeEdit(){

    document.getElementById('modalEdit').classList.add('hidden');

}

</script>

@endsection