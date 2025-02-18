<section class="push">
    <div class="wrapper">
        <div class="push_content">
            <div class="titre">
                <h4><?php the_field('banner_titre'); ?></h4>
                <div class="underline">
                    <svg class="icon icon--lg">
                        <use xlink:href="#icon-ligneDessin"></use>
                    </svg>
                </div>
            </div>
            <p>
            <?php the_field('banner_resume'); ?>
            </p>
            <?php 
                    $link = get_field('banner_link');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                <a href="<?php echo esc_url( $link_url ); ?>" class="btn_full"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
        </div>
        <div class="push_media">
            <img src="assets/images/hero.png" alt="hero" />
        </div>
    </div>
</section>