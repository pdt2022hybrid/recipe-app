export interface RecipeCategory {
    id: string;
    name: string;
    recipes: Recipe[];
}

export interface Recipe {
    id: string;
    name: string;
}
