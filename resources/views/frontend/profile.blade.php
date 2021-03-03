@extends('frontend.master')
@section('title')
    {{$title}}
@endsection
@section('extracss')@endsection
@section('left-sidebar')
    <div class="col-lg-3 col-md-4 pd-left-none no-pd">
        <div class="main-left-sidebar no-margin">
            <div class="user_profile">
                <div class="user-pro-img">
                    <img src="{{!empty(\Auth::user()->avatar) ? asset(\Auth::user()->avatar) : 'http://via.placeholder.com/170x170'}}" alt="">
                    <a href="#" title=""><i class="fa fa-camera"></i></a>
                </div><!--user-pro-img end-->
                <div class="user_pro_status">
                    <ul class="flw-hr">
                        <li><a href="#" class="flww"><i class="la la-plus"></i> Follow</a></li>
                    </ul>
                    <ul class="flw-status">
                        <li>
                            <span>Following</span>
                            <b>34</b>
                        </li>
                        <li>
                            <span>Followers</span>
                            <b>155</b>
                        </li>
                    </ul>
                </div><!--user_pro_status end-->
            </div><!--user_profile end-->
        </div><!--main-left-sidebar end-->
    </div>
@endsection
@section('content')
    <div class="col-lg-6 col-md-8 no-pd">
        <div class="main-ws-sec">
            <div class="user-tab-sec">
                <h3>{{!empty(\Auth::user()->name) ? \Auth::user()->name : \Auth::user()->email}}</h3>
                <div class="star-descp">
                    <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star-half-o"></i></li>
                    </ul>
                </div><!--star-descp end-->
                <div class="tab-feed st2">
                    <ul>
                        <li data-tab="feed-dd" class="active">
                            <a href="#" title="">
                                <img src="images/ic1.png" alt="">
                                <span>Feed</span>
                            </a>
                        </li>
                    </ul>
                </div><!-- tab-feed end-->
            </div><!--user-tab-sec end-->
            <div class="product-feed-tab" id="feed-dd">
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
                                    <li><a href="#" title="">Unbid</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="epi-sec">
                            <ul class="descp">
                                <li><img src="images/icon9.png" alt=""><span>India</span></li>
                            </ul>
                            <ul class="bk-links">
                                <li><a href="#" title="" class="bid_now">Bid Now</a></li>
                            </ul>
                        </div>
                        <div class="job_descp">
                            <ul class="job-dt">
                                <li><span>$300 - $350</span></li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
                        </div>
                        <div class="job-status-bar">
                            <ul class="like-com">
                                <li><a href="#" title="" class="com"><img src="images/com.png" alt=""> Comment 15</a></li>
                            </ul>
                            <a><i class="la la-eye"></i>Views 50</a>
                        </div>
                    </div><!--post-bar end-->
                    <div class="process-comm">
                        <a href="#" title=""><img src="images/process-icon.png" alt=""></a>
                    </div><!--process-comm end-->
                </div><!--posts-section end-->
            </div><!--product-feed-tab end-->
        </div><!--main-ws-sec end-->
    </div>
@endsection
@section('extrajs')@endsection
