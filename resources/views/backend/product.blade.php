@extends('layouts.backend')

@section('content')
<div class="main_content">
    <!-- content area -->
    <div class="container-fluid">
        <!-- breadcame start -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><span class="p-1 text-sm text-light bg-success rounded-circle"><i class="fas fa-home"></i></span> Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Product</li>
                                <a href="{{route('admin.create.product')}}"  class="btn btn-primary ml-auto">Create Product</a>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- data table start -->
        <div class="data_table my-4">
            <div class="content_section">
                <table id="example" class="table table-striped table-bordered table-responsive-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Desc.</th>
                            <th>Status</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img width="70" src="" alt="">
                            </td>
                            <td>Lorem ipsum dolor sit amet.</td>
                            <td>Shoes</td>
                            <td>Lorem ipsum dolor sit, amet consectetur adipisicing.</td>
                            <td>
                                <span class="badge badge-success">active</span>
                            </td>
                            <td>
                                <a href="" class="btn btn-primary">edit</a>
                                <a href="" class="btn btn-danger">delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end -->
    </div>
</div>
@endsection