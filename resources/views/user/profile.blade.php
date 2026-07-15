@extends('layouts.user')

@section('title', 'Profil Saya')

@section('page-title', 'Profil Saya')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <!-- Profile Card -->
    <div class="card border border-gray-300 text-center">

        <img
            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=000000&color=ffffff&size=150"
            class="w-36 h-36 rounded-full mx-auto mb-6 border-4 border-black">

        <h2 class="text-2xl font-bold">
            {{ Auth::user()->name }}
        </h2>

        <p class="text-gray-500 mt-2">
            {{ Auth::user()->email }}
        </p>

        <span class="inline-block mt-5 px-5 py-2 bg-black text-white rounded-lg">
            {{ ucfirst(Auth::user()->role) }}
        </span>

    </div>

    <!-- Edit Profile -->
    <div class="card border border-gray-300 lg:col-span-2">

        <h2 class="text-2xl font-bold border-b pb-4 mb-6">
            Edit Profil
        </h2>

        @if(session('status') == 'profile-updated')

            <div class="mb-6 p-4 border border-black bg-gray-100 rounded-lg">

                Profil berhasil diperbarui.

            </div>

        @endif

        <form method="POST" action="{{ route('profile.update') }}">

            @csrf
            @method('PATCH')

            <div class="mb-6">

                <label class="block mb-2 font-semibold">
                    Nama
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', Auth::user()->name) }}"
                    class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-black focus:outline-none">

                @error('name')

                    <small class="text-red-500">
                        {{ $message }}
                    </small>

                @enderror

            </div>

            <div class="mb-6">

                <label class="block mb-2 font-semibold">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', Auth::user()->email) }}"
                    class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-black focus:outline-none">

                @error('email')

                    <small class="text-red-500">
                        {{ $message }}
                    </small>

                @enderror

            </div>

            <button
                class="bg-black text-white px-7 py-3 rounded-lg hover:bg-gray-800 transition">

                Simpan Perubahan

            </button>

        </form>

    </div>

</div>

<!-- Change Password -->

<div class="card border border-gray-300 mt-8">

    <h2 class="text-2xl font-bold border-b pb-4 mb-6">

        Ubah Password

    </h2>

    @if(session('status') == 'password-updated')

        <div class="mb-6 p-4 border border-black bg-gray-100 rounded-lg">

            Password berhasil diperbarui.

        </div>

    @endif

    <form method="POST" action="{{ route('password.update') }}">

        @csrf
        @method('PUT')

        <div class="mb-6">

            <label class="block mb-2 font-semibold">

                Password Lama

            </label>

            <input
                type="password"
                name="current_password"
                class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-black focus:outline-none">

            @error('current_password')

                <small class="text-red-500">

                    {{ $message }}

                </small>

            @enderror

        </div>

        <div class="mb-6">

            <label class="block mb-2 font-semibold">

                Password Baru

            </label>

            <input
                type="password"
                name="password"
                class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-black focus:outline-none">

            @error('password')

                <small class="text-red-500">

                    {{ $message }}

                </small>

            @enderror

        </div>

        <div class="mb-8">

            <label class="block mb-2 font-semibold">

                Konfirmasi Password Baru

            </label>

            <input
                type="password"
                name="password_confirmation"
                class="w-full border-2 border-gray-300 rounded-lg px-4 py-3 focus:border-black focus:outline-none">

        </div>

        <button
            class="bg-black text-white px-7 py-3 rounded-lg hover:bg-gray-800 transition">

            Ubah Password

        </button>

    </form>

</div>

@endsection