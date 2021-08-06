@component('mail::message')
# You have a new message from "Contact Us" form

Here is your message information and details:

Name: {{ $user_information['name']}}<br>
Email: {{ $user_information['email'] }}<br>
Phone: {{ $user_information['phone'] }}<br>

Subject: {{ $user_information['subject'] }}<br>

Message: <br>
<textarea name="" id="" cols="100%" rows="10" readonly>{{ $user_information['message'] }}</textarea>

@component('mail::button', ['url' => 'mailto:'.$user_information['email']])
Reply Them
@endcomponent

Kindly,<br>
{{ config('app.name') }}
@endcomponent
