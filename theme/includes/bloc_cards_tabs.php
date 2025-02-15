<?php
// Récupérer la valeur du champ Select (qui est un array)
$valeur = get_sub_field('grid_elements_content');

// Vérifier si la valeur est bien récupérée
if( $valeur ) :
    // Récupérer l'intitulé et le slug depuis l'array
    $slug = $valeur['value']; // Récupérer le slug
    $label = $valeur['label']; // Récupérer l'intitulé
?>
    
<?php
endif;
?>

<section class="cards-category" id="tabs" data-component="Tabs">
    <div class="wrapper">

        <div class="top">
            <div class="title">
                <h1><?php echo esc_html($label); ?></h1>
                <div class="underline">
                    <svg class="icon icon--lg">
                        <use xlink:href="#icon-tripleLigneDessin"></use>
                    </svg>
                </div>
            </div>

            <!-- boucle des categories du custom post type choisis -->
             <!-- ajouter une condition, c'est que ça prend des posts dedans comme ça non-catégorisé va pas show-up  -->
              <!-- DONE  -->

                    <?php
                $terms = get_terms(array(
                    'taxonomy'   => $slug, // Remplace par le nom de ta taxonomie
                    'hide_empty' => true,          // Ne pas afficher les catégories sans articles
                ));
                ?>

            <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
            <nav>
                <ul>
                <?php foreach ($terms as $term) : ?>
                    <li>
                        <a class="btn_circled" data-tab-open="<?php echo esc_html($term->slug); ?>">
                        <?php echo esc_html($term->name); ?>
                            <svg class="icon">
                                <use xlink:href="#icon-cercleDessin"></use>
                            </svg>
                        </a>
                    </li>
                    <?php endforeach?>
                </ul>
            </nav>

            <?php else : ?>
                <p>Aucune catégorie trouvée.</p>
            <?php endif; ?>
        </div>

        <!-- boucle des category  -->
        <?php
                $terms = get_terms(array(
                    'taxonomy'   => $slug, // Remplace par le nom de ta taxonomie
                    'hide_empty' => true,          // Ne pas afficher les catégories sans articles
                ));

                
                $taxonomie = $slug; // Remplace par ta taxonomie

                $tax_details = get_taxonomy($taxonomie);

                if ( ! $tax_details || ! isset($tax_details->object_type) || empty($tax_details->object_type) ) {
                    // Log ou afficher un message d'erreur pour déboguer
                    echo "La taxonomie spécifiée n'est pas valide ou n'a pas de type d'objet associé.";
                    return;
                }

                $the_post_type = $tax_details->object_type[0];
                ?>


        <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
        <!-- while -->
       

        <!-- boucle des custom post type -->
        <!-- avec le parametre de la category -->
        <!-- if -->
        <?php foreach ($terms as $term) : ?>
        <?php 
            $args = array(
                'post_type' => $the_post_type,
                'category_name' => $term->slug,
                'post_status' => 'publish',
                'showposts' => -1
            );
            $query = new WP_Query( $args );
            ?>
            <?php if ( $query->have_posts() ) : ?>


        <div class="cards" data-tab-container="<?php echo esc_html($term->slug); ?>">
            <!-- while -->
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="card">
                <div class="card__top">
                    <h5><?php the_title(); ?></h5>
                    <p>Initiation aux bases</p>
                    <div class="prices">
                        <div class="price">
                            <!-- option de soit prix (donc prix + texte) ou juste texte et là c'est que le gros -->
                            <p class="price">115$</p>
                            <p>Session d'automne</p>
                        </div>
                        <div class="price">
                            <p class="price">140$</p>
                            <p>Session d'hiver</p>
                        </div>
                    </div>
                </div>
                <div class="card__bottom">
                    <p class="details">Détails</p>
                    <div class="details">
                        <div class="detail">
                            <div class="i">
                                <svg class="icon icon--xs">
                                    <use xlink:href="#icon-i"></use>
                                </svg>
                            </div>
                            <p>Débit/Crédit Seulement</p>
                        </div>
                        <div class="detail">
                            <div class="i">
                                <svg class="icon icon--xs">
                                    <use xlink:href="#icon-i"></use>
                                </svg>
                            </div>
                            <p>Invités non permis</p>
                        </div>
                    </div>
                     
                    <a href="#" class="btn_full">voir l'horaire</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

        <?php else : ?>
                <p>Aucune catégorie trouvée.</p>
        <?php endif; ?>
        <?php endforeach?>
    <?php endif; ?>
    </div>
</section>