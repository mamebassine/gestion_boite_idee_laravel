<?php

namespace App\Http\Controllers;

use App\Models\Idee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        

        
    
    $idees = Idee::all();
    return view('administrateurs.dashboard', compact('idees'));
}
}
