<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Helpers\Constants;
use App\Models\User;
use App\Models\StudentProfile;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class AdminStudentsController extends Controller
{
    protected $data = [];

    public function index()
    {
        $this->data['students'] = User::with('student')->where('role', Constants::ROLE_STUDENT)->get();

        return view('backend.admin.students.index', $this->data);
    }

    public function create()
    {
        $this->data['parents'] = User::with('parent')->where('role', Constants::ROLE_PARENT)->get();
        $this->data['countries'] = Country::all();
        $this->data['states'] = State::all();
        $this->data['cities'] = City::all();

        return view('backend.admin.students.create', $this->data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',

            'parent_id'   => 'required|exists:users,id',
            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'phone'       => 'required|string|max:20',
            'roll_no'     => 'required|string|max:50|unique:student_profiles,roll_no',
            'date_of_birth' => 'required|date',

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
        $user->role = Constants::ROLE_STUDENT;
        $user->save();

        $studentProfile = new StudentProfile();
        $studentProfile->user_id = $user->id;
        $studentProfile->parent_id = $request->parent_id;
        $studentProfile->first_name = $request->first_name;
        $studentProfile->last_name = $request->last_name;
        $studentProfile->phone = $request->phone;
        $studentProfile->roll_no = $request->roll_no;
        $studentProfile->date_of_birth = $request->date_of_birth;
        $studentProfile->address = $request->address;
        $studentProfile->city_id = $request->city_id;
        $studentProfile->state_id = $request->state_id;
        $studentProfile->country_id = $request->country_id;
        $studentProfile->postal_code = $request->postal_code;
        $studentProfile->save();

        return redirect()->route('admin.students.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Student user and profile created successfully.');
    }

    public function edit($id)
    {
        $this->data['parents'] = User::with('parent')->where('role', Constants::ROLE_PARENT)->get();
        $this->data['countries'] = Country::all();
        $this->data['states'] = State::all();
        $this->data['cities'] = City::all();

        $this->data['student'] = User::with('student')->where('role', Constants::ROLE_STUDENT)->findOrFail($id);

        return view('backend.admin.students.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $studentUser = User::with('student')->where('role', Constants::ROLE_STUDENT)->findOrFail($id);

        $request->validate([
            'username'     => 'required|string|max:255|unique:users,username,' . $studentUser->id,
            'email'        => 'required|email|unique:users,email,' . $studentUser->id,
            'password'     => 'nullable|string|min:6|confirmed',

            'parent_id'    => 'required|exists:users,id',
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'phone'       => 'required|string|max:20',
            'roll_no'      => 'required|string|max:50|unique:student_profiles,roll_no,' . ($studentUser->studentProfile->id ?? 'NULL'),
            'date_of_birth' => 'required|date',

            'address'      => 'required|string|max:500',
            'city_id'      => 'required|integer|exists:cities,id',
            'state_id'     => 'required|integer|exists:states,id',
            'country_id'   => 'required|integer|exists:countries,id',
            'postal_code'  => 'required|integer',
        ]);

        // Update User info
        $studentUser->username = $request->username;
        $studentUser->email = $request->email;

        if ($request->filled('password')) {
            $studentUser->password = bcrypt($request->password);
        }

        $studentUser->save();

        // Update or create Student Profile
        $profileData = $request->only([
            'parent_id',
            'first_name',
            'last_name',
            'phone',
            'roll_no',
            'date_of_birth',
            'address',
            'city_id',
            'state_id',
            'country_id',
            'postal_code',
        ]);

        if ($studentUser->studentProfile) {
            $studentUser->studentProfile->update($profileData);
        } else {
            $studentUser->studentProfile()->create($profileData);
        }

        return redirect()->route('admin.students.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $studentUser = User::with('student')->where('role', Constants::ROLE_STUDENT)->findOrFail($id);

        if ($studentUser->student) {
            $studentUser->student->delete();
        }

        $studentUser->delete();

        return redirect()->back()
            ->with('alert_type', 'success')
            ->with('alert_message', 'Student deleted successfully.');
    }
}
