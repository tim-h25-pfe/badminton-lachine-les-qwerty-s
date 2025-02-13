<?php if (have_rows('cw4_film_blocs')) : ?>
            <?php while (have_rows('cw4_film_blocs')) : the_row(); ?>

                <?php include ('includes/'. get_row_layout() .'.php'); ?>

            <?php endwhile; ?>
        <?php endif; ?>