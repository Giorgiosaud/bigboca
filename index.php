<?php

get_header(); ?>

<div id="content-wrapper">
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
    <nav class="menuPrincipal">
        <div class="botonmenuToogle">
            <img src="<?php header_image(); ?>" class="imgMenu" height="267" width="300"
                 alt="">
            <span class="glyphicon glyphicon-menu-hamburger iconoMenu" aria-hidden="true"></span>
        </div>
        <div class="clearfix"></div>
        <ul class="menuItems">
            <li data-target="#segundoPanel">US<span class="glyphicon glyphicon-menu-hamburger"
                                                    aria-hidden="true"></span></li>
            <li data-target="#trigger3">We speak the Language<span class="glyphicon glyphicon-menu-hamburger"
                                                                   aria-hidden="true"></span></li>
            <li data-target="#trigger4">Message as Effective <span class="glyphicon glyphicon-menu-hamburger"
                                                                   aria-hidden="true"></span></li>
            <li data-target="#trigger6">Product Sampling<span class="glyphicon glyphicon-menu-hamburger"
                                                              aria-hidden="true"></span></li>
            <li data-target="#trigger7">Hispanic Supermarket Network<span class="glyphicon glyphicon-menu-hamburger"
                                                                          aria-hidden="true"></span></li>
            <li data-target="#trigger8">Street Intercept<span class="glyphicon glyphicon-menu-hamburger"
                                                              aria-hidden="true"></span></li>
            <li data-target="#trigger9">Experiential Marketing<span class="glyphicon glyphicon-menu-hamburger"
                                                                    aria-hidden="true"></span></li>
            <li data-target="#trigger10">Insert Media<span class="glyphicon glyphicon-menu-hamburger"
                                                           aria-hidden="true"></span></li>
        </ul>
    </nav>
    <?php
    $pages = get_pages(array('parent' => 0, 'sort_column' => 'menu_order'));
    foreach ($pages as $index => $page) {
        $urlBg = wp_get_attachment_url(get_post_meta($page->ID, 'imagen_de_fondo', true));
        ?>
        <section class="se-container">
            <div class="se-slope inicioDeContenedor" id="<?= get_post_meta($page->ID, 'id', true); ?>">
                <article class="se-content" id="city"
                         style='background: -webkit-linear-gradient(rgba(0, 148, 255, 0.45), rgba(0, 81, 255, 0.45)), url("<?= $urlBg ?>") !important;
                             background: linear-gradient( rgba(0, 148, 255, 0.45), rgba(0, 81, 255, 0.45) ), url("<?= $urlBg ?>") !important;'>
                    <div class="col-xs-11 text-center " id="<?= get_post_meta($page->ID, 'idmensaje', true) ?>">
                        <?php
                        $message = get_post_meta($page->ID, 'message', true);
                        if ($message != '') {
                            echo $message; ?>
                            <?php if (get_post_meta($page->ID, 'name', true) != '') { ?>
                                <div class="autor">
                                    <?= get_post_meta($page->ID, 'name', true); ?>
                                    <br>
                                    <?= get_post_meta($page->ID, 'position', true); ?>
                                </div>
                            <?php }
                        } ?>


                    </div>
                    <div class="clearfix"></div>
                    <?php
                    if (get_post_meta($page->ID, 'show_details', true) == 1) {
                        ?>
                        <div class="us col-xs-12" id="trigger<?= get_post_meta($page->ID, 'trigger_number', true); ?>">

                            <div class="iconoLeft col-xs-2" id="<?= get_post_meta($page->ID, 'idicono', true); ?>">
                    <span class="glyphicon glyphicon <?= get_post_meta($page->ID, 'icono', true); ?>"
                          aria-hidden="true"></span>
                            </div>
                            <div class="descripcionLeft col-xs-10 col-md-5">
                                <div class="titulo">
                                    <?= $page->post_title ?>
                                </div>
                                <div class="detalle">
                                    <?php
                                    $content = $page->post_content;
                                    if ($content != '') {
                                        echo $content;

                                    } ?>

                                </div>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    <?php } ?>
                </article>

                <!-- </div> -->
            </div>
            <?php
            $paginasHijas = get_pages(array('child_of' => $page->ID, 'sort_column' => 'menu_order'));
            foreach ($paginasHijas as $index => $paginaHija) {

                if ($index % 2 != 0) {
                    $urlchBg = wp_get_attachment_url(get_post_meta($paginaHija->ID, 'imagen_de_fondo', true));
                    $style = "'background: -webkit-linear-gradient(rgba(0, 148, 255, 0.45), rgba(0, 81, 255, 0.45)), url(";
                    $style .= '"';
                    $style .= $urlchBg;
                    $style .= '"';
                    $style .= ") !important;background: linear-gradient( rgba(0, 148, 255, 0.45), rgba(0, 81, 255, 0.45) ), url(";
                    $style .= '"';
                    $style .= $urlchBg;
                    $style .= '"';
                    $style .= ") !important;'";
                    $classIcono = "iconoLeft";
                    $classDescription = "descripcionLeft";

                } else {
                    $style = '';
                    $classIcono = "iconoRight";
                    $classDescription = "descripcionRight";

                }

                ?>
                <div class="se-slope" id="<?= get_post_meta($paginaHija->ID, 'id', true) ?>" style=<?= $style ?>>
                    <article class="se-content" id="trigger<?= get_post_meta($paginaHija->ID, 'id_trigger', true) ?>">

                        <div class="<?= $classIcono ?> interno col-xs-5 col-sm-2"
                             id="<?= get_post_meta($paginaHija->ID, 'id_icono', true) ?>">
                        <span class="glyphicon <?= get_post_meta($paginaHija->ID, 'icono', true) ?>"
                              aria-hidden="true"></span>
                        </div>
                        <div class="<?= $classDescription ?> col-xs-10 col-md-5">
                            <div class="titulo">
                                <?= $paginaHija->post_title; ?>
                            </div>
                            <div class="detalle">
                                <?= $paginaHija->post_content; ?>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </article>
                </div>
            <?php
            }
            ?>
        </section>
    <?php } ?>

</div>
<?php get_footer() ?>