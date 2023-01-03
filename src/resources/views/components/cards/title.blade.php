<div class="w-full p-6">
    {{$icon?? ''}}
    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$title?? ''}}</h5>
    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">{{$desc?? ''}}</p>
    {{$slot}}
</div>