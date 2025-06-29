<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cv;

class DashboardController extends Controller
{
    public function index()
    {
        $cvs = Cv::where('member_id', Auth::id())->get();

        return view('dashboard', compact('cvs'));
    }
}
