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


        <div class="grid-produits">

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
            
        </div>

    </div>
</section>