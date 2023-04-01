<section class="news">
    <div class="container">
        <div class="news__wrapper basic-flex">
            <div class="column-news">
                <h2 class="news__title">Последние новости</h2>
                <ul class="news__list basic-flex">
                    @foreach($latestPosts as $latest)
                        <li class="news__item">
                            <a href="{{route('postDetail',$latest->slug)}}" class="basic-flex news__link">
                                <div class="news-image-wrapper"><img src="img/bottom1.png" alt="Bottom Img"></div>
                                <div class="news-box basic-flex">
                                    <h4 class="news__title">{{$latest['title_'.\App::getLocale()]}}</h4>
                                    <p class="news__description">
                                        {!! \Str::limit($latest['body_'.\App::getLocale()],100) !!}
                                    </p>
                                    <span class="news__date basic-flex">{{$latest->created_at->format('H:i')}} / {{$latest->created_at->format('d.M.Y')}}</span>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <button type="button" class="btn load-more-btn">Больше новостей</button>
            </div>
          @include('sections.popularPosts')
        </div>
    </div>
</section>

<div class="apps-block container basic-flex">
{{--    <div class="apps-block__image"></div>--}}
    <div class="apps-block__content">
        <h4>Всегда будьте в курсе последних новостей!</h4>
        <p>Установите мобильное приложение Samarqandliklar и все новости в вашем кармане!</p>
    </div>
    <div class="apps-block__links basic-flex">
        <div class="links__item">
            <a href="#"><img src="img/googleplay.png" alt="googleplay"></a>
        </div>
        <div class="links__item">
            <a href="#"><img src="img/appstore.png" alt="googleplay"></a>
        </div>
    </div>
</div>

</main>
