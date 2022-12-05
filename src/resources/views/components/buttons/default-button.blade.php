<button {{ $attributes->merge(['type' => 'submit', 'class' => 'focus:outline-none text-white bg-blue-700 hover:bg-blue-600 focus:ring-4 hover:ring hover:ring-blue-300 focus:ring-blue-300 font-bold rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800']) }}>
    {{ $slot }}
</button>
