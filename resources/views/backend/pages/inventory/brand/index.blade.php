@extends('backend.layouts.master')
@section('section-title', 'Inventory')
@section('page-title', 'Brand')
@section('action-button')
    <button class="btn btn-primary-rgba" data-toggle="modal" data-target="#brandCreateModal">
        <i class="feather icon-plus mr-2"></i>
        Add New Brand
    </button>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Brand List</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Banner</th>
                                    <th>Total Products</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $key => $brand)
                                    <tr class="text-center">
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset('backend') }}/images/brands/{{ $brand->logo }}"
                                                alt="{{ $brand->name }}" class="img-fluid" width="50px">
                                        </td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->description }}</td>
                                        <td>
                                            <img src="{{ asset('backend') }}/images/brands/{{ $brand->banner }}"
                                                alt="{{ $brand->name }}" class="img-fluid" width="50px">
                                        </td>
                                        <td>{{ $brand->products->count() }}</td>
                                        <td>
                                            <input type="checkbox" data-toggle="toggle" data-on="Active"
                                                class="status-update" {{ $brand->status == 1 ? 'checked' : '' }}
                                                data-off="Inactive" data-onstyle="success" data-offstyle="danger"
                                                data-id="{{ $brand->id }}" data-model="Brand">
                                        </td>
                                        <td>
                                            <button class="btn btn-info-rgba" data-toggle="modal"
                                                data-target="#brandEditModal{{ $brand->id }}">
                                                <i class="feather icon-edit-2"></i>
                                            </button>
                                            <button class="btn btn-danger-rgba" id="delete-alert"
                                                data-id="{{ $brand->id }}">
                                                <i class="feather icon-trash"></i>
                                            </button>
                                            <form id="delete-form-{{ $brand->id }}"
                                                action="{{ route('brands.destroy', $brand->id) }}" method="post"
                                                class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>

                                    {{-- brandEditModal --}}
                                    <div class="modal fade" id="brandEditModal{{ $brand->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleLargeModalLabel">Edit Brand
                                                        Information</h5>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="needs-validation" novalidate
                                                    action="{{ route('brands.update', $brand->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="validationCustom01">Brand Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationCustom01" placeholder="Enter Brand Name"
                                                                    name="name" required value="{{ $brand->name }}">
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="validationCustom02">Brand Description</label>
                                                                <textarea class="form-control" id="validationCustom02" rows="5" placeholder="Enter Brand Description"
                                                                    name="description">{{ $brand->description }}</textarea>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="validationCustom03">Brand Logo</label>
                                                                <input type="file" class="form-control"
                                                                    id="validationCustom03" name="logo">
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="validationCustom04">Brand Banner</label>
                                                                <input type="file" class="form-control"
                                                                    id="validationCustom04" name="banner">
                                                            </div>
                                                            {{-- preview logo --}}
                                                            <div class="col-md-6 mb-3">
                                                                <img src="{{ asset('backend') }}/images/brands/{{ $brand->logo }}"
                                                                    alt="{{ $brand->name }}" class="img-fluid"
                                                                    width="50px">
                                                            </div>
                                                            {{-- preview banner --}}
                                                            <div class="col-md-6 mb-3">
                                                                <img src="{{ asset('backend') }}/images/brands/{{ $brand->banner }}"
                                                                    alt="{{ $brand->name }}" class="img-fluid"
                                                                    width="50px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- brandCreateModal --}}
    <div class="modal fade" id="brandCreateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleLargeModalLabel">Create New Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" novalidate action="{{ route('brands.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Brand Name</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="Enter Brand Name" name="name" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom02">Brand Description</label>
                                <textarea class="form-control" id="validationCustom02" rows="5" placeholder="Enter Brand Description"
                                    name="description"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03">Brand Logo</label>
                                <input type="file" class="form-control" id="validationCustom03" name="logo"
                                    required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom04">Brand Banner</label>
                                <input type="file" class="form-control" id="validationCustom04" name="banner">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
