<?php get_header(); ?>

<div class="container mx-auto px-4 py-24 text-center">
    <main id="primary" class="site-main max-w-2xl mx-auto">
        <header class="page-header mb-8">
            <h1 class="page-title text-6xl font-black text-gray-900 mb-4">404</h1>
            <p class="text-2xl text-gray-600">Halaman Tidak Ditemukan</p>
        </header>
        <div class="page-content">
            <p class="text-gray-500 mb-8 text-lg">Sepertinya halaman yang Anda cari tidak ada. Coba gunakan pencarian di bawah ini atau kembali ke <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-blue-600 hover:underline">Beranda</a>.</p>
            <div class="max-w-md mx-auto">
                <?php get_search_form(); ?>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
