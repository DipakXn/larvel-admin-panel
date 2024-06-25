@extends('layouts.main')
@section('dashboard')
<style>
.card table {
    border: none;
    font-size: 16px;
    height: 170px;
    width: 80%;
}
</style>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">Add Category</h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Category Name" required>
                        <div class="invalid-feedback">
                            Please provide a category name.
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary text-white">Add Category</button>
                </form>
            </div>
        </div>
    </div>
</div>


    </div>

    @endsection