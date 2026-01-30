<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with real statistics.
     */
    public function index()
    {
        $totalPlants = Product::count();
        $lowStockCount = Product::where('stock', '<=', 5)->count();
        $categoriesCount = Category::count();
        
        // recent products for the "Recent Activity"
        $recentProducts = Product::latest()->take(5)->get();

        return view('dashboard', compact('totalPlants', 'lowStockCount', 'categoriesCount', 'recentProducts'));
    }
}
