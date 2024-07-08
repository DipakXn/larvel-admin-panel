@extends('layouts.main')
@section('dashboard')
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row invoice-card-row">
            @php
            use App\Models\Product;
            use App\Models\Category;

            $totalProducts = Product::count();
            $totalCategories = Category::count();
            $recentProducts = Product::latest()->take(5)->get();
            @endphp
            <div class="col-xl-6 col-xxl-6 col-sm-6">
            <a href="{{ route('products.index') }}">
                <div class="card bg-info invoice-card">
                    <div class="card-body d-flex">
                        
                        <div class="icon me-3">
                        <i class="fa-brands fa-product-hunt"></i>
                        </div>
                        <div>
                            <h2 class="text-white invoice-num">{{ $totalProducts }}</h2>
                            <span class="text-white fs-18">Total Products</span>
                        </div>
                       
                    </div>
                </div>
                </a>
            </div>
            <div class="col-xl-6 col-xxl-6 col-sm-6">
            <a href="{{ route('categories.index') }}">
                <div class="card bg-secondary invoice-card">
                    <div class="card-body d-flex">
                   
                        <div class="icon me-3">
                        <i class="fa-solid fa-list fw-bold"></i>
                        </div>
                        <div>
                            <h2 class="text-white invoice-num">{{ $totalCategories }}</h2>
                            <span class="text-white fs-18">Total Categories</span>
                        </div>
                      
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Recently Added Products</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>Added At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($recentProducts as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td><img src="{{ asset('storage/') }}/{{ $product->image }}" width="50"></td>
                                        <td><span class="badge badge-primary">{{ $product->price }}</span></td>
                                        <td>{{ $product->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /# card -->
            </div>

        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->

@endsection