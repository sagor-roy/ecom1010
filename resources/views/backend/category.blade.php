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
                                <li class="breadcrumb-item active" aria-current="page">Category</li>
                                <a href="#category" data-toggle="modal" class="btn btn-primary ml-auto">Create Category</a>
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
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>
                                <img width="70" src="{{asset($item->img)}}" alt="{{$item->name}}">
                            </td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->slug}}</td>
                            <td>
                                <a href="#categoryEdit{{$item->id}}" data-toggle="modal" class="btn btn-primary">edit</a>
                                <a onclick="return confirm('Are you sure to Delete?')" href="{{route('admin.category.delete',$item->id)}}" class="btn btn-danger">delete</a>
                            </td>
                        </tr>
                        {{-- create category --}}
                        <!-- Modal -->
                        <div class="modal fade" id="categoryEdit{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form action="{{route('admin.categroy.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{$item->name}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="img" class="form-control">
                                        <div class="mt-3">
                                            <img width="70" src="{{asset($item->img)}}" alt="{{$item->name}}">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end -->
    </div>
</div>

{{-- create category --}}
<!-- Modal -->
<div class="modal fade" id="category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('admin.categroy.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="img" class="form-control">
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection