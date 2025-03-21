<?php
/* Template Name: Politique de confidentialité */

$titre = get_field('politic_why');
?>

<?php get_header(); ?>

<?php include ('includes/bloc_hero_reuse.php'); ?>

<?php if( have_rows('politic_sections') ): ?>
<section data-component="Ariane" data-ariane-single>
    <div class="wrapper">
        <div class="side_menu_grid">
            <nav class="side_menu">
                <ul class="ariane-nav"></ul>
            </nav>
            <div class="projet_content">
                <section class="introduction">

                    <?php if ($titre): ?>
                    <div class="block_description">
                        <div class="content">
                            <div class="paragraphe">
                            
                                <p><?php echo $titre ?></p>
                            
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php while( have_rows('politic_sections') ): the_row(); ?>
                    <div class="block_description">
                        <div class="titre">
                            <h4 data-ariane-section><span><?php the_sub_field('politic_titre'); ?></span></h4>
                            <hr />
                        </div>
                        <div class="content">
                            <div class="paragraphe">
                            <?php the_sub_field('politic_content'); ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>

                </section>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>