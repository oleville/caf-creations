<?php
/*
	Plugin Name: Caf Creations
    Plugin URI: http://www.oleville.com
    Description: Provides ability to display/collect caf creation data
    Version: 0
    Author: Margaret Zimmermann
    License: GPL2
*/
/*
Copyright 2014  Margaret Zimmermann  (email : mzimmermann1234@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if(!class_exists('Oleville_Voting'))
{
	class Oleville_Voting
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{	
			// Activate Shortcode Database
			require_once(sprintf("%s/databases.php", dirname(__FILE__)));
			$caf_creations_database = new Caf_Creations_Database();
			
			// Activate Shortcode
			require_once(sprintf("%s/shortcodes.php", dirname(__FILE__)));
			$oleville_voting_shortcode = new Oleville_Voting_Shortcode();
			
		}

		/**
		 * Activate the plugin
		 */
		public static function activate()
		{
			global $wpdb;
    		$wpdb->caf_creations_2016 = $wpdb->prefix . "caf_creations_2016";

			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			global $wpdb;
			global $charset_collate;
			$sql_create_table .= "CREATE TABLE {$wpdb->caf_creations_2016} (
				  uid mediumint(6) unsigned NOT NULL AUTO_INCREMENT,
				  username varchar(20) default '' NOT NULL,
				  creation varchar(40) default '' NOT NULL,
				  category varchar(40) default '' NOT NULL,
				  ingredients varchar(200) default '' NOT NULL,
				  directions varchar(200) default '' NOT NULL,
/*
*TODO: do I need something else here? what about pictures?
*/
				  PRIMARY KEY  (uid),
				  KEY username (username)
				  KEY username (creation)
				  KEY username (category)
				  KEY username (ingredients)
				  KEY username (directions)
			 	  ) $charset_collate; ";
		}

		/**
		 * Deactivate the plugin
		 */
		public static function deactivate()
		{

		}

		// ???
		public static function build_caf_crations_page()
		{

		}
	}
}