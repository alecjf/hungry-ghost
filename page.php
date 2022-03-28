<?php
get_header();
get_template_part("templates/template", "custom-header-image");
?>
<div class="with-sidebar">
    <section id="content">
        <header id="custom-header" class="custom-header-single-page">
            <div id="custom-header-container">
                <h1 id="page-title"><?php the_title(); ?></h1>
            </div>
        </header>
        <div id="content-container">
            <article class="page-article">
                <?php
                the_content();
                get_template_part('templates/template', 'social-sharing');
                ?>
            </article>
        </div>
    </section>
    <?php get_template_part("templates/template", "navigation"); ?>
</div>
<?php get_footer();
?>
