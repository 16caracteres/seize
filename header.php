<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
    <?php wp_body_open(); ?>
    <div class="page-transition is-active"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/SVG/logo_dark.svg" alt="Logo Transition"></div>

    <header class="header">
        <div class="header__logo">
            <a href="<?php echo home_url( '/' ); ?>" class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/SVG/logo.svg" alt="Logo">
            </a>
        </div>
        
        
        <nav class="menu">
            <?php 
                if ( is_front_page() ) { 
                
                    wp_nav_menu([
                        'theme_location' => 'main-menu',
                        'container' => 'ul',
                        'menu_class' => 'menu__list',
                        ]);
                    
                    //Menu burger
                    echo '<button class="menu__burger"></button>';
                    
                    wp_nav_menu([
                        'theme_location' => 'main-menu',
                        'container' => 'ul',
                        'menu_class' => 'menu__list-burger',
                        ]);
                
                } else { 
                    ?>
                        <a href=" <?php echo home_url( '/' ) ?>" class="retour">Retour</a>
                    <?php 
                }
            ?>
            
        </nav>

    </header>