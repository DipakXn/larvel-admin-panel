@extends('layouts.main')
@section('dashboard')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                        <div class="card shadow-sm">
                                            <div class="card-header bg-primary">
                                                <h1 class="card-title mb-0 text-white text-center">{{ $product->name }}</h1>
                                            </div>
                                            <div class="card-body">
                                                <div class="text-center mb-4">
                                                    <img src="{{ asset('storage/' . $product->image) }}"
                                                        alt="{{ $product->name }}" class="img-fluid rounded"
                                                        style="max-width: 200px; display: inline;">

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
                                                                <td class="text-info">{{ $product->category->name }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="card-footer text-center">
                                                <a href="{{ route('products.index') }}"
                                                    class="btn btn-md btn-primary text-white">Back to Products</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection