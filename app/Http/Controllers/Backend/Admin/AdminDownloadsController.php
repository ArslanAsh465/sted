<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Download;

class AdminDownloadsController extends Controller
{
    protected $data = [];

    public function index()
    {
        $this->data['downloads'] = Download::with('user')->latest()->get();

        return view('backend.admin.downloads.index', $this->data);
    }

    public function create()
    {
        return view('backend.admin.downloads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'file_path'   => 'required|file|max:10240',
            'status'      => 'required|in:0,1',
            'start_time'  => 'required|date',
            'end_time'    => 'required|date|after_or_equal:start_time',
        ]);

        $path = null;

        if ($request->hasFile('file_path')) {
            $path = $request->file('file_path')->store('downloads', 'public');
        }

        Download::create([
            'user_id'     => auth()->id(),
            'title'       => $request->title,
            'description' => $request->description,
            'file_path'   => $path,
            'status'      => $request->status,
            'start_time'  => $request->start_time,
            'end_time'    => $request->end_time,
        ]);

        return redirect()->route('admin.downloads.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Download file added successfully.');
    }

    public function show($id)
    {
        $download = Download::with('user')->findOrFail($id);

        return view('backend.admin.downloads.show', compact('download'));
    }

    public function edit($id)
    {
        $download = Download::findOrFail($id);

        return view('backend.admin.downloads.edit', compact('download'));
    }

    public function update(Request $request, $id)
    {
        $download = Download::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'file_path'   => 'nullable|file|max:10240',
            'status'      => 'required|in:0,1',
            'start_time'  => 'required|date',
            'end_time'    => 'required|date|after_or_equal:start_time',
        ]);

        if ($request->hasFile('file_path')) {
            // Delete old file if exists
            if (Storage::disk('public')->exists($download->file_path)) {
                Storage::disk('public')->delete($download->file_path);
            }
            // Store new file
            $path = $request->file('file_path')->store('downloads', 'public');
            $download->file_path = $path;
        }

        $download->title       = $request->title;
        $download->description = $request->description;
        $download->status      = $request->status;
        $download->start_time  = $request->start_time;
        $download->end_time    = $request->end_time;

        $download->save();

        return redirect()->route('admin.downloads.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Download file updated successfully.');
    }

    public function destroy($id)
    {
        $download = Download::findOrFail($id);

        if (Storage::disk('public')->exists($download->file_path)) {
            Storage::disk('public')->delete($download->file_path);
        }

        $download->delete();

        return redirect()->back()
            ->with('alert_type', 'success')
            ->with('alert_message', 'Download file deleted successfully.');
    }
}
