@extends('backend.layouts.master')
@section('section-title', 'Inventory')
@section('page-title', 'Color')
@section('action-button')
    <button class="btn btn-primary-rgba" data-toggle="modal" data-target="#colorCreateModal">
        <i class="feather icon-plus mr-2"></i>
        Add New Color
    </button>
@endsection
@push('css')
    <link href="{{ asset('backend') }}/plugins/colorpicker/bootstrap-colorpicker.css" rel="stylesheet" type="text/css">
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Color List</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6>
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Color</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($colors as $key => $color)
                                    <tr class="text-center">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $color->name }}</td>
                                        <td>{{ $color->code }}</td>
                                        <td class="d-flex justify-content-center">
                                            <div
                                                style="background-color: {{ $color->code }}; width: 50px; height: 50px; border-radius: 50%;">
                                            </div>
                                        </td>
                                        <td>
                                            <input type="checkbox" data-toggle="toggle" data-on="Active"
                                                class="status-update" {{ $color->status == 1 ? 'checked' : '' }}
                                                data-off="Inactive" data-onstyle="success" data-offstyle="danger"
                                                data-id="{{ $color->id }}" data-model="Color">
                                        </td>
                                        <td>
                                            <button class="btn btn-info-rgba" data-toggle="modal"
                                                data-target="#colorEditModal{{ $color->id }}">
                                                <i class="feather icon-edit-2"></i>
                                            </button>
                                            <button class="btn btn-danger-rgba" id="delete-alert"
                                                data-id="{{ $color->id }}">
                                                <i class="feather icon-trash"></i>
                                            </button>
                                            <form id="delete-form-{{ $color->id }}"
                                                action="{{ route('colors.destroy', $color->id) }}" method="post"
                                                class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>

                                    {{-- colorEditModal --}}
                                    <div class="modal fade" id="colorEditModal{{ $color->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleLargeModalLabel">Edit Color
                                                        Information</h5>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="needs-validation" novalidate
                                                    action="{{ route('colors.update', $color->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="validationCustom01">Color Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationCustom01" placeholder="Enter Color Name"
                                                                    name="name" required value="{{ $color->name }}">
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="validationCustom02">Color Code</label>
                                                                <div  class="input-group horizontal-color"
                                                                    title="Using input value">
                                                                    <input type="text" class="form-control input-lg"
                                                                        value="{{ $color->code }}" name="code" />
                                                                    <span class="input-group-append">
                                                                        <span
                                                                            class="input-group-text colorpicker-input-addon"><i></i></span>
                                                                    </span>
                                                                </div>
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

    {{-- colorCreateModal --}}
    <div class="modal fade" id="colorCreateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleLargeModalLabel">Create New Color</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="needs-validation" novalidate action="{{ route('colors.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Color Name</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="Enter Color Name" name="name" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom02">Color Code</label>
                                <div class="input-group horizontal-color" title="Using input value">
                                    <input type="text" class="form-control input-lg" value="#0080ff"
                                        name="code" />
                                    <span class="input-group-append">
                                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                    </span>
                                </div>
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
@push('js')
    <!-- Color Picker js -->
    <script src="{{ asset('backend') }}/plugins/colorpicker/bootstrap-colorpicker.js"></script>
    <script src="{{ asset('backend') }}/js/custom/custom-form-colorpicker.js"></script>
@endpush
