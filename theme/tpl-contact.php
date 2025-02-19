<?php
/* Template Name: Contact */
?>

<?php get_header(); ?>

<section class="contact">
    <div class="wrapper">
        <div class="contact_grid">
            <div class="contact_contenu">
                <h3><?php the_title(); ?></h3>
                <div class="contenu_description">
                    <p>Nous serions ravis d’échanger avec vous !</p>
                    <p>N’hésitez pas à nous contacter en remplissant le formulaire suivant.</p>
                </div>

                <div class="contact_courriel">
                    <h6>Courriel</h6>
                    <a href="mailto:contact@badmintonlachine.com" target="_blank">contact@badmintonlachine.com</a>
                </div>
                <div class="contact_adresse">
                    <h6>Adresse du club</h6>
                    <a href="https://maps.app.goo.gl/kqeBZsaCEtqf2Evu5" target="_blank"
                        >2901, boulevard Saint-Joseph Lachine H8S 4B7
                    </a>
                </div>
                <div class="contact_sociaux">
                    <h6>Réseaux sociaux</h6>
                    <div class="social_icon">
                        <a href="https://www.facebook.com/share/159mDcyLqi/?mibextid=wwXIfr" target="_blank"
                            ><img src="<?php bloginfo('template_url') ?>/assets/icons/facebook.svg" alt="facebook"
                        /></a>
                        <a href="https://www.instagram.com/badmintonlachine?igsh=MXFmMTIxcDdoZW90aA==" target="_blank"
                            ><img src="<?php bloginfo('template_url') ?>/assets/icons/instagram.svg" alt="instagram"
                        /></a>
                    </div>
                </div>
                <div class="contact_liens">
                    <h6>Voici quelques liens utiles :</h6>
                    <div class="liens">
                        <ul>
                            <li><a href="https://reseausportsadultes.com/" target="_blank">RSL</a></li>
                            <li>
                                <a href="https://laplumedequebec.wordpress.com/" target="_blank">Plume de Québec</a>
                            </li>
                            <li>
                                <a href="https://icbadmontreal.com/" target="_blank">Championnat Interclub Montréal</a>
                            </li>
                            <li>
                                <a href="https://www.badminton.ca/" target="_blank"
                                    >Badminton Canada (tournois nationaux)</a
                                >
                            </li>
                            <li>
                                <a href="https://www.badmintonquebec.com/" target="_blank"
                                    >Badminton Québec (tournois ABC et Juniors provinciaux)</a
                                >
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="contact_formulaire">
                <form class="contact_form">
                <?php the_content(); ?>
                </form>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>