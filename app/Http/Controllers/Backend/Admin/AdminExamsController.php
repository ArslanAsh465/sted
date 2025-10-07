<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Exam;
use App\Models\ExamCategory;
use App\Models\Classes;
use App\Models\Center;

class AdminExamsController extends Controller
{
    protected $data = [];

    public function index()
    {
        $this->data['exams'] = Exam::with('category', 'centers')->latest()->get();

        return view('backend.admin.exams.index', $this->data);
    }

    public function create()
    {
        $this->data['categories'] = ExamCategory::all();
        $this->data['classes'] = Classes::all();
        $this->data['centers'] = Center::all();

        return view('backend.admin.exams.create', $this->data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:exams,name',
            'exam_category_id' => 'required|exists:exam_categories,id',
            'class_id' => 'required|exists:classes,id',
            'fee' => 'required|numeric|min:0',
            'date' => 'required|date',
            'status' => 'required|in:0,1',
            'description' => 'required|string',
            'centers' => 'required|array',
            'centers.*' => 'exists:centers,id',
        ]);

        $exam = Exam::create([
            'user_id' => auth()->id(),
            'exam_category_id' => $request->exam_category_id,
            'class_id' => $request->class_id,
            'name' => $request->name,
            'description' => $request->description,
            'fee' => $request->fee,
            'date' => $request->date,
            'status' => $request->status,
        ]);

        $exam->centers()->attach($request->centers);    

        return redirect()->route('admin.exams.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Exam created successfully.');
    }

    public function show($id)
    {
        $this->data['exam'] = Exam::with(['category', 'class', 'centers'])->findOrFail($id);

        return view('backend.admin.exams.show', $this->data);
    }

    public function edit($id)
    {
        $this->data['exam'] = Exam::findOrFail($id);

        $this->data['categories'] = ExamCategory::all();
        $this->data['classes'] = Classes::all();
        $this->data['centers'] = Center::all();

        return view('backend.admin.exams.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);

        $request->validate([
            'name'             => 'required|string|max:255|unique:exams,name,' . $exam->id,
            'exam_category_id' => 'required|exists:exam_categories,id',
            'class_id'         => 'required|exists:classes,id',
            'fee'              => 'required|numeric|min:0',
            'date'             => 'required|date',
            'status'           => 'required|in:0,1',
            'description'      => 'required|string',
            'centers'          => 'required|array',
            'centers.*'        => 'exists:centers,id',
        ]);

        $exam->update([
            'exam_category_id' => $request->exam_category_id,
            'class_id'         => $request->class_id,
            'name'             => $request->name,
            'description'      => $request->description,
            'fee'              => $request->fee,
            'date'             => $request->date,
            'status'           => $request->status,
        ]);

        $exam->centers()->sync($request->centers);

        return redirect()->route('admin.exams.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Exam updated successfully.');
    }

    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);

        $exam->centers()->detach();

        $exam->delete();

        return redirect()->back()
            ->with('alert_type', 'success')
            ->with('alert_message', 'Exam deleted successfully.');
    }
}
