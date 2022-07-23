@extends('layouts.frontend')
<style>
    .card {
        background-color: white;
        margin: 0 20px;
        padding: 10px;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Name :</td>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td>Email :</td>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h3>Order History</h3>
                <table class="table">
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
                                    <a href="{{ route('invoice',$item->id) }}" class="btn btn-primary">Invoice</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
