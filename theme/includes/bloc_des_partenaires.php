<!-- BLOC CAROUSEL DÉFILANT -->
<?php 
$images = get_sub_field('galerie_partners');
if( $images ): ?>
<section class="section partners">
    <div class="wrapper">
        <div class="swiper js-swiper-partenaire" data-component="Carousel" data-autoplay
            data-loop
            data-freemode
            data-centered>
            <div class="bkg_filter"></div>
            <div class="swiper-wrapper">
            <?php foreach( $images as $image_id ): ?>
                <div class="swiper-slide">
                    <?php echo wp_get_attachment_image( $image_id, 'full' ); ?> 
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>