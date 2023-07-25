@extends('backend.layouts.master')
@section('section-title', 'Setting')
@section('page-title', 'Payment Method')
@section('action-button')
    <button class="btn btn-primary-rgba" data-toggle="modal" data-target="#paymentCreateModal">
        <i class="feather icon-plus mr-2"></i>
        Add New Payment Method
    </button>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Payment List</h5>
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
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($payments as $key => $payment)
                                    <tr class="text-center">
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset('backend') }}/images/payment-method/{{ $payment->logo }}"
                                                alt="{{ $payment->name }}" class="img-fluid" width="50px">
                                        </td>
                                        <td>{{ $payment->name }}</td>
                                        <td>{{ $payment->description }}</td>


                                        <td>
                                            <input type="checkbox" data-toggle="toggle" data-on="Active"
                                                class="status-update" {{ $payment->status == 1 ? 'checked' : '' }}
                                                data-off="Inactive" data-onstyle="success" data-offstyle="danger"
                                                data-id="{{ $payment->id }}" data-model="PaymentMethod">


                                        </td>
                                        <td>
                                            <button class="btn btn-info-rgba" data-toggle="modal"
                                                data-target="#paymentEditModal{{ $payment->id }}">
                                                <i class="feather icon-edit-2"></i>
                                            </button>
                                            <button class="btn btn-danger-rgba" id="delete-alert"
                                                data-id="{{ $payment->id }}">
                                                <i class="feather icon-trash"></i>
                                            </button>
                                            <form id="delete-form-{{ $payment->id }}"
                                                action="{{ route('payment-methods.destroy', $payment->id) }}" method="post"
                                                class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </td>
                                    </tr>

                                    {{-- paymentEditModal --}}
                                    <div class="modal fade" id="paymentEditModal{{ $payment->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleLargeModalLabel">Edit Payment
                                                        Information</h5>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form class="needs-validation" novalidate
                                                    action="{{ route('payment-methods.update', $payment->id) }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-row">
                                                            <div class="col-md-12 mb-3">
                                                                <label for="validationCustom01">Payment Name</label>
                                                                <input type="text" class="form-control"
                                                                    id="validationCustom01" placeholder="Enter Payment Name"
                                                                    name="name" required value="{{ $payment->name }}">
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="validationCustom02">Payment Description</label>
                                                                <textarea class="form-control" id="validationCustom02" rows="5" placeholder="Enter Brand Description"
                                                                    name="description">{{ $payment->description }}</textarea>
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="validationCustom03">Payment Logo</label>
                                                                <input type="file" class="form-control"
                                                                    id="validationCustom03" name="logo">
                                                            </div>
                                                            {{-- <div class="col-md-6 mb-3">
                                                                <label for="validationCustom04">Brand Banner</label>
                                                                <input type="file" class="form-control"
                                                                    id="validationCustom04" name="banner">
                                                            </div> --}}
                                                            {{-- preview logo --}}
                                                            <div class="col-md-6 mb-3">
                                                                <img src="{{ asset('backend') }}/images/payment-method/{{ $payment->logo }}"
                                                                    alt="{{ $payment->name }}" class="img-fluid"
                                                                    width="50px">
                                                            </div>
                                                            {{-- preview banner --}}
                                                            {{-- <div class="col-md-6 mb-3">
                                                                <img src="{{ asset('backend') }}/images/brands/{{ $brand->banner }}"
                                                                    alt="{{ $brand->name }}" class="img-fluid"
                                                                    width="50px">
                                                            </div> --}}
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

    {{-- paymentCreateModal --}}
    <div class="modal fade" id="paymentCreateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleLargeModalLabel">Create New Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="needs-validation" novalidate action="{{ route('payment-methods.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Payment Method Name</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="Enter Payment Method Name" name="name" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom02">Payment Description</label>
                                <textarea class="form-control" id="validationCustom02" rows="5" placeholder="Enter Payment Description"
                                    name="description"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03">Payment Method Logo</label>
                                <input type="file" class="form-control" id="validationCustom03" name="logo" required>
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
