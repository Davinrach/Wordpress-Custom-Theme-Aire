<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site min-h-screen flex flex-col">
<header id="masthead" class="site-header bg-white border-b border-gray-50 sticky top-0 z-50 flex items-center" style="height: 100px;">
    <div class="container mx-auto px-4 flex justify-between items-center w-full">
        <div class="site-branding shrink-0">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Aire Optima.png" alt="Aire Optima Logo" style="height: 100px; width: auto;">
            </a>
        </div>
        
        <nav id="site-navigation" class="main-navigation hidden lg:flex items-center justify-center flex-grow">
            <ul class="flex items-center gap-10 font-bold text-gray-800" style="font-size: 20px;">
                <li class="flex items-center gap-1 cursor-pointer hover:text-blue-600 transition-colors">Layanan <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/mingcute--up-line.svg" alt="" class="h-4 w-4 opacity-70 rotate-180"></li>
                <li class="flex items-center gap-1 cursor-pointer hover:text-blue-600 transition-colors">Produk <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/mingcute--up-line.svg" alt="" class="h-4 w-4 opacity-70 rotate-180"></li>
                <li class="flex items-center gap-1 cursor-pointer hover:text-blue-600 transition-colors">Gabung Mitra <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/mingcute--up-line.svg" alt="" class="h-4 w-4 opacity-70 rotate-180"></li>
                <li><a href="#" class="hover:text-blue-600 transition-colors">Artikel</a></li>
                <li><a href="#" class="hover:text-blue-600 transition-colors">Tentang</a></li>
            </ul>
        </nav>
        
        <div class="header-actions shrink-0">
            <a href="#" class="bg-[#007BB5] hover:bg-[#006699] text-white rounded-[50px] font-bold transition-all shadow-md inline-block" style="padding: 15px 29px; font-size: 20px;">
                Klaim Diskon !
            </a>
        </div>
    </div>
</header>
