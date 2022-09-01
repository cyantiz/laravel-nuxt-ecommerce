export default {
  // Disable server-side rendering: https://go.nuxtjs.dev/ssr-mode
  ssr: true,

  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: 'web',
    htmlAttrs: {
      lang: 'en',
    },
    meta: [{
      charset: 'utf-8'
    },
    {
      name: 'viewport',
      content: 'width=device-width, initial-scale=1'
    },
    {
      hid: 'description',
      name: 'description',
      content: ''
    },
    {
      name: 'format-detection',
      content: 'telephone=no'
    },
    ],
    link: [{
      rel: 'icon',
      type: 'image/x-icon',
      href: '/favicon.ico'
    }],
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: ['@/assets/less/antd-tailwind-custom.less'],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    // '@/plugins/antd-ui',
    '@/plugins/axios'],

  /* 
   * Router settings
   */
  router: {
    middleware: ['auth'],
  },

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [
    // https://go.nuxtjs.dev/eslint
    '@nuxtjs/eslint-module',
  ],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/axios
    '@nuxtjs/axios',
    '@nuxtjs/tailwindcss'
  ],

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    // Workaround to avoid enforcing hard-coded localhost:3000: https://github.com/nuxt-community/axios-module/issues/308
    // baseURL: 'http://localhost:8000/api/',
    // -> config in @/plugins/axios.js
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {
    //   extend(config, {
    //     isDev,
    //     isClient
    //   }) {
    //     if (isDev && isClient) {
    //       config.module.rules.push({
    //         test: /\.less$/,
    //         loader: "less-loader",
    //         options: {
    //           lessOptions: {
    //             javascriptEnabled: true,
    //             "modifyVars": {
    //               "primary-color": "#7FB77E",
    //             }
    //           }
    //         }
    //       })
    //     }
    //   },
    loaders: {
      less: {
        lessOptions: {
          javascriptEnabled: true
        }
      }
    },
    extend(config, ctx) { }, // blah blah
    analyze: true, // Remove this mode before deployment
    babel: {
      plugins: [
        [
          "import",
          {
            libraryName: "ant-design-vue",
            // libraryDirectory: "es",
            // style: "less"
          },
        ]
      ]
    }
  },
  server: {
    host: '0.0.0.0',
  },

  env: {
    apiBaseUrl: process.env.API_BASE_URL || 'http://localhost:8000/api/'
  }

}
