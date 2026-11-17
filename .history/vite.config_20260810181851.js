import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    server: {
        host: true,
        port: 5174,
        strictPort: true,
        cors: true,
        origin: "http://127.0.0.1:5174",
        headers: {
            "Access-Control-Allow-Origin": "*",
            "Access-Control-Allow-Methods":
                "GET,HEAD,PUT,PATCH,POST,DELETE,OPTIONS",
            "Access-Control-Allow-Headers":
                "X-Requested-With, Content-Type, Authorization",
        },
        hmr: {
            host: "127.0.0.1",
            protocol: "ws",
        },
    },
});


//di beritahu nanti about cors dan hmr