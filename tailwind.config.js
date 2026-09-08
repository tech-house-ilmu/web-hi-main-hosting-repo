import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    variants: {
        extend: {
            opacity: ["group-hover"],
            visibility: ["group-hover"],
            display: ["group-hover"],
        },
    },
    safelist: ["group-hover:opacity-100", "group-hover:pointer-events-auto"],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary_HI: "#01153e",
                primary_light_HI: "#1746a2",
                secondary_HI: "#ff731d",
                background_HI: "#FFF7E9",
                surface_HI: "#00C897",
                hover_HI: "#ffdd95",
            },
        },
    },
    plugins: [],
    corePlugins: {
        preflight: false,
    },
};