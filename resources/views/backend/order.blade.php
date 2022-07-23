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
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><span
                                                class="p-1 text-sm text-light bg-success rounded-circle"><i
                                                    class="fas fa-home"></i></span> Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Order</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- data table start -->
            <div class="data_table my-4">
                <div class="content_section">
                    <table class="table table-striped table-bordered table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Transaction ID</th>
                                <th>Method</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                                <tr>
                                    <td>#{{ $item->id }}</td>
                                    <td>{{ date('Y-m-d', strtotime($item->create_at)) }}</td>
                                    <td>{{ $item->transaction_id }}</td>
                                    <td>{{ $item->method }}</td>
                                    <td>{{ $item->amount }}&#2547;</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <a data-toggle="modal"  href="#order-{{ $item->id }}" class="btn btn-primary">edit</a>
                                        <a href="{{ route('admin.order.destroy', $item->id) }}" class="btn btn-danger">delete</a>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="order-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Order Status</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('admin.order.update',$item->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Order Status</label>
                                                        <select name="status" class="form-control">
                                                            <option {{ $item->status == 'pending' ? 'selected':'' }} value="Pending">pending</option>
                                                            <option {{ $item->status == 'processing' ? 'selected':'' }} value="Processing">processing</option>
                                                            <option {{ $item->status == 'delivery' ? 'selected':'' }} value="Delivery">delivery</option>
                                                            <option {{ $item->status == 'complete' ? 'selected':'' }} value="Complete">complete</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
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
                <form action="{{ route('admin.categroy.store') }}" method="POST" enctype="multipart/form-data">
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
