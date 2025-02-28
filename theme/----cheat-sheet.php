<!-- fonctions wordpress de base  -->
<?php the_title(); // titre ?>
<?php the_content(); // contenu ?>
<?php the_excerpt(); //résumé ?>
<?php the_category(); //la catégorie ?>
<?php the_permalink(); //le lien ?>
<?php the_post_thumbnail(); //thumbnail ?>
<?php the_post_thumbnail_url(); // lien thumbnail pour mettre dans le src?>

<!-- si ya pas le thumbnail on met une image pending  -->
<?php 
if (has_post_thumbnail()) { 
    the_post_thumbnail(); 
} else { ?>
    <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
<?php } ?>

<!-- get toutes les catégories  -->
<?php $categories = array(); ?>
<?php foreach( get_the_category() as $category ): ?>
    <?php array_push($categories, $category->name); ?>
<?php endforeach?>

<!-- liens et infos du site  -->
<?php bloginfo('url'); ?>
<?php bloginfo('template_url') ?>
<?php bloginfo('name') ?>
<?php bloginfo('chartset') ?>

<!-- champs acf retournant du texte  -->
<?php the_field('field_name'); ?>
<?php the_sub_field('field_name'); ?>
<!-- champ provenant d'une page d'options  -->
<?php the_field('propos_want', 'options'); ?>
<!-- condition si le champ existe  -->
<?php if (get_field('footer_mail')): ?>
    <p><?php the_field('footer_mail'); ?></p>
<?php endif; ?>

<!-- acf image avec retour en array  -->
<?php $image = get_field('field_name'); ?>
<?php if ($image): ?>
<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
<?php endif ?>

<!-- acf répéteur  -->
<?php if( have_rows('nom_repeteur') ): ?>
    <?php while( have_rows('nom_repeteur') ): the_row(); ?>
        <!-- truc à répéter  -->
    <?php endwhile; ?>
<?php endif; ?>

<!-- acf galerie avec retour en ID -->
<?php 
$images = get_field('acf_galerie');
if( $images ): ?>
    <?php foreach( $images as $image_id ): ?>
        <?php echo wp_get_attachment_image( $image_id, 'full' ); ?>                  
    <?php endforeach; ?>
<?php endif; ?>

<!-- acf link  -->
<?php 
$link = get_field('footer_steps');
if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>
    <a href="<?php echo esc_url( $link_url ); ?>" class="subscribe"><?php echo esc_html( $link_title ); ?></a>
    <?php endif; ?>

<!-- acf relation  -->
<?php $posts = get_field('cw4_film_acteurs'); ?>
    <?php if ($posts) : ?>
        <section class="section wrap o-typography">
            <h2>Acteurs</h2>
            <div class="cards">
                <?php foreach ($posts as $p) : // Utilisez $p, jamais $post (IMPORTANT) ?>
                    <article class="card">
                        <a href="<?php echo get_permalink($p->ID); ?>">
                            <div class="card__media">
                                <?php echo get_the_post_thumbnail($p->ID); ?>
                            </div>
                        </a>
                        <div class="card__content">
                            <h2>
                                <?php echo get_the_title($p->ID); ?>
                            </h2>
                            <?php echo get_the_content($p->ID); ?>
                            <i class="fas fa-globe-americas"></i>
                            <span><?php the_field('cw4_acteur_nationalite', $p->ID); ?></span>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

<!-- requete wp query pour get les cpt  -->
<?php if ($the_post_type == 'new') : ?>       
<?php   
$argsglobal = array(
    'post_type' => 'recette',
    'post_status' => 'publish',
    'orderby' => 'publish',
    'order' => 'ASC',
    'posts_per_page' => 3,
);
$queryg = new WP_Query( $argsglobal );
?>
<?php if ( $queryg->have_posts() ) : ?>
            <?php while ( $queryg->have_posts() ) : $queryg->the_post(); ?>
            
            <?php endwhile; ?>
<?php else : ?>
        <p>Aucun post.</p>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
