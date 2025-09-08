<?php

namespace App\Http\Controllers\Backend\Moderator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModeratorDashboardController extends Controller
{
    public function dashboard()
    {
        return view('backend.moderator.dashboard');
    }
}
