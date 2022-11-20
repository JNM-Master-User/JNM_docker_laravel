<button {{ $attributes->merge(['id'=>'']) }} class="w-full text-left text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group">
        {{$slot}}
</button>