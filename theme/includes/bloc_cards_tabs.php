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
                <h2><?php echo esc_html($label); ?></h2>
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

            

                $taxonomie = $slug; // Remplace par ta taxonomie

                $tax_details = get_taxonomy($taxonomie);

                if ( ! $tax_details || ! isset($tax_details->object_type) || empty($tax_details->object_type) ) {
                    // Log ou afficher un message d'erreur pour déboguer
                    print_r("La taxonomie spécifiée n'est pas valide ou n'a pas de type d'objet associé.");
                    return;
                }

                $the_post_type = $tax_details->object_type[0];

                //print_r($terms);

                
                // si the_post_type = nouvelles (ou un autre type de post avec image)
                if ($the_post_type == 'new' || $the_post_type == 'event') {
                    // on crée une variable 
                    $class = 'news';
                }
                else{
                    $class = 'nothing';
                }
                ?>

            <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
            <nav>
                <ul>
                    <!-- if actualités  -->
                     <!-- le li magique  -->
                     <?php if ($the_post_type == 'new' || $the_post_type == 'event') : ?>
                        <li>
                            <a class="btn_circled" data-tab-open="global">
                                Tout
                                <svg class="icon">
                                    <use xlink:href="#icon-cercleDessin"></use>
                                </svg>
                            </a>
                        </li>
                    <?php endif; ?>
                     
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
                ?>
                
    <?php if ($the_post_type == 'new' || $the_post_type == 'event') : ?>
                    
            <?php   
            $argsglobal = array(
                'post_type' => $the_post_type,
                'post_status' => 'publish',
                'orderby' => 'publish',
			    'order' => 'ASC',
                'posts_per_page' => -1,
            );
            $queryg = new WP_Query( $argsglobal );
            ?>
        <?php if ( $queryg->have_posts() ) : ?>
        <div class="cards <?php echo $class ?>" data-tab-container="global">

        <?php if ($the_post_type == 'new') : ?>
            <!-- l'article en vedette  - acf relation -->
            <?php $posts = get_sub_field('grid_vedette'); ?>
            <?php if ($posts) : ?>
                <?php foreach ($posts as $p) : // Utilisez $p, jamais $post (IMPORTANT) ?>
            <div class="card news first">
                    <div class="card__content">
                        <h5><?php echo get_the_title($p->ID); ?></h5>
                        <a class="btn_full" href="<?php echo get_permalink($p->ID); ?>">
                            <svg class="icon">
                                <use xlink:href="#icon-fleche"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="card__media">
                    <?php echo get_the_post_thumbnail($p->ID); ?>
                    <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                    </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($the_post_type == 'event') : ?>
            <!-- l'article en vedette  - acf relation -->
            <?php $posts = get_sub_field('grid_vedette_event'); ?>
            <?php if ($posts) : ?>
                <?php foreach ($posts as $p) : // Utilisez $p, jamais $post (IMPORTANT) ?>
            <div class="card news first">
                    <div class="card__content">
                        <h5><?php echo get_the_title($p->ID); ?></h5>
                        <a class="btn_full" href="<?php echo get_permalink($p->ID); ?>">
                            <svg class="icon">
                                <use xlink:href="#icon-fleche"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="card__media">
                    <?php echo get_the_post_thumbnail($p->ID); ?>
                    <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                    </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>


            <!-- un div grid  -->
            <div class="grid">
                    <!-- while -->
                    <?php while ( $queryg->have_posts() ) : $queryg->the_post(); ?>
                    <!-- le div de card des articles -->
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
                    <div class="card news">
                        <div class="card__content">
                            <h5><?php the_title(); ?></h5>
                            <a class="btn_full" href="<?php the_permalink(); ?>">
                                <svg class="icon">
                                    <use xlink:href="#icon-fleche"></use>
                                </svg>
                            </a>
                        </div>
                        <div class="card__media">
                        <?php 
                        if (has_post_thumbnail()) { 
                            the_post_thumbnail(); 
                        } else { ?>
                            <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                        <?php } ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
            </div>
        </div>

        <?php else : ?>
                <p>Aucune catégorie trouvée.</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
            
    <?php endif; ?>    


            



                
        <?php if (!empty($terms) && !is_wp_error($terms)) : ?>
        <!-- while -->
       

        <!-- boucle des custom post type -->
        <!-- avec le parametre de la category -->
        <!-- if -->
        <?php foreach ($terms as $term) : ?>
        <?php 
            $args = array(
                'post_type' => $the_post_type,
                'post_status' => 'publish',
                'orderby' => 'publish',
			    'order' => 'ASC',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => $slug,
                        'field'    => 'slug',
                        'terms'    => $term->slug,
                        'operator' => 'IN',
                    ),
                ),
            );
            $query = new WP_Query( $args );
            ?>


    <?php if ( $query->have_posts() ) : ?>
        
        <div class="cards <?php echo $class ?>" data-tab-container="<?php echo esc_html($term->slug); ?>">


        <?php if ($the_post_type == 'new') : ?>
            <!-- l'article en vedette  - acf relation -->
            <?php $posts = get_sub_field('grid_vedette'); ?>
            <?php if ($posts) : ?>
                <?php foreach ($posts as $p) : // Utilisez $p, jamais $post (IMPORTANT) ?>
            <div class="card news first">
                    <div class="card__content">
                        <h5><?php echo get_the_title($p->ID); ?></h5>
                        <a class="btn_full" href="<?php echo get_permalink($p->ID); ?>">
                            <svg class="icon">
                                <use xlink:href="#icon-fleche"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="card__media">
                    <?php echo get_the_post_thumbnail($p->ID); ?>
                    <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                    </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($the_post_type == 'event') : ?>
            <!-- l'article en vedette  - acf relation -->
            <?php $posts = get_sub_field('grid_vedette_event'); ?>
            <?php if ($posts) : ?>
                <?php foreach ($posts as $p) : // Utilisez $p, jamais $post (IMPORTANT) ?>
            <div class="card news first">
                    <div class="card__content">
                        <h5><?php echo get_the_title($p->ID); ?></h5>
                        <a class="btn_full" href="<?php echo get_permalink($p->ID); ?>">
                            <svg class="icon">
                                <use xlink:href="#icon-fleche"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="card__media">
                    <?php echo get_the_post_thumbnail($p->ID); ?>
                    <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                    </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        <?php endif; ?>


         <!-- un div grid  -->
          <div class="grid">
                <!-- while -->
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <!-- le div de card des articles -->
                <div class="card">
                    <div class="card__top">
                        <h5><?php the_title(); ?></h5>
                        <p><?php the_field('tabs_description'); ?></p>
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
                <div class="card news">
                    <div class="card__content">
                        <h5><?php the_title(); ?></h5>
                        <a class="btn_full" href="<?php the_permalink(); ?>">
                            <svg class="icon">
                                <use xlink:href="#icon-fleche"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="card__media">
                    <?php 
                    if (has_post_thumbnail()) { 
                        the_post_thumbnail(); 
                    } else { ?>
                        <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                    <?php } ?>
                    </div>
                </div>
                <?php endwhile; ?>
          </div>
        </div>

        <?php else : ?>
                <p>Aucune catégorie trouvée.</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
        <?php endforeach?>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>

    </div>
</section>