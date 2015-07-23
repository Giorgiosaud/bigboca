<?php
// Add Shortcode
function intro_shortcode()
{
    $comment=get_field('intro_message');
    $icono=get_field('us_icono');
    $id=get_field('us_id');
    ob_start(); ?>
    <nav class="menuPrincipal">


        <ul class="menuItems">
            <li>
                <span class="glyphicon glyphicon-menu-hamburger dropMenu pull-right iconoMenu"
                aria-hidden="true"></span>
            </li>
            <li class="clearfix"></li>
            <div class="hiddenMenuElements">
                <li class="clickable" data-target="#<?= $id ?>">Us<span class="bigbocaicon icon-<?= $icono ?>" aria-hidden="true"></span></li>
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
                        wp_reset_query();
                        ?>
                    </div>

                </ul>
                <img src="<?php header_image(); ?>" class="imagenMenu" alt="menuLogo">

            </nav>
            <div class="hiddenContentOnLoad">
                <div class="spinnerLoad text-center">
                      <img src="<?= get_template_directory_uri()?>/img/717.GIF" alt="Loader">
                </div>
          </div>
          <section class="intro text-center fullheight container-fluid" id="primerPanel">
            <div class="logoContainer">
                <img src="<?php header_image(); ?>" class="logoImg" alt="Logo">
                <div class="col-xs-12 brandText"><span class="logoText">Big Boca Marketing</span></div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-offset-3 col-md-5 col-xs-11 text-center mensajeInicial mensajeInicio">
                <?= $comment ?>
            </div>
            <div class="clearfix"></div>
            

        </section>
        <div id="trigger1"></div>

        <?php

        $myvariable = ob_get_clean();

        return $myvariable;
    }

    add_shortcode('intro', 'intro_shortcode');