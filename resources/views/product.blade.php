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
</header>

<section class="product">
    <div class="product__description">
        <p>{{ $data['description'] }}</p>
    </div>
    <div class="product__usage">
        <h2>{{ $data['usage_header'] }}</h2>
        <div class="product__usage--cards scroll-reveal">
            @foreach($data['usages'] as $usage)
            <div class="card">
                <img src="{{ $usage['icon'] }}">
                <p>{{ $usage['text'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
    <div class="product__gallery">
        <h2>{{ $data['gallery']['header'] }}</h2>
        <div class="product__gallery--images scroll-reveal">
            @foreach($data['gallery']['images'] as $image)
            <div class="product__gallery--image">
                <a href="{{$image[0]}}"  data-lightbox="gallery">
                    <img class="thumbnail" src="{{$image[0]}}" alt="{{$image[1]}}">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

