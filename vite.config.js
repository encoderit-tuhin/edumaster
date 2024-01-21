import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react";

export default defineConfig({
  plugins: [
    laravel({
      input: "resources/js/index.tsx",
      //   ssr: "resources/js/ssr.js",
      refresh: ["resources/js/**"],
    }),
    react(),
  ],
});
