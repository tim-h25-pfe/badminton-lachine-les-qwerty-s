<?php
// Récupérer la valeur du champ Select (qui est un array)
$valeur = get_sub_field('vedette_contenu');

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

$cat_nouvelle = get_sub_field('vedette_news_category');

if ($cat_nouvelle){
    $new_slug = $cat_nouvelle['value']; // Récupérer le slug
    $new_label = $cat_nouvelle['label']; // Récupérer l'intitulé
}

$cat_service = get_sub_field('vedette_services_category');

if ($cat_service){
    $service_slug = $cat_service['value']; // Récupérer le slug
    $service_label = $cat_service['label']; // Récupérer l'intitulé
}

$cat_event = get_sub_field('vedette_events_category');

if ($cat_event){
    $event_slug = $cat_event['value']; // Récupérer le slug
    $event_label = $cat_event['label']; // Récupérer l'intitulé
}

$the_category = null;
$the_label = null;

if($the_post_type == "new"){
    $the_category = $new_slug;
    $the_label = $new_label;
} elseif($the_post_type == "event"){
    $the_category = $event_slug;
    $the_label = $event_label;
} elseif($the_post_type == "service"){
    $the_category = $service_slug;
    $the_label = $service_label;
}
?>



<section class="section section-color nouvelles">
    <div class="wrapper">
        <div class="title">
        
            <div class="title">
                <h2><?php the_sub_field('vedette_titre'); ?></h2>
                <div class="underline">
                    <lottie-player
                        class="lottie-underline js-lottie-underline"
                        src="<?php bloginfo('template_url') ?>/assets/lottie/ligneDessin.json"
                        data-component="Lottie"
                    >
                    </lottie-player>
                </div>
            </div>
        

        <?php 
        $link = get_sub_field('vedette_link');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="btn_full btn_white btn_top" href="<?php echo esc_url( $link_url ); ?>"
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
            'orderby' => 'publish',
            'order' => 'DSC',
            'posts_per_page' => 3,
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

        if ($the_category == "all" && $the_post_type == "service") {
            $argsglobal['orderby'] = 'rand';
        }

        $queryg = new WP_Query( $argsglobal );
        ?>
        <?php if ( $queryg->have_posts() ) : ?>
            <div class="cards">
            <?php while ( $queryg->have_posts() ) : $queryg->the_post(); ?>
            <div class="card">
                <?php
                    // Récupérer la catégorie personnalisée du post
                $termse = wp_get_post_terms(get_the_ID(), $taxonomie);

                // Vérifier si des termes existent
                if (!empty($termse) && !is_wp_error($termse)) {
                    echo '<p class="btn_full tag">' . esc_html($termse[0]->name) . '</p>'; // Affiche le premier terme
                } else {
                    echo '<p>No category</p>';
                }
                ?>

                <div class="card__media">
                <?php 
                if (has_post_thumbnail()) { 
                    the_post_thumbnail(); 
                } else { ?>
                    <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                <?php } ?>
                </div>
                <div class="card__content">
                    <div class="text">
                        <h6><?php the_title();?></h6>
                        <!-- if nouvelles -> date else -> excerpt  -->
                        <?php echo get_the_date(); ?>
                    </div>
                    <a class="btn_full btn_round" href="<?php the_permalink();?>">
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
        <?php else : ?>
                <p>Aucun post.</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

        
        <?php 
        $link = get_sub_field('vedette_link');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="btn_full btn_white btn_bottom" href="<?php echo esc_url( $link_url ); ?>"
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
</section>