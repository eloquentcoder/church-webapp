@extends('home.layouts.layouts')

@section('title','Home')

@section('content')

                    <!-- Slider Area Start Here -->
                    <div class="slider-area slider-direction-layout1 slider-layout1 overlay-slider">
                        <div class="bend niceties preview-1">
                            <div id="ensign-nivoslider-1" class="slides">

                                @forelse ($upcoming_events as $key => $item)
                                    <img src="{{ $item->image }}" alt="slider" title="#slider-direction-{{ $key + 1 }}" height="1920" width="938" />
                                @empty
                                    <img src="{{ asset('home/img/slider/slide1-1.jpg')}}" alt="slider" title="#slider-direction-1" />
                                    <img src="{{ asset('home/img/slider/slide1-2.jpg')}}" alt="slider" title="#slider-direction-2" />
                                    <img src="{{ asset('home/img/slider/slide1-3.jpg')}}" alt="slider" title="#slider-direction-3" />
                                @endforelse
                            </div>
                            @foreach ($events as $key => $event)
                                    <div id="slider-direction-{{ $key + 1 }}" class="t-cn slider-direction">
                                        <div class="slider-content s-tb slide-{{ $key + 1 }}">
                                            <div class="title-container s-tb-c title-light">
                                                <div class="container text-center">
                                                    <div class="slider-big-text first-line">
                                                        <p>{{ $event->name }}</p>
                                                    </div>
                                                    <div class="slider-big-text second-line">
                                                        <p>{{ $event->motto }}</p>
                                                    </div>
                                                    <div class="slider-sub-text third-line">
                                                        <ul>
                                                            <li>{{ $event->parsed_date }}</li>
                                                            <li>{{ $event->venue }}, {{ $event->country }}</li>
                                                        </ul>
                                                    </div>
                                                    <div class="slider-btn-area forth-line">
                                                        <a href="#" class="btn-ghost color-yellow border-radius-5">Reserve Seat</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- Slider Area End Here -->
                     <!-- Audio Area End Here -->
                    @if($setting)
                    <section class="audio-layout1">
                        <div class="container">
                            <div class="audio-main-body">
                                <div class="row no-gutters">
                                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4 col-5">
                                        <div class="singer-info">
                                            <div class="media media-none--sm">
                                                <div class="speaker-img">
                                                    <img src="img/speaker/singer.png" alt="schedule" class="rounded-circle">
                                                </div>
                                                <div class="media-body item-content space-md">
                                                    <h3 class="title title-medium color-light size-sm">{{ $setting->sermon_clip_title }}</h3>
                                                    <p>by Pastor Samuel Oye</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-8 col-7">
                                        <div class="audio-player-wrap">
                                            <div id="audioplayer" class="play-pause-wrap">
                                                <button id="pButton" class="play btn-play"></button>
                                                <div id="timeline">
                                                    <div id="playhead"></div>
                                                </div>
                                            </div>
                                            <div class="progress-wrap">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="player-time-label">
                                                    <div class="current-duration"></div>
                                                    <div class="total-duration"></div>
                                                </div>
                                            </div>
                                            <div id="volume_control" class="volume-control d-flex">
                                                <label id="rngVolume_label" for="rngVolume">
                                                    <i class="fa fa-volume-up" aria-hidden="true"></i>
                                                </label>
                                                <input type="range" id="rngVolume" min="0" max="1" step="0.01" value="1">
                                            </div>
                                            <audio controls="controls" id="audio_player" style="display:none">
                                                <source src="{{ $setting->sermon_clip }}" type="audio/ogg">
                                                <source src="{{ $setting->sermon_clip }}" type="audio/mp3"> Your browser does not support the audio element.
                                            </audio>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endif

                     <!-- Audio Area End Here -->
                    <!-- Countdown Area Start Here -->
                    <section class="full-width-container countdown-layout1">
                        {{-- <div class="container-fluid">
                            <div id="countdown"></div>
                        </div> --}}
                    </section>
                    <!-- Countdown Area End Here -->
                    <!-- About Area Start Here -->
                    <section class="section-space-equal bg-light">
                        <div class="container">
                            <div class="about-layout1">
                                <img src="{{ asset('logo.jpeg') }}" alt="logo" class="img-fluid">

                                    <p>{{ $setting->about_church_excerpt ?? '' }}</p>

                                <a href="#" title="View More" class="btn-fill color-yellow border-radius-5">View More</a>
                            </div>
                        </div>
                    </section>
                    <!-- About Page Area End Here -->
                    <!-- Speaker Area Start Here -->
                    <section class="section-space-default-less54 overlay-icon-layout3 bg-common bg-primary" style="background-image: url(img/figure/figure2.png);">
                        <div class="container zindex-up">
                            <div class="section-heading title-black color-light text-center">
                                <h2>The Founder</h2>
                                <p>A Brief History Of The Founder</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-12 col-sm-12">
                                    <div class="single-speaker-img">
                                        <img src="{{ asset('home/img/speaker/single-speaker.jpg')}}" class="img-fluid" alt="single-speaker">
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-12 col-sm-12">
                                    <div class="speaker-profile">
                                        <h2 class="title title-black color-dark">Pastor Sam Oye</h2>
                                        <div class="sub-title">Senio Pastor</div>
                                        <p style="color:white;">{{ $setting->about_pastor ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Speaker Area End Here -->
                    <!-- Schedule Area Start Here -->
                    <section class="section-space-default bg-light">
                        <div class="container zoom-gallery menu-list-wrapper">
                            <div class="section-heading title-black color-dark text-center">
                                <h2>Upcoming Events</h2>
                                <p>Upcoming Events Over The next couple of Days</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped schedule-layout1">
                                    <tbody class="menu-list">

                                        @forelse ($events as $item)
                                            <tr class="menu-item">
                                                <th>
                                                    <div class="day-number">{{ $item->starts }}</div>
                                                    <div class="schedule-date">{{ $item->ends }}</div>
                                                </th>
                                                <td>
                                                    <div class="schedule-title">
                                                        <a href="single-event.html">{{ $item->name }}</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="schedule-time">
                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>{{ $item->time }}</div>
                                                </td>
                                                <td>
                                                    <td>
                                                        <a href="#" title="Reserve seat" class="btn-fill size-xs color-yellow border-radius-5">Reserve Seat</a>
                                                    </td>
                                                </td>
                                            </tr>
                                        @empty
                                            <div class="text-center container">
                                                <h1>No Upcoming Events Yet</h1>
                                            </div>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @if(count($events) > 0)
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <a href="#" title="More Schedule" class="loadmore-one-item btn-fill size-lg border-radius-5 color-yellow margin-t-50">More Events</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </section>
                    <!-- Schedule Area End Here -->

                    <!-- Progress Area Start Here -->
                    <section class="progress-section-space bg-common progress-bg-color" style="background-image: url(img/figure/figure1.png);">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-12">
                                    <div class="progress-layout1">
                                        <div class="media">
                                            <div class="item-icon">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h3>Ministry Address</h3>
                                                <p>{{ $setting->address ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="progress-layout1">
                                        <div class="media">
                                            <div class="item-icon">
                                                <i class="fa fa-users" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h3>{{ count($events) }} Events</h3>
                                                <p>All across different countries of the world</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-12">
                                    <div class="progress-layout1">
                                        <div class="media">
                                            <div class="item-icon">
                                                <i class="fa fa-clone" aria-hidden="true"></i>
                                            </div>
                                            <div class="media-body">
                                                <h3>{{ 0 }} Countries</h3>
                                                <p>{{ $setting->address ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Progress Area End Here -->
                    <!-- Blog Area Start Here -->
                    <section class="section-space-default-less30 bg-accent">
                        <div class="container">
                            <div class="section-heading title-black color-dark text-center">
                                <h2>Messages</h2>
                                <p>You can still be blessed. Check out some of his popular messages</p>
                            </div>
                            <div class="row">
                                @forelse ($messages as $item)
                                    <div class="col-md-4 col-sm-12">
                                        <div class="blog-layout1">
                                            <div class="item-img">
                                                <img src="{{ asset('home/img/bible.jpg')}}" alt="blog" class="img-fluid">
                                                {{-- <div class="item-date">26
                                                    <span> Oct</span>
                                                </div> --}}
                                            </div>
                                            <div class="item-content">
                                                <div class="item-title">
                                                    <h3 class="title-medium color-dark hover-primary">
                                                        <a href="single-blog.html">{{ $item->title }}</a>
                                                    </h3>
                                                </div>
                                                <div class="item-deccription">
                                                    <p>{{ $item->excerpt }}</p>
                                                </div>
                                                <a href="#" title="Read More" class="btn-text">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center container">
                                        <h1>No Sermons Yet</h1>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </section>
                    <!-- Blog Area End Here -->
                    <!-- Map Area Start Here -->
                    <section class="full-width-container">
                        <div class="container-fluid">
                            <div class="google-map-area">
                                <div id="googleMap" style="width:100%; height:496px;"></div>
                                <div class="upcoming-event-layout1">
                                    <h2>Prophetic Tribe
                                        <br> Ministry</h2>
                                    <p>{{ $setting->address ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Map Area End Here -->
                    <!-- Subscribe Area Start Here -->
                    <section class="overlay-primary90 overlay-icon-layout1 section-space-default2 bg-common" style="background-image: url(img/figure/figure1.jpg);">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="subscribe-layout1 zindex-up">
                                        <h2>Sign Up For Our Newsletter</h2>
                                        <div class="input-group subscribe-input-area">

                                            <input type="email" id="email-news" name="email" placeholder="Type your e-mail address" class="form-control">
                                            <span class="input-group-addon">
                                                <button type="submit" id="submit-button" class="btn-fill size-md border-radius-5 color-yellow">Subscribe</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Subscribe Area End Here -->

@endsection

@section('footer-scripts')
<script>

        $(document).ready(function () {


            $('#submit-button').click(function(){
                var email = $('#email-news').val();
                if (email === '') {
                    return Swal.fire(
                                'Notice!',
                                'The email field should not be empty',
                                'warning'
                            )
                }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: '{{ route('newsletter') }}',
                        dataType: 'json',
                        data: {'email': email },
                        type: 'POST',
                        success: function(result) {
                            Swal.fire(
                                'Success!',
                                result[1],
                                'success'
                            )
                        }
                });



            });


        });

</script>
@endsection
