@extends('home.layouts.layouts')

@section('title', 'Events')


@section('content')

          <!-- Inne Page Banner Area Start Here -->
          <section class="inner-page-banner" style="background-image: url(img/figure/inner-page-figure.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>View Events</h1>
                            <ul>
                                <li>
                                    <a href="{{ route('events') }}">Home</a>
                                </li>
                                <li>Events</li>
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
                <h3 class="title-bold color-dark title-bar">Upcoming Events</h3>
                <div class="row">
                    @forelse ($upcoming_events as $item)
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="profile-event" style="background:linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url({{$item->image}})">
                                <h3 class="title title-bold color-dark">
                                    <a href="{{ route('events.view', $item->slug) }}" style="color:white;">{{ $item->name }}</a>
                                </h3>
                                <div class="profile-event-date" style="color:white;">{{ $item->starts }} {{ $item->time }}</div>
                                <div class="profile-event-place" style="color:white;">{{ $item->venue }}</div>
                            </div>
                        </div>

                    @empty
                        <div class="text-center container">
                            <h3>No Upcoming Events Yet</h3>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="container">
                <h3 class="title-bold color-dark title-bar">Past Events</h3>
                <div class="row">
                    @forelse ($past_events as $item)
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="profile-event" style="background: url({{$item->image}})">
                                <h3 class="title title-bold color-dark">
                                    <a href="#">{{ $item->name }}</a>
                                </h3>
                                <div class="profile-event-date">{{ $item->starts }} {{ $item->time }}</div>
                                <div class="profile-event-place">{{ $item->venue }}</div>
                            </div>
                        </div>

                    @empty
                        <div class="text-center container">
                            <h3>No Past Events Yet</h3>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        <!-- Error Page Area End Here -->

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
                    })
        </script>

@endsection
