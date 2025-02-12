<?php get_header(); ?>

    <section class="hero">
    <div class="hero__media">
        <img class="bgHero" src="<?php bloginfo('template_url') ?>/assets/images/heroAccueil.jpg" alt="" />
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

<section class="section partners">
    <div class="wrapper">
        <div class="swiper" data-autoplay data-loop data-freemode data-centered data-component="Carousel">
            <div class="bkg_filter"></div>
            <div class="swiper-wrapper">
                <div class="swiper-slide icon--lg">
                    <svg class="icon">
                        <use xlink:href="#icon-conseilSportMontreal"></use>
                    </svg>
                </div>
                <div class="swiper-slide icon--lg">
                    <svg class="icon">
                        <use xlink:href="#icon-doMore"></use>
                    </svg>
                </div>
                <div class="swiper-slide icon--lg">
                    <svg class="icon">
                        <use xlink:href="#icon-badmintonQuebec"></use>
                    </svg>
                </div>
                <div class="swiper-slide icon--lg">
                    <svg class="icon">
                        <use xlink:href="#icon-lachineMontreal"></use>
                    </svg>
                </div>
                <div class="swiper-slide icon--lg">
                    <svg class="icon">
                        <use xlink:href="#icon-conseilSportMontreal"></use>
                    </svg>
                </div>
                <div class="swiper-slide icon--lg">
                    <svg class="icon">
                        <use xlink:href="#icon-doMore"></use>
                    </svg>
                </div>
                <div class="swiper-slide icon--lg">
                    <svg class="icon">
                        <use xlink:href="#icon-badmintonQuebec"></use>
                    </svg>
                </div>
                <div class="swiper-slide icon--lg">
                    <svg class="icon">
                        <use xlink:href="#icon-lachineMontreal"></use>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section about">
    <div class="wrapper">
        <div class="bigCard">
            <div class="about__content">
                <h4>
                    Nous sommes un organisme à but non lucratif qui a comme objectif d’être un acteur majeur du
                    badminton à Montréal.
                </h4>
                <p>
                    Que vous soyez un débutant ou un joueur expérimenté, nos programmes sont conçus pour vous aider à
                    perfectionner votre technique et atteindre vos objectifs en badminton.
                </p>
                <a class="btn_full" href="#">qui sommes-nous ?</a>
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

    <section>
        <div class="wrapper">
        <?php the_content(); ?>
        <div class="cards">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <a href="<?php the_permalink(); ?>">
                <div class="card">
                    <div class="card__media">
                    <?php the_post_thumbnail(); ?>
                    </div>
                    <div class="card__content">
                    <!-- on peut get le php ici pour le titre de la page -->
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_excerpt(); ?></p>
                        
                    </div>
                </div>
                </a>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </div>
        </div>
    </section>
    

<?php get_footer(); ?>