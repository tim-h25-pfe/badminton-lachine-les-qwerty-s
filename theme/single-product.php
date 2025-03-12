<?php
global $product; // Récupérer l'objet produit global
?>


<?php get_header(); ?>

<section class="hero block zero">
    <div class="hero_content">
        <div class="texte">
            <h1><?php the_title(); ?></h1>
            <p>
            <?php the_content(); ?>
            </p>
        </div>
        <div class="hero-img" style="display: none;">
        <?php 
        if (has_post_thumbnail()) { ?>
            <?php the_post_thumbnail('full'); ?>
            <?php  } else { ?>
            <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
        <?php } ?>
        </div>
    </div>
</section>

<section class="bloc-article service-single section-large">
    <div class="wrapper">
        <div class="grid-container">
            <div class="main-content">
                <div class="module module-header separator">
                    <h5><?php the_title(); ?></h5>

                    <!-- texte -->
                    <?php if (get_field('product_localisation')): ?>
                    <div class="module-header-section">
                        <svg class="icon">
                            <use xlink:href="#icon-pin"></use>
                        </svg>
                        <p><?php the_field('product_localisation'); ?></p>
                    </div>
                    <?php endif; ?>

                    <?php if (get_field('product_detail')): ?>
                    <p> <?php the_field('product_detail'); ?></p>
                    <?php endif; ?>

                    <!-- on touche pas encore  -->
                    <div class="module-header-section">
                        <svg class="icon">
                            <use xlink:href="#icon-cash"></use>
                        </svg>
                        <?php  echo '<p>' . $product->get_price_html() . '</p>'; ?>
                    </div>
                </div>
                <div class="module extra-space separator product">
                    <div class="product__media">
                    <?php
                    global $product;
                    $thumbnail_url = wp_get_attachment_url( $product->get_image_id() );
                    if ( $thumbnail_url ) {
                        echo '<img src="' . esc_url( $thumbnail_url ) . '" alt="' . esc_attr( get_the_title() ) . '">';
                    } else {
                        echo '<p>Aucune image disponible</p>';
                    }
                    ?>

                    </div>

                    <div class="product__content">



                        <h6>Options</h6>



                        <div class="content-module">
                            <p><span>Type de cordage</span></p>
                            <div class="champSelect">
                                <select name="options" class="btn_full">
                                    <option value="" selected disabled>Choisir une option</option>
                                    <option value="option1">Option 1</option>
                                    <option value="option2">Option 2</option>
                                    <option value="option3">Option 3</option>
                                    <option value="option4">Option 5</option>
                                </select>
                                <div class="icone">
                                    <svg class="icon icon--sm">
                                        <use xlink:href="#icon-fleche"></use>
                                    </svg>
                                </div>
                            </div>
                            <div class="champSelect">
                                <select name="options" class="btn_full">
                                    <option value="" selected disabled>Choisir une option</option>
                                    <option value="option1">Option 1</option>
                                    <option value="option2">Option 2</option>
                                    <option value="option3">Option 3</option>
                                    <option value="option4">Option 5</option>
                                </select>
                                <div class="icone">
                                    <svg class="icon icon--sm">
                                        <use xlink:href="#icon-fleche"></use>
                                    </svg>
                                </div>
                            </div>
                            <div class="champSelect">
                                <select name="options" class="btn_full">
                                    <option value="" selected disabled>Choisir une option</option>
                                    <option value="option1">Option 1</option>
                                    <option value="option2">Option 2</option>
                                    <option value="option3">Option 3</option>
                                    <option value="option4">Option 5</option>
                                </select>
                                <div class="icone">
                                    <svg class="icon icon--sm">
                                        <use xlink:href="#icon-fleche"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        

                        <div class="content-module">
                            <p><span>Marque de raquette</span></p>
                            <input class="champTexte" type="text" name="nom" />
                        </div>
                        <div class="content-module">
                            <p><span>Marque de raquette</span></p>
                            <input class="champTexte" type="text" name="nom" />
                        </div>
                        <div class="content-module">
                            <p><span>Marque de raquette</span></p>
                            <input class="champTexte" type="text" name="nom" />
                        </div>



                        <div class="content-module acheter">
                        <?php
                        global $product;
                        $add_to_cart_url = wc_get_cart_url() . '?add-to-cart=' . $product->get_id();
                        ?>
                            <a class="btn_full" href="<?php echo esc_url( $add_to_cart_url ); ?>"
                                ><svg class="icon">
                                    <use xlink:href="#icon-plus"></use>
                                </svg>
                                Ajouter au panier
                            </a>
                            <?php 
                            $link = get_field('header_shop', 'options');
                            if( $link ): ?>
                            <a class="bnt_full panier" href="<?php echo esc_url( $link ); ?>"
                                ><svg class="icon">
                                    <use xlink:href="#icon-panier"></use>
                                </svg>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


                <?php if( have_rows('product_specs_type') ): ?>
    
                <div class="module extra-space carateristics">
                    <h6>Spécificités pour le produit</h6>
                    <div class="caracteristics-list">
                        
                    <?php while( have_rows('product_specs_type') ): the_row(); ?>
        

                        <div class="caracteristic">
                            <p><span><?php the_sub_field('specs_titre'); ?></span></p>

                            <?php if( have_rows('specs_details_repeat') ): ?>
                            
                            <ul>
                            <?php while( have_rows('specs_details_repeat') ): the_row(); ?>
                                    
                                <li><?php the_sub_field('specs_detail'); ?></li>
                                <!-- truc à répéter  -->
                            <?php endwhile; ?>
                           
                            </ul>
                            <?php else : ?>
                                <?php the_sub_field('specs_details_text'); ?>
                            <?php endif; ?>

                        </div>
                        

                        
                    <?php endwhile; ?>
                    </div>
                </div>

                <?php endif; ?>





            </div>
            <div class="sidebar">
                
                <?php if (get_field('product_description')): ?>
                <div class="module-side">
                    <h6>Description du service</h6>
                    <?php the_field('product_description'); ?>
                </div>
                <?php endif; ?>
                
                <?php if (get_field('product_procedures')): ?>
                <div class="module-side">
                    <h6>Procédures</h6>
                    <?php the_field('product_procedures'); ?>
                </div>
                <?php endif; ?>
               
                <?php if (get_field('product_degagement')): ?>
                <div class="module-side">
                    <h6>Dégagement de responsabilités</h6>
                    <?php the_field('product_degagement'); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>