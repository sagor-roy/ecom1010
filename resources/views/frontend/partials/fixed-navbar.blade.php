<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="topNav">
        <div class="container">
            <div class="alignR">
                <div class="pull-left socialNw">
                    <a href="#"><span class="icon-twitter"></span></a>
                    <a href="#"><span class="icon-facebook"></span></a>
                    <a href="#"><span class="icon-youtube"></span></a>
                    <a href="#"><span class="icon-tumblr"></span></a>
                </div>
                <a class="{{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}"> <span
                        class="icon-home"></span> Home</a>
                @auth
                    <a href="{{ route('profile') }}"><span class="icon-user"></span> My Account</a>
                @endauth
                @guest
                    <a href="{{ route('login') }}"><span class="icon-edit"></span> Free Register </a>
                @endguest

                @php
                $total = 0;
                    $cart = \session()->has('cart') ? \session()->get('cart') : [];
                    foreach ($cart as $value) {
                        $total += $value['price'];
                    }
                @endphp
                <a href="contact.html"><span class="icon-envelope"></span> Contact us</a>
                <a href="{{ route('cart') }}"><span class="icon-shopping-cart"></span> {{ count($cart) }} Item(s) - <span
                        class="badge badge-warning"> {{ $total }}&#2547;</span></a>
            </div>
        </div>
    </div>
</div>
