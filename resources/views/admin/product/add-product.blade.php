@extends('admin.layouts.master')

@section('content')

<div class="content">
    <div class="row">
        <div class="order-2 order-lg-1 col-lg-9 bd-content">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <h5 class="mt-1 text-center">Add Product</h5>
                    </div>
                    {{-- ✅ Validation Errors --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('admin.product.add-product') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Product Name -->
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Ex - Nike Shoes" required>
                        </div>

                        <!-- Product Price -->
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" placeholder="Ex - 1499" required>
                        </div>


                         <!-- Product Price -->
                        <div class="mb-3">
                            <label class="form-label">Discount Price</label>
                            <input type="number" class="form-control" name="dp_price" placeholder="Ex - 1499" required>
                        </div>

                        <!-- Product Price -->
                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="quantity" placeholder="Ex - 1499" required>
                        </div>

                        <!-- Product Description -->
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter product details..."></textarea>
                        </div>

                        <!-- Category Dropdown -->
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" name="category_id" required>
                                <option value="">Select Category</option>

                                <option value="1">Mobile</option>
                                <option value="2">Earphone</option>
                                <option value="3">Clothes</option>

                            </select>
                        </div>

                        <!-- Colors -->
                        <div id="color-list">
                            <div class="row mb-2">
                                <div class="col">
                                    <input type="color" name="colors[0][color_code]" class="form-control form-control-color" value="#ff0000">
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col">
                                    <input type="color" name="colors[1][color_code]" class="form-control form-control-color" value="#00ff00">
                                </div>
                            </div>
                        </div>

                        <!-- Sizes -->
                        <div class="mb-3">
                            <label class="form-label">Sizes</label>
                            <select name="sizes[]" class="form-select" multiple>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </div>

                        <!-- single product image -->

                         <div class="mb-3">
                            <label class="form-label">Single Product Images</label>
                            <input type="file" class="form-control" name="image" multiple>
                        </div>

                          <div class="mb-3">
                            <label class="form-label">Promo Code</label>
                            <input type="text"  class="form-control" name="promo_code" multiple>
                        </div>

                         <div class="mb-3">
                            <label class="form-label">Promo Price</label>
                            <input type="text" class="form-control" name="promo_price" multiple>
                        </div>

                        <!-- Multiple Images -->
                        <div class="mb-3">
                            <label class="form-label">Product Images</label>
                            <input type="file" class="form-control" name="images[]" multiple>
                        </div>

                        <!-- Submit -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.getElementById('add-color').addEventListener('click', function() {
        const container = document.getElementById('color-container');
        const html = `
        <div class="d-flex gap-2 mb-2">
            <input type="color" name="colors[][code]" class="form-control form-control-color" value="#000000">
            <input type="text" name="colors[][name]" class="form-control" placeholder="Color Name">
            <button type="button" class="btn btn-danger btn-sm remove-color">X</button>
        </div>`;
        container.insertAdjacentHTML('beforeend', html);
    });

    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-color')) {
            e.target.parentElement.remove();
        }
    });
</script>
@endsection