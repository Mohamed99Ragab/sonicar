@component('mail::message')
# Contact Us Mail


Hi welcome you have recent  mail contact .
##info of contact:
<strong>Name:</strong> {{$contact->name}}
<strong>Email:</strong> {{$contact->email}}
<strong>Phone:</strong> {{$contact->phone}}
<strong>Subject:</strong> {{$contact->subject}}
<strong>Message:</strong>
{{$contact->message}}



{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
