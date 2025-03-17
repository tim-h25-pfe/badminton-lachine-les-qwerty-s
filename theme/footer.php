</div>

<footer class="footer">
    <div class="wrapper">

        <?php wp_nav_menu(array(
                'theme_location' => 'menu_header_vedette',
                'container' => 'nav',
                'container_class' => 'principal',
            )); ?>


        <?php wp_nav_menu(array(
                'theme_location' => 'menu_footer_pages',
                'container' => 'nav',
                'container_class' => 'secondary',
            )); ?>

        
        <div class="sociaux">
            <?php 
            $link = get_field('footer_subscribe', 'options');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
            <div class="inscription">
                <a class="hero_link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
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
                <?php 
            $link = get_field('footer_steps', 'options');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a href="<?php echo esc_url( $link_url ); ?>" class="subscribe"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php if ( have_rows('repeteur_sociaux', 'options') ): ?>
                
            <div class="social">
            <?php while( have_rows('repeteur_sociaux', 'options') ): the_row(); ?>
            
                <a href="<?php the_sub_field('sociaux_link', 'options') ?>"><?php the_sub_field('sociaux_name', 'options') ?></a>
                
                <?php endwhile; ?>
            </div>
            <?php endif; ?>
        </div>

        <div class="copyright">
            <div class="contact">
            <?php if (get_field('footer_mail', 'options')): ?>
               <a href="mailto:<?php the_field('footer_mail', 'options'); ?>"><?php the_field('footer_mail', 'options'); ?></a>
               <?php endif; ?>
            <?php 
            $link = get_field('footer_adress', 'options');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="subscribe"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
            </div>
                        
            <?php if ( have_rows('footer_links', 'options') ): ?>
            <div class="credits">      
            <?php while( have_rows('footer_links', 'options') ): the_row(); ?>  
            <?php 
                $link = get_sub_field('links_link', 'options');
                if( $link ): ?>  
                <a href="<?php echo esc_url( $link ); ?>"><?php the_sub_field('links_text', 'options') ?></a>
                <?php endif; ?>
                <?php endwhile; ?>
            </div>
            <?php endif; ?>

            <p><?php the_field('footer_copyright', 'options'); ?> © <?php echo date("Y"); ?> <?php bloginfo('name'); ?></p>
        </div>
        
    </div>
    <div class="passion">
        <h1><?php the_field('le_badminton', 'options'); ?>,</h1>
        
        
        <h1>
        <?php the_field('notre', 'options'); ?>
            <span
                ><?php the_field('passion', 'options'); ?>
                <svg class="icon">
                    <use xlink:href="#icon-ovalDessin"></use>
                </svg>
            </span>
        </h1>
    </div>
   
</footer>
<?php wp_footer(); ?>
</body>
</html>