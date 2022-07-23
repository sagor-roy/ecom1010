@extends('layouts.frontend')

@section('content')
    <div class="row">
        <div id="sidebar" class="span3">
            <div class="well well-small">
                <ul class="nav nav-list">
                    <li><a href="products.html"><span class="icon-chevron-right"></span>Fashion</a></li>
                    <li><a href="products.html"><span class="icon-chevron-right"></span>Watches</a></li>
                    <li><a href="products.html"><span class="icon-chevron-right"></span>Fine Jewelry</a></li>
                    <li><a href="products.html"><span class="icon-chevron-right"></span>Fashion Jewelry</a></li>
                    <li><a href="products.html"><span class="icon-chevron-right"></span>Engagement & Wedding</a>
                    </li>
                    <li><a href="products.html"><span class="icon-chevron-right"></span>Men's Jewelry</a></li>
                    <li><a href="products.html"><span class="icon-chevron-right"></span>Vintage & Antique</a></li>
                    <li><a href="products.html"><span class="icon-chevron-right"></span>Loose Diamonds </a></li>
                    <li><a href="products.html"><span class="icon-chevron-right"></span>Loose Beads</a></li>
                    <li><a href="products.html"><span class="icon-chevron-right"></span>See All Jewelry &
                            Watches</a></li>
                    <li style="border:0"> &nbsp;</li>
                    <li> <a class="totalInCart" href="cart.html"><strong>Total Amount <span
                                    class="badge badge-warning pull-right"
                                    style="line-height:18px;">$448.42</span></strong></a></li>
                </ul>
            </div>

            <div class="well well-small alert alert-warning cntr">
                <h2>50% Discount</h2>
                <p>
                    only valid for online order. <br><br><a class="defaultBtn" href="#">Click here </a>
                </p>
            </div>
            <div class="well well-small"><a href="#"><img src="assets/img/paypal.jpg" alt="payment method paypal"></a>
            </div>

            <a class="shopBtn btn-block" href="#">Upcoming products <br><small>Click to view</small></a>
            <br>
            <br>
            <ul class="nav nav-list promowrapper">
                <li>
                    <div class="thumbnail">
                        <a class="zoomTool" href="product_details.html" title="add to cart"><span
                                class="icon-search"></span> QUICK VIEW</a>
                        <img src="assets/img/bootstrap-ecommerce-templates.png" alt="bootstrap ecommerce templates">
                        <div class="caption">
                            <h4><a class="defaultBtn" href="product_details.html">VIEW</a> <span
                                    class="pull-right">$22.00</span></h4>
                        </div>
                    </div>
                </li>
                <li style="border:0"> &nbsp;</li>
                <li>
                    <div class="thumbnail">
                        <a class="zoomTool" href="product_details.html" title="add to cart"><span
                                class="icon-search"></span> QUICK VIEW</a>
                        <img src="assets/img/shopping-cart-template.png" alt="shopping cart template">
                        <div class="caption">
                            <h4><a class="defaultBtn" href="product_details.html">VIEW</a> <span
                                    class="pull-right">$22.00</span></h4>
                        </div>
                    </div>
                </li>
                <li style="border:0"> &nbsp;</li>
                <li>
                    <div class="thumbnail">
                        <a class="zoomTool" href="product_details.html" title="add to cart"><span
                                class="icon-search"></span> QUICK VIEW</a>
                        <img src="assets/img/bootstrap-template.png" alt="bootstrap template">
                        <div class="caption">
                            <h4><a class="defaultBtn" href="product_details.html">VIEW</a> <span
                                    class="pull-right">$22.00</span></h4>
                        </div>
                    </div>
                </li>
            </ul>

        </div>
        <div class="span9">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                <li><a href="products.html">Items</a> <span class="divider">/</span></li>
                <li class="active">Preview</li>
            </ul>
            <div class="well well-small">
                <div class="row-fluid">
                    <div class="span5">
                        <div id="myCarousel" class="carousel slide cntr">
                            <div class="carousel-inner">
                                @php
                                    $img = json_decode($product->img);
                                @endphp
                                @foreach ($img as $item)
                                    <div class="item">
                                        <a href="#"> <img src="{{ asset($item) }}" alt=""
                                                style="width:100%"></a>
                                    </div>
                                @endforeach

                            </div>
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                        </div>
                    </div>
                    <div class="span7">
                        <h3>{{ $product->name }}</h3>
                        <hr class="soft" />

                        <form class="form-horizontal qtyFrm">
                            <div class="control-group">
                                <label class="control-label"><span>{{ $product->price }}&#2547;</span></label>
                                <div class="controls">
                                    <input type="number" class="span6" placeholder="Qty.">
                                </div>
                            </div>
                            <p>
                                {{ $product->short }}
                            <p>
                                <button type="submit" class="shopBtn"><span class=" icon-shopping-cart"></span>
                                    Add to cart</button>
                        </form>
                    </div>
                </div>
                <hr class="softn clr" />


                <ul id="productDetail" class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
                    <li class=""><a href="#profile" data-toggle="tab">Related Products </a></li>

                </ul>
                <div id="myTabContent" class="tab-content tabWrapper">
                    <div class="tab-pane fade active in" id="home">
                        <h4>Product Information</h4>
                        {!! $product->desc !!}
                    </div>
                    <div class="tab-pane fade" id="profile">
                        @foreach ($related as $item)
                            <div class="row-fluid">
                                @php
                                    $img = json_decode($item->img);
                                @endphp
                                <div class="span2">
                                    <img src="{{ asset($img[0]) }}" alt="{{ $item->name }}">
                                </div>
                                <div class="span6">
                                    <h5>{{ $item->name }} </h5>
                                    <p>
                                        {{ $item->short }}
                                    </p>
                                </div>
                                <div class="span4 alignR">
                                    <form class="form-horizontal qtyFrm">
                                        <h3> {{ $item->price }} &#2547;</h3>
                                        <br>
                                        <div class="btn-group">
                                            <a href="product_details.html" class="defaultBtn"><span
                                                    class=" icon-shopping-cart"></span>
                                                Add to cart</a>
                                            <a href="{{ route('details', $item->slug) }}" class="shopBtn">VIEW</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <hr class="soften">
                        @endforeach
                    </div>
                </div>

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
