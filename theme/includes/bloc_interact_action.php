<!-- BLOC CTA CONTACT -->
<?php if (get_sub_field('interact_titre')): ?>
<section class="section">
    <div class="wrapper">
        <a class="lien-contact">
            <div class="lien-contact__content">
                <h4><?php the_sub_field('interact_surtitre'); ?></h4>
                <h2><?php the_sub_field('interact_titre'); ?></h2>
            </div>
            <div class="lien-contact__media"></div>
        </a>
    </div>
</section>
<?php endif; ?>