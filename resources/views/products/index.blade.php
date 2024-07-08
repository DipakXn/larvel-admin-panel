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
                        <h4 class="card-title">All Products</h4>
                        <a href="javascript:void(0);" class="btn btn-primary mb-1" data-bs-toggle="modal"
                            data-bs-target="#addProductModal">Add Product</a>


                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="display table primary-table-bordered" style="min-width: 845px">
                                <thead class="thead-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="product-table-body">
                                    @foreach($products as $product)
                                    <tr id="product-{{ $product->id }}">
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td><img src="{{ asset('storage/') }}/{{ $product->image }}" width="50"></td>
                                        <td>{{ $product->description }}</td>
                                        <td><span class="badge badge-primary">{{ $product->price }}</span></td>
                                        <td>
                                            <div class="d-flex" style="gap:10px;">
                                                <a href="{{ route('products.show', $product->id) }}"
                                                    class="btn btn-success btn-sm text-white">Show</a>
                                                <button class="btn btn-info btn-sm text-white" data-bs-toggle="modal"
                                                    data-bs-target="#updateProductModal" data-id="{{ $product->id }}"
                                                    data-category_id="{{ $product->category_id }}"
                                                    data-name="{{ $product->name }}"
                                                    data-description="{{ $product->description }}"
                                                    data-price="{{ $product->price }}">Edit</button>
                                                <button class="deleteProduct btn btn-danger btn-sm text-white"
                                                    data-id="{{ $product->id }}">Delete</button>
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

       
        <!-- ADD Product Modal -->
        <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-primary" id="addProductModalLabel">Add Product</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addProductForm" method="POST" enctype="multipart/form-data" class="needs-validation"
                            novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="text-black font-w600 form-label">Category
                                            <span class="required">*</span></label>
                                        <select name="category_id" id="category_id" class="form-control" required>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a category.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="text-black font-w600 form-label">Product Name
                                            <span class="required">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Product Name" required>
                                        <div class="invalid-feedback">
                                            Please provide a product name.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="text-black font-w600 form-label">Description
                                            <span class="required">*</span></label>
                                        <textarea name="description" id="description" class="form-control"
                                            placeholder="Product Description" required></textarea>
                                        <div class="invalid-feedback">
                                            Please provide a description.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="text-black font-w600 form-label">Price
                                            <span class="required">*</span></label>
                                        <input type="number" name="price" id="price" class="form-control"
                                            placeholder="Price" required>
                                        <div class="invalid-feedback">
                                            Please provide a price.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="text-black font-w600 form-label">Product Image
                                            <span class="required">*</span></label>
                                        <input type="file" name="image" id="image" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please provide a product image.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3 mb-0">
                                        <input type="submit" value="Add Product" class="submit btn btn-primary"
                                            name="submit">
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

       <!-- UPDATE Product Modal -->
       <div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="updateProductModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-primary" id="updateProductModalLabel">Update Product</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form id="updateProductForm" method="POST" enctype="multipart/form-data"
                            class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="text-black font-w600 form-label">Category
                                            <span class="required">*</span></label>
                                        <select name="category_id" id="edit_category_id" class="form-control" required>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a category.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="text-black font-w600 form-label">Product Name
                                            <span class="required">*</span></label>
                                        <input type="text" name="name" id="edit_name" class="form-control"
                                            placeholder="Product Name" required>
                                        <div class="invalid-feedback">
                                            Please provide a product name.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="text-black font-w600 form-label">Description
                                            <span class="required">*</span></label>
                                        <textarea name="description" id="edit_description" class="form-control"
                                            placeholder="Product Description" required></textarea>
                                        <div class="invalid-feedback">
                                            Please provide a description.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="text-black font-w600 form-label">Price
                                            <span class="required">*</span></label>
                                        <input type="number" name="price" id="edit_price" class="form-control"
                                            placeholder="Price" required>
                                        <div class="invalid-feedback">
                                            Please provide a price.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="text-black font-w600 form-label">Product Image
                                            <span class="required">*</span></label>
                                        <input type="file" name="image" id="edit_image" class="form-control">
                                        <div class="invalid-feedback">
                                            Please provide a product image.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3 mb-0">

                                    <input type="hidden" name="product_id" id="edit_product_id">

                                        <input type="submit" value="Update Product" class="submit btn btn-primary"
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

    // Function to add product to the table
    function addProductToTable(product) {
    var newRow = `
        <tr id="product-${product.id}">
            <td>${product.id}</td>
            <td>${product.category.name}</td>
            <td>${product.name}</td>
            <td><img src="{{ asset('storage/') }}/${product.image}" width="50"></td>
            <td>${product.description}</td>
            <td><span class="badge badge-primary">${product.price}</span></td>               
            <td>
                <div class="d-flex" style="gap:10px;">
                <a href="{{ route('products.show', ':id') }}" class="btn btn-success btn-sm text-white">Show</a>
                    <button class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#updateProductModal" 
                        data-id="${product.id}" 
                        data-category_id="${product.category.id}" 
                        data-name="${product.name}" 
                        data-description="${product.description}" 
                        data-price="${product.price}">Edit</button>
                    <button class="deleteProduct btn btn-danger btn-sm text-white" data-id="${product.id}">Delete</button>
                </div>
            </td>
        </tr>`;
    $('#product-table-body').append(newRow);
}

    // Function to update product in the table
    function updateProductInTable(product) {
    var updatedRow = `
        <td>${product.id}</td>
        <td>${product.category.name}</td>
        <td>${product.name}</td>
        <td><img src="{{ asset('storage/') }}/${product.image}" width="50"></td>
        <td>${product.description}</td>
        <td><span class="badge badge-primary">${product.price}</span></td>        
        <td>
            <div class="d-flex" style="gap:10px;">
            <a href="{{ route('products.show', ':id') }}" class="btn btn-success btn-sm text-white">Show</a>
                <button class="btn btn-info btn-sm text-white" data-bs-toggle="modal" data-bs-target="#updateProductModal" 
                    data-id="${product.id}" 
                    data-category_id="${product.category.id}" 
                    data-name="${product.name}" 
                    data-description="${product.description}" 
                    data-price="${product.price}">Edit</button>
                <button class="deleteProduct btn btn-danger btn-sm text-white" data-id="${product.id}">Delete</button>
            </div>
        </td>`;
    $(`#product-${product.id}`).html(updatedRow);
}

    // Set product data to update modal
    $('#updateProductModal').on('show.bs.modal', function(e) {
    var button = $(e.relatedTarget);
    var id = button.data('id');
    var category_id = button.data('category_id');
    var name = button.data('name');
    var description = button.data('description');
    var price = button.data('price');

    $('#edit_product_id').val(id);
    $('#edit_category_id').val(category_id);
    $('#edit_name').val(name);
    $('#edit_description').val(description);
    $('#edit_price').val(price);
});

    // AJAX store
    $('#addProductForm').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this); 

        $.ajax({
            type: 'POST',
            url: '{{ route('products.ajaxStore') }}',
            data: formData,
            contentType: false,
            processData: false, 
            success: function(response) {
                if (response.status) {
                    addProductToTable(response.product);
                    showSuccessMessage(response.message);
                    $('#addProductModal').modal('hide'); 
                    $('#addProductForm')[0].reset();
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    });

    // AJAX update
    $('#updateProductForm').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this); 
        var productId = $('#edit_product_id').val();

        $.ajax({
            type: 'POST',
            url: '/products/update/' + productId,
            data: formData,
            contentType: false,
            processData: false, 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-HTTP-Method-Override': 'PUT'
            },
            success: function(response) {
                if (response.status) {
                    updateProductInTable(response.product);
                    showSuccessMessage(response.message);
                    $('#updateProductModal').modal('hide'); 
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    });

    // Event delegation for AJAX delete
    $('#product-table-body').on('click', '.deleteProduct', function(e) {
        e.preventDefault();
        var productId = $(this).data('id');

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
                    url: '{{ url("products/destroy") }}/' + productId,
                    success: function(response) {
                        if (response.status) {
                            Swal.fire(
                                'Deleted!',
                                'Your product has been deleted.',
                                'success'
                            ).then(() => {
                                $('#product-' + productId).remove();
                            });
                        }
                    },
                    error: function(response) {
                        console.log(response);
                        Swal.fire(
                            'Error!',
                            'Failed to delete product.',
                            'error'
                        );
                    }
                });
            }
        });
    });

    // Reset modal on close
    $('.modal').on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
        $(this).find('.invalid-feedback').hide();
    });

    // Form validation
    $('.needs-validation').on('submit', function(event) {
        var form = $(this);
        if (form[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.addClass('was-validated');
    });
});
</script>
@endsection

