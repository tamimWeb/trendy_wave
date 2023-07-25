@extends('backend.layouts.master')
@section('section-title', 'Inventory')
@section('page-title', 'Category')
@section('action-button')
    <button class="btn btn-primary-rgba" data-toggle="modal" data-target="#categoryCreateModal">
        <i class="feather icon-plus mr-2"></i>
        Add New Category
    </button>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Category List</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Icon</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Total Products</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr class="text-center">
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset('backend') }}/images/categories/{{ $category->icon }}"
                                                alt="{{ $category->name }}" class="img-fluid" width="50px">
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>{{ $category->products->count() }}</td>
                                        <td>
                                            <input type="checkbox" data-toggle="toggle" data-on="Active"
                                                class="status-update" {{ $category->status == 1 ? 'checked' : '' }}
                                                data-off="Inactive" data-onstyle="success" data-offstyle="danger"
                                                data-id="{{ $category->id }}" data-model="Category">
                                        </td>
                                        <td>
                                            <button class="btn btn-info-rgba" data-toggle="modal"
                                                data-target="#categoryEditModal{{ $category->id }}">
                                                <i class="feather icon-edit-2"></i>
                                            </button>
                                            <button class="btn btn-danger-rgba" id="delete-alert"
                                                data-id="{{ $category->id }}">
                                                <i class="feather icon-trash"></i>
                                            </button>
                                            <form id="delete-form-{{ $category->id }}"
                                                action="{{ route('categories.destroy', $category->id) }}" method="post"
                                                class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>

                                    {{-- categoryEditModal --}}
                                    <div class="modal fade" id="categoryEditModal{{ $category->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleLargeModalLabel">Edit category
                                                        Information</h5>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="needs-validation" novalidate
                                                    action="{{ route('categories.update', $category->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="validationCustom01">Category Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationCustom01"
                                                                    placeholder="Enter Category Name" name="name"
                                                                    required value="{{ $category->name }}">
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="validationCustom02">Category Description</label>
                                                                <textarea class="form-control" id="validationCustom02" rows="5" placeholder="Enter category Description"
                                                                    name="description" placeholder="Enter Category Description">{{ $category->description }}
                                                                </textarea>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="validationCustom03">Category Icon</label>
                                                                <input type="file" class="form-control"
                                                                    id="validationCustom03" name="icon">
                                                            </div>
                                                            {{-- preview logo --}}
                                                            <div class="col-md-6 mb-3">
                                                                <img src="{{ asset('backend') }}/images/categories/{{ $category->icon }}"
                                                                    alt="{{ $category->name }}" class="img-fluid"
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

    {{-- categoryCreateModal --}}
    <div class="modal fade" id="categoryCreateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleLargeModalLabel">Create New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" novalidate action="{{ route('categories.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Category Name</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="Enter Category Name" name="name" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom02">Category Description</label>
                                <textarea class="form-control" id="validationCustom02" rows="5" placeholder="Enter Category Description"
                                    name="description"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03">Category Icon</label>
                                <input type="file" class="form-control" id="validationCustom03" name="icon"
                                    required>
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
