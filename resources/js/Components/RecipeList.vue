<template>
    <div class="recipes-list">
        <Link
            v-for="recipe in props.recipes"
            :key="recipe.id"
            :href="route('recipes.show', { recipe_id: recipe.id })"
            class="recipe-card"
        >
            <img
                src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fuploads-ssl.webflow.com%2F59b1bc5d0e82760001d16ff7%2F5c789f924948aa6eba835a86_AdobeStock_199761028-2.jpg&f=1&nofb=1&ipt=34db3473c9d615335ec54f5ee2717ea87188acf2017af06875ec68ae43a63525"
            />
            <h3>{{ recipe.name }}</h3>
            <div class="extra-data">
                <div class="portions">
                    <span class="label">Porcie</span>
                    <span class="value">{{ recipe.portions || '-' }}</span>
                </div>
                <div class="time">
                    <span class="label">Čas</span>
                    <span class="value">{{ recipe.prep_time ? `${recipe.prep_time}m` : '-' }}</span>
                </div>
            </div>
        </Link>
    </div>
</template>

<script setup lang="ts">
import { Recipe } from '@/types/models';
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps<{
    recipes: Array<Recipe>;
}>();
</script>

<style scoped lang="sass">
.recipes-list
    @apply grid grid-cols-3 gap-4

    .recipe-card
        @apply flex flex-col gap-2
        @apply bg-white
        @apply px-6 py-4
        @apply transition-all duration-200
        @apply no-underline
        @apply text-inherit

        &:hover
            @apply shadow-lg
            @apply scale-105
            @apply -translate-y-1

        h3
            @apply text-lg font-bold
            @apply px-2

        .extra-data
            @apply grid grid-cols-2
            @apply px-6

            & > div
                @apply col-span-1
                @apply flex flex-col
                @apply px-6

                .value
                    @apply font-bold

            > div:first-child
                @apply border-r border-black
                @apply text-right
</style>
