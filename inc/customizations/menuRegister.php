<?php

function register_my_menu() {
	register_nav_menu('one-page-menu',__( 'One Page' ));
}
add_action( 'init', 'register_my_menu' );