<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Helpers\Constants;
use App\Models\User;

class AdminModeratorsController extends Controller
{
    protected $data = [];

    public function index()
    {
        $this->data['moderators'] = User::where('role', Constants::ROLE_MODERATOR)->get();

        return view('backend.admin.moderators.index', $this->data);
    }

    public function create()
    {
        return view('backend.admin.moderators.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $moderator = new User();
        $moderator->username = $request->username;
        $moderator->email = $request->email;
        $moderator->password = bcrypt($request->password);
        $moderator->role = Constants::ROLE_MODERATOR;
        $moderator->save();

        return redirect()->route('admin.moderators.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Moderator created successfully.');
    }

    public function edit($id)
    {
        $this->data['moderator'] = User::where('role', Constants::ROLE_MODERATOR)->findOrFail($id);

        return view('backend.admin.moderators.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $moderator = User::where('role', Constants::ROLE_MODERATOR)->findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $moderator->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $moderator->username = $request->username;
        $moderator->email = $request->email;

        if ($request->filled('password')) {
            $moderator->password = bcrypt($request->password);
        }

        $moderator->save();

        return redirect()->route('admin.moderators.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Moderator updated successfully.');
    }

    public function destroy($id)
    {
        $moderator = User::where('role', Constants::ROLE_MODERATOR)->findOrFail($id);
        $moderator->delete();

        return redirect()->route('admin.moderators.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Moderator deleted successfully.');
    }
}
