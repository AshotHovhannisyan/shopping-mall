import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from "@vitejs/plugin-vue";

import dotenv from 'dotenv';
dotenv.config();
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue()
    ],
    resolve: {
        alias: {
           vue: "vue/dist/vue.esm-bundler"
        }
    },
    server: {
        proxy: {
            '/api': {
                target: process.env.APP_URL,
                changeOrigin: true,
                secure: false
            }
        }
    }
});
