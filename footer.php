<?php
/**
 * Created by PhpStorm.
 * User: jorgelsaud
 * Date: 10/6/15
 * Time: 4:54 PM
 */?>
 <div class="scrollDown">
    <div class="col-xs-12">Scroll Down To Know Us Better</div>
    <img src="<?php echo get_template_directory_uri() ?>/img/scrollDown.png" height="178" width="144" alt="scrolldown">

    <div class="clearfix"></div>
</div>
<footer>
    <nav class="footer container-fluid">
        <div class="informacionFooter">
            <div class="contacto col-xs-push-6">
                Contact
            </div>
            <?php
            if(get_theme_mod( 'bigboca_facebook_link')!=''||get_theme_mod( 'bigboca_twitter_link')!=''):
                ?>
            <div class="followUs">
                Follow Us
            </div>
            <div class="redesSociales">
                <?php if(get_theme_mod( 'bigboca_facebook_link')!=''):?>
                    <a href=""> <span class="bigbocaicon icon-facebook" aria-hidden="true"></span></a>
                <?php endif; ?>
                <?php if(get_theme_mod( 'bigboca_twitter_link')!=''):?>
                    <a href=""> <span class="bigbocaicon icon-twitter" aria-hidden="true"></span></a>
                <?php endif ?>
            </div>
            <?php
            endif;
            ?>
        </div>
    </nav>
    <?php wp_footer(); ?>
</footer>

</body>
</html>
