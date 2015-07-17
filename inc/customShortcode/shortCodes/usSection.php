<?php
// Add Shortcode
function usSection_shortcode($atts)
{
    $tittle=get_field('us_tittle');
    $definition=get_field('us_definition');
    $icono=get_field('us_icono');
    $fondo=get_field('us_fondo');
    $id=get_field('us_id');
    $fondo=$fondo['url'];
    
    // Code
    ob_start();?>
    <section id="UsSection" class="se-container">
    <div id="<?= $id ?>" class="se-slope">
        <article class="se-content"
                 style='background: -webkit-linear-gradient(rgba(0, 148, 255, 0.45), rgba(0, 81, 255, 0.45)), url("<?= $fondo ?>") !important;
                     background: linear-gradient( rgba(0, 148, 255, 0.45), rgba(0, 81, 255, 0.45) ), url("<?= $fondo ?>") !important;  background-size: cover !important;'
            >
          
            <div class="clearfix"></div>
            <div class="iconoLeft interno col-xs-5 col-sm-2">
                <span class="bigbocaicon icon-<?= $icono ?>" aria-hidden="true"></span>
            </div>
            <div class="<?= $descriptionClass ?> col-xs-10 col-md-5">
                <div class="titulo">
                    <?= $tittle ?>
                </div>
                <div class="detalle">
                    <?php echo $definition ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </article>
    </div>
    <?php
    $query = new WP_Query(array(
        'post_type' => 'us',
        'meta_key'  => 'orden',
        'orderby'   => 'meta_value_num',
        'order'     => 'ASC'
    ));
    $UsDefinitionsIndex = 0;
    if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
            $UsDefinitionsIndex ++;
            $id = get_field('id');
            if ($UsDefinitionsIndex % 2 != 0) {
                $iconoClass = 'iconoRight';
                $descriptionClass = 'descripcionRight';
                $style = '';
            } else {
                $iconoClass = 'iconoLeft';
                $descriptionClass = 'descripcionLeft';
                $urlBg = get_field('imagendefondo');
                $style = 'background: -webkit-linear-gradient(rgba(0, 148, 255, 0.45), rgba(0, 81, 255, 0.45)), url("' . $urlBg['url'] . '") !important;
                             background: linear-gradient( rgba(0, 148, 255, 0.45), rgba(0, 81, 255, 0.45) ), url("' . $urlBg['url'] . '") !important;  background-size: cover !important;';
            }

            ?>

            <div id="<?= $id ?>" class="se-slope" style='<?= $style ?>'>
                <article class="se-content">

                    <div class="<?= $iconoClass ?> interno col-xs-5 col-sm-2">
                        <span class="bigbocaicon icon-<?php the_field('icono') ?>" aria-hidden="true"></span>
                    </div>
                    <div class="<?= $descriptionClass ?> col-xs-10 col-md-5">
                        <div class="titulo">
                            <?php the_title() ?>
                        </div>
                        <div class="detalle">
                            <?php the_content() ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </article>
            </div>
        <?php
        endwhile;
    }

        ?>

    </section>
<?php

    $myvariable = ob_get_clean();

    return $myvariable;
}

add_shortcode('usSection', 'usSection_shortcode');