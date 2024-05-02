/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.css",
        "vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        screens: {
            sm: "480px",
            md: "768px",
            lg: "976px",
            xl: "1440px",
        },
        extend: {
            colors: {
                bgGrey: "#f0f0f0",
                lightGrey: "rgb(101, 101, 101)",
                darkGrey: "rgb(55 65 81)",
                neonGreen: "rgb(84 177 154)",
                neonGreenLight: "rgb(84 177 154/70%)",
            },
        },
    },

    plugins: [],
};
