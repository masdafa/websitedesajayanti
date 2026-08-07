<x-admin-layout title="Ganti Password">
    <x-slot:breadcrumb>
        <a href="{{ route('admin.users.index') }}" class="hover:text-emerald-600">Manajemen Pengguna</a> / 
        Ganti Password
    </x-slot:breadcrumb>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden max-w-2xl">
        <div class="p-4 sm:p-6 border-b border-gray-100">
            <h2 class="text-xl font-bold text-gray-800">Ganti Password untuk Akun: <span class="text-emerald-600">{{ $user->name }}</span></h2>
            <p class="text-sm text-gray-500 mt-1">Masukkan password baru untuk akun ini.</p>
        </div>

        <form action="{{ route('admin.users.update-password', $user) }}" method="POST" class="p-4 sm:p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Password Baru -->
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password Baru</label>
                <input type="password" name="password" id="password" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5 @error('password') border-red-500 @enderror" 
                    required>
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-2 text-xs text-gray-500">Minimal 8 karakter.</p>
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5" 
                    required>
            </div>

            <div class="flex gap-4 border-t border-gray-100 pt-6">
                <button type="submit" class="text-white bg-emerald-600 hover:bg-emerald-700 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center transition">
                    Simpan Password
                </button>
                <a href="{{ route('admin.users.index') }}" class="text-gray-700 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center transition">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
