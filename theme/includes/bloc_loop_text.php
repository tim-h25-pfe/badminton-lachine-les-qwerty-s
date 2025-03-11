<section class="valeurs section-color">
    <div class="wrapper">
        <div class="title">
            <h2><?php the_sub_field('text_loop_titre'); ?></h2>
            <div class="underline">
                    <lottie-player
                        class="lottie-underline js-lottie-underline"
                        src="<?php bloginfo('template_url') ?>/assets/lottie/tripleLigneDessin.json"
                        data-component="Lottie"
                    >
                    </lottie-player>
            </div>
        </div>
        <?php if( have_rows('text_loop_blocs') ): ?>
        <?php while( have_rows('text_loop_blocs') ): the_row(); ?>
        <div class="text-list texte">
            <div class="titre">
                <h4><?php the_sub_field('bloc_titre'); ?></h4>
                <hr />
            </div>
            <div class="content">
                <div class="paragraphe">
                <?php the_sub_field('bloc_paragraphe'); ?>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
