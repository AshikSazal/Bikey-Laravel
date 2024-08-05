import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/chat.css",
                "resources/css/header.css",
                "resources/css/input.css",
                "resources/css/landing-page.css",
                "resources/js/app.js",
                "resources/js/chat.js",
            ],
            refresh: true,
        }),
    ],
});
