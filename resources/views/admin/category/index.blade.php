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
                                    <a href="{{ route('category.create') }}" class="btn btn-primary w-md">create</a>
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
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($category as $key => $categorylist)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $categorylist->category }}</td>
                                                <td>
                                                    @if ($categorylist->status == 1)
                                                        <button type="button" class="btn btn-success btn-sm changeStatus"
                                                            data-id="{{ $categorylist->id }}">Active</button>
                                                    @else
                                                        <button type="button" class="btn btn-danger btn-sm changeStatus"
                                                            data-id="{{ $categorylist->id }}">Deactive</button>
                                                    @endif
                                                </td>
                                                <td>
                                                  <a href="{{route('category.delete',$categorylist->id)}}"><i class="fa-solid fa-trash"></i></a>
                                                  <a href="{{route('category.edit',$categorylist->id)}}">   <i class="fa-sharp fa-regular fa-pen-to-square"></i></a>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $('.changeStatus').on('click', function(event) {
            event.preventDefault();

            var id = $(this).data('id');
            var url = '{{ route('category.chnageStatus') }}';

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    id: id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    location.reload();
                }
            })
        })
    </script>
@endsection
