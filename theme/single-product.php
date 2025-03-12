<?php get_header(); ?>

<?php include ('includes/bloc_hero_reuse.php'); ?>

<section class="bloc-article service-single section-large">
    <div class="wrapper">
        <div class="grid-container">
            <div class="main-content">
                <div class="module module-header separator">
                    <h5>Cordage de raquette</h5>

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
                        <p>18$ - 26$</p>
                    </div>
                </div>
                <div class="module extra-space separator product">
                    <div class="product__media">
                    <?php the_post_thumbnail(); ?>
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
                            <a class="btn_full" href="#"
                                ><svg class="icon">
                                    <use xlink:href="#icon-plus"></use>
                                </svg>
                                Ajouter au panier
                            </a>
                            <a class="bnt_full panier" href="#"
                                ><svg class="icon">
                                    <use xlink:href="#icon-panier"></use>
                                </svg>
                            </a>
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