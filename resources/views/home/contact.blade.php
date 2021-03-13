@extends('home.layouts.layouts')


@section('title', 'Contact Us')

@section('content')

  <!-- Header Area End Here -->
            <!-- Inne Page Banner Area Start Here -->
            <section class="inner-page-banner" style="background-image: url(img/figure/inner-page-figure.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumbs-area">
                                <h1>Contact Us</h1>
                                <ul>
                                    <li>
                                        <a href="#">Home</a>
                                    </li>
                                    <li>Contact</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Inne Page Banner Area End Here -->
            <!-- Map Area Start Here -->
            <section class="full-width-container">
                <div class="container-fluid">
                    <div class="google-map-area">
                        <div id="googleMap" style="width:100%; height:496px;"></div>
                        <div class="upcoming-event-layout1">
                            <h2>Prophetic
                                <br> Tribe Ministries</h2>
                            <div class="date">17 - 25 Oct, 2018</div>
                            <p>{{ $setting->address ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Map Area End Here -->
            <!-- Contact Form Area Start Here -->
            <section class="section-space-default2-less30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 margin-b-30rem">
                            <h2 class="title-bold color-dark size-sm title-bar">Feel Free To Drop Us A Line To Contact Us</h2>
                            <p class="margin-b-30"></p>
                            <form class="contact-form" method="POST" action="{{ route('contact.post') }}">

                                @csrf

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
                                                <input type="email" placeholder="Email*" class="form-control" name="email" id="form-email" data-error="Email field is required"
                                                    required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea placeholder="Message*" class="textarea form-control" name="message" id="form-message" rows="10" cols="20" data-error="Message field is required"
                                                    required></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-sm-12">
                                            <div class="form-group margin-b-none">
                                                <button type="submit" class="btn-fill color-yellow border-radius-5">Send Message</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-6 col-sm-6 col-sm-12">
                                            <div class='form-response'></div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <div class="sidebar-widget-area sidebar-break-md col-lg-4 col-md-12">
                            <div class="widget">
                                <h2 class="title-bold color-dark size-sm title-bar title-bar-high">Contact Info</h2>
                                <div class="contact-us-info">
                                    <ul>
                                        <li>
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>{{ $setting->address ?? '' }}</li>
                                        <li>
                                            <i class="fa fa-phone" aria-hidden="true"></i>{{ $setting->phone_number ?? '' }}</li>
                                        <li>
                                            <i class="fa fa-envelope-o" aria-hidden="true"></i>{{ $setting->email ?? '' }}</li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Contact Form Area End Here -->

@endsection

@section('footer-scripts')
<script>

    $(document).ready(function () {

        @if(Session::has('success'))
            Swal.fire(
                'Success!',
                '{{Session::get('success')}}',
                'success'
            )
            console.log('Hi')
        @endif
    });

</script>
@endsection
