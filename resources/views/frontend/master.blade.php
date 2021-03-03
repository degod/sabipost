
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome-font-awesome.min.css')}}">
        {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}"> --}}
        <link rel="stylesheet" type="text/css" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('lib/slick/slick.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('lib/slick/slick-theme.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
        <link rel="shortcut icon" href="images/logo/icon-black.png">
        @yield('extracss')
    </head>
    <body>
        <div class="wrapper">
            <header>
                <div class="container">
                    <div class="header-data">
                        <div class="logo">
                            <a href="index.html" title=""><img src="{{asset('images/logo/logo-white.png')}}" height="35"></a>
                        </div><!--logo end-->
                        <!-- <div class="search-bar">
                            <form>
                                <input type="text" name="search" placeholder="Search...">
                                <button type="submit"><i class="la la-search"></i></button>
                            </form>
                        </div> -->
                        <nav>
                            <ul>
                                <li>
                                    <a href="{{url('home')}}" title="">
                                        <span><img src="{{asset('images/icon1.png')}}" alt=""></span>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="projects.html" title="">
                                        <span><img src="{{asset('images/icon3.png')}}" alt=""></span>
                                        Posts
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="" class="not-box-open">
                                        <span><img src="{{asset('images/icon6.png')}}" alt=""></span>
                                        Messages
                                    </a>
                                    <div class="notification-box msg">
                                        <div class="nt-title">
                                            <h4>Setting</h4>
                                            <a href="#" title="">Clear all</a>
                                        </div>
                                        <div class="nott-list">
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="{{asset('')}}" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="messages.html" title="">Jassica William</a> </h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do.</p>
                                                    <span>2 min ago</span>
                                                </div><!--notification-info -->
                                            </div>
                                            <div class="view-all-nots">
                                                <a href="messages.html" title="">View All Messsages</a>
                                            </div>
                                        </div><!--nott-list end-->
                                    </div><!--notification-box end-->
                                </li>
                                <li>
                                    <a href="#" title="" class="not-box-open">
                                        <span><img src="{{asset('images/icon7.png')}}" alt=""></span>
                                        Notification
                                    </a>
                                    <div class="notification-box">
                                        <div class="nt-title">
                                            <h4>Setting</h4>
                                            <a href="#" title="">Clear all</a>
                                        </div>
                                        <div class="nott-list">
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="{{asset('')}}" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
                                                    <span>2 min ago</span>
                                                </div><!--notification-info -->
                                            </div>
                                            <div class="view-all-nots">
                                                <a href="#" title="">View All Notification</a>
                                            </div>
                                        </div><!--nott-list end-->
                                    </div><!--notification-box end-->
                                </li>
                            </ul>
                        </nav><!--nav end-->
                        <div class="menu-btn">
                            <a href="#" title=""><i class="fa fa-bars"></i></a>
                        </div><!--menu-btn end-->
                        @auth
                            <div class="user-account">
                                <div class="user-info">
                                    <img src="http://via.placeholder.com/30x30" alt="">
                                    <a href="#" title="">{{!empty(\Auth::user()->firstname) ? \Auth::user()->firstname : "Me"}}</a>
                                    <i class="la la-sort-down"></i>
                                </div>
                                <div class="user-account-settingss">
                                    <h3>Online Status</h3>
                                    <ul class="on-off-status">
                                        <li>
                                            <div class="fgt-sec">
                                                <input type="radio" name="cc" id="c5">
                                                <label for="c5">
                                                    <span></span>
                                                </label>
                                                <small>Online</small>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="fgt-sec">
                                                <input type="radio" name="cc" id="c6">
                                                <label for="c6">
                                                    <span></span>
                                                </label>
                                                <small>Offline</small>
                                            </div>
                                        </li>
                                    </ul>
                                    <h3>Setting</h3>
                                    <ul class="us-links">
                                        <li><a href="profile-account-setting.html" title="">Account Setting</a></li>
                                        <li><a href="#" title="">Privacy</a></li>
                                        <li><a href="#" title="">Faqs</a></li>
                                        <li><a href="#" title="">Terms & Conditions</a></li>
                                    </ul>
                                    <h3 class="tc"><a href="{{url('logout')}}" title="">Logout</a></h3>
                                </div><!--user-account-settingss end-->
                            </div>
                        @endauth
                    </div><!--header-data end-->
                </div>
            </header><!--header end-->

            <main>
                <div class="main-section">
                    <div class="container">
                        <div class="main-section-data">
                            <div class="row">
                                @yield('left-sidebar')
                                @yield('content')
                                @yield('right-sidebar')
                            </div>
                        </div><!-- main-section-data end-->
                    </div> 
                </div>
            </main>
        </div><!--theme-layout end-->
    
        <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/popper.js')}}"></script>
        <script type="text/javascript" src="{{asset('fontawesome/js/all.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/jquery.mCustomScrollbar.js')}}"></script>
        <script type="text/javascript" src="{{asset('lib/slick/slick.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/scrollbar.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
        @yield('extrajs')
    </body>
</html>