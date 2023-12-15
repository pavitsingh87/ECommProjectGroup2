<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class DashboardController extends Controller
    {
        public function index(){
            $total_users = User::count();
            $total_products = Product::count();
            $total_categories = Category::count();
    
            return view('admin.index', compact('total_users', 'total_products', 'total_categories'));
        }

    }

