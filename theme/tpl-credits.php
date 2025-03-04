<?php
/* Template Name: Crédits */
?>

<?php get_header(); ?>

<?php include ('includes/bloc_hero_reuse.php'); ?>

<section>
    <div class="wrapper">
        <div class="projet_content">
            <section class="introduction">

                <div class="block_description">
                    <div class="content">
                        <div class="paragraphe">
                            <p>
                            <?php the_field('credits_context'); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="block_description">
                    <div class="titre">
                        <h4><span><?php the_field('credits_titre'); ?></span></h4>
                        <hr />
                    </div>
                    <div class="content">
                        <div class="paragraphe">
                        <?php if (have_rows('bloc')) : ?>
                            <?php while (have_rows('bloc')) : the_row(); ?>

                                <?php include ('includes/'. get_row_layout() .'.php'); ?>

                            <?php endwhile; ?>
                        <?php endif; ?>
                            <p>
                            <?php the_field('credits_remerciements'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<?php get_footer(); ?>