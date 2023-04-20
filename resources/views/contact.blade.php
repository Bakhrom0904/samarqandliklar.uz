@extends('layouts.site')

@section('title')
    Biz bilan bog'lanish
@endsection

@section('content')
    <section class="contact-details">
        <div class="container">
            <div class="contact-details__wrapper basic-flex">
                <div class="form__wrapper">
                    <h3 class="form__wrapper-title">@lang('words.Bizga yozing')
                    </h3>
                    {{ session('message') }}
                    <form method="POST" action="{{ route('sendMail') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form__top">
                            <label><input type="text" placeholder="@lang('words.ism')" name="name" required></label>
                            <label><input type="email" placeholder="@lang('words.Elektron pochta')" name="email" ></label>
                            <label><input type="text" placeholder="@lang('words.phone')" name="phone" required></label>
                            <textarea class="contact-tetxarea" placeholder="@lang('words.text')" name="message" required></textarea>
                        </div>
                        <div class="form__bottom">
                            <!-- <input type="file" name="file" id="file" class="inputfile">
                            <label for="file" class="basic-flex">Прикрепить файл</label>
                            <label class="basic-flex verification-code-wrapper">
{{--                                <input type="text" placeholder="Код" required>--}}
{{--                                <span class="verification-code">4 k 7 Z a</span>--}}
{{--                            </label>--}} -->
                            <button type="submit" class="btn send-btn">@lang('words.yuborish')</button>
                        </div>
                    </form>
                </div>
                <div class="business__card">
                    <h3 class="card__title">SAMARQANDLIKLAR</h3>
                    <div class="card__item basic-flex">
                        <span card__item-title>@lang('words.Elektron pochta')</span>
                        <a class="email__link" href="mailto:info@namanganliklar24.uz">info@samarqandliklar.uz</a>
                    </div>
                    <div class="card__item basic-flex">
                        <span card__item-title>@lang('words.Ijtimoiy tarmoqlar')</span>
                        <div class="card__social-items basic-flex">
                            <a href="#" class="social__item"></a>
                            <a href="#" class="social__item"></a>
                            <a href="#" class="social__item"></a>
                        </div>
                    </div>
                    <div class="card__item basic-flex">
                        <span card__item-title>@lang('words.Telegram kanal')</span>
                        <a class="card-join-telegram basic-flex" href="https://t.me/+UvFBjH1FoqNjNWQy" target="_blank">@lang('words.obuna')</a>
                    </div>
                    <div class="card__item basic-flex">
                        <span card__item-title>@lang('words.Mobil ilova')</span>
                        <div class="card__apps-wrapper basic-flex">
                            <a href="#"><img src="/img/googleplay-wh.png" alt="GooglePlay"></a>
                            <a href="#"><img src="/img/appstore-white.png" alt="AppStore"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
