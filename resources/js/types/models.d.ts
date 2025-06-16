export interface RecipeCategory {
    id: string;
    name: string;
    recipes: Recipe[];
}

export interface Recipe {
    id: string;
    name: string;
    description: string;
    epilogue: string;
    prep_time: number;
    portions: number;
    created_at: string;
    category?: RecipeCategory;
    steps?: RecipeStep[];
    ingredients?: RecipeIngredient[];
    tags?: Tag[];
}

export interface RecipeStep {
    id: string;
    recipe_id: string;
    step_number: number;
    title: string;
    text: string;
}

export interface RecipeIngredient {
    id: string;
    recipe_id: string;
    ingredient_id: string;
    amount: string;
    unit: string;
    description: string;
    ingredient: Ingredient;
}

export interface Ingredient {
    id: string;
    name: string;
}

export interface Tag {
    id: string;
    name: string;
}
