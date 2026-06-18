<?php if ( ! defined( 'ABSPATH' ) ) { exit; } ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="The White Shirt Man by Akhil Dave — Healthcare Marketing Insights, Strategy, Mentorship & Consulting Readiness.">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>

<a class="twsm-skip-link" href="#primary"><?php esc_html_e( 'Skip to main content', 'the-white-shirt-man' ); ?></a>

<header class="twsm-nav" id="twsm-nav" role="banner">
    <div class="twsm-container twsm-nav__inner">
        <a href="#hero" class="twsm-nav__brand">
            <span class="twsm-nav__brand-mark">WSM</span>
            <span class="twsm-nav__brand-text"><?php bloginfo( 'name' ); ?></span>
        </a>
        <nav class="twsm-nav__links" aria-label="<?php esc_attr_e( 'Primary navigation', 'the-white-shirt-man' ); ?>">
            <a href="#about">About</a>
            <a href="#videos">Videos</a>
            <a href="#program">Program</a>
            <a href="#apply">Who Can Apply</a>
            <a href="#learn">Curriculum</a>
            <a href="#faq">FAQ</a>
        </nav>
        <a href="<?php echo esc_url( 'https://hmsconsultants.in/our-associates/' ); ?>" class="twsm-btn twsm-btn--gold twsm-nav__cta" target="_blank" rel="noopener" aria-label="<?php esc_attr_e( 'Apply for the HMS Certified Healthcare Marketing Consulting Program (opens in a new tab)', 'the-white-shirt-man' ); ?>">Apply Now</a>
        <button class="twsm-nav__toggle" id="twsm-nav-toggle"
            aria-label="<?php esc_attr_e( 'Open menu', 'the-white-shirt-man' ); ?>"
            aria-expanded="false"
            aria-controls="twsm-nav-mobile">
            <span></span><span></span><span></span>
        </button>
    </div>
    <nav class="twsm-nav__mobile" id="twsm-nav-mobile"
        aria-label="<?php esc_attr_e( 'Mobile navigation', 'the-white-shirt-man' ); ?>"
        aria-hidden="true">
        <a href="#about">About</a>
        <a href="#videos">Videos</a>
        <a href="#program">Program</a>
        <a href="#apply">Who Can Apply</a>
        <a href="#learn">Curriculum</a>
        <a href="#faq">FAQ</a>
        <a href="<?php echo esc_url( 'https://hmsconsultants.in/our-associates/' ); ?>" class="twsm-btn twsm-btn--gold" target="_blank" rel="noopener">Apply Now</a>
    </nav>
</header>