@extends('layouts.frontend')

@section('content')
    <div class="row">
        <div id="sidebar" class="span3">
            <div class="well well-small">
                <ul class="nav nav-list">
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($cate as $item)
                        <li><a href="products.html"><span class="icon-chevron-right"></span>{{ $item->name }}</a></li>
                        @if ($count == 13)
                        @break
                    @endif
                    @php
                        $count++;
                    @endphp
                @endforeach
            </ul>
        </div>

        <div class="well well-small alert alert-warning cntr">
            <h2>50% Discount</h2>
            <p>
                only valid for online order. <br><br><a class="defaultBtn" href="#">Click here </a>
            </p>
        </div>
        <div class="well well-small"><a href="#"><img src="{{ asset('frontend/assets/img/paypal.jpg') }}"
                    alt="payment method paypal"></a></div>

        <a class="shopBtn btn-block" href="#">Upcoming products <br><small>Click to view</small></a>
        <br>
        <br>
        <ul class="nav nav-list promowrapper">
            <li>
                <div class="thumbnail">
                    <a class="zoomTool" href="product_details.html" title="add to cart"><span
                            class="icon-search"></span> QUICK VIEW</a>
                    <img src="{{ asset('frontend/assets/img/bootstrap-ecommerce-templates.png') }}"
                        alt="bootstrap ecommerce templates">
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
                    <img src="{{ asset('frontend/assets/img/shopping-cart-template.png') }}"
                        alt="shopping cart template">
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
                    <img src="{{ asset('frontend/assets/img/bootstrap-template.png') }}" alt="bootstrap template">
                    <div class="caption">
                        <h4><a class="defaultBtn" href="product_details.html">VIEW</a> <span
                                class="pull-right">$22.00</span></h4>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="span9">
        <div class="well np">
            <div id="myCarousel" class="carousel slide homCar">
                <div class="carousel-inner">
                    @foreach ($slider as $item)
                        <div class="item @if ($item->first) active @endif">
                            <img style="width:100%" src="{{ asset($item->img) }}" alt="bootstrap ecommerce templates">
                            <div class="carousel-caption">
                                <h4>{{ $item->title }}</h4>
                                <p><span>{{ $item->desc }}</span></p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
            </div>
        </div>

        <div class="well well-small">
            <h3>New Products </h3>
            <hr class="soften" />
            <div class="row-fluid">
                <div id="newProductCar" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="item active">
                            <ul class="thumbnails">
                                @foreach ($first as $item)
                                <li class="span3">
                                    <div class="thumbnail">
                                        <a class="zoomTool" href="{{ $item->id }}" title="add to cart"><span
                                                class="icon-search"></span> QUICK VIEW</a>
                                        <a href="{{ $item->id }}" class="tag"></a>
                                        <a href="{{ $item->id }}"><img
                                                src="{{ $item->img }}"
                                                alt="bootstrap-ring"></a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="item">
                            <ul class="thumbnails">
                                @foreach ($second as $item)
                                <li class="span3">
                                    <div class="thumbnail">
                                        <a class="zoomTool" href="{{ $item->id }}" title="add to cart"><span
                                                class="icon-search"></span> QUICK VIEW</a>
                                        <a href="{{ $item->id }}" class="tag"></a>
                                        <a href="{{ $item->id }}"><img
                                                src="{{ $item->img }}"
                                                alt="bootstrap-ring"></a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="item">
                            <ul class="thumbnails">
                                @foreach ($third as $item)
                                <li class="span3">
                                    <div class="thumbnail">
                                        <a class="zoomTool" href="{{ $item->id }}" title="add to cart"><span
                                                class="icon-search"></span> QUICK VIEW</a>
                                        <a href="{{ $item->id }}" class="tag"></a>
                                        <a href="{{ $item->id }}"><img
                                                src="{{ $item->img }}"
                                                alt="bootstrap-ring"></a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#newProductCar" data-slide="prev">&lsaquo;</a>
                    <a class="right carousel-control" href="#newProductCar" data-slide="next">&rsaquo;</a>
                </div>
            </div>
            <div class="row-fluid">
                <ul class="thumbnails">
                    @foreach ($new as $item)
                    <li class="span4">
                        <div class="thumbnail">
                            @php
                                $img = json_decode($item->img)
                            @endphp
                            <a class="zoomTool" href="{{ route('details',$item->slug) }}" title="add to cart"><span
                                    class="icon-search"></span> QUICK VIEW</a>
                            <a href="product_details.html">
                                <img src="{{ $img[0] }}"
                                    alt="">
                                </a>
                            <div class="caption cntr">
                                <p>{{ $item->name }}</p>
                                <p><strong> {{ $item->price }}&#2547;</strong></p>
                                <h4><a class="shopBtn" href="{{ route('add-cart',$item->id) }}" title="add to cart"> Add to cart </a></h4>
                                <div class="actionList">
                                    <a class="pull-left" href="#">Add to Wish List </a>
                                    <a class="pull-left" href="#"> Add to Compare </a>
                                </div>
                                <br class="clr">
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="well well-small">
            <h3><a class="btn btn-mini pull-right" href="{{ route('list',[$name='feature']) }}" title="View more">VIew More<span
                        class="icon-plus"></span></a> Featured Products </h3>
            <hr class="soften" />
            <div class="row-fluid">
                <ul class="thumbnails">
                    @foreach ($feature as $item)
                    <li class="span4">
                        <div class="thumbnail">
                            @php
                                $img = json_decode($item->img)
                            @endphp
                            <a class="zoomTool" href="{{ route('details',$item->slug) }}" title="add to cart"><span
                                    class="icon-search"></span> QUICK VIEW</a>
                            <a href="product_details.html">
                                <img src="{{ $img[0] }}"
                                    alt="">
                                </a>
                            <div class="caption cntr">
                                <p>{{ $item->name }}</p>
                                <p><strong> {{ $item->price }}&#2547;</strong></p>
                                <h4><a class="shopBtn" href="{{ route('add-cart',$item->id) }}" title="add to cart"> Add to cart </a></h4>
                                <div class="actionList">
                                    <a class="pull-left" href="#">Add to Wish List </a>
                                    <a class="pull-left" href="#"> Add to Compare </a>
                                </div>
                                <br class="clr">
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="well well-small">
            <h3><a class="btn btn-mini pull-right" href="{{ route('list',[$name='best']) }}" title="View more">VIew More<span
                        class="icon-plus"></span></a> Best Products </h3>
            <hr class="soften" />
            <div class="row-fluid">
                <ul class="thumbnails">
                    @foreach ($best as $item)
                    <li class="span4">
                        <div class="thumbnail">
                            @php
                                $img = json_decode($item->img)
                            @endphp
                            <a class="zoomTool" href="{{ route('details',$item->slug) }}" title="add to cart"><span
                                    class="icon-search"></span> QUICK VIEW</a>
                            <a href="product_details.html">
                                <img src="{{ $img[0] }}"
                                    alt="">
                                </a>
                            <div class="caption cntr">
                                <p>{{ $item->name }}</p>
                                <p><strong> {{ $item->price }}&#2547;</strong></p>
                                <h4><a class="shopBtn" href="{{ route('add-cart',$item->id) }}" title="add to cart"> Add to cart </a></h4>
                                <div class="actionList">
                                    <a class="pull-left" href="#">Add to Wish List </a>
                                    <a class="pull-left" href="#"> Add to Compare </a>
                                </div>
                                <br class="clr">
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <hr>
        <div class="well well-small">
            <h3><a class="btn btn-mini pull-right" href="{{ route('list',[$name='popular']) }}" title="View more">VIew More<span
                        class="icon-plus"></span></a> Popular Products </h3>
            <hr class="soften" />
            <div class="row-fluid">
                <ul class="thumbnails">
                    @foreach ($popular as $item)
                    <li class="span4">
                        <div class="thumbnail">
                            @php
                                $img = json_decode($item->img)
                            @endphp
                            <a class="zoomTool" href="{{ route('details',$item->slug) }}" title="add to cart"><span
                                    class="icon-search"></span> QUICK VIEW</a>
                            <a href="product_details.html">
                                <img src="{{ $img[0] }}"
                                    alt="">
                                </a>
                            <div class="caption cntr">
                                <p>{{ $item->name }}</p>
                                <p><strong> {{ $item->price }}&#2547;</strong></p>
                                <h4><a class="shopBtn" href="{{ route('add-cart',$item->id) }}" title="add to cart"> Add to cart </a></h4>
                                <div class="actionList">
                                    <a class="pull-left" href="#">Add to Wish List </a>
                                    <a class="pull-left" href="#"> Add to Compare </a>
                                </div>
                                <br class="clr">
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
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
            <a href="#"><img alt="" src="{{ asset('frontend/assets/img/1.png') }}"></a>
        </div>
        <div class="span2">
            <a href="#"><img alt="" src="{{ asset('frontend/assets/img/2.png') }}"></a>
        </div>
        <div class="span2">
            <a href="#"><img alt="" src="{{ asset('frontend/assets/img/3.png') }}"></a>
        </div>
        <div class="span2">
            <a href="#"><img alt="" src="{{ asset('frontend/assets/img/4.png') }}"></a>
        </div>
        <div class="span2">
            <a href="#"><img alt="" src="{{ asset('frontend/assets/img/5.png') }}"></a>
        </div>
        <div class="span2">
            <a href="#"><img alt="" src="{{ asset('frontend/assets/img/6.png') }}"></a>
        </div>
    </div>
</section>
@endsection
