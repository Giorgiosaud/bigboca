<?php
// include_once 'vendor/autoload.php';
include_once 'inc/stylesandscripts.php';
 include_once 'inc/header_customization.php';
 include_once 'inc/customPostType/customPosts.php';
 include_once 'inc/customShortcode/shortcodes.php';
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