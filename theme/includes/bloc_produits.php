<?php 
$the_category = get_sub_field('products_type');
?>

<!-- BLOC CARDS 3 -->
<section class="section section-color services service_background">
    <div class="wrapper">
        <div class="title">
            <h2><?php the_sub_field('products_titre'); ?></h2>
            <div class="underline">
                <svg class="icon icon--lg">
                    <use xlink:href="#icon-tripleLigneDessin"></use>
                </svg>
            </div>
        </div>

        <?php   
        $argsglobal = array(
            'post_type' => 'service',
            'post_status' => 'publish',
            // 'orderby' => 'publish',
            // 'order' => 'DSC',
            'posts_per_page' => 2,
        );
            
        $argsglobal['tax_query'] = array(
                array(
                    'taxonomy' => 'type_de_service',  // Slug de la taxonomie personnalisée
                    'field'    => 'slug',      // On filtre par slug de terme
                    'terms'    => $the_category, // Catégorie à filtrer
                    'operator' => 'IN',        // Sélectionne les posts ayant ce terme
                ),
            );
        

        $queryg = new WP_Query( $argsglobal );
        ?>

        <?php if ( $queryg->have_posts() ) : ?>


        <div class="grid-produits">

        <?php while ( $queryg->have_posts() ) : $queryg->the_post(); ?>

            <div class="service_no_hover">
                <div class="service__media">
                    <?php 
                if (has_post_thumbnail()) { 
                    the_post_thumbnail(); 
                } else { ?>
                    <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                <?php } ?>
                </div>
                <div class="service__content">
                    <h5><?php the_title(); // titre ?></h5>
                    <div class="content_more">
                        <a class="btn_full btn_white" href="#"
                            ><img src="<?php bloginfo('template_url') ?>/assets/icons/plus.png" alt="plus" /> Ajouter au panier
                        </a>
                        <!-- prix woocommerce bientot  -->
                        <h4>20$</h4>
                    </div>
                </div>
            </div>

            <?php endwhile; ?>
            
        </div>

        <?php else : ?>
                <p>Aucun post.</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

    </div>
</section>