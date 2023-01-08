import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/welcome.css',
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/js/common.js',
                'resources/js/services/services.js',
                'resources/js/services/index.js',
                'resources/js/services/register.js',
                'resources/js/services/navigation.js',
                'resources/js/services/role.js',
                'resources/js/services/live.js'
            ],
            refresh: true,
        }),
    ],
});
