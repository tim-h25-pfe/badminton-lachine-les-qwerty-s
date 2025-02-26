<!-- fonctions wordpress de base  -->
<?php the_title(); // titre ?>
<?php the_content(); // contenu ?>
<?php the_excerpt(); //résumé ?>
<?php the_category(); //la catégorie ?>
<?php the_post_thumbnail(); //thumbnail ?>
<?php the_post_thumbnail_url(); // lien thumbnail pour mettre dans le src?>
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
        <?php echo wp_get_attachment_image( $image_id ); ?>                  
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