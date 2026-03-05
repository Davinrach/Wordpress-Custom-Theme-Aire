<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <style>
        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999;
            transition: background-color 0.4s ease, height 0.4s ease, box-shadow 0.4s ease;
            background-color: transparent !important;
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
        }
        
        /* Handle WordPress Admin Bar */
        body.admin-bar .site-header {
            top: 32px;
        }
        @media screen and (max-width: 782px) {
            body.admin-bar .site-header {
                top: 46px;
            }
        }

        .header-scrolled {
            background-color: white !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
            height: 80px !important;
        }
        
        .header-scrolled .nav-menu {
            color: #1f2937 !important;
        }
        
        .header-scrolled .header-logo,
        .header-scrolled .nav-icon {
            filter: none !important;
        }
        
        .header-scrolled .nav-menu li:hover {
            color: #2563eb !important;
        }

        /* Initial state colors for dark hero background */
        .nav-menu {
            color: white;
        }
        .nav-icon {
            filter: brightness(0) invert(1);
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site min-h-screen flex flex-col">
<header id="masthead" class="site-header flex items-center" style="height: 90px;">
    <div class="container mx-auto flex justify-between items-center w-full" style="padding-left: clamp(40px, 15vw, 80px); padding-right: 40px;">
        <div class="site-branding shrink-0">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Aire Optima.png" alt="Aire Optima Logo" class="header-logo transition-all duration-500" style="height: 70px; width: auto;">
            </a>
        </div>
        
        <nav id="site-navigation" class="main-navigation hidden lg:flex items-center justify-center flex-grow">
            <ul class="nav-menu flex items-center gap-10 font-bold text-white transition-none" style="font-size: 16px;">
                <li class="flex items-center gap-1 cursor-pointer hover:text-blue-400 transition-colors duration-500">Layanan <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/mingcute--up-line.svg" alt="" class="nav-icon h-4 w-4 opacity-70 rotate-180 brightness-0 invert transition-all duration-500"></li>
                <li class="flex items-center gap-1 cursor-pointer hover:text-blue-400 transition-colors duration-500">Produk <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/mingcute--up-line.svg" alt="" class="nav-icon h-4 w-4 opacity-70 rotate-180 brightness-0 invert transition-all duration-500"></li>
                <li class="flex items-center gap-1 cursor-pointer hover:text-blue-400 transition-colors duration-500">Gabung Mitra <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/mingcute--up-line.svg" alt="" class="nav-icon h-4 w-4 opacity-70 rotate-180 brightness-0 invert transition-all duration-500"></li>
                <li class="flex items-center transition-colors duration-500"><a href="#" class="hover:text-blue-400">Artikel</a></li>
                <li class="flex items-center transition-colors duration-500"><a href="#" class="hover:text-blue-400">Tentang</a></li>
            </ul>
        </nav>
        
        <div class="header-placeholder shrink-0 lg:w-[150px]"></div>
    </div>
</header>
