import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/catalog.css',
                'resources/js/app.js',
                'resources/js/catalog.js',
                'resources/js/seller-dashboard.js',
                'resources/css/seller-dashboard.css'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
