<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Obat Tersedia') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('dashboard') }}" method="GET" class="mb-6">
                    
                    <div class="col-md-10">
                        <input type="text" name="search" class="form-control" 
                               placeholder="Cari nama Obat..." value="{{ request('search') }}">
                        </div>
                        </form>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($medicines as $medicine)
                            <div class="border rounded-lg p-4 hover:shadow-lg transition-shadow duration-200">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $medicine->name }}</h3>
                                <p class="text-gray-600 text-sm mb-2">{{ $medicine->category }}</p>
                                <p class="text-gray-500 text-sm mb-3">{{ Str::limit($medicine->description, 100) }}</p>
                                
                                <div class="flex justify-between items-center mb-3">
                                    <span class="text-lg font-bold text-green-600">Rp {{ number_format($medicine->price, 0, ',', '.') }}</span>
                                    <span class="text-sm text-gray-500">Stok: {{ $medicine->stock }}</span>
                                </div>
                                
                                <div class="text-xs text-gray-400 mb-3">
                                    <p>Produsen: {{ $medicine->manufacturer }}</p>
                                    <p>Kadaluarsa: {{ $medicine->expired_date->format('d/m/Y') }}</p>
                                </div>
                                
                                <a href="{{ route('medicines.show', $medicine) }}" class="block w-full text-center bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded transition-colors duration-200">
                                    Lihat Detail
                                </a>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-8">
                                <p class="text-gray-500">Belum ada obat yang tersedia.</p>
                            </div>
                        @endforelse
                    </div>
                    
                    <div class="mt-6">
                        {{ $medicines->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>