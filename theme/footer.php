<footer class="footer">
    <div class="wrapper">

        <?php wp_nav_menu(array(
                'theme_location' => 'menu_header_vedette',
                'container' => 'nav',
                'container_class' => 'principal',
            )); ?>


        <?php wp_nav_menu(array(
                'theme_location' => 'menu_header_sections',
                'container' => 'nav',
                'container_class' => 'secondary',
            )); ?>

        <div class="sociaux">
            <div class="inscription">
                <a class="btn_circled" href="#">
                    inscrivez-vous
                <svg class="icon">
                    <use xlink:href="#icon-ovalDessin"></use>
                </svg>
                </a>
                <a href="#" class="subscribe">Comment s'inscrire</a>
            </div>
            <div class="social">
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
            </div>
        </div>

        <div class="copyright">
            <div class="contact">
               <p>contact@badmintonlachine.com</p>
                <p>2901, boulevard Saint-Joseph, Lachine H8S 4B7</p>
            </div>
            <div class="credits">
                <a href="#">Politique de confidentialité</a>
                <a href="#">Crédits</a>
            </div>
                <p>Tous droits réservés © 2025 Badminton Lachine</p>
        </div>
        
    </div>
    <div class="passion">
        <h1>Le badminton,</h1>
        <h1>
            notre
            <span
                >passion
                <svg class="icon">
                    <use xlink:href="#icon-ovalDessin"></use>
                </svg>
            </span>
        </h1>
    </div>
   
</footer>
<?php wp_footer(); ?>
</body>
</html>