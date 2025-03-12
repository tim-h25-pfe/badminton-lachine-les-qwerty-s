<?php
/* Template Name: Boutique */
?>

<?php get_header(); ?>

<section class="hero block zero">
    <div class="hero_content">
        <div class="texte">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</section>

<section class="boutique">
    <div class="wrapper">
    <?php   
            // Vérifier si WooCommerce est actif
            if ( ! class_exists( 'WooCommerce' ) ) {
                echo 'WooCommerce n\'est pas actif.';
                return;
            }

            $argsglobal = array(
                'post_type' => 'product',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            );
            $queryg = new WP_Query( $argsglobal );
            ?>
        <?php if ( $queryg->have_posts() ) : ?>
        <div class="cards news" data-tab-container="global">

            <!-- un div grid  -->
            <div class="grid grid-tarif">
                    <!-- while -->
                    <?php while ( $queryg->have_posts() ) : $queryg->the_post();
                    global $product; // Important pour accéder aux infos du produit 
                    ?>
                        <div class="card news">   
                            <div class="card__media">
                                <?php 
                                
                                     echo woocommerce_get_product_thumbnail();
                                 ?>
                                    <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                                
                            </div>
                            <div class="card__content">
                                <div class="text">
                                    <h5><?php the_title(); ?></h5>
                                    <p><?php echo $product->get_price_html(); ?></p>
                                </div>
                                <a class="btn_full btn_round" href="<?php the_permalink(); ?>">
                                    <div class="fleche-container">
                                        <svg class="icon fleche1">
                                            <use xlink:href="#icon-fleche"></use>
                                        </svg>
                                        <svg class="icon fleche2">
                                            <use xlink:href="#icon-fleche"></use>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    

                    <?php endwhile; ?>
            </div>
            <div class="grid carousel-tarif js-swiper-cardSwiper" data-component="Carousel"
                data-centered
                data-coverflow>
                <div class="swiper-wrapper">
                   
                    <?php while ( $queryg->have_posts() ) : $queryg->the_post();
                    global $product; // Important pour accéder aux infos du produit
                     ?>
                    

                    <div class="card news">
                        <div class="card__media">
                        <?php 
                                
                                echo woocommerce_get_product_thumbnail();
                            ?>
                                <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                            
                        </div>
                        <div class="card__content">
                            <div class="text">
                                <h5><?php the_title(); ?></h5>
                                <p><?php echo $product->get_price_html(); ?></p>
                            </div>
                            <a class="btn_full btn_round" href="<?php the_permalink(); ?>">
                                <div class="fleche-container">
                                    <svg class="icon fleche1">
                                        <use xlink:href="#icon-fleche"></use>
                                    </svg>
                                    <svg class="icon fleche2">
                                        <use xlink:href="#icon-fleche"></use>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    
                    
                </div>
                    

                <?php endwhile; ?>
            </div>
                    
            </div>
        </div>

        <?php else : ?>
                <p>Aucune catégorie trouvée.</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</section>

<?php if (have_rows('bloc')) : ?>
    <?php while (have_rows('bloc')) : the_row(); ?>
        <?php include ('includes/'. get_row_layout() .'.php'); ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>