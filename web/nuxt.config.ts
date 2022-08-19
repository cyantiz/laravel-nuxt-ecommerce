import { defineNuxtConfig } from 'nuxt';
import Components from 'unplugin-vue-components/vite';
import { AntDesignVueResolver } from 'unplugin-vue-components/resolvers';

export default defineNuxtConfig({
    css: ['ant-design-vue/dist/antd.css'],
    vite: {
        plugins: [
            Components({
                resolvers: [AntDesignVueResolver()],
            }),
        ],
        ssr: {
            noExternal: ['moment', 'compute-scroll-into-view', 'ant-design-vue'],
        },
    },
    modules: ['@nuxtjs/tailwindcss'],
    tailwindcss: {
        // Options
    }

});