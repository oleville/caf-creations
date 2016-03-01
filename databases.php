<?php
if(!class_exists('caf_creations'))
{
	class Caf_Creations_Database
	{
		/**
		* TODO: what is the post type?
		*/
		const POST_TYPE = "candidate";
		const SHORTCODE = "caf_creations";


		/**
		 * Constructor
		 */
		public function __construct()
		{
			// Register Action Hooks
			add_action('init', array(&$this, 'init'));
			add_action('admin_init', array(&$this, 'admin_init'));
			add_action('switch_blog', array(&$this, 'init'));
		}

		/**
		 * Function hooked to WP's init action
		 */
		public function init()
		{
			global $wpdb;
    		$wpdb->caf_creations_2016 = "{$wpdb->prefix}caf_creations_2016";
		}

		/**
		 * Function hooked to WP's admin_init action
		 */
		public function admin_init()
		{

		}
	}
}
