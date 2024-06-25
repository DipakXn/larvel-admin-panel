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

        <div class="row justify-content-center mt-5">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary" style="padding:15px 0px; text-align:center;">
                        <h1 class="card-title mb-0 text-white">{{ $product->name }}</h1>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded"
                                style="max-width: 200px;">
                                
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Description</th>
                                        <td>{!! $product->description !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Price</th>
                                        <td class="text-success">${{ $product->price }}</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td class="text-info">{{ $product->category->name }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('products.index') }}" class="btn btn-md btn-primary text-white">Back to Products</a>
                    </div>
                </div>
            </div>
        </div>




    </div>

    @endsection