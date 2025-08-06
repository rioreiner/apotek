<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Info Obat') }}
            </h2>
            @if(auth()->user()->isAdmin())
                <a href="{{ route('medicines.edit', $medicine) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Edit Obat
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-xl overflow-hidden">
                <div class="p-6">
                    <div class="flex flex-col items-center mb-6">
                        @if ($medicine->image)
                            <img src="{{ asset('storage/'.$medicine->image) }}"
                                 alt="{{ $medicine->name }}"
                                 class="rounded-lg shadow-md object-cover"
                                 style="height:200px;width:100%;max-width:350px;">
                        @else
                            <div class="text-red-500 font-semibold">GAMBAR TIDAK ADA!</div>
                        @endif
                    </div>
                    <div class="mb-4">
                        <h2 class="text-2xl font-bold text-blue-700 mb-2">{{ $medicine->name }}</h2>
                        <div class="flex flex-wrap gap-2 mb-2">
                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-semibold">{{ $medicine->category }}</span>
                            <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-800 text-xs font-semibold">{{ $medicine->manufacturer }}</span>
                        </div>
                        <div class="mb-2 text-lg font-semibold text-gray-800">
                            Harga: <span class="text-green-600">Rp {{ number_format($medicine->price, 2, ',', '.') }}</span>
                        </div>
                        <div class="mb-2">
                            Stok:
                            <span class="px-2 py-1 rounded-full text-xs font-bold
                                {{ $medicine->stock < 10 ? 'bg-red-100 text-red-800' : ($medicine->stock < 50 ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') }}">
                                {{ $medicine->stock }} unit
                            </span>
                        </div>
                        <div class="mb-2">
                            <span class="font-semibold">Deskripsi:</span>
                            <span class="text-gray-700">{{ $medicine->description ?: 'Tidak ada deskripsi' }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="font-semibold">Tanggal Kadaluarsa:</span>
                            <span class="text-gray-700">
                                {{ $medicine->expired_date ? $medicine->expired_date->format('d F Y') : 'Tidak diketahui' }}
                            </span>
                        </div>
                        <div class="mb-2">
                            <span class="font-semibold">Status Kadaluarsa:</span>
                            @php
                                $daysUntilExpiry = (int)now()->diffInDays($medicine->expired_date, false);
                            @endphp
                            @if($daysUntilExpiry < 0)
                                <span class="px-2 py-1 rounded-full bg-red-500 text-white text-xs font-bold">Sudah Kadaluarsa</span>
                            @elseif($daysUntilExpiry <= 90)
                                <span class="px-2 py-1 rounded-full bg-yellow-400 text-gray-900 text-xs font-bold">{{ $daysUntilExpiry }} hari lagi</span>
                            @else
                                <span class="px-2 py-1 rounded-full bg-green-500 text-white text-xs font-bold">Masih Segar</span>
                            @endif
                        </div>
                    </div>
                    <div class="text-gray-500 text-sm mb-4">
                        <div>Dibuat: {{ $medicine->created_at->format('d F Y H:i') }}</div>
                        <div>Diperbarui: {{ $medicine->updated_at->format('d F Y H:i') }}</div>
                    </div>
                    <div class="flex justify-end gap-2">
                        @if(auth()->user()->isAdmin())
                            <form action="{{ route('medicines.destroy', $medicine) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Hapus
                                </button>
                            </form>
                        @endif
                        <a href="{{ Auth::user()->isAdmin() ? route('medicines.index') : route('dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>