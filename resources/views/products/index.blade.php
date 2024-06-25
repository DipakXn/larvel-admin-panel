@extends('layouts.main')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('dashboard')
<style>
.table {
    background-color: #248afd;
    padding: 10px 0px;
}

.table thead {
    color: #fff;
}
.alert-success {
    margin-top: 15px;
}
</style>
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">All Products</h4>
                    </div>
                </div>

                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>


        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="bottons" style="display: flex;">
                            <div class="add-product">
                                <a href="{{ route('products.create') }}" class="btn btn-primary mb-2 text-white">Add
                                    Product</a>
                            </div>

                            <div class="delete-botton text-right" style="padding-left:20px;">
                                <button class="btn btn-md btn-danger removeAll text-white">Dalete All</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col"><input type="checkbox" id="checkboxesMain"></th>
                                        <th>Sr. No</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $counter = 0;
                                    @endphp
                                    @foreach($products as $product)
                                    <tr>
                                        <th scope="row"><input type="checkbox" class="checkbox"
                                                data-id="{{$product->id}}">
                                        </th>
                                        <td>{{ ++$counter }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td><img src="{{ asset('storage/' . $product->image) }}" width="50"></td>
                                        <td>
                                            <a href="{{ route('products.show', $product->id) }}"
                                                class="btn btn-success btn-md text-white">Show</a>
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-info btn-md text-white">Edit</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-md text-white"
                                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                            </form>
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


    </div>

    @endsection
    <script>
    function confirmDelete(itemId) {
        return confirm("Are you sure you want to move this blog to trash?");
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#checkboxesMain').on('click', function(e) {
            if ($(this).is(':checked', true)) {
                $(".checkbox").prop('checked', true);
            } else {
                $(".checkbox").prop('checked', false);
            }
        });
        $('.checkbox').on('click', function() {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#checkboxesMain').prop('checked', true);
            } else {
                $('#checkboxesMain').prop('checked', false);
            }
        });
        $('.removeAll').on('click', function(e) {
            var studentIdArr = [];
            $(".checkbox:checked").each(function() {
                studentIdArr.push($(this).attr('data-id'));
            });
            if (studentIdArr.length <= 0) {
                alert("Choose min one item to remove.");
            } else {
                if (confirm("Are you sure?")) {
                    var stuId = studentIdArr.join(",");
                    $.ajax({
                        url: "{{url('delete-multiple-product')}}",
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: 'ids=' + stuId,
                        success: function(data) {
                            if (data['status'] == true) {
                                $(".checkbox:checked").each(function() {
                                    $(this).parents("tr").remove();
                                });
                                alert(data['message']);
                            } else {
                                alert('Error occured.');
                            }
                        },
                        error: function(data) {
                            alert(data.responseText);
                        }
                    });
                }
            }
        });
    });
    </script>