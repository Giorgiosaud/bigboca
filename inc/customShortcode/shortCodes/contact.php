<?php
// Add Shortcode
function contact_shortcode($atts)
{

    // Attributes
    extract(shortcode_atts(
        array(), $atts)
    );
    // Code
    ob_start();?>
    <section class="contactUs">
            <div class="mapBB">
                <div id="map-canvas"></div>
            </div>
            <div class="clearfix"></div>
            <article class="container">
                <?php if (isset($_POST['email'])) {
                    ?>
                    <h1>
                        Gracias Por Contactarnos
                    </h1>
                    <?php
                }
                else{
                    ?>
                    <form id="formularioDeContacto">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="message">Contact Message</label>
                                <textarea name="message" class="form-control" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="exampleInputEmail2">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail2"
                                placeholder="jane.doe@example.com" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-default" id="submitForm">Send Contact</button>
                            </div>
                        </div>
                    </form>
                </article>
                <?php
            }
            ?>
    </section>



    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
        function initialize() {
            var image = {
                url: '<?= get_theme_mod( 'bigboca_map_logo' )?>',
                // This marker is 20 pixels wide by 32 pixels tall.
                size: new google.maps.Size(parseInt(72), parseInt(72)),
                // The origin for this image is 0,0.
                origin: new google.maps.Point(parseFloat(0), parseFloat(0)),
                // The anchor for this image is the base of the flagpole at 0,32.
                anchor: new google.maps.Point(parseFloat(0), parseFloat(0))
            };
            var shape = {
                coords: [1, 1, 1, 20, 18, 20, 18, 1],
                type: 'poly'
            };
            var myLatlng = new google.maps.LatLng(parseFloat(<?= get_theme_mod( 'bigboca_map_lat' )?>), parseFloat(<?= get_theme_mod( 'bigboca_map_long' )?>));
            var mapCanvas = document.getElementById('map-canvas');
            var mapOptions = {
                center: new google.maps.LatLng(parseFloat(<?= get_theme_mod( 'bigboca_map_lat' )?>), parseFloat(<?= get_theme_mod( 'bigboca_map_long' )?>)),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                zoom: parseInt(<?= get_theme_mod( 'bigboca_map_zoom' )?>),
                center: myLatlng
            }
            var map = new google.maps.Map(mapCanvas, mapOptions);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                animation: google.maps.Animation.DROP,
                title: 'Big Boca!!!',
                icon: image,
                shape: shape,
                title: 'Head Quarters',
                zIndex: 0

            });
            marker.setMap(map);
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <?php

    $myvariable = ob_get_clean();

    return $myvariable;
}

add_shortcode('contact', 'contact_shortcode');