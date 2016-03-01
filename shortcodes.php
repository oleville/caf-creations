<?php
if(!class_exists('Caf_Creations_Shortcode'))
{
	class Caf_Creations_Shortcode
	{
		//TODO: fix POST_TYPE
		const POST_TYPE = "candidate";
		const SHORTCODE = "caf_creations";


		private $_meta = array(
			'username',
			'creation',
			'category',
			'ingredients',
			'directions',
			'picture'
		);

		private $messages = array(
			'success' => array(),
			'error' => array(),
			);

		/**
		 * Constructor
		 */
		public function __construct()
		{
			// Register Action Hooks
			add_action('init', array(&$this, 'init'));
			add_action('admin_init', array(&$this, 'admin_init'));

		}

		/**
		 * Function hooked to WP's init action
		 */
		public function init()
		{
			global $wpdb;
			global $voter;

			$wpdb->voters = $wpdb->prefix . "voters";
			$wpdb->voter_associations = $wpdb->prefix . "voter_associations";
			$wpdb->votes = $wpdb->prefix . "votes";
			$wpdb->write_in_votes = $wpdb->prefix . "write_in_votes";

			wp_register_script( 'voting-candidate-js', WP_PLUGIN_URL.'/oleville-voting/js/candidate_lightbox.js', array('jquery') );
		   	wp_localize_script( 'voting-candidate-js', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));

			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'voting-candidate-js' );

			// Add the shortcode hook
			if (!shortcode_exists(self::SHORTCODE)) {
				add_shortcode(self::SHORTCODE, array(&$this, 'voting_handler'));
			}
		}

		/**
		 * Function hooked to WP's admin_init action
		 */
		public function admin_init()
		{

		}
	}
}
