<?php

global $query_string;

wp_parse_str( $query_string, $search_query );
$search = new WP_Query( $search_query );

?>

<?php get_header(); ?>


<?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $s=get_search_query();
        $args = array(
           'posts_per_page' => 3,
             'paged' => $paged,
                's' =>$s
            );
        // The Query
        $the_query = new WP_Query( $args );

        if ( $the_query->have_posts() ) { 
        ?>
<section class="search">
    <div class="wrapper">
        <h5><?php the_field('recherche_teplo', 'options'); ?> : <?php echo get_query_var('s') ?></h5>
        <?php get_search_form(); ?>
        <p class="resultes"><?php echo $the_query->found_posts . ' résultat' . ($the_query->found_posts > 1 ? 's' : ''); ?></p>
        <div class="search_results">

        <?php while ( $the_query->have_posts() ) {  
        $the_query->the_post();
                 ?>

            <div class="search_result" data-scrolly="fromBottom">
                <div class="result__media">
                <?php 
                if (has_post_thumbnail()) { 
                    the_post_thumbnail(); 
                } else { ?>
                    <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                <?php } ?>
                </div>
                <div class="result__content">
                    <p class="category">
                    <?php 
                        // Récupérer le type de contenu (post, page ou CPT)
                        $post_type = get_post_type();
                        if ($post_type == 'post') {
                            echo 'Article';
                        } elseif ($post_type == 'page') {
                            echo 'Page';
                        } else {
                            // Si c'est un CPT, afficher son nom
                            echo get_post_type_object($post_type)->labels->singular_name;
                        }
                        ?>
                    </p>
                    <h5><?php the_title(); ?></h5>
                    <p>
                    <?php the_excerpt(); ?>
                    </p>
                    <a style="background-color: #252525;" class="btn_full btn_round" href="<?php the_permalink(); ?>">
                        <svg class="icon fleche1">
                            <use xlink:href="#icon-fleche"></use>
                        </svg>
                        <svg class="icon fleche2">
                            <use xlink:href="#icon-fleche"></use>
                        </svg>
                    </a>
                </div>
            </div>

            <?php
        }
        ?>   
           
        </div>


    <div class="pagination" style="margin-top: 50px">
        <?php
    echo paginate_links(array( // https://docs.classicpress.net/reference/functions/paginate_links/ 
        'total' => $the_query->max_num_pages, // Nombre total de pages
        'prev_text' => '<< Précédent',
        'next_text' => 'Suivant >>',
    ));
    ?>
    </div>

    </div>
</section>

<?php
    }else{
?>
<section>
    <div class="wrapper">
        <h2><?php the_field('aucun_result', 'options'); ?></h2>
        <?php get_search_form(); ?>
        
          <p style="margin-top: 100px;"><?php the_field('desole', 'options'); ?> ...</p>
        
    </div>
</section>
        
<?php } ?>

<?php get_footer(); ?>