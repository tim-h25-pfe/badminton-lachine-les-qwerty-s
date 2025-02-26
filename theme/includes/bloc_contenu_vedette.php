<?php
// Récupérer la valeur du champ Select (qui est un array)
$valeur = get_sub_field('vedette_contenu');

// Vérifier si la valeur est bien récupérée
if( $valeur ) {
    // Récupérer l'intitulé et le slug depuis l'array
    $slug = $valeur['value']; // Récupérer le slug
    $titre = $valeur['label']; // Récupérer l'intitulé
}

// print_r($slug);

$taxonomie = $slug; // Remplace par ta taxonomie

$tax_details = get_taxonomy($taxonomie);

if ( ! $tax_details || ! isset($tax_details->object_type) || empty($tax_details->object_type) ) {
    // Log ou afficher un message d'erreur pour déboguer
    print_r("La taxonomie spécifiée n'est pas valide ou n'a pas de type d'objet associé.");
    return;
}

$the_post_type = $tax_details->object_type[0];

$cat_nouvelle = get_sub_field('vedette_news_category');
$cat_service = get_sub_field('vedette_services_category');
$cat_event = get_sub_field('vedette_events_category');

$the_category = null;

if($the_post_type == "new"){
    $the_category = $cat_nouvelle;
} elseif($the_post_type == "event"){
    $the_category = $cat_event;
} elseif($the_post_type == "service"){
    $the_category = $cat_service;
}

print_r($the_category);
?>



<section class="section nouvelles">
    <div class="wrapper">
        <div class="title">
        
            <div class="title">
                <h1><?php echo $titre ?></h1>
                <div class="underline">
                    <svg class="icon icon--lg">
                        <use xlink:href="#icon-ligneDessin"></use>
                    </svg>
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
                <svg class="icon">
                    <use xlink:href="#icon-fleche"></use>
                </svg>
            </a>
        <?php endif; ?>
        </div>
 
        <?php   
        $argsglobal = array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            'orderby' => 'publish',
            'order' => 'DSC',
            'posts_per_page' => 3,
            if($the_category != "all"){
                'tax_query' => array(
                    array(
                        'taxonomy' => $slug,
                        'field'    => 'slug',
                        'terms'    => $term->slug,
                        'operator' => 'IN',
                    ),
                ),
            }
        );
        $queryg = new WP_Query( $argsglobal );
        ?>
        <?php if ( $queryg->have_posts() ) : ?>
            <div class="cards-nouvelles">
            <?php while ( $queryg->have_posts() ) : $queryg->the_post(); ?>
            <div class="card">
                <p class="btn_full tag">Statique</p>
                <div class="card__content">
                    <div class="text">
                        <h5><?php the_title();?></h5>
                        <!-- if nouvelles -> date else -> excerpt  -->
                        <p>Publié le statique</p>
                    </div>
                    <a class="btn_full btn_round" href="<?php the_permalink();?>">
                        <svg class="icon">
                            <use xlink:href="#icon-fleche"></use>
                        </svg>
                    </a>
                </div>
                <div class="card__media">
                <?php the_post_thumbnail();?>
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
                <svg class="icon">
                    <use xlink:href="#icon-fleche"></use>
                </svg>
            </a>
        <?php endif; ?>
    </div>
</section>