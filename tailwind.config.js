import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: ["./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php", "./storage/framework/views/*.php", "./resources/views/**/*.blade.php", "./resources/js/**/*.vue"],

    theme: {
        extend: {
            colors: {
                primary: 'var(--color-primary)',
                'primary-hover': 'var(--color-primary-hover)',
                secondary: 'var(--color-secondary)',
                'brand-border': 'var(--color-border)',
                'brand-surface': 'var(--color-bg-surface)',
                'brand-subtle': 'var(--color-bg-subtle)',
                'brand-muted': 'var(--color-text-muted)',
            },
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
                serif: ["Cormorant Garamond", ...defaultTheme.fontFamily.serif],
                mono: ["JetBrains Mono", ...defaultTheme.fontFamily.mono],
            },
        },
    },

    plugins: [forms],
};
