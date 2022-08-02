require('./bootstrap');
import { createApp, h } from 'vue';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { library } from '@fortawesome/fontawesome-svg-core';
import { fas } from '@fortawesome/free-solid-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import Vue from 'vue'
import { i18n } from './i18n'
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

InertiaProgress.init({ color: '#4B5563' });
