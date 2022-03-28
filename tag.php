<?php
get_header();
$tag = get_queried_object();
get_template_part("templates/template", "custom-header-image");
?>
<div id="category" class="with-sidebar">
    <section id="content">
        <header id="custom-header">
            <div id="custom-header-container">
                <div>
                    <h2 style="display: inline;"><u>tag:</u></h2>
                    &nbsp;
                    <h1 id="page-title" style="display: inline;">
                        <?php echo $tag->name; ?>
                    </h1>
                </div>
                <?php echo tag_description($tag->term_id); ?>
            </div>
        </header>
        <h2 class="custom-sub-header">Latest Posts</h2>
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
