<?php
/* Template Name: À propos */
?>

<?php get_header(); ?>

<?php include ('includes/bloc_hero_reuse.php'); ?>

<?php if (have_rows('propos_missions')) : ?>
    
<section class="missions">
    <div class="wrapper">
        <div class="title">
            <h2>Missions</h2>
            <div class="underline">
            <lottie-player
                        class="lottie-underline js-lottie-underline"
                        src="<?php bloginfo('template_url') ?>/assets/lottie/tripleLigneDessin.json"
                        data-component="Lottie"
                    >
                    </lottie-player>
            </div>
        </div>

        <div class="missions_grid">
        <?php while (have_rows('propos_missions')) : the_row(); ?>
            <div class="mission">
                <h1><?php the_sub_field('propos_number') ?></h1>
                <h4><?php the_sub_field('propos_titre_mission') ?></h4>
                <p><?php the_sub_field('propos_description_mission') ?></p>
            </div>
        <?php endwhile; ?>  
        </div>
    </div>
</section>
<?php endif; ?>

        <?php if (have_rows('bloc')) : ?>
            <?php while (have_rows('bloc')) : the_row(); ?>

                <?php include ('includes/'. get_row_layout() .'.php'); ?>

            <?php endwhile; ?>
        <?php endif; ?>

<?php get_footer(); ?>