<?php
get_header(); ?>

<div class="container">

    <?php if(have_posts()): ?>
        <?php while(have_posts()):
            the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <h4> <?php the_author(); ?> </h4>
            <div class="row">
                <div class="col-6">
                    <?php the_excerpt(); ?>
                </div>
                <div class="col-6">
                    <div>
                        cette oeuvre est sortie <?php the_field('sortie'); // je dois créer un article ?>
                    </div>
                    
                </div>
            </div>     
        <?php endwhile;?>
        
    <?php endif; ?>

</div>

<?php
get_footer(); ?>