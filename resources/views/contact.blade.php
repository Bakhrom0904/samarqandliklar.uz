@extends('layouts.site')

@section('title')
    Biz bilan bog'lanish
@endsection

@section('content')
    <section class="contact-details">
        <div class="container">
            <div class="contact-details__wrapper basic-flex">
                <div class="form__wrapper">
                    <h3 class="form__wrapper-title">Напишите нам
                    </h3>
                    {{ session('message') }}
                    <form method="POST" action="{{ route('sendMail') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form__top">
                            <label><input type="text" placeholder="Имя" name="name" required></label>
                            <label><input type="email" placeholder="Электронная почта" name="email" ></label>
                            <label><input type="text" placeholder="Номер телефона" name="phone" required></label>
                            <textarea class="contact-tetxarea" placeholder="Текст" name="message" required></textarea>
                        </div>
                        <div class="form__bottom">
                            <input type="file" name="file" id="file" class="inputfile">
                            <label for="file" class="basic-flex">Прикрепить файл</label>
                            <label class="basic-flex verification-code-wrapper">
{{--                                <input type="text" placeholder="Код" required>--}}
{{--                                <span class="verification-code">4 k 7 Z a</span>--}}
{{--                            </label>--}}
                            <button type="submit" class="btn send-btn">Отправить</button>
                        </div>
                    </form>
                </div>
                <div class="business__card">
                    <h3 class="card__title">NAMANGANLIKLAR24</h3>
                    <div class="card__item basic-flex">
                        <span card__item-title>Электронная почта</span>
                        <a class="email__link" href="mailto:info@namanganliklar24.uz">info@namanganliklar24.uz</a>
                    </div>
                    <div class="card__item basic-flex">
                        <span card__item-title>Социальные сети</span>
                        <div class="card__social-items basic-flex">
                            <a href="#" class="social__item"></a>
                            <a href="#" class="social__item"></a>
                            <a href="#" class="social__item"></a>
                        </div>
                    </div>
                    <div class="card__item basic-flex">
                        <span card__item-title>Телеграм канал</span>
                        <a class="card-join-telegram basic-flex" href="#">Подписатся</a>
                    </div>
                    <div class="card__item basic-flex">
                        <span card__item-title>Мобильная приложение</span>
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
