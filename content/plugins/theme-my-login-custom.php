<?php

// Custom Functions for 'Theme My Login'

// Validation for the Custom-Added Registration Fields
function tml_registration_errors( $errors ) {
	if ( empty( $_POST['first_name'] ) )
		$errors->add( 'empty_first_name', '<strong>ERROR</strong>: Please enter your first name.' );
	if ( empty( $_POST['last_name'] ) )
		$errors->add( 'empty_last_name', '<strong>ERROR</strong>: Please enter your last name.' );
	if ( empty( $_POST['country'] ) )
		$errors->add( 'empty_country', '<strong>ERROR</strong>: Please enter your country.' );
	if ( empty( $_POST['company'] ) )
		$errors->add( 'empty_company', '<strong>ERROR</strong>: Please enter your company.' );
	return $errors;
}
add_filter( 'registration_errors', 'tml_registration_errors' );

// Save the Custom-Added Registration Fields to the Database

function tml_user_register( $user_id ) {
	if ( !empty( $_POST['first_name'] ) )
		update_user_meta( $user_id, 'first_name', $_POST['first_name'] );
	if ( !empty( $_POST['last_name'] ) )
		update_user_meta( $user_id, 'last_name', $_POST['last_name'] );
	if ( !empty( $_POST['country'] ) )
		update_user_meta( $user_id, 'country', $_POST['country'] );
	if ( !empty( $_POST['company'] ) )
		update_user_meta( $user_id, 'company', $_POST['company'] );
}
add_action( 'user_register', 'tml_user_register' );

?>