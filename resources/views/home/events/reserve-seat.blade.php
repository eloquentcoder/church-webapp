@extends('home.layouts.layouts')


@section('title', 'Reserve Seat')

@section('content')

 <!-- Header Area End Here -->
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
                                    <li>Reserve Seat</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Inne Page Banner Area End Here -->
            <!-- Contact Form Area Start Here -->
            <section class="section-space-default2-less30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 margin-b-30rem">
                            <h2 class="title-bold color-dark size-sm title-bar">Reserve Your Seat Now</h2>
                            <p class="margin-b-30">Reserve Your Seat For {{ $event->name ?? '' }}</p>
                            <form class="contact-form" method="POST" action="{{ route('reserve-seat.post') }}">

                                @csrf

                                <input type="hidden" name="event_id" value="{{ $event->id }}"/>

                                <fieldset>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" placeholder="Name*" class="form-control" name="name" id="form-name" data-error="Name field is required"
                                                    required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="tel" placeholder="Phone Number*" class="form-control" name="phone_number" id="form-number" data-error="Phone Number field is required"
                                                    required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="email" placeholder="Email*" class="form-control" name="email" id="form-number" data-error="Email Address field is required"
                                                    required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="address" placeholder="Address*" class="form-control" name="address" id="form-number" data-error="Home Address field is required"
                                                required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-sm-12">
                                            <div class="form-group margin-b-none">
                                                <button type="submit" class="btn-fill color-yellow border-radius-5">Reserve Seat</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-sm-6 col-sm-12">
                                            <div class='form-response'></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Contact Form Area End Here -->

@endsection

