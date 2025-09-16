<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Helpers\Constants;
use App\Models\User;
use App\Models\ParentProfile;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class AdminParentsController extends Controller
{
    protected $data = [];

    public function index()
    {
        $this->data['parents'] = User::with('parent')->where('role', Constants::ROLE_PARENT)->get();

        return view('backend.admin.parents.index', $this->data);
    }

    public function create()
    {
        $this->data['countries'] = Country::all();
        $this->data['states'] = State::all();
        $this->data['cities'] = City::all();

        return view('backend.admin.parents.create', $this->data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username'    => 'required|string|max:255|unique:users,username',
            'email'       => 'required|email|unique:users,email',
            'password'    => 'required|string|min:6|confirmed',

            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'phone'       => 'required|string|max:20',

            'address'     => 'required|string|max:500',
            'city_id'     => 'required|integer|exists:cities,id',
            'state_id'    => 'required|integer|exists:states,id',
            'country_id'  => 'required|integer|exists:countries,id',
            'postal_code' => 'required|integer',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = Constants::ROLE_PARENT;
        $user->save();

        $parentProfile = new ParentProfile();
        $parentProfile->user_id = $user->id;
        $parentProfile->first_name = $request->first_name;
        $parentProfile->last_name = $request->last_name;
        $parentProfile->phone = $request->phone;
        $parentProfile->address = $request->address;
        $parentProfile->city_id = $request->city_id;
        $parentProfile->state_id = $request->state_id;
        $parentProfile->country_id = $request->country_id;
        $parentProfile->postal_code = $request->postal_code;
        $parentProfile->save();

        return redirect()->route('admin.parents.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Parent user and profile created successfully.');
    }

    public function edit($id)
    {
        $this->data['countries'] = Country::all();
        $this->data['states'] = State::all();
        $this->data['cities'] = City::all();

        $this->data['parent'] = User::with('parent')->where('role', Constants::ROLE_PARENT)->findOrFail($id);

        return view('backend.admin.parents.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $parentUser = User::with('parent')->where('role', Constants::ROLE_PARENT)->findOrFail($id);

        $request->validate([
            'username'    => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email,' . $parentUser->id,
            'password'    => 'nullable|string|min:6|confirmed',

            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'phone'       => 'required|string|max:20',

            'address'     => 'required|string|max:500',
            'city_id'     => 'required|integer|exists:cities,id',
            'state_id'    => 'required|integer|exists:states,id',
            'country_id'  => 'required|integer|exists:countries,id',
            'postal_code' => 'required|string|max:20',
        ]);

        // Update User info
        $parentUser->username = $request->username;
        $parentUser->email = $request->email;

        if ($request->filled('password')) {
            $parentUser->password = bcrypt($request->password);
        }

        $parentUser->save();

        // Update or create ParentProfile
        $profileData = $request->only([
            'first_name',
            'last_name',
            'phone',
            'address',
            'city_id',
            'state_id',
            'country_id',
            'postal_code',
        ]);

        if ($parentUser->parent) {
            $parentUser->parent->update($profileData);
        } else {
            $parentUser->parent()->create($profileData);
        }

        return redirect()->route('admin.parents.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Parent updated successfully.');
    }

    public function destroy($id)
    {
        $parent = User::with('parent')->where('role', Constants::ROLE_PARENT)->findOrFail($id);

        if ($parent->parentProfile) {
            $parent->parentProfile->delete();
        }

        $parent->delete();

        return redirect()->back()
            ->with('alert_type', 'success')
            ->with('alert_message', 'Parent deleted successfully.');
    }
}
