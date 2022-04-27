<?php

function category_ids($category)
{
    return $category->term_id;
}

function navigation_recusive($cats)
{
    ?>
    <ul>
    <?php foreach ($cats as $cat): ?>
    <li>
        <a href="<?php echo get_category_link(
            $cat
        ); ?>"><?php echo $cat->name; ?></a>
        <?php navigation_recusive(my_categories($cat->term_id)); ?>
    </li>
    <?php endforeach; ?>
    </ul>
    <?php
}
?>

<div id="toggler">
    <div id="hamburger" onclick="toggleNavigation()">
        ☰
    </div>
    <section class="search-bar-container">
        <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
    </section>
</div>
<nav id="responsive-nav-menu">
    <h2><?php echo wp_get_nav_menu_name('navigation_menu'); ?></h2>
    <ul>
        <?php wp_nav_menu(['theme_location' => 'navigation_menu']); ?>
        <li>
            <a href="<?php echo get_post_type_archive_link('post'); ?>">Blog</a>
            <?php navigation_recusive(my_categories(0)); ?>
        </li>
    </ul>
    <?php dynamic_sidebar("email-subscribe-widget"); ?>
</nav>
