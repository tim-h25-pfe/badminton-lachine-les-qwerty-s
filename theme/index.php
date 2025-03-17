<?php get_header(); ?>

    <section class="hero">
        <img class="bgHero" src="<?php bloginfo('template_url') ?>/assets/images/hero.png" alt="" />
        <div class="wrapper">
            <h1><?php the_title(); ?></h1>
        </div>
    </section>

    <section>
        <div class="wrapper">
        <?php the_content(); ?>
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