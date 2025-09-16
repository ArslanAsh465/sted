<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Helpers\Constants;
use App\Models\User;
use App\Models\TeacherProfile;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class AdminTeachersController extends Controller
{
    protected $data = [];

    public function index()
    {
        $this->data['teachers'] = User::with('teacher')->where('role', Constants::ROLE_TEACHER)->get();

        return view('backend.admin.teachers.index', $this->data);
    }

    public function create()
    {
        $this->data['institutes'] = User::with('institute')->where('role', Constants::ROLE_INSTITUTE)->get();
        $this->data['countries'] = Country::all();
        $this->data['states'] = State::all();
        $this->data['cities'] = City::all();

        return view('backend.admin.teachers.create', $this->data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',

            'institute_id'  => 'required|exists:users,id',
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'phone'         => 'required|string|max:20',
            'qualification' => 'required|string|max:255',
            'specialization'=> 'required|string|max:255',

            'address'       => 'required|string|max:500',
            'city_id'       => 'required|integer|exists:cities,id',
            'state_id'      => 'required|integer|exists:states,id',
            'country_id'    => 'required|integer|exists:countries,id',
            'postal_code'   => 'required|integer',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = Constants::ROLE_TEACHER;
        $user->save();

        $teacherProfile = new TeacherProfile();
        $teacherProfile->user_id = $user->id;
        $teacherProfile->institute_id = $request->institute_id;
        $teacherProfile->first_name = $request->first_name;
        $teacherProfile->last_name = $request->last_name;
        $teacherProfile->phone = $request->phone;
        $teacherProfile->qualification = $request->qualification;
        $teacherProfile->specialization = $request->specialization;
        $teacherProfile->address = $request->address;
        $teacherProfile->city_id = $request->city_id;
        $teacherProfile->state_id = $request->state_id;
        $teacherProfile->country_id = $request->country_id;
        $teacherProfile->postal_code = $request->postal_code;
        $teacherProfile->save();

        return redirect()->route('admin.teachers.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Teacher user and profile created successfully.');
    }

    public function edit($id)
    {
        $this->data['institutes'] = User::with('institute')->where('role', Constants::ROLE_INSTITUTE)->get();
        $this->data['countries'] = Country::all();
        $this->data['states'] = State::all();
        $this->data['cities'] = City::all();

        $this->data['teacher'] = User::with('teacher')->where('role', Constants::ROLE_TEACHER)->findOrFail($id);

        return view('backend.admin.teachers.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $teacherUser = User::where('role', Constants::ROLE_TEACHER)->findOrFail($id);

        $request->validate([
            'username'       => 'required|string|max:255|unique:users,username,' . $teacherUser->id,
            'email'          => 'required|email|unique:users,email,' . $teacherUser->id,
            'password'       => 'nullable|string|min:6|confirmed',

            'institute_id'   => 'required|exists:users,id',
            'first_name'     => 'required|string|max:255',
            'last_name'      => 'required|string|max:255',
            'phone'          => 'required|string|max:20',
            'qualification'  => 'required|string|max:255',
            'specialization' => 'required|string|max:255',

            'address'        => 'required|string|max:500',
            'city_id'        => 'required|integer|exists:cities,id',
            'state_id'       => 'required|integer|exists:states,id',
            'country_id'     => 'required|integer|exists:countries,id',
            'postal_code'    => 'required|integer',
        ]);

        // Update User info
        $teacherUser->username = $request->username;
        $teacherUser->email = $request->email;

        if ($request->filled('password')) {
            $teacherUser->password = bcrypt($request->password);
        }

        $teacherUser->save();

        // Update or create InstituteProfile
        $profileData = $request->only([
            'first_name',
            'last_name',
            'phone',
            'qualification',
            'specialization',
            'institute_id',
            'address',
            'city_id',
            'state_id',
            'country_id',
            'postal_code',
        ]);

        if ($teacherUser->teacher) {
            $teacherUser->teacher->update($profileData);
        } else {
            $teacherUser->teacher()->create($profileData);
        }

        return redirect()->route('admin.teachers.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Teacher updated successfully.');
    }

    public function destroy($id)
    {
        $teacherUser = User::with('teacher')->where('role', Constants::ROLE_TEACHER)->findOrFail($id);

        if ($teacherUser->teacher) {
            $teacherUser->teacher->delete();
        }

        $teacherUser->delete();

        return redirect()->back()
            ->with('alert_type', 'success')
            ->with('alert_message', 'Teacher deleted successfully.');
    }
}
