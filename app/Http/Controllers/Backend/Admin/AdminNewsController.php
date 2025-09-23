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
        $this->data['news'] = News::with('user')->latest()->get();

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
            'description' => 'required|string',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'      => 'required|in:0,1',
            'start_time'  => 'required|date',
            'end_time'    => 'required|date|after_or_equal:start_time',
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

    public function show($id)
    {
        $this->data['news'] = News::with('user')->findOrFail($id);

        return view('backend.admin.news.show', $this->data);
    }

    public function edit($id)
    {
        $this->data['news'] = News::findOrFail($id);

        return view('backend.admin.news.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'      => 'required|in:0,1',
            'start_time'  => 'required|date',
            'end_time'    => 'required|date|after_or_equal:start_time',
        ]);

        $data = [
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => $request->status,
            'start_time'  => $request->start_time,
            'end_time'    => $request->end_time,
        ];

        if ($request->hasFile('image')) {
            if ($news->image_path && Storage::disk('public')->exists($news->image_path)) {
                Storage::disk('public')->delete($news->image_path);
            }

            $data['image_path'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        return redirect()->route('admin.news.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'News updated successfully.');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        if ($news->image_path && Storage::disk('public')->exists($news->image_path)) {
            Storage::disk('public')->delete($news->image_path);
        }

        $news->delete();

        return redirect()->back()
            ->with('alert_type', 'success')
            ->with('alert_message', 'News deleted successfully.');
    }
}
