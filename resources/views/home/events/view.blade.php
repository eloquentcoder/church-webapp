@extends('home.layouts.layouts')

@section('title', 'View Events')


@section('content')

   <!-- Inne Page Banner Area Start Here -->
   <section class="inner-page-banner" style="background-image: url({{ $event->image }});">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs-area">
                    <h1>{{ $event->name }}</h1>
                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>{{ $event->name }}</li>
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
            <div class="col-12">
                <div class="single-event-img">
                    <div class="et-carousel dot-control" data-loop="true" data-items="1" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000"
                        data-smart-speed="2000" data-dots="true" data-nav="false" data-nav-speed="false" data-r-x-small="1"
                        data-r-x-small-nav="false" data-r-x-small-dots="true" data-r-x-medium="1" data-r-x-medium-nav="false"
                        data-r-x-medium-dots="true" data-r-small="1" data-r-small-nav="false" data-r-small-dots="true"
                        data-r-medium="1" data-r-medium-nav="false" data-r-medium-dots="true" data-r-Large="1" data-r-Large-nav="false"
                        data-r-Large-dots="true">
                        <img src="{{ $event->image }}" class="img-fluid" alt="single-event">
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="event-description">
                    <h2 class="title title-bold color-dark">{{ $event->name }}</h2>
                    <p>{{ $event->description }}</p>
                    <a href="{{ route('reserve-seat', $event->id) }}" title="Reserve Seat" class="btn-fill border-radius-5 size-lg color-yellow margin-t-20">Reserve Seat</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Error Page Area End Here -->

@endsection


