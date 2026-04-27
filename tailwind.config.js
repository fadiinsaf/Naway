import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                primary: '#C08552',
                accent: '#8C5A3C',
                darkbg: '#4B2E2B',
                soft: '#FFF8F0'
            },
            fontFamily: {
                sans: ['IBM Plex Sans', 'IBM Plex Sans Arabic', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
