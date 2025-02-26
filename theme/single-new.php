<?php get_header(); ?>

<section class="bloc-article nouvelle section-large">
    <div class="wrapper">
        <div class="grid-container">
            <div class="main-content">
                <div class="module module-header">
                    <div class="sous-titre">
                        <h6>Publié le 21 novembre 2024</h6>
                        <h5 class="btn_full">Divers</h5>
                    </div>
                    <h3>Hommage à Reynald Comeau</h3>
                    <img src="assets/images/hero.png" alt="" />
                </div>
                <div class="module extra-space">
                    <p>
                        Le club Badminton Lachine désire rendre hommage à un des tous premiers membres du club, Reynald.
                    </p>
                    <p>
                        Pour ceux qui le connaissent, on se rappelle de Reynald comme étant toujours souriant,
                        rassembleur et généreux. Il était le mélangeur de raquettes de choix! Reynald avait le don
                        d’aller chercher les gens seuls sur le banc et les intégrer au groupe. Plusieurs membres ont
                        continué de venir au club à cause de Reynald
                    </p>
                </div>
                <div class="module extra-space">
                    <p><span>Un passionné de badminton et de partage</span></p>
                    <p>
                        Certains ont eu la chance de jouer avec lui au badminton pendant plus de 20 ans! Il a même été
                        notre photographe à certains de nos tournois, bénévolement bien sûr. Reynald était un bon
                        vivant, sa bonne humeur était contagieuse.
                    </p>
                </div>
                <div class="module extra-space">
                    <p><span>Un vide immense</span></p>
                    <p>
                        Nous avons tous ressenti le vide créé par l’absence de Reynald sur nos terrains il y a déjà un
                        certain temps. Reynald, tu as été notre rayon de soleil pendant si longtemps, nous souhaitons
                        maintenant que tu puisses continuer de briller là-haut. ✨
                    </p>
                </div>
            </div>
            <div class="sidebar">
                <h4>Article similaire</h4>

                <div class="cards-nouvelles">
                    <div class="card">
                        <div class="card__content">
                            <div class="text">
                                <h5>Lorem ipsumLorem ipsum</h5>
                                <p>Lorem ipsumLorem ipsum</p>
                            </div>
                            <a class="btn_full btn_round" href="#">
                                <svg class="icon">
                                    <use xlink:href="#icon-fleche"></use>
                                </svg>
                            </a>
                        </div>
                        <div class="card__media">
                            <img src="assets/images/nouvelles.jpg" alt="image de la nouvelle" />
                        </div>
                    </div>
                </div>
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