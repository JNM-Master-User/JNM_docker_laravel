<button {{ $attributes->merge(['type' => 'submit', 'class' => 'focus:outline-none text-white bg-red-700 hover:bg-red-600 focus:ring-4 hover:ring hover:ring-red-300 focus:ring-red-300 font-bold rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800']) }}>
    {{ $slot }}
</button>