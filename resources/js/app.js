require('./bootstrap');
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

const appName = window.document.getElementsByTagName('title')[0];

// Import modules...
// import { createApp, h } from 'vue';
// import { App, plugin } from '@inertiajs/inertia-vue3';
// import { InertiaProgress } from '@inertiajs/progress';
import store from './store/index.js';

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



createInertiaApp({
    title: (title) => `${title}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(store)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });