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
              $query = Medicine::where('stock', '>', 0);

        if (request()->has('search') && request('search') != '') {
            $search = request('search');
            $query->where('name', 'like', "%{$search}%");
        }

        $medicines = $query->paginate(12)->withQueryString();

        return view('dashboard.user', compact('medicines'));
        }

    }
}