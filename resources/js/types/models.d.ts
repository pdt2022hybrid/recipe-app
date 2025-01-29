declare module 'models' {
    interface RecipeCategory {
        id: string;
        name: string;
        recipes: Recipe[];
    }

    interface Recipe {
        id: string;
        name: string;
    }
}
