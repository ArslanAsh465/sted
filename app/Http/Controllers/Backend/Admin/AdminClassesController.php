<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Classes;

class AdminClassesController extends Controller
{
    protected $data = [];

    public function index()
    {
        $this->data['classes'] = Classes::latest()->get();

        return view('backend.admin.classes.index', $this->data);
    }

    public function create()
    {
        return view('backend.admin.classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|unique:classes,name',
            'description' => 'required|string',
            'status'      => 'required|boolean',
        ]);

        Classes::create([
            'name'        => $request->name,
            'description' => $request->description,
            'status'      => $request->status,
        ]);

        return redirect()->route('admin.classes.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Class created successfully.');
    }

    public function show($id)
    {
        $this->data['class'] = Classes::findOrFail($id);

        return view('backend.admin.classes.show', $this->data);
    }

    public function edit($id)
    {
        $this->data['class'] = Classes::findOrFail($id);

        return view('backend.admin.classes.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $class = Classes::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|unique:classes,name,' . $class->id,
            'description' => 'required|string',
            'status'      => 'required|boolean',
        ]);

        $class->update([
            'name'        => $request->name,
            'description' => $request->description,
            'status'      => $request->status,
        ]);

        return redirect()->route('admin.classes.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Class updated successfully.');
    }

    public function destroy($id)
    {
        $class = Classes::findOrFail($id);

        $class->delete();

        return redirect()->back()
            ->with('alert_type', 'success')
            ->with('alert_message', 'Class deleted successfully.');
    }
}
