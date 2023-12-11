<x-mail::message>
    # Sua dúvida foi respondida

    {{ $reply->user['name'] }} repondeu sua dúvida

    <x-mail::button :url="route('replies.index', $reply->support_id)">
        Ver
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
