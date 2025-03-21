<?php
/* Template Name: Contenu */
?>

<?php get_header(); ?>

<section class="hero block zero">
    <div class="hero_content">
        <div class="texte">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</section>

<section class="commande">
    <div class="wrapper">
            <?php 
            $link = get_field('content_link');
            if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>    
            <a class="btn_full btn_top" href="<?php echo esc_url( $link_url ); ?>"
                ><?php echo esc_html( $link_title ); ?>
                <div class="fleche-container">
                    <svg class="icon fleche1">
                        <use xlink:href="#icon-fleche"></use>
                    </svg>
                    <svg class="icon fleche2">
                        <use xlink:href="#icon-fleche"></use>
                    </svg>
                </div>
            </a>
            <?php endif; ?>
    <?php the_content(); ?>
    </div>
</section>

<?php get_footer(); ?>