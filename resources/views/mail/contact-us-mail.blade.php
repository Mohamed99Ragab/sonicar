@component('mail::message')
# Contact Us Mail


Hi welcome you have recent  mail contact .
## info of contact:

<h4 style="display: inline">Name:</h4> {{$contact->name}}
<br>
<h4 style="display: inline">Email:</h4> {{$contact->email}}
<br>
<h4 style="display: inline">Phone:</h4> {{$contact->phone}}
<br>
<h4 style="display: inline">Subject:</h4> {{$contact->subject}}
<br>
<h4 style="display: inline">Message:</h4>
<p>{{$contact->message}}</p>



{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
