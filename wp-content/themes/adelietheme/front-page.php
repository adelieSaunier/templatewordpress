<?php
get_header();

if(have_posts()): ?>
<div class="row">
    
    <?php while(have_posts()): the_post(); ?>
        <div class="card">
        <?php the_post_thumbnail('post-thumbnail', ['class' =>'card-img-top', 'alt' =>'', 'style' => 'height: auto']); ?>
            <div class="card-body">
                <a href="<?php the_permalink()?>"><h5 class="card-title"><?php the_title() ?></h5></a>
                <p class="card-text"><?php the_category()?></p>
                <a href="#" class="btn btn-primary"><?php the_author() ?></a>
            </div>
        </div>

</div>
    <?php endwhile;?>


<?php endif;?>

<?php get_footer();