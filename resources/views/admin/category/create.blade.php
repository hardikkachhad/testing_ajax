@extends('layouts.admin')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Form Layouts</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Horizontal Form Layout</h4>
                                <form name="category" id="category">
                                    <div class="row mb-4">
                                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">First
                                            name
                                        </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"  name="categoryname" id="categoryname"
                                                placeholder="Enter Your Category">
                                                <p></p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-9">
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('#category').submit(function(event){
            event.preventDefault();

            var formdata = new FormData(this);

            $.ajax({
                type:'post',
                url:'{{route('category.store')}}',
                data:formdata,
                datatype:'json',
                processData:false,
                contentType:false,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success:function(response){
                    if (response.status == false) {
                        var errors = response.errors;
                    if (errors.categoryname) {
                        $('#categoryname').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.categoryname)
                    } else {
                        $('#categoryname').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    } else {
                       window.location.href = '{{route('category.index')}}';
                    }
                 
                }
            })
        });
    </script>
@endsection
