<!DOCTYPE html>
<html <?php language_attributes(); ?>>
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
            <li class="bouton_inscription"><a href="<?php echo esc_url( $link_url ); ?>" class="nav-primary__item btn_full btn_top"><?php echo esc_html( $link_title ); ?></a></li>
            <?php endif; ?>
            <li>
                <a href="#" class="nav-primary__item search-toggle">
                    <svg class="icon icon--md">
                        <use xlink:href="#icon-rechercher"></use>
                    </svg>
                </a>
            </li>
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

              
            <div class="alignement">

                <?php 
                $link = get_field('footer_subscribe', 'options');
                if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="btn_circled_menu" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                <?php echo esc_html( $link_title ); ?>
                <svg class="icon">
                    <use xlink:href="#icon-ovalDessin"></use>
                </svg>
                </a>
                <?php endif; ?>

                <div style="display: flex;gap: 20px;align-items: center;margin-top: 60px;">
                <?php 
                $link = get_field('header_shop', 'options');
                  if( $link ): ?>
                <a href="<?php echo esc_url( $link ); ?>"><svg class="icon icon--lg">
                    <use xlink:href="#icon-panier"></use>
                </svg></a>
                <?php endif; ?>
                <?php
                $languages = pll_the_languages(array('raw' => 1)); // Récupère les langues sous forme de tableau

                $current_language = pll_current_language(); // Langue actuelle

                foreach ($languages as $lang_code => $lang_info) {
                    if ($lang_code !== $current_language) {
                        $translated_url = $lang_info['url']; // URL de la version traduite
                        ?>
                        <a href="<?php echo esc_url($translated_url); ?>"><?php echo strtoupper($lang_code); ?></a>
                        <?php
                    }
                }
                ?>
                </div>
                
            </div>
            

          
              
         </nav>
      </div>
  
</div>

