<?php wp_enqueue_style( 'creations-colorbox', WP_PLUGIN_URL.'/caf-creations/templates/css/creations_metabox.css'); ?>

<label for="category">Category:</label>
<br />
<input type="text" id="category" name="category" placeholder="Dinner" value="<?php echo get_post_meta($post->ID, 'category', TRUE) ?>"/>
<br />
<label for="description">Description:</label>
<br />
<textarea id="description" name="description" style= "width:400px; height:200px;" value="<?php echo get_post_meta($post->ID, 'description', TRUE) ?>"/></textarea>
<br />
<label for="title">Ingredients: </label>
<br/>
<label for="ingredients0">0: </label>
<input type="text" id="ingredients0" name="ingredients0" maxlength="300" value="<?php echo get_post_meta($post->ID, 'ingredients0', TRUE) ?>"/>
<br/>
<label for="ingredients1">1:</label>
<input type="text" id="ingredients1" name="ingredients1" maxlength="300" value="<?php echo get_post_meta($post->ID, 'ingredients1', TRUE) ?>"/>
<br/>
<label for="ingredients2">2:</label>
<input type="text" id="ingredients2" name="ingredients2" maxlength="300" value="<?php echo get_post_meta($post->ID, 'ingredients2', TRUE) ?>"/>
<br />
<label for="ingredients3">3:</label>
<input type="text" id="ingredients3" name="ingredients3" maxlength="300" value="<?php echo get_post_meta($post->ID, 'ingredients3', TRUE) ?>"/>
<br />
<label for="ingredients4">4:</label>
<input type="text" id="ingredients4" name="ingredients4" maxlength="300" value="<?php echo get_post_meta($post->ID, 'ingredients4', TRUE) ?>"/>
<br />
<label for="ingredients5">5:</label>
<input type="text" id="ingredients5" name="ingredients5" maxlength="300" value="<?php echo get_post_meta($post->ID, 'ingredients5', TRUE) ?>"/>
<br />
<label for="ingredients6">6:</label>
<input type="text" id="ingredients6" name="ingredients6" maxlength="300" value="<?php echo get_post_meta($post->ID, 'ingredients6', TRUE) ?>"/>
<br />
<label for="ingredients7">7:</label>
<input type="text" id="ingredients7" name="ingredients7" maxlength="300" value="<?php echo get_post_meta($post->ID, 'ingredients7', TRUE) ?>"/>
<br />
<label for="ingredients8">8:</label>
<input type="text" id="ingredients8" name="ingredients8" maxlength="300" value="<?php echo get_post_meta($post->ID, 'ingredients8', TRUE) ?>"/>
<br />
<label for="ingredients9">9:</label>
<input type="text" id="ingredients9" name="ingredients9" maxlength="300" value="<?php echo get_post_meta($post->ID, 'ingredients9', TRUE) ?>"/>
<br />
<label for="ingredients10">10:</label>
<input type="text" id="ingredients10" name="ingredients10" maxlength="300" value="<?php echo get_post_meta($post->ID, 'ingredients10', TRUE) ?>"/>
<br />
<label for="ingredients11">11:</label>
<input type="text" id="ingredients11" name="ingredients11" maxlength="300" value="<?php echo get_post_meta($post->ID, 'ingredients11', TRUE) ?>"/>
<br />
<label for="ingredients12">12:</label>
<input type="text" id="ingredients12" name="ingredients12" maxlength="300 value="<?php echo get_post_meta($post->ID, 'ingredients12', TRUE) ?>"/>
<br />
<label for="ingredients13">13:</label>
<input type="text" id="ingredients13" name="ingredients13" maxlength="300" value="<?php echo get_post_meta($post->ID, 'ingredients13', TRUE) ?>"/>
<br />
<label for="ingredients14">14:</label>
<input type="text" id="ingredients14" name="ingredients14" maxlength="300" value="<?php echo get_post_meta($post->ID, 'ingredients14', TRUE) ?>"/>
<br />
<!-- TODO: add x and add button here -->
<!-- <input type="button" class="remove_ingredients" value="X">
<input type="button" id="add_ingredients" value="Add" />
<br /> -->
<label for="directions_title">Directions:</label>
<br />
<label for="directions0">0: </label>
<input type="text" id="directions0" name="directions0" value="<?php echo get_post_meta($post->ID, 'directions0', TRUE) ?>"/>
<br />
<label for="directions1">1:</label>
<input type="text" id="directions1" name="directions1" value="<?php echo get_post_meta($post->ID, 'directions1', TRUE) ?>"/>
<br />
<label for="directions2">2:</label>
<input type="text" id="directions2" name="directions2" value="<?php echo get_post_meta($post->ID, 'directions2', TRUE) ?>"/>
<br />
<label for="directions3">3:</label>
<input type="text" id="directions3" name="directions3" value="<?php echo get_post_meta($post->ID, 'directions3', TRUE) ?>"/>
<br />
<label for="directions4">4:</label>
<input type="text" id="directions4" name="directions4" value="<?php echo get_post_meta($post->ID, 'directions4', TRUE) ?>"/>
<br />
<label for="directions5">5:</label>
<input type="text" id="directions5" name="directions5" value="<?php echo get_post_meta($post->ID, 'directions5', TRUE) ?>"/>
<br />
<label for="directions6">6:</label>
<input type="text" id="directions6" name="directions6" value="<?php echo get_post_meta($post->ID, 'directions6', TRUE) ?>"/>
<br />
<label for="directions7">7:</label>
<input type="text" id="directions7" name="directions7" value="<?php echo get_post_meta($post->ID, 'directions7', TRUE) ?>"/>
<br />
<label for="directions8">8:</label>
<input type="text" id="directions8" name="directions8" value="<?php echo get_post_meta($post->ID, 'directions8', TRUE) ?>"/>
<br />
<label for="directions9">9:</label>
<input type="text" id="directions9" name="directions9" value="<?php echo get_post_meta($post->ID, 'directions9', TRUE) ?>"/>
<br />
<label for="directions10">10:</label>
<input type="text" id="directions10" name="directions10" value="<?php echo get_post_meta($post->ID, 'directions10', TRUE) ?>"/>
<br />
<label for="directions11">11:</label>
<input type="text" id="directions11" name="directions11" value="<?php echo get_post_meta($post->ID, 'directions11', TRUE) ?>"/>
<br />
<label for="directions12">12:</label>
<input type="text" id="directions12" name="directions12" value="<?php echo get_post_meta($post->ID, 'directions12', TRUE) ?>"/>
<br />
<label for="directions13">13:</label>
<input type="text" id="directions13" name="directions13" value="<?php echo get_post_meta($post->ID, 'directions13', TRUE) ?>"/>
<br />
<label for="directions14">14:</label>
<input type="text" id="directions14" name="directions14" value="<?php echo get_post_meta($post->ID, 'directions14', TRUE) ?>"/>
<br />
<!-- TODO: add x and add button here -->
<!-- <input type="button" class="remove_directions" value="X">
<input type="button" id="add_directions" value="Add" /> -->
<!-- TODO: add the ratings counter back in here -->
<!-- <br />
<label for="ratings">Rating:</label>
<br />
<input type="number" id="ratings" name="ratings" placeholder="5" min="0" max="10" value="<?php echo get_post_meta($post->ID, 'ratings', TRUE) ?>"/>
<br /> -->
<!-- TODO: add like button here -->
<!-- <label for="likes">Likes:</label>
<br />
<input type="number" id="likes" name="likes" placeholder="5" value="<?php echo get_post_meta($post->ID, 'likes', TRUE) ?>"/>
<br /> -->
