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
                        <h4 class="font-weight-bold mb-0">Update Product</h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select name="category_id" id="category" class="form-control">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="editor" class="form-control">{{ $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class="form-control-file">
                        <img src="{{ asset('storage/' . $product->image) }}" width="50" class="mt-2">
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="text" name="price" id="price" class="form-control" value="{{ $product->price }}">
                    </div>
                    <button type="submit" class="btn btn-primary text-white">Update Product</button>
                </form>
            </div>
        </div>
    </div>
</div>


    </div>

    @endsection