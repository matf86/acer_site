@component('mail::message')
Otrzymałeś nową wiadmosć poprzez formularz kontaktowy:

<p>Nadawca: {{$message['author']}}</p>
<p>Email nadawcy: {{$message['email']}}<p>
@if($message['phone'])
<p>Telefon kontaktowy: {{$message['phone']}}</p>
@endif

<p>Treść wiadomości:</p>
<p>{{$message['message']}}</p>
@endcomponent
