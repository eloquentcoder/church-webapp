@extends('home.layouts.layouts')


@section('title', 'About')

@section('content')

<section class="inner-page-banner" style="background-image: url(img/figure/inner-page-figure.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-area">
                    <h1>About Us</h1>
                    <ul>
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li>
                            <a href="#"></a>
                            About Us
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Inne Page Banner Area End Here -->
<!-- About Us Start Here -->
<section class="section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="about-layout4">
                    <img src="{{ asset('home/img/logo.png') }}" alt="logo" class="img-fluid">
                    <p style="text-align: justify;">{{ $setting->about_church ?? '' }}</p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="progress-layout3">
                    <div class="media">
                        <div class="item-icon">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                            <h3>{{ count($events) }} Events</h3>
                            <p>Number Of Successful Events.</p>
                        </div>
                    </div>
                </div>
                <div class="progress-layout3">
                    <div class="media">
                        <div class="item-icon">
                            <i class="fa fa-clone" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                            <h3>{{ count($countries) }} Countries</h3>
                            <p>Number Of Countries Hosting</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Area End Here -->
<!-- Why Join Us Start Here -->
<section>
    <div class="container-fluid">
        <div class="row no-gutters full-width">
            <div class="col-lg-6">
                <img src="{{ asset('home/img/about/about2.jpg')}}" alt="about" class="img-fluid width-100">
            </div>
            <div class="col-lg-6">
                <div class="overlay-icon-layout5 height-100 d-flex align-items-center bg-accent">
                    <div class="text-left about-section-padding zindex-up">
                        <h2 class="title-black color-dark">About Pastor Oye</h2>
                        <p style="text-align: justify;">{{ $setting->about_pastor ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
