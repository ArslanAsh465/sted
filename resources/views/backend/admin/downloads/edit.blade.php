@extends('backend.admin.layout.app')

@section('title', 'Edit Download File')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 row">
        <div class="col-md-9">
            <h1 class="h3 mb-0">Edit Download File</h1>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h5 class="mb-0">Edit Download Details</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.downloads.update', $download->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">File Title</label>
                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" 
                        value="{{ old('title', $download->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" rows="5" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $download->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Show existing file --}}
                <div class="mb-3">
                    <label class="form-label">Current File</label><br>
                    @if ($download->file_path)
                        <a href="{{ asset('storage/' . $download->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                            Download File
                        </a>
                    @else
                        <span class="text-muted">No file uploaded.</span>
                    @endif
                </div>

                {{-- Upload new file --}}
                <div class="mb-3">
                    <label for="file_path" class="form-label">Replace File (optional)</label>
                    <input type="file" id="file_path" name="file_path" class="form-control @error('file_path') is-invalid @enderror" accept="*/*">
                    @error('file_path')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="1" {{ old('status', $download->status) == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $download->status) == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="start_time" class="form-label">Start Time</label>
                    <input type="date" id="start_time" name="start_time" class="form-control @error('start_time') is-invalid @enderror" 
                        value="{{ old('start_time', \Carbon\Carbon::parse($download->start_time)->format('Y-m-d')) }}" required>
                    @error('start_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="end_time" class="form-label">End Time</label>
                    <input type="date" id="end_time" name="end_time" class="form-control @error('end_time') is-invalid @enderror" 
                        value="{{ old('end_time', \Carbon\Carbon::parse($download->end_time)->format('Y-m-d')) }}" required>
                    @error('end_time')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Download File</button>
            </form>
        </div>
    </div>

    @include('backend.alert')
@endsection

@section('scripts')
<script src="{{ asset('assets/js/ckeditor.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                // Set minimum height for editor area
                const editableElement = editor.ui.view.editable.element;
                editableElement.style.minHeight = '150px';

                // Sync CKEditor data to textarea on form submit
                const form = editor.sourceElement.form;
                if (form) {
                    form.addEventListener('submit', e => {
                        const data = editor.getData().trim();

                        // Client-side validation for description content
                        if (data === '') {
                            e.preventDefault();
                            alert('Description is required.');
                            editor.editing.view.focus();
                        } else {
                            document.querySelector('#description').value = data;
                        }
                    });
                }
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endsection
