@component('mail::message')
Hello **{{$name}}**,  {{-- use double space for line break --}}
Thank you for choosing MY FREEADS!
Click below verify your email and finalize your registration:
@component('mail::button', ['url' => $link])
Verify your email
@endcomponent
Sincerely,
Mailtrap team.
@endcomponent