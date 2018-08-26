        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest() && Auth::guard('vendor')->guest())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    User <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
									<li><a href="{{ route('user.login') }}">User Login</a></li>
									<li><a href="{{ route('user.register') }}">User Register</a></li>
                                </ul>
							</li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Vendor <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
									<li><a href="{{ route('vendor.login') }}">Vendor Login</a></li>
									<li><a href="{{ route('vendor.register') }}">Vendor Register</a></li>
                                </ul>
							</li>
                        @elseif(Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->firstname.' '.Auth::user()->lastname  }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('user.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @elseif(Auth::guard('vendor')->check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{  Auth::guard('vendor')->user()->firstname.' '.Auth::guard('vendor')->user()->lastname   }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
									<li>
										<a href="{{ route('vendor.site',['slug' => Auth::guard('vendor')->user()->site->slug]) }}">
											My MiniSite
										</a>
									</li>
									
									<li>
										<a href="{{ route('vendor.site.dashboard',['slug' => Auth::guard('vendor')->user()->site->slug]) }}">
											Dashboard
										</a>
									</li>
								
                                    <li>
                                        <a href="{{ route('vendor.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('vendor.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
							
                        @endif
                    </ul>
                </div>
            </div>
        </nav>