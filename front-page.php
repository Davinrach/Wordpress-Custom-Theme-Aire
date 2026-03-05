<?php get_header(); ?>
<style>
    html, body {
        scroll-behavior: smooth;
    }

    /* Target semua bagian */
    section, footer {
        position: relative;
    }



    :root {
        /* Font Sizes with Clamp for perfect scaling */
        --hero-h1-size: clamp(21px, 6vw, 42px);      /* More aggressive shrink for small zoom/screen */
        --hero-p-size: clamp(10px, 2.5vw, 15px);
        
        /* Button Styling (Fixed) */
        /* Button Styling (Fixed) */
        --btn-font-size: 15px;
        --btn-padding-y: 8px;
        --btn-padding-x: 16px;
        --btn-radius: 30px;

        /* HERO LAYOUT CONTROL (Otomatis menyesuaikan layar) */
        --hero-pt: clamp(60px, 12vh, 100px);          /* Padding atas yang fleksibel */
        --hero-content-pb: clamp(20px, 15vh, 60px);   /* Dorongan konten ke atas */
        --hero-apps-bottom: clamp(60px, 12vh, 120px);  /* Jarak aplikasi dari bawah */
        --hero-progress-bottom: clamp(30px, 6vh, 60px); /* Jarak progress bar dari bawah */
        --hero-padding-left: clamp(40px, 15vw, 120px); /* GANTI ANGKA INI UNTUK MENORONG KE KANAN */
    }

    .hero-slide {
        position: absolute;
        inset: 0;
        opacity: 0;
        visibility: hidden;
        transition: opacity 1.5s ease-in-out, visibility 1.5s;
        z-index: 1;
    }
    .hero-slide.active {
        opacity: 1;
        visibility: visible;
        z-index: 2;
    }
    .hero-slide img {
        transition: transform 6s ease-out;
        transform: scale(1);
    }
    .hero-slide.active img {
        transform: scale(1.15);
    }
    #hero-slider-track {
        position: relative;
        height: 100%;
        width: 100%;
    }
    #progress-indicator {
        transition: transform 1.2s cubic-bezier(0.645, 0.045, 0.355, 1);
    }

    .hero-title-animated {
        position: absolute;
        inset: 0;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.5s ease;
    }
    .hero-title-animated.active {
        opacity: 1;
        visibility: visible;
    }
    .line-title {
        display: block;
        opacity: 0;
        transition: transform 0.8s cubic-bezier(0.2, 1, 0.3, 1), opacity 0.8s ease;
    }
    /* Masuk: Baris atas dari atas, Baris bawah dari bawah */
    .hero-title-animated.active .line-top {
        transform: translateY(0);
        opacity: 1;
        transition-delay: 0.1s;
    }
    .hero-title-animated.active .line-bottom {
        transform: translateY(0);
        opacity: 1;
        transition-delay: 0.3s;
    }
    /* Posisi Awal (Inisial) */
    .hero-title-animated .line-top {
        transform: translateY(-30px);
    }
    .hero-title-animated .line-bottom {
        transform: translateY(30px);
    }
    /* Keluar: Baris atas ke atas, Baris bawah ke bawah */
    .hero-title-animated:not(.active) .line-top {
        transform: translateY(-30px);
        opacity: 0;
        transition-delay: 0s;
    }
    .hero-title-animated:not(.active) .line-bottom {
        transform: translateY(20px);
        opacity: 0;
        transition-delay: 0.1s;
    }

    /* Styles baru untuk Layanan Kami */
    .layanan-section {
        padding: 80px 0;
        background-color: #fff;
    }
    .layanan-grid {
        display: grid;
        grid-template-columns: repeat(4, 220px); /* Kolom tetap 220px */
        justify-content: space-between;
        row-gap: 55px; /* Jarak atas bawah (vertikal) */
        align-items: start;
        width: 100%;
        max-width: 1010px; /* Diperlebar agar gap horizontal lebih luas */
    }
    .layanan-title-block {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }
    .layanan-title-block h2 {
        font-size: 48px;
        font-weight: 800;
        line-height: 1.1;
        margin: 0;
        color: #000;
    }
    .layanan-title-block h2::after {
        content: '';
        display: block;
        width: 70px;
        height: 5px;
        background-color: #000;
        margin: 18px 0;
    }
    .layanan-title-description {
        font-size: 15px;
        color: #444;
        max-width: 210px;
        font-weight: 500;
        line-height: 1.4;
    }
    .service-item {
        display: flex;
        flex-direction: column;
        width: 100%;
        cursor: pointer;
        /* Diperambat durasinya menjadi 1s dan menggunakan easing yang lebih elegan */
        transition: transform 1s cubic-bezier(0.25, 1, 0.5, 1), opacity 1s ease, filter 0.3s ease;
        /* Efek awal untuk reveal - jarak translateY diperkecil agar tidak terlalu melonjak */
        opacity: 0;
        transform: translateY(40px);
    }
    .service-item.revealed {
        opacity: 1;
        transform: translateY(0);
    }
    /* Efek Hover untuk interaksi klik */
    .service-item.revealed:hover {
        transform: translateY(-8px); /* Mengangkat kartu sedikit ke atas */
    }
    .service-item:hover .service-card-v2 {
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15); /* Bayangan lebih dalam saat hover */
    }
    .service-item:hover .service-card-overlay-v2 {
        background-color: rgba(0, 0, 0, 0.3); /* Sedikit lebih terang saat hover */
    }
    .service-card-v2 {
        position: relative;
        width: 220px;
        height: 220px;
        border-radius: 19px;
        overflow: hidden;
        background-color: #f5f5f5;
        transition: box-shadow 0.3s ease;
    }
    /* Kartu lebar mengikuti span 2 kolom secara otomatis agar tetap lurus */
    .service-card-v2.wide {
        width: 100%; 
        height: 220px;
    }
    .col-span-2 {
        grid-column: span 2;
    }
    .service-card-v2 img.service-bg {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 0;
    }
    .service-card-v2.blur img.service-bg {
        filter: blur(8px);
        transform: scale(1.1);
    }
    .service-card-overlay-v2 {
        position: absolute;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.4);
        z-index: 1;
    }
    .service-label {
        font-size: 14px; /* Sedikit diperkecil agar pas */
        font-weight: 700;
        color: #000;
        margin-top: 12px;
        display: block;
        line-height: 1.2;
    }
    
    /* Center content for 'Lainnya' */
    .service-card-content-center {
        position: absolute;
        inset: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        z-index: 2;
        color: white;
    }
    .other-icon-container {
        width: 60px;
        height: 60px;
        background-color: rgba(40, 40, 40, 0.82);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 6px;
    }
    .other-icon-container img {
        width: 32px;
        height: 32px;
        filter: brightness(0) invert(1);
        position: relative;
        z-index: 3;
        display: block;
    }
    .other-label-inner {
        font-size: 14px;
        font-weight: 600;
    }

    /* Mengapa Memilih Kami Section */
    .mengapa-kami {
        padding: 40px 0 40px 0; /* Padding bawah dikurangi dari 100px ke 40px */
        background-color: #fff;
    }
    .mengapa-container {
        display: flex;
        align-items: center;
        gap: 70px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 var(--hero-padding-left);
    }
    .mengapa-image-side {
        flex: 0 0 500px;
        height: 640px;
        position: relative;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        /* Animasi awal */
        opacity: 0;
        transform: translateX(-50px);
        transition: transform 1.2s cubic-bezier(0.25, 1, 0.5, 1), opacity 1.2s ease;
    }
    .mengapa-kami.revealed .mengapa-image-side {
        opacity: 1;
        transform: translateX(0);
    }
    .mengapa-image-side img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .mengapa-image-overlay {
        position: absolute;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.4);
        z-index: 1;
        pointer-events: none;
    }
    .mengapa-content-side {
        flex: 1;
        opacity: 0;
        transform: translateY(30px);
        transition: transform 1s cubic-bezier(0.25, 1, 0.5, 1), opacity 1s ease;
    }
    .mengapa-kami.revealed .mengapa-content-side {
        opacity: 1;
        transform: translateY(0);
    }
    .mengapa-content-side h2 {
        font-size: 45px; /* Dikurangi 3px */
        font-weight: 800;
        color: #000;
        margin-bottom: 22px;
        line-height: 1.2;
    }
    .mengapa-intro {
        font-size: 15px; /* Dikurangi 3px */
        color: #333;
        margin-bottom: 35px;
        line-height: 1.6;
    }
    .feature-list {
        display: flex;
        flex-direction: column;
        gap: 24px; /* Sedikit dirapatkan */
        margin-bottom: 48px;
    }
    .feature-item {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        padding: 12px;
        border-radius: 12px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .feature-item:hover {
        background-color: #f8f9fa;
        transform: translateX(10px); /* Geser sedikit saat hover */
    }
    .feature-icon-box {
        width: 42px; /* Dikecilkan dari 50px */
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        background: #f0f7ff;
        border-radius: 10px;
        transition: transform 0.3s ease;
        animation: floatIcon 3s ease-in-out infinite; /* Animasi melayang melayang */
    }
    .feature-item:nth-child(2) .feature-icon-box { animation-delay: 0.5s; }
    .feature-item:nth-child(3) .feature-icon-box { animation-delay: 1s; }

    @keyframes floatIcon {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }
    .feature-icon-box img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
    .feature-text h3 {
        font-size: 17px; /* Dikurangi 3px */
        font-weight: 700;
        color: #000;
        margin-bottom: 4px;
    }
    .feature-text p {
        font-size: 13px; /* Dikurangi 2px */
        color: #666;
        line-height: 1.5;
    }
    .btn-pesan {
        display: inline-block;
        background-color: #007bb5;
        color: white;
        padding: 14px 36px; /* Padding sedikit disesuaikan */
        border-radius: 50px;
        font-weight: 700;
        font-size: 14px; /* Dikurangi 2px */
        text-decoration: none;
        transition: transform 0.3s ease, background-color 0.3s ease;
    }
    .btn-pesan:hover {
        background-color: #005f8d;
        transform: translateY(-3px);
    }

    .testimoni-section {
        padding: 40px 0 0px 0; /* Padding bawah dihilangkan agar galeri lebih naik */
        background-color: #fff;
    }
    .testimoni-header {
        text-align: center;
        margin-bottom: 70px;
    }
    .testimoni-header h2 {
        font-size: 42px;
        font-weight: 800;
        color: #000;
        margin-bottom: 12px;
    }
    .testimoni-header p {
        font-size: 16px;
        color: #666;
        max-width: 600px;
        margin: 0 auto;
    }
    .testimoni-wrapper {
        position: relative;
        min-height: 520px; /* Jaga agar tinggi tetap stabil saat slide ganti */
    }
    .testimoni-slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.6s ease;
    }
    .testimoni-slide.active {
        position: relative;
        opacity: 1;
        visibility: visible;
        z-index: 5;
    }
    .testimoni-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 40px;
        display: flex;
        align-items: center;
        gap: 50px;
    }
    .testimoni-grid-left {
        width: 50%;
        display: flex;
        flex-direction: column;
        gap: 40px;
    }
    .testimoni-grid-right {
        width: 50%;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        padding-top: 40px; /* Offset staggered */
    }
    /* Grid Slide 2: 2 Atas, 1 Bawah Tengah */
    .testimoni-grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 40px;
    }
    .testimoni-grid-2 .card-bottom {
        grid-column: span 2;
        width: 50%;
        justify-self: center;
    }

    .testimoni-card {
        background-color: #0078B7;
        border-radius: 35px;
        padding: 40px;
        color: white;
        position: relative;
        min-height: 200px;
        box-shadow: 0 15px 35px rgba(0, 120, 183, 0.15);
        opacity: 0;
        transition: transform 1s cubic-bezier(0.25, 1, 0.5, 1), opacity 1s ease;
    }

    /* Animasi Slide 1 */
    #t-slide-1 .testimoni-grid-left .testimoni-card { transform: translateX(-80px); }
    #t-slide-1 .testimoni-grid-right .testimoni-card { transform: translateX(80px); }

    /* Animasi Slide 2 (Masuk dari bawah + arah) */
    #t-slide-2 .testimoni-card { transform: translateY(100px); }
    #t-slide-2 .card-tl { transform: translate(-80px, 100px); }
    #t-slide-2 .card-tr { transform: translate(80px, 100px); }
    #t-slide-2 .card-bc { transform: translate(0, 100px); }

    /* Kembalikan CSS yang hilang */
    .testimoni-card.revealed {
        opacity: 1;
        transform: translate(0, 0) !important;
    }
    .testimoni-grid-left .testimoni-card { transform: translateX(-100px); }
    .testimoni-grid-right .testimoni-card { transform: translateX(100px); }
    
    .testimoni-card p {
        font-size: 16px;
        font-weight: 500;
        line-height: 1.5;
        margin-bottom: 30px;
    }
    .testimoni-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
    }
    .user-info { display: flex; flex-direction: column; }
    .user-name { font-size: 14px; font-weight: 700; }
    .user-location { font-size: 12px; opacity: 0.8; }
    .stars-box { display: flex; gap: 4px; }
    .stars-box img { width: 18px; height: 18px; }

    .testimoni-card.with-user .testimoni-card-footer {
        justify-content: space-between;
        align-items: center;
    }
    .user-with-avatar { display: flex; align-items: center; gap: 12px; }
    .user-avatar {
        width: 45px;
        height: 45px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 8px;
    }
    .user-avatar img { width: 100%; height: 100%; object-fit: contain; }

    /* Gallery Section Styles */
    .gallery-section {
        padding: 10px 0 120px 0;
        background-color: #fff;
    }
    .gallery-header { text-align: center; margin-bottom: 60px; padding: 0 20px; }
    .gallery-header h2 { font-size: 42px; font-weight: 800; color: #000; margin-bottom: 15px; }
    .gallery-header p { font-size: 16px; color: #666; max-width: 800px; margin: 0 auto; }
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 20px;
        max-width: 1300px;
        margin: 0 auto;
        padding: 0 40px;
    }
    .gallery-item {
        border-radius: 4px;
        overflow: hidden;
        aspect-ratio: 1 / 1;
        opacity: 0;
        transform: translateY(30px);
        transition: transform 0.8s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.8s ease;
    }
    .gallery-item.revealed { opacity: 1; transform: translateY(0); }
    .gallery-item img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease; }
    .gallery-item:hover img { transform: scale(1.08); }

    .layanan-grid {
        display: grid;
        grid-template-columns: repeat(4, 220px);
        justify-content: center;
        margin: 0 auto;
        gap: 40px;
        row-gap: 55px;
        align-items: start;
        width: 100%;
        max-width: 1100px;
    }

    .layanan-title-block {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        text-align: left;
        width: 100%;
    }
    .layanan-title-block h2 {
        font-size: 48px;
        font-weight: 800;
        line-height: 1.1;
        margin: 0;
        color: #000;
    }
    .layanan-title-block h2::after {
        content: '';
        display: block;
        width: 70px;
        height: 5px;
        background-color: #000;
        margin: 15px 0 0 0; /* Left aligned line */
    }
    .layanan-title-description {
        font-size: 14px;
        color: #666;
        margin-top: 15px;
        line-height: 1.6;
    }

    /* Responsive adjustments */
    @media (max-width: 1024px) {
        .testimoni-container { flex-direction: column; gap: 40px; }
        .testimoni-grid-right { padding-top: 0; width: 100%; }
        .layanan-grid { grid-template-columns: repeat(2, 220px); gap: 25px; }
        .service-card-v2.wide { grid-column: span 1 !important; width: 220px; }
        .service-item.col-span-2 { grid-column: span 1 !important; }
    }
</style>

<!-- Kembalikan Hero Section -->
<section class="relative flex flex-col overflow-hidden font-poppins" style="z-index: 20; height: 100vh; padding-top: var(--hero-pt); background-color: #000;">
    <div class="absolute inset-0 z-0">
        <div class="hero-slide active">
            <div class="absolute inset-0">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Konten 1.jpeg" alt="Hero Background 1" class="w-full h-full object-cover">
                <div class="absolute inset-0" style="background-color: rgba(0, 0, 0, 0.7);"></div>
            </div>
        </div>
        <div class="hero-slide">
            <div class="absolute inset-0">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Konten 2.jpeg" alt="Hero Background 2" class="w-full h-full object-cover">
                <div class="absolute inset-0" style="background-color: rgba(0, 0, 0, 0.7);"></div>
            </div>
        </div>
        <div class="hero-slide">
            <div class="absolute inset-0">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/konten 3.jpeg" alt="Hero Background 3" class="w-full h-full object-cover">
                <div class="absolute inset-0" style="background-color: rgba(0, 0, 0, 0.7);"></div>
            </div>
        </div>
    </div>
    <div class="h-full flex items-center relative z-10 text-white">
        <div class="container mx-auto" style="padding-bottom: var(--hero-content-pb); padding-left: var(--hero-padding-left); padding-right: 40px;">
            <div class="max-w-4xl">
                <div class="relative mb-6" style="height: calc(var(--hero-h1-size) * 1.3 * 2 + 10px);">
                    <h1 class="hero-title-animated active tracking-tight" style="font-size: var(--hero-h1-size); line-height: 1.3; font-weight: 600; font-family: 'Lucida Bright', Georgia, serif;">
                        <span class="line-title line-top">Jasa <span style="color: #007BB5;">Service AC</span> Terbaik,</span>
                        <span class="line-title line-bottom">Profesional & Bergaransi</span>
                    </h1>
                    <h1 class="hero-title-animated tracking-tight" style="font-size: var(--hero-h1-size); line-height: 1.3; font-weight: 600; font-family: 'Lucida Bright', Georgia, serif;">
                        <span class="line-title line-top">Jasa <span style="color: #007BB5;">Cuci AC</span> Terbaik,</span>
                        <span class="line-title line-bottom">Profesional & Bergaransi</span>
                    </h1>
                    <h1 class="hero-title-animated tracking-tight" style="font-size: var(--hero-h1-size); line-height: 1.3; font-weight: 600; font-family: 'Lucida Bright', Georgia, serif;">
                        <span class="line-title line-top">Jasa <span style="color: #007BB5;">Pasang AC</span> Terbaik,</span>
                        <span class="line-title line-bottom">Profesional & Bergaransi</span>
                    </h1>
                </div>
                <div>
                    <p class="text-white mb-8 max-w-3xl font-bold" style="font-size: var(--hero-p-size); line-height: 1.8; font-weight: 400; opacity: 1; font-family: 'Lucida Bright', Georgia, serif; letter-spacing: 1px;">
                        Solusi lengkap cuci, perbaikan, dan pasang AC 24 jam untuk wilayah Surabaya, Sidoarjo, dan Gresik dengan teknisi ahli bersertifikat.
                    </p>
                    <a href="#" class="inline-block bg-[#007BB5] hover:bg-[#006699] text-white font-bold transition-all shadow-md hover:scale-105 active:scale-95" style="font-size: var(--btn-font-size); padding: var(--btn-padding-y) var(--btn-padding-x); border-radius: var(--btn-radius);">
                        Pesan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div style="position: absolute; left: 0; bottom: var(--hero-apps-bottom); z-index: 20; width: 100%;" class="flex justify-start">
        <div class="container mx-auto" style="padding-left: var(--hero-padding-left); padding-right: 40px;">
            <div class="flex flex-col items-center gap-3 text-white" style="width: fit-content;"> 
                <p style="font-size: 13px; font-weight: 600; letter-spacing: 0.15em; margin: 0; text-align: center; opacity: 0.8;">GET MOBILE APPS NOW !</p>
                <div class="flex items-center gap-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Playstore.png" alt="Google Play" style="height: 40px; width: auto; cursor: pointer;" class="hover:scale-105 transition-transform">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Appstore.png" alt="App Store" style="height: 40px; width: auto; cursor: pointer;" class="hover:scale-105 transition-transform">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Layanan Kami -->
<section id="layanan-kami" class="layanan-section">
    <div class="container mx-auto">
        <div class="layanan-grid">
            <!-- Row 1 starts -->
            <!-- Col 1: Title Block (Acting as a transparent card) -->
            <div class="layanan-title-block">
                <h2>Layanan<br>Kami</h2>
                <p class="layanan-title-description">
                    Pilih layanan dan lokasi yang Anda butuhkan.
                </p>
            </div>
            <!-- Service items continue... -->
            <div class="service-item">
                <div class="service-card-v2">
                    <img class="service-bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/Service AC Surabaya.jpg" alt="Service AC Surabaya">
                    <div class="service-card-overlay-v2"></div>
                </div>
                <div class="service-label">Service AC Surabaya</div>
            </div>

            <!-- Col 3: Service AC Sidoarjo -->
            <div class="service-item">
                <div class="service-card-v2">
                    <img class="service-bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/Service AC Sidoarjo.jpg" alt="Service AC Sidoarjo">
                    <div class="service-card-overlay-v2"></div>
                </div>
                <div class="service-label">Service AC Sidoarjo</div>
            </div>

            <!-- Col 4: Service AC Gresik -->
            <div class="service-item">
                <div class="service-card-v2">
                    <img class="service-bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/Service AC Gresik.jpg" alt="Service AC Gresik">
                    <div class="service-card-overlay-v2"></div>
                </div>
                <div class="service-label">Service AC Gresik</div>
            </div>

            <!-- Row 2 starts -->
            <!-- Col 1: Cuci AC Surabaya -->
            <div class="service-item">
                <div class="service-card-v2">
                    <img class="service-bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/Cuci AC Surabaya.png" alt="Cuci AC Surabaya">
                    <div class="service-card-overlay-v2"></div>
                </div>
                <div class="service-label">Cuci AC Surabaya</div>
            </div>

            <!-- Col 2-3: Cuci AC Sidoarjo (Wide) -->
            <div class="service-item col-span-2" style="grid-column: span 2;">
                <div class="service-card-v2 wide">
                    <img class="service-bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/Cuci AC Sidoarjo.png" alt="Cuci AC Sidoarjo">
                    <div class="service-card-overlay-v2"></div>
                </div>
                <div class="service-label">Cuci AC Sidoarjo</div>
            </div>

            <!-- Col 4: Cuci AC Gresik -->
            <div class="service-item">
                <div class="service-card-v2">
                    <img class="service-bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/Cuci AC gresik.jpg" alt="Cuci AC Gresik">
                    <div class="service-card-overlay-v2"></div>
                </div>
                <div class="service-label">Cuci AC Gresik</div>
            </div>

            <!-- Row 3 starts -->
            <!-- Col 1: Pasang AC Surabaya -->
            <div class="service-item">
                <div class="service-card-v2">
                    <img class="service-bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/Pasang AC Surabaya.jpg" alt="Pasang AC Surabaya">
                    <div class="service-card-overlay-v2"></div>
                </div>
                <div class="service-label">Pasang AC Surabaya</div>
            </div>

            <!-- Col 2: Pasang AC Sidoarjo -->
            <div class="service-item">
                <div class="service-card-v2">
                    <img class="service-bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/Pasang AC Sidoarjo.jpg" alt="Pasang AC Sidoarjo">
                    <div class="service-card-overlay-v2"></div>
                </div>
                <div class="service-label">Pasang AC Sidoarjo</div>
            </div>

            <!-- Col 3: Pasang AC Gresik -->
            <div class="service-item">
                <div class="service-card-v2">
                    <img class="service-bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/Pasang AC Gresik.jpg" alt="Pasang AC Gresik">
                    <div class="service-card-overlay-v2"></div>
                </div>
                <div class="service-label">Pasang AC Gresik</div>
            </div>

            <!-- Col 4: Lainnya -->
            <div class="service-item">
                <div class="service-card-v2 blur">
                    <img class="service-bg" src="<?php echo get_template_directory_uri(); ?>/assets/images/Layanan Kami/Lainnya.jpg" alt="Lainnya">
                    <div class="service-card-overlay-v2"></div>
                    <div class="service-card-content-center">
                        <div class="other-icon-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/basil--other-1-outline.svg" alt="Other Icon">
                        </div>
                        <span class="other-label-inner">Lainnya</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Section Why Choose Us -->
<section class="mengapa-kami">
    <div class="mengapa-container">
        <!-- Kiri: Image with Overlay -->
        <div class="mengapa-image-side">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mengapa memilih kami.jpeg" alt="Mengapa Memilih Kami">
            <div class="mengapa-image-overlay"></div>
        </div>

        <!-- Kanan: Content -->
        <div class="mengapa-content-side">
            <h2>Mengapa Memilih Kami ?</h2>
            <p class="mengapa-intro">
                Kenyamanan Anda adalah prioritas kami. Aire Optima menjamin pelayanan yang cepat, transparan, dan bergaransi resmi.
            </p>

            <div class="feature-list">
                <!-- Teknisi Ahli -->
                <div class="feature-item">
                    <div class="feature-icon-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/mdi--account-service.svg" alt="Teknisi Ahli">
                    </div>
                    <div class="feature-text">
                        <h3>Teknisi Ahli</h3>
                        <p>Ditangani oleh tenaga profesional berpengalaman</p>
                    </div>
                </div>

                <!-- Layanan Cepat 24 Jam -->
                <div class="feature-item">
                    <div class="feature-icon-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/material-symbols--engineering.svg" alt="Layanan Cepat 24 Jam">
                    </div>
                    <div class="feature-text">
                        <h3>Layanan Cepat 24 Jam</h3>
                        <p>Siap membantu kapan pun Anda butuhkan.</p>
                    </div>
                </div>

                <!-- Garansi Pengerjaan -->
                <div class="feature-item">
                    <div class="feature-icon-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/streamline-flex--warranty-badge-highlight-remix.svg" alt="Garansi Pengerjaan">
                    </div>
                    <div class="feature-text">
                        <h3>Garansi Pengerjaan</h3>
                        <p>Jaminan garansi instalasi dan perbaikan hingga 1 tahun.</p>
                    </div>
                </div>
            </div>

            <a href="#" class="btn-pesan">Pesan Sekarang</a>
        </div>
    </div>
</section>

<!-- Section Testimonials -->
<section class="testimoni-section">
    <div class="testimoni-header">
        <h2>Kata Mereka</h2>
        <p>Kumpulan pengalaman pelanggan yang telah merasakan kualitas layanan kami</p>
    </div>

    <div class="testimoni-wrapper" id="testimoni-wrapper">
        <!-- Slide 1 (Original staggered) -->
        <div class="testimoni-slide active" id="t-slide-1">
            <div class="testimoni-container">
                <div class="testimoni-grid-left">
                    <div class="testimoni-card with-user">
                        <p>“Langganan beberapa kali, pakai jasa bersihkan AC, respon nya cepat dan amanah.”</p>
                        <div class="testimoni-card-footer">
                            <div class="stars-box">
                                <?php for($i=0; $i<5; $i++): ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/material-symbols--star-rounded.svg" alt="star">
                                <?php endfor; ?>
                            </div>
                            <div class="user-with-avatar">
                                <div class="user-info" style="text-align: right;">
                                    <span class="user-name">Ardianto Tan</span>
                                    <span class="user-location">Surabaya</span>
                                </div>
                                <div class="user-avatar">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/mdi--user.svg" alt="User">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimoni-card with-user">
                        <p>“Langganan beberapa kali, pakai jasa bersihkan AC, respon nya cepat dan amanah.”</p>
                        <div class="testimoni-card-footer">
                            <div class="stars-box">
                                <?php for($i=0; $i<5; $i++): ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/material-symbols--star-rounded.svg" alt="star">
                                <?php endfor; ?>
                            </div>
                            <div class="user-with-avatar">
                                <div class="user-info" style="text-align: right;">
                                    <span class="user-name">Mustaqim</span>
                                    <span class="user-location">Surabaya</span>
                                </div>
                                <div class="user-avatar">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/mdi--user.svg" alt="User">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimoni-grid-right">
                    <div class="testimoni-card with-user">
                        <p>“Langganan beberapa kali, pakai jasa bersihkan AC, respon nya cepat dan amanah.”</p>
                        <div class="testimoni-card-footer">
                            <div class="stars-box">
                                <?php for($i=0; $i<5; $i++): ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/material-symbols--star-rounded.svg" alt="star">
                                <?php endfor; ?>
                            </div>
                            <div class="user-with-avatar">
                                <div class="user-info" style="text-align: right;">
                                    <span class="user-name">Sarah Alifia</span>
                                    <span class="user-location">Sidoarjo</span>
                                </div>
                                <div class="user-avatar">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/mdi--user.svg" alt="User">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 (2 Top, 1 Bottom Center) -->
        <div class="testimoni-slide" id="t-slide-2">
            <div class="testimoni-grid-2">
                <!-- Top Left -->
                <div class="testimoni-card with-user card-tl">
                    <p>“Langganan beberapa kali, pakai jasa bersihkan AC, respon nya cepat dan amanah.”</p>
                    <div class="testimoni-card-footer">
                        <div class="stars-box">
                            <?php for($i=0; $i<5; $i++): ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/material-symbols--star-rounded.svg" alt="star">
                            <?php endfor; ?>
                        </div>
                        <div class="user-with-avatar">
                            <div class="user-info" style="text-align: right;">
                                <span class="user-name">Mustaqim</span>
                                <span class="user-location">Surabaya</span>
                            </div>
                            <div class="user-avatar">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/mdi--user.svg" alt="User">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Top Right -->
                <div class="testimoni-card with-user card-tr">
                    <p>“Langganan beberapa kali, pakai jasa bersihkan AC, respon nya cepat dan amanah.”</p>
                    <div class="testimoni-card-footer">
                        <div class="stars-box">
                            <?php for($i=0; $i<5; $i++): ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/material-symbols--star-rounded.svg" alt="star">
                            <?php endfor; ?>
                        </div>
                        <div class="user-with-avatar">
                            <div class="user-info" style="text-align: right;">
                                <span class="user-name">Ardianto Tan</span>
                                <span class="user-location">Surabaya</span>
                            </div>
                            <div class="user-avatar">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/mdi--user.svg" alt="User">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Bottom Center -->
                <div class="testimoni-card card-bc card-bottom with-user">
                    <p>“Langganan beberapa kali, pakai jasa bersihkan AC, respon nya cepat dan amanah.”</p>
                    <div class="testimoni-card-footer">
                        <div class="stars-box">
                            <?php for($i=0; $i<5; $i++): ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/material-symbols--star-rounded.svg" alt="star">
                            <?php endfor; ?>
                        </div>
                        <div class="user-with-avatar">
                            <div class="user-info" style="text-align: right;">
                                <span class="user-name">Sarah Alifia</span>
                                <span class="user-location">Sidoarjo</span>
                            </div>
                            <div class="user-avatar">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/Icons/mdi--user.svg" alt="User">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section Gallery -->
<section class="gallery-section">
    <div class="gallery-header">
        <h2>Galeri Project</h2>
        <p>Cuplikan aktivitas harian teknisi ahli kami dalam memastikan performa AC pelanggan tetap maksimal dan sirkulasi udara tetap bersih.</p>
    </div>
    <div class="gallery-grid">
        <div class="gallery-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Testimoni/Galeri 1.jpeg" alt="Project 1">
        </div>
        <div class="gallery-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Testimoni/Galeri 2.jpeg" alt="Project 2">
        </div>
        <div class="gallery-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Testimoni/Galeri 3.jpeg" alt="Project 3">
        </div>
        <div class="gallery-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Testimoni/Galeri 4.jpeg" alt="Project 4">
        </div>
        <div class="gallery-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Testimoni/Galeri 5.jpeg" alt="Project 5">
        </div>
    </div>
</section>




<script>
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('hero-slider-track');
    const slides = document.querySelectorAll('.hero-slide');
    const titles = document.querySelectorAll('.hero-title-animated');
    let currentSlide = 0;

    function showSlide(index) {
        // Update Slides (Backgrounds)
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });

        // Update Titles
        titles.forEach((title, i) => {
            title.classList.toggle('active', i === index);
        });
    }

    setInterval(() => {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }, 3000);

    // Reveal on Scroll for Layanan Kami
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.15
    };

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                if (entry.target.classList.contains('layanan-grid')) {
                    const items = entry.target.querySelectorAll('.service-item');
                    items.forEach((item, index) => {
                        setTimeout(() => {
                            item.classList.add('revealed');
                        }, index * 150);
                    });
                } else if (entry.target.classList.contains('mengapa-kami')) {
                    entry.target.classList.add('revealed');
                } else if (entry.target.classList.contains('testimoni-section')) {
                    const cards = entry.target.querySelectorAll('.testimoni-card');
                    cards.forEach((card, index) => {
                        setTimeout(() => {
                            card.classList.add('revealed');
                        }, index * 400); // Jedanya 400ms tiap kartu agar terlihat satu per satu
                    });
                } else if (entry.target.classList.contains('gallery-grid')) {
                    const items = entry.target.querySelectorAll('.gallery-item');
                    items.forEach((item, index) => {
                        setTimeout(() => {
                            item.classList.add('revealed');
                        }, index * 100);
                    });
                }
                revealObserver.unobserve(entry.target); 
            }
        });
    }, observerOptions);

    const layananGrid = document.querySelector('.layanan-grid');
    if (layananGrid) revealObserver.observe(layananGrid);

    const mengapaSection = document.querySelector('.mengapa-kami');
    if (mengapaSection) revealObserver.observe(mengapaSection);

    // Testimonial Slider Logic
    const tSection = document.querySelector('.testimoni-section');
    const tSlides = document.querySelectorAll('.testimoni-slide');
    let tCurrent = 0;
    let tInterval;

    function showTSlide(index) {
        tSlides.forEach((slide, i) => {
            if (i === index) {
                slide.classList.add('active');
                const cards = slide.querySelectorAll('.testimoni-card');
                cards.forEach((card, ci) => {
                    card.classList.remove('revealed'); // Reset for animation
                    setTimeout(() => {
                        card.classList.add('revealed');
                    }, ci * 400);
                });
            } else {
                slide.classList.remove('active');
                slide.querySelectorAll('.testimoni-card').forEach(c => c.classList.remove('revealed'));
            }
        });
    }

    const startTSlider = () => {
        if (tInterval) return;
        showTSlide(0);
        tInterval = setInterval(() => {
            tCurrent = (tCurrent + 1) % tSlides.length;
            showTSlide(tCurrent);
        }, 4000); // Ganti tiap 4 detik
    };

    if (tSection) {
        const tObserver = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting) {
                startTSlider();
                tObserver.unobserve(tSection);
            }
        }, { threshold: 0.2 });
        tObserver.observe(tSection);
    }

    const galleryGrid = document.querySelector('.gallery-grid');
    if (galleryGrid) revealObserver.observe(galleryGrid);
});
</script>

<?php get_footer(); ?>
