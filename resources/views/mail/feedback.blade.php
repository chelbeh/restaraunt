@component('mail::message')
# Новый бронь стола

Добрый день, поступил запрос от клиента на бронирование стола.

Контактные данные

<ul>
    <li>Имя: {{$feedback->name}}</li>
    <li>Имя: {{$feedback->phone}}</li>
</ul>

{{--@component('mail::button', ['url' => ''])
Button Text
@endcomponent--}}

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
