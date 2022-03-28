<?php
$category = $args['category'];
$has_sub_cats = array_key_exists('has_sub_cats', $args)
    ? $args['has_sub_cats']
    : null;
if (
    // function in header.php
    is_in_web_portfolio($category) &&
    // category id 17 = random notes (no project links)
    $category->term_id !== 17 &&
    $category->slug !== 'graphic-design' &&
    !$has_sub_cats
): ?>
    <div id="project-links">
        <!-- category id 20 = this theme (no external project link) -->
        <?php if ($category->term_id !== 20): ?>
            <a class="custom-button-link"
                href="https://fern.haus/projects/<?php echo $category->slug; ?>"
                target="_blank">View Project</a>
        <?php endif; ?>
        <a class="custom-button-link"
            href="https://github.com/alecjf/<?php echo $category->slug; ?>"
            target="_blank">
            View GitHub</a>
    </div>
<?php endif;
?>
