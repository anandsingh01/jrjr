@extends('layouts.header')
@section('content')

<section>
    <div class="gap">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="heading-2">
                        <!-- <span>Latest causes</span> -->
                        <h4>upcoming <span>events</span></h4>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="up-coming-event">
                        <div class="our-cause remove-ext-50 loader-data" id="itemContainer">
                            @foreach ($events as $event)
                            <div class="col-md-4 col-sm-4">
                                <div class="event-unit">
                                    <img src="{{ asset('events/feature_images/' . $event->feature_img) }}" alt="">
                                    <ul class="countdown style2">
                                        <li class="day">
                                            <p class="days_ref">day</p><span class="days">{{ $event->event_date
                                                }}</span>
                                        </li>
                                        <li><span class="">{{ $event->event_time }}</span></li>

                                    </ul>
                                    <div class="event-meta">
                                        <span><i class="ion-ios-navigate"></i><em>In</em> {{ $event->location }}</span>
                                        <h2><a href="#" title="">{{ $event->name }}</a></h2>
                                        <p>{{ $event->desc }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="holder2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- upcoming events grid view -->

@endsection