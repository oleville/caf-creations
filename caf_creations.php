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
Copyright 2016  Margaret Zimmermann  (email : mzimmermann1234@gmail.com)

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

if(!class_exists('Oleville_Caf_Creations'))
{
	class Oleville_Caf_Creations 
	{
		/**
		 * Construct the plugin object
		 */
		public function __construct()
		{	
			// Activate Shortcode Database
			require_once(sprintf("%s/creation-type.php", dirname(__FILE__)));
			$creation_type = new Creation_Type();
			
			// Activate Shortcode
			require_once(sprintf("%s/shortcodes.php", dirname(__FILE__)));
			$oleville_caf_creations_shortcode = new Oleville_Caf_Creations_Shortcode();
			
		}

		/**
		 * Activate the plugin
		 */
		public static function activate()
		{
			//do nothing
		}

		/**
		 * Deactivate the plugin
		 */
		public static function deactivate()
		{
			//do nothing
		}

	}
}

//registers instilation and deinstalation hooks (call above functions)
if(class_exists('Oleville_Caf_Creations')) {
	register_activation_hook(__FILE__, array('Oleville_Caf_Creations', 'activate'));
	register_deactivation_hook(__FILE__, array('Oleville_Caf_Creations', 'deactivate'));
	$oleville_Caf_Creations = new Oleville_Caf_Creations();

}
//I like it :P
?>