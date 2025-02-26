<?php get_header(); ?>

<?php include ('includes/bloc_hero_reuse.php'); ?>

<section class="bloc-article carrieres section-large">
    <div class="wrapper">
        <div class="grid-container">
            <div class="main-content">
                <div class="module module-header separator">

                    <h5><?php the_field('job_title'); ?></h5>

                    <?php if (get_field('job_localisation')): ?>
                    <div class="module-header-section">
                        <svg class="icon">
                            <use xlink:href="#icon-pin"></use>
                        </svg>
                        <p><?php the_field('job_localisation'); ?></p>
                    </div>
                    <?php endif; ?>

                    <?php if (get_field('job_salaire')): ?>
                    <div class="module-header-section">
                        <svg class="icon">
                            <use xlink:href="#icon-cash"></use>
                        </svg>
                        <p><?php the_field('job_salaire'); ?></p>
                    </div>
                    <?php endif; ?>

                </div>

                <?php if (get_field('job_taches')): ?>
                <div class="module extra-space">
                    <h5>Description de l’offre</h5>
                    <?php the_field('job_taches'); ?>
                </div>
                <?php endif; ?>

                <div class="module extra-space separator">
                <h5>Exigences requises</h5>

                    <?php if (get_field('job_age')): ?>
                    <p><span>Âge :</span> <?php the_field('job_age'); ?></p>
                    <?php endif; ?>

                    <?php if (get_field('job_know')): ?>
                    <p><span>Connaissances des règles du badminton : </span><?php the_field('job_know'); ?></p>
                    <?php endif; ?>

                    <?php if (get_field('job_technical')): ?>
                    <?php the_field('job_technical'); ?>
                    <?php endif; ?>

                    <?php if( have_rows('job_disponibilites') ): ?>
                    <p><span>Disponibilités : </span></p>
                    <ul>
                    <?php while( have_rows('job_disponibilites') ): the_row(); ?>
                        <li><?php the_sub_field('job_dispo'); ?></li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>

                    <?php if (get_field('job_details_dispo')): ?>
                    <p><?php the_field('job_details_dispo'); ?></p>
                    <?php endif; ?>

                    <?php if (get_field('job_langages')): ?>
                    <p><span>Langues : </span><?php the_field('job_langages'); ?></p>
                    <?php endif; ?>

                    <?php if( have_rows('job_qualities') ): ?>
                    <p><span>Autres qualités recherchées : </span></p>
                    <ul>
                    <?php while( have_rows('job_qualities') ): the_row(); ?>
                        <li><?php the_sub_field('job_quality'); ?></li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>

                    <?php if (get_field('job_option')): ?>
                    <p><span>Optionnel :</span> <?php the_field('job_option'); ?></p>
                    <?php endif; ?>

                   
                  
                    
                </div>
                <?php if (get_field('formulaire_de_candidature')): ?>
                    <h5>Soumettre ma candidature</h5>
                    <?php the_field('formulaire_de_candidature'); ?>
            <?php endif; ?>
            </div>


            <div class="sidebar">

                <?php $posts = get_field('job_other'); ?>
                <?php if ($posts) : ?>
                <?php foreach ($posts as $p) : // Utilisez $p, jamais $post (IMPORTANT) ?>
                <div class="module-side">
                    <h5><?php echo get_the_title($p->ID); ?></h5>
                    <p>
                    <?php echo get_the_content($p->ID); ?>
                    </p>
                    <a href="<?php echo get_permalink($p->ID); ?>" class="btn_full">
                        En savoir plus
                        <svg class="icon">
                            <use xlink:href="#icon-fleche"></use>
                        </svg>
                    </a>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>

                <?php if( have_rows('repeat_avantages') ): ?>
                <div class="module-side">
                    <h5>Les avantages</h5>
                    <ul>
                    <?php while( have_rows('repeat_avantages') ): the_row(); ?>
                        <li><?php the_sub_field('job_avantage'); ?></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <?php endif; ?>

                <?php if (get_field('contact_mail')): ?>
                <div class="module-side">
                    <h5>Soumettre ma candiature par courriel</h5>
                    <p><?php the_field('contact_description'); ?></p>
                    <a href="mailto:<?php the_field('contact_mail'); ?>"><?php the_field('contact_mail'); ?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
    

<?php get_footer(); ?>