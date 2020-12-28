const colors = require('tailwindcss/colors');

module.exports = {
    purge: [
        './resources/views/**/*.blade.php',
        './resources/css/**/*.css',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', 'sans-serif'],
            },
            colors: {
                gray: colors.warmGray,
                red: colors.pink,
            },
        },
        screens: {
            sm: '640px',
            md: '768px',
            lg: '1024px',
            xl: '1280px',
        },
    },
    variants: {},
    plugins: [],
}
