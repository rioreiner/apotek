<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::paginate(10);
        return view('medicines.index', compact('medicines'));
    }

    public function create()
    {
        return view('medicines.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string|max:255',
            'image' => 'required|image|mimes: jpg,jpeg,png|max: 2046',
            'expired_date' => 'required|date|after:today',
            'manufacturer' => 'required|string|max:255',
        ]);
        $gambar = $request->file('image')->store('gambar_obat', 'public');
        $validated['image'] = $gambar;
        Medicine::create($validated);

        return redirect()->route('medicines.index')
            ->with('success', 'Obat berhasil ditambahkan.');
    }

    public function show(Medicine $medicine)
    {
        return view('medicines.show', compact('medicine'));
    }

    public function edit(Medicine $medicine)
    {
        return view('medicines.edit', compact('medicine'));
    }

    public function update(Request $request, Medicine $medicine)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'category' => 'required|string|max:255',
        'image' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
        'expired_date' => 'required|date|after:today',
        'manufacturer' => 'required|string|max:255',
    ]);

    if ($request->hasFile('image')) {
        $gambar = $request->file('image')->store('gambar_obat', 'public');
        $validated['image'] = $gambar;
    }

    $medicine->update($validated); 

    return redirect()->route('medicines.index')
        ->with('success', 'Obat berhasil diperbarui.');
}

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return redirect()->route('medicines.index')
            ->with('success', 'Obat berhasil dihapus.');
    }
}