@component('mail::message')
# Sonicar Tech
##Hi, {{$user->name}}
we will replay on your own message.
<strong>Message: </strong>
{{$data}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
