@extends('backend.layouts.master')
@section('section-title', 'Inventory-Product')
@section('page-title', 'List')
@section('action-button')
    <a class="btn btn-primary-rgba" href="{{ route('products.create') }}">
        <i class="mr-2 feather icon-plus"></i>
        Add New Product
    </a>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Product List</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Brand</th>
                                    <th>Categories</th>
                                    <th>Subcategories</th>
                                    <th>Price</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            <img src="{{ asset('backend') }}/images/product/{{ $product->thumbnail }}"
                                                alt="{{ $product->name }}" width="50px" height="50px">
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->brand_name }}</td>
                                        <td>{{ $product->category_name }}</td>
                                        <td>{{ $product->subcategory_name }}</td>
                                        <td>{{ $product->purchase_price }}</td>
                                        <td>{{ $product->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <input type="checkbox" data-toggle="toggle" data-on="Active"
                                                class="status-update" {{ $product->status == 1 ? 'checked' : '' }}
                                                data-off="Inactive" data-onstyle="success" data-offstyle="danger"
                                                data-id="{{ $product->id }}" data-model="Product">
                                        </td>
                                        <td>
                                            <a href="{{ route('products.edit', $product->id) }}"
                                             class="btn btn-primary-rgba">
                                                <i class="feather icon-edit"></i>
                                            </a>
                                            <a href="{{route('products.show',$product->id)}}" class="btn btn-success-rgba">
                                                <i class="feather icon-eye"></i>
                                            </a>
                                            <button class="btn btn-danger-rgba">
                                                <i class="feather icon-trash"></i>
                                            </button>
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
