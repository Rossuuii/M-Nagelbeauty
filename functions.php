<?php

// ===============================
// CSS & JS EINBINDEN (mit Cache-Bust)
// ===============================
function nagelbeauty_enqueue_scripts() {

    // style.css mit filemtime() laden → verhindert Browser-Cache
    wp_enqueue_style(
        'nagelbeauty-style',
        get_stylesheet_uri(),
        array(),
        filemtime(get_template_directory() . '/style.css')
    );

    // Falls du später eigenes JS hast:
    // wp_enqueue_script(
    //     'nagelbeauty-script',
    //     get_template_directory_uri() . '/script.js',
    //     array(),
    //     filemtime(get_template_directory() . '/script.js'),
    //     true
    // );
}
add_action('wp_enqueue_scripts', 'nagelbeauty_enqueue_scripts');


// ===============================
// THEME SUPPORT
// ===============================
function nagelbeauty_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'nagelbeauty_theme_setup');


// ===============================
// MENÜS REGISTRIEREN
// ===============================
function nagelbeauty_register_menus() {
    register_nav_menus([
        'main-menu' => __('Hauptmenü')
    ]);
}
add_action('init', 'nagelbeauty_register_menus');

/* ===========================
   CPT: Galerie
=========================== */

function mnb_register_galerie_cpt() {
    $labels = array(
        'name'               => 'Galerie',
        'singular_name'      => 'Galerie-Bild',
        'menu_name'          => 'Galerie',
        'add_new'            => 'Neues Bild',
        'add_new_item'       => 'Neues Bild hinzufügen',
        'edit_item'          => 'Bild bearbeiten',
        'new_item'           => 'Neues Bild',
        'view_item'          => 'Bild ansehen',
        'search_items'       => 'Bilder suchen',
        'not_found'          => 'Keine Bilder gefunden',
        'not_found_in_trash' => 'Keine Bilder im Papierkorb',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-format-gallery',
        'supports'           => array('title'),
        'has_archive'        => false,
        'rewrite'            => false,
        'show_in_rest'       => true,
    );

    register_post_type('galerie', $args);
}
add_action('init', 'mnb_register_galerie_cpt');


/* ===========================
   ACF: Galerie Felder
=========================== */

add_action('acf/init', 'mnb_register_galerie_fields');
function mnb_register_galerie_fields() {
    if (!function_exists('acf_add_local_field_group')) return;

    acf_add_local_field_group(array(
        'key'      => 'group_galerie',
        'title'    => 'Galerie-Bild',
        'fields'   => array(

            array(
                'key'           => 'field_galerie_bild',
                'label'         => 'Foto',
                'name'          => 'galerie_bild',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
                'instructions'  => 'Empfohlen: mindestens 800×800px, JPG oder WebP',
            ),

            array(
                'key'           => 'field_galerie_kategorie',
                'label'         => 'Kategorie',
                'name'          => 'galerie_kategorie',
                'type'          => 'select',
                'choices'       => array(
                    'nageldesign' => 'Nageldesign',
                    'fusspflege'  => 'Fußpflege',
                    'massage'     => 'Massage',
                    'studio'      => 'Studio',
                ),
                'default_value' => 'nageldesign',
                'allow_null'    => 0,
                'multiple'      => 0,
                'ui'            => 1,
            ),

        ),
        'location' => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'galerie',
                ),
            ),
        ),
        'menu_order' => 0,
        'style'      => 'default',
    ));
}


/* ===========================
   CPT: Leistungen
=========================== */

function mnb_register_leistungen_cpt() {

    $labels = array(
        'name'               => 'Leistungen',
        'singular_name'      => 'Leistung',
        'menu_name'          => 'Leistungen',
        'add_new'            => 'Neue Leistung',
        'add_new_item'       => 'Neue Leistung hinzufügen',
        'edit_item'          => 'Leistung bearbeiten',
        'new_item'           => 'Neue Leistung',
        'view_item'          => 'Leistung ansehen',
        'search_items'       => 'Leistungen durchsuchen',
        'not_found'          => 'Keine Leistungen gefunden',
        'not_found_in_trash' => 'Keine Leistungen im Papierkorb',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'menu_icon'          => 'dashicons-art',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'has_archive'        => false,
        'rewrite'            => array('slug' => 'leistungen'),
        'show_in_rest'       => true,
    );

    register_post_type('leistungen', $args);
}
add_action('init', 'mnb_register_leistungen_cpt');

/* ===========================
   Benutzerrolle: Studio-Manager
=========================== */

function mnb_add_studio_manager_role() {

    add_role(
        'studio_manager',
        'Studio-Manager',
        array(
            'read'                   => true,
            'edit_posts'             => true,
            'edit_pages'             => true,
            'edit_published_pages'   => true,
            'upload_files'           => true,
            'delete_posts'           => true,
            'edit_published_posts'   => true,
            'publish_posts'          => true,

            // CPTs erlauben
            'edit_leistungen' => true,
            'edit_others_leistungen' => true,
            'publish_leistungen' => true,
            'delete_leistungen' => true,

            // Galerie CPT
            'edit_galerie'            => true,
            'edit_others_galerie'     => true,
            'publish_galerie'         => true,
            'delete_galerie'          => true,
            'delete_others_galerie'   => true,
            'read_private_galerie'    => true,
        )
    );
}
add_action('init', 'mnb_add_studio_manager_role');

/* ===========================
   Admin-Menü für Studio-Manager aufräumen
=========================== */

function mnb_clean_admin_menu() {
    $user = wp_get_current_user();
    if (!in_array('studio_manager', $user->roles)) return;

    // Alles entfernen außer Galerie + Startseite
    remove_menu_page('index.php');           // Dashboard (eigenes bleibt)
    remove_menu_page('edit.php');            // Beiträge
    remove_menu_page('upload.php');          // Medien
    remove_menu_page('edit.php?post_type=page'); // Seiten
    remove_menu_page('edit-comments.php');   // Kommentare
    remove_menu_page('themes.php');          // Design
    remove_menu_page('plugins.php');         // Plugins
    remove_menu_page('users.php');           // Benutzer
    remove_menu_page('tools.php');           // Werkzeuge
    remove_menu_page('options-general.php'); // Einstellungen
    remove_menu_page('edit.php?post_type=leistungen'); // Leistungen CPT
    remove_menu_page('edit.php?post_type=acf-field-group'); // ACF Feldgruppen
}
add_action('admin_menu', 'mnb_clean_admin_menu', 999);


/* ===========================
   Admin-Bar aufräumen
=========================== */

add_action('admin_bar_menu', 'mnb_clean_admin_bar', 999);
function mnb_clean_admin_bar($wp_admin_bar) {
    $user = wp_get_current_user();
    if (!in_array('studio_manager', $user->roles)) return;

    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_node('comments');
    $wp_admin_bar->remove_node('new-content');
    $wp_admin_bar->remove_node('customize');
}


/* ===========================
   Nach Login direkt zu Dashboard
=========================== */

add_filter('login_redirect', 'mnb_login_redirect', 10, 3);
function mnb_login_redirect($redirect_to, $request, $user) {
    if (isset($user->roles) && in_array('studio_manager', $user->roles)) {
        return admin_url();
    }
    return $redirect_to;
}

/* ===========================
   ACF Options Page: Hero
=========================== */

// ACF Options Page nicht benötigt (kostenlose ACF Version)


/* ===========================
   ACF Feldgruppe: Hero
=========================== */

add_action('acf/init', 'mnb_register_hero_fields');
function mnb_register_hero_fields() {
    if (!function_exists('acf_add_local_field_group')) return;

    acf_add_local_field_group(array(
        'key'    => 'group_hero',
        'title'  => 'Hero-Bereich (Startseite)',
        'fields' => array(

            array(
                'key'           => 'field_hero_background',
                'label'         => 'Hintergrundbild',
                'name'          => 'hero_background',
                'type'          => 'image',
                'return_format' => 'array',
                'preview_size'  => 'medium',
                'library'       => 'all',
                'instructions'  => 'Empfohlen: mindestens 1920×1080px, JPG oder WebP. Wird als Vollbild-Hintergrund angezeigt.',
            ),

            array(
                'key'           => 'field_hero_button_color',
                'label'         => 'Button-Farbe',
                'name'          => 'hero_button_color',
                'type'          => 'color_picker',
                'default_value' => '#7A1F2A',
                'instructions'  => 'Farbe des "Jetzt anrufen" Buttons im Hero-Bereich.',
            ),

        ),
        'location' => array(
            array(
                array(
                    'param'    => 'options_page',
                    'operator' => '==',
                    'value'    => 'studio-hero',
                ),
            ),
        ),
        'menu_order' => 0,
        'style'      => 'default',
    ));
}


/* ===========================
   Admin CSS für Studio-Manager
=========================== */

add_action('admin_enqueue_scripts', 'mnb_admin_styles');
function mnb_admin_styles() {
    $user = wp_get_current_user();
    if (!in_array('studio_manager', $user->roles)) return;

    wp_add_inline_style('wp-admin', '
        /* ================================
           M-Nagelbeauty Admin – Hell & Clean
        ================================ */

        /* Hintergrund */
        body.wp-admin { background: #F7F4F1 !important; }
        #wpcontent { background: #F7F4F1 !important; }
        #wpfooter { background: #F7F4F1 !important; border-top: 1px solid #E8E0D8 !important; color: #999 !important; }

        /* Sidebar */
        #adminmenuback, #adminmenuwrap { background: #1A1819 !important; }
        #adminmenu { background: #1A1819 !important; }
        #adminmenu a { color: rgba(255,255,255,0.55) !important; font-size: 13px !important; }
        #adminmenu li.menu-top:hover > a { color: #C9A96E !important; background: rgba(201,169,110,0.08) !important; }
        #adminmenu li.current > a,
        #adminmenu li.wp-has-current-submenu > a { color: #C9A96E !important; background: rgba(201,169,110,0.1) !important; border-left: 3px solid #C9A96E !important; }
        #adminmenu .dashicons { color: rgba(255,255,255,0.35) !important; }
        #adminmenu li.current .dashicons,
        #adminmenu li.menu-top:hover .dashicons { color: #C9A96E !important; }
        #adminmenu .wp-submenu { background: #121011 !important; }
        #adminmenu .wp-submenu a { color: rgba(255,255,255,0.5) !important; }
        #adminmenu .wp-submenu a:hover { color: #C9A96E !important; }
        #collapse-button { color: rgba(255,255,255,0.2) !important; }
        #adminmenu #collapse-menu .collapse-button-label { color: rgba(255,255,255,0.3) !important; }

        /* Admin Bar */
        #wpadminbar { background: #1A1819 !important; }
        #wpadminbar * { color: rgba(255,255,255,0.6) !important; }
        #wpadminbar #wp-admin-bar-site-name > .ab-item { color: #C9A96E !important; font-weight: 500 !important; }
        #wpadminbar .ab-top-menu > li:hover > .ab-item { background: rgba(201,169,110,0.1) !important; color: #C9A96E !important; }
        #wpadminbar .ab-submenu { background: #121011 !important; }

        /* Seitentitel */
        .wrap > h1, .wrap > h2 {
            font-family: Georgia, serif !important;
            font-weight: 400 !important;
            color: #2C2420 !important;
            font-size: 1.6rem !important;
            letter-spacing: 0.02em !important;
            border-bottom: 2px solid #C9A96E !important;
            padding-bottom: 0.6rem !important;
            margin-bottom: 1.5rem !important;
            display: inline-block !important;
        }

        /* Dashboard Widgets Container */
        #dashboard-widgets-wrap { margin-top: 1rem; }
        #dashboard-widgets .postbox-container { width: 100% !important; }

        /* Welcome Widget */
        #mnb_welcome {
            background: #fff !important;
            border: none !important;
            border-radius: 12px !important;
            box-shadow: 0 2px 16px rgba(0,0,0,0.07) !important;
            overflow: hidden !important;
        }
        #mnb_welcome .hndle {
            background: #1A1819 !important;
            border-bottom: none !important;
            padding: 18px 22px !important;
            cursor: default !important;
        }
        #mnb_welcome .hndle h2 {
            color: #C9A96E !important;
            font-family: Georgia, serif !important;
            font-size: 1rem !important;
            font-weight: 400 !important;
            letter-spacing: 0.05em !important;
        }
        #mnb_welcome .handlediv { display: none !important; }
        #mnb_welcome .inside {
            padding: 24px !important;
            background: #fff !important;
        }
        #mnb_welcome .inside p {
            color: #666 !important;
            font-size: 14px !important;
            margin-bottom: 16px !important;
        }
        #mnb_welcome .inside ul {
            list-style: none !important;
            padding: 0 !important;
            margin: 0 !important;
            display: grid !important;
            grid-template-columns: 1fr 1fr !important;
            gap: 12px !important;
        }
        #mnb_welcome .inside ul li {
            padding: 0 !important;
            margin: 0 !important;
            background: none !important;
            border: none !important;
            border-radius: 0 !important;
        }
        #mnb_welcome .inside ul li a {
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
            padding: 16px 20px !important;
            background: #F7F4F1 !important;
            border: 1px solid #E8E0D8 !important;
            border-radius: 10px !important;
            text-decoration: none !important;
            color: #2C2420 !important;
            font-size: 14px !important;
            font-weight: 500 !important;
            transition: all 0.2s ease !important;
            border-left: 3px solid #C9A96E !important;
        }
        #mnb_welcome .inside ul li a:hover {
            background: #FDF9F5 !important;
            border-color: #C9A96E !important;
            color: #C9A96E !important;
        }

        /* Postboxen (ACF Felder etc.) */
        .postbox {
            background: #fff !important;
            border: none !important;
            border-radius: 12px !important;
            box-shadow: 0 2px 16px rgba(0,0,0,0.06) !important;
            margin-bottom: 20px !important;
        }
        .postbox .hndle {
            background: #FDFAF7 !important;
            border-bottom: 1px solid #F0E8DF !important;
            border-radius: 12px 12px 0 0 !important;
            padding: 14px 18px !important;
        }
        .postbox .hndle h2 {
            color: #2C2420 !important;
            font-size: 13px !important;
            font-weight: 600 !important;
            letter-spacing: 0.03em !important;
        }
        .postbox .inside { padding: 18px !important; }

        /* ACF Felder */
        .acf-field .acf-label label {
            color: #444 !important;
            font-weight: 600 !important;
            font-size: 13px !important;
        }
        .acf-field .acf-input input[type=text],
        .acf-field .acf-input textarea,
        .acf-field .acf-input select {
            border: 1px solid #E0D8D0 !important;
            border-radius: 6px !important;
            background: #FDFAF7 !important;
            color: #2C2420 !important;
            padding: 8px 12px !important;
        }
        .acf-field .acf-input input:focus,
        .acf-field .acf-input textarea:focus {
            border-color: #C9A96E !important;
            box-shadow: 0 0 0 3px rgba(201,169,110,0.15) !important;
            outline: none !important;
        }

        /* Galerie Liste */
        .wp-list-table {
            background: #fff !important;
            border: none !important;
            border-radius: 12px !important;
            box-shadow: 0 2px 16px rgba(0,0,0,0.06) !important;
            overflow: hidden !important;
        }
        .wp-list-table thead th {
            background: #FDFAF7 !important;
            color: #888 !important;
            font-size: 11px !important;
            letter-spacing: 0.08em !important;
            text-transform: uppercase !important;
            border-bottom: 1px solid #F0E8DF !important;
            font-weight: 600 !important;
        }
        .wp-list-table tbody tr { border-bottom: 1px solid #F7F4F1 !important; }
        .wp-list-table tbody tr:hover td { background: #FDFAF7 !important; }
        .wp-list-table td { color: #444 !important; vertical-align: middle !important; }
        .row-actions span a { color: #C9A96E !important; }
        .row-actions span a:hover { color: #A8884A !important; }

        /* Titel Input */
        #titlediv #title {
            background: #FDFAF7 !important;
            border: 1px solid #E0D8D0 !important;
            border-radius: 8px !important;
            color: #2C2420 !important;
            font-size: 1.1rem !important;
            padding: 10px 14px !important;
            box-shadow: none !important;
        }
        #titlediv #title:focus { border-color: #C9A96E !important; box-shadow: 0 0 0 3px rgba(201,169,110,0.15) !important; outline: none !important; }

        /* Buttons */
        .button-primary {
            background: #C9A96E !important;
            border-color: #C9A96E !important;
            color: #fff !important;
            font-weight: 600 !important;
            border-radius: 6px !important;
            box-shadow: none !important;
            padding: 6px 16px !important;
        }
        .button-primary:hover { background: #B8935A !important; border-color: #B8935A !important; }
        .button-secondary {
            background: #fff !important;
            border-color: #C9A96E !important;
            color: #C9A96E !important;
            border-radius: 6px !important;
            box-shadow: none !important;
        }
        .button-secondary:hover { background: #FDF9F5 !important; }

        /* Notices */
        .notice-success { border-left-color: #C9A96E !important; background: #FDF9F5 !important; }
        .notice { border-radius: 8px !important; box-shadow: none !important; }

        /* Publish Box */
        #submitdiv .inside { padding: 12px !important; }
        #publishing-action .button-primary { width: 100% !important; text-align: center !important; padding: 10px !important; font-size: 14px !important; }
    ');
}

/* ===========================
   Admin-Dashboard anpassen
=========================== */

// Dashboard-Widgets aufräumen
add_action('wp_dashboard_setup', 'mnb_clean_dashboard');
function mnb_clean_dashboard() {
    $user = wp_get_current_user();
    if (!in_array('studio_manager', $user->roles)) return;

    // Alle Standard-Widgets einzeln entfernen
    remove_meta_box('dashboard_right_now',       'dashboard', 'normal');
    remove_meta_box('dashboard_activity',        'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press',     'dashboard', 'side');
    remove_meta_box('dashboard_primary',         'dashboard', 'side');
    remove_meta_box('dashboard_site_health',     'dashboard', 'normal');
    remove_meta_box('dashboard_php_nag',         'dashboard', 'normal');
    remove_meta_box('wpseo-dashboard-overview',  'dashboard', 'normal');

    // Eigenes Welcome-Widget
    wp_add_dashboard_widget(
        'mnb_welcome',
        'Willkommen, Mária! 👋',
        'mnb_welcome_widget'
    );
}

function mnb_welcome_widget() {
    echo '<div style="font-family: sans-serif; line-height: 1.6; color: #333;">';
    echo '<p>Hier können Sie Ihre Webseite verwalten:</p>';
    echo '<ul style="margin-top: 0.5rem; padding-left: 1.2rem;">';
    $front_page_id = get_option('page_on_front');
    echo '<li><a href="' . admin_url('post.php?post=' . $front_page_id . '&action=edit') . '"><strong>🏠 Startseite bearbeiten</strong></a> – Hintergrundbild & Button-Farbe ändern</li>';
    echo '<li style="margin-top: 0.5rem;"><a href="' . admin_url('edit.php?post_type=galerie') . '"><strong>🖼 Galerie verwalten</strong></a> – Fotos hinzufügen oder löschen</li>';
    echo '</ul>';
    echo '</div>';
}