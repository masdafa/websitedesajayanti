<x-admin-layout title="Tambah Laporan Keuangan DKM">
    <x-slot:breadcrumb>Tambah Laporan Keuangan DKM</x-slot:breadcrumb>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Tambah Laporan Keuangan DKM</h1>
    </div>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden max-w-2xl">
        <form action="{{ route('admin.dkm-financial-reports.store') }}" method="POST" class="p-6 sm:p-8 space-y-5">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Bulan (Angka) <span class="text-red-500">*</span></label>
                    <input type="number" name="month" value="{{ old('month') }}" required min="1" max="12"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3"
                        placeholder="1-12">
                    @error('month') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Tahun <span class="text-red-500">*</span></label>
                    <input type="number" name="year" value="{{ old('year', date('Y')) }}" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">
                    @error('year') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Pemasukan (Rp) <span class="text-red-500">*</span></label>
                <input type="number" name="income" id="income" value="{{ old('income', 0) }}" required min="0"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">
                @error('income') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Pengeluaran (Rp) <span class="text-red-500">*</span></label>
                <input type="number" name="expense" id="expense" value="{{ old('expense', 0) }}" required min="0"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3">
                @error('expense') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-900 mb-2">Saldo (Rp) <span class="text-red-500">*</span></label>
                <input type="number" name="balance" id="balance" value="{{ old('balance', 0) }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-emerald-500 focus:border-emerald-500 block w-full px-4 py-3 bg-gray-100">
                @error('balance') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4 flex gap-3 border-t border-gray-100">
                <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2.5 px-6 rounded-xl transition">Simpan</button>
                <a href="{{ route('admin.dkm-financial-reports.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2.5 px-6 rounded-xl transition">Batal</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('income').addEventListener('input', calculateBalance);
        document.getElementById('expense').addEventListener('input', calculateBalance);

        function calculateBalance() {
            let income = parseFloat(document.getElementById('income').value) || 0;
            let expense = parseFloat(document.getElementById('expense').value) || 0;
            document.getElementById('balance').value = income - expense;
        }
    </script>
</x-admin-layout>
