@component('mail::message')
# Новая бронь стола

Добрый день, поступил запрос от клиента на бронирование стола.

Контактные данные клиента

<ul>
    <li>Имя: {{$feedback->name}}</li>
    <li>Телефон: {{$feedback->phone}}</li>
</ul>

{{--@component('mail::button', ['url' => ''])
Button Text
@endcomponent--}}

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
