<!-- BLOC CTA CONTACT -->
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
                <h2><?php the_sub_field('interact_titre'); ?></h2>
            </div>
            <div class="lien-contact__media"></div>
        </a>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>