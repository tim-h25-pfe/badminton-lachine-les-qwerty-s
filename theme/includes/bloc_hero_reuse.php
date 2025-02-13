<section class="hero block <?php the_field('hero_align'); ?>">
    <div class="wrapper">
        <div class="hero__media">
            <img class="bgHero" src="<?php the_post_thumbnail_url(); ?>" alt="hero" />
        </div>
        <div class="hero__content">
            <h1><?php the_title(); ?></h1>
            <div class="underline">
                <svg class="icon icon--lg">
                    <use xlink:href="#icon-doubleLigneDessin"></use>
                </svg>
            </div>
        </div>
    </div>
</section>