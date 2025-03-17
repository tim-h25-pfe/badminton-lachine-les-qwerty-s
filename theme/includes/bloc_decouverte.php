<?php
// Récupérer la valeur du champ Select (qui est un array)
$valeur = get_sub_field('decouverte_content');

// Vérifier si la valeur est bien récupérée
if( $valeur ) {
    // Récupérer l'intitulé et le slug depuis l'array
    $slug = $valeur['value']; // Récupérer le slug
    $titre = $valeur['label']; // Récupérer l'intitulé
}

$the_post_type = $slug;
$the_label = $titre;
?>

<section class="section-large contentSwiper">
    <div class="wrapper">
        <div class="content">
            <div class="infos">
                <h3><?php the_sub_field('decouverte_titre'); ?></h3>
                <p>
                <?php the_sub_field('decouverte_description'); ?>
                </p>
                <?php 
                $link = get_sub_field('decouverte_link');
                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a href="<?php echo esc_url( $link_url ); ?>" class="btn_full btn_white">
                    <?php echo esc_html( $link_title ); ?>
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
            <div class="btn_nav">
                <div class="swiper-button-prev">
                    <svg class="icon btn_circled btn_round btn_white">
                        <use xlink:href="#icon-fleche"></use>
                    </svg>
                </div>
                <div class="swiper-button-next">
                    <svg class="icon btn_round btn_white">
                        <use xlink:href="#icon-fleche"></use>
                    </svg>
                </div>
            </div>
        </div>


        <?php   
        $argsglobal = array(
            'post_type' => $the_post_type,
            'post_status' => 'publish',
            // 'orderby' => 'publish',
            // 'order' => 'DSC',
            'posts_per_page' => 4,
        );

        $queryg = new WP_Query( $argsglobal );
        ?>

        <?php if ( $queryg->have_posts() ) : ?>


        <div class="swiper js-swiper-coursPrives" data-component="Carousel" data-loop>

            <div class="swiper-wrapper">
            <?php while ( $queryg->have_posts() ) : $queryg->the_post(); ?>
                <div class="swiper-slide">
                    <div class="card">
                        <div class="card__media">
                        <?php 
                        if (has_post_thumbnail()) { 
                            the_post_thumbnail(); 
                        } else { ?>
                            <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                        <?php } ?>
                        </div>
                        <div class="card__content">
                            <div class="title">
                                <h4><?php the_title(); ?></h4>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="btn_full"
                                ><?php the_field('en_savoir_plus', 'options'); ?>
                                <svg class="icon">
                                    <use xlink:href="#icon-fleche"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>

        </div>

        <?php else : ?>
                <p><?php the_field('aucun_post', 'options'); ?></p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</section>