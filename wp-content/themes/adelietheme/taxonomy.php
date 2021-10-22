<?php
get_header();
    if(have_posts()): ?>
    
    <?php while(have_posts()):
    the_post(); ?>

    <h1><?php the_title() ?></h1>
    <h3><a href="<?php the_permalink()?>"><?php the_author() ?> </a></h3> 
    
    
    

    <?php endwhile;?>

    <?php endif;?>

<?php get_footer();