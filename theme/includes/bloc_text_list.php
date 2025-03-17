<?php 
$content_type = get_sub_field('text_list_content');
$list_type = get_sub_field('text_list_type');
$employee_type = get_sub_field('text_list_employee');

// Vérifier si la valeur est bien récupérée
if( $employee_type ) {
    // Récupérer l'intitulé et le slug depuis l'array
    $employee_slug = $employee_type['value']; // Récupérer le slug
    $employee_label = $employee_type['label']; // Récupérer l'intitulé
}

// Vérifier si la valeur est bien récupérée
if( $list_type ) {
    // Récupérer l'intitulé et le slug depuis l'array
    $list_slug = $list_type['value']; // Récupérer le slug
    $list_label = $list_type['label']; // Récupérer l'intitulé
}
?>

<div class="text-list">
    <div class="titre">
    <?php if( $list_slug != "list_employee" ): ?>
        <h4><?php the_sub_field('text_list_titre'); ?></h4>
    <?php else: ?>
        <h4><?php echo $employee_label ?></h4>
    <?php endif; ?>
        <hr />
    </div>
    <div class="content">
    <?php if( $content_type == "text" ): ?>
        <div class="paragraphe">
        <?php the_sub_field('contenu_texte'); ?>
        </div>
    <?php endif; ?>

    <?php if( $content_type == "list" ): ?>


        <?php if( $list_slug == "list_employee" ): ?>

            <?php   
            $argsglobal = array(
                'post_type' => 'employee',
                'post_status' => 'publish',
                'orderby' => 'publish',
                'order' => 'ASC',
                'posts_per_page' => -1,
            );
                
            $argsglobal['tax_query'] = array(
                    array(
                        'taxonomy' => 'type_de_employee',  // Slug de la taxonomie personnalisée
                        'field'    => 'slug',      // On filtre par slug de terme
                        'terms'    => $employee_slug, // Catégorie à filtrer
                        'operator' => 'IN',        // Sélectionne les posts ayant ce terme
                    ),
                );
            

            $queryg = new WP_Query( $argsglobal );
            ?>

            <?php if ( $queryg->have_posts() ) : ?>
            
            <ul class="employees">
            <?php while ( $queryg->have_posts() ) : $queryg->the_post(); ?>
                <li>
                    <?php
                        $mail = get_field('employee_mail');
                     if ( $mail ) : ?>
                    <a href="mailto:<?php echo $mail ?>">
                        <div class="icone">
                            <svg class="icon icon--sm">
                                <use xlink:href="#icon-mail"></use>
                            </svg>
                        </div>
                    </a>
                    <?php endif; ?>

                    <div class="infos">
                        <p class="name"><?php the_title(); ?></p>
                        <?php if (get_field('employee_function')): ?>
                            <span class="circle"></span>
                            <p><?php the_field('employee_function'); ?></p>
                        <?php endif; ?>
                    </div>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php else : ?>
                <p><?php the_field('aucun_employe', 'options'); ?></p>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>

        <?php endif; ?>


        <?php if( $list_slug == "list_perso" ): ?>

            <?php if( have_rows('text_repeat_liste') ): ?>
                <ul class="employees">
                <?php while( have_rows('text_repeat_liste') ): the_row(); ?> 
                    <li><?php the_sub_field('list_element'); ?></li>
                <?php endwhile; ?>
                </ul>
            <?php endif; ?>

        <?php endif; ?>


    <?php endif; ?>
    </div>
</div>