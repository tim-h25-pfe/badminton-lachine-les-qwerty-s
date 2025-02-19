<?php get_header(); ?>

    <section class="hero">
    <div class="hero__media">
        <img class="bgHero" src="<?php the_post_thumbnail_url(); ?>" alt="" />
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
        <div
            class="swiper js-swiper-partenaire"
            data-component="Carousel"
            data-autoplay
            data-loop
            data-freemode
            data-centered
        >
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
                <img class="traceVolant" src="<?php bloginfo('template_url') ?>/assets/images/traceVolant.png" alt="trace du volant" />
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

<section class="section services">
    <div class="wrapper">
        <div class="title">
            <h2>
                ser<span
                    >vices
                    <svg class="icon">
                        <use xlink:href="#icon-tripleLigneDessin"></use>
                    </svg>
                </span>
            </h2>
            <a class="btn_full btn_top" href="#"
                >Voir tout
                <svg class="icon">
                    <use xlink:href="#icon-fleche"></use>
                </svg>
            </a>
        </div>
        <div class="grid-services">
            <div class="service">
                <div class="service__media">
                    <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                </div>
                <div class="service__content">
                    <h5>Entraînement libre</h5>
                    <div class="more__content">
                        <a class="btn_full btn_white" href="#">En savoir plus </a>
                    </div>
                </div>
            </div>
            <div class="service">
                <div class="service__media">
                    <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                </div>
                <div class="service__content">
                    <h5>Entraînement libre</h5>
                    <div class="more__content">
                        <a class="btn_full btn_white" href="#">En savoir plus </a>
                    </div>
                </div>
            </div>
            <div class="service">
                <div class="service__media">
                    <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                </div>
                <div class="service__content">
                    <h5>Entraînement libre</h5>
                    <div class="more__content">
                        <a class="btn_full btn_white" href="#">En savoir plus </a>
                    </div>
                </div>
            </div>
            <div class="service">
                <div class="service__media">
                    <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                </div>
                <div class="service__content">
                    <h5>Entraînement libre</h5>
                    <div class="more__content">
                        <a class="btn_full btn_white" href="#">En savoir plus </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div
        class="swiper carousel-services js-swiper-accueilServices"
        data-component="Carousel"
        data-loop
        data-centered
        data-coverflow
    >
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="service">
                    <div class="service__media">
                        <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                    </div>
                    <div class="service__content">
                        <h5>Entraînement libres</h5>
                        <div class="more__content">
                            <a class="btn_full btn_white" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="service">
                    <div class="service__media">
                        <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                    </div>
                    <div class="service__content">
                        <h5>Entraînement libres</h5>
                        <div class="more__content">
                            <a class="btn_full btn_white" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="service">
                    <div class="service__media">
                        <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                    </div>
                    <div class="service__content">
                        <h5>Entraînement libres</h5>
                        <div class="more__content">
                            <a class="btn_full btn_white" href="#">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="service">
                    <div class="service__media">
                        <img src="<?php bloginfo('template_url') ?>/assets/images/cordageAccueilServices.jpg" alt="image de raquettes" />
                    </div>
                    <div class="service__content">
                        <h5>Entraînement libres</h5>
                        <div class="more__content">
                            <a class="btn_full btn_white" href="#">En savoir plus </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <a class="btn_full btn_bottom" href="#"
            >Voir tout
            <svg class="icon">
                <use xlink:href="#icon-fleche"></use>
            </svg>
        </a>
    </div>
</section>

<section class="section nouvelles">
    <div class="wrapper">
        <div class="title">
            <h2>
                no<span
                    >uvelles
                    <svg class="icon">
                        <use xlink:href="#icon-ligneDessin"></use>
                    </svg>
                </span>
            </h2>
            <a class="btn_full btn_white btn_top" href="#"
                >Voir tout
                <svg class="icon">
                    <use xlink:href="#icon-fleche"></use>
                </svg>
            </a>
        </div>
        <div class="cards-nouvelles">
            <div class="card">
                <div class="card__content">
                    <div class="text">
                        <h5>Gala de la reconnaissance</h5>
                        <p>Publié le 21 novembre 2024</p>
                    </div>
                    <a class="btn_full btn_round" href="#">
                        <svg class="icon">
                            <use xlink:href="#icon-fleche"></use>
                        </svg>
                    </a>
                </div>
                <div class="card__media">
                    <img src="<?php bloginfo('template_url') ?>/assets/images/nouvelles.jpg" alt="image de la nouvelle" />
                </div>
            </div>
            <div class="card">
                <div class="card__content">
                    <div class="text">
                        <h5>Gala de la reconnaissance</h5>
                        <p>Publié le 21 novembre 2024</p>
                    </div>
                    <a class="btn_full btn_round" href="#">
                        <svg class="icon">
                            <use xlink:href="#icon-fleche"></use>
                        </svg>
                    </a>
                </div>
                <div class="card__media">
                    <img src="<?php bloginfo('template_url') ?>/assets/images/nouvelles.jpg" alt="image de la nouvelle" />
                </div>
            </div>
            <div class="card">
                <div class="card__content">
                    <div class="text">
                        <h5>Gala de la reconnaissance</h5>
                        <p>Publié le 21 novembre 2024</p>
                    </div>
                    <a class="btn_full btn_round" href="#">
                        <svg class="icon">
                            <use xlink:href="#icon-fleche"></use>
                        </svg>
                    </a>
                </div>
                <div class="card__media">
                    <img src="<?php bloginfo('template_url') ?>/assets/images/nouvelles.jpg" alt="image de la nouvelle" />
                </div>
            </div>
        </div>
        <a class="btn_full btn_white btn_bottom" href="#"
            >Voir tout
            <svg class="icon">
                <use xlink:href="#icon-fleche"></use>
            </svg>
        </a>
    </div>
</section>

<section class="section">
    <div class="wrapper">
        <a class="lien-contact" href="<?php bloginfo('url') ?>/contact">
            <div class="lien-contact__content">
                <h4>Besoin d'infos ?</h4>
                <h2>parlons-en !</h2>
            </div>
            <div class="lien-contact__media"></div>
        </a>
    </div>
</section>
    

<?php get_footer(); ?>