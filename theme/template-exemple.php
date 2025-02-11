<?php
/*
Template Name: Exemple
 */
?>
<?php get_header(); ?>

<section class="hero">
<img class="bgHero" src="<?php bloginfo('template_url') ?>/assets/images/hero.png" alt="" />
<div class="wrapper">
        <h1>Exemple d'un template</h1>
    </div>
</section>

<section>
    <div class="wrapper">
    <p>Fichier exemple d'un template. Ça prend juste la ligne de php au début du fichier et on met le nom, et on choisi ce template dans Wordpress.</p>
    <div class="cards">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <a href="<?php the_permalink(); ?>">
            <div class="card">
                <div class="card__media">
                <?php the_post_thumbnail(); ?>
                </div>
                <div class="card__content">
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                    
                </div>
            </div>
            </a>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
</div>
    </div>
</section>


<?php get_footer(); ?>