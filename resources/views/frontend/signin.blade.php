
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{$title}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" type="text/css" href="{{asset('css/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/line-awesome-font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('lib/slick/slick.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('lib/slick/slick-theme.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
        <link rel="shortcut icon" href="images/logo/icon-black.png">
    </head>


    <body class="sign-in">
        <div class="wrapper">
            <div class="sign-in-page">
                <div class="signin-popup">
                    <div class="signin-pop">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="cmp-info">
                                    <div class="cm-logo">
                                        <img src="images/logo/logo-black.png" height="80">
                                        <p>SabiPost, is a global freelancing platform and social networking where businesses and independent professionals connect and collaborate remotely</p>
                                    </div><!--cm-logo end-->	
                                    <img src="{{asset('images/cm-main-img.png')}}" alt="">			
                                </div><!--cmp-info end-->
                            </div>
                            <div class="col-lg-6">
                                <div class="login-sec">
                                    <ul class="sign-control">				
                                        <li class="current"><a href="{{url('register')}}" title="">Sign up</a></li>				
                                    </ul>			
                                    <div class="sign_in_sec current">
                                        <h3>Sign in</h3>
                                        @if($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <div class="msg msg-danger msg-danger-text"> 
                                                    <i class="la la-exclamation-circle"></i>
                                                    {{$error}}
                                                </div>
                                            @endforeach
                                        @endif
                                        <form action="{{url('login')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" name="email" placeholder="E-mail">
                                                        <i class="la la-user"></i>
                                                    </div><!--sn-field end-->
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" name="password" placeholder="Password">
                                                        <i class="la la-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="checky-sec">
                                                        <div class="fgt-sec">
                                                            <input type="checkbox" name="cc" id="c1">
                                                            <label for="c1">
                                                                <span></span>
                                                            </label>
                                                            <small>Remember me</small>
                                                        </div><!--fgt-sec end-->
                                                        <a href="#" title="">Forgot Password?</a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" value="submit">Sign in</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="login-resources">
                                            <h4>Login Via Social Account</h4>
                                            <ul>
                                                <li><a href="#" title="" class="fb"><i class="fa fa-facebook"></i>Login Via Facebook</a></li>
                                                <li><a href="#" title="" class="tw"><i class="fa fa-google"></i>Login Via Google</a></li>
                                            </ul>
                                        </div><!--login-resources end-->
                                    </div><!--sign_in_sec end-->
                                </div><!--login-sec end-->
                            </div>
                        </div>		
                    </div><!--signin-pop end-->
                </div><!--signin-popup end-->
                <div class="footy-sec">
                    <div class="container">
                        <ul>
                            <li><a href="#" title="">Help Center</a></li>
                            <li><a href="#" title="">Privacy Policy</a></li>
                            <li><a href="#" title="">Community Guidelines</a></li>
                            <li><a href="#" title="">Cookies Policy</a></li>
                            <li><a href="#" title="">Career</a></li>
                            <li><a href="#" title="">Forum</a></li>
                            <li><a href="#" title="">Language</a></li>
                            <li><a href="#" title="">Copyright Policy</a></li>
                        </ul>
                        <p><img src="{{asset('images/copy-icon.png')}}" alt="">Copyright 2018</p>
                    </div>
                </div><!--footy-sec end-->
            </div><!--sign-in-page end-->
        </div><!--theme-layout end-->

        <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/popper.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('lib/slick/slick.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    </body>
</html>