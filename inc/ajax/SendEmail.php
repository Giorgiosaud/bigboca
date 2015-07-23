<?php

// wp_enqueue_script( 'mi-script-ajax',get_bloginfo('stylesheet_directory') . '/js/ajax-search.js', array( 'jquery' ) );

// ahora declaramos la variable MyAjax y le pasamos el valor url (wp-admin/admin-ajax.php) al script ajax-search.js
// wp_localize_script( 'mi-script-ajax', 'MyAjax', array( 'url' => admin_url( 'admin-ajax.php' ) ) );

//Para manejar admin-ajax tenemos que añadir estas dos acciones.
//IMPORTANTE!! Para que funcione reemplazar "enviar_correo" por vuestra action definida en ajax-search.js

add_action('wp_ajax_enviar_correo', 'enviar_correo_callback');
add_action('wp_ajax_nopriv_enviar_correo', 'enviar_correo_callback');

function enviar_correo_callback() {
	$message=$_POST['message'];
	echo $message;
	// $multiple_recipients = array(
		// 'info@bigboca.com',
		// $_POST['email'],
		// 'jorgelsaud@gmail.com');
	// $subj = 'Contact Us Web';
	// $body = $_POST['message'];
	// wp_mail( $multiple_recipients, $subj, $body );
    die(); // Siempre hay que terminar con die
}