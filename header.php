<?php
function my_categories($id)
{
    return array_values(get_terms('category', ['parent' => $id]));
}

function is_in_web_portfolio($cat)
{
    $parent = $cat->category_parent;
    if (!$parent) {
        return false;
    } elseif ($parent === 13) {
        // web portfolio category id = 13
        return true;
    } else {
        return is_in_web_portfolio(get_category($parent));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body id="<?php echo is_front_page() ? 'front-page-body' : ''; ?>">
