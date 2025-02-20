<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        // Get some useful statistics for the dashboard
        $stats = [
            'total_customers' => Customer::count(),
            'active_customers' => Customer::where('status', 'active')->count(),
            'leads' => Customer::where('status', 'lead')->count(),
            'inactive_customers' => Customer::where('status', 'inactive')->count(),
            'recent_customers' => Customer::latest()->take(5)->get()
        ];

        return view('dashboard.index', compact('stats'));
    }
}
