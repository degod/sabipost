@extends('frontend.master')
@section('title')
    {{$title}}
@endsection
@section('extracss')@endsection
@section('left-sidebar')
    <div class="col-lg-3 col-md-4 pd-left-none no-pd">
        <div class="main-left-sidebar no-margin">
            @include('frontend.sidebars/profile')
            @include('frontend.sidebars/suggestions')
            @include('frontend.sidebars/footer')
        </div><!--main-left-sidebar end-->
    </div>
@endsection
@section('content')
    <div class="col-lg-6 col-md-8 no-pd">
        <div class="main-ws-sec">
            <div class="post-topbar">
                <div class="user-picy">
                    <img src="http://via.placeholder.com/100x100" alt="">
                </div>
                <div class="post-st">
                    <ul>
                        <li><a class="active" href="{{ url('/post_offer')}}" title="">Post an Offer</a></li>
                    </ul>
                </div><!--post-st end-->
            </div><!--post-topbar end-->
            <div class="posts-section">
                <div class="post-bar">
                    <div class="post_topbar">
                        <div class="usy-dt">
                            <img src="http://via.placeholder.com/50x50" alt="">
                            <div class="usy-name">
                                <h3>John Doe</h3>
                                <span><img src="images/clock.png" alt="">3 min ago</span>
                            </div>
                        </div>
                        <div class="ed-opts">
                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                            <ul class="ed-options">
                                <li><a href="#" title="">Edit Post</a></li>
                                <li><a href="#" title="">Unbid</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="epi-sec">
                        <ul class="descp">
                            <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
                            <li><img src="images/icon9.png" alt=""><span>India</span></li>
                        </ul>
                        <ul class="bk-links">
                            <li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
                            <li><a href="#" title=""><i class="la la-envelope"></i></a></li>
                        </ul>
                    </div>
                    <div class="job_descp">
                        <h3>Senior Wordpress Developer</h3>
                        <ul class="job-dt">
                            <li><a href="#" title="">Full Time</a></li>
                            <li><span>$30 / hr</span></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                        <ul class="skill-tags">
                            <li><a href="#" title="">HTML</a></li>
                            <li><a href="#" title="">PHP</a></li>
                            <li><a href="#" title="">CSS</a></li>
                            <li><a href="#" title="">Javascript</a></li>
                            <li><a href="#" title="">Wordpress</a></li> 	
                        </ul>
                    </div>
                    <div class="job-status-bar">
                        <ul class="like-com">
                            <li>
                                <a href="#"><i class="la la-heart"></i> Like</a>
                                <img src="images/liked-img.png" alt="">
                                <span>25</span>
                            </li> 
                            <li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
                        </ul>
                        <a><i class="la la-eye"></i>Views 50</a>
                    </div>
                </div><!--post-bar end-->
                <div class="top-profiles">
                    <div class="pf-hd">
                        <h3>Top Profiles</h3>
                        <i class="la la-ellipsis-v"></i>
                    </div>
                    <div class="profiles-slider">
                        <div class="user-profy">
                            <img src="http://via.placeholder.com/57x57" alt="">
                            <h3>John Doe</h3>
                            <span>Graphic Designer</span>
                            <ul>
                                <li><a href="#" title="" class="followw">Follow</a></li>
                                <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
                                <li><a href="#" title="" class="hire">hire</a></li>
                            </ul>
                            <a href="#" title="">View Profile</a>
                        </div><!--user-profy end-->
                        <div class="user-profy">
                            <img src="http://via.placeholder.com/57x57" alt="">
                            <h3>John Doe</h3>
                            <span>Graphic Designer</span>
                            <ul>
                                <li><a href="#" title="" class="followw">Follow</a></li>
                                <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
                                <li><a href="#" title="" class="hire">hire</a></li>
                            </ul>
                            <a href="#" title="">View Profile</a>
                        </div><!--user-profy end-->
                        <div class="user-profy">
                            <img src="http://via.placeholder.com/57x57" alt="">
                            <h3>John Doe</h3>
                            <span>Graphic Designer</span>
                            <ul>
                                <li><a href="#" title="" class="followw">Follow</a></li>
                                <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
                                <li><a href="#" title="" class="hire">hire</a></li>
                            </ul>
                            <a href="#" title="">View Profile</a>
                        </div><!--user-profy end-->
                        <div class="user-profy">
                            <img src="http://via.placeholder.com/57x57" alt="">
                            <h3>John Doe</h3>
                            <span>Graphic Designer</span>
                            <ul>
                                <li><a href="#" title="" class="followw">Follow</a></li>
                                <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
                                <li><a href="#" title="" class="hire">hire</a></li>
                            </ul>
                            <a href="#" title="">View Profile</a>
                        </div><!--user-profy end-->
                        <div class="user-profy">
                            <img src="http://via.placeholder.com/57x57" alt="">
                            <h3>John Doe</h3>
                            <span>Graphic Designer</span>
                            <ul>
                                <li><a href="#" title="" class="followw">Follow</a></li>
                                <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
                                <li><a href="#" title="" class="hire">hire</a></li>
                            </ul>
                            <a href="#" title="">View Profile</a>
                        </div><!--user-profy end-->
                        <div class="user-profy">
                            <img src="http://via.placeholder.com/57x57" alt="">
                            <h3>John Doe</h3>
                            <span>Graphic Designer</span>
                            <ul>
                                <li><a href="#" title="" class="followw">Follow</a></li>
                                <li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
                                <li><a href="#" title="" class="hire">hire</a></li>
                            </ul>
                            <a href="#" title="">View Profile</a>
                        </div><!--user-profy end-->
                    </div><!--profiles-slider end-->
                </div><!--top-profiles end-->
                <div class="process-comm">
                    <div class="spinner">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                </div><!--process-comm end-->
            </div><!--posts-section end-->
        </div><!--main-ws-sec end-->
    </div>
    <div class="post-popup pst-pj">
        <div class="post-project">
            <h3>Post an Offer</h3>
            <div class="post-project-fields">
                <form>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" name="title" placeholder="Title">
                        </div>
                        <div class="col-lg-12">
                            <div class="inp-field">
                                <select>
                                    <option>Category</option>
                                    <option>Category 1</option>
                                    <option>Category 2</option>
                                    <option>Category 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <input type="text" name="skills" placeholder="Skills">
                        </div>
                        <div class="col-lg-12">
                            <div class="price-sec">
                                <div class="price-br">
                                    <input type="text" name="price1" placeholder="Price">
                                    <i class="la la-dollar"></i>
                                </div>
                                <span>To</span>
                                <div class="price-br">
                                    <input type="text" name="price1" placeholder="Price">
                                    <i class="la la-dollar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <textarea name="description" placeholder="Description"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <ul>
                                <li><button class="active" type="submit" value="post">Post</button></li>
                                <li><a href="#" title="">Cancel</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div><!--post-project-fields end-->
            <a href="#" title=""><i class="la la-times-circle-o"></i></a>
        </div><!--post-project end-->
    </div><!--post-project-popup end-->
@endsection
@section('right-sidebar')
    <div class="col-lg-3 pd-right-none no-pd">
        <div class="right-sidebar">
            @include('frontend.sidebars/signup')
            @include('frontend.sidebars/top_jobs')
            @include('frontend.sidebars/most_viewed_this_week')
            @include('frontend.sidebars/most_viewed_people')
        </div><!--right-sidebar end-->
    </div>
@endsection
@section('extrajs')@endsection
