const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    darkMode: 'class',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './resources/css/safelist.txt' // Used to prevent purging of essential CSS classes
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Roboto', ...defaultTheme.fontFamily.sans],
                inter: ['Inter', ...defaultTheme.fontFamily.sans],
                poppins: ['Poppins', ...defaultTheme.fontFamily.sans],
                material: ['Material Icons', ...defaultTheme.fontFamily.sans],
                materialOutlined: ['Material Icons', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                gray: {
                    '900': '#161c24',
                }
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
