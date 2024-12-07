<x-mail::message>
# Verify and login

Verify the login request to your {{ config('app.name') }} account for **{{ $email }}**.

You can use this link only once, and it expires after {{ $expiry }} minutes.

<x-mail::button :url="$url">
    Verify and login
</x-mail::button>

In case you did not request this verification email, you can ignore it.

If the button does not appear [use this link instead]({{ $url }}).

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
