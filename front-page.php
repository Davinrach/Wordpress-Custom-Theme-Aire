<?php get_header(); ?>
<style>
    html {
        scroll-snap-type: y mandatory;
        scroll-behavior: smooth;
        scroll-padding-top: 100px; /* Jarak untuk sticky header */
    }

    /* Target semua bagian untuk snapping */
    section, footer {
        scroll-snap-align: start;
        scroll-snap-stop: always;
    }

    :root {
        --service-card-height: 380px;
        --service-card-width: 380px;             /* Taller cards for square look */
        --service-card-radius: 40px;             /* Larger radius as in image 1 */
        --service-card-overlay: rgba(0, 0, 0, 0.7);
        --service-card-title-size: 30px;         /* Much larger title */
        --service-card-title-weight: 700;
        --service-card-text-size: 14px;          /* Larger description */
        --service-card-subtext-size: 16px;       /* Larger brand name */
        --service-card-font: 'Poppins', sans-serif;
        --brand-blue: #0078B7;
        --service-section-title-size: 36px;      /* Reduced from 45px to 36px */
        --service-section-padding: 80px;        /* Spacing above and below the section */
        --service-title-margin-bottom: 90px;     /* Spacing between title and cards */
        --service-link-size: 20px;               /* Adjust Link Font Size here */
        --service-link-vertical-offset: 20px;    /* Vertical position of the link (positive pushes down) */
        --service-link-mobile-gap: 40px;         /* Vertical gap when title and link stack on small screens */
        --service-section-overlap: -40px;        /* How much the section pulls UP into the hero (negative values only) */
        --service-card-gap: 2rem;                /* Reduced default gap for better fit */
        --service-link-arrow-size: 24px;         /* Control Arrow Icon Size here */
        --service-link-arrow-gap: 8px;           /* Control space between text and arrow */
        /* Font Sizes with Clamp for perfect scaling */
        --hero-h1-size: clamp(32px, 5.5vw, 45px);
        --hero-p-size: clamp(15px, 2.5vw, 18px);
        --section-title-size: clamp(28px, 4.5vw, 36px);
        --card-title-size: clamp(20px, 3.5vw, 30px);
        
        /* Why Choose Us Section Variables */
        --wcu-bg: #EBEBEB;
        --wcu-section-padding: 100px 0;
        --wcu-container-max: 1400px;
        --wcu-margin-left: auto;                 /* Use auto for centering */
        --wcu-margin-right: auto;
        --wcu-image-radius: 30px;
        --wcu-title-size: 44px;
        --wcu-title-weight: 700;
        --wcu-text-size: 18px;
        --wcu-item-title-size: 22px;
        --wcu-item-desc-size: 16px;
        --wcu-icon-size: 54px;
        --wcu-icon-color: #00A3FF;               /* Bright blue for icons */
        --wcu-content-gap: 90px;                 /* Gap between image and text content */
        --wcu-image-width: 1.1fr;                /* Increase this to make image BIGGER */
        --wcu-content-width: 0.9fr;              /* Change this to adjust text area width */

        /* Testimonials Section Variables */
        --test-bg: #FFFFFF;
        --test-card-bg: #EBEBEB;
        --test-section-padding: 100px 0;
        --test-card-radius: 5px;                 /* Square-ish radius like in the screenshot */
        --test-card-padding: 40px;
        --test-text-size: 16px;
        --test-name-size: 14px;
        --test-loc-size: 12px;
        --test-star-size: 20px;
        --test-spacing: 60px;                    /* Gap between cards */
    }

    .hero-slide {
        flex: 0 0 100%;
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    .hero-content {
        transition: all 1s cubic-bezier(0.4, 0, 0.2, 1);
        transform: translateY(30px);
        opacity: 0;
    }
    .hero-slide.active .hero-content {
        transform: translateY(0);
        opacity: 1;
        transition-delay: 400ms;
    }
    #hero-slider-track {
        transition: transform 1.2s cubic-bezier(0.645, 0.045, 0.355, 1);
    }
    #progress-indicator {
        transition: transform 1.2s cubic-bezier(0.645, 0.045, 0.355, 1);
    }

    /* Service Card Grid - Using Grid for better stability */
    .service-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        justify-content: center;
        gap: var(--service-card-gap);
        width: 100%;
        max-width: var(--wcu-container-max);
        margin: 0 auto;
        padding: 0 1.5rem;
    }
    @media (min-width: 1280px) {
        .service-grid {
            grid-template-columns: repeat(3, 1fr); /* Force 3 columns on large screens */
        }
    }

    /* Service Card Styles */
    .service-card {
        perspective: 1000px;
        width: 100%;
        max-width: var(--service-card-width);
        flex: 1 1 var(--service-card-width);
    }
    .service-card-inner {
        position: relative;
        height: var(--service-card-height);
        border-radius: var(--service-card-radius);
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        transition: transform 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .service-card:hover .service-card-inner {
        transform: translateY(-15px);
    }
    .service-card-img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: scale(1.45); /* Zoom in to make it feel "full" and remove empty space */
    }
    .service-card-overlay {
        position: absolute;
        inset: 0;
        background-color: var(--service-card-overlay);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 2.5rem;
        color: white;
        z-index: 2;
    }
    .service-card-content {
        font-family: var(--service-card-font);
        z-index: 10;
        width: 100%;
    }
    .service-card-title {
        font-size: var(--service-card-title-size);
        font-weight: var(--service-card-title-weight);
        line-height: 1.1;
        margin-bottom: 2rem;
        text-transform: none; /* Keep original casing */
    }
    .service-card-divider {
        width: 140px;
        height: 4px; /* Thicker divider as in image */
        background-color: white;
        margin: 0 auto 2rem;
        border-radius: 99px;
    }
    .service-card-text {
        font-size: var(--service-card-text-size);
        font-weight: 700; /* Bold as in image */
        opacity: 1;
        margin-bottom: 0.5rem;
    }
    .service-card-subtext {
        font-size: var(--service-card-subtext-size);
        font-weight: 700;
        letter-spacing: 0.02em;
        text-transform: none; /* Match image case */
    }

    /* Responsive Adjustments */
    @media (max-width: 1024px) {
        :root {
            --service-card-width: 320px;
            --service-card-gap: 2rem;
            --service-section-title-size: 32px;
            --service-title-margin-bottom: 60px;
        }
    }

    @media (max-width: 768px) {
        :root {
            --service-card-width: 100%;             /* Full width on phones */
            --service-card-height: 320px;            /* Shorter height for mobile comfort */
            --service-card-title-size: 24px;         /* Smaller titles */
            --service-section-title-size: 28px;      /* Smaller section header */
            --service-section-padding: 60px;         /* Less padding on small screens */
            --service-title-margin-bottom: 40px;     /* Closer title to cards */
            --service-card-radius: 25px;            /* Slightly smaller radius */
            --service-link-size: 16px;              /* Smaller link text */
            --service-link-arrow-size: 20px;        /* Smaller arrow */
        }
        
        .service-grid {
            padding: 0 1rem;                         /* Add breathing room on sides */
            gap: 1.5rem;
        }

        .service-card {
            max-width: 450px;                        /* Limit width so it doesn't get TOO wide on large phones */
            margin: 0 auto;                          /* Center single cards */
        }
    }

    /* Service Slider Styles */
    .service-slider-container {
        overflow: hidden;
        width: 100%;
        padding: 40px 0;                         /* Add space for shadows and prevent clipping */
        margin: -40px 0;                         /* Offset the padding to keep original layout spacing */
    }
    .service-slider-track {
        display: flex;
        transition: transform 0.8s cubic-bezier(0.645, 0.045, 0.355, 1);
        width: 100%;
    }
    .service-slide {
        flex: 0 0 100%;
        width: 100%;
    }
    .service-nav-group {
        display: none;
    }
    .service-nav-group.active {
        display: block;
    }
    .service-arrow-filter {
        filter: invert(31%) sepia(91%) saturate(1637%) hue-rotate(178deg) brightness(92%) contrast(101%);
    }

    /* Why Choose Us Custom Styles */
    .wcu-section {
        background-color: var(--wcu-bg);
        padding: var(--wcu-section-padding);
        font-family: 'Poppins', sans-serif;
    }
    .wcu-container {
        max-width: var(--wcu-container-max);
        margin-left: var(--wcu-margin-left);
        margin-right: var(--wcu-margin-right);
        padding: 0 1.5rem;
    }
    .wcu-grid {
        display: grid;
        grid-template-columns: var(--wcu-image-width) var(--wcu-content-width);
        gap: var(--wcu-content-gap);
        align-items: center;
    }
    .wcu-image-container {
        width: 100%;
        border-radius: var(--wcu-image-radius);
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    .wcu-image-container img {
        width: 100%;
        height: auto;
        display: block;
    }
    .wcu-title {
        font-size: var(--wcu-title-size);
        font-weight: var(--wcu-title-weight);
        color: #1a1a1a;
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }
    .wcu-description {
        font-size: var(--wcu-text-size);
        color: #4a4a4a;
        line-height: 1.6;
        margin-bottom: 3rem;
    }
    .wcu-features {
        display: flex;
        flex-direction: column;
        gap: 2.5rem;
    }
    .wcu-item {
        display: flex;
        align-items: flex-start;
        gap: 1.5rem;
    }
    .wcu-icon-wrapper {
        flex-shrink: 0;
        width: var(--wcu-icon-size);
        height: var(--wcu-icon-size);
    }
    .wcu-icon-wrapper img {
        width: 100%;
        height: 100%;
        /* Filter to apply wcu-icon-color (approximate bright blue) */
        filter: invert(48%) sepia(79%) saturate(2476%) hue-rotate(174deg) brightness(102%) contrast(106%);
    }
    .wcu-item-title {
        font-size: var(--wcu-item-title-size);
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 0.4rem;
    }
    /* Testimonials Styles */
    .testimonial-section {
        background-color: var(--test-bg);
        padding: var(--test-section-padding);
        font-family: 'Poppins', sans-serif;
    }
    .testimonial-container {
        max-width: 1000px;                      /* Narrower container like screenshot */
        margin: 0 auto;
        padding: 0 20px;
    }
    .testimonial-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: var(--test-spacing);
        margin-top: 60px;
        position: relative;
    }
    @media (min-width: 992px) {
        .testimonial-grid {
            grid-template-columns: 1fr 1fr;
        }
    }
    .testimonial-card {
        background-color: var(--test-card-bg);
        padding: var(--test-card-padding);
        border-radius: var(--test-card-radius);
        position: relative;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        height: min-content;
    }
    /* Speech bubble tail */
    .testimonial-card::after {
        content: '';
        position: absolute;
        bottom: -25px;
        width: 0;
        height: 0;
        border-style: solid;
    }
    .testimonial-card.tail-left::after {
        left: 0;
        border-width: 25px 25px 0 0;
        border-color: var(--test-card-bg) transparent transparent transparent;
    }
    .testimonial-card.tail-right::after {
        right: 0;
        border-width: 25px 0 0 25px;
        border-color: var(--test-card-bg) transparent transparent transparent;
    }
    .testimonial-quote {
        font-size: var(--test-text-size);
        line-height: 1.6;
        color: #333;
        margin-bottom: 25px;
        font-weight: 500;
        font-style: italic;
    }
    .testimonial-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .testimonial-user {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .testimonial-avatar {
        width: 40px;
        height: 40px;
        background-color: #333;
        border-radius: 50%;
    }
    .testimonial-info h4 {
        font-size: var(--test-name-size);
        font-weight: 700;
        margin: 0;
        color: #333;
    }
    .testimonial-info p {
        font-size: var(--test-loc-size);
        margin: 0;
        color: #666;
    }
    .testimonial-stars {
        display: flex;
        gap: 4px;
    }
    .testimonial-star {
        width: var(--test-star-size);
        height: var(--test-star-size);
        filter: invert(72%) sepia(87%) saturate(415%) hue-rotate(359deg) brightness(101%) contrast(101%); /* Gold color approx */
    }

    /* Staggered positioning without negative margins */
    @media (min-width: 768px) {
        .test-card-1 { grid-column: 1; grid-row: 1; align-self: end; }
        .test-card-2 { grid-column: 2; grid-row: 1 / 3; align-self: center; }
        .test-card-3 { grid-column: 1; grid-row: 2; align-self: start; }
    }
    @media (max-width: 767px) {
        .testimonial-grid { grid-template-columns: 1fr; }
        .test-card-2 { margin-top: 40px; }
    }

    @media (max-width: 1024px) {
        .wcu-grid {
            grid-template-columns: 1fr;
            gap: 4rem;
        }
        :root {
            --wcu-title-size: 36px;
        }
    }
    @media (max-width: 768px) {
        .wcu-section {
            padding: 60px 0;
        }
        :root {
            --wcu-title-size: 30px;
            --wcu-item-title-size: 20px;
        }
    }
</style>

<section class="relative min-h-[90vh] flex flex-col overflow-hidden font-poppins" style="border-bottom-left-radius: 40px; border-bottom-right-radius: 40px; z-index: 20;">
    <!-- Slider Track Container -->
    <div class="absolute inset-0 z-0 overflow-hidden">
        <div id="hero-slider-track" class="h-full flex">
            <!-- Slide 1: Jasa Service AC -->
            <div class="hero-slide active">
                <div class="absolute inset-0">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Konten 1.jpeg" alt="Hero Background 1" class="w-full h-full object-cover">
                    <div class="absolute inset-0" style="background-color: rgba(0, 0, 0, 0.7);"></div>
                </div>
                <div class="h-full flex items-center relative z-10 text-white">
                    <div class="container mx-auto px-4">
                        <div class="max-w-4xl hero-content">
                            <h1 class="mb-6 tracking-tight" style="font-size: var(--hero-h1-size); line-height: 1.3; font-weight: 600; font-family: 'Lucida Bright', Georgia, serif;">
                                Jasa Service AC Terbaik,<br>
                                Profesional & Bergaransi
                            </h1>
                            <p class="text-white mb-8 max-w-3xl font-bold" style="font-size: var(--hero-p-size); line-height: 1.8; font-weight: 400; opacity: 1; font-family: 'Lucida Bright', Georgia, serif; letter-spacing: 1px;">
                                Solusi lengkap cuci, perbaikan, dan pasang AC 24 jam untuk wilayah Surabaya, Sidoarjo, dan Gresik dengan teknisi ahli bersertifikat.
                            </p>
                            <a href="#" class="inline-block bg-[#007BB5] hover:bg-[#006699] text-white px-10 py-4 md:px-14 md:py-5 rounded-full text-[18px] md:text-[22px] font-bold transition-all shadow-2xl hover:scale-105 active:scale-95">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2: Jasa Cuci AC -->
            <div class="hero-slide">
                <div class="absolute inset-0">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Konten 2.jpeg" alt="Hero Background 2" class="w-full h-full object-cover">
                    <div class="absolute inset-0" style="background-color: rgba(0, 0, 0, 0.7);"></div>
                </div>
                <div class="h-full flex items-center relative z-10 text-white">
                    <div class="container mx-auto px-4">
                        <div class="max-w-4xl hero-content">
                            <h1 class="mb-6 tracking-tight" style="font-size: var(--hero-h1-size); line-height: 1.3; font-weight: 600; font-family: 'Lucida Bright', Georgia, serif;">
                                Jasa Cuci AC Terbaik,<br>
                                Profesional & Bergaransi
                            </h1>
                            <p class="text-white mb-8 max-w-3xl font-bold" style="font-size: var(--hero-p-size); line-height: 1.8; font-weight: 400; opacity: 1; font-family: 'Lucida Bright', Georgia, serif; letter-spacing: 1px;">
                                Solusi lengkap cuci, perbaikan, dan pasang AC 24 jam untuk wilayah Surabaya, Sidoarjo, dan Gresik dengan teknisi ahli bersertifikat.
                            </p>
                            <a href="#" class="inline-block bg-[#007BB5] hover:bg-[#006699] text-white px-10 py-4 md:px-14 md:py-5 rounded-full text-[18px] md:text-[22px] font-bold transition-all shadow-2xl hover:scale-105 active:scale-95">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3: Jasa Pasang AC -->
            <div class="hero-slide">
                <div class="absolute inset-0">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/konten 3.jpeg" alt="Hero Background 3" class="w-full h-full object-cover">
                    <div class="absolute inset-0" style="background-color: rgba(0, 0, 0, 0.7);"></div>
                </div>
                <div class="h-full flex items-center relative z-10 text-white">
                    <div class="container mx-auto px-4">
                        <div class="max-w-4xl hero-content">
                            <h1 class="mb-6 tracking-tight" style="font-size: var(--hero-h1-size); line-height: 1.3; font-weight: 600; font-family: 'Lucida Bright', Georgia, serif;">
                                Jasa Pasang AC Terbaik,<br>
                                Profesional & Bergaransi
                            </h1>
                            <p class="text-white mb-8 max-w-3xl font-bold" style="font-size: var(--hero-p-size); line-height: 1.8; font-weight: 400; opacity: 1; font-family: 'Lucida Bright', Georgia, serif; letter-spacing: 1px;">
                                Sedia layanan pasang AC selama 24 Jam untuk Wilayah Surabaya dan sekitarnya Teknisi Berpengalaman dan tersertifikasi, Jaminan AC Dingin, Gratis Konsultasi
                            </p>
                            <a href="#" class="inline-block bg-[#007BB5] hover:bg-[#006699] text-white px-10 py-4 md:px-14 md:py-5 rounded-full text-[18px] md:text-[22px] font-bold transition-all shadow-2xl hover:scale-105 active:scale-95">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 1. Top Wing Info (Static) -->
    <div class="relative z-20 w-full">
        <div class="container mx-auto px-4">
            <div class="flex justify-end" style="margin-top: 15px; margin-bottom: 0px;">
                <div class="flex items-center gap-6 text-[16px] font-medium opacity-90 text-white">
                    <div class="flex items-center gap-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/oui--nav-maps.svg" alt="Location" class="w-[19px] h-[19px] brightness-0 invert">
                        <span>Jl. Barata Jaya XIX No. 57a</span>
                    </div>
                    <div class="h-[19px] w-[1px] bg-white/30 hidden md:block"></div>
                    <div class="flex items-center gap-2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/pepicons-pencil--letter.svg" alt="Email" class="w-[19px] h-[19px] brightness-0 invert">
                        <span>aireoptima@gmail.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 3. Bottom Area (Apps) (Static) -->
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

    <!-- 4. Progress Bar (Absolute Bottom) (Static) -->
    <div style="position: absolute; left: 50%; transform: translateX(-50%); bottom: 80px; width: 100%; max-width: 280px; z-index: 50;">
        <div style="height: 6px; width: 100%; background-color: rgba(255, 255, 255, 0.2); border-radius: 999px; position: relative; overflow: hidden;">
            <!-- Sliding Indicator -->
            <div id="progress-indicator" style="position: absolute; left: 0; top: 0; height: 100%; width: 33.33%; background-color: #007BB5; box-shadow: 0 0 15px rgba(0, 123, 181, 0.6); border-radius: 999px;"></div>
        </div>
    </div>
</section>

<!-- Service Section -->
<section class="bg-white font-poppins relative z-10" style="margin-top: var(--service-section-overlap); padding: var(--service-section-padding) 0;">
    <div class="container mx-auto px-4 max-w-[1400px]">
        <!-- Title & Navigation -->
        <div class="relative" style="margin-bottom: var(--service-title-margin-bottom);">
            <!-- Persistent Title -->
            <div class="text-center flex flex-col items-center">
                <h2 class="font-bold text-black" style="font-size: var(--service-section-title-size); margin-bottom: 12px;">
                    Layanan Kami
                </h2>
                <div style="width: 140px; height: 4px; background-color: black;"></div>
            </div>

            <!-- Nav Slide 1 (Service AC) -->
            <div id="service-nav-1" class="service-nav-group active">
                <div class="md:absolute md:right-0 md:top-1/2 flex justify-end" style="transform: translateY(calc(-50% + var(--service-link-vertical-offset))); margin-top: var(--service-link-mobile-gap);">
                    <a href="javascript:void(0)" onclick="switchServiceSlide(1)" class="flex items-center font-semibold hover:opacity-80 transition-all" style="color: var(--brand-blue); font-size: var(--service-link-size); gap: var(--service-link-arrow-gap);">
                        Layanan Cuci AC
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/formkit--arrowright.svg" alt="Arrow" class="service-arrow-filter" style="width: var(--service-link-arrow-size); height: var(--service-link-arrow-size);">
                    </a>
                </div>
            </div>

            <!-- Nav Slide 2 (Cuci AC) -->
            <div id="service-nav-2" class="service-nav-group">
                <div class="md:absolute md:inset-x-0 md:top-1/2 flex justify-between items-center" style="transform: translateY(calc(-50% + var(--service-link-vertical-offset))); margin-top: var(--service-link-mobile-gap);">
                    <!-- Back to Slide 1 (Left Side) -->
                    <a href="javascript:void(0)" onclick="switchServiceSlide(0)" class="flex items-center font-semibold hover:opacity-80 transition-all" style="color: var(--brand-blue); font-size: var(--service-link-size); gap: var(--service-link-arrow-gap);">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/formkit--arrowleft.svg" alt="Arrow" class="service-arrow-filter" style="width: var(--service-link-arrow-size); height: var(--service-link-arrow-size);">
                        Layanan Service AC
                    </a>
                    <!-- Forward to Slide 3 (Pasang AC) -->
                    <a href="javascript:void(0)" onclick="switchServiceSlide(2)" class="flex items-center font-semibold hover:opacity-80 transition-all" style="color: var(--brand-blue); font-size: var(--service-link-size); gap: var(--service-link-arrow-gap);">
                        Layanan Pasang AC
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/formkit--arrowright.svg" alt="Arrow" class="service-arrow-filter" style="width: var(--service-link-arrow-size); height: var(--service-link-arrow-size);">
                    </a>
                </div>
            </div>

            <!-- Nav Slide 3 (Pasang AC) -->
            <div id="service-nav-3" class="service-nav-group">
                <div class="md:absolute md:left-0 md:top-1/2 flex justify-start" style="transform: translateY(calc(-50% + var(--service-link-vertical-offset))); margin-top: var(--service-link-mobile-gap);">
                    <!-- Back to Slide 2 (Cuci AC) -->
                    <a href="javascript:void(0)" onclick="switchServiceSlide(1)" class="flex items-center font-semibold hover:opacity-80 transition-all" style="color: var(--brand-blue); font-size: var(--service-link-size); gap: var(--service-link-arrow-gap);">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/formkit--arrowleft.svg" alt="Arrow" class="service-arrow-filter" style="width: var(--service-link-arrow-size); height: var(--service-link-arrow-size);">
                        Layanan Cuci AC
                    </a>
                </div>
            </div>
        </div>

        <!-- Sliding Cards Content -->
        <div class="service-slider-container">
            <div id="service-slider-track" class="service-slider-track">
                
                <!-- Slide 1: SERVICE AC -->
                <div class="service-slide">
                    <div class="service-grid">
                        <!-- Card 1: Surabaya -->
                        <div class="service-card group">
                            <div class="service-card-inner">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/service ac surabaya.png" alt="Service AC Surabaya" class="service-card-img">
                                <div class="service-card-overlay">
                                    <div class="service-card-content">
                                        <h3 class="service-card-title">Service AC<br>Surabaya</h3>
                                        <div class="service-card-divider"></div>
                                        <p class="service-card-text">24 Jam - Bergaransi</p>
                                        <p class="service-card-subtext">Aire Optima</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2: Gresik -->
                        <div class="service-card group">
                            <div class="service-card-inner">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/service ac gresik.png" alt="Service AC Gresik" class="service-card-img">
                                <div class="service-card-overlay">
                                    <div class="service-card-content">
                                        <h3 class="service-card-title">Service AC<br>Gresik</h3>
                                        <div class="service-card-divider"></div>
                                        <p class="service-card-text">24 Jam - Bergaransi</p>
                                        <p class="service-card-subtext">Aire Optima</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3: Sidoarjo -->
                        <div class="service-card group">
                            <div class="service-card-inner">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/service ac sidoarjo.png" alt="Service AC Sidoarjo" class="service-card-img">
                                <div class="service-card-overlay">
                                    <div class="service-card-content">
                                        <h3 class="service-card-title">Service AC<br>Sidoarjo</h3>
                                        <div class="service-card-divider"></div>
                                        <p class="service-card-text">24 Jam - Bergaransi</p>
                                        <p class="service-card-subtext">Aire Optima</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2: CUCI AC -->
                <div class="service-slide">
                    <div class="service-grid">
                        <!-- Card 1: Surabaya -->
                        <div class="service-card group">
                            <div class="service-card-inner">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/cuci ac surabaya.png" alt="Cuci AC Surabaya" class="service-card-img">
                                <div class="service-card-overlay">
                                    <div class="service-card-content">
                                        <h3 class="service-card-title">Cuci AC<br>Surabaya</h3>
                                        <div class="service-card-divider"></div>
                                        <p class="service-card-text">24 Jam - Bergaransi</p>
                                        <p class="service-card-subtext">Aire Optima</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2: Gresik -->
                        <div class="service-card group">
                            <div class="service-card-inner">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/cuci ac gresik.png" alt="Cuci AC Gresik" class="service-card-img">
                                <div class="service-card-overlay">
                                    <div class="service-card-content">
                                        <h3 class="service-card-title">Cuci AC<br>Gresik</h3>
                                        <div class="service-card-divider"></div>
                                        <p class="service-card-text">24 Jam - Bergaransi</p>
                                        <p class="service-card-subtext">Aire Optima</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3: Sidoarjo -->
                        <div class="service-card group">
                            <div class="service-card-inner">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/cuci ac sidoarjo.png" alt="Cuci AC Sidoarjo" class="service-card-img">
                                <div class="service-card-overlay">
                                    <div class="service-card-content">
                                        <h3 class="service-card-title">Cuci AC<br>Sidoarjo</h3>
                                        <div class="service-card-divider"></div>
                                        <p class="service-card-text">24 Jam - Bergaransi</p>
                                        <p class="service-card-subtext">Aire Optima</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3: PASANG AC -->
                <div class="service-slide">
                    <div class="service-grid">
                        <!-- Card 1: Surabaya -->
                        <div class="service-card group">
                            <div class="service-card-inner">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/pasang ac surabaya.png" alt="Pasang AC Surabaya" class="service-card-img">
                                <div class="service-card-overlay">
                                    <div class="service-card-content">
                                        <h3 class="service-card-title">Pasang AC<br>Surabaya</h3>
                                        <div class="service-card-divider"></div>
                                        <p class="service-card-text">24 Jam - Bergaransi</p>
                                        <p class="service-card-subtext">Aire Optima</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2: Gresik -->
                        <div class="service-card group">
                            <div class="service-card-inner">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/pasang ac gresik.png" alt="Pasang AC Gresik" class="service-card-img">
                                <div class="service-card-overlay">
                                    <div class="service-card-content">
                                        <h3 class="service-card-title">Pasang AC<br>Gresik</h3>
                                        <div class="service-card-divider"></div>
                                        <p class="service-card-text">24 Jam - Bergaransi</p>
                                        <p class="service-card-subtext">Aire Optima</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 3: Sidoarjo -->
                        <div class="service-card group">
                            <div class="service-card-inner">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/pasang ac sidoarjo.png" alt="Pasang AC Sidoarjo" class="service-card-img">
                                <div class="service-card-overlay">
                                    <div class="service-card-content">
                                        <h3 class="service-card-title">Pasang AC<br>Sidoarjo</h3>
                                        <div class="service-card-divider"></div>
                                        <p class="service-card-text">24 Jam - Bergaransi</p>
                                        <p class="service-card-subtext">Aire Optima</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="wcu-section">
    <div class="wcu-container">
        <div class="wcu-grid">
            <!-- Left: Image -->
            <div class="wcu-image-container">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mengapa memilih kami.jpeg" alt="Aire Optima Service">
            </div>

            <!-- Right: Content -->
            <div class="wcu-content">
                <h2 class="wcu-title">Mengapa Memilih Kami ?</h2>
                <p class="wcu-description">
                    Kenyamanan Anda adalah prioritas kami. Aire Optima menjamin pelayanan yang cepat, transparan, dan bergaransi resmi.
                </p>

                <div class="wcu-features">
                    <!-- Feature 1: Teknisi Ahli -->
                    <div class="wcu-item">
                        <div class="wcu-icon-wrapper">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/mdi--account-service.svg" alt="Teknisi Ahli">
                        </div>
                        <div>
                            <h3 class="wcu-item-title">Teknisi Ahli</h3>
                            <p class="wcu-item-desc">Ditangani oleh tenaga profesional berpengalaman</p>
                        </div>
                    </div>

                    <!-- Feature 2: Layanan Cepat -->
                    <div class="wcu-item">
                        <div class="wcu-icon-wrapper">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/material-symbols--engineering.svg" alt="Layanan Cepat">
                        </div>
                        <div>
                            <h3 class="wcu-item-title">Layanan Cepat 24 Jam</h3>
                            <p class="wcu-item-desc">Siap membantu kapan pun Anda butuhkan.</p>
                        </div>
                    </div>

                    <!-- Feature 3: Garansi -->
                    <div class="wcu-item">
                        <div class="wcu-icon-wrapper">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/streamline-flex--warranty-badge-highlight-remix.svg" alt="Garansi Pengerjaan">
                        </div>
                        <div>
                            <h3 class="wcu-item-title">Garansi Pengerjaan</h3>
                            <p class="wcu-item-desc">Jaminan garansi instalasi dan perbaikan hingga 1 tahun.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section: Kata Mereka -->
<section class="testimonial-section">
    <div class="testimonial-container">
        <!-- Section Title (Same Style as Service Section) -->
        <div class="text-center" style="margin-bottom: var(--service-title-margin-bottom);">
            <h2 style="font-size: var(--service-section-title-size); font-weight: 700; color: #000; margin-bottom: 12px;">Kata Mereka</h2>
            <div style="width: 140px; height: 4px; background-color: #000; margin: 0 auto;"></div>
        </div>

        <div class="testimonial-grid">
            <!-- Testimonial 1: Top Left -->
            <div class="testimonial-card test-card-1 tail-left">
                <p class="testimonial-quote">“Langganan beberapa kali, pakai jasa bersihkan AC, respon nya cepat dan amanah.”</p>
                <div class="testimonial-footer">
                    <div class="testimonial-user">
                        <div class="testimonial-avatar"></div>
                        <div class="testimonial-info">
                            <h4>Mahir Fadha</h4>
                            <p>Surabaya</p>
                        </div>
                    </div>
                    <div class="testimonial-stars">
                        <?php for($i=0; $i<5; $i++): ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/material-symbols--star-rounded.svg" alt="Star" class="testimonial-star">
                        <?php endfor; ?>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2: Right (Staggered) -->
            <div class="testimonial-card test-card-2 tail-right">
                <p class="testimonial-quote">“Langganan beberapa kali, pakai jasa bersihkan AC, respon nya cepat dan amanah.”</p>
                <div class="testimonial-footer">
                    <div class="testimonial-stars">
                        <?php for($i=0; $i<5; $i++): ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/material-symbols--star-rounded.svg" alt="Star" class="testimonial-star">
                        <?php endfor; ?>
                    </div>
                    <div class="testimonial-user" style="text-align: right; flex-direction: row-reverse;">
                        <div class="testimonial-avatar"></div>
                        <div class="testimonial-info">
                            <h4>Mahir Fadha</h4>
                            <p>Surabaya</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3: Bottom Left -->
            <div class="testimonial-card test-card-3 tail-left">
                <p class="testimonial-quote">“Langganan beberapa kali, pakai jasa bersihkan AC, respon nya cepat dan amanah.”</p>
                <div class="testimonial-footer">
                    <div class="testimonial-user">
                        <div class="testimonial-avatar"></div>
                        <div class="testimonial-info">
                            <h4>Mahir Fadha</h4>
                            <p>Surabaya</p>
                        </div>
                    </div>
                    <div class="testimonial-stars">
                        <?php for($i=0; $i<5; $i++): ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/material-symbols--star-rounded.svg" alt="Star" class="testimonial-star">
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('hero-slider-track');
    const slides = document.querySelectorAll('.hero-slide');
    const indicator = document.getElementById('progress-indicator');
    let currentSlide = 0;

    function showSlide(index) {
        // Shift the track horizontally
        if (track) {
            track.style.transform = `translateX(-${index * 100}%)`;
        }

        // Update active class for content animations
        slides.forEach((slide, i) => {
            if (i === index) {
                slide.classList.add('active');
            } else {
                slide.classList.remove('active');
            }
        });

        // Update Progress Bar Indicator Position
        if (indicator) {
            indicator.style.transform = `translateX(${index * 100}%)`;
        }
    }

    setInterval(() => {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }, 4000);
});

// Switch Service Slide Function
function switchServiceSlide(index) {
    const track = document.getElementById('service-slider-track');
    const nav1 = document.getElementById('service-nav-1');
    const nav2 = document.getElementById('service-nav-2');
    const nav3 = document.getElementById('service-nav-3'); // Added nav3 reference
    
    if (track) {
        track.style.transform = `translateX(-${index * 100}%)`;
    }
    
    // Toggle navigation groups
    const navGroups = [nav1, nav2, nav3];
    navGroups.forEach((group, i) => {
        if (group) {
            if (i === index) {
                group.classList.add('active');
            } else {
                group.classList.remove('active');
            }
        }
    });
}
</script>

<?php get_footer(); ?>
