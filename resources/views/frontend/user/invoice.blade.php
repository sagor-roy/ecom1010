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
            <h3>Order Invoice</h3>
            <div class="card">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Order#ID :</td>
                            <td>#{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <td>Order Date :</td>
                            <td>{{ date('m-d-Y',strtotime($order->id)) }}</td>
                        </tr>
                        <tr>
                            <td>Name :</td>
                            <td>{{ $order->name }}</td>
                        </tr>
                        <tr>
                            <td>Email :</td>
                            <td>{{ $order->email }}</td>
                        </tr>
                        <tr>
                            <td>Number :</td>
                            <td>{{ $order->phone }}</td>
                        </tr>
                        <tr>
                            <td>Tranasaction :</td>
                            <td>{{ $order->transaction_id }}</td>
                        </tr>
                        <tr>
                            <td>Method :</td>
                            <td>{{ $order->method }}</td>
                        </tr>
                        <tr>
                            <td>Order Status :</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h3>Product</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                        @php
                            $img = json_decode($item->pro->img);
                        @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset($img[0]) }}" width="50" alt="img">
                                </td>
                                <td>{{ $item->pro->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->price }}&#2547;</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>Total :</b>{{ $order->price }}&#2547;</td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
