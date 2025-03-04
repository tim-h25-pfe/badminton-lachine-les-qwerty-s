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
           'posts_per_page' => 2,
             'paged' => $paged,
                's' =>$s
            );
        // The Query
        $the_query = new WP_Query( $args );

        if ( $the_query->have_posts() ) { 
        ?>
<section class="search">
    <div class="wrapper">
        <h5>Résultats de recherche pour : <?php echo get_query_var('s') ?></h5>
        <?php get_search_form(); ?>
        <p class="resultes">2 résultats</p>
        <div class="search_results">

        <?php while ( $the_query->have_posts() ) {  
        $the_query->the_post();
                 ?>

            <div class="search_result">
                <div class="result__media">
                <?php the_post_thumbnail(); ?>
                </div>
                <div class="result__content">
                    <p class="category">Emploi</p>
                    <h5><?php the_title(); ?></h5>
                    <p>
                    <?php the_content(); ?>
                    </p>
                </div>
            </div>

            <?php
        }
        ?>   
           
        </div>

        <!-- Add the pagination functions here. -->

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
        <h2>Aucun résultat</h2>
        
          <p style="margin-top: 100px;">Désolé, mais votre recherche n'a donné aucun résultat ...</p>
        
    </div>
</section>
        
<?php } ?>

<?php get_footer(); ?>