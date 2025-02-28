<?php get_header(); ?>

<section class="hero section-color">
    <div class="hero__media">
        <img class="bgHero" src="<?php the_post_thumbnail_url(); ?>" alt="" />
        <div class="bkg_filter"></div>
    </div>
    <div class="wrapper">
        <div class="bigTitle">
            <h1>Le badminton,</h1>
            <h1>
                notre
                <span
                    ><?php the_field('accueil_catch') ?>
                    <svg class="icon">
                        <use xlink:href="#icon-doubleLigneDessin"></use>
                    </svg>
                </span>
            </h1>
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
            <a class="btn_circled" href="<?php echo esc_url( $link_url ); ?>"
                ><?php echo esc_html( $link_title ); ?>
                <svg class="icon">
                    <use xlink:href="#icon-ovalDessin"></use>
                </svg>
            </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="section about">
    <div class="wrapper">
        <div class="bigCard">
            <div class="about__content">
                <img class="traceVolant" src="<?php bloginfo('template_url') ?>/assets/images/traceVolant.png" alt="trace du volant" />
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