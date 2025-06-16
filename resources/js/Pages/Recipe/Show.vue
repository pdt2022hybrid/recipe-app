<script setup lang="ts">
import Layout from '@/Layouts/Layout.vue';
import { Recipe, RecipeCategory, RecipeStep, RecipeIngredient, Tag } from '@/types/models';
import { defineProps } from 'vue';

interface RecipeWithRelations extends Recipe {
    category: RecipeCategory;
    steps: RecipeStep[];
    ingredients: RecipeIngredient[];
    tags: Tag[];
}

const props = defineProps<{
    recipe: RecipeWithRelations;
}>();

console.log(props);

</script>

<template>
    <Layout>
        <main>
            <div class="recipe-container">
                <div class="recipe-image">
                    <img
                        src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fuploads-ssl.webflow.com%2F59b1bc5d0e82760001d16ff7%2F5c789f924948aa6eba835a86_AdobeStock_199761028-2.jpg&f=1&nofb=1&ipt=34db3473c9d615335ec54f5ee2717ea87188acf2017af06875ec68ae43a63525"
                        alt="Recipe Image"
                    />
                </div>
                
                <header>
                    <div class="recipe-header">
                        <h1>{{ recipe.name }}</h1>
                        <div class="recipe-meta">
                            <div class="meta-item">
                                <span class="label">Kategória:</span>
                                <span class="value">{{ recipe.category.name }}</span>
                            </div>
                            <div class="meta-item">
                                <span class="label">Čas prípravy:</span>
                                <span class="value">{{ recipe.prep_time }} minút</span>
                            </div>
                            <div class="meta-item">
                                <span class="label">Porcie:</span>
                                <span class="value">{{ recipe.portions }}</span>
                            </div>
                        </div>
                        <div class="tags" v-if="recipe.tags.length > 0">
                            <span v-for="tag in recipe.tags" :key="tag.id" class="tag">
                                {{ tag.name }}
                            </span>
                        </div>
                    </div>
                </header>

                <section class="recipe-description" v-if="recipe.description">
                    <h2>Popis</h2>
                    <p>{{ recipe.description }}</p>
                </section>

                <section class="recipe-ingredients">
                    <h2>Ingrediencie</h2>
                    <ul>
                        <li v-for="ingredient in recipe.ingredients" :key="ingredient.id">
                            <span class="amount">{{ ingredient.amount }} {{ ingredient.unit }}</span>
                            <span class="ingredient-name">{{ ingredient.ingredient.name }}</span>
                            <span v-if="ingredient.description" class="description">
                                ({{ ingredient.description }})
                            </span>
                        </li>
                    </ul>
                </section>

                <section class="recipe-steps">
                    <h2>Postup</h2>
                    <div class="steps">
                        <div v-for="step in recipe.steps" :key="step.id" class="step">
                            <h3>Krok {{ step.step_number }}: {{ step.title }}</h3>
                            <p>{{ step.text }}</p>
                        </div>
                    </div>
                </section>

                <section class="recipe-epilogue" v-if="recipe.epilogue">
                    <h2>Poznámky</h2>
                    <p>{{ recipe.epilogue }}</p>
                </section>
            </div>
        </main>
    </Layout>
</template>

<style scoped lang="sass">
main
    @apply px-16 py-8
    background-image: linear-gradient(90deg, var(--primary-color), var(--secondary-color))

.recipe-container
    @apply bg-white
    @apply rounded-lg
    @apply p-8
    @apply max-w-4xl
    @apply mx-auto
    @apply shadow-lg

    .recipe-image
        @apply mb-8
        @apply -mx-8
        @apply -mt-8
        @apply overflow-hidden

        img
            @apply w-full
            @apply h-[300px]
            @apply object-cover
            @apply rounded-t-lg

    header
        @apply mb-8
        @apply border-b
        @apply pb-4

        h1
            @apply text-4xl
            @apply font-bold
            @apply mb-4

    .recipe-meta
        @apply flex
        @apply gap-6
        @apply mb-4

        .meta-item
            @apply flex
            @apply gap-2
            @apply items-center

            .label
                @apply font-semibold
                @apply text-gray-600

            .value
                @apply text-gray-900

    .tags
        @apply flex
        @apply flex-wrap
        @apply gap-2

        .tag
            @apply bg-gray-100
            @apply px-3
            @apply py-1
            @apply rounded-full
            @apply text-sm
            @apply text-gray-700

    section
        @apply mb-8

        h2
            @apply text-2xl
            @apply font-bold
            @apply mb-4

    .recipe-ingredients
        ul
            @apply space-y-2

            li
                @apply flex
                @apply gap-2
                @apply items-baseline

                .amount
                    @apply font-medium
                    @apply text-gray-700

                .ingredient-name
                    @apply font-semibold

                .description
                    @apply text-gray-600
                    @apply text-sm

    .recipe-steps
        .steps
            @apply space-y-6

            .step
                @apply bg-gray-50
                @apply p-4
                @apply rounded-lg

                h3
                    @apply text-xl
                    @apply font-semibold
                    @apply mb-2

                p
                    @apply text-gray-700
                    @apply leading-relaxed
</style>
