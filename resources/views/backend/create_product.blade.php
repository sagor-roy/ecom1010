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
                            <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Product Name</label>
                                            <input type="text" value="{{old('name')}}" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Category</label>
                                            <select name="category" class="form-control">
                                                <option value="">Select your category</option>
                                                @foreach ($data as $item)
                                                <option value="{{$item->id}}" {{old('category') == $item->id ? 'selected':''}}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <input type="text" value="{{old('price')}}" class="form-control" name="price">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Discount (Percent)</label>
                                            <input type="number" value="{{old('discount')}}" class="form-control" name="discount">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Product Condition</label>
                                            <select name="condition" class="form-control">
                                                <option value="">Select your condition</option>
                                                <option value="new">New</option>
                                                <option value="sale">Sale</option>
                                                <option value="hot">Hot</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="status" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Short Desc.</label>
                                            <textarea name="short" value="{{old('short')}}" class="form-control" rows="4"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for=""> Description.</label>
                                            <textarea name="desc" value="{{old('desc')}}" class="form-control" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <input type="file" multiple class="form-control" name="img[]">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for=""> New Product</label> <br>
                                            <label class="switch">
                                                <input type="checkbox" name="new" value="1">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for=""> Featured Products</label> <br>
                                            <label class="switch">
                                                <input type="checkbox" name="feature" value="1">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for=""> Popular Products</label> <br>
                                            <label class="switch">
                                                <input type="checkbox" name="popular" value="1">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for=""> Best selling Products</label> <br>
                                            <label class="switch">
                                                <input type="checkbox" name="best" value="1">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Save</button>
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



{{-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus id quasi natus voluptatem repudiandae reiciendis excepturi. Corrupti tempore sapiente tenetur provident dolore aliquam, molestias perspiciatis quidem! Maxime sequi quod iste facere aliquam eveniet, suscipit at itaque rerum impedit saepe odit ex officiis, atque hic consequuntur omnis quis recusandae quidem ipsum assumenda non dolor obcaecati. Odit aliquam delectus nesciunt modi eveniet eaque provident eos sed cum, asperiores, quae iusto blanditiis magnam dolorem vitae corrupti porro nobis distinctio molestiae doloribus harum ipsa? Quibusdam, adipisci aperiam? Sit, facilis necessitatibus inventore ut cumque magnam accusamus tempore at sed tenetur exercitationem aliquid. Illum, iure recusandae. --}}