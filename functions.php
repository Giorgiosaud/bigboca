<?php
include_once 'vendor/autoload.php';
// include_once 'inc/stylesandscripts.php';
 // include_once 'inc/header_customization.php';
 // include_once 'inc/customPostType/customPosts.php';
 // include_once 'inc/customShortcode/shortcodes.php';
add_theme_support('title-tag');
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');


add_action('admin_init', 'my_meta_init');
function my_meta_init()
{
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
    $template_file = get_post_meta($post_id, '_wp_page_template', true);

    $savemeta = true;
    $hideeditor = false;

    if ($template_file == 'contentStart.php') {
//        remove_post_type_support('page', 'editor');
    }
}

function has_children()
{
    global $post;

    return count(get_posts(array('post_parent' => $post->ID, 'post_type' => $post->post_type)));
}

function showCapability($icono, $title, $content, $alignment, $textindent = '')
{
    ob_start();
    ?>
    <div class="iconoCapabilities text-center">
        <span class="bigbocaicon icon-<?= $icono ?>" aria-hidden="true"></span>
    </div>
    <div class="titulo text-<?= $alignment ?>">
        <?= $title ?>
    </div>
    <div class="detalle text-<?= $alignment ?> <?= $textindent ?>">
        <?= $content ?>
    </div>
    <?php
    $myvariable = ob_get_clean();

    return $myvariable;
}
/* Convert hexdec color string to rgb(a) string */

function hex2rgba($color, $opacity = false) {

    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if(empty($color))
        return $default;

    //Sanitize $color if "#" is provided
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if($opacity){
        if(abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
        $output = 'rgb('.implode(",",$rgb).')';
    }

    //Return rgb(a) color string
    return $output;
}

add_action('login_head', 'b3m_custom_login_logo');
function b3m_custom_login_logo() {
    echo '<style type="text/css">
    h1 a { background-image:url('.get_stylesheet_directory_uri().'/img/login.png) !important; background-size: 311px 100px !important;height: 100px !important; width: 311px !important; margin-bottom: 0 !important; padding-bottom: 0 !important; }
    .login form { margin-top: 10px !important; }
    </style>';
}
function b3m_url_login_logo(){
    return get_bloginfo( 'wpurl' );
}
add_filter('login_headerurl', 'b3m_url_login_logo');

function b3m_login_logo_url_title() {
  return 'We escort brands into the Hispanic space,  at the consumer’s most convenient time and place.';
}
add_filter( 'login_headertitle', 'b3m_login_logo_url_title' );
function b3m_login_checked_remember_me() {
  add_filter( 'login_footer', 'b3m_rememberme_checked' );
}
add_action( 'init', 'b3m_login_checked_remember_me' );
 
function b3m_rememberme_checked() {
  echo "<script>document.getElementById('rememberme').checked = true;</script>";
}
function b3m_modify_footer_admin () {
  echo '<span id="footer-thankyou">Theme Development by <a href="http://www.zonapro.net" target="_blank">Zonapro.net</a></span>';
}
add_filter('admin_footer_text', 'b3m_modify_footer_admin');

function b3m_add_dashboard_widgets() {
  wp_add_dashboard_widget('wp_dashboard_widget', 'Theme Details', 'b3m_theme_info');
}
add_action('wp_dashboard_setup', 'b3m_add_dashboard_widgets' );
 
function b3m_theme_info() {
  echo "<ul>
  <li><strong>Developed By:</strong> Zonapro.net</li>
  <li><strong>Website:</strong> <a href='http://www.zonapro.net'>www.zonapro.net</a></li>
  <li><strong>Contact:</strong> <a href='mailto:jorgelsaud@gmail.com'>jorgelsaud@gmail.com</a></li>
  </ul>";
}
