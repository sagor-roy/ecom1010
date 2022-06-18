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
                                <li class="breadcrumb-item active" aria-current="page">Product Edit</li>
                                <a href="{{route('admin.product')}}" class="btn btn-primary ml-auto">Back</a>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- form start -->
        <div class="form_section">
            <div class="row">
                <!-- Basic Form -->
                <div class="col-md-12">
                    <div class="basic_form my-4">
                        <div class="content_section">
                            <h5>Product</h5>
                            <hr>
                            <form action="{{route('admin.product.update',$pro->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Product Name</label>
                                            <input type="text" value="{{ $pro->name }}" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <select name="category" class="form-control">
                                                <option value="">Select your category</option>
                                                @foreach ($data as $item)
                                                <option value="{{$item->id}}" {{$pro->cate_id == $item->id ? 'selected':''}}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <input type="text" value="{{$pro->price}}" class="form-control" name="price">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Discount (Percent)</label>
                                            <input type="number" value="{{$pro->discount}}" class="form-control" name="discount">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Product Condition</label>
                                            <select name="condition" class="form-control">
                                                <option value="">Select your condition</option>
                                                <option value="new" {{$pro->condition == 'new' ? 'selected':''}}>New</option>
                                                <option value="sale" {{$pro->condition == 'sale' ? 'selected':''}}>Sale</option>
                                                <option value="hot" {{$pro->condition == 'hot' ? 'selected':''}}>Hot</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="1" {{$pro->status == 1 ? 'selected':''}}>Active</option>
                                                <option value="0" {{$pro->status == 0 ? 'selected':''}}>Deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Short Desc.</label>
                                            <textarea name="short" class="form-control" rows="4">{{ $pro->short }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for=""> Description.</label>
                                            <textarea name="desc" class="form-control" rows="10">{{ $pro->desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <input type="file" multiple class="form-control" name="img[]">
                                        </div>
                                        @php
                                            $images = json_decode($pro->img)
                                        @endphp
                                        <div class="d-flex">
                                            @foreach ($images as $img)
                                            <img src="{{ url($img) }}" class="mx-2" width="200" alt="img">
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for=""> New Product</label> <br>
                                            <label class="switch">
                                                <input type="checkbox" {{ $pro->new == 1 ? 'checked':'' }} name="new" value="1">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for=""> Featured Products</label> <br>
                                            <label class="switch">
                                                <input type="checkbox" {{ $pro->feature == 1 ? 'checked':'' }} name="feature" value="1">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for=""> Popular Products</label> <br>
                                            <label class="switch">
                                                <input type="checkbox" {{ $pro->popular == 1 ? 'checked':'' }} name="popular" value="1">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for=""> Best selling Products</label> <br>
                                            <label class="switch">
                                                <input type="checkbox" {{ $pro->best == 1 ? 'checked':'' }} name="best" value="1">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end -->
       
    </div>
</div>


@endsection
