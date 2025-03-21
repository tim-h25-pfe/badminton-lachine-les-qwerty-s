<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
<button type="submit" class="search-submit">
        <img src="<?php bloginfo('template_url') ?>/assets/icons/search.svg" alt="" />
    </button>
    <input type="search" class="search-field" placeholder="<?php the_field('recherchererer', 'options'); ?>..." value="<?php echo get_search_query(); ?>" name="s">
</form>
