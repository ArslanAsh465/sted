<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Helpers\Constants;
use App\Models\User;
use App\Models\InstituteProfile;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class AdminInstitutesController extends Controller
{
    protected $data = [];

    public function index()
    {
        $this->data['institutes'] = User::with('institute')->where('role', Constants::ROLE_INSTITUTE)->get();

        return view('backend.admin.institutes.index', $this->data);
    }

    public function create()
    {
        $this->data['countries'] = Country::all();
        $this->data['states'] = State::all();
        $this->data['cities'] = City::all();

        return view('backend.admin.institutes.create', $this->data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',

            'name'                => 'required|string|max:255',
            'principal_name'      => 'required|string|max:255',
            'mobile_no'           => 'required|string|max:20',
            'whatsapp_no'         => 'nullable|string|max:20',
            'website' => ['nullable', 'max:255', 'regex:/^(https?:\/\/)?([\w\-]+\.)+[\w\-]+(\/[\w\-\.~!$&\'()*+,;=:@%]*)*$/'],

            'address'             => 'required|string|max:500',
            'city_id'             => 'required|integer|exists:cities,id',
            'state_id'            => 'required|integer|exists:states,id',
            'country_id'          => 'required|integer|exists:countries,id',
            'postal_code'         => 'required|integer',

            'registration_number' => 'nullable|string|max:100',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = Constants::ROLE_INSTITUTE;
        $user->save();

        $instituteProfile = new InstituteProfile();
        $instituteProfile->user_id = $user->id;
        $instituteProfile->name = $request->name;
        $instituteProfile->principal_name = $request->principal_name;
        $instituteProfile->mobile_no = $request->mobile_no;
        $instituteProfile->whatsapp_no = $request->whatsapp_no;
        $instituteProfile->website = $request->website;
        $instituteProfile->address = $request->address;
        $instituteProfile->city_id = $request->city_id;
        $instituteProfile->state_id = $request->state_id;
        $instituteProfile->country_id = $request->country_id;
        $instituteProfile->postal_code = $request->postal_code;
        $instituteProfile->registration_number = $request->registration_number;
        $instituteProfile->save();

        return redirect()->route('admin.institutes.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Institute user and profile created successfully.');
    }

    public function edit($id)
    {
        $this->data['countries'] = Country::all();
        $this->data['states'] = State::all();
        $this->data['cities'] = City::all();

        $this->data['institute'] = User::with('institute')->where('role', Constants::ROLE_INSTITUTE)->findOrFail($id);

        return view('backend.admin.institutes.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $instituteUser = User::where('role', Constants::ROLE_INSTITUTE)->findOrFail($id);

        $request->validate([
            'username'           => 'required|string|max:255',
            'email'              => 'required|email|unique:users,email,' . $instituteUser->id,
            'password'           => 'nullable|string|min:6|confirmed',
            'name'               => 'required|string|max:255',
            'principal_name'     => 'required|string|max:255',
            'mobile_no'          => 'required|string|max:20',
            'whatsapp_no'        => 'nullable|string|max:20',
            'website'            => ['nullable', 'max:255', 'regex:/^(https?:\/\/)?([\w\-]+\.)+[\w\-]+(\/[\w\-\.~!$&\'()*+,;=:@%]*)*$/'],
            'address'            => 'required|string',
            'city_id'            => 'required|integer|exists:cities,id',
            'state_id'           => 'required|integer|exists:states,id',
            'country_id'         => 'required|integer|exists:countries,id',
            'postal_code'        => 'required|string|max:20',
            'registration_number'=> 'nullable|string|max:100',
        ]);

        // Update User info
        $instituteUser->username = $request->username;
        $instituteUser->email = $request->email;

        if ($request->filled('password')) {
            $instituteUser->password = bcrypt($request->password);
        }

        $instituteUser->save();

        // Update or create InstituteProfile
        $profileData = $request->only([
            'name',
            'principal_name',
            'mobile_no',
            'whatsapp_no',
            'website',
            'address',
            'city_id',
            'state_id',
            'country_id',
            'postal_code',
            'registration_number',
        ]);

        if ($instituteUser->institute) {
            $instituteUser->institute->update($profileData);
        } else {
            $instituteUser->institute()->create($profileData);
        }

        return redirect()->route('admin.institutes.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Institute updated successfully.');
    }

    public function destroy($id)
    {
        $institute = User::with('institute')->where('role', Constants::ROLE_INSTITUTE)->findOrFail($id);

        if ($institute->institute) {
            $institute->institute->delete();
        }

        $institute->delete();

        return redirect()->back()
            ->with('alert_type', 'success')
            ->with('alert_message', 'Institute deleted successfully.');
    }
}
