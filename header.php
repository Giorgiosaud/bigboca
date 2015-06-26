<?php

?>

<!DOCTYPE html>

<!--[if lt IE 7]>      <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html <?php language_attributes(); ?> class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <title><?php wp_title("",true,'|'); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--[if lt IE 9]>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
    <![endif]-->

    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <!-- Latest compiled and minified CSS & JS -->
<!--    <link rel="stylesheet" media="screen" href="css/bootstrap.min.css">-->

<!--    <link rel="stylesheet" href="css/style.css">-->
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <?php wp_head(); ?>

</head>
<body>
