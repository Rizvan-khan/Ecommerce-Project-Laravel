@extends('admin.layouts.master')

@section('content')
<!-- content -->
<div class="content ">

    <div class="mb-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="dashboard">
                        <i class="bi bi-globe2 small me-2"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">

            <div class="card widget">
                <h5 class="card-header">All Product</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-custom mb-0">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Colors</th>
                                    <th>Sizes</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>


                              
                                @php $sr = 1; @endphp
                                @foreach ($product as $pro)
                                <tr>
                                    <td>{{ $sr++ }}</td>
                                    <td>{{ $pro->name }}</td>

                                    {{-- ✅ Image --}}
                                    <td>
                                        @if($pro->images->count() > 0)
                                        <img src="{{ asset('uploads/products/' . $pro->images->first()->product_image) }}" class="rounded" width="60" alt="Product Image">
                                        @else
                                        <span>No Image</span>
                                        @endif
                                    </td>

                                    {{-- ✅ Colors --}}
                                    <td>
                                        @foreach($pro->colors as $color)
                                        <span style="display:inline-block;width:15px;height:15px;border-radius:50%;background-color:{{ $color->color_code }};margin-right:5px;" title="{{ $color->color_code }}"></span>
                                        @endforeach
                                    </td>

                                    {{-- ✅ Sizes --}}
                                    <td>
                                        @foreach($pro->sizes as $size)
                                        <span class="badge bg-info">{{ $size->size }}</span>
                                        @endforeach
                                    </td>

                                    {{-- ✅ Actions --}}
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="Add-product">Add</a>
                                      <a class="btn btn-warning btn-sm" href="{{ route('admin.product.edit-product', $pro->id) }}">Edit</a>

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
<!-- ./ content -->

@endsection