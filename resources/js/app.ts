import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { definePreset } from '@primevue/themes';
import Aura from '@primevue/themes/aura';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import PrimeVue from 'primevue/config';
import ToastService from 'primevue/toastservice';
import { createApp, DefineComponent, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

const MyPreset = definePreset(Aura, {
    semantic: {
        primary: {
            '50': '#ffffff',
            '100': '#ffffff',
            '200': '#ffffff',
            '300': '#ffffff',
            '400': '#ffffff',
            '500': '#ffffff',
            '600': '#cccccc',
            '700': '#999999',
            '800': '#666666',
            '900': '#333333',
        },
        secondary: {
            50: '#f3f5fb',
            100: '#e3e9f6',
            200: '#cdd9f0',
            300: '#abc0e5',
            400: '#829fd8',
            500: '#6580cc',
            600: '#5167bf',
            700: '#4453a8',
            800: '#3e488f',
            900: '#363f72',
            950: '#252846',
        },
        text: {
            '50': '#000000',
            '100': '#000000',
            '200': '#000000',
            '300': '#000000',
            '400': '#000000',
            '500': '#000000',
            '600': '#000000',
            '700': '#000000',
            '800': '#000000',
            '900': '#000000',
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
                    options: {
                        darkModeSelector: 'none',
                    },
                },
            })
            .use(ToastService)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
