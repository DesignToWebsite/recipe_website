<?php

//if is_enabled is true ===> return true
function is_valid_recipe(array $recipe): bool
{
    if (array_key_exists('is_enabled', $recipe)) {
        $is_enabled = $recipe['is_enabled'];
    } else {
        $is_enabled = false;
    }
    return $is_enabled;
}

//get valid recipes return an array of valid recipes
function get_recipes(array $recipes): array
{
    $valid_recipes = [];

    foreach ($recipes as $recipe) {
        if (is_valid_recipe($recipe)) {
            $valid_recipes[] = $recipe;
        }
    }

    return $valid_recipes;
}

//display the author name + age

function display_author(string $author_email, array $users): string
{
    for ($i = 0; $i < count($users); $i++) {
        $author = $users[$i];
        if ($author['email'] == $author_email) {
            return $author['full_name'] . ' (' . $author['age'] . ')';
        }
    }
    return NULL;
}

function display_user(int $userId, array $users) : string
{
    for ($i = 0; $i < count($users); $i++) {
        $user = $users[$i];
        if ($userId === (int) $user['user_id']) {
            return $user['full_name'] . '(' . $user['age'] . ' ans)';
        }
    }

    return 'Non trouvé.';
}

?>


