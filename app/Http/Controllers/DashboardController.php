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
    public function aboutPage(){
        return view('admin.pages.dashboard.about-page');
    }
    
    public function experience(){
        return view('admin.pages.dashboard.experience-page');
    }
    public function education(){
        return view('admin.pages.dashboard.education-page');
    }
    public function skill(){
        return view('admin.pages.dashboard.skill-page');
    }
    public function language(){
        return view('admin.pages.dashboard.language-page');
    }
    public function resume(){
        return view('admin.pages.dashboard.resume-page');
    }
    public function projectPage(){
        return view('admin.pages.dashboard.project-page');
    }
    public function contactPage(){
        return view('admin.pages.dashboard.contact-page');
    }
 
}
