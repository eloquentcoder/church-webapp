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
                                <h1>Giving</h1>
                                <ul>
                                    <li>
                                        <a href="#">Home</a>
                                    </li>
                                    <li>Giving</li>
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
                            <h2 class="title-bold color-dark size-sm title-bar">Send In Your Donation And Be A Blessing To The Ministry</h2>
                            <p class="margin-b-30"></p>

                            <form>

                                <input class="form-control" placeholder="Enter Amount You Wish To Donate" />

                                <a class="flwpug_getpaid"
                                data-PBFPubKey="FLWPUBK-2459906b2069236e487d35cb88e6811f-X"
                                data-txref="rave-123456"
                                data-amount="2000"
                                data-customer_email="user@example.com"
                                data-meta-flightID="APX0093GHK"
                                data-currency="NGN"
                                data-pay_button_text="Donate"
                                data-country="NG"
                                data-redirect_url="https://your-website.com/urlredirect"></a>

                                <script type="text/javascript" src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
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


    });

</script>
@endsection
