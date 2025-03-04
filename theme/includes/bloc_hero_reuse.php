<section class="hero block <?php the_field('hero_align'); ?>">
    
        <div class="hero__media">
        <?php 
        if (has_post_thumbnail()) { ?>
            <img class="bgHero" src="<?php the_post_thumbnail_url(); ?>" alt="hero" />
            <?php  } else { ?>
            <img class="bgHero" src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
        <?php } ?>
        </div>
        <div class="hero__content">
            <h1><?php the_title(); ?></h1>
            <div class="underline">
                <svg class="icon icon--lg">
                    <use xlink:href="#icon-doubleLigneDessin"></use>
                </svg>
            </div>
        </div>
    
</section>