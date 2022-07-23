<header id="header">
    <div class="row">
        <div class="span4">
            <h1>
                <a class="logo" href="index.html"><span>Twitter Bootstrap ecommerce template</span>
                    <img src="{{ asset('frontend/assets/img/logo-bootstrap-shoping-cart.png') }}"
                        alt="bootstrap sexy shop">
                </a>
            </h1>
        </div>
        <div class="span4">
            <div class="offerNoteWrapper">
                <h1 class="dotmark">
                    <i class="icon-cut"></i>
                    Twitter Bootstrap shopping cart HTML template is available @ $14
                </h1>
            </div>
        </div>
        <div class="span4 alignR">
            @php
                $cart = \session()->has('cart') ? \session()->get('cart') : [];
            @endphp
            <p><br> <strong> Support (24/7) : 0800 1234 678 </strong><br><br></p>
            <span class="btn btn-mini">[ {{ count($cart) }} ] <span class="icon-shopping-cart"></span></span>
        </div>
    </div>
</header>
