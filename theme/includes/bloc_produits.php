<?php 

if ( ! function_exists('wc_get_product') ) {
    return;
}

$the_category = get_sub_field('products_type');
?>

<!-- BLOC CARDS 3 -->
<section class="section section-color services service_background">
    <div class="wrapper">
        <div class="title_section">
            <div class="title">
            <h2><?php the_sub_field('products_titre'); ?></h2>
            <div class="underline">
                    <lottie-player
                        class="lottie-underline js-lottie-underline"
                        src="<?php bloginfo('template_url') ?>/assets/lottie/tripleLigneDessin.json"
                        data-component="Lottie"
                    >
                    </lottie-player>
            </div>
        </div>
        </div>
        

        <?php   
        $argsglobal = array(
            'post_type' => 'product',
            'post_status' => 'publish',
            // 'orderby' => 'publish',
            // 'order' => 'DSC',
            'posts_per_page' => 2,
        );
        
        if($the_category != "all"){
            $argsglobal['tax_query'] = array(
                array(
                    'taxonomy' => 'product_cat',  // Slug de la taxonomie personnalisée
                    'field'    => 'slug',      // On filtre par slug de terme
                    'terms'    => $the_category, // Catégorie à filtrer
                    'operator' => 'IN',        // Sélectionne les posts ayant ce terme
                ),
            );
        }
        

        $queryg = new WP_Query( $argsglobal );
        ?>

        <?php if ( $queryg->have_posts() ) : ?>


        <div class="grid-produits">

        <?php while ( $queryg->have_posts() ) : $queryg->the_post();
        global $product; // Récupère l'objet produit WooCommerce
        if ($product) {
            $product = wc_get_product(get_the_ID()); // Récupère l'objet produit si nécessaire
            $add_to_cart_url = esc_url($product->add_to_cart_url()); // URL d'ajout au panier
            //$button_text = $product->is_type('variable') ? 'Voir les options' : 'Ajouter au panier'; // Gestion des produits variables
        } else {
            $price_html = '<span class="no-price">Prix non disponible</span>';
            $add_to_cart_url = '#'; // Aucun lien si ce n'est pas un produit
            //$button_text = 'Indisponible';
        }
        ?>

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
                        <a class="btn_full btn_white" href="<?php echo $add_to_cart_url; ?>"
                            ><img src="<?php bloginfo('template_url') ?>/assets/icons/plus.png" alt="plus" /> Ajouter au panier
                        </a>
                        
                        <h4><?php echo $product->get_price_html(); ?></h4>
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