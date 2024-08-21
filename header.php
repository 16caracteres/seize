<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
    <?php wp_body_open(); ?>

    <header class="header">
        <div class="header__logo">
            <a href="<?php echo home_url( '/' ); ?>" class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/SVG/logo.svg" alt="Logo">
            </a>
        </div>
        
        
        <nav class="menu">
            <?php
                wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'container' => 'ul',
                    'menu_class' => 'menu__list',
                    ]);
            ?>
            <!-- Menu burger -->
            <button class="menu__burger"></button>
            <?php
                wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'container' => 'ul',
                    'menu_class' => 'menu__list-burger',
                    ]);
            ?>
        </nav>

    </header>