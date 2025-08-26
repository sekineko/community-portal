import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/css/**/*.css",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                mplus: ['"M PLUS Rounded 1c"', 'sans-serif'],
            },
            colors: {
                primary: "var(--color-primary)",
                primary_dark: "var(--color-primary-dark)",
                primary_light: "var(--color-primary-light)",
                secondary: "var(--color-secondary)",
                secondary_dark: "var(--color-secondary-dark)",
                secondary_light: "var(--color-secondary-light)",
                background: "var(--color-background)",
                accent1: "var(--color-accent1)",
                accent2: "var(--color-accent2)",
                highlight: "var(--color-highlight)",
                gray_light: "var(--color-gray-light)",
                gray_dark: "var(--color-gray-dark)",
            },
        },
    },

    plugins: [forms],
};
