import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                "resources/js/jquery-3.4.1.min.js",
                "resources/js/popper.min.js",
                "resources/js/bootstrap.js",
                "resources/js/custom.js",
                "resources/css/bootstrap.css" ,
                "resources/css/font-awesome.min.css",
                "resources/css/style.css",
                "resources/css/responsive.css"
            ],
            refresh: [
                ...refreshPaths,
                'app/Livewire/**',
            ],
        }),
    ],
});
