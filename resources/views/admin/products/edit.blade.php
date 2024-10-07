@extends('admin.layouts.app')
@section('content')
<div class="page-body">
<!-- New Product Add Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-sm-8 m-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Update</h5>
                            </div>
                            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Product Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                                    </div>
                                </div>

                                <div class="mb-4 row align-items-center">
                                    <label class="col-sm-3 col-form-label form-label-title">Product Type</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single w-100" id="type" name="type" required>
                                            <option disabled selected>Select Product Type</option>
                                            <option value="Simple" {{ $product->type == 'Simple' ? 'selected' : '' }}>Simple</option>
                                            <option value="Classified" {{ $product->type == 'Classified' ? 'selected' : '' }}>Classified</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Add other fields similarly -->

                                <div class="mb-4 row align-items-center">
                                    <label class="form-label-title col-sm-3 mb-0">Price</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header-2">
                                            <h5>Description</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <label class="form-label-title col-sm-3 mb-0">Product Description</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" id="description" name="description" rows="5" required>{{ $product->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Product Images -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header-2">
                                            <h5>Product Images</h5>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label for="images" class="col-sm-3 col-form-label form-label-title">Images</label>
                                            <div class="col-sm-9">
                                                <input class="form-control form-choose" type="file" id="images" name="images">
                                                @if ($product->images)
                                                    <div class="mt-2">
                                                        <img src="{{ asset($product->images) }}" width="100">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>

                                <!-- Add other sections similarly -->

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Update Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Add other cards similarly -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- New Product Add End -->



    <!-- footer Start -->
    <div class="container-fluid">
        <footer class="footer">
            <div class="row">
                <div class="col-md-12 footer-copyright text-center">
                    <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- footer En -->
</div>
@endsection