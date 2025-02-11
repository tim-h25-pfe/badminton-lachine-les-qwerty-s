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
    <header class="header" data-component="Header" data-treshold="0.2">
      <div class="wrapper">
        <a href="<?php bloginfo('url'); ?>" class="logo"><?php bloginfo('name'); ?></a>
        
        <nav class="menu nav-primary">
          <ul>
            <li><a href="#" class="nav-primary__item">Lien 1</a></li>
            <li><a href="#" class="nav-primary__item">Lien 2</a></li>
            <li><a href="#" class="nav-primary__item">Lien 3</a></li>
            <li><a href="#" class="nav-primary__item">Lien 3</a></li>
          </ul>
        </nav>
        <button class="header__toggle js-toggle">
          <span></span>
          <span></span>
          <span></span>
      </button>
      </div>
    </header>

