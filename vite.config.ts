import { defineConfig } from "vite";
import { watch } from "vite-plugin-watch";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import eslintPlugin from "vite-plugin-eslint";
import autoimport from "unplugin-auto-import/vite";
import components from "unplugin-vue-components/vite";

export default defineConfig(({ ssrBuild }) => {
  return {
    resolve: {
      alias: {
        "@": "/resources",
        "~": "/node_modules",
      },
    },
    plugins: [
      laravel({
        input: "resources/scripts/app.ts",
        ssr: "resources/scripts/ssr.ts",
        refresh: true,
      }),
      vue({
        template: {
          transformAssetUrls: {
            base: null,
            includeAbsolute: false,
          },
        },
      }),
      eslintPlugin(),
      autoimport({
        vueTemplate: true,
        dts: "resources/scripts/types/auto-imports.d.ts",
        dirs: ["resources/scripts/composables", "resources/scripts/utils"],
        imports: [
          "vue",
          "@vueuse/core",
          {
            "momentum-lock": ["can"],
          },
          {
            "momentum-trail": ["route", "current"],
          },
          {
            "@inertiajs/vue3": ["router", "useForm", "usePage", "useRemember"],
          },
        ],
      }),
      components({
        dirs: ["resources/views/components"],
        dts: "resources/scripts/types/components.d.ts",
        resolvers: [
          // inertia components
          (name: string) => {
            const components = ["Link", "Head"];

            if (components.includes(name)) {
              return {
                name: name,
                from: "@inertiajs/vue3",
              };
            }
          },

          // layouts
          (name: string) => {
            if (name.startsWith("Layout")) {
              const componentName = name.substring("Layout".length).toLowerCase();

              return {
                name: "default",
                from: `@/views/layouts/${componentName}/layout-${componentName}.vue`,
              };
            }
          },
        ],
      }),
      watch({
        pattern: "app/{Data,Enums}/**/*.php",
        command: "php artisan typescript:transform",
        onInit: !ssrBuild,
      }),
      watch({
        pattern: "routes/*.php",
        command: "php artisan trail:generate",
        onInit: !ssrBuild,
      }),
    ],
  };
});
