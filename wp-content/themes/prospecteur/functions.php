<?php

function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', false );
    wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', false );
  
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function mon_widget_bienvenue() {

	global $wp_meta_boxes;
	wp_add_dashboard_widget('widget_bienvenue', 'Administration du site', 'widget_bienvenue');  

}  

function remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'remove_dashboard_meta' );    


function widget_bienvenue() 
{
	echo '	
	<style type="text/css">
	#widget_bienvenue{
		width:855px !important;
		float:left;	
		padding-bottom:1em;	
	}
	#widget_bienvenue div{
		margin-right:0.5em;	
	}
	#widget_bienvenue a {
		display: block;
		float: left;
		color: white;
	}
	.conteneur:hover {
		opacity: 0.8;
		text-decoration: none !important;
	}
	.conteneur {
		float: left;
		width: 250px;
		padding: 30px 0px 40px 0px;
		margin: 10px;
		font-size: 1.5em;
		background: yellow;
		text-align: center;
		text-decoration: underline !important;
	}
	.conteneur img {
		display: block;
		margin: 0 auto;
	}
	</style>
	
	<a href="https://seigneurieiledorleans.com/wp-admin/edit.php?post_type=page">
		<div class="conteneur" style="background: #2A6D64">Gestion des pages</div>
	</a>
	<a href="https://seigneurieiledorleans.com/wp-admin/edit.php?post_type=rooms">
		<div class="conteneur" style="background: #AE6F42">Gestion des chambres</div>
	</a>';  
}
add_action('wp_dashboard_setup', 'mon_widget_bienvenue');