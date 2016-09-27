<?php
if(!class_exists('Creation_Type'))
{
	class Creation_Type
	{

		const POST_TYPE = "caf_creations";
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

		/**
		 * Constructor
		 * adds initialization actions defined later (init and admin_init if user is admin)
		 */
		public function __construct()
		{
			add_action('init', array(&$this, 'init'));
			add_action('admin_init', array(&$this, 'admin_init'));
		}

		/**
		 * Function hooked to WP's init action
		 */
		public function init()
		{
			$this->create_post_type();
	 		add_action('save_post', array(&$this, 'save_post'));
	 		add_action('wp_trash_post', array(&$this, 'delete_post'));
	 		add_action('publish_post', array(&$this, 'publish_post'));
	 		add_action('update_post', array(&$this, 'update_post'));
		}

		public function create_post_type() {

			//internal use
			$labels = array(	
				'name'               => _x( 'Caf Creations', 'post type general name' ),
				'singular_name'      => _x( 'Caf Creation', 'post type singular name' ),
				'add_new'            => _x( 'Add New', 'Caf creation' ),
				'add_new_item'       => __( 'Add New Caf creation' ),
				'edit_item'          => __( 'Edit Caf creation' ),
				'new_item'           => __( 'New Caf creation' ),
				'all_items'          => __( 'All Caf creations' ),
				'view_item'          => __( 'View Caf creation' ),
				'search_items'       => __( 'Search Caf creations' ),
				'not_found'          => __( 'No caf creations found' ),
				'not_found_in_trash' => __( 'No caf creations found in the Trash' ), 
				'parent_item_colon'  => '',
				'menu_name'          => 'Caf Creations');

			//external use
			//labels is subarray of labels
			$args = array(					
					'labels'        => $labels,
					'description'   => 'Holds our caf creations',
					'public'        => true,
					'menu_position' => 5,
					'supports'      => array( 'title', 'thumbnail'),
					'has_archive'   => true,
					'menu_icon'     => 'dashicons-carrot', 
					);

			//registers post type with wordpress 
			register_post_type(self::POST_TYPE, $args);

		}

		/**
		 * Save the metaboxes for this custom post type
		 */

				//database id for this post = post_id
		public function save_post($post_id)
		{
			// verify if this is an auto save routine. 
			// If it is, our form has not been submitted, so we dont want to do anything
			// we have no autosave suckers!
			if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			{
				return;
			}
			
			//security check
			if(isset($_POST['post_type']) && $_POST['post_type'] == self::POST_TYPE && current_user_can('edit_post', $post_id))
			{
				foreach($this->_meta as $field_name)
				{
					// Update the post's meta field
					if(isset( $_POST[$field_name]))
					{
						update_post_meta($post_id, $field_name, sanitize_text_field($_POST[$field_name]));                    
					}
				}
			} else {
				//there is no type for this post so it gets thrown away
				return;
			}
		}

		/**
		 * Delete the metaboxes for this custom post type
		 */
		public function delete_post($post_id) {

		}

		public function get_creation_info() {

			$creationID = $_POST['caf_creationID'];

			$creation = get_post($creationID);
			$creation_metas = get_post_custom($creationID);

			$thumb = get_post_thumbnail_id($creationID);
			$featured_img = ' ';
			if ($thumb != false) {
				$featured_img = wp_get_attachment_image_src($thumb, 'medium');
				$featured_img = $featured_img[0];
			}

			$return_data = array(
				'featured_image' => $featured_img,
				'creation' => $caf_creation_metas['creation'],
				'category' => $caf_creation_metas['category'],
				'description' => $caf_creation_metas['description'],
				'ingredients0' => $caf_creation_metas['ingredients0'],
				'ingredients1' => $caf_creation_metas['ingredients1'],
				'ingredients2' => $caf_creation_metas['ingredients2'],
				'ingredients3' => $caf_creation_metas['ingredients3'],
				'ingredients4' => $caf_creation_metas['ingredients4'],
				'ingredients5' => $caf_creation_metas['ingredients5'],
				'ingredients6' => $caf_creation_metas['ingredients6'],
				'ingredients7' => $caf_creation_metas['ingredients7'],
				'ingredients8' => $caf_creation_metas['ingredients8'],
				'ingredients9' => $caf_creation_metas['ingredients9'],
				'ingredients10' => $caf_creation_metas['ingredients10'],
				'ingredients11' => $caf_creation_metas['ingredients11'],
				'ingredients12' => $caf_creation_metas['ingredients12'],
				'ingredients13' => $caf_creation_metas['ingredients13'],
				'ingredients14' => $caf_creation_metas['ingredients14'],
				'directions0' => $caf_creation_metas['directions0'],
				'directions1' => $caf_creation_metas['directions1'],
				'directions2' => $caf_creation_metas['directions2'],
				'directions3' => $caf_creation_metas['directions3'],
				'directions4' => $caf_creation_metas['directions4'],
				'directions5' => $caf_creation_metas['directions5'],
				'directions6' => $caf_creation_metas['directions6'],
				'directions7' => $caf_creation_metas['directions7'],
				'directions8' => $caf_creation_metas['directions8'],
				'directions9' => $caf_creation_metas['directions9'],
				'directions10' => $caf_creation_metas['directions10'],
				'directions11' => $caf_creation_metas['directions11'],
				'directions12' => $caf_creation_metas['directions12'],
				'directions13' => $caf_creation_metas['directions13'],
				'directions14' => $caf_creation_metas['directions14'],
				'ratings' => $caf_creation_metas['ratings'],
				'likes' => $caf_creation_metas['likes'],
				'username' => $caf_creation_metas['username']
			 );

			echo json_encode($return_data); // return the JSON data
			wp_die(); // clean up

		}

		/**
		 * Function hooked to WP's admin_init action
		 */
		public function admin_init() {
			// Add metaboxes
			add_action('add_meta_boxes', array(&$this, 'add_meta_boxes'));
			// enqueue scripts
			add_action('admin_enqueue_scripts', array(&$this, 'admin_enqueue_scripts'));
			//enqueu: for JavaScript and custom CSS
			
		}

		public function add_meta_boxes() {

			// Add this metabox to every selected post
			add_meta_box( 
				sprintf('caf_creations_%s_section', self::POST_TYPE), //container for edit meta fields
				sprintf('%s Information', ucwords(str_replace("_", " ", self::POST_TYPE))), //name of above container
				array(&$this, 'add_inner_meta_boxes'), // call to add_inner_meta_boxes with argument this
				self::POST_TYPE,
				'normal',
				'high'
			);	
		}

		/**
		 * called off of the add meta box
		 * don't worry about it
		 */		
		public function add_inner_meta_boxes($post) {		
			wp_nonce_field( plugin_basename( __FILE__ ), 'oleville_caf_creations_section_nonce' );
			// Render the job order metabox	
			include(sprintf("%s/templates/creations_metabox.php", dirname(__FILE__)));			
		}

				/**
		 * Function hooked to WP's admin_enqueue_scripts action
		 */
		public function admin_enqueue_scripts($hook)
		{

			global $post;
			// Check to see that these scripts are only loaded for post-new.php
			// and the type is eventmail
			if('post-new.php' != $hook && 'post.php' != $hook)
				return;
			// if($_GET['post_type'] != self::POST_TYPE && 'post.php' != $hook)
			// 	return;

			// Register the JS and CSS files with WordPress 
			// register = for client
			wp_register_style(
				'oleville-caf-creations-css',
				plugins_url('templates/css/creations_metabox.css', __FILE__)
			);
			//TODO: register js script for add and deleting ingredients/directions
			// wp_register_script(
			// 	'oleville-caf-creations-js',
			// 	plugins_url('templates/js/creations_metabox.js', __FILE__)
			// 	//array('jquery', 'jquery-ui-datepicker')
			// );

			wp_enqueue_style('oleville-caf-creations-css');
			//wp_enqueue_script('oleville-caf-creations-js');


		}

	}
}
