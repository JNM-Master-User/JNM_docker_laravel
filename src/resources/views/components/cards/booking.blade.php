<div class="mb-2 flex flex-col bg-white border rounded-lg shadow-md md:flex-row dark:border-gray-700 dark:bg-gray-800">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{$img?? ''}}" alt="">
    <div class="flex flex-col justify-between p-4 leading-normal w-full">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$name?? ''}}</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$address?? ''}}</p>
        <x-badges.dark-badge text="{{$date?? ''}}" ></x-badges.dark-badge>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$transports?? ''}}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$desc?? ''}}</p>
        {{$slot}}
    </div>
</div>
