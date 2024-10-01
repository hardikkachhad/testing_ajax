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
                                <h4 class="card-title mb-4">Form Grid Layout</h4>
                                <form id="productform" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="formrow-inputState" class="form-label"
                                            value="0">CategoryName</label>
                                        <select id="formrow-inputState" class="form-select" name="category">
                                            <option selected disabled value="0">Choose...</option>
                                            @foreach ($category as $categorylist)
                                                <option value="{{ $categorylist->id }}">{{ $categorylist->category }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <p></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Product Name</label>
                                        <input type="text" name="product" id="product" class="form-control"
                                            id="formrow-firstname-input" placeholder="Enter Your Product Name">
                                        <p></p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Sale Price</label>
                                        <input type="number" name="sale" id="sale" class="form-control"
                                            min="1" placeholder="Enter Your Product Price">
                                        <p></p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Product Image</label>
                                        <input type="file" class="form-control" id="image" name="image"
                                            placeholder="Enter Your Product Image">
                                        <p></p>
                                    </div>
                                    {{-- <div class="mb-3">
                                        <label class="form-label">Product MultiImage</label>
                                        <input type="file" class="form-control" name="images[]" id="images" multiple>
                                        <p></p>
                                    </div> --}}
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $('#productform').submit(function(event){
            event.preventDefault();

            var formdata = new FormData(this);
            $.ajax({
                url:'{{route('product.store')}}',
                type:'post',
                data:formdata,
                datatype:'json',
                processData:false,
                contentType:false,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success:function(response){
                    if (response.status == false) {
                        var errors = response.errors;
                        if (errors.category) {
                        $('#formrow-inputState').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.category)
                    } else {
                        $('#formrow-inputState').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    if (errors.product) {
                        $('#product').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.product)
                    } else {
                        $('#product').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }
                    if (errors.sale) {
                        $("#sale").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.sale)
                    } else {
                        $('#sale').removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('')
                    }
                    if (errors.image) {
                        $("#image").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.image)
                    } else {
                        $('#image').removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('')
                    }
                    if (errors.images) {
                        $("#images").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.images)
                    } else {
                        $('#images').removeClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html('')
                    }
                    } else {
                      window.loction.href="{{route('product.index')}}";
                    }
                 
                }
            });
        });
    </script>
@endsection
