<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $medicine->name }}
            </h2>
            @if(auth()->user()->isAdmin())
                <div class="space-x-2">
                    <a href="{{ route('medicines.edit', $medicine) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        Edit
                    </a>
                    <form action="{{ route('medicines.destroy', $medicine) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Yakin ingin menghapus?')">
                            Hapus
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Informasi Utama -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Obat</h3>
                            <dl class="space-y-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Nama Obat</dt>
                                    <dd class="text-lg font-semibold text-gray-900">{{ $medicine->name }}</dd>
                                </div>
                                
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Kategori</dt>
                                    <dd>
                                        <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            {{ $medicine->category }}
                                        </span>
                                    </dd>
                                </div>
                                
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Produsen</dt>
                                    <dd class="text-base text-gray-900">{{ $medicine->manufacturer }}</dd>
                                </div>
                                
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Deskripsi</dt>
                                    <dd class="text-base text-gray-900">{{ $medicine->description ?: 'Tidak ada deskripsi' }}</dd>
                                </div>
                            </dl>
                        </div>

                        <!-- Informasi Stok & Harga -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Stok & Harga</h3>
                            <dl class="space-y-3">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Harga</dt>
                                    <dd class="text-2xl font-bold text-green-600">Rp {{ number_format($medicine->price, 0, ',', '.') }}</dd>
                                </div>
                                
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Stok Tersedia</dt>
                                    <dd>
                                        <span class="px-3 py-1 inline-flex text-lg leading-6 font-semibold rounded-full 
                                            {{ $medicine->stock < 10 ? 'bg-red-100 text-red-800' : ($medicine->stock < 50 ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') }}">
                                            {{ $medicine->stock }} unit
                                        </span>
                                    </dd>
                                </div>
                                
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Tanggal Kadaluarsa</dt>
                                    <dd class="text-base text-gray-900">{{ $medicine->expired_date->format('d F Y') }}</dd>
                                </div>
                                
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Status Kadaluarsa</dt>
                                    <dd>
                                        @php
                                            $daysUntilExpiry = now()->diffInDays($medicine->expired_date, false);
                                        @endphp
                                        @if($daysUntilExpiry < 0)
                                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Sudah Kadaluarsa
                                            </span>
                                        @elseif($daysUntilExpiry <= 90)
                                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                {{ $daysUntilExpiry }} hari lagi
                                            </span>
                                        @else
                                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Masih Segar
                                            </span>
                                        @endif
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                    
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <a href="{{ route('medicines.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                ← Kembali ke Daftar
                            </a>
                            
                            <div class="text-sm text-gray-500">
                                <p>Dibuat: {{ $medicine->created_at->format('d F Y H:i') }}</p>
                                <p>Diperbarui: {{ $medicine->updated_at->format('d F Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>