<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Gallery;

class AdminGalleryController extends Controller
{
    protected $data = [];

    public function index()
    {
        $this->data['galleries'] = Gallery::latest()->get();

        return view('backend.admin.gallery.index', $this->data);
    }

    public function create()
    {
        return view('backend.admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'image'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'     => 'required|in:0,1',
            'start_time' => 'required|date',
            'end_time'   => 'required|date|after_or_equal:start_time',
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'user_id'     => auth()->id(),
            'title'       => $request->title,
            'image_path'  => $path,
            'status'      => $request->status,
            'start_time'  => $request->start_time,
            'end_time'    => $request->end_time,
        ]);

        return redirect()->route('admin.gallery.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Gallery image uploaded successfully.');
    }

    public function show($id)
    {
        $this->data['gallery'] = Gallery::with('user')->findOrFail($id);

        return view('backend.admin.gallery.show', $this->data);
    }

    public function edit($id)
    {
        $this->data['gallery'] = Gallery::findOrFail($id);

        return view('backend.admin.gallery.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'      => 'required|in:0,1',
            'start_time'  => 'required|date',
            'end_time'    => 'required|date|after_or_equal:start_time',
        ]);

        // Handle image replacement
        if ($request->hasFile('image')) {
            if ($gallery->image_path && Storage::disk('public')->exists($gallery->image_path)) {
                Storage::disk('public')->delete($gallery->image_path);
            }

            $path = $request->file('image')->store('gallery', 'public');
            $gallery->image_path = $path;
        }

        $gallery->title      = $request->title;
        $gallery->status     = $request->status;
        $gallery->start_time = $request->start_time;
        $gallery->end_time   = $request->end_time;

        $gallery->save();

        return redirect()->route('admin.gallery.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Gallery image updated successfully.');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if (Storage::disk('public')->exists($gallery->image_path)) {
            Storage::disk('public')->delete($gallery->image_path);
        }

        $gallery->delete();

        return redirect()->back()
            ->with('alert_type', 'success')
            ->with('alert_message', 'Gallery image deleted successfully.');
    }
}
