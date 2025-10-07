<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ExamCategory;

class AdminExamCategoriesController extends Controller
{
    protected $data = [];

    public function index()
    {
        $this->data['exam_categories'] = ExamCategory::with('exams')->latest()->get();

        return view('backend.admin.exam-categories.index', $this->data);
    }

    public function create()
    {
        return view('backend.admin.exam-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|unique:exam_categories,name',
            'description' => 'required|string',
            'status'      => 'required|boolean',
        ]);

        ExamCategory::create([
            'name'        => $request->name,
            'description' => $request->description,
            'status'      => $request->status,
        ]);

        return redirect()->route('admin.exam.categories.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Exam Category created successfully.');
    }

    public function show($id)
    {
        $this->data['exam_category'] = ExamCategory::findOrFail($id);

        return view('backend.admin.exam-categories.show', $this->data);
    }

    public function edit($id)
    {
        $this->data['exam_category'] = ExamCategory::findOrFail($id);

        return view('backend.admin.exam-categories.edit', $this->data);
    }

    public function update(Request $request, $id)
    {
        $examCategory = ExamCategory::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|unique:exam_categories,name,' . $examCategory->id,
            'description' => 'required|string',
            'status'      => 'required|boolean',
        ]);

        $examCategory->update([
            'name'        => $request->name,
            'description' => $request->description,
            'status'      => $request->status,
        ]);

        return redirect()->route('admin.exam.categories.index')
            ->with('alert_type', 'success')
            ->with('alert_message', 'Exam Category updated successfully.');
    }

    public function destroy($id)
    {
        $examCategory = ExamCategory::findOrFail($id);

        if ($examCategory->exams()->count() > 0) {
            return redirect()->back()
                ->with('alert_type', 'error')
                ->with('alert_message', 'Cannot delete category. It is associated with existing exams.');
        }

        $examCategory->delete();

        return redirect()->back()
            ->with('alert_type', 'success')
            ->with('alert_message', 'Exam Category deleted successfully.');
    }
}
