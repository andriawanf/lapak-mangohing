import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
        "./resources/**/*.js",
    ],

    theme: {
        extend: {
            screens: {
                sm: "480px",
                md: "768px",
                lg: "976px",
                xl: "1440px",
            },
            colors: {
                background: "#F2F2F2",
                primary: "#d43637",
                secondary: "#f9b066",
                tertiary: "#242529",
            },
            fontFamily: {
                poppins: "Poppins, sans-serif",
                superFood: "SuperFood, sans-serif",
            },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],

    plugins: [forms],
};
