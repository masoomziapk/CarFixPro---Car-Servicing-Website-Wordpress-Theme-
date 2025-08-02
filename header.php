<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="container">
        <div class="branding">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                echo '<h1>' . get_bloginfo('name') . '</h1>';
            }
            ?>
            <p class="site-description"><?php bloginfo('description'); ?></p>
        </div>

        <nav class="main-nav">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'nav-menu'
            ]);
            ?>
        </nav>
    </div>
</header>
