@extends('layouts.backend')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <h1>Create Project</h1>
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" id="project-form">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" id="year" class="form-control" required>
            @error('year') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="tech_stack" class="form-label">Tech Stack</label>
            @foreach($skills as $skill)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tech_stack[]" value="{{ $skill->id }}" id="skill-{{ $skill->id }}">
                    <label class="form-check-label" for="skill-{{ $skill->id }}">
                        {{ $skill->name }}
                    </label>
                </div>
            @endforeach
            @error('tech_stack') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Files</label>
            <div id="drop-area" class="border border-secondary rounded p-3 mb-2 text-center" style="background:#f8f9fa; cursor:pointer;">
                <p class="mb-2">Drag & drop images here or click to select</p>
                <input type="file" name="files[]" id="files" class="d-none" multiple accept="image/*">
            </div>
            <div id="preview-area" class="d-flex flex-wrap gap-2"></div>
            @error('files') <div class="text-danger">{{ $message }}</div> @enderror
            @error('files.*') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

<script>
const dropArea = document.getElementById('drop-area');
const fileInput = document.getElementById('files');
const previewArea = document.getElementById('preview-area');
let filesList = [];

dropArea.addEventListener('click', () => fileInput.click());

dropArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropArea.classList.add('bg-light');
});
dropArea.addEventListener('dragleave', () => {
    dropArea.classList.remove('bg-light');
});
dropArea.addEventListener('drop', (e) => {
    e.preventDefault();
    dropArea.classList.remove('bg-light');
    handleFiles(e.dataTransfer.files);
});

fileInput.addEventListener('change', () => {
    handleFiles(fileInput.files);
});

function handleFiles(files) {
    for (let i = 0; i < files.length; i++) {
        if (!files[i].type.startsWith('image/')) continue;
        filesList.push(files[i]);
    }
    updatePreview();
}

function updatePreview() {
    previewArea.innerHTML = '';
    filesList.forEach((file, idx) => {
        const reader = new FileReader();
        reader.onload = function(e) {
            const div = document.createElement('div');
            div.className = 'position-relative';
            div.style.display = 'inline-block';
            div.innerHTML = `
                <img src="${e.target.result}" style="max-width:120px;max-height:120px;border:1px solid #ccc;border-radius:6px;">
                <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0" style="right:2px;top:2px;" onclick="removeFile(${idx})">&times;</button>
            `;
            previewArea.appendChild(div);
        };
        reader.readAsDataURL(file);
    });
    // update input files for submit
    let dt = new DataTransfer();
    filesList.forEach(f => dt.items.add(f));
    fileInput.files = dt.files;
}

window.removeFile = function(idx) {
    filesList.splice(idx, 1);
    updatePreview();
};
</script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
        height: 300
    });
</script>
@endsection