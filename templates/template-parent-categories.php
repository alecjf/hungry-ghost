<?php
$parents = array_filter(explode("/", get_category_parents($args['category'])));
!is_single() && array_pop($parents);
if (count($parents) > 0): ?>
    <div id="parent-categories">
        <?php for ($i = 0; $i < count($parents); $i++): ?>
            <div class="parent-category">
                <a
                id="<?php echo is_single() && $i === count($parents) - 1
                    ? "page-title"
                    : "parent-category-link-" . $i; ?>"
                href="<?php echo get_category_link(
                    get_cat_ID($parents[$i])
                ); ?>"><?php echo $parents[$i]; ?></a> >>
            </div>
        <?php endfor; ?>
    </div>
<?php endif;
?>
