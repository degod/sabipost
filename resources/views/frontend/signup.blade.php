
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
                                        <li class="current"><a href="{{url('login')}}">Sign in</a></li>							
                                    </ul>			
                                    <div class="sign_in_sec" style="display: unset;">
                                        <h3>Sign up</h3>
                                        @if($errors->any())
                                            @foreach ($errors->all() as $error)
                                                <div class="msg msg-danger msg-danger-text"> 
                                                    <i class="la la-exclamation-circle"></i>
                                                    {{$error}}
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="dff-tab current">
                                            <form action="{{url('register')}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12 no-pdd">
                                                        <div class="sn-field">
                                                            <input type="email" name="email" value="{{old('email')}}" placeholder="E-mail">
                                                            <i class="la la-user"></i>
                                                        </div><!--sn-field end-->
                                                    </div>
                                                    <div class="col-lg-12 no-pdd">
                                                        <div class="sn-field">
                                                            <input type="text" name="phone" value="{{old('phone')}}" placeholder="Mobile Number">
                                                            <i class="la la-phone"></i>
                                                        </div><!--sn-field end-->
                                                    </div>
                                                    <div class="col-lg-12 no-pdd">
                                                        <div class="sn-field">
                                                            <input type="password" name="password" value="{{old('password')}}" placeholder="Password">
                                                            <i class="la la-lock"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 no-pdd">
                                                        <div class="checky-sec st2">
                                                            <div class="fgt-sec">
                                                                <input type="checkbox" name="check" id="c2">
                                                                <label for="c2">
                                                                    <span></span>
                                                                </label>
                                                                <small>Yes, I understand and agree to the sabipost Terms & Conditions.</small>
                                                            </div><!--fgt-sec end-->
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 no-pdd">
                                                        <button type="submit" value="submit">Get Started</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div><!--dff-tab end-->
                                    </div>		
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