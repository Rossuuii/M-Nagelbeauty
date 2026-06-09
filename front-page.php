<?php get_header(); ?>

<?php
// Hero Felder von der Startseite laden
$front_page_id     = get_option('page_on_front');
$hero_bg           = get_field('hero_background', $front_page_id);
$hero_button_color = get_field('hero_button_color', $front_page_id) ?: '#7A1F2A';
?>

<section id="home" class="hero-section">
    <div class="hero-bg">
        <?php if ($hero_bg && isset($hero_bg['url'])): ?>
            <img src="<?php echo esc_url($hero_bg['url']); ?>" alt="Elegantes Nageldesign von M-Nagelbeauty">
        <?php endif; ?>

        <div class="hero-overlay"></div>
        <div class="hero-gradient-left"></div>
        <div class="hero-gradient-bottom"></div>
    </div>

    <div class="hero-content">
        <div class="hero-inner">

            <div class="hero-eyebrow fade-in-up delay-1">
                <div class="line"></div>
                <span>Nageldesign & Fußpflege · Neuendettelsau</span>
            </div>

            <h1 class="hero-headline fade-in-up delay-2">
                Ein Wohlfühlort<br>
                <em>für Hände</em><br>
                und Füße
            </h1>

            <p class="hero-subtext fade-in-up delay-3">
                Mária Feldman begrüßt Sie herzlich. Erleben Sie professionelles
                Nageldesign und Fußpflege in einer entspannten Atmosphäre.
            </p>

            <div class="hero-ctas fade-in-up delay-4">
                <a href="tel:01728560520"
                class="hero-call"
                style="background-color: <?php echo esc_attr($hero_button_color); ?>;">
                    Jetzt anrufen
                </a>

                <a href="#services" class="cta-secondary">Leistungen entdecken</a>
            </div>

            <div class="hero-phone fade-in-up delay-5">
                <span class="label">Mobil:</span>
                <a href="tel:01728560520" class="number">0172 / 856-0520</a>
                <span class="whatsapp">(auch WhatsApp)</span>
            </div>

        </div>
    </div>

    <a href="#services" class="scroll-indicator">
        <span class="chevron">⌄</span>
    </a>
</section>

<section id="services" class="services-section">
    <div class="section-line"></div>

    <div class="services-heading">
        <h2>MEINE LEISTUNGEN</h2>
        <p class="services-subline">Verwöhnprogramm für Hände, Füße & Seele</p>
    </div>

    <div class="services-overlay"></div>

    <div class="services-grid">

        <div class="service-card">

            <div class="card-image-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nageldesign.jpeg" alt="Nageldesign">
            </div>

            <div class="card-content">
                <div class="service-title-row">
                    <h3>Nageldesign</h3>
                    <div class="service-meta-inline">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#C9A96E" stroke-width="1.5">
                            <path d="M12 2 L13.5 10.5 L22 12 L13.5 13.5 L12 22 L10.5 13.5 L2 12 L10.5 10.5 Z"/>
                        </svg>
                        <span>Nagelkunst</span>
                    </div>
                </div>

                <p class="short-text">
                    Von klassisch elegant bis kreativ-verspielt – individuelle Nagelgestaltung nach Ihren Wünschen.
                </p>

                <ul class="service-features">
                    <li>Nail Art & Designs</li>
                    <li>Gel-Modellage</li>
                    <li>Shellac & Gellack</li>
                    <li>Japanische Maniküre</li>
                </ul>
            </div>

        </div> 

        <div class="service-card">

            <div class="card-image-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pedicure.jpeg" alt="Fußpflege">
            </div>

            <div class="card-content">
                <div class="service-title-row">
                    <h3>Fußpflege</h3>
                    <div class="service-meta-inline">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#C9A96E" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 21s-6.5-4.35-9.5-8.28C-1.5 7.5 2 2.5 6.5 4.5 9 5.6 12 9 12 9s3-3.4 5.5-4.5C22 2.5 25.5 7.5 21.5 12.72 18.5 16.65 12 21 12 21z"/>
                        </svg>
                        <span>Wohlbefinden</span>
                    </div>
                </div>

                <p class="short-text">
                    Professionelle Fußpflege für wohlgepflegte und gesunde Füße – von der Hornhautentfernung bis zur Nagelpflege.
                </p>

                <ul class="service-features">
                    <li>Hornhautentfernung</li>
                    <li>Nagelpflege & Klebespange</li>
                    <li>Fußmassage</li>
                    <li>Nagellackierung (Lack & Gel)</li>
                </ul>
            </div>

        </div> 

        <div class="service-card">

            <div class="card-image-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/massage.jpg" alt="Massagen">
            </div>

            <div class="card-content">
                <div class="service-title-row">
                    <h3>Massagen</h3>
                    <div class="service-meta-inline">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#C9A96E" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 21s-6.5-4.35-9.5-8.28C-1.5 7.5 2 2.5 6.5 4.5 9 5.6 12 9 12 9s3-3.4 5.5-4.5C22 2.5 25.5 7.5 21.5 12.72 18.5 16.65 12 21 12 21z"/>
                        </svg>
                        <span>Entspannung</span>
                    </div>
                </div>

                <p class="short-text">
                    Wohltuende Massagen für Körper, Geist und Seele. Individuell abgestimmt, mit frei wählbarem Aroma.
                </p>

                <ul class="service-features">
                    <li>Ganzkörper- & Rückenmassage</li>
                    <li>Gesichts- & Kopfmassage</li>
                    <li>Fußmassage</li>
                    <li>Aroma frei wählbar</li>
                    <li>Auch als Gutschein erhältlich</li>
                </ul>
            </div>

        </div>

        <p class="services-scroll-hint">Wischen zum Entdecken</p>
    </div>
</section>

<!-- QUOTE SECTION -->
<section id="quote" class="quote-section">
    <div class="section-line"></div>
    <div class="quote-container">
        <div class="quote-inner">
            <div class="quote-mark">"</div>

            <blockquote class="quote-text">
                Schönheit beginnt in dem Moment, in dem Sie sich entscheiden,
                <em>Sie selbst zu sein</em>.
            </blockquote>

            <div class="quote-author">
                <div class="line"></div>
                <span class="author-text">Mária Feldman · M-Nagelbeauty</span>
                <div class="line"></div>
            </div>
        </div>
    </div>
</section>
<!-- ===========================
     GALLERY SECTION (STATIC)
=========================== -->

<section id="gallery" class="gallery-section">
    <div class="section-line"></div>
    <div class="gallery-container">

        <div class="gallery-header">
            <div class="gallery-eyebrow-wrap">
                <div class="line"></div>
                <span class="eyebrow">Meine Arbeiten</span>
            </div>

            <h2 class="gallery-title">
                Einblicke in<br>
                <em>meine Kunst</em>
            </h2>
        </div>

        <!-- Filter Buttons -->
        <div class="gallery-filter">
            <button class="filter-btn active" data-filter="alle">Alle</button>
            <button class="filter-btn" data-filter="nageldesign">Nageldesign</button>
            <button class="filter-btn" data-filter="fusspflege">Fußpflege</button>
            <button class="filter-btn" data-filter="massage">Massage</button>
            <button class="filter-btn" data-filter="studio">Studio</button>
        </div>

        <!-- Galerie Grid -->
        <div id="gallery-grid" class="gallery-grid">
            <?php
            $galerie_query = new WP_Query(array(
                'post_type'      => 'galerie',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'orderby'        => 'menu_order date',
                'order'          => 'ASC',
            ));

            if ($galerie_query->have_posts()):
                while ($galerie_query->have_posts()): $galerie_query->the_post();
                    $bild      = get_field('galerie_bild');
                    $kategorie = get_field('galerie_kategorie');
                    $kat_label = array(
                        'nageldesign' => 'Nageldesign',
                        'fusspflege'  => 'Fußpflege',
                        'massage'     => 'Massage',
                        'studio'      => 'Studio',
                    );
                    if (!$bild) continue;
            ?>
                <div class="gallery-item visible" data-kategorie="<?php echo esc_attr($kategorie); ?>">
                    <img
                        src="<?php echo esc_url($bild['sizes']['large'] ?? $bild['url']); ?>"
                        alt="<?php echo esc_attr($bild['alt'] ?: $kat_label[$kategorie] ?? 'Galerie'); ?>"
                        class="gallery-img"
                        loading="lazy"
                    >
                    <div class="gallery-overlay">
                        <div class="overlay-content">
                            <span class="zoom-label"><?php echo esc_html($kat_label[$kategorie] ?? ''); ?></span>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else:
            ?>
                <p class="gallery-empty">Noch keine Bilder vorhanden.</p>
            <?php endif; ?>
        </div>

        <!-- Load More / Less -->
        <div class="gallery-load-wrap">
            <button id="gallery-load-less" class="gallery-load-btn" style="display:none;">Weniger anzeigen</button>
            <button id="gallery-load-more" class="gallery-load-btn">Mehr anzeigen</button>
        </div>



    </div>

    <div id="gallery-lightbox" class="gallery-lightbox">
        <button class="lightbox-close">✕</button>
        <img id="lightbox-img" src="" alt="">
    </div>
</section>

<!-- ===========================
     ABOUT SECTION
=========================== -->

<section id="about" class="about-section">
    <div class="section-line"></div>
    <div class="about-container">

        <div class="about-grid" id="about-animate">

            <!-- BILD SEITE -->
            <div class="about-image-wrap">

                <!-- Dekoratives Gold-Element oben links -->
                <div class="about-deco-line"></div>

                <div class="about-image-inner">
                    <img
                        src="<?php echo get_template_directory_uri(); ?>/assets/images/Studio.jpeg"
                        alt="Das M-Nagelbeauty Studio"
                        class="about-image"
                    >
                    <!-- Goldener Rahmen versetzt -->
                    <div class="about-image-frame"></div>
                    <!-- Overlay Gradient unten -->
                    <div class="about-image-gradient"></div>
                </div>

                <!-- Floating Badge -->
                <div class="about-floating-card">
                    <p class="floating-number"><span id="experience-counter">0</span><span>+</span></p>
                    <p class="floating-text">Jahre Erfahrung</p>
                </div>

            </div>

            <!-- CONTENT SEITE -->
            <div class="about-content">

                <div class="about-eyebrow-wrap about-reveal" data-delay="0">
                    <div class="line"></div>
                    <span class="eyebrow">Über mich</span>
                </div>

                <h2 class="about-title about-reveal" data-delay="80">
                    Herzlich<br>
                    <em>willkommen</em>
                </h2>

                <div class="about-divider about-reveal" data-delay="160"></div>

                <p class="about-text about-reveal" data-delay="240">
                    Mein Name ist <strong>Mária Feldman</strong>, Nageldesignerin und Fußpflegerin
                    aus Neuendettelsau. Mit Leidenschaft und Sorgfalt widme ich mich der
                    Schönheitspflege Ihrer Hände und Füße.
                </p>

                <p class="about-text light about-reveal" data-delay="320">
                    In meinem gemütlichen Studio erwartet Sie eine ruhige, persönliche Atmosphäre,
                    in der Sie zur Ruhe kommen und sich verwöhnen lassen können. Jede Behandlung
                    wird mit größter Sorgfalt und hochwertigen Produkten durchgeführt – für
                    Ergebnisse, die Sie mit nach Hause nehmen.
                </p>

                <div class="about-info-list about-reveal" data-delay="400">

                    <div class="info-item">
                        <div class="info-icon-wrap">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#C9A96E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                        <div>
                            <p class="info-title">Neuendettelsau, Bayern</p>
                            <p class="info-sub">Reuther Str. 1B</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon-wrap">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#C9A96E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.15 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.06 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.09 8.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21 16z"/>
                            </svg>
                        </div>
                        <div>
                            <a href="tel:01728560520" class="info-title link">0172 / 856-0520</a>
                            <p class="info-sub">Auch per WhatsApp erreichbar</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon-wrap">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#C9A96E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                            </svg>
                        </div>
                        <div>
                            <p class="info-title">Termine nach Vereinbarung</p>
                            <p class="info-sub">Online-Terminanfragen nicht möglich</p>
                        </div>
                    </div>

                </div>

                <div class="about-notice about-reveal" data-delay="480">
                    <div class="notice-icon">!</div>
                    <div>
                        <p class="notice-title">Wichtiger Hinweis zu Terminabsagen</p>
                        <p class="notice-text">
                            Ein vereinbarter Termin ist verbindlich und für Sie persönlich reserviert.
                            Absagen sind kostenfrei, wenn diese <strong>mindestens 24 Stunden vorher</strong>
                            erfolgen – per WhatsApp oder telefonisch. Vielen Dank für Ihr Verständnis.
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- ===========================
     CONTACT SECTION
=========================== -->

<section id="contact" class="contact-section">
    <div class="section-line"></div>

    <!-- Dezenter Hintergrund-Glow -->
    <div class="contact-bg-glow"></div>

    <div class="contact-container">

        <!-- Grid: Content links, Map rechts -->
        <div class="contact-grid" id="contact-animate">

            <!-- LINKE SPALTE: Header + Kontakt -->
            <div class="contact-info">

                <div class="contact-header contact-reveal" data-delay="0">
                    <div class="contact-eyebrow-wrap">
                        <div class="line"></div>
                        <span class="eyebrow">Kontakt & Anfahrt</span>
                    </div>
                    <h2 class="contact-title">
                        Ich freue mich<br>
                        <em>auf Sie</em>
                    </h2>
                    <p class="contact-intro">
                        Vereinbaren Sie Ihren persönlichen Termin – telefonisch oder per WhatsApp.
                        Ich freue mich darauf, Sie im Studio begrüßen zu dürfen.
                    </p>
                </div>

                <!-- Anruf CTA -->
                <a href="tel:01728560520" class="contact-cta-card contact-reveal" data-delay="120">
                    <div class="cta-card-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.15 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.06 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.09 8.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 21 16z"/>
                        </svg>
                    </div>
                    <div class="cta-card-text">
                        <span class="cta-card-label">Jetzt anrufen</span>
                        <span class="cta-card-number">0172 / 856-0520</span>
                    </div>
                    <div class="cta-card-arrow">→</div>
                </a>

                <!-- WhatsApp CTA -->
                <a href="https://wa.me/491728560520" target="_blank" class="contact-cta-card contact-cta-wa contact-reveal" data-delay="200">
                    <div class="cta-card-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                        </svg>
                    </div>
                    <div class="cta-card-text">
                        <span class="cta-card-label">WhatsApp</span>
                        <span class="cta-card-number">Nachricht senden</span>
                    </div>
                    <div class="cta-card-arrow">→</div>
                </a>

                <div class="contact-divider contact-reveal" data-delay="280"></div>

                <div class="contact-items">

                    <div class="contact-item contact-reveal" data-delay="320">
                        <div class="contact-icon-wrap">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#C9A96E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                        <div>
                            <p class="contact-label">Standort</p>
                            <a href="https://www.google.com/maps/place/M-Nagelbeauty" target="_blank" class="contact-value">Neuendettelsau, Bayern</a>
                            <p class="contact-desc">Reuther Str. 1B</p>
                        </div>
                    </div>

                    <div class="contact-item contact-reveal" data-delay="370">
                        <div class="contact-icon-wrap">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#C9A96E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="contact-label">Facebook</p>
                            <a href="https://www.facebook.com/neuendettelsau.nageldesign" target="_blank" class="contact-value">M-Nagelbeauty</a>
                            <p class="contact-desc">Aktuelle Inspirationen & Angebote</p>
                        </div>
                    </div>

                    <div class="contact-item contact-reveal" data-delay="420">
                        <div class="contact-icon-wrap">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#C9A96E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                            </svg>
                        </div>
                        <div>
                            <p class="contact-label">Instagram</p>
                            <a href="https://www.instagram.com/mnagelbeauty/" target="_blank" class="contact-value">@mnagelbeauty</a>
                            <p class="contact-desc">Neue Designs & Einblicke</p>
                        </div>
                    </div>

                </div>

            </div>

            <!-- RECHTE SPALTE: Map – gleiche Höhe wie Content -->
            <div class="contact-map-wrap contact-reveal" data-delay="100">
                <!-- Dark Mode Filter über die Map -->
                <div class="contact-map-dark-overlay"></div>
                <div class="contact-map" id="contact-map-wrap">
                    <!-- Karte wird nur nach Cookie-Zustimmung geladen -->
                    <div class="map-consent-placeholder" id="map-placeholder">
                        <div class="map-consent-inner">
                            <div class="map-consent-icon">📍</div>
                            <p class="map-consent-title">Karte nicht geladen</p>
                            <p class="map-consent-text">Um die Karte anzuzeigen, stimmen Sie bitte der Nutzung von Google Maps zu.</p>
                            <button class="map-consent-btn" id="map-consent-btn">Karte laden</button>
                        </div>
                    </div>
                    <iframe
                        id="google-map-iframe"
                        title="M-Nagelbeauty Standort Neuendettelsau"
                        data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2602.5838560508573!2d10.788778899999999!3d49.2842821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4798b36955a15997%3A0xb2608a2db0f7fe03!2sM-Nagelbeauty%20Nagelstudio%20und%20kosmetische%20Fu%C3%9Fpflege!5e0!3m2!1sde!2sde!4v1774000051552!5m2!1sde!2sde"
                        width="100%" height="100%"
                        style="border:0; display:none;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <!-- Dekoratives L-Element wie About Section -->
                <div class="contact-deco-line"></div>
                <div class="contact-map-card">
                    <p class="map-card-title">M-Nagelbeauty</p>
                    <p class="map-card-sub">Neuendettelsau, Bayern · Termine nach Vereinbarung</p>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>