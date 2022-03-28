<div
    id="custom-header-image"
    style="background-image: url('<?php header_image(); ?>');"
    alt="dynamic custom header image">
    <div id="branding">
        <section class="search-bar-container">
            <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
        </section>
        <div class="site-logo"
            style="background-image:
                url(<?php echo get_site_icon_url(); ?>);" />
        </div>
        <h2><?php echo get_bloginfo('name'); ?></h2>
    </div>
    <div id="branding-transparent-bg"></div>
</div>
