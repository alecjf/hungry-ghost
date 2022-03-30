<?php get_header(); ?>
<div id="front-page">
    <h1><?php echo get_bloginfo('name'); ?></h1>
    <h2 id="tagline"><?php echo get_bloginfo('description'); ?></h2>
    <nav>
        <?php wp_nav_menu(['theme_location' => 'front_page_menu']); ?>
    </nav>
    <section class="search-bar-container">
        <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
    </section>
    <img src="<?php echo get_site_icon_url(); ?>"
        alt="The Hungry Ghost logo: profile of ghost with mouth open." />
</div>
<?php get_footer();
?>
