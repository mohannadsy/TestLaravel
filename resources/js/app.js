require('./bootstrap');
import { createApp, h } from 'vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { library } from '@fortawesome/fontawesome-svg-core';
import { fas } from '@fortawesome/free-solid-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
// import { createI18n } from 'vue-i18n'
import Vue from 'vue'
import { i18n, loadLocaleMessages, setI18nLanguage } from './i18n'
// import messages from './locales/en.json'
// import message from './locales/ar.json'
library.add(fas, fab);

const appName = window.document.getElementsByTagName('title')[0];

// Import modules...
// import { createApp, h } from 'vue';
// import { App, plugin } from '@inertiajs/inertia-vue3';
// import { InertiaProgress } from '@inertiajs/progress';
import store from './store/index.js';
import style from './../assets/style.css'

// const el = document.getElementById('app');

// InertiaProgress.init();

// const app = createApp({
//     render: () => h(App, {
//         initialPage: JSON.parse(el.dataset.page),
//         resolveComponent: name => require(`./Pages/${name}`).default
//     })
// });
// app.config.globalProperties.$route = window.route;
// app.provide('$route', window.route);
// app.use(plugin).mount(el);
// app.use(store);

// Vue.mixin(require('./base'));


// function loadLocaleMessages() {
//     const locales = require.context('./locales', true, /[A-Za-z0-9-_,\s]+\.json$/i)
//     const messages = {}
//     locales.keys().forEach(key => {
//         const matched = key.match(/([A-Za-z0-9-_]+)\./i)
//         if (matched && matched.length > 1) {
//             const locale = matched[1]
//             messages[locale] = locales(key).default
//         }
//     })
//     return messages
// }




// const messages = {
//     en: {
//         message: {
//             "branchCard": "Branch Card"
//         }
//     },
//     ar: {
//         message: {
//             "branchCard": "بطاقة فرع"
//         }
//     }
// }
// const i18n = createI18n({
//     legacy: false,
//     globalInjection: true,
//     locale: process.env.VUE_APP_I18N_LOCALE || 'en',
//     fallbackLocale: process.env.VUE_APP_I18N_FALLBACK_LOCALE || 'en',
//     messages: { 'en': messages }
// });
// setI18nLanguage(i18n, 'ar')

createInertiaApp({
    title: (title) => `${title}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(store)
            .use(i18n)
            .use(style)
            .component('fa', FontAwesomeIcon)
            .mixin({ methods: { route } }, require('./base'))
            .mount(el);
    },
});
// loadLocaleMessages(i18n, 'ar')
// setI18nLanguage(i18n, 'ar')

InertiaProgress.init({ color: '#4B5563' });
