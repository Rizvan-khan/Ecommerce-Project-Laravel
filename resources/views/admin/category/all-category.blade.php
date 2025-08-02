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
                <li class="breadcrumb-item active" aria-current="page">Category Detail</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
           
            <div class="card widget">
                <h5 class="card-header">All Category</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-custom mb-0">
                            <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Action</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                 <td>Digital clock</td>
                                <td>
                                    <a href="#">
                                        <img src="../../assets/images/products/3.jpg" class="rounded" width="60" alt="...">
                                    </a>
                                </td>
                                <td><a class="btn btn-primary" href="add-category">Add Category</a> <a class="btn btn-warning" href="edit-category">Edit Category</a></td>

                                
                               
                               
                            </tr>
                           
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