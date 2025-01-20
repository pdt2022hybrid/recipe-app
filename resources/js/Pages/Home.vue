<script setup lang="ts">
import Layout from '@/Layouts/Layout.vue';
</script>

<template>
    <Layout>
        <section class="hero">
            <div class="text">
                <div class="heading">
                    <h1>
                        <span> Tajné </span>
                        <span class="right"> klenoty </span>
                        <span>od babičky </span>
                    </h1>
                </div>
                <div class="subtext">
                    <span>Grammy, let’s cook.</span>
                </div>
            </div>
            <div class="image">
                <img src="../../assets/hero.svg" alt="hero" />
            </div>
        </section>
    </Layout>
</template>

<style scoped lang="sass">
.hero
    background-image: linear-gradient(90deg, var(--primary-color), var(--secondary-color))

    div.text
        @apply py-24 px-20
        @apply h-fit
        @apply grid grid-rows-1 gap-2
        grid-template-columns: 70% 30%

        .heading
            span
                @apply block

            span.right
                @apply text-right

        .subtext
            @apply flex flex-col items-start justify-start

    h1
        @apply text-6xl font-bold

    @apply grid grid-cols-2 items-center
    @apply py-2
</style>
