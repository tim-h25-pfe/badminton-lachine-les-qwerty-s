<?php if (get_sub_field('interact_titre')): ?>
<section class="section">
    <div class="wrapper">
    <?php 
    $link = get_sub_field('interact_lien');
    if( $link ): 
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_html( $link_target ); ?>" class="lien-contact">
            <div class="lien-contact__content">
                <h4><?php the_sub_field('interact_surtitre'); ?></h4>
                <div class="invite">
                    <h2><?php the_sub_field('interact_titre'); ?></h2>
                    <div class="fleche-container">
                        <svg class="icon fleche1">
                            <use xlink:href="#icon-fleche"></use>
                        </svg>
                        <svg class="icon fleche2">
                            <use xlink:href="#icon-fleche"></use>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="lien-contact__media">
                <lottie-player
                    id="VolantContactAccueil"
                    class="volantContact js-volantNoir"
                    src="<?php bloginfo('template_url') ?>/assets/lottie/volantNoir.json"
                    data-component="Lottie"
                >
                </lottie-player>
            </div>
        </a>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>