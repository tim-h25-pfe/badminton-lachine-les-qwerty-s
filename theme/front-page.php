<?php get_header(); ?>

<section class="hero hero_front section-color">
    <div class="hero__media">
        <img class="bgHero" src="<?php the_post_thumbnail_url('full'); ?>" alt="" />
        <div class="bkg_filter"></div>
    </div>
    <div class="wrapper">
        <div class="bigTitle">
            <h1><?php the_field('le_badminton', 'options'); ?></h1>
            <div class="title">
                <h1><?php the_field('notre', 'options'); ?> <?php the_field('accueil_catch') ?></h1>
                <div class="underline">
                    <lottie-player
                        class="lottie-underline js-lottie-underline"
                        src="<?php bloginfo('template_url') ?>/assets/lottie/doubleLigneDessin.json"
                        data-component="Lottie"
                    >
                    </lottie-player>
                </div>
            </div>
    
        </div>
        <div class="hero_content">
            <p><?php the_field('accueil_description') ?></p>
            <?php 
            $link = get_field('accueil_link');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
            <a class="hero_link" href="<?php echo esc_url( $link_url ); ?>"
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
        </div>
    </div>
</section>

<section class="section about">
    <div class="wrapper">
        <div class="bigCard">
            <div class="about__content">
            <lottie-player
                    id="VolantBlancMontantAccueil"
                    class="traceVolant js-volantBlanc"
                    src="<?php bloginfo('template_url') ?>/assets/lottie/volantBlancMontant.json"
                    data-component="Lottie"
                >
                </lottie-player>
                <lottie-player
                    id="VolantBlancAccueil"
                    class="volantBlanc js-volantBlanc"
                    src="<?php bloginfo('template_url') ?>/assets/lottie/volantBlanc.json"
                    data-component="Lottie"
                >
                </lottie-player>
                <h4>
                <?php the_field('accueil_propos_qui') ?>
                </h4>
                <p><?php the_field('accueil_propos_description') ?></p>
                <?php 
                $link = get_field('accueil_propos_link');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a href="<?php echo esc_url( $link_url ); ?>" class="btn_outline"><?php echo esc_html( $link_title ); ?></a>
                    <?php endif; ?>
            </div>

         <?php if( have_rows('accueil_propos_stats') ): ?>
            <div class="about__stats">
            <?php while( have_rows('accueil_propos_stats') ): the_row(); ?>
                <div class="stat">
                    <h3><?php the_sub_field('accueil_propos_stat') ?></h3>
                   <p><?php the_sub_field('accueil_propos_what') ?></p> 
                </div>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
    
<?php if (have_rows('bloc')) : ?>
            <?php while (have_rows('bloc')) : the_row(); ?>

                <?php include ('includes/'. get_row_layout() .'.php'); ?>

            <?php endwhile; ?>
        <?php endif; ?>

<?php get_footer(); ?>