<script setup lang="ts">
import Layout from '@/Layouts/Layout.vue';
import AutoComplete from 'primevue/autocomplete';
import Tab from 'primevue/tab';
import TabList from 'primevue/tablist';
import TabPanel from 'primevue/tabpanel';
import TabPanels from 'primevue/tabpanels';
import Tabs from 'primevue/tabs';

import { RecipeCategory } from 'models';
import { defineProps, onMounted, ref } from 'vue';

const props = defineProps<{
    recipe_categories: Array<RecipeCategory>;
}>();

const selectedCategoryId = ref<string | null>(null);

onMounted(() => {
    selectedCategoryId.value = props.recipe_categories[0].id;
});
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
            <div class="topbar">
                <div class="search-wrapper">
                    <auto-complete />
                </div>

                <div class="sort-select-wrapper"></div>

                <div class="tabs">
                    <Tabs value="0" scrollable>
                        <TabList>
                            <Tab
                                v-for="tab in recipe_categories"
                                :key="tab.id"
                                :value="tab.name"
                            >
                                {{ tab.name }}
                            </Tab>
                        </TabList>
                        <TabPanels>
                            <TabPanel
                                v-for="tab in recipe_categories"
                                :key="tab.id"
                                :value="tab.name"
                            >
                                <p class="m-0">{{ tab.name }}</p>
                            </TabPanel>
                        </TabPanels>
                    </Tabs>
                </div>
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

            &[data-p-severity="primary"]
                @apply bg-primary

    .recipes-main-content
        @apply grid grid-cols-4 auto-rows-min
        @apply gap-8

        .search-wrapper
            @apply col-span-2

        .sort-select-wrapper
            @apply col-span-1

        pre
            @apply col-span-3

        .card
            @apply grid grid-rows-1
            @apply bg-red-200
            @apply rounded-3xl border-black border
            @apply py-2 px-4
            h3
                @apply text-2xl font-bold

        .card.large-col-span
            @apply col-span-2
            grid-template-columns: 40% 60%

        .card.small-col-span
            @apply col-span-1
            grid-template-columns: 40% 60%
</style>
