<?php
get_header();
get_template_part("templates/template", "custom-header-image");
?>
<div class="with-sidebar">
    <section id="content">
        <header id="custom-header">
            <div id="custom-header-container">
                <h1 id="page-title">Blog</h1>
                <div id="sub-categories">
                    <?php
                    $top_cats = my_categories(0);
                    for ($i = 0; $i < count($top_cats); $i++):
                        $top_cat = $top_cats[$i]; ?>
                        <a href="<?php echo get_category_link($top_cat); ?>">
                            <?php echo $top_cat->name; ?>
                        </a>
                    <?php echo $i < count($top_cats) - 1 ? " | " : "";
                    endfor;
                    ?>
                </div>
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
