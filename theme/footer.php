<footer class="footer">
    <div class="wrapper">

        <?php wp_nav_menu(array(
                'theme_location' => 'menu_header_vedette',
                'container' => 'nav',
                'container_class' => 'principal',
            )); ?>


        <?php wp_nav_menu(array(
                'theme_location' => 'menu_header_sections',
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
                <a class="btn_circled" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                <?php echo esc_html( $link_title ); ?>
                <svg class="icon">
                    <use xlink:href="#icon-ovalDessin"></use>
                </svg>
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
               <p><?php the_field('footer_mail', 'options'); ?></p>
               <?php endif; ?>
               <?php if (get_field('footer_adress', 'options')): ?>
                <p><?php the_field('footer_adress', 'options'); ?></p>
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

            <?php if (get_field('footer_copyright', 'options')): ?>
                <p><?php the_field('footer_copyright', 'options'); ?></p>
                <?php endif; ?>
        </div>
        
    </div>
    <div class="passion">
        <h1>Le badminton,</h1>
        <h1>
            notre
            <span
                >passion
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