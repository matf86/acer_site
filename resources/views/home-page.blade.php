@extends('layout.app')

@section('title')
    <title>{{ $data['title'] }}</title>
@endsection

@section('description')
    <meta name="description" content="{{ $data['meta_description'] }}">
@endsection

@section('content')

<header class="{{$data['header_bg']}}">
    <h1>{{ $data['header'] }}</h1>
    <div class="header__icon">
        <a href="#about"><img class="scroll-down" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAFxSURBVGhD7ZBNSsRAEEYDuhr3HsL7zMILeAwv4SEEj+BGryC4FgQ33kAQEl8y/bmYIab/Kj9YDwp7OtVf1bNxHMdxHOe/0XXdeV/h52y0bXsRjuUQdkW9Uy/UZbg2h3/cnnlf1D3ns3CdByG9xCdBA5xfKXMZRvUS34epAw9UnsyxhLCWYcSxhEiXGZMQVjJEj0mIeJkpCVFbhsgpCTEtEyshaskQFSsh/pYh7OPQF0+pDBGpEgO8uQ0Rp/DxMfQlkSvD01yJlj/7EHMKH3fUc9+cSqoMT0okbkLMODSZy9BqKyFoNpOhZR4JwaPqMnyaV0LwuJoMV8tICEKKZTguKyEIK5F5W4WEIDRbJhUzCUG4uYy5hGCImcxsEoJh1WVmlxAMrSazmIRgeLHM4hKCJbJlViMhWGbHTk/DdpGsTkKwVLTMaiUEy03KrF5CsOSozGYkBMueyGxOQrD0r8xmJUSQuaOuw5XjOI7jOM4kTfMDA4Bs3fBYVxwAAAAASUVORK5CYII="></a>
    </div>
</header>


<section id="about" class="about_us">
        <h2>{{$data['about_us']['header']}}</h2>
        <p>
            {{$data['about_us']['text']}}
        </p>
</section>
<section class="features">
    @foreach($data['features'] as $feature)
        <div class="feature__item scroll-reveal">
            <i class="fa {{$feature['icon']}}" aria-hidden="true"></i>
            <div class="feature__item--text">
                <h2>{{$feature['header']}}</h2>
                <p>
                    {{$feature['text']}}
                </p>
            </div>
        </div>
    @endforeach
</section>
<section class="products">
    <div class="products__header--small" style="background-image:url('{{$data['products']['pape']['image']}}')"></div>
    <div class="products__description scroll-reveal">
        <h2>{{$data['products']['pape']['header']}}</h2>
        <p>
            {{$data['products']['pape']['text']}}
        </p>
        <a href="{{route($data['products']['pape']['link'])}}"><button type="button" class="button blue">Dowiedz się wiecej...</button></a>
    </div>
    <div class="products__image ml-4">
        <img src=".{{$data['products']['pape']['image']}}" alt="{{$data['products']['termo']['image_description']}}">
    </div>
</section>
<section class="products bg">
    <div class="products__header--small" style="background-image:url('{{$data['products']['termo']['image']}}')"></div>
    <div class="products__image mr-4">
        <img src=".{{$data['products']['termo']['image']}}" alt="{{$data['products']['termo']['image_description']}}">
    </div>
    <div class="products__description scroll-reveal">
        <h2>{{$data['products']['termo']['header']}}</h2>
        <p>
            {{$data['products']['termo']['text']}}
        </p>
        <a href="{{route($data['products']['termo']['link'])}}"><button type="button" class="button blue">Dowiedz się wiecej...</button></a>
    </div>
</section>
@endsection

