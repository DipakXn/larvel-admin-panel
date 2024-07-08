@extends('layouts.main')
@section('dashboard')
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">

        <!-- row -->
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div id="alert-success" class="alert alert-success alert-dismissible alert-alt fade show" role="alert"
                    style="display:none;">
                    <span id="success-message"></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="card-title">All Categories</h4>
                        <a href="javascript:void(0);" class="btn btn-primary mb-1" data-bs-toggle="modal"
                            data-bs-target="#addCategoryModal">Add Category</a>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="display table primary-table-bordered" style="min-width: 845px">
                            <thead class="thead-primary">
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Category Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="category-table-body">
                                    @foreach($categories as $category)
                                    <tr id="category-{{ $category->id }}">
                                        <td>{{  $category->id  }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <div class="d-flex" style="gap:10px;">
                                                <button class="btn btn-info btn-sm text-white" data-bs-toggle="modal"
                                                    data-bs-target="#updateCategoryModal" data-id="{{ $category->id }}"
                                                    data-name="{{ $category->name }}">Edit</button>
                                                <button class="deleteCategory btn btn-danger btn-sm text-white"
                                                    data-id="{{ $category->id }}">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- ADD Category Modal -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-primary" id="addCategoryModalLabel">Add Category</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addCategoryForm" method="POST" class="comment-form needs-validation" novalidate>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="text-black font-w600 form-label">Category Name <span
                                                class="required">*</span></label>

                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Category Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3 mb-0">
                                        <input type="submit" value="Add Category" class="submit btn btn-primary"
                                            name="submit">
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- UPDATE Category Modal -->
        <div class="modal fade" id="updateCategoryModal" tabindex="-1" aria-labelledby="updateCategoryModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-primary" id="updateCategoryModalLabel">Update Category</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="updateCategoryForm" method="POST" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="text-black font-w600 form-label">Category Name <span
                                                class="required">*</span></label>

                                        <input type="text" name="name" id="edit_name" class="form-control"
                                            placeholder="Category Name" required>
                                        <div class="invalid-feedback">
                                            Please provide a category name.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3 mb-0">
                                        <input type="submit" value="Update Category" class="submit btn btn-primary"
                                            name="submit">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // CSRF Token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Function to show success message
    function showSuccessMessage(message) {
        $('#success-message').text(message);
        $('#alert-success').show();
        setTimeout(function() {
            $('#alert-success').hide();
        }, 3000);
    }

    // Function to add category to the table
    function addCategoryToTable(category) {
        var newRow = `
            <tr id="category-${category.id}">
                <td>${category.id}</td>
                <td>${category.name}</td>
                <td>
                    <div class="d-flex" style="gap:10px;">
                        <button class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#updateCategoryModal" data-id="${category.id}" data-name="${category.name}">Edit</button>
                        <button class="deleteCategory btn btn-danger btn-sm text-white" data-id="${category.id}">Delete</button>
                    </div>
                </td>
            </tr>`;
        $('#category-table-body').append(newRow);
    }

    // Function to update category in the table
    function updateCategoryInTable(category) {
        var updatedRow = `
            <td>${category.id}</td>
            <td>${category.name}</td>
            <td>
                <div class="d-flex" style="gap:10px;">
                    <button class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#updateCategoryModal" data-id="${category.id}" data-name="${category.name}">Edit</button>
                    <button class="deleteCategory btn btn-danger btn-sm text-white" data-id="${category.id}">Delete</button>
                </div>
            </td>`;
        $('#category-' + category.id).html(updatedRow);
    }

    // AJAX store
    $('#addCategoryForm').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '{{ route('categories.ajaxStore') }}',
            data: formData,
            success: function(response) {
                if (response.status) {
                    addCategoryToTable(response.category);
                    showSuccessMessage(response.message);
                    $('#addCategoryModal').modal('hide');
                    $('#addCategoryForm')[0].reset();
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    });

    // Fill the update modal with category data
    $('#updateCategoryModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var categoryId = button.data('id');
        var name = button.data('name');
        var modal = $(this);
        modal.find('#updateCategoryForm').data('id', categoryId);
        modal.find('#edit_name').val(name);
    });

    // AJAX update
    $('#updateCategoryForm').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var categoryId = $(this).data('id');
        $.ajax({
            type: 'POST', // Change to POST and use X-HTTP-Method-Override for PUT
            url: '/categories/update/' + categoryId,
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-HTTP-Method-Override': 'PUT'
            },
            success: function(response) {
                if (response.status) {
                    updateCategoryInTable(response.category);
                    showSuccessMessage(response.message);
                    $('#updateCategoryModal').modal('hide');
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    });

    // AJAX delete
    $(document).on('click', '.deleteCategory', function(e) {
        e.preventDefault();
        var categoryId = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // AJAX Delete request
                $.ajax({
                    type: 'DELETE',
                    url: '{{ url("categories/destroy") }}/' + categoryId,
                    success: function(response) {
                        if (response.status) {
                            Swal.fire(
                                'Deleted!',
                                'Your category has been deleted.',
                                'success'
                            );
                            $('#category-' + categoryId).remove(); 
                        }
                    },
                    error: function(response) {
                        console.log(response);
                        Swal.fire(
                            'Error!',
                            'Failed to delete category.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});
</script>

@endsection
