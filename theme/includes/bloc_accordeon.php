<section class="accordeon">
    <div class="wrapper">
        <div class="title">
            <h2><?php the_sub_field('accordeon_section_title'); ?></h2>
            <div class="underline">
                <svg class="icon icon--lg">
                    <use xlink:href="#icon-tripleLigneDessin"></use>
                </svg>
            </div>
        </div>
        <?php if( have_rows('accordeon_content') ): ?>
    
        <div class="accordion" data-component="Accordeon" data-closing>
            <div class="grid-accordion">
            <?php while( have_rows('accordeon_content') ): the_row(); ?>
                <div class="accordion__container">
                    <div class="accordion__header">
                        <h4><?php the_sub_field('accordeon_titre'); ?></h4>
                        <div class="header__icons">
                            <svg class="icon icon--sm icon-open">
                                <use xlink:href="#icon-plus"></use>
                            </svg>
                            <svg class="icon icon--sm icon-close">
                                <use xlink:href="#icon-moins"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="accordion__content">
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