<script setup lang="ts">
import Logo from '@/Components/Logo.vue';
import { Link, router, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();

const user = computed(() => page.props.auth.user);

function logout() {
    router.post('/logout');
}
</script>

<template>
    <div class="navbar">
        <Logo />
        <nav class="nav">
            <a>Recepty</a>
            <a>Diskusia</a>
            <a>Blog</a>
        </nav>
        <div class="login-or-user">
            <div v-if="user" class="grid grid-flow-col grid-rows-1 gap-4">
                <div class="pill flex cursor-pointer items-center gap-2">
                    <i class="pi pi-user"></i>
                    <span> {{ user?.name }} </span>
                </div>
                <a
                    class="pill flex cursor-pointer items-center"
                    @click="logout"
                >
                    <i class="pi pi-sign-out"></i>
                </a>
            </div>
            <Link v-else class="pill cursor-pointer" href="/login">Log In</Link>
        </div>
    </div>
</template>

<style scoped lang="sass">
.navbar
    background-image: linear-gradient(90deg, var(--primary-color), var(--secondary-color))

    @apply grid grid-cols-3
    @apply py-4 px-8

    .nav
        @apply flex flex-row justify-around items-center

.login-or-user
    @apply flex flex-row justify-end items-center

    .pill
        @apply bg-white text-black rounded-2xl
        @apply px-4 py-2

.logo
    @apply w-12
</style>
