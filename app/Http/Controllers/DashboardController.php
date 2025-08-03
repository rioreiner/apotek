<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $totalMedicines = Medicine::count();
            $lowStock = Medicine::where('stock', '<', 10)->count();
            $expiringSoon = Medicine::where('expired_date', '<=', now()->addMonths(3))->count();
            
            return view('dashboard.admin', compact('totalMedicines', 'lowStock', 'expiringSoon'));
        } else {
            $medicines = Medicine::where('stock', '>', 0)->paginate(12);
            return view('dashboard.user', compact('medicines'));
        }
    }
}