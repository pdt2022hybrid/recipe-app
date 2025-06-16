<script setup lang="ts">
import RecipeList from '@/Components/RecipeList.vue';
import Layout from '@/Layouts/Layout.vue';
import { Recipe, RecipeCategory } from '@/types/models';
import { usePage } from '@inertiajs/vue3';
import axios from 'axios';
import { InputText } from 'primevue';
import { computed, defineProps, onMounted, ref } from 'vue';

const props = defineProps<{
    recipe_categories: Array<RecipeCategory>;
}>();

const searchValue = ref<string>('');

const selectedCategoryId = ref<string | null>(null);
const selectedCategory = computed(() => {
    return props.recipe_categories.find(
        (category) => category.id === selectedCategoryId.value,
    );
});

interface Result {
    results: Recipe[];
    total: int;
}

console.log(usePage().props.csrf_token);

interface SearchResults {
    selected_category: Result;
    other_categories: Result;
}

const searchResults = ref<SearchResults>();

function selectCategory(categoryId: string) {
    selectedCategoryId.value = categoryId;
}

function search() {
    const currentSearchValue = searchValue.value;

    setTimeout(() => {
        if (!currentSearchValue) {
            return;
        }

        if (currentSearchValue === searchValue.value) {
            axios
                .get(route('api.home.search'), {
                    params: {
                        _token: usePage().props.csrf_token,
                        search: currentSearchValue,
                        recipe_category: {
                            id: selectedCategoryId.value,
                        },
                    },
                })
                .then((response: { data: SearchResults }) => {
                    searchResults.value = response.data;
                });
        }
    }, 300);
}

onMounted(() => {
    selectedCategoryId.value = props.recipe_categories[0].id;
});
</script>

<template>
    <Layout>
        <!--        <section class="hero">-->
        <!--            <div class="text">-->
        <!--                <div class="heading">-->
        <!--                    <h1>-->
        <!--                        <span> Tajné </span>-->
        <!--                        <span class="right"> klenoty </span>-->
        <!--                        <span>od babičky </span>-->
        <!--                    </h1>-->
        <!--                </div>-->
        <!--                <div class="subtext">-->
        <!--                    <span>Grammy, let's cook.</span>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="image">-->
        <!--                <img src="../../assets/hero.svg" alt="hero" />-->
        <!--            </div>-->
        <!--        </section>-->
        <main>
            <div class="topbar">
                <div class="empty-left-corner" />

                <div class="main-topbar-content">
                    <div class="search-wrapper">
                        <InputText
                            class="search-input"
                            placeholder="Vyhľadajte recepty"
                            v-model="searchValue"
                            @update:model-value="search()"
                        />
                    </div>

                    <div class="sort-select-wrapper"></div>
                </div>
            </div>
            <div class="content">
                <div class="categories">
                    <div
                        v-for="category in recipe_categories"
                        :key="category.id"
                        @click="selectCategory(category.id)"
                        :class="{
                            selected: selectedCategoryId === category.id,
                        }"
                        class="category-item"
                    >
                        {{ category.name }}
                    </div>
                </div>
                <div class="main-content">
                    <RecipeList
                        v-if="selectedCategoryId && searchValue == ''"
                        :recipes="selectedCategory.recipes"
                    />
                    <div v-else class="search-results">
                        <h3>Výsledky z vybranej kategórie:</h3>
                        <RecipeList
                            v-if="searchResults?.selected_category?.results"
                            :recipes="searchResults.selected_category.results"
                        />
                        <h3>Výsledky z ostatných kategórií:</h3>
                        <RecipeList
                            v-if="searchResults?.other_categories?.results"
                            :recipes="searchResults.other_categories.results"
                        />
                    </div>
                </div>
            </div>
        </main>
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

main
    background-image: linear-gradient(90deg, var(--primary-color), var(--secondary-color))

    @apply grid grid-cols-1
    @apply gap-4
    @apply px-16

    .topbar
        @apply grid grid-cols-5

        & > div
            @apply px-4

        .empty-left-corner
            @apply col-span-1

        .main-topbar-content
            @apply col-span-4

            .search-wrapper
                @apply col-span-3

                .search-input
                    @apply w-full
                    @apply rounded-3xl
                    @apply text-white
                    @apply border-none
                    @apply placeholder-slate-200
                    @apply px-6

                    background-color: rgba(255, 255, 255, 0.2)

            .sort-select-wrapper
                @apply col-span-1

    .content
        @apply grid grid-cols-5

        .categories
            @apply col-span-1
            @apply text-white

            .category-item
                @apply px-8 py-2
                @apply text-lg
                @apply cursor-pointer

            .selected
                @apply font-bold

        .main-content
            @apply col-span-4

.search-results
    h3
        @apply text-white
        @apply mb-4
</style>
