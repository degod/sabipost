@extends('frontend.master')
@section('title')
    {{$title}}
@endsection
@section('extracss')
    <style>
        .price-br {
            float:unset !important;
            width:unset !important;
        }
    </style>
@endsection
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
            <form >
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <h1>Post an Offer</h1>
                    </div>
                    <div class="col-lg-12 mb-2">
                        <div class="price-sec">
                            <div class="price-br">
                                <input type="text" class="form-control" name="amount" placeholder="Offer award">
                                <i class="la la-dollar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-2">
                        <textarea name="description" rows="12" class="form-control" placeholder="Offer description....."></textarea>
                    </div>
                    <div class="col-lg-12 mb-2">
                        <button class="btn pull-right" style="background-color: #e44d3a;border:0;color: #fff;" type="submit" value="post">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
@include('frontend.footer')
@section('extrajs')@endsection