<div {{ $attributes->merge(['type' => 'submit', 'class' => 'md:pt-6 md:px-6'])}}>
    <x-cards.card>
        {{$slot}}
    </x-cards.card>
</div>