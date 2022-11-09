<x-mail::message>
    # Introduction

    The body of your message.

    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>

{{--
@component('mail::message')
    # Welcome to the first Newsletter

    Dear {{ $email }},

    We look forward to communicating more with you. For more information visit our blog.

    @component('mail::button', ['url' => 'enter your desired url'])
        Blog
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent --}}
