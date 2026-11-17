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
        host: "127.0.0.1",
        port: 5174, // ganti sesuai kebutuhan, misal 5174, 5175, dll
        strictPort: true, // supaya error kalau port sudah dipakai
        cors: true,
        origin: "http://127.0.0.1:5174",
    },
});
