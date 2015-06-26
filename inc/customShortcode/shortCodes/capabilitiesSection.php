<?php
// Add Shortcode

function capabilitiesSection_shortcode($atts)
{

    // Attributes
    extract(shortcode_atts(
            array(
                'comment'  => '"No other sampling program in the USA can expose your brand to this many Hispanic consumers under one roof, I guarantee this!”',
                'author'   => 'Rhandy Taveras',
                'position' => 'President, Big Boca Group.',
                'fondo'    => 'http://bigboca.test/wp-content/uploads/2015/06/city.jpg',
                'id'       => 'Capabilities'
            ), $atts)
    );
    // Code
    ob_start();?>
    <section id="CapabilitiesSection" class="se-container">
        <div id="<?= $id ?>" class="se-slope">
            <article class="se-content"
                     style='background: -webkit-linear-gradient(rgba(0, 148, 255, 0.45), rgba(0, 81, 255, 0.45)), url("<?= $fondo ?>") !important;
                         background: linear-gradient( rgba(0, 148, 255, 0.45), rgba(0, 81, 255, 0.45) ), url("<?= $fondo ?>") !important;'
                >
                <div class="col-xs-11 text-center mensajeInicial">
                    <?= $comment ?>
                    <div class="autor">
                        <?= $author ?>
                        <br/>
                        <?= $position ?>

                    </div>
                </div>
                <div class="clearfix"></div>
            </article>
        </div>
        <?php
        $query = new WP_Query(array(
            'post_type'   => 'capabilities',
            'post_parent' => 0,
            'meta_key'    => 'orden',
            'orderby'     => 'meta_value_num',
            'order'       => 'ASC'
        ));
        $CapabilitiesDefinitionsIndex = 0;
        if ($query->have_posts()) {
            while ($query->have_posts()) : $query->the_post();
                $CapabilitiesDefinitionsIndex ++;
                $id = get_field('id');
                $urlBg = get_field('imagendefondo');
                $color_fondo1 = get_field('color_fondo_1');
                $opacity1 = get_field('opacity_1');
                $color_fondo2 = get_field('color_fondo_2');
                $opacity2 = get_field('opacity_2');
                $style = 'background: -webkit-linear-gradient(' . hex2rgba($color_fondo1,$opacity1) . ', ' . hex2rgba($color_fondo2,$opacity2) . '), url("' . $urlBg['url'] . '") !important;
                             background: linear-gradient( ' . hex2rgba($color_fondo1,$opacity1) . ', ' . hex2rgba($color_fondo2,$opacity2) . ' ), url("' . $urlBg['url'] . '") !important;  background-size: cover !important;';
                if ($CapabilitiesDefinitionsIndex % 2 != 0) {
                    $iconoClass = 'iconoRight';
                    $descriptionClass = 'descripcionRight';
                    $descriptionAlignment = 'right';

                } else {
                    $iconoClass = 'iconoLeft';
                    $descriptionClass = 'descripcionLeft';
                    $descriptionAlignment = 'left';
                }

                if (has_children()) {
                    $id2 = get_the_ID();
                    $id = get_field('id');
                    $title = get_the_title();
                    $content = get_the_content();
                    $urlBg = get_field('imagendefondo');
                    $color_fondo1 = get_field('color_fondo_1');
                    $color_fondo2 = get_field('color_fondo_2');
                    $style = 'background: -webkit-linear-gradient(' . $color_fondo1 . ', ' . $color_fondo2 . '), url("' . $urlBg['url'] . '") !important;
                             background: linear-gradient( ' . $color_fondo1 . ', ' . $color_fondo2 . ' ), url("' . $urlBg['url'] . '") !important';
                    $colorIndicadores=get_field('color_de_indicadores');
                    $colorBordeIndicadores=get_field('color_de_borde_indicadores');
                    $colorDeFlechas=get_field('color_de_flechas');
                    $cantidadDeHijos = 0;
                    $childrenArgs = array(
                        'post_parent' => $id2,
                        'post_type'   => 'capabilities',
                        'post_status' => 'publish'
                    );
                    $childrens = new WP_Query($childrenArgs);



                    ?>
                    <div id="<?= $id ?>" class="se-slope" style='<?= $style ?>'>
                        <article class="se-content sinPaddingHorizontal">
                            <div class="contenedorSlide">
                                <div id="carrusel_<?= $id ?>" class="carousel slide">
                                    <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                            <?= showCapability(get_field('icono'), $title, $content, 'center') ?>
                                        </div>
                                        <?php
                                        if ($childrens->have_posts()) {
                                            while ($childrens->have_posts()) : $childrens->the_post();
                                                ?>
                                                <div class="item">
                                                    <?= showCapability(get_field('icono'), get_the_title(),
                                                        get_the_content(), 'center', 'container') ?>
                                                </div>
                                            <?php
                                            endwhile;
                                        }

                                        ?>
                                        <div class="clearfix"></div>
                                    </div>
                                    <ol class="carousel-indicators col-xs-12 text-center">
                                        <li style="background-color:<?= $colorIndicadores ?>;border:1px solid <?= $colorBordeIndicadores ?>"data-target="#carrusel_<?= $id ?>"
                                            data-slide-to="0" class="active"></li>
                                        <?php
                                        if ($childrens->have_posts()) {
                                            while ($childrens->have_posts()) : $childrens->the_post();
                                                $cantidadDeHijos ++; ?>
                                                <li style="background-color:<?= $colorIndicadores ?>;border:1px solid <?= $colorBordeIndicadores ?>" data-target="#carrusel_<?= $id ?>"
                                                    data-slide-to="<?= $cantidadDeHijos ?>"></li>
                                            <?php
                                            endwhile;

                                        }


                                        ?>
                                    </ol>
                                    <a class="leftChild carousel-control" style="color:<?= $colorDeFlechas?>" href="#carrusel_<?= $id ?>" role="button"
                                       data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="rightChild carousel-control" style="color:<?= $colorDeFlechas?>" href="#carrusel_<?= $id ?>" role="button"
                                       data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>

                                </div>

                            </div>
                            <div class="clearfix"></div>
                        </article>
                    </div>
                <?php
                } else {
                    ?>

                    <div id="<?= $id ?>" class="se-slope" style='<?= $style ?>'>
                        <article class="se-content">
                            <div class="<?= $descriptionClass ?> col-xs-10 col-md-5">
                                <?= showCapability(get_field('icono'), get_the_title(), get_the_content(),
                                    $descriptionAlignment) ?>
                            </div>
                            <div class="clearfix"></div>
                        </article>
                    </div>

                <?php
                }
            endwhile;
        }

        ?>

    </section>
    <?php

    $myvariable = ob_get_clean();

    return $myvariable;
}

add_shortcode('capabilitiesSection', 'capabilitiesSection_shortcode');