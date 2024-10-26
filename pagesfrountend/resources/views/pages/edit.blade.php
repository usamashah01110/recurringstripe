

@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h2>Create Page</h2>
    <!-- Success/Error Messages -->
    <div id="alert-success" class="alert alert-success d-none"></div>
    <div id="alert-error" class="alert alert-danger d-none"></div>
    
    <!-- Page Form -->
    <form id="pageForm">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $page->title }}"required>
        </div>
        <div class="mb-3">
            <label for="meta_description" class="form-label">Meta Description</label>
            <textarea id="meta_description" name="meta_description" class="form-control" rows="3" required>{{ $page->meta_description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea id="editor" name="content" class="form-control" rows="10">{{ $page->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Page</button>
    </form>
</div>

<!-- Include CKEditor and jQuery -->
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Initialize CKEditor
    CKEDITOR.replace('editor');

    $(document).ready(function () {
        // Handle form submission via AJAX
        $('#pageForm').on('submit', function (e) {
            e.preventDefault();

            // Get the form data including CKEditor content
            var formData = {
                title: $('#title').val(),
                meta_description: $('#meta_description').val(),
                content: CKEDITOR.instances.editor.getData(),
                _token: "{{ csrf_token() }}"
            };

            // AJAX request to store the page via API
            $.ajax({
                url: 'http://localhost:8000/api/pages/update/{{$page->id}}', // Replace with your API URL
                type: 'POST',
                data: formData,
                success: function (response) {
                    $('#alert-success').text(response.message).removeClass('d-none');
                    $('#alert-error').addClass('d-none');
                },
                error: function (xhr) {
                    let errorMsg = xhr.responseJSON.message || 'An error occurred';
                    $('#alert-error').text(errorMsg).removeClass('d-none');
                    $('#alert-success').addClass('d-none');
                }
            });
        });
    });
</script>
@endsection
