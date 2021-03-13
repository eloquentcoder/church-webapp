@extends('home.layouts.layouts')

@section('title', 'Testimonies')


@section('content')

          <!-- Inne Page Banner Area Start Here -->
          <section class="inner-page-banner" style="background-image: url(img/figure/inner-page-figure.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>View Testimonies</h1>
                            <ul>
                                <li>
                                    <a href="{{ route('events') }}">Home</a>
                                </li>
                                <li>Testimonies</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Inne Page Banner Area End Here -->

          <!-- Blog Page Area Start Here -->
          <section class="section-space-equal">
            <div class="container">
                <div class="row" id="no-equal-gallery">

                    @forelse ($testimonies as $item)
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 no-equal-item">
                            <div class="blog-layout4">
                                <div class="entry-content bg-primary">
                                    <div class="item-content">
                                        <h3 class="title title-regular color-light hover-yellow">
                                            <a href="single-blog.html" title="Continue Reading">{{ $item->testimony }}</a>
                                        </h3>
                                        <h4 class="title-regular color-light hover-yellow text-underline-light">
                                            <em>{{ $item->name }}</em>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center container">
                            <h3>No Testimonies Yet</h3>
                        </div>
                    @endforelse

                </div>


            </div>
        </section>
        <!-- Blog Page Area End Here -->

@endsection
