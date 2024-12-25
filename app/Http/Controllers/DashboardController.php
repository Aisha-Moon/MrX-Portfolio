<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    function DashboardPage(){
        return view('admin.pages.dashboard.dashboard-page');
    }
    public function heroPage(){
        return view('admin.pages.dashboard.hero-page');
    }

 
}
