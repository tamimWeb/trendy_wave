@extends('backend.layouts.master')
@section('section-title', 'Inventory-Product')
@section('page-title', 'Create')
@push('css')
    <!-- image-uploadify -->
    <link href="{{ asset('backend') }}/plugins/image-uploadify/imageuploadify.min.css" rel="stylesheet">
@endpush
@section('action-button')
    <a href="{{ route('products.index') }}" class="btn btn-primary-rgba">
        <i class="mr-2 feather icon-list"></i>
        Go to Products
    </a>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="card-title font-weight-bold">Create Product</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{ route('products.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            {{-- Product Name --}}
                            <div class="mb-3 col-md-6">
                                <label for="validationCustom01" class="form-label font-weight-bold">
                                    Product Name</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="Enter Product Name" name="name" required>
                            </div>
                            {{-- Product SKU --}}
                            <div class="mb-3 col-md-6">
                                <label for="validationCustom02" class="form-label font-weight-bold">
                                    Product SKU</label>
                                <input type="text" class="form-control" id="validationCustom02"
                                    placeholder="Enter Product SKU" name="sku" required>
                            </div>
                            {{-- Product Category --}}
                            <div class="mb-3 col-md-4">
                                <label for="validationCustom03" class="form-label font-weight-bold">
                                    Product Category</label>
                                <select class="form-control single-select" id="validationCustom03" name="category_id"
                                    required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Product Sub Category --}}
                            <div class="mb-3 col-md-4">
                                <label for="validationCustom04" class="form-label font-weight-bold">
                                    Product Sub Category</label>
                                <select class="form-control single-select" id="validationCustom04" name="subcategory_id"
                                    required>
                                    <option value="">Select Sub Category</option>
                                    @foreach ($sub_categories as $sub_category)
                                        <option value="{{ $sub_category->id }}">{{ $sub_category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Product Brand --}}
                            <div class="mb-3 col-md-4">
                                <label for="validationCustom05" class="form-label font-weight-bold">
                                    Product Brand</label>
                                <select class="form-control single-select" id="validationCustom05" name="brand_id" required>
                                    <option value="">Select Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Product Unit --}}
                            <div class="mb-3 col-md-4">
                                <label for="validationCustom06" class="form-label font-weight-bold">
                                    Product Unit</label>
                                <select class="form-control single-select" id="validationCustom06" name="unit_id" required>
                                    <option value="">Select Unit</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Product Color --}}
                            <div class="mb-3 col-md-4">
                                <label for="validationCustom07" class="form-label font-weight-bold">
                                    Product Color</label>
                                <select class="form-control multiple-select" multiple id="validationCustom07"
                                    name="colors_id[]" required>
                                    <option value="">Select Color</option>
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Product Size --}}
                            <div class="mb-3 col-md-4">
                                <label for="validationCustom08" class="form-label font-weight-bold">
                                    Product Size</label>
                                <input type="text" class="form-control tagsinput" data-role="tagsinput" name="sizes">

                            </div>
                            {{-- Product Purchase Price --}}
                            <div class="mb-3 col-md-4">
                                <label for="validationCustom09" class="form-label font-weight-bold">
                                    Product Purchase Price</label>
                                <input type="number" class="form-control" id="validationCustom09"
                                    placeholder="Enter Product Purchase Price" name="purchase_price" required>
                            </div>
                            {{-- Product Sale Price --}}
                            <div class="mb-3 col-md-4">
                                <label for="validationCustom10" class="form-label font-weight-bold">
                                    Product Sale Price</label>
                                <input type="number" class="form-control" id="validationCustom10"
                                    placeholder="Enter Product Sale Price" name="sale_price" required>
                            </div>
                            {{-- Product Discount --}}
                            <div class="mb-3 col-md-4">
                                <label for="validationCustom11" class="form-label font-weight-bold">
                                    Product Discount</label>
                                <input type="number" class="form-control" id="validationCustom11"
                                    placeholder="Enter Product Discount" name="discount" required>
                            </div>
                            {{-- After Discount Price --}}
                            <div class="mb-3 col-md-4">
                                <label for="validationCustom11" class="form-label font-weight-bold">
                                    After Discount Price</label>
                                <input type="number" class="form-control" id="validationCustom11"
                                    placeholder="After Discount Price" name="after_discount" readonly>
                            </div>
                            {{-- Product Quantity --}}
                            <div class="mb-3 col-md-4">
                                <label for="validationCustom12" class="form-label font-weight-bold">
                                    Product Quantity</label>
                                <input type="number" class="form-control" id="validationCustom12"
                                    placeholder="Enter Product Quantity" name="quantity" required>
                            </div>
                            {{-- Alert Quantity --}}
                            <div class="mb-3 col-md-4">
                                <label for="validationCustom13" class="form-label font-weight-bold">
                                    Alert Quantity</label>
                                <input type="number" class="form-control" id="validationCustom13"
                                    placeholder="Enter Alert Quantity" name="alert_quantity" required>
                            </div>
                            {{-- Product Short Description --}}
                            <div class="mb-3 col-md-12">
                                <label for="validationCustom14" class="form-label font-weight-bold">
                                    Product Short Description</label>
                                <textarea class="summernote" id="validationCustom14" rows="3" placeholder="Enter Product Short Description"
                                    name="short_description" required></textarea>
                            </div>
                            {{-- Product Full Description --}}
                            <div class="mb-3 col-md-12">
                                <label for="validationCustom15" class="form-label font-weight-bold">
                                    Product Full Description</label>
                                <textarea class="summernote" id="validationCustom15" rows="3" placeholder="Enter Product Full Description"
                                    name="full_description" required></textarea>
                            </div>
                            {{-- Meta Title --}}
                            <div class="mb-3 col-md-6">
                                <label for="validationCustom16" class="form-label font-weight-bold">
                                    Meta Title</label>
                                <input type="text" class="form-control" id="validationCustom16"
                                    placeholder="Enter Meta Title" name="meta_title" required>
                            </div>
                            {{-- Meta Keywords --}}
                            <div class="mb-3 col-md-6">
                                <label for="validationCustom17" class="form-label font-weight-bold">
                                    Meta Keywords</label>
                                <input type="text" class="form-control tagsinput" data-role="tagsinput"
                                    placeholder="Enter Meta Keywords" name="meta_keywords" required>
                            </div>
                            {{-- Meta Description --}}
                            <div class="mb-3 col-md-12">
                                <label for="validationCustom18" class="form-label font-weight-bold">
                                    Meta Description</label>
                                <textarea class="form-control" id="validationCustom18" rows="3" placeholder="Enter Meta Description"
                                    name="meta_description" required></textarea>
                            </div>
                            {{-- Product Thumbnail --}}
                            <div class="mb-3 col-md-6">
                                <label for="validationCustom19" class="form-label font-weight-bold">
                                    Product Thumbnail</label>
                                <div class="col-md-8 d-flex">
                                    <input class="mr-5 form-control" id="validationCustom19" type="file" name="thumbnail"
                                    onchange="document.getElementById('showThumbnail').src = window.URL.createObjectURL(this.files[0])" required>
                                    {{-- show image which is selected --}}
                                    <img id="showThumbnail" style="max-width: 100px; max-height: 100px;" 
                                    src="{{ asset('backend/images/product/default.jpg') }}" alt="your image" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="validationCustom20" class="form-label font-weight-bold">
                                    Tags</label>
                                <input type="text" class="form-control tagsinput" data-role="tagsinput"
                                    id="validationCustom20" name="tags" placeholder="Enter Tags">
                            </div>
                            {{-- Multiple Image --}}
                            <div class="col-md-12">
                                <label for="validationCustom21" class="form-label font-weight-bold">
                                    Product
                                    Images</label>
                                <input class="form-control image-uploadify" id="validationCustom21" type="file"
                                    name="image[]" accept="image/*" multiple required>
                            </div>
                        </div>
                        <div class="mt-4 form-group d-flex justify-content-center">
                            <button class="mr-2 btn btn-primary" type="submit">Save Product</button>
                            <button class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <!-- image-uploadify -->
    <script src="{{ asset('backend') }}/plugins/image-uploadify/imageuploadify.min.js"></script>
    <script src="{{ asset('backend') }}/js/custom/custom-image-uploadify.js"></script>
    <script>
        //name="discount"
        $('input[name="discount"]').keyup(function() {
            var discount = $(this).val();
            var sale_price = $('input[name="sale_price"]').val();
            var after_discount = sale_price - (sale_price * discount) / 100;
            $('input[name="after_discount"]').val(after_discount);
        });
    </script>
@endpush
