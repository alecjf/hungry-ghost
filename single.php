<?php
get_header();
get_template_part("templates/template", "custom-header-image");
?>
<div class="with-sidebar">
    <section id="content">
        <header id="custom-header" class="custom-header-single-page">
            <div id="custom-header-container" class="single">
                <?php foreach (
                    wp_get_post_categories(get_the_ID())
                    as $cat_id
                ) {
                    $category = get_category($cat_id);
                    get_template_part(
                        "templates/template",
                        "parent-categories",
                        [
                            'category' => $category,
                        ]
                    );
                    get_template_part('templates/template', 'project-links', [
                        'category' => $category,
                    ]);
                } ?>
                <h1><?php the_title(); ?></h1>
                <?php
                $code = get_the_post_thumbnail();
                if ($code) {
                    $xmlEl = simplexml_load_string($code);
                    $h = intval($xmlEl->attributes()->{'height'});
                    $w = intval($xmlEl->attributes()->{'width'});
                    the_post_thumbnail('post-thumbnail', [
                        'class' => $h > $w ? 'portrait' : 'landscape',
                    ]);
                }
                if (get_the_post_thumbnail_caption()): ?>
                <div id="thumbnail-caption"><?php the_post_thumbnail_caption(); ?></div>
            <?php endif;
                ?>
                <p class="date"><?php echo get_the_date(); ?></p>
                <?php get_template_part(
                    'templates/template',
                    'social-sharing'
                ); ?>
            </div>
        </header>
        <div id="content-container">
            <article>
                <?php
                the_content();
                get_template_part('templates/template', 'social-sharing');
                ?>
                <section class="tags-and-categories">
                    <?php
                    get_template_part('templates/template', 'tag-links');
                    get_template_part('templates/template', 'category-links');
                    ?>
                </section>
            </article>
            <div id="comments">
                <h2>Comments</h2>
                <?php
                if (comments_open() || get_comments_number()):
                    comments_template();
                endif;

                $req = get_option('require_name_email');
                $aria_req = $req ? " aria-required='true'" : '';

                $fields = [
                    'author' =>
                        '<p class="comment-form-author">' .
                        '<label for="author">' .
                        __('Name') .
                        ' *</label> ' .
                        ($req ? '<span class="required">*</span>' : '') .
                        '<input id="author" name="author" type="text" value="' .
                        esc_attr($commenter['comment_author']) .
                        '" size="30"' .
                        $aria_req .
                        ' /></p>',
                    'cookies' => '',
                ];

                comment_form([
                    'fields' => $fields,
                    'class_submit' => 'custom-button-link',
                ]);
                ?>
            </div>
            <div id="pagination">
                <div id="previous-page">
                    <?php previous_post_link('%link', '<< %title', true); ?>
                </div>
                <div id="next-page">
                    <?php next_post_link('%link', '%title >>', true); ?>
                </div>
            </div>
        </div>
    </section>
    <?php get_template_part("templates/template", "navigation"); ?>
</div>
<?php get_footer();
?>
