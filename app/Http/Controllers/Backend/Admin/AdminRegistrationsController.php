<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Registration;

class AdminRegistrationsController extends Controller
{
    protected $data = [];

    public function index()
    {
        $this->data['registrations'] = Registration::with('exam', 'user')->latest()->get();

        return view('backend.admin.exams.index', $this->data);
    }
}
