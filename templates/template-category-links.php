<?php
$cats = get_the_category(get_the_ID());
if ($cats): ?>
<h4 class="categories">categories:
    <?php for ($i = 0; $i < count($cats); $i++): ?>
        <a href="<?php echo get_category_link($cats[$i]); ?>"><?php echo $cats[
    $i
]->name; ?></a><?php echo $i < count($cats) - 1 ? ", " : "";endfor; ?>
</h4>
<?php endif;
?>
