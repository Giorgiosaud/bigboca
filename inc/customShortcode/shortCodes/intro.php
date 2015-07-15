<?php
// Add Shortcode
function intro_shortcode()
{
     extract(shortcode_atts(
            array(
               'comment'  => '"No other sampling program in the USA can expose your brand to this many Hispanic consumers under one roof, I guarantee this!”',
                'author'   => 'Rhandy Taveras',
            ), $atts)
    );
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
    <div class="hiddenContentOnLoad"></div>
    <section class="intro text-center fullheight container-fluid" id="primerPanel">
        <div class="logoContainer">
            <img src="<?php header_image(); ?>" class="logoImg" alt="Logo">
            <div class="col-xs-12 brandText"><span >Big Boca Marketing</span></div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-11 text-center mensajeInicial">
                    <?= $comment ?>
                    <div class="autor">
                        <?= $author ?>
                        <br/>
                        <?= $position ?>

                    </div>
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