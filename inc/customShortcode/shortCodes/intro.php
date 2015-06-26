<?php
// Add Shortcode
function intro_shortcode()
{
    ob_start(); ?>
    <nav class="menuPrincipal">


        <ul class="menuItems">
            <li>
                <span class="glyphicon glyphicon-menu-hamburger dropMenu pull-right iconoMenu"
                      aria-hidden="true"></span>
            </li>
            <li class="clearfix"></li>
            <div class="hiddenMenuElements">
                <li class="clickable" data-target="#us">Us<span
                        class="bigbocaicon icon-us iconoMenu"
                        aria-hidden="true"></span></li>
                <?php
                $query = new WP_Query(array(
                    'post_type' => array('us', 'capabilities'),
                    'meta_key'  => 'orden_en_menu',
                    'orderby'   => 'meta_value_num',
                    'order'     => 'ASC'
                ));
                $Index = 0;
                if ($query->have_posts()) {
                    while ($query->have_posts()) : $query->the_post();
                        $Index ++;

                        ?>

                        <li class="clickable" data-target="#<?= get_field('id') ?>"><?php the_title() ?><span
                                class="bigbocaicon icon-<?= get_field('icono') ?> iconoMenu"
                                aria-hidden="true"></span></li>
                       <?php
                    endwhile;
                }
                ?>
            </div>

        </ul>
        <img src="<?php header_image(); ?>" class="imagenMenu" alt="menuLogo">

    </nav>
    <section class="intro text-center fullheight container-fluid" id="primerPanel">
        <div class="logoContainer">
            <img src="<?php header_image(); ?>" class="logoImg" alt="Logo">
        </div>
        <div class="clearfix"></div>
        <div class="scrollDown">
            <img src="<?php echo get_template_directory_uri() ?>/img/scrollDown.png" height="178" width="144"
                 alt="scrolldown">
        </div>

    </section>
    <div id="trigger1"></div>

    <?php

    $myvariable = ob_get_clean();

    return $myvariable;
}

add_shortcode('intro', 'intro_shortcode');