<script setup lang="ts">
import Logo from '@/Components/Logo.vue';
</script>

<template>
    <footer>
        <div class="brand">
            <div></div>
            <div class="logo">
                <Logo />
            </div>
            <div class="social"></div>
        </div>
        <div class="links">
            <div>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
            </div>
            <div>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
                <a> Lorem Ipsum</a>
            </div>
        </div>
    </footer>
</template>

<style scoped lang="sass">
footer
    background-image: linear-gradient(90deg, var(--primary-color), var(--secondary-color))

    @apply grid grid-cols-1 gap-4
    @apply py-8 px-8

    div.brand
        @apply grid grid-rows-1
        grid-template-columns: 25% 50% 25%

        div.logo
            @apply flex justify-center

    div.links
        @apply grid grid-rows-1 grid-cols-2 px-64

        div
            @apply grid grid-cols-1 text-center
</style>
