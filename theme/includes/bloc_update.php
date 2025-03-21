<section class="section doublePush">
    <div class="wrapper">
        <div data-scrolly="fromLeft">
            <h3><?php the_sub_field('update_titre'); ?></h3>
        </div>

        <?php 
        $link = get_sub_field('first_link');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
        <div class="tiles">
            <a data-scrolly="fromRight" href="<?php echo esc_url( $link_url ); ?>" class="tile">
                <div class="title">
                    <h3><?php echo esc_html( $link_title ); ?></h3>
                </div>
                <div class="fleche-container">
                    <svg class="icon fleche1 icon--xs">
                        <use xlink:href="#icon-fleche"></use>
                    </svg>
                    <svg class="icon fleche2 icon--xs">
                        <use xlink:href="#icon-fleche"></use>
                    </svg>
                </div>
            </a>
            <?php 
            $link = get_sub_field('second_link');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
            <a data-scrolly="fromRight" href="<?php echo esc_url( $link_url ); ?>" class="tile">
                <div class="title">
                    <h3><?php echo esc_html( $link_title ); ?></h3>
                </div>
                <div class="fleche-container">
                    <svg class="icon fleche1 icon--xs">
                        <use xlink:href="#icon-fleche"></use>
                    </svg>
                    <svg class="icon fleche2 icon--xs">
                        <use xlink:href="#icon-fleche"></use>
                    </svg>
                </div>
            </a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</section>