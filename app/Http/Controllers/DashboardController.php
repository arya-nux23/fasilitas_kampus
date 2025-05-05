<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.dashboard');
    }


    public function dashboard_mhs(){
        return view('dashboard.dash_mhs');
    }
}
