<button {{ $attributes->merge(['id'=>'', "class"=>"group p-1 mb-1 w-full text-left text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center group dark:text-white dark:hover:bg-gray-600 transition duration-300 ease-in-out"]) }}>
    <div class="w-9 inline-block h-4 rounded-xl bg-gray-200 dark:bg-gray-500 group-hover:scale-y-125 group-hover:bg-gray-400" style="transition: transform 0.3s ease 0.1s, background-color 0.3s ease; margin-right: 9px; width: 9px;"></div>
    {{$slot}}
</button>