<section class="push">
    <div class="wrapper">
        <div class="push_content">
            <div data-scrolly="fromLeft" class="titre">
                <h4><?php the_sub_field('banner_titre'); ?></h4>
                <div class="underline">
                    <lottie-player
                        class="lottie-underline js-lottie-underline"
                        src="<?php bloginfo('template_url') ?>/assets/lottie/ligneDessin.json"
                        data-component="Lottie"
                    >
                    </lottie-player>
                </div>
            </div>
            <p data-scrolly="fromLeft">
            <?php the_sub_field('banner_resume'); ?>
            </p>
            <?php 
                    $link = get_sub_field('banner_link');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                <a data-scrolly="fromLeft" href="<?php echo esc_url( $link_url ); ?>" class="btn_full">
                    <?php echo esc_html( $link_title ); ?>
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
                <?php $image = get_sub_field('banner_image'); ?>
                 <?php if ($image): ?>
                    <div class="push_media" data-scrolly="fromRight">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">     
                    </div>
                <?php endif ?>
    </div>
</section>