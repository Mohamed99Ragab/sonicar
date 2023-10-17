@component('mail::message')
# Free Quote Request

Hi admin you have recent  free quote .
##info of quote:
<strong>Name:</strong> {{$quote->name}}
<strong>Email:</strong> {{$quote->email}}
<strong>Price:</strong> {{$quote->price}}
<strong>Service:</strong> {{$quote->service}}
<strong>Message:</strong>
{{$quote->message}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
