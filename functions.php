<?php
/**
 * Business DE-DK – functions.php
 * Theme-Setup, Assets, Custom Post Types und Helfer-Funktionen.
 *
 * @package business-de-dk
 */

if ( ! defined( 'ABSPATH' ) ) { exit; } // Direktzugriff verhindern

/* =========================================================
   1. THEME SETUP
   ========================================================= */
function bdk_setup() {
	add_theme_support( 'title-tag' );             // <title> dynamisch (gut für SEO)
	add_theme_support( 'post-thumbnails' );       // Beitragsbilder
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo' );

	register_nav_menus( array(
		'primary' => __( 'Hauptmenü', 'business-de-dk' ),
	) );
}
add_action( 'after_setup_theme', 'bdk_setup' );

/* =========================================================
   2. STYLES & SCRIPTS LADEN
   ========================================================= */
function bdk_assets() {
	// Google Font: Raleway (laut Style Guide des Kunden)
	wp_enqueue_style(
		'bdk-raleway',
		'https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800&display=swap',
		array(), null
	);

	// Haupt-Stylesheet (style.css im Theme-Root)
	wp_enqueue_style( 'bdk-style', get_stylesheet_uri(), array( 'bdk-raleway' ), '1.0.0' );

	// JavaScript (Menü, Filter, Sprachumschalter)
	wp_enqueue_script( 'bdk-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'bdk_assets' );

/* =========================================================
   3. CUSTOM POST TYPES  (Network Database & Media Channel)
   ========================================================= */
function bdk_register_cpts() {

	// 3a) STAKEHOLDER (Network Database)
	register_post_type( 'stakeholder', array(
		'labels' => array(
			'name'          => 'Stakeholder',
			'singular_name' => 'Stakeholder',
			'add_new_item'  => 'Neuen Stakeholder hinzufügen',
		),
		'public'       => true,
		'has_archive'  => false,
		'menu_icon'    => 'dashicons-groups',
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'rewrite'      => array( 'slug' => 'stakeholder' ),
	) );

	// 3b) INTERVIEW (Media Channel)
	register_post_type( 'interview', array(
		'labels' => array(
			'name'          => 'Interviews',
			'singular_name' => 'Interview',
			'add_new_item'  => 'Neues Interview hinzufügen',
		),
		'public'       => true,
		'has_archive'  => false,
		'menu_icon'    => 'dashicons-video-alt3',
		'supports'     => array( 'title', 'editor', 'thumbnail' ),
		'rewrite'      => array( 'slug' => 'interview' ),
	) );

	// 3c) EVENT
	register_post_type( 'event', array(
		'labels' => array(
			'name'          => 'Events',
			'singular_name' => 'Event',
			'add_new_item'  => 'Neues Event hinzufügen',
		),
		'public'       => true,
		'has_archive'  => false,
		'menu_icon'    => 'dashicons-calendar-alt',
		'supports'     => array( 'title', 'editor' ),
		'rewrite'      => array( 'slug' => 'event' ),
	) );
}
add_action( 'init', 'bdk_register_cpts' );

/* =========================================================
   4. TAXONOMIEN  (Filter-Pills)
   ========================================================= */
function bdk_register_taxonomies() {
	register_taxonomy( 'sector', 'stakeholder', array(
		'label'        => 'Branchen',
		'hierarchical' => true,
		'public'       => true,
		'rewrite'      => array( 'slug' => 'sector' ),
	) );
	register_taxonomy( 'interview_cat', 'interview', array(
		'label'        => 'Interview-Kategorien',
		'hierarchical' => true,
		'public'       => true,
	) );
	register_taxonomy( 'event_cat', 'event', array(
		'label'        => 'Event-Kategorien',
		'hierarchical' => true,
		'public'       => true,
	) );
}
add_action( 'init', 'bdk_register_taxonomies' );

/* =========================================================
   5. META-BOXEN  (Zusatzfelder, ganz ohne Plugin)
   ========================================================= */
function bdk_meta_fields() {
	return array(
		'stakeholder' => array(
			'role'         => 'Rolle / Titel',
			'company'      => 'Firma',
			'location'     => 'Standort (z. B. Flensburg, DE)',
			'country'      => 'Land-Code (DE oder DK)',
			'languages'    => 'Sprachen (z. B. DE, EN, DK)',
			'member_since' => 'Mitglied seit (z. B. January 2023)',
		),
		'interview' => array(
			'speaker'   => 'Sprecher (Name)',
			'company'   => 'Firma',
			'duration'  => 'Dauer (z. B. 18 min)',
			'video_url' => 'YouTube-/Video-URL',
		),
		'event' => array(
			'event_date' => 'Datum (Format: 2026-05-15)',
			'location'   => 'Ort (z. B. Flensburg, DE)',
		),
	);
}

function bdk_add_meta_boxes() {
	foreach ( bdk_meta_fields() as $cpt => $fields ) {
		add_meta_box( 'bdk_' . $cpt . '_meta', 'Details', 'bdk_render_meta_box', $cpt, 'normal', 'high' );
	}
}
add_action( 'add_meta_boxes', 'bdk_add_meta_boxes' );

function bdk_render_meta_box( $post ) {
	$all    = bdk_meta_fields();
	$fields = isset( $all[ $post->post_type ] ) ? $all[ $post->post_type ] : array();
	wp_nonce_field( 'bdk_save_meta', 'bdk_meta_nonce' );
	echo '<div style="display:grid;gap:14px;padding:8px 0;">';
	foreach ( $fields as $key => $label ) {
		$value = esc_attr( get_post_meta( $post->ID, '_bdk_' . $key, true ) );
		echo '<p style="margin:0;"><label style="display:block;font-weight:600;margin-bottom:4px;">' . esc_html( $label ) . '</label>';
		echo '<input type="text" name="bdk_' . esc_attr( $key ) . '" value="' . $value . '" style="width:100%;padding:8px;" /></p>';
	}
	echo '</div>';
}

function bdk_save_meta( $post_id ) {
	if ( ! isset( $_POST['bdk_meta_nonce'] ) || ! wp_verify_nonce( $_POST['bdk_meta_nonce'], 'bdk_save_meta' ) ) { return; }
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) { return; }
	if ( ! current_user_can( 'edit_post', $post_id ) ) { return; }

	$all  = bdk_meta_fields();
	$type = get_post_type( $post_id );
	if ( ! isset( $all[ $type ] ) ) { return; }

	foreach ( $all[ $type ] as $key => $label ) {
		if ( isset( $_POST[ 'bdk_' . $key ] ) ) {
			update_post_meta( $post_id, '_bdk_' . $key, sanitize_text_field( $_POST[ 'bdk_' . $key ] ) );
		}
	}
}
add_action( 'save_post', 'bdk_save_meta' );

/* =========================================================
   6. HELFER-FUNKTIONEN
   ========================================================= */

/** Meta-Wert eines Beitrags holen */
function bdk_meta( $key, $post_id = null ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return get_post_meta( $post_id, '_bdk_' . $key, true );
}

/** Initialen aus einem Namen ("Anna Schultz" => "AS") */
function bdk_initials( $name ) {
	$parts = preg_split( '/\s+/', trim( $name ) );
	$ini   = '';
	foreach ( array_slice( $parts, 0, 2 ) as $p ) { $ini .= strtoupper( substr( $p, 0, 1 ) ); }
	return $ini;
}

/** Aktive Navigation markieren */
function bdk_is_active( $slug ) {
	if ( 'home' === $slug ) { return is_front_page(); }
	if ( 'network' === $slug ) { return ( is_page( 'network' ) || is_singular( 'stakeholder' ) ); }
	if ( 'interviews' === $slug ) { return ( is_page( 'interviews' ) || is_singular( 'interview' ) ); }
	if ( 'events' === $slug ) { return ( is_page( 'events' ) || is_singular( 'event' ) ); }
	if ( 'about' === $slug ) { return ( is_page( 'about' ) || is_page( 'gallery' ) ); }
	return false;
}

/** Kurz-URL zu einer Seite per Slug (Fallback auf #) */
function bdk_page_url( $slug ) {
	$page = get_page_by_path( $slug );
	return $page ? get_permalink( $page->ID ) : '#';
}

/* =========================================================
   7. EINFACHE META-DESCRIPTION (SEO)
   ========================================================= */
function bdk_meta_description() {
	$desc = get_bloginfo( 'description' );
	if ( is_singular() ) {
		$excerpt = get_the_excerpt();
		if ( $excerpt ) { $desc = $excerpt; }
	}
	if ( $desc ) {
		echo '<meta name="description" content="' . esc_attr( wp_strip_all_tags( $desc ) ) . '">' . "\n";
	}
}
add_action( 'wp_head', 'bdk_meta_description', 1 );

/* =========================================================
   8. EXCERPT-LÄNGE
   ========================================================= */
function bdk_excerpt_length( $len ) { return 22; }
add_filter( 'excerpt_length', 'bdk_excerpt_length' );

/* =========================================================
   9. ÜBERSETZUNG (DE / DK / EN) – eigenes i18n ohne Plugin
   ========================================================= */

/** Erlaubte Sprachen */
function bdk_langs() { return array( 'en', 'de', 'dk' ); }

/** Aktuelle Sprache ermitteln: ?lang=… > Cookie > Standard 'en' */
function bdk_current_lang() {
	if ( isset( $_GET['lang'] ) && in_array( $_GET['lang'], bdk_langs(), true ) ) {
		return $_GET['lang'];
	}
	if ( isset( $_COOKIE['bdk_lang'] ) && in_array( $_COOKIE['bdk_lang'], bdk_langs(), true ) ) {
		return $_COOKIE['bdk_lang'];
	}
	return 'en';
}

/** Sprachwahl als Cookie speichern (läuft auf 'init', also vor jeder Ausgabe) */
function bdk_set_lang_cookie() {
	if ( isset( $_GET['lang'] ) && in_array( $_GET['lang'], bdk_langs(), true ) ) {
		setcookie( 'bdk_lang', $_GET['lang'], time() + YEAR_IN_SECONDS, COOKIEPATH ? COOKIEPATH : '/', COOKIE_DOMAIN );
	}
}
add_action( 'init', 'bdk_set_lang_cookie' );

/** ISO-Code für das <html lang=""> Attribut (dk -> da) */
function bdk_html_lang() {
	$map = array( 'en' => 'en', 'de' => 'de', 'dk' => 'da' );
	$cur = bdk_current_lang();
	return isset( $map[ $cur ] ) ? $map[ $cur ] : 'en';
}

/**
 * Übersetzungs-Helfer: bdk_t('key')
 * Gibt den Text in der aktuellen Sprache zurück (Fallback: EN, sonst der Key).
 */
function bdk_t( $key ) {
	static $strings = null;
	if ( null === $strings ) {
		$strings = include get_template_directory() . '/inc/translations.php';
	}
	$lang = bdk_current_lang();
	if ( isset( $strings[ $lang ][ $key ] ) ) { return $strings[ $lang ][ $key ]; }
	if ( isset( $strings['en'][ $key ] ) )    { return $strings['en'][ $key ]; }
	return $key;
}
