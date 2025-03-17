<?php 
$images = get_sub_field('full_galerie');
if( $images ): ?>
<section class="fullGallerySwiper section">
    <div class="swiper js-swiper-fullGallerySwiper" data-component="Carousel" data-loop>
        <div class="swiper-wrapper">
        <?php foreach( $images as $image_id ): ?>

            <div class="swiper-slide">
            <?php echo wp_get_attachment_image( $image_id, 'full' ); ?> 
            </div>
            <?php endforeach; ?>
            
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
<?php endif; ?>