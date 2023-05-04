<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - SAMARQANDLIKLAR</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
<div class="menu-mask"></div>
<main>
    <header class="main-header">
        <div class="container">
            <div class="basic-flex header__top">
                <a href="/" class="logo">
                    <img src="/img/logo5.jpg" alt="Samarqandliklar">
                </a>
                <div class="currencies basic-flex">
                    <div class="currency"><span>$</span><span>{{ $kursData['usd'] }}</span></div>
                    <div class="currency"><span>P</span><span>{{ $kursData['rub'] }}</span></div>
                    <div class="currency"><span>E</span><span>{{ $kursData['euro'] }}</span></div>
                </div>
                <div class="header__actions basic-flex">
                    <form method="GET" action="{{route('search')}}" class="search-form basic-flex">
                        <input type="search" name="key" class="search-input">
                        <button type="submit" class="btn search-btn"></button>
                    </form>
                    <div class="languages">
                        @if(\App::getLocale()=='ru')
                            <a href="#" class="btn language__option language__option--active">РУ</a>
                            <div class="languages__list">
                                <a href="/lang/uz" class="btn language__option language__option--uz" data-status="disabled">UZ</a>
                            </div>
                            @else
                                <a href="#" class="btn language__option language__option--uz">UZ</a>
                        <div class="languages__list">
                            <a href="/lang/ru" class="btn language__option language__option--active" data-status="disabled">РУ</a>
                        </div>
                        @endif
                    </div>
                    <div class="telegram-join basic-flex">
                        <a href="https://t.me/+UvFBjH1FoqNjNWQy" target="_blank"><img src="/img/tg.png" alt="Telegram">@lang('words.obuna')</a>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-menu"><span class="hamburger"></span></button>
            <nav class="navbar">
                <div class="currencies-responsive basic-flex">
                    <div class="currency"><span>$</span><span>{{ $kursData['usd'] }}</span></div>
                    <div class="currency"><span>P</span><span>{{ $kursData['rub'] }}</span></div>
                    <div class="currency"><span>E</span><span>{{ $kursData['euro'] }}</span></div>
                </div>
                <ul class="navbar__menu basic-flex">
                    @foreach($categories as $category)
                        <li class="menu__item"><a href="{{route('categoryPosts',$category->slug)}}">{{$category['name_'.\App::getLocale()]}}</a></li>
                    @endforeach
                        <li class="menu__item"><a href="{{route('contact')}}">@lang('words.contact') @endlang</a></li>
                </ul>
            </nav>
            <div class="advertisement-box">
                <h4>@lang('words.reklama')</h4>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="covid-block basic-flex ">
            <div class="covid-block__title basic-flex">
                <a href="#" class="covid-title__text">@lang('words.statistika')</a>
            </div>
                <div class="stats__item basic-flex">
                    <div class="stats-text-box">
                        <h4>@lang('words.Population')</h4>
                        <p>4177015</p>
                    </div>
                </div>
                <div class="stats__item basic-flex">
                    <div class="stats-text-box">
                        <h4>@lang('words.subdistricts')</h4>
                        <p>14</p>
                    </div>
                </div>
                <div class="stats__item basic-flex">
                    <div class="stats-text-box">
                        <h4>@lang('words.Towns')</h4>
                        <p>2</p>
                    </div>
                </div>
        </div>
    </div>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="footer__top basic-flex">
                <a href="/" class="footer_logo"><img src="/img/logo5.jpg" alt="Samarqandliklar"></a>
                <div class="join-telegram-wrapper basic-flex">
                    <p>@lang('words.telegram') @endlang</p>
                    <a href="https://t.me/+UvFBjH1FoqNjNWQy" class="join-telegram" target="_blank">@lang('words.obuna') @endlang</a>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="about-site">
                    <h4>@lang('words.Foydalanish huquqlari')</h4>
                    <p>@lang('words.footer')</p>
                </div>
                <ul class="footer-menu">
                    <li class="footer-menu__item"><a href="/" class="footer-menu__link">@lang('words.Sayt haqida')</a></li>
                    <li class="footer-menu__item"><a href="/" class="footer-menu__link">@lang('words.Bizga yozing')</a></li>
                    <li class="footer-menu__item"><a href="/" class="footer-menu__link">@lang('words.Reklama')</a></li>
                    <li class="footer-menu__item"><a href="/" class="footer-menu__link">@lang('words.Xabar yuborish')</a></li>
                </ul>
                <ul class="footer-menu">
                    <li class="footer-menu__item"><a href="/" class="footer-menu__link">@lang('words.Malumotlardan foydalanish')</a></li>
                    <li class="footer-menu__item"><a href="/" class="footer-menu__link">@lang('words.Bizning jamoa')</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <script src="{{asset('js/main.js')}}"></script>

</body>
</html>
