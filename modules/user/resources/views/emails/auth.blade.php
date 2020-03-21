@component('mail::message')
# Hello

{{ $body }}

@isset($args['btn_link'])
@component('mail::button', ['url' => $args['btn_link']])
    {{ $args['btn_name'] ?? trans('user::email.btn.name') }}
@endcomponent
@endisset

Regards!,

@isset($args['subcopy'])
@component('mail::subcopy')
    {!! $args['subcopy'] !!}
@endcomponent
@endisset
@endcomponent