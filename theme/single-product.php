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
                    <h3><?php the_title(); ?></h3>

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

                    <div class="module-header-section">
                        <svg class="icon">
                            <use xlink:href="#icon-cash"></use>
                        </svg>
                        <?php  echo '<h6>' . $product->get_price_html() . '</h6>'; ?>
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


                    <?php
                        global $product;
                        $attributes = $product->get_attributes();

                        if ( ! empty( $attributes ) ) :
                        ?>
                    <div class="product__content">
                        <h6>Options</h6>
                        <form action="<?php echo esc_url( $product->add_to_cart_url() ); ?>" method="post">
                        

                            <div class="content-module">
                            <?php foreach ( $attributes as $attribute_name => $attribute ) : ?>
                                <label for="<?php echo esc_attr( $attribute_name ); ?>">
                                    <?php echo wc_attribute_label( $attribute->get_name() ); ?> :
                                </label>
                                <div class="champSelect">
                                    <select name="attribute_<?php echo esc_attr( $attribute_name ); ?>" id="<?php echo esc_attr( $attribute_name ); ?>" class="btn_full">
                                        <?php
                                        $values = $attribute->get_options();
                                        foreach ( $values as $value ) :
                                        ?>
                                        <option value="<?php echo esc_attr( $value ); ?>">
                                            <?php echo esc_html( $value ); ?>
                                        </option>
                                        <?php endforeach; ?>
                                        
                                    </select>
                                    <div class="icone">
                                        <svg class="icon icon--sm">
                                            <use xlink:href="#icon-fleche"></use>
                                        </svg>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </div>

                            <div class="content-module acheter">

                                <input type="hidden" name="add-to-cart" value="<?php echo $product->get_id(); ?>">
                                <button type="submit" class="btn_full panier single_add_to_cart_button button alt">Ajouter au panier</button>

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

                        </form>
                        
                    </div>
                    <?php else: ?>
                        <div class="product__content">
                        <?php
                        global $product;
                        $add_to_cart_url = wc_get_cart_url() . '?add-to-cart=' . $product->get_id();
                        ?>
                        <div class="content-module acheter">
                            <a class="btn_full" href="<?php echo esc_url( $add_to_cart_url ); ?>"
                                ><svg class="icon">
                                    <use xlink:href="#icon-plus"></use>
                                </svg>
                                <?php the_field('addtocart', 'options'); ?>
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

                    <?php endif; ?>


                </div>


                <?php if( have_rows('product_specs_type') ): ?>
    
                <div class="module extra-space carateristics">
                    <h4><?php the_field('specs_porduituiui', 'options'); ?></h4>
                    <div class="caracteristics-list">
                        
                    <?php while( have_rows('product_specs_type') ): the_row(); ?>
        

                        <div class="caracteristic">
                            <p><span><?php the_sub_field('specs_titre'); ?></span></p>

                            <?php if( have_rows('specs_details_repeat') ): ?>
                            
                            <ul>
                            <?php while( have_rows('specs_details_repeat') ): the_row(); ?>
                                    
                                <li><?php the_sub_field('specs_detail'); ?></li>
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
                    <h6><?php the_field('decript-service', 'options'); ?></h6>
                    <?php the_field('product_description'); ?>
                </div>
                <?php endif; ?>
                
                <?php if (get_field('product_procedures')): ?>
                <div class="module-side">
                    <h6><?php the_field('procedures', 'options'); ?></h6>
                    <?php the_field('product_procedures'); ?>
                </div>
                <?php endif; ?>
               
                <?php if (get_field('product_degagement')): ?>
                <div class="module-side">
                    <h6><?php the_field('degae', 'options'); ?></h6>
                    <?php the_field('product_degagement'); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>