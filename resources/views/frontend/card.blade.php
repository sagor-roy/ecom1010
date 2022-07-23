@extends('layouts.frontend')

@section('content')
    <div class="row">
        <div class="span12">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                <li class="active">Check Out</li>
            </ul>
            @php
                $total = 0;
                $cart = \session()->has('cart') ? \session()->get('cart') : [];
                // dd($cart);
            @endphp
            <div class="well well-small">
                <h1>Check Out <small class="pull-right"> {{ count($cart) }} Items are in the cart </small></h1>
                <hr class="soften" />

                <table class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Title</th>
                            <th>Qty </th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $item)
                            @php
                                $img = json_decode($item['img']);
                            @endphp
                            <tr>
                                <td><img width="100" src="{{ asset($img[0]) }}" alt=""></td>
                                <td>{{ $item['name'] }}</td>
                                <td> {{ $item['qty'] }} </td>
                                <td>{{ $item['price'] }}&#2547;</td>
                                <td><a href="{{ route('cart.delete', $item['product_id']) }}"
                                        class="btn btn-danger">Delete</a></td>
                            </tr>
                            @php
                                $total += $item['price'];
                            @endphp
                        @endforeach
                        <tr>
                            <td colspan="6" class="alignR">Total products: </td>
                            <td class="label label-primary"> {{ $total }}&#2547;</td>
                        </tr>
                    </tbody>
                </table><br />

                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Shipping Addres for order</td>
                        </tr>
                        <tr>
                            <td>
                                @auth
                                    <form class="form-horizontal" action="{{ url('/pay') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="total" value="{{ $total }}">
                                        <div class="control-group">
                                            <label class="span2 control-label" for="inputEmail">Name</label>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="span2 control-label" for="inputPassword">Email</label>
                                            <div class="controls">
                                                <input type="email" name="email" value="{{ Auth::user()->email }}" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="span2 control-label" for="inputPassword">Phone</label>
                                            <div class="controls">
                                                <input type="number" name="number" placeholder="Phone">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="span2 control-label" for="inputPassword">Address</label>
                                            <div class="controls">
                                                <input type="text" name="address" placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="span2 control-label" for="inputPassword">Payment Method</label>
                                            <div class="controls">
                                                <select name="method">
                                                    <option value="">Select your payment method</option>
                                                    <option value="ssl">ssl</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit">Order</button>
                                            </div>
                                        </div>
                                    </form>
                                @endauth
                                @guest
                                    <a href="{{ route('login') }}" class="btn btn-primary">Checkout</a>
                                @endguest
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('home') }}" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue
                    Shopping </a>

            </div>
        </div>
    </div>

    <section class="our_client">
        <hr class="soften" />
        <h4 class="title cntr"><span class="text">Manufactures</span></h4>
        <hr class="soften" />
        <div class="row">
            <div class="span2">
                <a href="#"><img alt="" src="assets/img/1.png"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="assets/img/2.png"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="assets/img/3.png"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="assets/img/4.png"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="assets/img/5.png"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="assets/img/6.png"></a>
            </div>
        </div>
    </section>
@endsection
