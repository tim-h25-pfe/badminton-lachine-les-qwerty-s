<!DOCTYPE html>

<html lang="fr">



<head>

    <meta charset="<?php bloginfo('charset'); ?>" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?php bloginfo('name'); ?></title>



    <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/styles/main.css" />

    <script>

        // pour que les icônes marchent
         iconsPath = '<?php bloginfo('template_url') ?>/';

    </script>

    <script src="<?php bloginfo('template_url') ?>/scripts/main.js" defer></script>

    <?php wp_head(); ?>

</head>

<body>
    <div class="overlay"></div>

    <header class="header" data-component="Header" data-treshold="0.2">
      <div class="wrapper">
        <div class="nav_header">
        <?php $image = get_field('header_logo', 'options'); ?>
                 <?php if ($image): ?>
          <a href="<?php bloginfo('url') ?>" class="logo"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"></a>
          <?php endif ?>
        <nav class="menu nav-primary">
          <ul>
          <?php 
            $link = get_field('header_subscribe', 'options');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
            <li class="bouton_inscription"><a href="#" class="nav-primary__item"><a href="<?php echo esc_url( $link_url ); ?>" class="nav-primary__item"><?php echo esc_html( $link_title ); ?></a></a></li>
            <?php endif; ?>
            <li>
                <a href="#" class="nav-primary__item search-toggle">
                    <svg class="icon icon--md">
                        <use xlink:href="#icon-rechercher"></use>
                    </svg>
                </a>
            </li>

           
            <?php 
            $link = get_field('header_shop', 'options');
              if( $link ): ?>
            <li><a href="<?php echo esc_url( $link ); ?>" class="nav-primary__item"><svg class="icon icon--md">

                <use xlink:href="#icon-panier"></use>
            </svg></a></li>
            <?php endif; ?>
            <li><a href=""><button class="header__toggle js-toggle">
              <span></span>
              <span></span>
            </button></a></li>
          </ul>
        </nav>

        </div>
        
        <div class="search-bar">
          <input type="text" placeholder="Rechercher...">
          <button class="search-close">✖</button>
        </div>

        
       
      </div>
    </header>

<div class="nav_menu">
 
  <button class="menu-close header__toggle">
    <div class="close-circle">
      <span></span>
      <span></span>
      
      <div class="allignement_horizontal">
   


        
      </div>

      
      
     
    </div>
  </button>
  
  
  <div class="grid">
      
      <?php $image = get_field('header_image', 'options'); ?>
                 <?php if ($image): ?>
          <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
          <?php endif ?>

          <nav class="content_menu">

                <?php wp_nav_menu(array(
                'theme_location' => 'menu_header_vedette',
                'container' => 'div',
                'menu_class' => 'menu_titres',
            )); ?>

                <?php wp_nav_menu(array(
                'theme_location' => 'menu_header_sections',
                'container' => 'div',
                'menu_class' => 'menu_soustitres',
            )); ?>

              <?php 
            $link = get_field('footer_subscribe', 'options');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
            <div class="alignement">
                <a class="btn_circled_menu" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                <?php echo esc_html( $link_title ); ?>
                <svg class="icon">
                    <use xlink:href="#icon-ovalDessin"></use>
                </svg>
                </a>
                <?php 
            $link = get_field('footer_steps', 'options');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a href="<?php echo esc_url( $link_url ); ?>" class="underline"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
            </div>
            <?php endif; ?>

          
              
         </nav>
      </div>
  
</div>

