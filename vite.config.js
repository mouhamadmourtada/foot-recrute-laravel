import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/base.js',
                'resources/css/mdTest.css',
                'resources/css/accueil_alternative.css',
            ],
            refresh: true,
        }),
    ],
});
