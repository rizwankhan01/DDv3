@component('mail::message')
# Introduction

The body of your message, {{ $var1 }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent