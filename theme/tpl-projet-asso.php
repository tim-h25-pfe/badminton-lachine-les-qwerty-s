<?php
/* Template Name: Projet Associatif */
?>

<?php get_header(); ?>

<?php include ('includes/bloc_hero_reuse.php'); ?>

<?php if( have_rows('sections_asso') ): ?>

<section data-component="Ariane" data-ariane-single>

    <div class="wrapper">

        <div class="side_menu_grid">

            <nav class="side_menu">
                <ul class="ariane-nav"></ul>
            </nav>

            <div class="projet_content">
            <?php while( have_rows('sections_asso') ): the_row(); ?>
                <section class="introduction">
                    <div class="title">
                        <h2 data-ariane-section><?php the_sub_field('titre_asso'); ?></h2>
                        <div class="underline">
                                <lottie-player
                                class="lottie-underline js-lottie-underline"
                                src="<?php bloginfo('template_url') ?>/assets/lottie/doubleLigneDessin.json"
                                data-component="Lottie"
                            >
                            </lottie-player>
                        </div>
                    </div>
                    <?php if( have_rows('sous_sections_asso') ): ?>
                        <?php while( have_rows('sous_sections_asso') ): the_row(); ?>
                    <div class="block_description">
                        <div class="titre">
                            <h4><span><?php the_sub_field('sous_titre_asso'); ?></span></h4>
                            <hr />
                        </div>
                        <div class="content">
                            <div class="paragraphe">
                            <?php the_sub_field('asso_content'); ?>
                            </div>
                        </div>
                    </div>
                     <?php endwhile; ?>
                    <?php endif; ?>
                </section>
            <?php endwhile; ?>
            </div>

        </div>

    </div>

</section>

<?php endif; ?>


<?php get_footer(); ?>