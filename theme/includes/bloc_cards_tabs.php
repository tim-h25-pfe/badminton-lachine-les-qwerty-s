<section class="cards-category" id="tabs" data-component="Tabs">
    <div class="wrapper">
        <!-- boucle du custom post type choisi -->
        

        <div class="top">
            <div class="title">
                <h1><?php the_sub_field('grid_elements_content'); ?></h1>
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
                    'taxonomy'   => 'type_de_forfaits', // Remplace par le nom de ta taxonomie
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

        <!-- while -->

        <!-- boucle des custom post type -->
        <!-- avec le parametre de la category -->
        <!-- if -->
        <div class="cards" data-tab-container="jeunes">
            <!-- while -->
            <div class="card">
                <div class="card__top">
                    <h5>Débutant I - Jeune</h5>
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
        </div>
    </div>
</section>