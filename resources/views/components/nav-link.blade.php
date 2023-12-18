@props(['active', 'theme' => 'light'])

@php
    // Base classes for styling
    $baseClasses = 'inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out';

    // Classes for active state
    $activeClasses = $active
        ? 'border-indigo-400 focus:border-indigo-700'
        : 'border-transparent hover:border-gray-300 focus:border-gray-300';

    // Set text color based on theme
    $textColorClasses = $theme === 'dark'
        ? 'text-white hover:text-gray-200 focus:text-gray-200'
        : 'text-gray-900 hover:text-gray-700 focus:text-gray-700';

    // Combine all classes
    $classes = $baseClasses . ' ' . $activeClasses . ' ' . $textColorClasses;
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
