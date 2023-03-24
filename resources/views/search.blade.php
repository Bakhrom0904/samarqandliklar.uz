@extends('layouts.site')

@section('title')
    Qidiruv natijalari
@endsection


@section('content')

    <section class="news">
        <div class="container">
            <div class="news__wrapper basic-flex">
                <div class="column-news">
                    <h2 class="news__title">
                        @if(count($posts)>0) {{ $key }} So'zi bo'yicha qidiruv natijalari:{{ count($posts) }}
                        @else
                            {{ $key }} Kalit so'zi bo'yicha natija topilmadi
                        @endif

                    </h2>
                    <ul class="news__list basic-flex">
                        @foreach($posts as $post)
                            <li class="news__item">
                                <a href="#" class="basic-flex news__link">
                                    <div class="news-image-wrapper"><img src="/site/images/posts/{{$post->image}}" alt="Bottom Img"></div>
                                    <div class="news-box basic-flex">
                                        <h4 class="news__title">{{$post['title_'.\App::getLocale()]}}</h4>
                                        <p class="news__description">{!! \Str::limit($post['body_'.\App::getLocale()],100)!!}</p>
                                        <span class="news__date basic-flex">{{$post->created_at->format('H:i / d.M.Y')}}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @include('sections.popularPosts')
            </div>
        </div>
    </section>
@endsection
