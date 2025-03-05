<div class="header-back"></div>
<section class="hero block <?php the_field('hero_align'); ?>">
    <div class="hero_content">
        <div class="texte">
            <h1><?php the_title(); ?></h1>
            <p>
            <?php the_content(); ?>
            </p>
        </div>
        <div class="hero-img">
        <?php 
        if (has_post_thumbnail()) { ?>
            <?php the_post_thumbnail(); ?>
            <?php  } else { ?>
            <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
        <?php } ?>
        </div>
    </div>
</section>