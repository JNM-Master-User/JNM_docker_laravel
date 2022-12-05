<button {{ $attributes->merge(['type' => 'submit', 'class' => 'focus:outline-none text-white bg-lime-700 hover:bg-lime-600 focus:ring-4 hover:ring hover:ring-lime-300 focus:ring-lime-300 font-bold rounded-lg text-sm px-4 py-2 dark:bg-lime-600 dark:hover:bg-lime-700 dark:focus:ring-lime-800']) }}>
    {{ $slot }}
</button>
