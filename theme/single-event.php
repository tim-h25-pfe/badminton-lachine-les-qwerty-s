<?php get_header(); ?>

<section class="bloc-article nouvelle section-large">
    <div class="wrapper">
        <div class="grid-container">
            <div class="main-content">
                <div class="module module-header">
                    <div class="sous-titre">
                        <h6>Publié le <?php the_date(); ?></h6>
                        <?php
                        // Récupérer les termes associés à l'article pour la taxonomie personnalisée 'ma_taxonomie'
                        $terms = get_the_terms(get_the_ID(), 'type_de_event');

                        // Vérifier si des termes existent et ne sont pas une erreur
                        if ($terms && !is_wp_error($terms)) {
                            // Obtenez le premier terme (vous pouvez itérer si vous avez plusieurs termes)
                            $first_term = array_shift($terms);
                            
                            // Afficher le nom de la catégorie (terme)
                            echo '<h5 class="btn_full">' . $first_term->name . '</h5>';
                        }
                        ?>
                    </div>
                    <h3><?php the_title(); ?></h3>
                    <?php the_post_thumbnail(); ?>
                </div>
                <?php the_content(); ?>
            </div>

            <?php
            // Récupérer le post suivant dans le même Custom Post Type (CPT)
            $next_post = get_next_post();

            // Vérifier s'il y a un post suivant
            if ($next_post) {
                // Récupérer l'ID du post suivant
                $next_post_id = $next_post->ID;

                // Récupérer le lien, le titre, la date et la catégorie du post suivant
                $next_post_link = get_permalink($next_post_id);
                $next_post_title = get_the_title($next_post_id);
                $next_post_date = get_the_date('d M Y', $next_post_id);
                $next_post_thumbnail = get_the_post_thumbnail($next_post_id, 'medium'); // ou 'large' selon votre taille préférée
                
                // Récupérer les catégories associées à ce post
                $next_post_terms = get_the_terms($next_post_id, 'type_de_event');
                $next_post_category = ( $next_post_terms && !is_wp_error($next_post_terms) ) ? array_shift($next_post_terms)->name : 'Pas de catégorie';
            }

                // le truc pour la catégorie quand le html et les styles seront ajustés
                // echo esc_html($next_post_category); // rajouter la balise php bien sur
            ?>

<?php if ($next_post): ?>
            <div class="sidebar">
                <h4>Article similaire</h4>

                <div class="cards-nouvelles">
                    <div class="card">
                        <div class="card__content">
                            <div class="text">
                                <h5><?php echo esc_html($next_post_title); ?></h5>
                                <p>Publié le <?php echo esc_html($next_post_date); ?></p>
                            </div>
                            <a class="btn_full btn_round" href="<?php echo esc_url($next_post_link); ?>">
                                <svg class="icon">
                                    <use xlink:href="#icon-fleche"></use>
                                </svg>
                            </a>
                        </div>
                        <div class="card__media">
                        <?php echo $next_post_thumbnail; ?>
                        </div>
                    </div>
                </div>

            </div>
            <?php else: ?>
                <p>Pas de prochain événement</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if (have_rows('bloc')) : ?>
            <?php while (have_rows('bloc')) : the_row(); ?>

                <?php include ('includes/'. get_row_layout() .'.php'); ?>

            <?php endwhile; ?>
        <?php endif; ?>

<?php get_footer(); ?>