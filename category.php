<?php
get_header();
$category = get_queried_object();
get_template_part("templates/template", "custom-header-image");
?>
<div class="with-sidebar">
    <section id="content">
        <header id="custom-header">
            <div id="custom-header-container">
                <?php get_template_part(
                    "templates/template",
                    "parent-categories",
                    [
                        'category' => $category,
                    ]
                ); ?>
                <h1 id="page-title"><?php echo $category->name; ?></h1>
                <?php
                echo category_description($category->term_id);
                $sub_categories = my_categories($category->term_id);
                $has_sub_cats = count($sub_categories);
                get_template_part('templates/template', 'project-links', [
                    'category' => $category,
                    'has_sub_cats' => $has_sub_cats,
                ]);
                if ($has_sub_cats): ?>
                    <div id="sub-categories">
                        <?php for ($i = 0; $i < count($sub_categories); $i++):
                            $sub_cat = $sub_categories[$i]; ?>
                            <a href="<?php echo get_category_link(
                                $sub_cat
                            ); ?>">
                                <?php echo $sub_cat->name; ?>
                            </a>
                        <?php echo $i < count($sub_categories) - 1 ? " | " : "";
                        endfor; ?>
                    </div>
                <?php endif;
                ?>
            </div>
        </header>
        <div id="content-container">
            <?php get_template_part("templates/template", "latest-posts"); ?>
            <div id="pagination">
                <div id="previous-page">
                    <?php previous_posts_link('<< newer'); ?>
                </div>
                <div id="next-page">
                    <?php next_posts_link('older >>'); ?>
                </div>
            </div>
        </div>
    </section>
    <?php get_template_part("templates/template", "navigation"); ?>
</div>
<?php get_footer();
?>
