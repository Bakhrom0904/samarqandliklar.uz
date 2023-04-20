<section class="posts">
    <div class="container">
        <ul class="posts__list basic-flex">
            @foreach($specialPosts as $post)
                <li class="posts__item">
                    <a href="{{route('postDetail',$post->slug)}}">
                        <img src="/site/images/posts/{{$post->image}}" alt="Image" class="posts__img">
                        <h2 class="posts__title">{{$post['title_'.\App::getLocale()]}}</h2>
                        <span class="posts__date">{{$post->created_at->format('H:i')}} / {{$post->created_at->format('d.m.Y')}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</section>

<div class="container">
    <div class="notification basic-flex">
        <div class="notification__text basic-flex">
            <h3>@lang('words.Bildirishnoma') @endlang</h3>
        </div>
        <button type="button" class="notification__button btn">
            @lang('words.Bildirishnoma yoqish')
        </button>
    </div>
</div>
