<x-app-layout>
    @foreach ($allData as $data)
        <h1>{{ $data->name }}</h1>
        <p>{{ $data->type }}</p>
        <p>{{ $data->balance}}</p>

        <form action="{{ route('wallets.destroy', $data->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    @endforeach
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('wallets.create') }}">Tambah data</a>
</x-app-layout>