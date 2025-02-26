<?php get_header(); ?>

<section class="hero">
    <div class="hero__media">
        <img class="bgHero" src="assets/images/heroAccueil.jpg" alt="" />
        <div class="bkg_filter"></div>
    </div>
    <div class="wrapper">
        <div class="bigTitle">
            <h1>Le badminton,</h1>
            <h1>
                notre
                <span
                    >passion
                    <svg class="icon">
                        <use xlink:href="#icon-doubleLigneDessin"></use>
                    </svg>
                </span>
            </h1>
        </div>
        <div class="hero_content">
            <p>Fier d’être la plus grande institution de badminton sur l’île de Montréal depuis 2011!</p>
            <a class="btn_circled" href="#"
                >inscrivez-vous
                <svg class="icon">
                    <use xlink:href="#icon-ovalDessin"></use>
                </svg>
            </a>
        </div>
    </div>
</section>

<section class="section about">
    <div class="wrapper">
        <div class="bigCard">
            <div class="about__content">
                <img class="traceVolant" src="assets/images/traceVolant.png" alt="trace du volant" />
                <h4>
                    Nous sommes un organisme à but non lucratif qui a comme objectif d’être un acteur majeur du
                    badminton à Montréal.
                </h4>
                <p>
                    Que vous soyez un débutant ou un joueur expérimenté, nos programmes sont conçus pour vous aider à
                    perfectionner votre technique et atteindre vos objectifs en badminton.
                </p>
                <a class="btn_outline" href="#">Qui sommes-nous ?</a>
            </div>
            <div class="about__stats">
                <div class="stat">
                    <h3>15 ans</h3>
                    <p>D’expérience</p>
                </div>
                <div class="stat">
                    <h3>10 000+</h3>
                    <p>Joueurs accueilis</p>
                </div>
                <div class="stat">
                    <h3>4</h3>
                    <p>Professionnels</p>
                </div>
                <div class="stat">
                    <h3>100%</h3>
                    <p>Plaisir garanti</p>
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