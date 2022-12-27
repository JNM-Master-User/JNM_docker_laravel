<div class="min-h-screen p-4 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-800 animate__fadeInDown">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md m-6 mr-4 ml-4 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden rounded-2xl">
        {{ $slot }}
    </div>
</div>
