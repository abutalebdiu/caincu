<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('hospitals.dashboard');
    }
    public  function hospitallist(){
        return view();
    }
}
