<?php get_header(); ?>

<section class="hero block zero">
    <div class="hero_content">
        <div class="texte">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </div>
    </div>
</section>

<section class="index">
    <div class="wrapper">
        <h3 style="text-align: center"><?php the_field('index_message', 'options'); ?></h3>
    </div>
</section>

<?php get_footer(); ?>