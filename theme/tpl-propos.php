<?php
/* Template Name: À propos */
?>

<?php get_header(); ?>

<?php include ('includes/bloc_hero_reuse.php'); ?>

<section class="missions">
    <div class="wrapper">
        <div class="title">
            <h2>Historique</h2>
            <div class="underline">
                <svg class="icon icon--lg">
                    <use xlink:href="#icon-doubleLigneDessin"></use>
                </svg>
            </div>
        </div>

        <div class="missions_grid">
            <div class="mission">
                <h1>1</h1>
                <h4>Promotion</h4>
                <p>
                    Promouvoir le badminton auprès des personnes résidentes de Lachine et des environs en proposant des
                    programmes et des activités accessibles à tous.
                </p>
            </div>
            <div class="mission">
                <h1>2</h1>
                <h4>Accessibilité</h4>
                <p>Permettre l’accès facile au sport à tous les groupes d’âge et dans de bonnes conditions.</p>
            </div>
            <div class="mission">
                <h1>3</h1>
                <h4>Développement</h4>
                <p>
                    Participer au développement éducatif et sportif des enfants de Lachine et des environs par
                    l’intermédiaire du sport.
                </p>
            </div>
        </div>
    </div>
</section>

        <?php if (have_rows('bloc')) : ?>
            <?php while (have_rows('bloc')) : the_row(); ?>

                <?php include ('includes/'. get_row_layout() .'.php'); ?>

            <?php endwhile; ?>
        <?php endif; ?>

<?php get_footer(); ?>