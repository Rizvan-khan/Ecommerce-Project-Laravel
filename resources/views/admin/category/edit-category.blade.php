@extends('admin.layouts.master')


@section('content')

<!-- content -->
<div class="content ">
    <div class="row">
        <div class="order-2 order-lg-1 col-lg-9 bd-content">
            <div class="card">

                <div class="card-body">
                    <div class="mb-3">
                        <h5 class="mt-1 text-center">Edit Category</h5>
                    </div>

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Cat name</label>
                        <input type="text" class="form-control" id="category"
                            placeholder="Ex-Shoes" name="name">
                    </div>
                    <div>
                        <label for="exampleFormControlTextarea1" class="form-label">Cat Image</label>
                        <input type="file" class="form-control" id="image"
                            name="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ./ content -->
@endsection