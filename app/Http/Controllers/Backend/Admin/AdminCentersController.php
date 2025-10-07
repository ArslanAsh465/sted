<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Center;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class AdminCentersController extends Controller
{
    protected $data = [];

    public function index()
    {
        $this->data['centers'] = Center::with(['city', 'state', 'country'])->latest()->get();

        return view('backend.admin.centers.index', $this->data);
    }

    public function create()
    {
        $this->data['countries'] = Country::all();
        $this->data['states'] = State::all();
        $this->data['cities'] = City::all();

        return view('backend.admin.centers.create', $this->data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'   => 'required|string|unique:centers,name',
            'status' => 'required|boolean',

            'address'     => 'required|string',
            'city_id'     => 'required|integer|exists:cities,id',
            'state_id'    => 'required|integer|exists:states,id',
            'country_id'  => 'required|integer|exists:countries,id',
            'postal_code' => 'required|string',
        ]);

        Center::create($validated);

        return redirect()->route('admin.centers.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Center created successfully.');
    }

    public function show($id)
    {
        $this->data['center'] = Center::with(['city', 'state', 'country'])->findOrFail($id);

        return view('backend.admin.centers.show', $this->data);
    }

    public function edit($id)
    {
        $this->data['center'] = Center::with(['city', 'state', 'country'])->findOrFail($id);

        $this->data['countries'] = Country::all();
        $this->data['states'] = State::all();
        $this->data['cities'] = City::all();

        return view('backend.admin.centers.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $center = Center::findOrFail($id);

        $request->validate([
            'name'         => 'required|string|min:3|unique:centers,name,' . $center->id,
            'status'       => 'required|boolean',
            'address'      => 'required|string',
            'city_id'      => 'required|integer|exists:cities,id',
            'state_id'     => 'required|integer|exists:states,id',
            'country_id'   => 'required|integer|exists:countries,id',
            'postal_code'  => 'required|string|max:10',
        ]);

        $center->name         = $request->name;
        $center->status       = $request->status;
        $center->address      = $request->address;
        $center->city_id      = $request->city_id;
        $center->state_id     = $request->state_id;
        $center->country_id   = $request->country_id;
        $center->postal_code  = $request->postal_code;

        $center->save();

        return redirect()->route('admin.centers.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Center updated successfully.');
    }

    public function destroy($id)
    {
        $center = Center::findOrFail($id);

        $center->delete();

        return redirect()->route('admin.centers.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Center deleted successfully.');
    }
}
