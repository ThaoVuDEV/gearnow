import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import tailwindcss from "@tailwindcss/vite";
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/js/app.js", "resources/css/app.css"],
            refresh: true,
        }),
        vue(),
        tailwindcss(),
    ],

    resolve: {
        alias: {
            "@": path.resolve(__dirname, "resources/js"),
            "ziggy-js": "/vendor/tightenco/ziggy",
        },
    },

    build: {
        sourcemap: false, // 💡 tắt map cho nhanh
        minify: "esbuild", // 💡 dùng esbuild nén nhanh hơn 5–10 lần
        chunkSizeWarningLimit: 1600, // 💡 tránh cảnh báo chunk quá lớn
        rollupOptions: {
            output: {
                manualChunks: undefined, // 💡 gộp file tránh tách nhiều chunk nhỏ
            },
        },
    },

    server: {
        host: "0.0.0.0",
        port: 5173,
        strictPort: true,
        hmr: {
            host: "localhost",
            overlay: false,
        },
    },
});
