@extends('admin.layouts.master')

@section('content')
<div class="content">
    <div class="row">
        <div class="order-2 order-lg-1 col-lg-9 bd-content">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">Edit Product</h5>

                    @if ($errors->any())
                    <div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
                    @endif

                    <form method="POST" action="{{route('admin.product.edit-product',$product->id)}}"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                        </div>

                        <!-- Price -->
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                        </div>

                        <!-- Quantity -->
                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}">
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-select">
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Colors -->
                        <div class="mb-3">
                            <label class="form-label">Colors</label>
                            <div id="color-list">
                                @foreach($product->colors as $index => $color)
                                    <div class="row mb-2">
                                        <div class="col">
                                            <input type="color" name="colors[{{ $index }}][color_code]" class="form-control form-control-color" value="{{ $color->color_code }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Sizes -->
                     @php
    $selectedSizes = $product->sizes->pluck('size')->toArray();
@endphp

<select name="sizes[]" class="form-select" multiple>
    @foreach(['XS','S','M','L','XL','XXL'] as $size)
        <option value="{{ $size }}" @if(in_array($size, $selectedSizes)) selected @endif>{{ $size }}</option>
    @endforeach
</select>

                        <!-- Existing Images -->
                        <div class="mb-3">
                            <label class="form-label">Existing Images</label>
                            <div class="d-flex gap-2 flex-wrap">
                                @foreach($product->images as $image)
                                    <img src="{{ asset('uploads/products/'.$image->image_path) }}" width="80" height="80" style="object-fit: cover;">
                                @endforeach
                            </div>
                        </div>

                        <!-- Upload New Images -->
                        <div class="mb-3">
                            <label class="form-label">Upload New Images</label>
                            <input type="file" class="form-control" name="images[]" multiple>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Update Product</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
