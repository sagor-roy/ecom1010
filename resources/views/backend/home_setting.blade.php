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
                                <li class="breadcrumb-item active" aria-current="page">Home Setting</li>
                                <a href="#slider" data-toggle="modal" class="btn btn-primary ml-auto">Create Slider</a>
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
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>
                                <img width="100" src="{{asset($item->img)}}" alt="{{$item->title}}">
                            </td>
                            <td>{{$item->title}}</td>
                            <td>
                                <a href="#slider{{$item->id}}" data-toggle="modal" class="btn btn-primary">edit</a>
                                <a onclick="return confirm('Are you sure to Delete?')" href="{{route('admin.slider.destroy',$item->id)}}" class="btn btn-danger">delete</a>
                            </td>
                        </tr>
                        {{-- update category --}}
                        <!-- Modal -->
                        <div class="modal fade" id="slider{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Slider</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form action="{{route('admin.slider.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" value="{{$item->title}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" name="desc"  value="{{$item->desc}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="img" class="form-control">
                                        <div class="mt-3">
                                            <img width="100" src="{{asset($item->img)}}" alt="{{$item->title}}">
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
<div class="modal fade" id="slider" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Slider</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="desc" class="form-control">
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