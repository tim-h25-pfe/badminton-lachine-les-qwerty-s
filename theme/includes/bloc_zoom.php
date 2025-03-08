<?php
// Récupérer la valeur du champ Select (qui est un array)
$valeur = get_sub_field('content_zoom');

// Vérifier si la valeur est bien récupérée
if( $valeur ) {
    // Récupérer l'intitulé et le slug depuis l'array
    $slug = $valeur['value']; // Récupérer le slug
    $titre = $valeur['label']; // Récupérer l'intitulé
}

$taxonomie = $slug; // Remplace par ta taxonomie

$tax_details = get_taxonomy($taxonomie);

if ( ! $tax_details || ! isset($tax_details->object_type) || empty($tax_details->object_type) ) {
    // Log ou afficher un message d'erreur pour déboguer
    print_r("La taxonomie spécifiée n'est pas valide ou n'a pas de type d'objet associé.");
    return;
}

$the_post_type = $tax_details->object_type[0];

$cat_nouvelle = get_sub_field('categorie_de_nouvelles');

if ($cat_nouvelle){
    $new_slug = $cat_nouvelle['value']; // Récupérer le slug
    $new_label = $cat_nouvelle['label']; // Récupérer l'intitulé
}

$cat_service = get_sub_field('service_category');

if ($cat_service){
    $service_slug = $cat_service['value']; // Récupérer le slug
    $service_label = $cat_service['label']; // Récupérer l'intitulé
}


$the_category = null;
$the_label = null;

if($the_post_type == "new"){
    $the_category = $new_slug;
    $the_label = $new_label;
} elseif($the_post_type == "service"){
    $the_category = $service_slug;
    $the_label = $service_label;
}

// $taxonomie, $the_post_type, $the_category, $the_label
?>

<section class="section services">
    <div class="wrapper">
        <div class="title">
            <div class="title">
                <h2><?php the_sub_field('titre_zoom'); ?></h2>
                <div class="underline">
                    <lottie-player
                        id="accueilTripleLigneDessin"
                        class="lottie-underline js-underline"
                        src="<?php bloginfo('template_url') ?>/assets/lottie/tripleLigneDessin.json"
                        data-component="Lottie"
                    >
                    </lottie-player>
                </div>
            </div>
            <?php 
        $link = get_sub_field('link_all');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="btn_full btn_top" href="<?php echo esc_url( $link_url ); ?>"
                ><?php echo esc_html( $link_title ); ?>
                <div class="fleche-container">
                    <svg class="icon fleche1">
                        <use xlink:href="#icon-fleche"></use>
                    </svg>
                    <svg class="icon fleche2">
                        <use xlink:href="#icon-fleche"></use>
                    </svg>
                </div>
            </a>
        <?php endif; ?>
        </div>


        <?php   
        $argsglobal = array(
            'post_type' => $the_post_type,
            'post_status' => 'publish',
            // 'orderby' => 'publish',
            // 'order' => 'DSC',
            'posts_per_page' => 4,
        );

        // Si $the_category n'est pas "all", ajoute le filtre de taxonomie
        if ($the_category != "all") {
            $argsglobal['tax_query'] = array(
                array(
                    'taxonomy' => $taxonomie,  // Slug de la taxonomie personnalisée
                    'field'    => 'slug',      // On filtre par slug de terme
                    'terms'    => $the_category, // Catégorie à filtrer
                    'operator' => 'IN',        // Sélectionne les posts ayant ce terme
                ),
            );
        }

        if ($the_category == "all") {
            $argsglobal['orderby'] = 'rand';
        }

        $queryg = new WP_Query( $argsglobal );
        ?>

        <?php if ( $queryg->have_posts() ) : ?>

        <div class="grid-services">

        <?php while ( $queryg->have_posts() ) : $queryg->the_post(); ?>

            <div class="service">
                <div class="service__media">
                <?php 
                if (has_post_thumbnail()) { 
                    the_post_thumbnail(); 
                } else { ?>
                    <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                <?php } ?>
                </div>
                <div class="service__content">
                    <h5><?php the_title();?></h5>
                    <div class="more__content">
                        <a class="btn_full btn_white" href="<?php the_permalink();?>"><?php the_field('en_savoir_plus', 'options'); ?></a>
                        <?php 
                        $link = get_sub_field('link_bonus');
                        if( $link ): 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="btn_full" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                       
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



    <?php   
        $args = array(
            'post_type' => $the_post_type,
            'post_status' => 'publish',
            // 'orderby' => 'publish',
            // 'order' => 'DSC',
            'posts_per_page' => 4,
        );

        // Si $the_category n'est pas "all", ajoute le filtre de taxonomie
        if ($the_category != "all") {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => $taxonomie,  // Slug de la taxonomie personnalisée
                    'field'    => 'slug',      // On filtre par slug de terme
                    'terms'    => $the_category, // Catégorie à filtrer
                    'operator' => 'IN',        // Sélectionne les posts ayant ce terme
                ),
            );
        }

        if ($the_category == "all") {
            $args['orderby'] = 'rand';
        }

        $query = new WP_Query( $args );
        ?>

<?php if ( $query->have_posts() ) : ?>
    <div
        class="swiper carousel-services js-swiper-accueilServices"
        data-component="Carousel"
        data-loop
        data-centered
        data-coverflow
    >
        <div class="swiper-wrapper">


            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="swiper-slide">
                <div class="service">
                    <div class="service__media">
                    <?php 
                    if (has_post_thumbnail()) { 
                        the_post_thumbnail(); 
                    } else { ?>
                        <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                    <?php } ?>
                    </div>
                    <div class="service__content">
                        <h4><?php the_title();?></h4>
                        <div class="more__content">
                            <a class="btn_full btn_white" href="<?php the_permalink();?>"><?php the_field('en_savoir_plus', 'options'); ?></a>
                            <?php 
                            $link = get_sub_field('link_bonus');
                            if( $link ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a class="btn_full" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            

        </div>
        
    </div>
    <?php else : ?>
        <p>Aucun post.</p>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>


    <div class="wrapper">
    <?php 
        $link = get_sub_field('link_all');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="btn_full btn_bottom" href="<?php echo esc_url( $link_url ); ?>"
                ><?php echo esc_html( $link_title ); ?>
                <svg class="icon">
                    <use xlink:href="#icon-fleche"></use>
                </svg>
            </a>
        <?php endif; ?>
    </div>
</section>