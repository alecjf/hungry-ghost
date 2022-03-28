<?php
get_header();
get_template_part("templates/template", "custom-header-image");
?>
<div class="with-sidebar">
    <section id="content">
        <header id="custom-header">
            <div id="custom-header-container">
                <h2 style="display: inline;"><u>search results for:</u></h2>
                <h1>
                    <?php echo get_search_query(); ?>
                </h1>
            </div>
        </header>
        <div id="content-container">
            <?php get_template_part("templates/template", "latest-posts"); ?>
            <div id="pagination">
                <div id="previous-page">
                    <?php previous_posts_link('<< previous'); ?>
                </div>
                <div id="next-page">
                    <?php next_posts_link('next >>'); ?>
                </div>
            </div>
        </div>
    </section>
    <?php get_template_part("templates/template", "navigation"); ?>
</div>
<?php get_footer();
?>
