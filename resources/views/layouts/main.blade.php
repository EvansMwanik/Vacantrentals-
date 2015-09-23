<!DOCTYPE Html>
<!--[if lt IE 7]>      <Html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <Html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <Html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <Html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>VacantRentals</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        {!!Html::style('css/normalize.css')!!}
        {!!Html::style('css/main.css')!!}
        {!!Html::script('js/vendor/modernizr-2.6.2.min.js')!!}
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div id="wrapper">
            <header>
                <section id="top-area">
                    <p>Phone : +254710479628 | Email us: <a href="mailto:compsolutionscentre@gmail.com">compsolutionscentre@gmail.com</a></p>
                </section><!-- end top-area -->
                <section id="action-bar">
                    <div id="logo">
                        <a href="/"><span id="logo-accent">Vacant</span>Rentals</a>
                    </div><!-- end logo -->

                    <div id="search-form">
                        {!!Form::open(array('url'=>'store/search', 'method'=>'get'))!!}
                        {!!Form::text('keyword', null, array('placeholder'=>'Search by keyword', 'class'=>'search'))!!}
                        {!!Form::submit('Search', array('class'=>'search submit'))!!}
                        {!!Form::close()!!}
                    </div><!-- end search-form -->

                    <div id="user-menu">

                        @if(Auth::check())
                            <nav class="dropdown">
                                <ul>
                                    <li>
                                        <a href="#">{!! Html::image('img/user-icon.gif', Auth::user()->name) !!} {!! Auth::user()->name !!} {!! Html::image('img/down-arrow.gif', Auth::user()->name) !!}</a>
                                        <ul>
                                            @if(Auth::user()->admin == 1)                                                
                                                <li>{!!Html::link('Admin/estates', 'Manage Estates')!!}</li>
                                                <li>{!!Html::link('Admin/rentaltypes', 'Manage Rentaltypes')!!}</li>
                                                <li>{!!Html::link('Admin/rentals', 'Manage Rentals')!!}</li>
                                            @else
                                                <li>{!!Html::link('rentals/view', 'view Rentals')!!}</li>
                                            @endif
                                            <li>{!!Html::link('Auth/logout', 'Sign Out')!!}</li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        @else
                            <nav id="signin" class="dropdown">
                                <ul>
                                    <li>
                                        <a href="#">{!!Html::image('img/user-icon.gif', 'Login')!!} Log In {!!Html::image('img/down-arrow.gif', 'LogIn') !!}</a>
                                        <ul>
                                            <li>{!!Html::link('Auth/login', 'Log In')!!}</li>
                                            <li>{!!Html::link('Auth/register', 'Sign Up')!!}</li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        @endif

                    </div><!-- end user-menu -->
                </section><!-- end action-bar -->
            </header>

            @yield('promo')

            @yield('search-keyword')

            <hr />

            <section id="main-content" class="clearfix">
                @if (Session::has('message'))
                    <p class="alert">{{ Session::get('message') }}</p>
                @endif

                @yield('content')
            </section><!-- end main-content -->

            <hr />

            <footer>
                <section id="contact">
                    <h3>For assistance please call +254710479628. <br> You can also email us at <a href="mailto:compsolutionscentre@gmail.com">compsolutionscentre@gmail.com</a></h3>
                </section><!-- end contact -->

                <hr />

                <section id="links">
                    <div id="my-account">
                        <h4>MY ACCOUNT</h4>
                        <ul>
                            <li>{!!Html::link('Auth/login', 'Log In')!!}</li>
                            <li>{!!Html::link('Auth/register', 'Sign Up')!!}</li>
                            <!--li><a href="store/cart">Shopping Cart</a></li-->
                        </ul>
                    </div><!-- end my-account -->
                    <div id="info">
                        <h4>INFORMATION</h4>
                        <ul>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div><!-- end info -->
                    <div id="extras">
                        <h4>EXTRAS</h4>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li>{!! Html::link('store/contact', 'Contact Us') !!}</li>
                        </ul>
                    </div><!-- end extras -->
                </section><!-- end links -->

                <hr />

                <section class="clearfix">
                    <div id="copyright">
                        <div id="logo">
                            <a href="/"><span id="logo-accent">Vacant</span>Rentals</a>
                        </div><!-- end logo -->
                        <p id="store-copy">&copy; 2015 VacantRentals</p>
                    </div><!-- end copyright -->
                    <div id="connect">
                        <h4>CONNECT WITH US</h4>
                        <ul>
                            <li class="twitter"><a href="#">Twitter</a></li>
                            <li class="fb"><a href="#">Facebook</a></li>
                        </ul>
                    </div><!-- end connect -->
                    <div id="payments">
                        <h4>SUPPORTED PAYMENT METHODS</h4>
                        {!! Html::image('img/payment_methods.jpg', 'Supported Payment Methods') !!}
                    </div><!-- end payments -->
                </section>
            </footer>
        </div><!-- end wrapper -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
        <script>window.jQuery || document.write("{{ Html::script('js/vendor/jquery-1.9.1.min.js') }}")</script>
        {!! Html::script('js/plugins.js') !!}
        {!! Html::script('js/main.js') !!}

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</Html>
