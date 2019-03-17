<?php

// THIS WILL ALLOW ADDING CUSTOM CSS TO THE style.css FILE and JS code to /js/zn_script_child.js

add_action( 'wp_enqueue_scripts', 'kl_child_scripts',11 );
function kl_child_scripts() {

	wp_deregister_style( 'kallyas-styles' );
    wp_enqueue_style( 'kallyas-styles', get_template_directory_uri().'/style.css', '' , ZN_FW_VERSION );
    wp_enqueue_style( 'kallyas-child', get_stylesheet_uri(), array('kallyas-styles') , ZN_FW_VERSION );

	/**
	 **** Uncomment this line if you want to add custom javascript file
	 */
	// wp_enqueue_script( 'zn_script_child', get_stylesheet_directory_uri() .'/js/zn_script_child.js' , '' , ZN_FW_VERSION , true );

}

/* ======================================================== */

/**
 * Load child theme's textdomain.
 */
add_action( 'after_setup_theme', 'kallyasChildLoadTextDomain' );
function kallyasChildLoadTextDomain(){
   load_child_theme_textdomain( 'zn_framework', get_stylesheet_directory().'/languages' );
}

/* ======================================================== */


// BEGIN DASHBOARD LOGO CUSTOMISATION
function wpb_custom_logo() {
	echo '
		<style type="text/css">
			#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
				background-image: url(' . get_stylesheet_directory_uri() . '/images/custom-logo.png) !important;
				background-position: 0 0;
                color:rgba(0, 0, 0, 0);
			}
			#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-custom-logoitem .ab-icon {
				background-position: 0 0;
			}
		</style>
	';
}
 
//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'wpb_custom_logo');

// END DASHBOARD LOGO CUSTOMISATION 

// BEGIN LOGIN PAGE CUSTOMISATION 
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/site-login-logo.png);
            height:49px;
            width:246px;
            background-size: 246px 49px;
            background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
        #loginform {
            border-radius: 5px;
            box-shadow: 0 0 12px #767676;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

// END LOGIN PAGE CUSTOMISATION 
/**
 * Example code loading JS in Header. Uncomment to use.
 */

/* ====== REMOVE COMMENT

add_action('wp_head', 'KallyasChild_loadHeadScript' );
function KallyasChild_loadHeadScript(){

	echo '
	<script type="text/javascript">

	// Your JS code here

	</script>';

}
 ====== REMOVE COMMENT */

/* ======================================================== */

/**
 * Example code loading JS in footer. Uncomment to use.
 */

/* ====== REMOVE COMMENT

add_action('wp_footer', 'KallyasChild_loadFooterScript' );
function KallyasChild_loadFooterScript(){

	echo '
	<script type="text/javascript">

	// Your JS code here

	</script>';

}
 ====== REMOVE COMMENT */

/* ======================================================== */
