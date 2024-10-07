@extends('admin.layouts.app')
@section('content')
<!-- Container-fluid starts-->

<div class="page-body">
    <!-- All User Table Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>All Products</h5>
                            <form class="d-inline-flex">
                                <a href="{{route('products.create')}}" class="align-items-center btn btn-theme d-flex">
                                    <i data-feather="plus-square"></i>Add New
                                </a>
                            </form>
                        </div>

                        <div class="table-responsive category-table">
                            <div>
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Type</th>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Product Image</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Created_at</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>

                                            <td>{{ $product->type }}</td>
                                            <td>{{$product->category_id}}</td>
                                            <td>{{ $product->brand->name }}</td>
                                            <td>
                                                <div class="table-image">
                                                    <img src="{{ $product->images }}" class="img-fluid"
                                                        alt="">
                                                </div>
                                            </td>

                                            <td>
                                                {{ $product->price }}
                                            </td>
                                            <td>
                                                {{ $product->description }}
                                            </td>
                                            <td>
                                                {{ $product->created_at }}
                                            </td>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="{{ route('products.edit', $product->id) }}">
                                                            <span class="lnr lnr-pencil"></span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{route('products.destroy',$product->id)}}" 
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn border-0">
                                                                <span class="lnr lnr-trash text-danger"></span>
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
    <!-- All User Table Ends-->

    <div class="container-fluid">
        <!-- footer start-->
        <footer class="footer">
            <div class="row">
                <div class="col-md-12 footer-copyright text-center">
                    <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                </div>
            </div>
        </footer>
        <!-- footer end-->
    </div>
</div>
<!-- Container-fluid end -->
@endsection