<?php
// Récupérer la valeur du champ Select (qui est un array)
$type_contenu = get_sub_field('infos_loop_type');

$contenu = $type_contenu;

$img_position = get_sub_field('infos_loop_align');
?>

<!-- BLOC BOUCLE D'INFORMATIONS -->
<section class="loop-infos <?php echo $img_position ?>">

<?php if( $contenu == "perso" ): ?>


    <?php if( have_rows('repeat_infos') ): ?>
    <?php while( have_rows('repeat_infos') ): the_row(); ?>
    <div class="informations">
        <?php $image = get_sub_field('repeat_infos_image'); ?>
        <?php if ($image): ?>
        <div class="infos__media">
        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
        </div>
        <?php endif ?>
        <div class="infos__content">
            <h3><?php the_sub_field('repeat_infos_titre'); ?></h3>
            <p><?php the_sub_field('repeat_infos_description'); ?></p>
            <?php 
            $link = get_sub_field('repeat_infos_link');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
            <a href="<?php echo esc_url( $link_url ); ?>" class="btn_full"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
        </div>
    </div>
    <?php endwhile; ?>
    <?php endif; ?>





<?php endif; ?>

<?php if( $contenu == "page" ): ?>

    <?php $posts = get_sub_field('infos_loop_pages'); ?>
    <?php if ($posts) : ?>
        <?php foreach ($posts as $p) : // Utilisez $p, jamais $post (IMPORTANT) 
         $post_obj = get_post($p->ID); // Récupérer l'objet du post
         $post_type_obj = get_post_type_object($post_obj->post_type); // Récupérer l'objet du post type
         $post_type = $post_type_obj->name;

         if($post_type == "product"){
            $product = wc_get_product($p->ID); // Obtenir l'objet produit WooCommerce
            $price = $product->get_price(); // Récupérer le prix
         }
        ?>
            <div class="informations">
                
                <div class="infos__media">
                <?php echo get_the_post_thumbnail($p->ID, 'full'); ?>
                <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                </div>
                
                <div class="infos__content">
                    <?php if( $post_type != "service" ): ?>
                    <p class="category"><?php echo esc_html($post_type_obj->labels->singular_name); // Affiche l'intitulé du post type ?></p>
                    <?php endif; ?>
                    <h3><?php echo get_the_title($p->ID); ?></h3>

                    <?php if ($post_type == "event") : ?>
                    <ul class="details">
                        <li><?php the_field('events_dates', $p->ID); ?></li>
                        <span class="circle"></span>
                        <li><?php the_field('events_time', $p->ID); ?></li>
                        <span class="circle"></span>
                        <li><?php the_field('events_cost', $p->ID); ?></li>
                    </ul>
                    <?php endif; ?>

                    <?php if ($post_type == "new") : ?>
                    <ul class="details">
                        <li>Publié le <?php echo get_the_date('d F Y', $p->ID); ?> </li>
                    </ul>
                    <?php endif; ?>

                    <?php if ($post_type == "product") : ?>
                    <ul class="details">
                        <li><?php echo wc_price($price); ?></li>
                    </ul>
                    <?php endif; ?>

                    <?php if ($post_type != "event" && $post_type != "new") : ?>
                        <p><?php echo wp_kses_post($post_obj->post_content); ?></p>
                    <?php endif; ?>

                    <?php if( $post_type != "service" ): ?>
                    <a href="<?php echo get_permalink($p->ID); ?>" class="btn_full">En savoir plus</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

<?php endif; ?>

</section>