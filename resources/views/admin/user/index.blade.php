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
                                <h5>All Users</h5>
                                <form class="d-inline-flex">
                                    <a href="{{route('login')}}" class="align-items-center btn btn-theme d-flex">
                                        Login
                                    </a>
                                    <a href="{{route('register')}}" class="align-items-center btn btn-theme d-flex">
                                       Register
                                    </a>
                                </form>
                            </div>

                            <div class="table-responsive table-product">
                                <table class="table all-package theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created_at</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>

                                                <td>{{ $user->id }}</td>

                                                <td>{{ $user->name }}</td>

                                                <td>
                                                    {{ $user->email }}
                                                </td>

                                                <td>
                                                    {{ $user->created_at }}
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('use.edit', $user->id) }}">
                                                                <span class="lnr lnr-pencil"></span>
                                                            </a>
                                                        </li>
                                                        
                                                        <li>
                                                            <form action="{{route('use.destroy',$user->id)}}"
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
                        <div class="d-flex justify-content-center">
                            {{ $users->links() }}
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
    <!-- Container-fluid end -->
@endsection
