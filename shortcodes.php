<?php
if(!class_exists('Oleville_Caf_Creations_Shortcode'))
{
	class Oleville_Caf_Creations_Shortcode {
		const POST_TYPE = "caf_creations";
		const SHORTCODE = "caf_creations";

		//these need to match the array in creation-type.php
		private $_meta = array(
			'creation',
			'category',
			'description',
			'ingredients0', 
			'ingredients1',
			'ingredients2',
			'ingredients3',
			'ingredients4',
			'ingredients5',
			'ingredients6',
			'ingredients7',
			'ingredients8',
			'ingredients9',
			'ingredients10',
			'ingredients11',
			'ingredients12',
			'ingredients13',
			'ingredients14',
			'directions0',
			'directions1',
			'directions2',
			'directions3',
			'directions4',
			'directions5',
			'directions6',
			'directions7',
			'directions8',
			'directions9',
			'directions10',
			'directions11',
			'directions12',
			'directions13',
			'directions14',
			'ratings',
			'likes',
			'username'
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

			//registering external scripts 
			wp_enqueue_style( 'caf-creations-style', WP_PLUGIN_URL.'/caf-creations/css/caf_creations.css');

			// Add the shortcode hook
			if (!shortcode_exists('caf-creations')) {
				add_shortcode('caf-creations', array(&$this, 'caf_creation_handler'));
			}
		}

		public function caf_creation_handler($attr)
		{
			return $this->show_caf_creations();
		}

		public function show_caf_creations() {
			$allCreations = $this->get_all_creations();
			$result = '';
			$count = 1;
			$class = 'firstColor';
			foreach ($allCreations as $creation) {
				if ($count%2 === 0) {
					$class = 'firstColor';
				} else {
					$class = 'secondColor';
				}
				$thumb = get_the_post_thumbnail($creation['id'], 'thumbnail');

				if(!$thumb) {
					$thumb = '<img src="http://oleville.com/olesden/wp-content/uploads/sites/20/2016/09/caf-stock-photo.png">';
				}

				$result .= '<div class="container ' . $class . '""><div class="creation_picture">' . $thumb . '</div><div class="creation_title"><h2>' . $creation['creation'] . '</h2><div class="ratings">';
				for ($i = 0; $i < $creation['ratings']; $i++) {
					$result .= '<img src="http://oleville.com/olesden/wp-content/uploads/sites/20/2016/09/caf-stock-photo.png">';
				}
				$result .= '</div></div><div class="creation_category">' . $creation['category'] . '</div><div class="creation_description">' . $creation['description'] . '</div><table class="creation_content"><tr><th> Ingredients: </th><th> Directions: </th></tr><tr><td><ul>';
				for ($i = 0; $i <=14; $i++){
					$key = 'ingredients' . $i;
					if ($creation[$key] != '') {
						$result .='<li>' .  $creation[$key] . '</li>'; 
					} 
				}
				$result .= '</ul></td><td><ol>';
							for ($i = 0; $i <=14; $i++){
								$key = 'directions' . $i;
								if ($creation[$key] != '') {
									$result .='<li>' .  $creation[$key] . '</li>'; 
								} 
							}
				$result .= '</ol></td></tr></table></div>';
				//TODO: add like button here
				// $result .= '<input class="likes" type="button" value="Like this recipe!">';






				$count++;
			

			}

			return $result;

		}

		public function get_all_creations() {
			global $wpdb;

			//query the DB for the creations
			$args = array(				
				'post_type' => 'caf_creations',
				'posts_per_page' => -1,
				'orderby' => 'date',
				'order' => 'DESC', 
			); 

			$query = new WP_Query($args);
			$formattedCreationData = array ();

			while ($query -> have_posts()) {
				$query->the_post();

				$creationID = get_the_ID();

				$thisCreation = array (
					//pulling from a query object
					'creation' => get_the_title(),
					'category' => get_post_meta($creationID, 'category', TRUE),
					'description' => get_post_meta($creationID, 'description', TRUE),
					'ingredients0' => get_post_meta($creationID, 'ingredients0', TRUE),
					'ingredients1' => get_post_meta($creationID, 'ingredients1', TRUE),
					'ingredients2' => get_post_meta($creationID, 'ingredients2', TRUE),
					'ingredients3' => get_post_meta($creationID, 'ingredients3', TRUE),
					'ingredients4' => get_post_meta($creationID, 'ingredients4', TRUE),
					'ingredients5' => get_post_meta($creationID, 'ingredients5', TRUE),
					'ingredients6' => get_post_meta($creationID, 'ingredients6', TRUE),
					'ingredients7' => get_post_meta($creationID, 'ingredients7', TRUE),
					'ingredients8' => get_post_meta($creationID, 'ingredients8', TRUE),
					'ingredients9' => get_post_meta($creationID, 'ingredients9', TRUE),
					'ingredients10' => get_post_meta($creationID, 'ingredients10', TRUE),
					'ingredients11' => get_post_meta($creationID, 'ingredients11', TRUE),
					'ingredients12' => get_post_meta($creationID, 'ingredients12', TRUE),
					'ingredients13' => get_post_meta($creationID, 'ingredients13', TRUE),
					'ingredients14' => get_post_meta($creationID, 'ingredients14', TRUE),
					'directions0' => get_post_meta($creationID, 'directions0', TRUE),
					'directions1' => get_post_meta($creationID, 'directions1', TRUE),
					'directions2' => get_post_meta($creationID, 'directions2', TRUE),
					'directions3' => get_post_meta($creationID, 'directions3', TRUE),
					'directions4' => get_post_meta($creationID, 'directions4', TRUE),
					'directions5' => get_post_meta($creationID, 'directions5', TRUE),
					'directions6' => get_post_meta($creationID, 'directions6', TRUE),
					'directions7' => get_post_meta($creationID, 'directions7', TRUE),
					'directions8' => get_post_meta($creationID, 'directions8', TRUE),
					'directions9' => get_post_meta($creationID, 'directions9', TRUE),
					'directions10' => get_post_meta($creationID, 'directions10', TRUE),
					'directions11' => get_post_meta($creationID, 'directions11', TRUE),
					'directions12' => get_post_meta($creationID, 'directions12', TRUE),
					'directions13' => get_post_meta($creationID, 'directions13', TRUE),
					'directions14' => get_post_meta($creationID, 'directions14', TRUE),
					'ratings' => get_post_meta($creationID, 'ratings', TRUE),
					'likes' => get_post_meta($creationID, 'likes', TRUE),
					'username' => get_post_meta($creationID, 'username', TRUE),
					'id' => $creationID
					);

				array_push($formattedCreationData, $thisCreation);
			}
			return $formattedCreationData;

		}
		/**
		 * Function hooked to WP's admin_init action
		 */
		public function admin_init()
		{

		}
	}
}?>
