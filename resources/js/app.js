require('./bootstrap');

// Import modules...
import { createApp, h } from 'vue';
import { App, plugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

const el = document.getElementById('app');

InertiaProgress.init();

const app = createApp({
    render: () => h(App, {
        initialPage: JSON.parse(el.dataset.page),
        resolveComponent: name => require(`./Pages/${name}`).default
    })
});
app.config.globalProperties.$route = window.route;
app.provide('$route', window.route);
app.use(plugin).mount(el);



// createInertiaApp({
//     title: (title) => `${title}`,
//     resolve: (name) => require(`./Pages/${name}.vue`),
//     setup({ el, app, props, plugin }) {
//         return createApp({ render: () => h(app, props) })
//             .use(plugin)
//             .mixin({ methods: { route } })
//             .mount(el);
//     },
// });

//InertiaProgress.init({ color: '#4B5563' });
