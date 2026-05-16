<x-app-layout>
    <div class="max-w-lg mx-auto mt-10 bg-white rounded-xl shadow p-6">
        <h1>Form tambah wallet</h1>
        <form action="{{ route('wallets.store') }}" method="post">
            @csrf
            <div class="name-section">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Masukkan nama dompet:</label>
                <input type="text" name="name" value="{{ old('name') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="type-section">
                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Masukkan tipe:</label>
                <select name="type" id="type" value="{{ old('type') }}">
                    <option value="jajan">Jajan</option>
                    <option value="tabungan">Tabungan</option>
                    <option value="kebutuhan">Kebutuhan</option>
                    <option value="investasi">Investasi</option>
                </select>
            </div>
            <div class="balance-section">
                <label for="balance" class="block text-sm font-medium text-gray-700 mb-1">Masukkan angka:</label>
                <input type="number" name="balance" value="{{ old('balance') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                @error('balance')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 mt-5">Tambah data</button>
        </form>
    </div>
</x-app-layout>