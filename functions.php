<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! function_exists( 'twsm_setup' ) ) {
    function twsm_setup() {
        load_theme_textdomain( 'the-white-shirt-man', get_template_directory() . '/languages' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
        add_theme_support( 'custom-logo', array(
            'height'      => 60,
            'width'       => 200,
            'flex-height' => true,
            'flex-width'  => true,
        ) );
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'the-white-shirt-man' ),
        ) );
    }
}
add_action( 'after_setup_theme', 'twsm_setup' );

function twsm_enqueue_assets() {
    wp_enqueue_style( 'twsm-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap', array(), null );
    wp_enqueue_style( 'twsm-style', get_stylesheet_uri(), array(), '1.0' );
    wp_enqueue_style( 'twsm-main', get_template_directory_uri() . '/assets/css/main.css', array( 'twsm-style' ), '1.0' );
    wp_enqueue_script( 'twsm-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'twsm_enqueue_assets' );

function twsm_body_classes( $classes ) {
    $classes[] = 'twsm-body';
    return $classes;
}
add_filter( 'body_class', 'twsm_body_classes' );

/**
 * SEO: document title parts (clean, branded titles)
 */
function twsm_document_title_parts( $title ) {
    if ( is_front_page() ) {
        $title['title']   = 'The White Shirt Man';
        $title['tagline'] = 'Healthcare Marketing Insights by Akhil Dave';
        unset( $title['site'] );
    }
    return $title;
}
add_filter( 'document_title_parts', 'twsm_document_title_parts' );

function twsm_document_title_separator( $sep ) { return '—'; }
add_filter( 'document_title_separator', 'twsm_document_title_separator' );

/**
 * SEO: meta description, canonical, Open Graph, Twitter, JSON-LD
 */
function twsm_seo_meta() {
    $site_name   = get_bloginfo( 'name' );
    $description = 'The White Shirt Man by Akhil Dave — a healthcare marketing knowledge platform helping doctors, hospitals, clinics, diagnostic centres, and healthcare startups build visibility, trust, and sustainable growth.';
    $url         = is_front_page() ? home_url( '/' ) : ( is_singular() ? get_permalink() : home_url( add_query_arg( null, null ) ) );
    $image       = get_template_directory_uri() . '/screenshot.png';
    ?>
    <meta name="description" content="<?php echo esc_attr( $description ); ?>">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="author" content="Akhil Dave">
    <meta name="theme-color" content="#0b1430">
    <link rel="canonical" href="<?php echo esc_url( $url ); ?>">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?php echo esc_attr( $site_name ); ?>">
    <meta property="og:title" content="The White Shirt Man — Healthcare Marketing by Akhil Dave">
    <meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
    <meta property="og:url" content="<?php echo esc_url( $url ); ?>">
    <meta property="og:image" content="<?php echo esc_url( $image ); ?>">
    <meta property="og:locale" content="<?php echo esc_attr( get_locale() ); ?>">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="The White Shirt Man — Healthcare Marketing by Akhil Dave">
    <meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
    <meta name="twitter:image" content="<?php echo esc_url( $image ); ?>">

    <script type="application/ld+json">
    <?php echo wp_json_encode( array(
        '@context' => 'https://schema.org',
        '@graph'   => array(
            array(
                '@type'       => 'Organization',
                '@id'         => home_url( '/#organization' ),
                'name'        => 'HMS Consultants',
                'url'         => 'https://hmsconsultants.in/',
                'founder'     => array( '@type' => 'Person', 'name' => 'Akhil Dave' ),
                'sameAs'      => array(
                    'https://www.youtube.com/@thewhiteshirtmanakhil',
                    'https://hmsconsultants.in/about-hms-consultants/akhil-dave/',
                ),
            ),
            array(
                '@type'        => 'WebSite',
                '@id'          => home_url( '/#website' ),
                'url'          => home_url( '/' ),
                'name'         => $site_name,
                'description'  => $description,
                'publisher'    => array( '@id' => home_url( '/#organization' ) ),
            ),
            array(
                '@type' => 'Person',
                'name'  => 'Akhil Dave',
                'jobTitle' => 'Founder, HMS Consultants',
                'url'   => 'https://hmsconsultants.in/about-hms-consultants/akhil-dave/',
                'worksFor' => array( '@id' => home_url( '/#organization' ) ),
            ),
        ),
    ), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?>
    </script>
    <?php
}
add_action( 'wp_head', 'twsm_seo_meta', 5 );