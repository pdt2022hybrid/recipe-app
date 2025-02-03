import forms from '@tailwindcss/forms';
import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: '#ffffff',
                    100: '#ffffff',
                    200: '#ffffff',
                    300: '#ffffff',
                    400: '#ffffff',
                    500: '#ffffff',
                    600: '#cccccc',
                    700: '#cccccc',
                    800: '#cccccc',
                    900: '#999999',
                },
                secondary: {
                    50: '#f3f5fb',
                    100: '#e3e9f6',
                    200: '#cdd9f0',
                    300: '#abc0e5',
                    400: '#829fd8',
                    500: '#6580cc',
                    600: '#5167bf',
                    700: '#4453a8',
                    800: '#3e488f',
                    900: '#363f72',
                    950: '#252846',
                },
                black: 'var(--black-color)',
                white: 'var(--white-color)',
            },
        },
    },

    plugins: [forms],
};
