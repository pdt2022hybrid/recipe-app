import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { definePreset } from '@primevue/themes';
import Aura from '@primevue/themes/aura';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import PrimeVue from 'primevue/config';
import { createApp, DefineComponent, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

const MyPreset = definePreset(Aura, {
    semantic: {
        primary: {
            50: 'var(--primary-color)',
            100: 'var(--primary-color)',
            200: 'var(--primary-color)',
            300: 'var(--primary-color)',
            400: 'var(--primary-color)',
            500: 'var(--primary-color)',
            600: 'var(--primary-color)',
            700: 'var(--primary-color)',
            800: 'var(--primary-color)',
            900: 'var(--primary-color)',
            950: 'var(--primary-color)',
        },
    },
});

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob<DefineComponent>('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(PrimeVue, {
                theme: {
                    preset: MyPreset,
                },
            })
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
