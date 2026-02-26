<?php get_header(); ?>
<style>
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
</style>

<section class="relative min-h-[90vh] flex flex-col overflow-hidden font-poppins" style="border-bottom-left-radius: 40px; border-bottom-right-radius: 40px; z-index: 10;">
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
                            <h1 class="mb-6 tracking-tight" style="font-size: 45px; line-height: 1.3; font-weight: 600; font-family: 'Lucida Bright', Georgia, serif;">
                                Jasa Cuci AC Terbaik,<br>
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
                            <h1 class="mb-6 tracking-tight" style="font-size: 45px; line-height: 1.3; font-weight: 600; font-family: 'Lucida Bright', Georgia, serif;">
                                Jasa Pasang AC Terbaik,<br>
                                Profesional & Bergaransi
                            </h1>
                            <p class="text-white mb-8 max-w-3xl font-bold" style="font-size: 18px; line-height: 1.8; font-weight: 400; opacity: 1; font-family: 'Lucida Bright', Georgia, serif; letter-spacing: 1px;">
                                Sedia layanan pasang AC selama 24 Jam untuk Wilayah Surabaya dan sekitarnya Teknisi Berpengalaman dan tersertifikasi, Jaminan AC Dingin, Gratis Konsultasi
                            </p>
                            <a href="#" class="inline-block bg-[#007BB5] hover:bg-[#006699] text-white px-10 py-4 rounded-full text-[18px] font-reguler transition-all shadow-xl">
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
    <div style="position: absolute; left: 50%; transform: translateX(-50%); bottom: 35px; width: 100%; max-width: 280px; z-index: 50;" class="hidden md:block">
        <div style="height: 6px; width: 100%; background-color: rgba(255, 255, 255, 0.2); border-radius: 999px; position: relative; overflow: hidden;">
            <!-- Sliding Indicator -->
            <div id="progress-indicator" style="position: absolute; left: 0; top: 0; height: 100%; width: 33.33%; background-color: #007BB5; box-shadow: 0 0 15px rgba(0, 123, 181, 0.6); border-radius: 999px;"></div>
        </div>
    </div>
</section>

<!-- Next Section White Background -->
<div class="relative z-0 bg-white" style="height: 200px; margin-top: -40px;">
    <div class="container mx-auto px-4 pt-48 text-center">
        <!-- Next Content -->
    </div>
</div>

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
</script>

<?php get_footer(); ?>
