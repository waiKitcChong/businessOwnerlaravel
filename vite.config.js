import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
                    'resources/css/header.css',
                    'resources/js/app.js',
                    'resources/css/login.css',
                    'resources/css/navigation.css',
                    'resources/css/page/index.css'
                ],
            refresh: true,
        }),
    ],
});
