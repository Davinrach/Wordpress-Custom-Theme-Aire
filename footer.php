<style>
    .site-footer {
        background: linear-gradient(135deg, #011624 0%, #002D44 100%);
        color: #ffffff;
        font-family: 'Poppins', sans-serif;
        padding: 80px 0 40px;
    }
    .footer-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 24px;
    }
    .footer-grid {
        display: grid;
        grid-template-columns: 1.2fr 1fr 1fr 1.2fr;
        gap: 60px;
    }
    .footer-col h3 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 25px;
        color: #ffffff;
    }
    .footer-brand img {
        height: 60px;
        width: auto;
        margin-bottom: 30px;
    }
    .footer-brand p {
        font-size: 16px;
        line-height: 1.6;
        opacity: 0.9;
        margin-bottom: 30px;
        max-width: 320px;
    }
    .footer-contact-info p {
        font-size: 16px;
        margin-bottom: 5px;
        opacity: 0.9;
    }
    .footer-links ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .footer-links li {
        margin-bottom: 12px;
    }
    .footer-links a {
        color: #ffffff;
        opacity: 0.85;
        text-decoration: none;
        transition: opacity 0.3s ease;
        font-size: 16px;
    }
    .footer-links a:hover {
        opacity: 1;
    }
    .footer-info-block {
        margin-bottom: 30px;
    }
    .footer-info-block h4 {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 15px;
    }
    .footer-info-block p {
        font-size: 16px;
        line-height: 1.5;
        opacity: 0.85;
        margin-bottom: 0;
    }
    .footer-newsletter p {
        font-size: 16px;
        margin-bottom: 25px;
        opacity: 0.85;
    }
    .footer-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    .footer-input {
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 4px;
        padding: 15px 20px;
        color: #ffffff;
        font-size: 16px;
    }
    .footer-input::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }
    .footer-submit {
        background: #00A3FF;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        padding: 15px;
        font-size: 18px;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.3s ease;
    }
    .footer-submit:hover {
        background: #008DDC;
    }
    .footer-bottom {
        margin-top: 80px;
        padding-top: 30px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        opacity: 0.6;
        font-size: 14px;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .footer-grid {
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }
    }
    @media (max-width: 640px) {
        .footer-grid {
            grid-template-columns: 1fr;
        }
        .footer-bottom {
            flex-direction: column;
            gap: 20px;
            text-align: center;
        }
    }
</style>

<footer id="colophon" class="site-footer">
    <div class="footer-container">
        <div class="footer-grid">
            <!-- Brand Column -->
            <div class="footer-col footer-brand">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Aire Optima.png" alt="Aire Optima Logo">
                <p>Kami perusahaan yang menyediakan jasa perawatan AC dan pemasangan CCTV Professional</p>
                <div class="footer-contact-info">
                    <p>Hubungi kami :</p>
                    <p>031-5828-3251</p>
                    <p>0878-4437-4323</p>
                </div>
            </div>

            <!-- Layanan Column -->
            <div class="footer-col footer-links">
                <h3>Layanan</h3>
                <ul>
                    <li><a href="#">Instalasi AC</a></li>
                    <li><a href="#">Pembersihan Debu</a></li>
                    <li><a href="#">Layanan Pemanas</a></li>
                    <li><a href="#">Layanan Industri</a></li>
                    <li><a href="#">Layanan Pemeliharaan</a></li>
                    <li><a href="#">Pengujian Kualitas</a></li>
                </ul>
            </div>

            <!-- Info Column (Alamat, Kontak, Bantuan) -->
            <div class="footer-col">
                <div class="footer-info-block">
                    <h4>Alamat</h4>
                    <p>JL. Barata Jaya XIX No.57a<br>Baratajaya, Surabaya</p>
                </div>
                <div class="footer-info-block">
                    <h4>Kontak</h4>
                    <p>031-5828-3251<br>0878-4437-4323</p>
                </div>
                <div class="footer-info-block">
                    <h4>Bantuan</h4>
                    <p>aireoptima@gmail.com<br>sales.aireoptima@gmail.com</p>
                </div>
            </div>

            <!-- Newsletter Column -->
            <div class="footer-col footer-newsletter">
                <h3>Buletin</h3>
                <p>Dapatkan update setiap minggu dari Aireoptima</p>
                <form class="footer-form">
                    <input type="email" placeholder="Email" class="footer-input">
                    <button type="submit" class="footer-submit">Subscribe Now</button>
                </form>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Aire Optima. All rights reserved.</p>
            <div class="footer-social-links flex gap-6">
                <a href="#" class="opacity-80 hover:opacity-100">Instagram</a>
                <a href="#" class="opacity-80 hover:opacity-100">WhatsApp</a>
                <a href="#" class="opacity-80 hover:opacity-100">Twitter (X)</a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
