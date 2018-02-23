@extends('layout.app')

@section('title')
    <title>{{ $data['title'] }}</title>
@endsection

@section('description')
    <meta name="description" content="{{ $data['meta_description'] }}">
@endsection

@section('content')

<header class="{{$data['header_bg']}}">
    <h1 class="main_header">{{ $data['header'] }}</h1>
</header>


<section class="about_us">
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

