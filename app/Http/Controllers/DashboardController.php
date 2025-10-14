<?php

namespace App\Http\Controllers;

use App\Models\Goat;
use App\Models\Kid;
use App\Models\Kandang;
use App\Models\Health;
use App\Models\Reproduction;
use Illuminate\View\View;

final class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $counts = [
            'total_goats' => Goat::count(),
            'bunting' => Goat::where('status_kondisi', 'bunting')->count(),
            'kids' => Kid::count(),
            'kandangs' => Kandang::count(),
            'health_sehat' => Health::where('status_kondisi', 'sehat')->count(),
            'health_sakit' => Health::where('status_kondisi', 'sakit')->count(),
            'repro_active' => Reproduction::whereIn('status_reproduksi', ['bunting','menyusui'])->count(),
        ];

        return view('dashboard', compact('counts'));
    }
}










