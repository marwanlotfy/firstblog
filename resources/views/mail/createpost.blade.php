@component('mail::message')
New post created by



@component('mail::button', ['url' => 'url(/post)'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
