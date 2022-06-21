<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class="active"><a href="index.html">Home </a></li>
                    <li class=""><a href="list-view.html">List View</a></li>
                    <li class=""><a href="grid-view.html">Grid View</a></li>
                    <li class=""><a href="three-col.html">Three Column</a></li>
                    <li class=""><a href="four-col.html">Four Column</a></li>
                    <li class=""><a href="general.html">General Content</a></li>
                </ul>
                <form action="#" class="navbar-search pull-left">
                    <input type="text" placeholder="Search" class="search-query span2">
                </form>
                <ul class="nav pull-right">
                    <li class="dropdown">
                        @auth
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span
                            class="icon-user"></span> {{ Auth::user()->name }} <b class="caret"></b>
                        @endauth

                        @guest
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span
                            class="icon-lock"></span> Login <b class="caret"></b>
                        @endguest
                        </a>
                        <div class="dropdown-menu">
                            @auth
                                <ul>
                                    @if (Auth::user()->role == 'admin')
                                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    @endif
                                    <li><a href="{{ route('logout') }}">Logout</a></li>
                                </ul>
                            @endauth
                            @guest
                            <form class="form-horizontal loginFrm" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="control-group">
                                    <input type="email" class="span2" name="email" required id="inputEmail" placeholder="Email">
                                </div>
                                <div class="control-group">
                                    <input type="password" name="password" required class="span2" id="inputPassword"
                                        placeholder="Password">
                                </div>
                                <div class="control-group">
                                    <label class="checkbox">
                                        <input type="checkbox"> Remember me
                                    </label>
                                    <button type="submit" class="shopBtn btn-block">Sign in</button>
                                </div>
                            </form>
                            @endguest
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>