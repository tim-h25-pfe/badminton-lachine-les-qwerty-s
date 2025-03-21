<section class="hero block 
<?php 
        if(get_field('hero_align')){
        echo the_field('hero_align'); 
        } else{
            echo "right";
        }
?>"
>
    <div class="hero_content">
        <div class="texte">
            <h1 data-scrolly="fromLeft"><?php the_title(); ?></h1>
            <div data-scrolly="fromLeft">
                <?php the_content(); ?>
            </div> 
        </div>
        <div class="hero-img" data-scrolly="fromRight">
        <?php 
        if (has_post_thumbnail()) { ?>
            <?php the_post_thumbnail('full'); ?>
            <?php  } else { ?>
            <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
        <?php } ?>
        </div>
    </div>
</section>