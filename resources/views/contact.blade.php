@extends('layout.app')

@section('title')
    <title>{{ $data['title'] }}</title>
@endsection

@section('description')
    <meta name="description" content="{{ $data['meta_description'] }}">
@endsection

@section('content')

<header class="{{$data['header_bg']}}">
    <h1>{{$data['header']}}</h1>
</header>

<section class="contact">
    <div class="contact__address">
        <div class="contact__address--hq">
            <h2>{{ $data['contact_address']['header'] }}</h2>
            <p>{{ $data['contact_address']['name'] }}</p>
            <p>{{ $data['contact_address']['address'] }}</p>
            @foreach($data['contact_address']['contact'] as $contact)
            <p><i class="fa {{$contact['icon']}}" aria-hidden="true"></i>{{$contact['content']}}</p>
            @endforeach
        </div>
        <div class="contact__address--mail">
            <h2>{{ $data['mailing_address']['header'] }}</h2>
            <p>{{ $data['mailing_address']['name'] }}</p>
            <p>{{ $data['mailing_address']['address'] }}</p>
        </div>
    </div>
    <div class="contact__form">
        <form id="contact_form" action="/kontakt" method="post">
            <h2>Skontaktuj się z nami</h2>
            <fieldset>
                <input name="name" placeholder="Imie / Nazwa firmy" type="text" tabindex="1" data-validation="required" data-sanitize="trim" data-sanitize="escape" data-validation-error-msg="Uzupełnij powyższe pole by móc przesłać formularz.">
            </fieldset>
            <fieldset>
                <input name="email" placeholder="Adres e-mail" type="email" tabindex="2" data-validation="email" data-sanitize="trim" data-sanitize="escape" data-validation-error-msg="Podaj prawidłowy adres e-mail.">
            </fieldset>
            <fieldset>
                <input name="phone" placeholder="Twój numer telefonu" type="tel" tabindex="3" data-sanitize="escape" data-validation="number" data-validation-optional="true" data-validation-error-msg="Podaj prawidłowy numer telefonu">
            </fieldset>
            <fieldset>
                <textarea name="message" placeholder="Wiadmość..." tabindex="5" rows="4" data-validation="required" data-sanitize="trim" data-sanitize="escape" data-validation-error-msg="Uzupełnij powyższe pole by móc przesłać formularz."></textarea>
            </fieldset>
            <p class="recaptcha">
                <input data-validation="recaptcha"  data-validation-recaptcha-sitekey="{{env('RECAPTCHA_KEY')}}" data-validation-error-msg="Potwierdź, że nie jesteś robotem.">
            </p>
            <fieldset>
                <button name="submit" type="submit" class="button blue">Wyślij...</button>
            </fieldset>
        </form>
        <div class="alert" role="alert">
            <strong></strong>
        </div>
    </div>
</section>
<section class="contact__map">
    <div id="map"></div>
</section>
@endsection

@push('afterScripts')
<script>
    function initMap() {
        var acer = {lat: 52.300475, lng: 17.121592};
        var icon = {
            url: "./images/pin_map.png"
        };

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: acer,
            styles:[{"featureType":"water","elementType":"all","stylers":[{"hue":"#7fc8ed"},{"saturation":55},{"lightness":-6},{"visibility":"on"}]},{"featureType":"water","elementType":"labels","stylers":[{"hue":"#7fc8ed"},{"saturation":55},{"lightness":-6},{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"hue":"#83cead"},{"saturation":1},{"lightness":-15},{"visibility":"on"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"hue":"#f3f4f4"},{"saturation":-84},{"lightness":59},{"visibility":"on"}]},{"featureType":"landscape","elementType":"labels","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"on"}]},{"featureType":"road","elementType":"labels","stylers":[{"hue":"#bbbbbb"},{"saturation":-100},{"lightness":26},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"hue":"#ffcc00"},{"saturation":100},{"lightness":-35},{"visibility":"simplified"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"hue":"#ffcc00"},{"saturation":100},{"lightness":-22},{"visibility":"on"}]},{"featureType":"poi.school","elementType":"all","stylers":[{"hue":"#d7e4e4"},{"saturation":-60},{"lightness":23},{"visibility":"on"}]}]
        });
        var marker = new google.maps.Marker({
            position: acer,
            map: map,
            icon: icon
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSDwnq1_eB3d4vXmqz8k_bWHXpgi2RSr8&callback=initMap">
</script>
@endpush
