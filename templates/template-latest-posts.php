<div id="latest-posts">
    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>
            <article>
                <h3 class="title-link">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h3>
                <div class="linked-thumbnail">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                    <?php
                    $caption = get_the_post_thumbnail_caption();
                    if ($caption): ?>
                    <div class="caption">
                        <small><?php echo $caption; ?></small>
                    </div>
                    <?php endif;
                    ?>
                </div>
                <p class="date"><?php echo get_the_date(); ?></p>
                <?php
                the_content("...read more");
                get_template_part('templates/template', 'social-sharing');
                ?>
                <section class="tags-and-categories">
                    <?php
                    get_template_part('templates/template', 'tag-links');
                    get_template_part('templates/template', 'category-links');
                    ?>
                </section>
            </article>
        <?php
        endwhile;
    else:
         ?>
        <article class="page-article">
            <p style="text-align: center;">
                Sorry, there are no posts to display!
            </p>
        </article>
    <?php
    endif; ?>
</div>
