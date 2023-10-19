@component('mail::message')
# Free Quote Request

Hi admin you have recent  free quote .
# info of quote:
<h5 style="display: inline">Name:</h5> {{$quote->name}}
<br>
<h5 style="display: inline">Email:</h5> {{$quote->email}}
<br>
<h5 style="display: inline">Price:</h5> {{$quote->price}}
<br>
<h5 style="display: inline">Service:</h5> {{$quote->service}}
<br>
<h5 style="display: inline">Message:</h5>
<br>
<p>{{$quote->message}}</p>



Thanks,<br>
{{ config('app.name') }}
@endcomponent
