import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                "resources/css/app.css",
                "resources/js/cetakWarga.js",
                "resources/js/chartSetup.js",
            ],
            refresh: true,
        }),
    ],
});
