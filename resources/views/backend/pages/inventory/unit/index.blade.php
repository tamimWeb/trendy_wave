@extends('backend.layouts.master')
@section('section-title', 'Inventory')
@section('page-title', 'Units')
@section('action-button')
    <button class="btn btn-primary-rgba" data-toggle="modal" data-target="#unitCreateModal">
        <i class="mr-2 feather icon-plus"></i>
        Add New Unit
    </button>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Unit Lists</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($units as $key => $unit)
                                    <tr class="text-center">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $unit->name }}</td>
                                        <td>{{ $unit->description }}</td>
                                        <td>
                                            <input type="checkbox" data-toggle="toggle" data-on="Active"
                                                class="status-update" {{ $unit->status == 1 ? 'checked' : '' }}
                                                data-off="Inactive" data-onstyle="success" data-offstyle="danger"
                                                data-id="{{ $unit->id }}" data-model="Unit">
                                        </td>
                                        <td>
                                            <button class="btn btn-info-rgba" data-toggle="modal"
                                                data-target="#unitEditModal{{ $unit->id }}">
                                                <i class="feather icon-edit-2"></i>
                                            </button>
                                            <button class="btn btn-danger-rgba" id="delete-alert"
                                                data-id="{{ $unit->id }}">
                                                <i class="feather icon-trash"></i>
                                            </button>
                                            <form id="delete-form-{{ $unit->id }}"
                                                action="{{ route('units.destroy', $unit->id) }}" method="post"
                                                class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>
                                    {{-- Unit Edit Modal --}}
                                    <div class="modal fade" id="unitEditModal{{ $unit->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleLargeModalLabel">Update Unit</h5>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="needs-validation" novalidate
                                                    action="{{ route('units.update', $unit->id) }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div class="mb-3 col-md-12">
                                                                <label for="validationCustom01">Unit Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationCustom01" placeholder="Enter Unit Name"
                                                                    name="name" value="{{ $unit->name }}" required>
                                                            </div>
                                                            <div class="mb-3 col-md-12">
                                                                <label for="validationCustom03">Unit Description</label>
                                                                <textarea class="form-control" id="validationCustom03" rows="5" placeholder="Enter Unit Description"
                                                                    name="description">{{ $unit->description }}</textarea>
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

    {{-- Unit Create Modal --}}
    <div class="modal fade" id="unitCreateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleLargeModalLabel">Create New Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" novalidate action="{{ route('units.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="mb-3 col-md-12">
                                <label for="validationCustom02">Unit Name</label>
                                <input type="text" class="form-control" id="validationCustom02"
                                    placeholder="Enter Unit Name" name="name" required>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="validationCustom03">Unit Description</label>
                                <textarea class="form-control" id="validationCustom03" rows="5" placeholder="Enter Unit Description"
                                    name="description"></textarea>
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
