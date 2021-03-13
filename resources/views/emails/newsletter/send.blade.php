@component('mail::message')
{{ $newsletter->title }}

@component('mail::panel')
    {{ $newletter->body }}
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
