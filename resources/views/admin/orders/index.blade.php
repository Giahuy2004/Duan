@extends('admin.layouts.app')
@section('content')
<div class="page-body">
    <!-- All User Table Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>All Order</h5>
                        </div>
                        <div class="table-responsive category-table">
                            <div>
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                            
                                                <th>Total</th>
                                                <th>Phone</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Note</th>
                                                <th>Created_at</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($orders as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                


                                                <td>{{ $item->total }} đ</td>
                                                <td>{{ $item->customer_phone }}</td>
                                                <td>{{ $item->customer_name }}</td>
                                                <td>{{ $item->customer_email }}</td>
                                                <td>{{ $item->customer_address }}</td>
                                                <td>{{ $item->note }}</td>
                                                <td>{{ $item->created_at }}</td>
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


@endsection