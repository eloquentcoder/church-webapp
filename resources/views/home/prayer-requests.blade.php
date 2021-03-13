@extends('home.layouts.layouts')


@section('title', 'Prayer Requests')

@section('content')

  <!-- Header Area End Here -->
            <!-- Inne Page Banner Area Start Here -->
            <section class="inner-page-banner" style="background-image: url(img/figure/inner-page-figure.jpg);">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumbs-area">
                                <h1>Make Prayer Requests</h1>
                                <ul>
                                    <li>
                                        <a href="#">Home</a>
                                    </li>
                                    <li>Prayer Requests</li>
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
                            <h2 class="title-bold color-dark size-sm title-bar">Feel Free To Drop your prayer requests</h2>
                            <p class="margin-b-30">You have an issue that you  would want us to pray with you about? Drop it here and we will pray with you concerning it.</p>
                            <form class="contact-form" action="{{ route('request.post') }}" method="POST">

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
                                                <input type="tel" placeholder="Phone Number*" class="form-control" name="phone_number" id="form-number" data-error="Phone Number field is required"
                                                    required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea placeholder="Prayer Request*" class="textarea form-control" name="request" id="form-message" rows="10" cols="20" data-error="Prayer Request field is required"
                                                    required></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6 col-sm-12">
                                            <div class="form-group margin-b-none">
                                                <button type="submit" class="btn-fill color-yellow border-radius-5">Send Prayer Request</button>
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
