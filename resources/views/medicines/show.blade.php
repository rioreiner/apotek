@extends('layouts.master')

@section('obat')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="display-5 fw-bold text-dark">Info Obat</h2>
        <hr>
    </div>
    <div class="card shadow-sm mx-auto" style="max-width: 30rem;">
        

        <div class="card-body bg-light" style="box-shadow: 0 0 15px rgba(0,0,0,0.8);">
            <div class="text-center mb-3">
                @if ($medicine->image)
                    <img src="{{ asset('storage/'.$medicine->image) }}"
                         class="img-fluid rounded"
                         style="height: 200px; object-fit: cover; width: 100%;border-radius:10px;">
                @else
                    <p class="text-danger">GAMBAR TIDAK ADA!</p>
                @endif
            </div>

            <ul class="list-group list-group-flush mb-3">
                <h2 class="text-primary" style="font-family: Impact;">{{ $medicine->name }}</h2>
                <li class="list-group-item"><strong>Kategori:</strong> {{ $medicine->category }}</li>
                <li class="list-group-item"><strong>Produsen:</strong> {{ $medicine->manufacturer }}</li>
                <li class="list-group-item"><strong>Harga:</strong> Rp {{ number_format($medicine->price, 2, ',', '.') }}</li>
                <li class="list-group-item">
                    <strong>Stok:</strong> 
                    <span class="badge {{ $medicine->stock < 10 ? 'bg-danger' : ($medicine->stock < 50 ? 'bg-warning text-dark' : 'bg-success') }}">
                        {{ $medicine->stock }} unit
                    </span>
                </li>
                <li class="list-group-item"><strong>Deskripsi:</strong> {{ $medicine->description ?: 'Tidak ada deskripsi' }}</li>
                <li class="list-group-item">
                    <strong>Tanggal Kadaluarsa:</strong> 
                    {{ $medicine->expired_date ? $medicine->expired_date->format('d F Y') : 'Tidak diketahui' }}
                </li>
                <li class="list-group-item">
                    <strong>Status Kadaluarsa:</strong>
                   @php
                        $daysUntilExpiry = (int)now()->diffInDays($medicine->expired_date, false);
                    @endphp
                    @if($daysUntilExpiry < 0)
                        <span class="badge bg-danger">Sudah Kadaluarsa</span>
                    @elseif($daysUntilExpiry <= 90)
                        <span class="badge bg-warning text-dark">{{ $daysUntilExpiry }} hari lagi</span>
                    @else
                        <span class="badge bg-success">Masih Segar</span>
                    @endif
                </li>
            </ul>

            <div class="text-muted small">
                <p>Dibuat: {{ $medicine->created_at->format('d F Y H:i') }}</p>
                <p>Diperbarui: {{ $medicine->updated_at->format('d F Y H:i') }}</p>
            </div>
            <div class="card-footer text-end">
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('medicines.edit', $medicine) }}" class="btn btn-warning"> <i class="bi bi-pencil"></i>
                        Edit</a>
                    <form action="{{ route('medicines.destroy', $medicine) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i>Hapus</button>
                    </form>
            @endif
            <a href="{{ Auth::user()->isAdmin() ? route('medicines.index') : route('dashboard') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle"></i> Kembali
            </a>
        </div>
        </div>
    </div>
</div>
@endsection
