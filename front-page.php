<?php get_header(); ?>

<section class="relative min-h-[90vh] flex flex-col overflow-hidden font-poppins" style="border-bottom-left-radius: 40px; border-bottom-right-radius: 40px; z-index: 10;">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Konten 1.jpeg" alt="Hero Background" class="w-full h-full object-cover">
        <div class="absolute inset-0" style="background-color: rgba(0, 0, 0, 0.7);"></div>
    </div>

    <!-- 1. Top Wing Info -->
    <div class="relative z-20 w-full">
        <div class="container mx-auto px-4">
            <div class="flex justify-end" style="margin-top: 15px; margin-bottom: 0px;">
                <div class="flex items-center gap-6 text-[13px] font-medium opacity-90 text-white">
                    <div class="flex items-center gap-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/oui--nav-maps.svg" alt="Location" class="w-4 h-4 brightness-0 invert">
                        <span>Jl. Barata Jaya XIX No. 57a</span>
                    </div>
                    <div class="h-4 w-[1px] bg-white/30 hidden md:block"></div>
                    <div class="flex items-center gap-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/pepicons-pencil--letter.svg" alt="Email" class="w-4 h-4 brightness-0 invert">
                        <span>aireoptima@gmail.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Hero Main Content (Title & Description) -->
    <div class="flex-grow flex items-center relative z-10 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl">
                <h1 class="mb-6 tracking-tight" style="font-size: 45px; line-height: 1.3; font-weight: 600; font-family: 'Lucida Bright', Georgia, serif;">
                    Jasa Service AC Terbaik,<br>
                    Profesional & Bergaransi
                </h1>
                <p class="text-white mb-8 max-w-3xl font-bold" style="font-size: 18px; line-height: 1.8; font-weight: 400; opacity: 1; font-family: 'Lucida Bright', Georgia, serif; letter-spacing: 1px;">
                    Solusi lengkap cuci, perbaikan, dan pasang AC 24 jam untuk wilayah Surabaya, Sidoarjo, dan Gresik dengan teknisi ahli bersertifikat.
                </p>
                <a href="#" class="inline-block bg-[#007BB5] hover:bg-[#006699] text-white px-10 py-4 rounded-full text-[18px] font-reguler transition-all shadow-xl">
                    Pesan Sekarang
                </a>
            </div>
        </div>
    </div>

    <!-- 3. Bottom Area (Apps) -->
    <div style="position: absolute; left: 0; bottom: 100px; z-index: 20; width: 100%;" class="flex justify-start">
        <div class="container mx-auto px-4">
            <div class="flex flex-col items-center gap-4 text-white" style="width: fit-content;"> 
                <p style="font-size: 15px; font-weight: 600; letter-spacing: 0.15em; margin: 0; text-align: center;">GET MOBILE APPS NOW !</p>
                <div class="flex items-center gap-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Playstore.png" alt="Google Play" style="height: 50px; width: auto; cursor: pointer;">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Appstore.png" alt="App Store" style="height: 50px; width: auto; cursor: pointer;">
                </div>
            </div>
        </div>
    </div>

    <!-- 4. Progress Bar (Absolute Bottom) -->
    <div style="position: absolute; left: 50%; transform: translateX(-50%); bottom: 35px; width: 100%; max-width: 280px; z-index: 50;" class="hidden md:block">
        <div style="height: 6px; width: 100%; background-color: rgba(255, 255, 255, 0.2); border-radius: 999px; overflow: hidden; display: flex;">
            <div style="background-color: #007BB5; width: 40%; height: 100%; box-shadow: 0 0 15px rgba(0, 123, 181, 0.6);"></div>
            <div style="background-color: white; width: 60%; height: 100%;"></div>
        </div>
    </div>
</section>

<!-- Next Section White Background -->
<div class="relative z-0 bg-white" style="height: 200px; margin-top: -40px;">
    <div class="container mx-auto px-4 pt-48 text-center">
        <!-- Next Content -->
    </div>
</div>

<?php get_footer(); ?>
