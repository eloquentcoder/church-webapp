@extends('home.layouts.layouts')

@section('title', 'Sermons')


@section('content')

          <!-- Inne Page Banner Area Start Here -->
          <section class="inner-page-banner" style="background-image: url(img/figure/inner-page-figure.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>Sermons</h1>
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li>Sermons</li>
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

                    @forelse ($messages as $item)
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 no-equal-item">
                            <div class="blog-layout4">
                                <div class="entry-image">
                                    <div class="item-image">
                                        <a href="single-blog.html">
                                            <img src="{{ asset('home/img/bible.jpg') }}" class="img-responsive" alt="blog">
                                        </a>
                                    </div>
                                    <div class="item-content">
                                        <h3 class="title title-bold color-dark hover-primary">
                                            <a href="single-blog.html">{{ $item->title }}</a>
                                        </h3>
                                        <ul class="news-meta-info">
                                            <li>{{ $item->bible_text }}</li>

                                            <li>By
                                                <span> Pastor Samuel Oye</span>
                                            </li>
                                        </ul>
                                        <p>{{ $item->excerpt }}</p>
                                        <a href="{{ route('sermon.view', $item->slug) }}" title="Continue Reading" class="btn-text color-green hover-yellow">Continue Reading</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                            <div class="col-12 text-center">
                                <h3>No Sermons Here Yet</h3>
                            </div>
                    @endforelse
                </div>

            </div>
        </section>
        <!-- Blog Page Area End Here -->

@endsection
