<script setup lang="ts">
import Logo from '@/Components/Logo.vue';
</script>

<template>
    <div class="navbar">
        <Logo />
        <nav class="nav">
            <a>Recepty</a>
            <a>Diskusia</a>
            <a>Blog</a>
        </nav>
        <div class="login">
            <button>Log In</button>
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

.login
    @apply flex flex-row justify-end items-center
</style>
