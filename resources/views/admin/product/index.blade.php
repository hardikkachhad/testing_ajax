@extends('layouts.admin')
@section('style')
    <style>
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
        }
    </style>
@endsection
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Data Tables</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <a href="{{ route('product.create') }}" class="btn btn-primary w-md">create</a>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @if (session('success'))
                    <div class="alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th>Category Name</th>
                                            <th>Product Name</th>
                                            <th>Product Prize</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($products as $key => $product)
                                                
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$product->category->category}}</td>
                                                <td>{{$product->pname}}</td>
                                                <td>{{$product->pprice}}</td>
                                                <td>
                                                    <img src="{{url('admin_assets/uploads/',$product->image)}}" alt="abc" srcset="" style="width: 50px">
                                                </td>
                                                <td>3</td>
                                                <td>
                                                  <a href=""><i class="fa-solid fa-trash"></i></a>
                                                  <a href="">   <i class="fa-sharp fa-regular fa-pen-to-square"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
@endsection
