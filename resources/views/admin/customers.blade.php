@extends('layouts.admin')

@section('title','Customers')

@section('page-title','Customers')

@section('content')

<div class="card">

    <div class="flex justify-between items-center border-b pb-5 mb-6">

        <div>

            <h2 class="text-2xl font-bold">
                Data Pelanggan
            </h2>

            <p class="text-gray-500">
                Daftar seluruh pelanggan X-CarWash
            </p>

        </div>

        <button
            class="bg-black text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition">

            + Tambah Customer

        </button>

    </div>

    <!-- Search -->

    <div class="mb-6">

        <input
            type="text"
            placeholder="Cari pelanggan..."
            class="w-full border-2 border-black rounded-lg px-5 py-3 focus:outline-none">

    </div>

    <!-- Table -->

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-4">No</th>

                    <th class="text-left py-4">Nama</th>

                    <th class="text-left py-4">Email</th>

                    <th class="text-left py-4">No HP</th>

                    <th class="text-left py-4">Alamat</th>

                    <th class="text-center py-4">Aksi</th>

                </tr>

            </thead>

            <tbody>

                <tr class="border-b hover:bg-gray-50">

                    <td class="py-5">
                        1
                    </td>

                    <td>

                        <div class="flex items-center gap-3">

                            <div
                                class="w-11 h-11 rounded-full bg-black text-white flex items-center justify-center font-bold">

                                A

                            </div>

                            <div>

                                <strong>
                                    Akmal Taqiyyudin
                                </strong>

                                <br>

                                <small class="text-gray-500">
                                    Member
                                </small>

                            </div>

                        </div>

                    </td>

                    <td>

                        akmal@gmail.com

                    </td>

                    <td>

                        081234567890

                    </td>

                    <td>

                        Yogyakarta

                    </td>

                    <td class="text-center space-x-2">

                        <button
                            class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">

                            Edit

                        </button>

                        <button
                            class="border border-black px-4 py-2 rounded hover:bg-black hover:text-white">

                            Hapus

                        </button>

                    </td>

                </tr>

                <tr class="border-b hover:bg-gray-50">

                    <td class="py-5">
                        2
                    </td>

                    <td>

                        <div class="flex items-center gap-3">

                            <div
                                class="w-11 h-11 rounded-full bg-black text-white flex items-center justify-center font-bold">

                                B

                            </div>

                            <div>

                                <strong>
                                    Bambang
                                </strong>

                                <br>

                                <small class="text-gray-500">
                                    Member
                                </small>

                            </div>

                        </div>

                    </td>

                    <td>

                        bambang@gmail.com

                    </td>

                    <td>

                        082211223344

                    </td>

                    <td>

                        Sleman

                    </td>

                    <td class="text-center space-x-2">

                        <button
                            class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">

                            Edit

                        </button>

                        <button
                            class="border border-black px-4 py-2 rounded hover:bg-black hover:text-white">

                            Hapus

                        </button>

                    </td>

                </tr>

                <tr class="hover:bg-gray-50">

                    <td class="py-5">
                        3
                    </td>

                    <td>

                        <div class="flex items-center gap-3">

                            <div
                                class="w-11 h-11 rounded-full bg-black text-white flex items-center justify-center font-bold">

                                C

                            </div>

                            <div>

                                <strong>
                                    Citra Dewi
                                </strong>

                                <br>

                                <small class="text-gray-500">
                                    Member
                                </small>

                            </div>

                        </div>

                    </td>

                    <td>

                        citra@gmail.com

                    </td>

                    <td>

                        081122334455

                    </td>

                    <td>

                        Bantul

                    </td>

                    <td class="text-center space-x-2">

                        <button
                            class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">

                            Edit

                        </button>

                        <button
                            class="border border-black px-4 py-2 rounded hover:bg-black hover:text-white">

                            Hapus

                        </button>

                    </td>

                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection