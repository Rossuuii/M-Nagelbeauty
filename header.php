<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>

    <?php if (is_front_page()): ?>
    <!-- SEO Meta Tags -->
    <meta name="description" content="M-Nagelbeauty – Professionelles Nageldesign, Fußpflege und Massagen in Neuendettelsau, Bayern. Termine nach Vereinbarung bei Mária Feldman. Jetzt anrufen: 0172 856-0520">
    <meta name="keywords" content="Nageldesign Neuendettelsau, Fußpflege Bayern, Nagelstudio, Gel Nägel, Shellac, Maniküre, Pediküre, Massage">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://m-nagelbeauty.de/">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://m-nagelbeauty.de/">
    <meta property="og:title" content="M-Nagelbeauty – Nageldesign & Fußpflege in Neuendettelsau">
    <meta property="og:description" content="Professionelles Nageldesign, Fußpflege und Massagen in Neuendettelsau. Termine nach Vereinbarung bei Mária Feldman.">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/og-image.jpg">
    <meta property="og:locale" content="de_DE">
    <meta property="og:site_name" content="M-Nagelbeauty">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="M-Nagelbeauty – Nageldesign & Fußpflege in Neuendettelsau">
    <meta name="twitter:description" content="Professionelles Nageldesign, Fußpflege und Massagen in Neuendettelsau.">
    <meta name="twitter:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/og-image.jpg">

    <!-- Schema.org Local Business -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "BeautySalon",
        "name": "M-Nagelbeauty",
        "description": "Professionelles Nageldesign, Fußpflege und Massagen in Neuendettelsau",
        "url": "https://m-nagelbeauty.de",
        "telephone": "+4901728560520",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Reuther Str. 1B",
            "addressLocality": "Neuendettelsau",
            "postalCode": "91564",
            "addressCountry": "DE"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": 49.2842821,
            "longitude": 10.7887789
        },
        "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "description": "Termine nach Vereinbarung"
        },
        "priceRange": "€€",
        "image": "https://m-nagelbeauty.de/wp-content/themes/m-nagelbeauty/assets/images/og-image.jpg"
    }
    </script>
    <?php endif; ?>
</head>

<body <?php body_class(); ?>>

<!-- Scroll Progress Bar -->
<div class="scroll-progress" id="scroll-progress"></div>

<!-- Custom Cursor -->
<div class="cursor-dot" id="cursor-dot"></div>
<div class="cursor-ring" id="cursor-ring"></div>

<!-- Page Transition Overlay -->
<div class="page-transition" id="page-transition"></div>

<header id="site-header" class="nav-fixed">
    <div class="nav-container">

        <!-- LOGO -->
        <div class="nav-logo" onclick="scrollToSection('#home')">
            <span class="logo-text">M‑Nagelbeauty</span>
            <span class="logo-eyebrow">Nageldesign & Fußpflege</span>
        </div>

        <!-- DESKTOP NAVIGATION -->
        <nav class="nav-links">
            <?php
                wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'container' => false,
                    'menu_class' => 'nav-menu'
                ]);
            ?>
            <a href="tel:01728560520" class="nav-call">
                <span>Termin anfragen</span>
            </a>
        </nav>

        <!-- MOBILE MENU BUTTON -->
        <button class="nav-mobile-btn" aria-label="Menü öffnen" onclick="toggleMobileMenu()">
            <span class="mobile-line"></span>
            <span class="mobile-line"></span>
            <span class="mobile-line"></span>
        </button>
    </div>
</header>

<!-- MOBILE OVERLAY -->
<div id="mobile-menu" class="mobile-overlay">
    <div class="mobile-inner">
        <button class="mobile-close-btn" onclick="toggleMobileMenu()">
            ✕ Schließen
        </button>


        <!-- MOBILE LOGO -->
        <div class="mobile-logo">
            <p class="mobile-logo-text">M‑Nagelbeauty</p>
            <p class="mobile-eyebrow">Nageldesign & Fußpflege</p>
        </div>

        <!-- MOBILE NAVIGATION -->
        <?php
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_class' => 'mobile-menu-list'
            ]);
        ?>

        <!-- BOTTOM ACTIONS -->
        <div class="mobile-actions">
            <a href="tel:01728560520" class="mobile-call">📞 Anrufen</a>
            <a href="https://wa.me/491728560520" target="_blank" class="mobile-whatsapp">💬 WhatsApp</a>
        </div>
    </div>
</div>