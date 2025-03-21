<?php get_header(); ?>



    <section class="error">

        <h1><?php the_field('oups', 'options'); ?></h1>

        <a href="<?php bloginfo('url') ?>" class="btn_full"><?php the_field('accueil_haha', 'options'); ?></a>

    </section>



<?php get_footer(); ?>