<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Helpers\Constants;
use App\Models\User;

class AdminAdminsController extends Controller
{
    protected $data = [];

    public function index()
    {
        $this->data['admins'] = User::where('role', Constants::ROLE_ADMIN)->get();

        return view('backend.admin.admins.index', $this->data);
    }

    public function create()
    {
        return view('backend.admin.admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $admin = new User();
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->role = Constants::ROLE_ADMIN;
        $admin->save();

        return redirect()->route('admin.admins.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Admin created successfully.');
    }

    public function edit($id)
    {
        $this->data['admin'] = User::where('role', Constants::ROLE_ADMIN)->findOrFail($id);

        return view('backend.admin.admins.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $admin = User::where('role', Constants::ROLE_ADMIN)->findOrFail($id);

        $request->validate([
            'username'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $admin->username = $request->username;
        $admin->email = $request->email;

        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password);
        }

        $admin->save();

        return redirect()->route('admin.admins.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Admin updated successfully.');
    }

    public function destroy($id)
    {
        $admin = User::where('role', Constants::ROLE_ADMIN)->findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.admins.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Admin deleted successfully.');
    }
}
