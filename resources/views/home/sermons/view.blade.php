@extends('home.layouts.layouts')

@section('title', 'View Sermon')


@section('content')

         <!-- Inne Page Banner Area Start Here -->
         <section class="inner-page-banner" style="background-image: url(img/figure/inner-page-figure.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>{{ $sermon->title }}</h1>
                            <ul>
                                <li>
                                    <a href="#">Home</a>
                                </li>
                                <li>Sermon</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Inne Page Banner Area End Here -->
        <!-- Error Page Area Start Here -->
        <section class="section-space-less30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="single-speaker-img">
                            <img src="{{ asset('home/img/bible.jpg') }}" class="img-fluid" alt="single-speaker">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12">
                        <div class="speaker-profile">
                            <h2 class="title title-black color-dark">{{ $sermon->title }}</h2>
                            <div class="sub-title">{{ $sermon->bible_text }}</div>

                            <p>{{ $sermon->message }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <h3 class="title-bold color-dark title-bar">Audio Files Of {{ $sermon->title }}</h3>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="profile-event">
                            <audio controls>
                                <source src="{{  }}" type="audio/ogg">
                                <source src="horse.mp3" type="audio/mpeg">
                              Your browser does not support the audio element.
                              </audio>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="profile-event">
                            <iframe width="420" height="315"
                            src="{{ $sermon->video }}">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Error Page Area End Here -->

@endsection
