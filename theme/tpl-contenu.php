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
            <a class="btn_full btn_top" href="#"
                >Voir la boutique
                <div class="fleche-container">
                    <svg class="icon fleche1">
                        <use xlink:href="#icon-fleche"></use>
                    </svg>
                    <svg class="icon fleche2">
                        <use xlink:href="#icon-fleche"></use>
                    </svg>
                </div>
            </a>
    <?php the_content(); ?>
    </div>
</section>

<?php get_footer(); ?>