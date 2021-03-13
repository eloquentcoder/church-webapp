@component('mail::message')
# Introduction

Your Seat Has Been Reserved For the following upcoming event;

@component('mail::panel')
    {{$event->name }} taking place on the {{ $event->starts }} by {{ $event->time }}
@endcomponent

Your Event Reservation Number is {{ $reservation->unique_pass }}


@component('mail::button', ['url' => 'http://www.prophetictribe.com/events'])
View Upcoming Events
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
