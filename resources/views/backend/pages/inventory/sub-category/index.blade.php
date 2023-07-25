@extends('backend.layouts.master')
@section('section-title', 'Inventory')
@section('page-title', 'Sub-Category')
@section('action-button')
    <button class="btn btn-primary-rgba" data-toggle="modal" data-target="#subCategoryCreateModal">
        <i class="mr-2 feather icon-plus"></i>
        Add New Subcategory
    </button>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Sub Category List</h5>
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
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Total Products</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subCategories as $key => $subcat)
                                    <tr class="text-center">
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset('backend') }}/images/sub-categories/{{ $subcat->icon }}"
                                                alt="{{ $subcat->name }}" class="img-fluid" width="50px">
                                        </td>
                                        <td>{{ $subcat->name }}</td>
                                        <td>{{ $subcat->category_name }}</td>
                                        <td>{{ $subcat->description }}</td>
                                        <td>{{ $subcat->products->count() }}</td>
                                        <td>
                                            <input type="checkbox" data-toggle="toggle" data-on="Active"
                                                class="status-update" {{ $subcat->status == 1 ? 'checked' : '' }}
                                                data-off="Inactive" data-onstyle="success" data-offstyle="danger"
                                                data-id="{{ $subcat->id }}" data-model="SubCategory">
                                        </td>
                                        <td>
                                            <button class="btn btn-info-rgba" data-toggle="modal"
                                                data-target="#subCategoryEditModal{{ $subcat->id }}">
                                                <i class="feather icon-edit-2"></i>
                                            </button>
                                            <button class="btn btn-danger-rgba" id="delete-alert"
                                                data-id="{{ $subcat->id }}">
                                                <i class="feather icon-trash"></i>
                                            </button>
                                            <form id="delete-form-{{ $subcat->id }}"
                                                action="{{ route('sub-categories.destroy', $subcat->id) }}" method="post"
                                                class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>

                                    {{-- subCategoryEditModal --}}
                                    <div class="modal fade" id="subCategoryEditModal{{ $subcat->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleLargeModalLabel">Edit Subcategory
                                                        Information</h5>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="needs-validation" novalidate
                                                    action="{{ route('sub-categories.update', $subcat->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div class="mb-3 col-md-6">
                                                                <label for="validationCustom01">Category</label>
                                                                <select name="category_id"
                                                                    class="form-control single-select">
                                                                    <option selected disabled>Select Category</option>
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}"
                                                                            {{ $category->id == $subcat->category_id ? 'selected' : '' }}>
                                                                            {{ $category->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label for="validationCustom02">Subcategory Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationCustom02"
                                                                    placeholder="Enter Subcategory Name" name="name"
                                                                    value="{{ $subcat->name }}" required>
                                                            </div>
                                                            <div class="mb-3 col-md-12">
                                                                <label for="validationCustom03">Subcategory
                                                                    Description</label>
                                                                <textarea class="form-control" id="validationCustom03" rows="5" placeholder="Enter category Description"
                                                                    name="description" placeholder="Enter Subcategory Description">{{ $subcat->description }}
                                                                </textarea>
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label for="validationCustom04">Subcategory Icon</label>
                                                                <input type="file" class="form-control"
                                                                    id="validationCustom04" name="icon">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <img src="{{ asset('backend') }}/images/sub-categories/{{ $subcat->icon }}"
                                                                    alt="{{ $subcat->name }}" class="img-fluid"
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

    {{-- subCategory Create Modal --}}
    <div class="modal fade" id="subCategoryCreateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleLargeModalLabel">Create New Subcategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" novalidate action="{{ route('sub-categories.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="mb-3 col-md-6">
                                <label for="validationCustom01">Category</label>
                                <select name="category_id" class="form-control single-select">
                                    <option selected disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="validationCustom02">Sub-Category Name</label>
                                <input type="text" class="form-control" id="validationCustom02"
                                    placeholder="Enter Category Name" name="name" required>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="validationCustom03">Sub-Category Description</label>
                                <textarea class="form-control" id="validationCustom03" rows="5" placeholder="Enter Category Description"
                                    name="description"></textarea>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="validationCustom04">Sub-Category Icon</label>
                                <input type="file" class="form-control" id="validationCustom04" name="icon"
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
