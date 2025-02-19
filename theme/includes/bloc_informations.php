<section class="informations">
    <div class="wrapper">
        <div class="card_information_left">
            <div class="infos__media">
            <?php $image = get_sub_field('infos_image'); ?>
                 <?php if ($image): ?>
                     <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                 <?php endif ?>
            </div>
            <div class="infos__content">
                <h3><?php the_sub_field('infos_titre'); ?></h3>
                <p>
                <?php the_sub_field('infos_description'); ?>
                </p>
                <?php 
                    $link = get_sub_field('infos_link');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                <a href="<?php echo esc_url( $link_url ); ?>" class="btn_full"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>