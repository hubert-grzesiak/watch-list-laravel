import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/wireui.php/wireui.php/resources/**/*.blade.php',
        './vendor/wireui.php/wireui.php/ts/**/*.ts',
        './vendor/wireui.php/wireui.php/src/View/**/*.php'
    ],

    theme: {
        extend: {
            textShadow: {
                'custom': '-webkit-text-stroke: 3px black;',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'text': '#1a1417',
                'background': '#ffffff',
                'primary': '#fce7d3',
                'secondary': '#551E19',
                'accent': '#C56E33',
            },

        },
    },
    variants: {
        extend: {
            textShadow: ['responsive', 'hover', 'focus'],
        },
    },

    plugins: [forms, typography, require('tailwindcss-textshadow')],
};
