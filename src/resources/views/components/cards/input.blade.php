<div {{ $attributes->merge(['type' => 'submit', 'class' => 'md:pt-6 md:px-6'])}}>
    <x-cards.card>
        <div class="p-4">
            {{$slot}}
        </div>
    </x-cards.card>
</div>