<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\News;

class AdminNewsController extends Controller
{
    protected $data = [];

    public function index()
    {
        $this->data['news'] = News::latest()->get();

        return view('backend.admin.news.index', $this->data);
    }

    public function create()
    {
        return view('backend.admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'      => 'required|in:0,1',
            'start_time'  => 'nullable|date',
            'end_time'    => 'nullable|date|after_or_equal:start_time',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news', 'public');
        }

        News::create([
            'user_id'     => auth()->id(),
            'title'       => $request->title,
            'description' => $request->description,
            'image_path'  => $path,
            'status'      => $request->status,
            'start_time'  => $request->start_time,
            'end_time'    => $request->end_time,
        ]);

        return redirect()->route('admin.news.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'News added successfully.');
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
            ->with('alert_message', 'News deleted successfully.');
    }
}
