<?php
/* Template Name: Contact */
?>

<?php get_header(); ?>

<section class="contact">
    <div class="wrapper">
        <div class="contact_grid">
            <div class="contact_contenu">
                <h3><?php the_title(); ?></h3>
                <?php if (get_field('contact_message')): ?>
                    <div class="contenu_description">
                    <p><?php the_field('contact_message'); ?></p>
                    </div>
                <?php endif; ?>
                

                <?php if (get_field('footer_mail', 'options')): ?>
                <div class="contact_courriel">
                    <h6>Courriel</h6>
                    <a href="mailto:<?php the_field('footer_mail', 'options'); ?>" target="_blank"><?php the_field('footer_mail', 'options'); ?></a>
                </div>
                <?php endif; ?>
                <?php if (get_field('footer_adress', 'options')): ?>
                <div class="contact_adresse">
                    <h6>Adresse du club</h6>
                    <p><?php the_field('footer_adress', 'options'); ?></p>
                </div>
                <?php endif; ?>

                <?php if ( have_rows('repeteur_sociaux', 'options') ): ?>
                
                <div class="social">
                    <ul style="list-style: none; padding: 0;">
                    <?php while( have_rows('repeteur_sociaux', 'options') ): the_row(); ?>
                
                <li style="text-decoration: underline;"><a href="<?php the_sub_field('sociaux_link', 'options') ?>"><?php the_sub_field('sociaux_name', 'options') ?></a></li>
                
                <?php endwhile; ?>
                    </ul>
                
                </div>
                <?php endif; ?>

                <?php if ( have_rows('contact_links') ): ?>
                <div class="contact_liens">
                    <h6>Voici quelques liens utiles :</h6>
                    <div class="liens">
                        <ul>
                        <?php while( have_rows('contact_links') ): the_row(); ?>
                        <?php 
                        $link = get_sub_field('contact_link');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <li><a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_html( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
                            <?php endif; ?>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="contact_formulaire">
                <form class="contact_form">
                <?php the_field('contact_embed') ?>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>