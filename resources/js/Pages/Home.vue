<script setup lang="ts">
import Layout from '@/Layouts/Layout.vue';
import Button from 'primevue/button';

import { RecipeCategory } from 'models';
import { defineProps, onMounted, ref } from 'vue';

const props = defineProps<{
    recipe_categories: Array<RecipeCategory>;
}>();

const selectedCategoryId = ref<string | null>(null);

onMounted(() => {
    selectedCategoryId.value = props.recipe_categories[0].id;
});

const selected = (categoryId: string) => {
    return selectedCategoryId.value == categoryId;
};

const select = (categoryId: string) => {
    selectedCategoryId.value = categoryId;
};

const selectedCategory = (): undefined | RecipeCategory => {
    return props.recipe_categories.find(
        (category) => category.id == selectedCategoryId.value,
    );
};
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
        <section class="recipes">
            <div class="sidebar">
                <Button
                    v-for="category in props.recipe_categories"
                    v-bind:key="category.id"
                    :severity="selected(category.id) ? 'primary' : 'secondary'"
                    @click="select(category.id)"
                >
                    {{ category.name }}
                </Button>
            </div>
            <pre class="bg-red-300">
                {{ selectedCategory()?.recipes }}
            </pre>
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

.recipes
    background-color: var(--white-color)

    @apply grid grid-rows-1
    grid-template-columns: 20% 80%

    @apply px-4 py-8

    .sidebar
        @apply flex flex-col
        @apply gap-2
        @apply px-4

        button
            @apply rounded-2xl
            @apply shadow-lg
            @apply py-3
</style>
