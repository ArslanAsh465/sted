<?php

namespace App\Http\Controllers\Backend\Parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParentDashboardController extends Controller
{
    public function dashboard()
    {
        return view('backend.parent.dashboard');
    }
}
