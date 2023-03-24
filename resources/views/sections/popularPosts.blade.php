<div class="popular-news">
    <div class="popular-news-wrapper">
        <h4 class="popular-news__title">Cамые популярные новости</h4>
        <ul class="popular-news__list">
            @foreach($popularPosts as $popularPost)
                <li class="popular-news__item">
                    <a href="{{route('postDetail',$popularPost->slug)}}">
                        <p class="popular-news__description">{{$popularPost['title_'.\App::getLocale()]}}</p>
                        <span class="popular-news__date">{{$popularPost->created_at->format('H:i / d.M.Y')}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="ads-placeholder">
        <h4>ADS PLACEHOLDER</h4>
    </div>
</div>
