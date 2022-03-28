<div class="social-sharing">
    <a target="_blank"
        class="share-button share-twitter"
        href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink(); ?>&text=<?php echo the_title(); ?>&via=<?php the_author_meta(
    'twitter'
); ?>"
        title="Tweet this">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/twitter.png" />
    </a>
    <a target="_blank"
        class="share-button share-facebook"
        href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>"
        title="Share on Facebook">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/facebook.png" />
    </a>
</div>
