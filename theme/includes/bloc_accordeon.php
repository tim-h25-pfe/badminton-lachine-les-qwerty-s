<section class="accordeon section-color">
    <div class="wrapper">
        <div class="title" data-scrolly="fromLeft">
            <h2><?php the_sub_field('accordeon_section_title'); ?></h2>
            <div class="underline">
            <lottie-player
                        class="lottie-underline js-lottie-underline"
                        src="<?php bloginfo('template_url') ?>/assets/lottie/tripleLigneDessin.json"
                        data-component="Lottie"
                    >
                    </lottie-player>
            </div>
        </div>
        <?php if( have_rows('accordeon_content') ): ?>
    
        <div class="accordion" data-component="Accordeon" data-closing>
            <div class="grid-accordion">
            <?php while( have_rows('accordeon_content') ): the_row(); ?>
                <div class="accordion__container">
                    <div class="accordion__header">
                        <h4 data-scrolly="fromLeft"><?php the_sub_field('accordeon_titre'); ?></h4>
                        <div data-scrolly="fromRight" class="header__icons">
                            <svg class="icon icon--sm icon-open">
                                <use xlink:href="#icon-plus"></use>
                            </svg>
                            <svg class="icon icon--sm icon-close">
                                <use xlink:href="#icon-moins"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="accordion__content" data-scrolly="fromLeft">
                        <hr />
                        <?php the_sub_field('accordeon_paragraphe'); ?>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
        </div>

        <?php endif; ?>
    </div>
</section>