@extends('layouts.main')
@section('dashboard')
<style>
/* .card table {
    border: none;
    font-size: 16px;
    height: 170px;
    width: 80%;
} */
select.form-control {
        /* padding: 0.94rem 1.94rem !important; */
        padding: 0.875rem 1.375rem !important;
    }
</style>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">Add Product</h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Product Name" required>
                        <div class="invalid-feedback">
                            Please provide a product name.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Product Description</label>
                        <textarea name="description" id="editor" class="form-control" rows="4" placeholder="Product Description" required></textarea>
                        <div class="invalid-feedback">
                            Please provide a product description.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <input type="file" name="image" id="image" class="form-control-file" required>
                        <div class="invalid-feedback">
                            Please provide an image for the product.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price">Product Price</label>
                        <input type="text" name="price" id="price" class="form-control" placeholder="Product Price" required>
                        <div class="invalid-feedback">
                            Please provide a valid price for the product.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary text-white">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>


    </div>

    @endsection