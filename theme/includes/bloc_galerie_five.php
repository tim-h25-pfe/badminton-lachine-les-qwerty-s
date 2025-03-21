<?php 
$images = get_sub_field('five_galerie');
if( $images ): ?>
    

<section class="galerySwiper section" data-scrolly="fromBottom">
    <div class="wrapper">
        <div class="swiper js-swiper-gallerySwiper" data-component="Carousel" data-loop>
            <div class="swiper-wrapper">
            <?php foreach( $images as $image_id ): ?>                
                <div class="swiper-slide">
                <?php echo wp_get_attachment_image( $image_id, 'full' ); ?>  
                </div>
            <?php endforeach; ?>
            </div>
            <div class="btn_nav">
                <div class="swiper-button-prev btn_full btn_round">
                    <svg class="icon">
                        <use xlink:href="#icon-fleche"></use>
                    </svg>
                </div>
                <div class="swiper-button-next btn_full btn_round">
                    <svg class="icon">
                        <use xlink:href="#icon-fleche"></use>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>