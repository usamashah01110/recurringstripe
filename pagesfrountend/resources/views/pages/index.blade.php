@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h2>Pages</h2>
    <a href="{{ route('pages.create') }}" class="btn btn-primary mb-3">Create New Page</a>

    <!-- Success/Error Messages -->
    <div id="alert-success" class="alert alert-success d-none"></div>
    <div id="alert-error" class="alert alert-danger d-none"></div>

    <table class="table" id="pagesTable">
        <thead>
            <tr>
                <th>Title</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="page-list">
            </tbody>
    </table>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        function fetchPages() {
            $.ajax({
                url: 'http://localhost:8000/api/all/pages', 
                type: 'GET',
                success: function (response) {
                    let pages = response.data;
                    let pageRows = '';

                    pages.forEach(page => {
                        pageRows += `
                            <tr id="page-${page.id}">
                                <td>${page.title}</td>
                                <td>${page.slug}</td>
                                <td>
                                    <a href="/pages/edit/${page.slug}" class="btn btn-warning btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm delete-page" data-id="${page.id}">Delete</button>
                                </td>
                            </tr>
                        `;
                    });

                    $('#page-list').html(pageRows);
                },
                error: function (xhr) {
                    $('#alert-error').text('Failed to fetch pages').removeClass('d-none');
                }
            });
        }

        // Fetch pages on page load
        fetchPages();

        // Handle delete button click event
        $(document).on('click', '.delete-page', function () {
            let pageId = $(this).data('id');
            let url = `http://localhost:8000/api/pages/delete/${pageId}`; // Replace with your API URL
            let token = "{{ csrf_token() }}";

            // Confirm deletion
            if (confirm('Are you sure you want to delete this page?')) {
                // AJAX request to delete the page
                $.ajax({
                    url: url,
                    type: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    success: function (response) {
                        // On success, remove the row from the table and show success message
                        $('#page-' + pageId).remove();
                        $('#alert-success').text(response.message).removeClass('d-none');
                        $('#alert-error').addClass('d-none');
                    },
                    error: function (xhr) {
                        // On error, show the error message
                        let errorMsg = xhr.responseJSON.message || 'An error occurred';
                        $('#alert-error').text(errorMsg).removeClass('d-none');
                        $('#alert-success').addClass('d-none');
                    }
                });
            }
        });
    });
</script>
@endsection
