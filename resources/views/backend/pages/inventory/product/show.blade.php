@extends('backend.layouts.master')
@section('section-title', 'Inventory-Product')
@section('page-title', 'Show')
@push('css')
    <style>
        .color-div {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 1px solid rgb(185, 185, 179);
            margin-right: 5px;
        }
    </style>
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
                    <h4 class="card-title font-weight-bold">Product Details</h4>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="row g-0">
                            @php
                                $images = json_decode($product->images);
                                $sizes = json_decode($product->sizes);
                                //put sizes value in array
                                $sizes = explode(',', $sizes);
                            @endphp
                            <div class="col-md-4 border-end">
                                <div class="product-slider-box product-box-for">
                                    @foreach ($images as $image)
                                        <div class="product-preview">
                                            <img src="{{ asset('backend') }}/images/product/{{ $image }}"
                                                class="img-fluid" alt="{{ $product->name }}">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="product-slider-box product-box-nav">
                                    @foreach ($images as $image)
                                        <div class="product-preview">
                                            <img src="{{ asset('backend') }}/images/product/{{ $image }}"
                                                class="img-fluid" alt="{{ $product->name }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h4 class="card-title">{{ $product->name }}</h4>

                                        {{-- Edit button --}}
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary-rgba">
                                            <i class="feather icon-edit"></i> Edit
                                        </a>
                                    </div>

                                    <div class="gap-3 py-3 d-flex">
                                        <div class="cursor-pointer">
                                            <i class='bx bxs-star text-warning'></i>
                                            <i class='bx bxs-star text-warning'></i>
                                            <i class='bx bxs-star text-warning'></i>
                                            <i class='bx bxs-star text-warning'></i>
                                            <i class='bx bxs-star text-secondary'></i>
                                        </div>
                                        <div>142 reviews</div>
                                        <div class="text-success"><i class='align-middle bx bxs-cart-alt'></i> 134 orders
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <span class="price h4">${{ $product->selling_price }}</span>
                                        <span class="text-muted h6">/ {{ $product->unit_name }}</span>
                                    </div>
                                    <p class="card-text fs-6">{{ $product->details }}</p>
                                    <dl class="row">
                                        <dt class="col-sm-3">Brand</dt>
                                        <dd class="col-sm-9">{{ $product->brand_name }}</dd>

                                        <dt class="col-sm-3">Category</dt>
                                        <dd class="col-sm-9">{{ $product->category_name }}</dd>

                                        <dt class="col-sm-3">Sub Category</dt>
                                        <dd class="col-sm-9">{{ $product->subcategory_name }}</dd>

                                        <dt class="col-sm-3">Purchase Price</dt>
                                        <dd class="col-sm-9">${{ $product->purchase_price }}</dd>

                                        <dt class="col-sm-3">Selling Price</dt>
                                        <dd class="col-sm-9">${{ $product->selling_price }}</dd>

                                        <dt class="col-sm-3">Quantity Available</dt>
                                        <dd class="col-sm-9">{{ $product->quantity_in_stock }} {{ $product->unit->name }}
                                        </dd>
                                        <dt class="col-sm-3">Colors</dt>
                                        <dd class="col-sm-9">
                                            @foreach ($colors as $color)
                                                <div class="color-div"
                                                    style="background-color:{{ $color->code }}; float:left;"></div>
                                            @endforeach
                                            </ul>
                                        </dd>
                                        <dt class="col-sm-3">Sizes</dt>
                                        <dd class="col-sm-9">
                                            @foreach ($sizes as $size)
                                                <span
                                                    class="badge bg-{{ //different colors each
                                                        $size == 'S'
                                                            ? 'primary'
                                                            : ($size == 'M'
                                                                ? 'success'
                                                                : ($size == 'L'
                                                                    ? 'warning'
                                                                    : ($size == 'XL'
                                                                        ? 'danger'
                                                                        : 'info'))) }}">{{ $size }}</span>
                                            @endforeach
                                        </dd>
                                    </dl>
                                    <dl class="row">
                                        <dd class="col-sm-12">{!! $product->short_description !!}</dd>
                                    </dl>
                                    <hr>
                                    {{-- <dl class="row">
                                        <dt class="col-sm-3">Supplier</dt>
                                        <dd class="col-sm-9">{{ @$product->supplier->name }}</dd>

                                        <dt class="col-sm-3">Supplier Phone</dt>
                                        <dd class="col-sm-9">{{ @$product->supplier->phone }}</dd>

                                    </dl> --}}
                                    <hr>
                                    <dl class="row">
                                        <dt class="col-sm-3">Status</dt>
                                        <dd class="col-sm-9">
                                            @if ($product->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </dd>

                                        <dt class="col-sm-3">Created By & Created At</dt>
                                        <dd class="col-sm-9">{{ $product->creator_name }} &
                                            {{ $product->created_at->format('d M Y') }}</dd>

                                        <dt class="col-sm-3">Updated At</dt>
                                        <dd class="col-sm-9">{{ $product->updated_at->format('d M Y') }}</dd>
                                    </dl>
                                    <hr>
                                    <dl class="row">
                                        <dt class="col-sm-3">Total Purchase</dt>
                                        <dd class="col-sm-9">{{ $product->quantity }}</dd>

                                        <dt class="col-sm-3">Total Sell</dt>
                                        <dd class="col-sm-9">80</dd>

                                    </dl>
                                    {{-- <div class="mt-3 row row-cols-auto align-items-center">
                                        <div class="col-md-2">
                                            <label class="form-label">Quantity</label>
                                            <select name="" class="form-control">
                                                <option value="">1</option>
                                                <option value="">2</option>
                                                <option value="">3</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Size</label>
                                            <select class="form-control">
                                                <option>S</option>
                                                <option>M</option>
                                                <option>L</option>
                                                <option>XS</option>
                                                <option>XL</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Colors</label>
                                            <div class="gap-2 color-indigators d-flex align-items-center">
                                                <p style="color:{{$color->code}};"></p>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!--end row-->
                                    <div class="gap-2 mt-3 d-flex">
                                        <a href="javascript:;" class="mx-3 btn btn-primary"><i
                                                class="bx bxs-cart-add"></i>Add to
                                            Cart</a>
                                        <a href="javascript:;" class="btn btn-light"><i class="bx bx-heart"></i>Add to
                                            Wishlist</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <ul class="mb-0 nav nav-tabs nav-primary" role="tablist">
                                {{-- Product Invoices --}}
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-toggle="tab" href="#productSell" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-receipt font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Sell</div>
                                        </div>
                                    </a>
                                </li>
                                {{-- Product Description --}}
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-toggle="tab" href="#productDescription"
                                        role="tab" aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-comment-detail font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title"> Product Description </div>
                                        </div>
                                    </a>
                                </li>
                                {{-- Additional Purchases --}}
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-toggle="tab" href="#additionlInfo" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-cart font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Additional Info</div>
                                        </div>
                                    </a>
                                </li>

                                {{-- Product Tags --}}
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-toggle="tab" href="#productTags" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-bookmark-alt font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Tags</div>
                                        </div>
                                    </a>
                                </li>

                                {{-- Product Reviews --}}
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-toggle="tab" href="#productReviews" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-star font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Reviews</div>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                            <div class="pt-3 tab-content">

                                {{-- Product Invoices --}}
                                <div class="tab-pane fade show " id="productSell" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-centered table-nowrap">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>Invoice No</th>
                                                    <th>Customer</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @foreach ($product->invoices as $invoice)
                                                <tr>
                                                    <td>{{ $invoice->invoice_no }}</td>
                                                    <td>{{ $invoice->customer->name }}</td>
                                                    <td>{{ $invoice->quantity }}</td>
                                                    <td>{{ $invoice->price }}</td>
                                                    <td>{{ $invoice->total }}</td>
                                                    <td>{{ $invoice->date }}</td>
                                                    <td>
                                                        @if ($invoice->status == 1)
                                                            <span class="badge bg-success">Paid</span>
                                                        @else
                                                            <span class="badge bg-danger">Unpaid</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('invoice.show', $invoice->id) }}"
                                                            class="btn btn-primary btn-sm"><i class="bx bx-show"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{-- Product Purchases --}}
                                <div class="tab-pane fade" id="additionlInfo" role="tabpanel">
                                    <p>{!! $product->short_description !!} </p>
                                </div>

                                {{-- Product Description --}}
                                <div class="tab-pane fade show active" id="productDescription" role="tabpanel">
                                    <p>{!! $product->full_description !!} </p>
                                </div>

                                {{-- Product Tags --}}
                                <div class="tab-pane fade" id="productTags" role="tabpanel">
                                    <div class="tags-box w-50">
                                        {{-- tags are separeted by comma --}}
                                        @php
                                            $tags = json_decode($product->tags);
                                            $tags = explode(',', $tags);
                                        @endphp
                                        @foreach ($tags as $tag)
                                            <span class="mx-1 btn bg-primary-rgba">{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                </div>

                                {{-- Product Reviews --}}
                                <div class="tab-pane fade" id="productReviews" role="tabpanel">
                                    <div class="row">
                                        <div class="col col-lg-8">
                                            <div class="product-review">
                                                <h5 class="mb-4">3 Reviews For The Product</h5>
                                                <div class="review-list">
                                                    <div class="d-flex align-items-start">
                                                        <div class="review-user">
                                                            <img src="{{ asset('backend') }}/images/product/{{ $images[0] }}"
                                                                width="65" height="65" class="rounded-circle"
                                                                alt="" />
                                                        </div>
                                                        <div class="review-content ms-3">
                                                            <div class="cursor-pointer rates fs-6"> <i
                                                                    class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-light-4"></i>
                                                            </div>
                                                            <div class="mb-2 d-flex align-items-center">
                                                                <h6 class="mb-0">James Caviness</h6>
                                                                <p class="mb-0 ms-auto">February 16, 2021</p>
                                                            </div>
                                                            <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse.
                                                                Mustache cliche tempor, williamsburg carles vegan helvetica.
                                                                Reprehenderit butcher retro keffiyeh dreamcatcher synth.
                                                                Cosby sweater eu banh mi, qui irure terry richardson ex
                                                                squid. Aliquip placeat salvia cillum iphone. Seitan aliquip
                                                                quis cardigan</p>
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div class="d-flex align-items-start">
                                                        <div class="review-user">
                                                            <img src="{{ asset('backend') }}/images/product/{{ $images[0] }}"
                                                                width="65" height="65" class="rounded-circle"
                                                                alt="" />
                                                        </div>
                                                        <div class="review-content ms-3">
                                                            <div class="cursor-pointer rates fs-6"> <i
                                                                    class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-light-4"></i>
                                                            </div>
                                                            <div class="mb-2 d-flex align-items-center">
                                                                <h6 class="mb-0">David Buckley</h6>
                                                                <p class="mb-0 ms-auto">February 22, 2021</p>
                                                            </div>
                                                            <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse.
                                                                Mustache cliche tempor, williamsburg carles vegan helvetica.
                                                                Reprehenderit butcher retro keffiyeh dreamcatcher synth.
                                                                Cosby sweater eu banh mi, qui irure terry richardson ex
                                                                squid. Aliquip placeat salvia cillum iphone. Seitan aliquip
                                                                quis cardigan</p>
                                                        </div>
                                                    </div>
                                                    <hr />
                                                    <div class="d-flex align-items-start">
                                                        <div class="review-user">
                                                            <img src="{{ asset('backend') }}/images/product/{{ $images[0] }}"
                                                                width="65" height="65" class="rounded-circle"
                                                                alt="" />
                                                        </div>
                                                        <div class="review-content ms-3">
                                                            <div class="cursor-pointer rates fs-6"> <i
                                                                    class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-warning"></i>
                                                                <i class="bx bxs-star text-light-4"></i>
                                                            </div>
                                                            <div class="mb-2 d-flex align-items-center">
                                                                <h6 class="mb-0">Peter Costanzo</h6>
                                                                <p class="mb-0 ms-auto">February 26, 2021</p>
                                                            </div>
                                                            <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse.
                                                                Mustache cliche tempor, williamsburg carles vegan helvetica.
                                                                Reprehenderit butcher retro keffiyeh dreamcatcher synth.
                                                                Cosby sweater eu banh mi, qui irure terry richardson ex
                                                                squid. Aliquip placeat salvia cillum iphone. Seitan aliquip
                                                                quis cardigan</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col col-lg-4">
                                            <div class="border rounded add-review bg-dark-1 bg-light">
                                                <div class="p-3 form-body">
                                                    <h4 class="mb-4">Write a Review</h4>
                                                    <div class="mb-3">
                                                        <label class="form-label">Your Name</label>
                                                        <input type="text" class="form-control rounded-0">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Your Email</label>
                                                        <input type="text" class="form-control rounded-0">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Rating</label>
                                                        <select class="form-control rounded-0">
                                                            <option selected>Choose Rating</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="3">4</option>
                                                            <option value="3">5</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Example textarea</label>
                                                        <textarea class="form-control rounded-0" rows="3"></textarea>
                                                    </div>
                                                    <div class="d-grid">
                                                        <button type="button" class="btn btn-primary">Submit a
                                                            Review</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('backend') }}/js/custom/custom-ecommerce-single-product.js"></script>
@endpush