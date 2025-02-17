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
                    'orderby' => 'id',
			        'order' => 'ASC',
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
                    'orderby' => 'id',
			        'order' => 'ASC',
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
                'orderby' => 'publish',
			    'order' => 'ASC',
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
                    <p><?php the_sub_field('tabs_description'); ?></p>
                    <?php if (have_rows('tabs_biginfos')): ?>
                    <div class="prices">
                    <?php while (have_rows('tabs_biginfos')) : the_row(); ?>
                        <div class="price">
                            <!-- option de soit prix (donc prix + texte) ou juste texte et là c'est que le gros -->
                            <p class="price"><?php the_sub_field('tabs_info_impo'); ?></p>
                            <?php if (get_sub_field('tabs_optional')): ?>
                            <p><?php the_sub_field('tabs_optional'); ?></p>
                            <?php endif; ?>
                        </div>
                        <?php endwhile; ?>  
                    </div>
                    <?php endif; ?>
                </div>

                
                <div class="card__bottom">
                    <p class="details">Détails</p>
                    <?php if (have_rows('tabs_details')): ?>
                    <div class="details">
                    <?php while (have_rows('tabs_details')) : the_row(); ?>
                        <div class="detail">
                            <div class="i">
                                <svg class="icon icon--xs">
                                    <use xlink:href="#icon-i"></use>
                                </svg>
                            </div>
                            <p><?php the_sub_field('tabs_detail'); ?></p>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                     
                    <?php 
                    $link = get_field('tabs_cta');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                <a href="<?php echo esc_url( $link_url ); ?>" class="btn_full"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
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